<script type="text/javascript">
$('.search-query').keypress(function(e) {
	var code = (e.keyCode ? e.keyCode : e.which);
	if (code == 13) {
		var q = $('.search-query').val();
		if (q != "") {
			location.href ="<?php echo base_url().'admin/contact/search';?>?query=" + q;
		}
	}
})
</script>

<div class="row-fluid">
	<div style="margin-bottom:10px"><a href="<?php echo base_url().'admin/languages/create';?>" class="btn btn-primary"><?php echo lang('msg_add');?></a></div>
	
</div>
<!--end show alert messager-->
<div class="row wrapper">
	<div class="col-md-12 col-xs-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th><a href="">#</a></th>
					<th><?php echo lang('msg_name'); ?></th>
					<th><?php echo lang('msg_activated'); ?></th>
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
						<td><?php 
						if($r->activated == ACTIVATED){
							echo '<span class="label label-success" >'.lang('msg_yes').'</span>';
						}
						if($r->activated == DEACTIVATED){
							echo '<span class="label label-danger">'.lang('msg_no').'</span>';
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
										<a href="<?php echo base_url().'admin/languages/activate?id='.$r->id;?>">
											<?php echo lang('msg_activated');?>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url().'admin/languages/deactivate?id='.$r->id;?>">
											<?php echo lang('msg_deactivated');?>
										</a>
									</li>

									<li>
										<a href="<?php echo base_url().'admin/languages/edit?id='.$r->id;?>">
											<?php echo lang('msg_edit');?>
										</a>
									</li>

									<li>
										<a href="<?php echo base_url().'admin/languages/delete?id='.$r->id;?>" onclick="return confirm('<?php echo lang('msg_confirm_delete');?>')">
											<?php echo lang('msg_delete');?>
										</a>
									</li>
								</ul>
							</div>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php echo $page_link;?>
		</div>
	</div>
