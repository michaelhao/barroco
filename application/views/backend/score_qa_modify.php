<?php
include("layout/modify_partials.php");
include("layout/fileupload_partials.php");
// 取出索引欄位中的資料值
$id=$this->input->get("id");
$row=$this->db->get_where('score', array('id' => $id,))->row_array();
// p($this->db->last_query());
// 抓取類型選單
$rowtype=$this->db->get_where('type', array('parent_id' => 3, 'recover' => 0,  ))->result_array();
$typeAry = [];
foreach ($rowtype as $key => $type) {
	$typeAry[] = $type;
	$subtype = $this->db->get_where('type', array('parent_id' => $type['id'], 'recover' => 0,  ))->result_array();
	foreach ($subtype as $key => $value) {
		$value['name'] = ' -- '.$value['name'];
		$typeAry[] = $value;
	}
}
?>

<!-- 表單開始 -->
<?php
// Start Form
echo $this->form_builder->open_form(
	array(
		'role' => 'form',
		'action' => 'backend/score/modify',
		'method' => 'post'
	)
);
// Form Input
echo $this->form_builder->build_form_horizontal(
    array(
	    array(
	        'id' => 'id',
	        'type' => 'hidden',
	        'value' => $this->input->get('id')
	    ),
	    array(
	        'id' => 'panel',
	        'type' => 'hidden',
	        'value' => $this->input->get('mpanel')
	    ),
	    array(
	        'id' => 'type',
	        'type' => 'dropdown',
	        'label' => '類別:',
	        'class' => 'required select',
	        'options' => formOptionArray($typeAry),
	    ),
	    array(
	        'id' => 'name',
	        'label' => '姓名:',
	        'class' => 'required',
	    ),
	    array(
	        'id' => 'school',
	        'label' => '學校:',
	        'class' => 'required',
	    ),
	    array(
	        'id' => 'score',
	        'label' => '分數:',
	        'class' => 'required',
	    ),
	), $row);

// End Button
echo $form_end_button;
// End Form
echo $this->form_builder->close_form();
?>
<!-- 表單結束 -->