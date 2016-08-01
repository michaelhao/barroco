<?php
include("layout/modify_partials.php");
include("layout/fileupload_partials.php");
// 取出索引欄位中的資料值

$id=$this->input->get("id");
$row=$this->db->get_where('question_option', array(
	'id' => $id,
	))->row_array();

$question_id = $row['question_id'];

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
	    ),
	    array(
	        'id' => 'description',
	        'label' => '題目選項:',
	        'class' => 'required',
	    ),
	    array(
	        'id' => 'correct',
	        'type' => 'dropdown',
	        'label' => '是否正確:',
	        'class' => 'required select',
	        'options' => array( 0=>'不正確', 1 =>'正確')
	    ),
), $row);




$panel = 21;
$form_end_button = '
<div class="form-actions text-right">
	<input type="button" value="回前一頁" class="btn btn-warning" onclick="window.location.href = \''.site_url('backend/page?mpanel=').$panel."&id=".$question_id.'\'">
	<input type="submit" value="確認" class="btn btn-primary"
		onclick=""
	>
</div>';
// End ButtonP
echo $form_end_button;
// End Form
echo $this->form_builder->close_form();
?>
<!-- 表單結束 -->