<?php
include("layout/list_partials.php");

//抓出question_option的id(抓不到)
// $question_option =$this->db->get_where('question_option', array(
// 	'recover'=>0,
// 	))->row_array();
//question['id']比對question_option['question_id']
// $question =$this->db->get_where('question', array(
// 	'id' => $question_option['question_id']
// 	))->row_array();
// p($question['id']);

// $panel= 21;
// $id = $question['id'];

// $row=select_submenu($panel);
// redirect($row["modifylink"]."&id=".$id, 'refresh');
?>

<!--Datatable with tools menu -->
<div class="panel panel-default">
	
	<div class="datatable-tools">
		<table class="table">
			
			
		</table>
	</div>
</div>
	<!-- /datatable with tools menu -->
<!-- <script>
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
</script> -->