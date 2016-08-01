<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

	public function sort()
	{
		// 抓出需要被排序的資料
		$question = $this->db->get_where('question', 
			array('id' => $this->input->get("id"),)
		)->row_array();

		// 抓出一起排序的資料
		$questions = $this->db->get_where('question', 
			array(
				'id' => $article['id'],
				'created_at' => $article['created_at'],
				'updated_at' => $article['updated_at'],
				'description' => $article['description'],
				'display' => $article['display'],
				'recover' => $article['recover'],
				'sort' => $article['sort']
			)
		)->result_array();

		

		// 處理排序的資料
		$questions = arraySort($questions, $question, $this->input->get("id"));

		foreach ($questions as $key => $question) {
			$this->db->where('id', $question["id"]);
			$input = array(
					'sort' => $question["sort"],
					'updated_at' => date('Y-m-d H:i:s'),
			);
			$this->db->update('question', $input); 
		}
	}

	public function delete()
	{
		// 寫入資料庫
		$this->db->where('id', $this->input->get("id"));
		$input = array(
				'recover' => 1,
				'updated_at' => date('Y-m-d H:i:s'),
		);
		$this->db->update('question', $input); 
		// p($this->db->last_query());
		flashSuccess('刪除資料成功。');

		// 導回原本的頁面
		$panel=$this->input->get("panel");
		$row=select_submenu($panel);
		redirect($row["link"], 'refresh');
	}

	public function insert()
	{
		// 寫入資料庫
		$input = array( 
			'created_at' => date('Y-m-d H:i:s'), 
			'description' => $this->input->post('description'), 
			'display' => 1,
			'sort' => 0,
		);
		
		$this->db->insert('question', $input); 	
		$insert_last_id = $this->db->insert_id();

		// 更新 SORT
		$questions_count =$this->db->get_where('question', array(
			'id' => $this->input->post('id'),
			'created_at' => $this->input->post('created_at'),
			'recover' => 0
			// 'type' => $this->input->post('type'), 
		))->num_rows();

		// 查詢對應的 IMAGE 資料，更新 IMAGE
		$images = $this->db->get_where('image', array(
			'file_timestamp' => $this->input->post('file_timestamp'),
		))->result_array();
		foreach ($images as $key => $image) {
			$this->db->where('id', $image['id']);
			$this->db->update('image', array('source_id' => $insert_last_id, )); 
		}

		flashSuccess('新增資料成功。');

		// 導回原本的頁面
		$panel= $this->input->post("panel");
		$row=select_submenu($panel);
		redirect($row["link"], 'refresh');
	}

	public function modify()
	{
		// 寫入資料庫
		$input = array(
			'updated_at' => $this->input->post('updated_at'), 
			'description' => $this->input->post('description'), 
			'display' => $this->input->post('display'),
			'recover' => $this->input->post('recover'),
			'sort' => $this->input->post('sort'),
		);
		$this->db->where('id', $this->input->post("id"));
		$this->db->update('question', $input); 

		// 查詢對應的 IMAGE 資料，更新 IMAGE
		$images = $this->db->get_where('image', array(
			'file_timestamp' => $this->input->post('file_timestamp'),
		))->result_array();
		foreach ($images as $key => $image) {
			$this->db->where('id', $image['id']);
			$this->db->update('image', array('source_id' => $this->input->post("id"), )); 
		}
		
		flashSuccess('修改資料成功。');

		// 導回原本的頁面
		$panel= $this->input->post("panel");
		$row=select_submenu($panel);
		redirect($row["link"], 'refresh');
	}

	public function display()
	{
		$id = $this->input->get("id");
		$display_static = $this->input->get("display_static");
		if($display_static=='open'){
			$show=0;
		}else{
			$show=1;
		}

		// 寫入資料庫
		$input=array(
			'display' => $show,
		);

		$this->db->where('id', $id);
		$this->db->update('question', $input); 
	}

	
}


