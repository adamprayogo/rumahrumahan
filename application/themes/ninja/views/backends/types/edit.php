<?php
$CI =& get_instance();
;?>

	<form class="form-horizontal" id="form" method="post" >
		<fieldset>
			<?php 
			if($CI->session->flashdata('msg_ok')){
				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>'.$CI->session->flashdata('msg_ok').'</div>';
			}
			;?>
			<input type="hidden" name="id_post" id="id_post" value="<?php echo $obj[0]->id;?>">
			<div class="form-group">
				<label class="control-label col-sm-2" for="txtName"><?php echo lang('msg_name');?></label>
				<div class="controls col-sm-10">
					<input type="text" id="name" name="name" value="<?php echo $obj[0]->name;?>" class="form-control">
					<?php echo form_error('name');?>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="txtName"><?php echo lang('msg_parent_categories');?></label>
				<div class="col-sm-10">
					<select id="parent_id" name="parent_id" class="form-control">
						<option value="0">-----<?php echo lang('msg_not_set'); ?>----</option>
						<?php foreach($types as $r){?>
						?>
						<option value="<?php echo $r->id;?>"  <?php 
						if ($r->id==$obj[0]->parent_id){
							echo ' selected';
						}
						?>><?php echo $r->name;?></option>
						<?php }?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="txtName"><?php echo lang('msg_type_menu'); ?></label>
				<div class="col-sm-10">
					<select name="type" class="form-control">
						<option value="1" <?php if($obj[0]->type==1){echo ' selected';} ?>><?php echo lang('msg_estates_post')?></option>
						<option value="2" <?php if($obj[0]->type==2){echo ' selected';} ?>><?php echo lang('msg_news') ?></option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="txtName"><?php echo lang('msg_position'); ?></label>
				<div class="col-sm-10">
					<input type="text" id="order" name="order" value="<?php echo $obj[0]->order;?>" class="form-control">
					<?php echo form_error('order');?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<button type="submit" class="btn btn-primary" >
						<?php echo lang('msg_save');?>
					</button>
				</div>
			</div>
		</fieldset>
	</form>
</div>