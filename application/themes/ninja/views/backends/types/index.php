<div class="page-header controls-wrapper">
	<a href="<?php echo base_url().'admin/types/create';?>" class="btn btn-primary"><?php echo lang('msg_add');?></a>
	<input class="search-query form-control col-sm-2" type="text" value=""  placeholder="<?php echo lang('msg_search');?>">
</div>

<script type="text/javascript">
$('.search-query').keypress(function(e) {
	var code = (e.keyCode ? e.keyCode : e.which);
	if (code == 13) {
		var q = $('.search-query').val();
		if (q != "") {
			location.href ="<?php echo base_url().'admin/types/search';?>?query=" + q;
		}
	}
})
</script>

<!--show alert messager-->
<h4>
	<?php if(isset($search_title)){ ?>
	<?php echo $search_title;?>
	<?php };?>
</h4>
<!--end show alert messager-->
<div class="row wrapper">
	<div class="col-lg-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th><a href="">#</a></th>
					<th><?php echo lang('msg_name'); ?></th>
					<th><?php echo lang('msg_parent_categories'); ?></th>
					<th><?php echo lang('msg_position'); ?> </th>
					<th><?php echo lang('msg_type_menu'); ?></th>
					<th><?php echo lang('msg_status'); ?></th>
					<th colspan="3"><?php echo lang('msg_operation');?></th>
				</tr>
			</thead>
			<tbody>
				<?php if($list!=null)
				foreach($list as $r){?>
				<tr>
					<td><?php echo $r->id;?></td>
					<td><?php echo $r->name;?></td>
					<?php 
					if($r->parent_id==0){
						?>
						<td><span class="label label-danger"><?php echo lang('msg_not_set'); ?></span></a></td>
						<?php }else{
							?>
							<th>
								<?php 
										//$types=explode(',', $r->types_id);
								$CI =& get_instance();
								$CI->load->model('type_model');
										//foreach ($types as $id1) {
								$child=$CI->type_model->get_by_id($r->parent_id);
								if(isset($child)){
									echo '
									<a href="'.base_url().'admin/types/detail?id='.$r->parent_id.'"><span class="label label-success">'.$child[0]->name.'</span></a>';
								}
										//}
								?>
							</th>

							<?php 
						}
						?>
						<td>
							<?php echo $r->order; ?>
						</td>

						<td>
							<?php 
							if($r->type==1){
								echo '<span class="label label-danger">'.lang('msg_estates_post').'</span>';
							}else{
								echo '<span class="label label-warning">'.lang('msg_news').'</span>';
							}
							?>
						</td>

						<td>
							<?php 
							if($r->activated==ACTIVATED){
								echo '<span class="label label-success">'.lang('msg_activated').'</span>';
							}else{
								echo '<span class="label label-danger">'.lang('msg_deactivated').'</span>';
							}
							?>
						</td>

						<td>
							<div class="btn-group">
								<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
									<?php echo lang('msg_operation');?>
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="<?php echo base_url().'admin/types/activate?id='.$r->id;?>">
											<?php echo lang('msg_activate');?>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url().'admin/types/deactivate?id='.$r->id;?>">
											<?php echo lang('msg_deactivate');?>
										</a>
									</li>

									<li>
										<a href="<?php echo base_url().'admin/types/edit?id='.$r->id;?>">
											<?php echo lang('msg_edit');?>
										</a>
									</li>

									<li>
										<a href="<?php echo base_url().'admin/types/delete?id='.$r->id;?>" onclick="return confirm('<?php echo lang('msg_confirm_delete');?>')"><?php echo lang('msg_delete');?></a>
									</li>
								</ul>
							</div>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>
			<?php if(isset($page_link) && $page_link!=null){
				echo $page_link;
			}?>
		</div>
	</div>
	<!--end row fluid-->

