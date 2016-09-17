<div class="page-header controls-wrapper">
	<a href="<?php echo base_url().'admin/packages/create';?>" class="btn btn-primary"><?php echo lang('msg_add');?></a>
</div>
<h4>
	<?php if(isset($search_title)){
		echo $search_title;
	}
	?>
</h4>

	<div class="row wrapper">
		<div class="col-lg-12">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th><a href="">#</a></th>
						<th><?php echo lang('msg_title'); ?></th>
						<th><?php echo lang('msg_price'); ?></th>
						<th><?php echo lang('msg_maximum_post'); ?></th>
						<th><?php echo lang('msg_expiration_time'); ?></th>
						<th><?php echo lang('msg_activated'); ?></th>
						<th><?php echo lang('msg_operation') ?></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if($list!=null)
						foreach($list as $r){
							?>
							<tr>
								<td><?php echo $r->id;?></td>
								<td><?php echo $r->title;?></td>
								<td><?php echo $r->price; ?></td>
								<td><?php echo $r->max_post;?></td>
								<td><?php echo $r->expr_time; ?></td>
								<td>
									<?php
									if($r->activated == ACTIVATED){
										echo '<div class="label label-success">'.lang('msg_activated').'</div>';
									}else{
										echo '<div class="label label-danger">'.lang('msg_deactivated').'</div>';
									}
									?>
								</td>
								<td>
									<div class="btn-group">
										<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
											Operation
											<span class="caret"></span>
										</a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo base_url().'admin/packages/deactivated?id='.$r->id;?>"><?php echo lang('msg_deactivated'); ?></a></li>
											<li><a href="<?php echo base_url().'admin/packages/activated?id='.$r->id;?>"><?php echo lang('msg_activated'); ?></a></li>
											<li><a href="<?php echo base_url().'admin/packages/edit?id='.$r->id;?>"><?php echo lang('msg_edit');?></a></li>
											<li><a href="<?php echo base_url().'admin/packages/delete?id='.$r->id;?>" onclick="return confirm('<?php echo lang('msg_confirm_delete'); ?>')"><?php echo lang('msg_delete');?></a></li>
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

		<!--end row fluid-->