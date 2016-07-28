<?php
include("layout/modify_partials.php");
include("layout/fileupload_partials.php");
// 取出索引欄位中的資料值
$id=$this->input->get("id");
$row=$this->db->get_where('bad_language', array('id' => $id,))->row_array();
?>

<!-- 表單開始 -->
<?php
// Start Form
echo $this->form_builder->open_form(
	array(
		'role' => 'form',
		'action' => 'backend/bad_language/modify',
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
	        'id' => 'name',
	        'label' => '不雅字詞:',
	        'class' => 'required',
	    ),
	    // array(
	    //     'id' => 'show',
	    //     'type' => 'dropdown',
	    //     'label' => '上架狀態:',
	    //     'class' => 'required select',
	    //     'options' => array( 1=>'顯示', 2 =>'隱藏',),
	    // ),
), $row);

// End Button
echo $form_end_button;
// End Form
echo $this->form_builder->close_form();;
?>
<!-- 表單結束 -->