<?php
include("layout/list_partials.php");

// 取出索引欄位中的資料值

$panel= 21;
// $id = $this->input->get('id');

$row=select_submenu($panel);
redirect($row["link"]."&panel=".$panel, 'refresh');
// redirect($row["modifylink"]."&mpanel=".$panel."&id=".$id, 'refresh');
?>

<!--Datatable with tools menu -->
<div class="panel panel-default">
	
	<div class="datatable-tools">
		<table class="table">
			
			
		</table>
	</div>
</div>
	<!-- /datatable with tools menu -->
<script>
$(function() {
    $( "#date #date_from" ).datepicker();
    $( "#date #date_to" ).datepicker();
});
$("#period").click(function(){
	var from=document.getElementById('date_from').value;
	var to=document.getElementById('date_to').value;
	var store=document.getElementById('kind').value;

	window.location = "<?=site_url('backend/page?panel=6&acc='); ?>"+store+"&period="+from+"~"+to;
});

function sel_acc(acc) 
{ 
    window.location = "<?=site_url('backend/page?panel=6&acc='); ?>"+acc;
}
</script>