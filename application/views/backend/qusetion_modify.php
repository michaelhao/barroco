<?php
include("layout/modify_partials.php");
include("layout/list_partials.php");
include("layout/fileupload_partials.php");
// 取出索引欄位中的資料值
$id=$this->input->get("id");
// p($id);
$row=$this->db->get_where('question', array(
	'id' => $id,
	))->row_array();
 // p($row);
// p($row['correct']);

$correctOption = array(
	    array(
	            'id' => 'radio_button_1',
	            'value' => 1,
	            'label' => '選項一',
	            
	    ),
	    array(
	            'id' => 'radio_button_2',
	            'value' => 2,
	            'label' => '選項二',
	            
	    ),
	    array(
	            'id' => 'radio_button_3',
	            'value' => 3,
	            'label' => '選項三',
	            
	    ),
	    array(
	            'id' => 'radio_button_4',
	            'value' => 4,
	            'label' => '選項四',
	            
	    ),
);

if($row['correct'] == 1){
 	$correctOption[0]['checked'] = true;
}else if($row['correct'] == 2){
 	$correctOption[1]['checked'] = true;
}else if($row['correct'] == 3){
	$correctOption[2]['checked'] = true;
}else if ($row['correct'] == 4) {
	$correctOption[3]['checked'] = true;
}
?>

<!-- 表單開始 -->
<?php
// Start Form
echo $this->form_builder->open_form(
	array(
		'role' => 'form',
		'action' => 'backend/question/modify',
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
	        'id' => 'pic',
	        'type' => 'html',
	        'label' => '主圖(H300XW203):',
	        'html' => get_single_fileupload_html(0),
	    ),
	    array(
	        'id' => 'pic_explan',
	        'label' => '圖片說明:',
	    ), 
	    array(
	        'id' => 'description',
	        'label' => '簡述:',
	        'type' => 'textarea',
	        'class' => 'required',
	    ), 
	    array(
	        'id' => 'option1',
	        'label' => '選項一:',
	        'class' => 'required',
	    ), 
	    array(
	        'id' => 'option2',
	        'label' => '選項二:',
	        'class' => 'required',
	    ), 
	    array(
	        'id' => 'option3',
	        'label' => '選項三:',
	        'class' => 'required',
	    ), 
	    array(
	        'id' => 'option4',
	        'label' => '選項四:',
	        'class' => 'required',
	    ), 
	    array(
	        'id' => 'correct',
	        'label' => '正確選項:',
	        'type' => 'radio',
	        'options' => $correctOption,
	        'class' => 'required',
	    ), 
	    array(
	        'id' => 'display',
	        'type' => 'dropdown',
	        'label' => '上架狀態:',
	        'class' => 'required select',
	        'options' => array( 1=>'顯示', 2 =>'隱藏'),
	    ),
), $row);
// End Button
echo $form_end_button;
// End Form
echo $this->form_builder->close_form();
?>
<!-- 表單結束 -->