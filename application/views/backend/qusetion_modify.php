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

$question_options=$this->db->order_by('id', 'desc')->get_where('question_option', array(
	'question_id' => $row['id'],
	'recover' => 0,
))->result_array();


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
	        'id' => 'description',
	        'label' => '簡述:',
	        'type' => 'textarea',
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
<?php 
$row_submenu_2=select_submenu(23);			
$name2=$row_submenu_2["name"];
$insert=$row_submenu_2["insertlink"];
$modify=$row_submenu_2["modifylink"];
$link=$row_submenu_2["link"];
$recover=$row_submenu_2["recoverlink"];
$type=$row_submenu_2["typelink"];
?>


<?php if (substr($row['id'],-4,4) != "0000") { ?>

	<BR>
	<BR>
	<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-table"></i><?=$name2?>列表</h6>	
		<a href="<?=$insert?>&question_id=<?=$this->input->get('id')?>" class="btn btn-success pull-right"><span class="icon-plus"></span> <?=$name2;?>新增</a>

	</div>
	
	<!--Datatable with tools menu -->
	<div class="datatable-tools2">
	<table class="table">
		<thead>
			<tr>
				<th>題目選項</th>
				<th>是否正確</th>
				<th>功能</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($question_options as $key => $question_option) {
			?>
				<tr>
					<td><?=$question_option['description']?></td>
					<td>

						<?php if ($question_option['correct'] == 1) { ?>
								<a href='###' id='open<?=$question_option["id"]?>' class='btn btn-success rightCHK' onclick="showUrl1('question_option/correct','<?=$question_option["id"]?>','open')">
								<span class='icon-user-plus2'></span>正確</a>

								<a style = "display:none" href='###' id='close<?=$question_option["id"]?>' class='btn btn-danger rightCHK' onclick="showUrl1('question_option/correct','<?=$question_option["id"]?>','close')">
								<span class='icon-user-plus2'></span>不正確</a>
								
							<?php }else{ ?>

								<a style = "display:none" href='###' id='open<?=$question_option["id"]?>' class='btn btn-success rightCHK' onclick="showUrl1('question_option/correct','<?=$question_option["id"]?>','open')">
								<span class='icon-user-plus2'></span>正確</a>

								<a href='###' id='close<?=$question_option["id"]?>' class='btn btn-danger rightCHK' onclick="showUrl1('question_option/correct','<?=$question_option["id"]?>','close')">
								<span class='icon-user-plus2'></span>不正確</a>
							<?php } ?>
						
					</td>

					<td>
							<div class="btn-group" >
								<a href="<?=$modify . "&id=" . $question_option["id"];?>" class="btn btn-icon btn-danger modifybu"><i class="icon-wrench2"></i></a>
							</div>
							<div class="btn-group delete">
								<a onclick="delete_detail('<?php echo "question_option/delete_detail?panel=".$this->input->get('mpanel')."&id=".$question_option["id"];?>')" href="#" class="btn btn-icon btn-success modifybu"><i class="icon-remove"></i></a>
							</div>
						</td>
				</tr>

			<?php
			}
			?>
		</tbody>
	</table>
</div>

<?php } ?>

<script>
function delete_detail(url) 
{ 
	if (confirm("確認是否要刪除資料。")) {
		window.location.href = url;
	}
}
</script>