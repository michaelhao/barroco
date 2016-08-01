<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 實體帳號介面
class Api extends CI_Controller
{
    public function questions()
    {

        //抓出題目資料
        $questions=$this->db->order_by('created_at','desc')->get_where('question', array(
            'recover' =>0,
        ))->result_array();
         // p($this->db->last_query());

        //抓取圖片的method
        $CI =& get_instance();
        $CI->load->library('image');
        $questions = $CI->image->getImage($questions);

        //題目的option
        foreach ($questions as $key => $question) {
            $questions[$key]['options'] = $this->db->order_by('created_at','desc')->get_where('question_option', array(
                'display' => 1,
                'recover'=>0,
                'question_id' =>$question['id'],
            ))->result_array();
        }
        echo json_encode($questions);
        exit;
    }

    public function insert_score(){ 

        //將資料加入資料庫
        $input = array(
            'type' => $this->input->post('type'),
            'created_at' => date('Y-m-d H:i:s'),
            'school'=>$this->input->post('school'),
            'name' => $this->input->post('name'), 
            'score'=>$this->input->post('score'),
        );
        //加入哪個資料庫
        $this->db->insert('score', $input); 
        $insert_last_id = $this->db->insert_id();

        $this->db->where('id', $insert_last_id);
        $this->db->update('score',$input);

        flashSuccess('新增資料成功。');

        // 導回原本的頁面
        $panel= $this->input->post("panel");
        $row=select_submenu($panel);
        redirect($row["link"], 'refresh');
    }

    public function rank(){
        //抓出score的資料
        //使用type類別進行分數排列
        $ranks=$this->db->order_by('score','desc')->get_where('score', array(
            'type' => $this->input->post('type'),
            'recover' =>0,
        ))->result_array();
        
        //輸出結果
        echo json_encode($ranks);
        exit;
    }

    public function inspect() {
        // 抓取比對的名字
        $validate_str1 = $this->input->post('name');
        $validate_str2 = $this->input->post('school');

        // 抓取所有不雅字詞字庫
        $inspects = $this->db->get_where('bad_language', array(
            'display'=>1,
            'recover'=>0
            ))->result_array();

        //判斷name
        // 初始化錯誤狀態為 false
        $error = false;
        
        foreach ($inspects as $key => $inspect) {
            // 同時比對name&school
            // 其中一個比對到相同字串時候調整錯誤狀態為 true 
            if(preg_match("/".$inspect['name']."/i", $validate_str1) || preg_match("/".$inspect['name']."/i", $validate_str2)){
                $error = true;
            }
        }   

        if($error == true) {
            $result = array(
                'error' => "true",
                'message' => "包含不雅字，請修改"
            );
            echo '包含不雅字，請修改 ';
        } else {
            $result = array(
                'error' => "false",
                'message' => "無不雅字詞" 
            );
            echo '無不雅字詞 ';
        }

    }

}

