<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bad_language extends CI_Controller {

	public function sort()
	{
		// 抓出需要被排序的資料
		$bad_language = $this->db->get_where('bad_language', 
			array('id' => $this->input->get("id"),)
		)->row_array();

		// 抓出一起排序的資料
		$bad_languages = $this->db->get_where('bad_language', 
			array(
				'id' => $article['id'],
				'created_at' => $article['created_at'],
				'updated_at' => $article['updated_at'],
				'name' => $article['name'],
				'display' => $article['display'],
				'recover' => $article['recover'],
				'sort' => $article['sort']
			)
		)->result_array();

		// 處理排序的資料
		$bad_languages = arraySort($bad_languages, $bad_language, $this->input->get("id"));

		foreach ($bad_languages as $key => $bad_language) {
			$this->db->where('id', $bad_language["id"]);
			$input = array(
					'sort' => $bad_language["sort"],
					'updated_at' => date('Y-m-d H:i:s'),
			);
			$this->db->update('bad_language', $input); 
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
		$this->db->update('bad_language', $input); 
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
			'name' => $this->input->post('name'),
			'created_at' => date('Y-m-d H:i:s'),  
		);
		// p($input);

		$this->db->insert('bad_language', $input); 
		$insert_last_id = $this->db->insert_id();

		// 更新 SORT
		$bad_languages_count =$this->db->get_where('bad_language', array(
			'id' => $this->input->post('id'),
			'created_at' => $this->input->post('created_at'),
			'name' => $this->input->post('name'),
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
			'name' => $this->input->post('name'),
			'updated_at' => date('Y-m-d H:i:s'), 
		);
		$this->db->where('id', $this->input->post("id"));
		$this->db->update('bad_language', $input); 

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
		$this->db->update('bad_languages', $input); 
	}
}


