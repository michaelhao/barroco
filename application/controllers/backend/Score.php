<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Score extends CI_Controller {

	public function sort()
	{
		// 抓出需要被排序的資料
		$score = $this->db->get_where('score', 
			array('id' => $this->input->get("id"),)
		)->row_array();

		// 抓出一起排序的資料
		$scores = $this->db->get_where('score', 
			array(
				'id' => $article['id'],
				'type' => $article['type'],
				'created_at' => $article['created_at'],
				'school' => $article['school'],
				'name' => $article['name'],
				'score' => $article['score'],
				
			)
		)->result_array();

		// 處理排序的資料
		$articles = arraySort($articles, $article, $this->input->get("id"));

		foreach ($articles as $key => $article) {
			$this->db->where('id', $article["id"]);
			$input = array(
					'id' => $article["id"],
					'type' => $article['type'],
					'created_at' => date('Y-m-d H:i:s'),
					'school' => $article['school'],
					'name' => $article['name'],
					'score' => $article['score']
			);
			$this->db->update('article', $input); 
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
		$this->db->update('score', $input); 
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
				'type' => $this->input->post('type'), 
				'created_at' => date('Y-m-d H:i:s'),
				'school' => $this->input->post('school'),
				'name' => $this->input->post('name'),
				'score' => $this->input->post('score'),
		);
		$this->db->insert('score', $input); 
		$insert_last_id = $this->db->insert_id();

		// 更新 SORT
		$scores_count =$this->db->get_where('score', array(
			'id' => $this->input->post('id'),
			'type' => $this->input->post('type'),
			'created_at' => $this->input->post('created_at'),
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
				'type' => $this->input->post('type'), 
				'school' => $this->input->post('school'),
				'name' => $this->input->post('name'),
				'score' => $this->input->post('score'),
				'updated_at' => date('Y-m-d H:i:s'),
		);
		$this->db->where('id', $this->input->post("id"));
		$this->db->update('score', $input); 

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
		// p($this->input->post("panel"));
		redirect($row["link"], 'refresh');
	}

	public function show()
	{
		$id = $this->input->get("id");
		$show_static = $this->input->get("show_static");
		if($show_static=='open'){
			$show=2;
		}else{
			$show=1;
		}
		$input=array(
			'show' => $show,
			'created_at' => date('Y-m-d H:i:s'),
		);
		$this->db->where('id', $id);
		$this->db->update('scores', $input); 
	}
}


