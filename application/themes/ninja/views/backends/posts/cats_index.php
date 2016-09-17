
	<div class="page-header controls-wrapper">
		<a href="<?php echo base_url().'admin/post_cats/create';?>" class="btn btn-primary"><?php echo lang('msg_add');?></a>
		<input class="search-query form-control col-sm-2" type="text" value=""  placeholder="<?php echo lang('msg_search');?>">
	</div>

	<script type="text/javascript">
	$('.search-query').keypress(function(e) {
		var code = (e.keyCode ? e.keyCode : e.which);
		if (code == 13) {
			var q = $('.search-query').val();
			if (q != "") {
				location.href ="<?php echo base_url().'admin/post_cats/search';?>?query=" + q;
			}
		}
	})
	</script>

	<!--end show alert messager-->
	<div class="row wrapper">
		<div class="col-md-12 col-xs-12">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th><a href="">#</a></th>
						<th>Tên chuyên mục</th>
						<th>Id chuyên mục cha</th>
						<th>Vị trí </th>
						<th><?php echo lang('msg_status'); ?></th>
						<th colspan="3"><?php echo lang('msg_operation');?></th>
					</tr>
				</thead>
				<tbody>
					<?php if($list!=null)
					foreach($list as $r){
						?>
						<tr>
							<td><?php echo $r->id;?></td>
							<td><?php echo $r->name; ?></td>
							<?php 
							if($r->parent_id==0){
								?>
								<td><span class="label label-danger"><?php echo lang('msg_not_set'); ?></span></a></td>
								<?php }else{
									?>
									<td><a href="<?php echo BASE_URL() ?>admin/post_cats/detail?id=<?php echo $r->parent_id ?>"><?php echo $r->parent_id; ?></a></td>
									<?php 
								}
								?>
								<td>
									<?php echo $r->order; ?>
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
												<a href="<?php echo base_url().'admin/post_cats/activate?id='.$r->id;?>">
													<?php echo lang('msg_activate');?>
												</a>
											</li>
											<li>
												<a href="<?php echo base_url().'admin/post_cats/deactivate?id='.$r->id;?>">
													<?php echo lang('msg_deactivate');?>
												</a>
											</li>

											<li>
												<a href="<?php echo base_url().'admin/post_cats/edit?id='.$r->id;?>">
													<?php echo lang('msg_edit');?>
												</a>
											</li>
											
											<li>
												<a href="<?php echo base_url().'admin/post_cats/delete?id='.$r->id;?>" onclick="return confirm('<?php echo lang('msg_confirm_delete');?>')"><?php echo lang('msg_delete');?></a>
											</li>
										</ul>
									</div>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<?php  
					if(isset($page_link) && $page_link!=null){
						echo $page_link;
					}?>
				</div>
			</div>
		