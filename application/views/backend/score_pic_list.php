<?php
include("layout/list_partials.php");
$articles=$this->db->get_where('score', array(
	'recover' =>0,
	'type'=>12,
))->result_array();
// p($articles);
// 取得圖片
$CI =& get_instance();
$CI->load->library('image');
$articles = $CI->image->getImage($articles);
// 抓取管理者類別
foreach ($articles as $key => $article) {
	// 取得類別
	$articletype = $this->db->get_where(
		'type', array('id' => $article['type'],
	))->row_array();
	$articles[$key]['type_str'] = $articletype['name'];
}
?>
<!--Datatable with tools menu -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-table"></i><?=$name2?>列表</h6>	
		<!-- <a href="<?=$insert?>" class="btn btn-success pull-right"><span class="icon-plus"></span> <?=$name2;?>新增</a>  -->
	</div>
	<div class="datatable-tools">
		<table class="table">
			<thead>
				<tr>
					<th>姓名</th>
					<th>學校名稱</th>
					<th>分數</th>
					<th>新增時間</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($articles as $key => $article) {
				?>
					<tr>
						<td><?=$article["name"];?></td>
						<td><?=$article["school"];?></td>
						<td><?=$article["score"];?></td>
						<td><?=$article["created_at"]?></td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>
	<!-- /datatable with tools menu -->
