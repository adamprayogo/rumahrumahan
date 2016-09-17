
	<div class="page-header controls-wrapper">
		<a href="<?php echo base_url().'admin/hotline/create';?>" class="btn btn-primary"><?php echo lang('msg_add');?></a>
		<input class="search-query form-control col-sm-2" type="text" value=""  placeholder="<?php echo lang('msg_search');?>">
	</div>
	
	<script type="text/javascript">
	$('.search-query').keypress(function(e) {
		var code = (e.keyCode ? e.keyCode : e.which);
		if (code == 13) {
			var q = $('.search-query').val();
			if (q != "") {
				location.href ="<?php echo base_url().'admin/hotline/search';?>?query=" + q;
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
						<th><?php echo lang('msg_phone');?></th>
						<th><?php echo lang('msg_status');?></th>
						<th><?php echo lang('msg_operation');?></th>
					</tr>
				</thead>
				<tbody>
					<?php if($list!=null)
					foreach($list as $r){
						?>
						<tr>
							<td><?php echo $r->id;?></td>
							<td><?php echo $r->phone;?></td>
							<td><?php 
							if($r->activated == ACTIVATED){
								echo '<span class="label label-success" >'.lang('msg_activate').'</span>';
							}
							if($r->activated == DEACTIVATED){
								echo '<span class="label label-danger">'.lang('msg_deactivate').'</span>';
							}
							?></td>
							<td>
								<div class="btn-group">
									<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">
										<?php echo lang('msg_operation');?>
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu">
										<li>
											<a href="<?php echo base_url().'admin/hotline/activate?id='.$r->id;?>">
												<?php echo lang('msg_activate');?>
											</a>
										</li>
										<li>
											<a href="<?php echo base_url().'admin/hotline/deactivate?id='.$r->id;?>">
												<?php echo lang('msg_deactivate');?>
											</a>
										</li>

										<li>
											<a href="<?php echo base_url().'admin/hotline/edit?id='.$r->id;?>">
												<?php echo lang('msg_edit');?>
											</a>
										</li>
										<li>
											<a href="<?php echo base_url().'admin/hotline/delete?id='.$r->id;?>" onclick="return confirm('<?php echo lang('msg_confirm_delete');?>')"><?php echo lang('msg_delete');?></a>
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
