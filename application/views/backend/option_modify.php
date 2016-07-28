<?php
include("layout/modify_partials.php");
include("layout/fileupload_partials.php");
// 取出索引欄位中的資料值
$id=$this->input->get("id");
// p($id);
$row=$this->db->get_where('question_option', array('id' => $id,))->row_array();
// p($this->db->last_query())
// p($row)

?>

<!-- 表單開始 -->
<?php
// Start Form
echo $this->form_builder->open_form(
	array(
		'role' => 'form',
		'action' => 'backend/question_option/modify_detail',
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

// End Button
echo $form_end_button;
// End Form
echo $this->form_builder->close_form();;
?>
<!-- 表單結束 -->