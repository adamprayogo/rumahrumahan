<div class="page-header controls-wrapper">
	<a href="<?php echo base_url().'admin/estates/create';?>" class="btn btn-primary"><?php echo lang('msg_add');?></a>
	<input class="search-query form-control col-sm-2" type="text" value=""  placeholder="<?php echo lang('msg_search');?>">
</div>

<script type="text/javascript">
$('.search-query').keypress(function(e) {
	var code = (e.keyCode ? e.keyCode : e.which);
	if (code == 13) {
		var q = $('.search-query').val();
		if (q != "") {
			location.href ="<?php echo base_url().'admin/estates/search';?>?query=" + q;
		}
	}
})
</script>

<h4>
	<?php if(isset($search_title)){?>
	<?php echo $search_title;?>
	<?php }; ?>
</h4>

<div class="row wrapper">
	<div class="col-lg-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th><a href="">#</a></th>
					<th><?php echo lang('msg_thumbnail'); ?></th>
					<th><?php echo lang('msg_title'); ?></th>
					<th><?php echo lang('msg_price'); ?></th>
					<th><?php echo lang('msg_post_user'); ?></th>
					<th><?php echo lang('msg_activated'); ?></th>
					<th><?php echo lang('msg_types'); ?></th>
					<th><?php echo lang('msg_operation'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if($list!=null)
					foreach($list as $r){
						?>
						<tr>
							<td><?php echo $r->id;?></td>
							<?php if($r->image_path!=null){
								?>
								<td><img class="thumbnail" src='<?php echo base_url().$r->image_path;?>' alt="<?php echo $r->title;?>"/></td>
								<?php }else{ ?>
								<td><img class="thumbnail" src='<?php echo base_url()."statics/images/no_photo.png";?>' alt="<?php echo $r->title;?>"/></td>
								<?php } ?>
								<td><?php echo $r->title;?></td>
								<td>
									<?php echo $r->price; //format_vnd($r->price) ?>

									<?php
									if($r->time_rate!=-1){
										echo '&nbsp;/&nbsp;m<sup>2</sup>';
									}

									?>
								</td>
								<td><?php echo $r->user_name;?></td>
								<td><?php
								if($r->activated == ACTIVATED){
									echo '<div class="label label-success">'.lang('msg_activated').'</div>';
								}else{
									echo '<div class="label label-danger">'.lang('msg_deactivated').'</div>';
								}
								?></td>

								<th>
									<?php 
									$types=explode(',', $r->types_id);
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
										<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
											Operation
											<span class="caret"></span>
										</a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo base_url().'admin/estates/deactivated?id='.$r->id;?>"><?php echo lang('msg_deactivated'); ?></a></li>
											<li><a href="<?php echo base_url().'admin/estates/activated?id='.$r->id;?>"><?php echo lang('msg_activated'); ?></a></li>
											<li><a href="<?php echo base_url().'admin/estates/edit_get?id='.$r->id;?>"><?php echo lang('msg_edit');?></a></li>
											<li><a href="<?php echo base_url().'admin/estates/delete?id='.$r->id;?>" onclick="return confirm('<?php echo lang('msg_confirm_delete'); ?>')"><?php echo lang('msg_delete');?></a></li>
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