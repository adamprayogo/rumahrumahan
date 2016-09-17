<?php
$CI =& get_instance();
?>
<form class="form-horizontal" id="form" method="post" >
	<fieldset>
		<?php 
		if($CI->session->flashdata('msg_ok')){
			echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>'.$CI->session->flashdata('msg_ok').'</div>';
		}
		;?>
		<input type="hidden" id="id_post" name="id_post" value="<?php echo $obj[0]->id; ?>"> 

		<div class="form-group">
			<label class="control-label col-xs-2" for="txtName"><?php echo lang('msg_avatar');?></label>
			<div class="col-xs-10">
				<img src="<?php echo base_url().$obj[0]->path ?>" width="100" height="100">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-xs-2" for="txtName"><?php echo lang('msg_upload_avatar');?></label>
			<div class="col-xs-10">
				<input type="file" id="avt" class="form-control" name="avt">
				<span style="margin-top:5px;display:block">JPEG|JPN|PNG 5MB</span>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-xs-2"><?php echo lang('msg_title');?></label>
			<div class="col-xs-10">
				<input type="text" id="title" name="title" class="form-control" value="<?php echo $obj[0]->title; ?>" placeholder="<?php echo lang('msg_title'); ?>">
				<?php echo form_error('title');?>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-xs-2">Link</label>
			<div class="col-xs-10">
				<input type="text" id="link" name="link" class="form-control" value="<?php echo $obj[0]->link; ?>" placeholder="Link">
				<?php echo form_error('link');?>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-xs-2">Vị trí</label>
			<div class="col-xs-10">
				<select class="form-control" name="position">
					<option value="1" <?php if($obj[0]->position==1){echo 'selected';} ?>>Top Banner</option>
					<option value="2" <?php if($obj[0]->position==2){echo 'selected';} ?>>Footer Banner</option>
					<option value="3" <?php if($obj[0]->position==3){echo 'selected';} ?>>Banner Trái</option>
					<option value="4" <?php if($obj[0]->position==4){echo 'selected';} ?>>Banner Phải</option>
				</select>
			</div>
		</div>


		<div class="form-group">
			<div class="col-xs-10 col-xs-offset-2">
				<button type="submit" class="btn btn-primary" >
					<?php echo lang('msg_save');?>
				</button>
				<input type="reset" class="btn" value="<?php echo lang('msg_reset');?>"/>
			</div>
		</div>

	</fieldset>
</form>
