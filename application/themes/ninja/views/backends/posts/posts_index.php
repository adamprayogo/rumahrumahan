
	<div class="page-header controls-wrapper">
		<a href="<?php echo base_url().'admin/posts/create';?>" class="btn btn-primary"><?php echo lang('msg_add');?></a>
		<input class="search-query form-control col-sm-2" type="text" value=""  placeholder="<?php echo lang('msg_search');?>">
	</div>

	<script type="text/javascript">
	$('.search-query').keypress(function(e) {
		var code = (e.keyCode ? e.keyCode : e.which);
		if (code == 13) {
			var q = $('.search-query').val();
			if (q != "") {
				location.href ="<?php echo base_url().'admin/posts/search';?>?query=" + q;
			}
		}
	})
	</script>
	
	<!--show alert messager-->
	<h4>
		<?php if(isset($search_title))
		echo $search_title;?>
	</h4>
	<!--end show alert messager-->
	<div class="row wrapper">
		<div class="col-lg-12 col-xs-12">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th><a href="">#</a></th>
						<th><?php echo lang('msg_title');?></th>
						<!-- <th><?php echo lang('msg_content'); ?></th> -->
						<th><?php echo lang('msg_status'); ?></th>
						<!-- <th>Ghim</th> -->
						<th><?php echo lang('msg_categories'); ?></th>
						<th><?php echo lang('msg_operation');?></th>
					</tr>
				</thead>
				<tbody>
					<?php if($list!=null)
					foreach($list as $r){
						?>
						<tr>
							<td><?php echo $r->id;?></td>
							<td><?php echo $r->title;?></td>
							<!-- <td><?php echo htmlspecialchars_decode($r->content); ?></td> -->
							<td><?php 
							if($r->activated == ACTIVATED){
								echo '<span class="label label-success" >'.lang('msg_activate').'</span>';
							}
							if($r->activated == DEACTIVATED){
								echo '<span class="label label-danger">'.lang('msg_deactivate').'</span>';
							}
							?></td>
							<?php 
						/*	if($r->pined == ACTIVATED){
								echo '<span class="label label-success" >Đã ghim</span>';
							}
							if($r->pined == DEACTIVATED){
								echo '<span class="label label-danger">Chưa ghim</span>';
							}*/
							?>

							<th>
								<?php 
								$types=explode(',', $r->cat_id);
								$CI =& get_instance();
								$CI->load->model('type_model');
								foreach ($types as $id1) {
									$child=$CI->type_model->get_by_id($id1);
									if(isset($child)){
										echo '
										<a href="'.base_url().'admin/types/detail?id='.$id1.'"><span class="label label-danger">'.$child[0]->name.'</span></a>';
									}
								}
								?>
							</th>

							<td>
								<div class="btn-group">
									<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
										<?php echo lang('msg_operation');?>
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu">
										<li>
											<a href="<?php echo base_url().'admin/posts/activate?id='.$r->id;?>">
												<?php echo lang('msg_activate');?>
											</a>
										</li>
										<li>
											<a href="<?php echo base_url().'admin/posts/deactivate?id='.$r->id;?>">
												<?php echo lang('msg_deactivate');?>
											</a>
										</li>

								<!-- 		<li>
									<a href="<?php //echo base_url().'admin/posts/pin?id='.$r->id;?>">
										ghim
									</a>
								</li>
								
								<li>
									<a href="<?php //echo base_url().'admin/posts/depin?id='.$r->id;?>">
										bỏ ghim
									</a>
								</li> -->

										<li>
											<a href="<?php echo base_url().'admin/posts/edit?id='.$r->id;?>">
												<?php echo lang('msg_edit');?>
											</a>
										</li>


										<li>
											<a href="<?php echo base_url().'admin/posts/delete?id='.$r->id;?>" onclick="return confirm('<?php echo lang('msg_confirm_delete');?>')"><?php echo lang('msg_delete');?></a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<?php 
					}
					?>
				</tbody>
			</table>
			<?php echo $page_link;?>
		</div>
	</div>
