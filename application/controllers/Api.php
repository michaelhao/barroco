<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 實體帳號介面
class Api extends CI_Controller
{
    //給前台十個題目
    public function questions()
    {

        //抓出題目資料
        $questions=$this->db->order_by('created_at','desc')->get_where('question', array(
            'recover' =>0,
            'display' =>1,
        ))->result_array();
         // p($this->db->last_query());

        //抓取圖片的method
        $CI =& get_instance();
        $CI->load->library('image');
        $questions = $CI->image->getImage($questions);

        //題目的option
        foreach ($questions as $key => $question) {
            unset($questions[$key]['created_at']);
            unset($questions[$key]['updated_at']);
            unset($questions[$key]['display']);
            unset($questions[$key]['recover']);
            unset($questions[$key]['sort']);
            $questions[$key]['score'] = 10;
            $questions[$key]['options'] = $this->db->select('description, correct')->get_where('question_option', array(
                'display' => 1,
                'recover'=>0,
                'question_id' =>$question['id'],
            ))->result_array();

            foreach ($questions[$key]['options'] as $key2 => $value) {
                if ($questions[$key]['options'][$key2]['correct']==0) {
                    $questions[$key]['options'][$key2]['correct'] = false;
                }else{
                    $questions[$key]['options'][$key2]['correct'] = true;
                }
            }

        }

        $questions = $this->array_random($questions, 10);//隨機取得十題題目
        echo json_encode($questions);
        exit;
    }
    /**
     * 陣列洗牌
     * 來源：http://php.net/manual/en/function.array-rand.php
     * 
     * @param   $arr 要洗牌的陣列
     * @param   $num 數量 
     * @return  返回陣列
     */
    public function array_random($arr, $num = 1) 
    {
        shuffle($arr);
        $r = array();
        for ($i = 0; $i < $num; $i++) {
            $r[] = $arr[$i];
        }
        return $num == 1 ? $r[0] : $r;
    }

    //將前台傳回來的分數儲存
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
        // $insert_last_id = $this->db->insert_id();

        // $this->db->where('id', $insert_last_id);
        // $this->db->update('score',$input);

        // flashSuccess('新增資料成功。');

        // 導回原本的頁面
        // $panel= $this->input->post("panel");
        // $row=select_submenu($panel);
        // redirect($row["link"], 'refresh');
    }

    //排行榜紀錄前十位就好
    public function rank(){
        //抓出score的資料
        //使用type類別進行分數排列
        $ranks=$this->db->select('name, school, score, MAX(created_at) AS created_at')->group_by(array('school' , 'name', 'score'))->order_by('score','desc')->get_where('score', array(
            'type' => $this->input->get('type'),
            'recover' =>0,
        ), 10)->result_array();

        //輸出結果
        //時間格式  'time':'105.08/22 15:02'  
        foreach ($ranks as $key => $rank) {
            // $ranks[$key]['time'] = date("Y.m/d H:i", strtotime($rank['created_at']));
            $time = date("Y.m/d H:i", strtotime($rank['created_at']));
            $changeYear = explode(".", $time);
            $ranks[$key]['time'] = ($changeYear[0]-1911).".".$changeYear[1];
        }
        echo json_encode($ranks);
        exit;
    }

    //不雅字詞驗證
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

        if($error) {
            echo json_encode(array('error' => true,'message' => '包含不雅字，請修改', ));
        } else {
            echo json_encode(array('error' => false,'message' => '無不雅字詞', ));
        }

    }

}


