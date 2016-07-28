<?php
include("layout/insert_partials.php");
include("layout/fileupload_partials.php");
// 取出索引欄位中的資料值
$id=$this->input->get("id");
// p($id);
$row=$this->db->get_where('question', array('id' => $id))->row_array();
$question=$row['question_id'];
$question_options=$this->db->order_by('id')->get_where('question_option', array(
	'recover' => 0,
))->result_array();

?>

<!-- 表單開始 -->
<?php
// Start Form
echo $this->form_builder->open_form(
	array(
		'role' => 'form',
		'action' => 'backend/question_option/insert_detail',
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
	        'value' => $this->input->get('ipanel')
	    ),
	    array(
	        'id' => 'question_id',
	        'type' => 'hidden',
	        'value' => $this->input->get('question_id')
	    ),
	    array(
	        'id' => 'description',
	        'label' => '題目選項:',
	        'class' => 'required',
	    ),
	    array(
	        'id' => 'correct',
	        'label' => '是否正確:',
	        'class' => 'required',
	        'value' => $this->input->get('correct')
	    )
), $row);
// p($this->input->get('question_id'));
// End Buttonta
echo $form_end_button;
// End Form
echo $this->form_builder->close_form();
?>
<!-- 表單結束 -->
