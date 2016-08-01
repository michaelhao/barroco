<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question_option extends CI_Controller {

	public function insert()
	{
		
		// 寫入資料庫
		$input = array(
			'description' => $this->input->post('description'),
			// 'question_id' => $this->input->post('question_id'),
			'created_at' => date('Y-m-d H:i:s'), 
		);
		$this->db->insert('question', $input); 
		$last_id = $this->db->insert_id();
		
		flashSuccess('新增資料成功。');

		// 導回原本的頁面
		// $panel= $this->input->post("panel");
		// $row=select_submenu($panel);
		// redirect($row["link"], 'refresh');
		$panel= $this->input->post("panel");
		$row=select_submenu($panel);
		$url = $row["modifylink"]."&mpanel=".$panel."&id=".$last_id;
		redirect($url, 'refresh');
	}

	public function insert_detail()
	{
		//抓取question_id值對應question的id
		$question_id=$this->input->post('question_id');
		$row=$this->db->get_where('question', array('id' => $question_id))->row_array();
		//要寫入資料庫的欄位
		$input = array(
			'description' => $this->input->post('description'),
			'question_id' => $question_id,
			'created_at' => date('Y-m-d H:i:s'), 
		);
		// 寫入資料庫
		$this->db->insert('question_option', $input);
		flashSuccess('新增資料成功。');

		// 導回原本的頁面
		$panel= 21;
		$row=select_submenu($panel);
		redirect($row["modifylink"]."&mpanel=".$panel."&id=".$this->input->post('question_id'), 'refresh');
	}


	public function modify()
	{
		// 寫入資料庫
		$input = array(
			'correct'=> $this->input->post('correct'),
			'description' => $this->input->post('description'),
			'updated_at' => date('Y-m-d H:i:s'),  
		);
		$this->db->where('id', $this->input->post("id"));
		$this->db->update('question', $input); 

		// 發送紅利&累計購物金
		$this->load->model('user_model');
		$this->user_model->bonus($this->input->post("id"));
		
		flashSuccess('修改資料成功。');

		// 導回原本的頁面
		$panel= $this->input->post("panel");
		$row=select_submenu($panel);
		redirect($row["link"], 'refresh');
	}
	public function modify_detail()
	{
		// 寫入資料庫
		$input = array(
			'correct'=> $this->input->post('correct'),
			'description' => $this->input->post('description'),
			'updated_at' => date('Y-m-d H:i:s'), 
		);
		$this->db->where('id', $this->input->post("id"));
		$this->db->update('question_option', $input); 
		
		flashSuccess('修改資料成功。');

		// 導回原本的頁面
		$question_option =$this->db->get_where('question_option', array('id' => $this->input->post("id"),))->row_array();
		$question =$this->db->get_where('question', array('id' => $question_option['question_id']))->row_array();

		$panel= 21;
		$row=select_submenu($panel);
		redirect(
			$row["modifylink"]."&mpanel=".$panel."&id=".$this->input->post('question_id'), 
			'refresh');
	}

	public function delete_detail() {
		// 寫入資料庫
		$input = array(
			'display' => 0,
			'recover' => 1, 
			'updated_at' => date('Y-m-d H:i:s'), 
		);
		$this->db->where('id', $this->input->get("id"));
		$this->db->update('question_option', $input); 

		flashSuccess('刪除資料成功。');

		// 導回原本的頁面
		$question_option =$this->db->get_where('question_option', array(
			'id' => $this->input->get("id"),
			))->row_array();

		$question =$this->db->get_where('question', array(
			'id' => $question_option['question_id'],
			))->row_array();
		
		$panel= 21;
		$row=select_submenu($panel);
		redirect($row["modifylink"]."&id=".$question_option['question_id'], 'refresh');
	}


	public function correct()
	{
		$id = $this->input->get("id");
		$correct_static = $this->input->get("correct_static");
		if($correct_static=='open'){
			$show=0;
		}else{
			$show=1;
		}
		$input=array(
			'correct' => $show,
			'created_at' => date('Y-m-d H:i:s'),
		);

		$this->db->where('id', $id);
		$this->db->update('question_option', $input); 
	}



}


