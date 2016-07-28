<?php
include("layout/list_partials.php");
$articles=$this->db->order_by('id','desc')->get_where('bad_language', array(
	'recover' => 0,
))->result_array();

$CI =& get_instance();
$CI->load->library('image');
$articles = $CI->image->getImage($articles);
?>
<!--Datatable with tools menu -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-table"></i><?=$name2?>列表</h6>	
		<a href="<?=$insert?>" class="btn btn-success pull-right"><span class="icon-plus"></span> <?=$name2;?>新增</a>
	</div>
	<div class="datatable-tools">
		<table class="table">
			<thead>
				<tr>
					<th>日期</th>
					<th>不雅字詞</th>
					<th>功能</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($articles as $key => $article) {
				?>
					<tr>
						<td><?=date('Y-m-d',strtotime($article["created_at"]));?></td>
						
						<td><?=$article["name"];?></td>
						<td>
							<div class="btn-group" >
								<a href="<?=$modify . "&id=" . $article["id"];?>" class="btn btn-icon btn-danger modifybu"><i class="icon-wrench2"></i></a>
							</div>
							<div class="btn-group delete">
								<a onclick="deletelist('<?php echo "bad_language/delete?panel=".$this->input->get('panel')."&id=".$article["id"];?>')" href="#" class="btn btn-icon btn-success modifybu"><i class="icon-remove"></i></a>
							</div>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>
	<!-- /datatable with tools menu -->
