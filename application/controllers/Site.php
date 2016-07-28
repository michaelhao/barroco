<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// 使用 Composer
include_once './vendor/autoload.php';

class Site extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->library('cart');
		$this->load->library('image');
    }

    // 取得 EMAIL 設定
    public function get_config() {
    	
    }

    public function machineinfo() {
    	
    }

    // 首頁
	public function index()
	{
		$this->load->view('site/index');
	}
	/* --------------------------
		題目新增
	 --------------------------	*/

	public function insert_question(){
		$this->load->view('site/insert_question');
	}

 
	/* --------------------------
		快問快答
	 --------------------------	*/
	public function news()
	{
		// 每頁抓取資料數
		$count = 5;

		// 取得當下頁數
		$index = 0;
		if($this->input->get('per_page')) {
			$index = $this->input->get('per_page');
		}

		// 抓出全部資料
		$datas = $this->db->get_where('question', array(
		    'Recover' => 0, 
		    'display' => 1
		))->result_array();
		$config = $this->get_pagination_config(site_url('site/news'), count($datas),$count);

		// 抓出塞選資料
		$news = $this->db->order_by('id','desc')->get_where('question', array(
		    'Recover' => 0,
		    'display' => 1
		), $config['per_page'], $index)->result_array();

		// 抓取圖片
    	$news = $this->image->getImage($news);
		$data['news'] = $news;
		$this->load->view('site/news', $data);
	}
	/* --------------------------
		快問快答detail
	 --------------------------	*/
	public function news_detail()
	{
		$input = array();
		$id = $this->input->get('id');
		// 抓出單筆資料
		$news = $this->db->get_where('question_option', array(
			'question_id'=>$this->input->get('id'),
		    'Recover' => 0, 
		))->result_array();
		// p($news);
		$news = $this->image->getImage($news);

		$input['new'] = $news[0];

		// 抓出前四筆最新消息
		$news = $this->db->limit(4)->order_by('created_at','desc')->get_where('question_option', array(
			'question_id'=>$this->input->get('id'),
		    'Recover' => 0, 
		))->result_array();
		$news = $this->image->getImage($news);
		$input['news'] = $news;

		$this->load->view('site/news_detail', $input);
	}

	/* --------------------------
		排行榜
	 --------------------------	*/
	public function blog()
	{
		// 每頁抓取資料數
		$count = 1;

		// 取得當下頁數
		$index = 0;
		if($this->input->get('per_page')) {
			$index = $this->input->get('per_page');
		}

		// 抓出媒體報導類別
		$types=$this->db->get_where('type', array('parent_id' => 3, 'recover' => 0,  ))->result_array();
		$data['types'] = $types;


		// 取得類別
		if($this->input->get('type')) {
			$type = $this->input->get('type');
		} else {
			// 若無類別資料類別預設0
			if(empty($types)) {
				$type = 0;
			} else {
				$type = $types[0]['id'];
			}
		}

		// 抓出全部資料s	
		$datas = $this->db->get_where('score', array(
		    'Recover' => 0, 
		    'type' => $type
		))->result_array();
		$config = $this->get_pagination_config(site_url('site/blog')."?type=".$type, count($datas),$count);

		
		// 抓出塞選資料
		$blogs = $this->db->order_by('score','desc')->get_where('score', array(
		    'Recover' => 0, 
		    'type' => $type
		), $config['per_page'], $index)->result_array();

		// 抓取圖片
    	$blogs = $this->image->getImage($blogs);
		$data['blogs'] = $blogs;
		// p($blogs);

		$this->load->view('site/blog', $data);
	}
	/* --------------------------
		排行榜detail
	 --------------------------	*/
	public function blog_detail()
	{
		$input = array();
		$id = $this->input->get('id');

		// 抓出單筆資料
		$blogs = $this->db->get_where('score', array(
		    'Recover' => 0, 
		    'id' => $id,
		))->result_array();
		$blogs = $this->image->getImage($blogs);
		$input['blog'] = $blogs[0];

		// 抓出媒體報導類別
		$types=$this->db->get_where('type', array('parent_id' => 3, 'recover' => 0,  ))->result_array();
		$input['types'] = $types;

		$this->load->view('site/blog_detail', $input);
	}

	/* --------------------------
		會員功能
	 --------------------------	*/
	// 訂單查詢
    public function member() {
		// // 抓取使用者資料
		// $user_data = $this->session->userdata('user');
		// $user = $this->db->get_where('users', array(
		//   'email' => $user_data['email'], 
		// ))->row_array();

		// // 抓取使用者訂單
		// $orders = $this->db->order_by('created_at','desc')->get_where('order', array(
		//   'order_uid' => $user['id'], 
		// ))->result_array();

		// // 產品
		// $product = $this->db->order_by('created_at','desc')->get_where('product', array(
		//   'id' => $this->input->get('product_id'),
		// ))->row_array();

		// // 抓取問與答
		// $qas = $this->db->order_by('created_at','desc')->get_where('services', array(
		//   'type' => 1, 
		//   'user_id' => $user['id'], 
		// ))->result_array();

		// // 抓取悄悄話
		// $services = $this->db->order_by('created_at','desc')->get_where('services', array(
		//   'type' => 2, 
		//   'user_id' => $user['id'], 
		// ))->result_array();

		$this->load->view('site/member');
    }

	// 忘記密碼
    public function forget_password() {
		$this->load->view('site/forget_password');
    }

	// 重設密碼
    public function reset_password() {
		$this->load->view('site/reset_password');
    }

	// 會員註冊
    public function register() {
		$this->load->view('site/register');
    }

	// 會員登入
    public function login() {
		$this->load->view('site/login');
    }

	/* --------------------------
		分頁功能
	 --------------------------	*/
	public function get_pagination_config($url, $total_rows, $per_page){
		$this->load->library('pagination');
		$config['base_url'] = $url;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page; 
		// $config['use_page_numbers'] = TRUE;
		$config['display_pages'] = TRUE; //隱藏頁數
		$config['num_links'] = 2;
		$config['page_query_string'] = TRUE;
		 
        $config['first_link']      = '&laquo;'; //自訂開始分頁連結名稱
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']      = '&raquo;'; //自訂結束分頁連結名稱
        $config['last_tag_open']  = '<li>';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link']      = 'Next page';
        $config['next_tag_open']  = '<li>'; //自訂下一頁標籤
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link']      = 'Last page';
        $config['prev_tag_open']  = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open']   = '<li class="active"><a>';
        $config['cur_tag_close']  = '</a></li>';
        $config['num_tag_open']   = '<li>';
        $config['num_tag_close']  = '</li>';
		$this->pagination->initialize($config); 
		return $config;
	}

    public function main_call_detail($maintype_id){
    	$detail_type= array();
    	$minor=$this->db->get_where('type', array(
    		'panel' => 3,
    		'recover' => 0,
    		'parent_id' => $maintype_id,
    	))->result_array();
    	if ($minor==null) {
    		array_push($detail_type, $maintype_id); 
    	}else{
    		foreach ($minor as $key => $value) {
	    		$detail=$this->db->get_where('type', array(
		    		'panel' => 3,
		    		'recover' => 0,
		    		'parent_id' => $value['id'],
		    	))->result_array();
		    	if ($detail==null) {
		    		array_push($detail_type, $maintype_id);
		    	}else{
		    		foreach ($detail as $key => $value2) {
		    		array_push($detail_type, $value2['id']);
		    		}
		    	}
		    	
	    	}
    	}
    	return $detail_type;
    }
}

?>


