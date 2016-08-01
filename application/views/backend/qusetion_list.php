<?php
include("layout/list_partials.php");
$articles=$this->db->order_by('created_at','desc')->get_where('question', array(
	'recover' =>0,
))->result_array();
 // p($this->db->last_query());
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
					<th>圖片</th>
					<th>簡述</th>
					<th>顯示/隱藏</th>
					<th>功能</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($articles as $key => $article) {
				?>
					<tr>
						<td><?=date('Y-m-d',strtotime($article["created_at"]));?></td>
						<td>
							<?php if(!empty($article["pic"])) { ?>
							<a href="<?=$article["pic"];?>" class="lightbox">
							<img src="<?=$article["pic"];?>" alt="" class="img-media">
							</a>
							<?php } ?>
						</td>

						<td><?=$article["description"];?></td>
						<td>
							<?php if ($article['display'] == 1) { ?>
								<a href='###' id='open<?=$article["id"]?>' class='btn btn-success rightCHK' onclick="showUrl('question/display','<?=$article["id"]?>','open')">
								<span class='icon-user-plus2'></span>顯示</a>

								<a style = "display:none" href='###' id='close<?=$article["id"]?>' class='btn btn-danger rightCHK' onclick="showUrl('question/display','<?=$article["id"]?>','close')">
								<span class='icon-user-plus2'></span>隱藏</a>
								
							<?php }else{ ?>

								<a style = "display:none" href='###' id='open<?=$article["id"]?>' class='btn btn-success rightCHK' onclick="showUrl('question/display','<?=$article["id"]?>','open')">
								<span class='icon-user-plus2'></span>顯示</a>

								<a href='###' id='close<?=$article["id"]?>' class='btn btn-danger rightCHK' onclick="showUrl('question/display','<?=$article["id"]?>','close')">
								<span class='icon-user-plus2'></span>隱藏</a>
							<?php } ?>
						</td>

						<td>
							<div class="btn-group" >
								<a href="<?=$modify . "&id=" . $article["id"];?>" class="btn btn-icon btn-danger modifybu"><i class="icon-wrench2"></i></a>
							</div>
							<div class="btn-group delete">
								<a onclick="deletelist('<?php echo "question/delete?panel=".$this->input->get('panel')."&id=".$article["id"];?>')" href="#" class="btn btn-icon btn-success modifybu"><i class="icon-remove"></i></a>
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
