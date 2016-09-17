<script type="text/javascript" src="<?php echo base_url()?>statics/tinymce/jquery.tinymce.js"></script>
<?php
$CI =& get_instance();
;?>
<form class="form-horizontal" id="form" method="post"  enctype="multipart/form-data">
	<fieldset>

		<?php 
		if($CI->session->flashdata('msg_ok')){
			echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>'.$CI->session->flashdata('msg_ok').'</div>';
		}

		if($CI->session->flashdata('msg_failed')){
			echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>'.$CI->session->flashdata('msg_failed').'</div>';
		}
		?>

		<div class="form-group">
			<label class="control-label col-xs-2" for="txtName"><?php echo lang('msg_avatar');?></label>
			<div class="col-xs-10">
				<img src="" width="100" height="100">
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
				<input type="text" id="title" name="title" class="form-control" value="<?php echo set_value('title') ?>" placeholder="<?php echo lang('msg_title'); ?>">
				<?php echo form_error('title');?>
			</div>
		</div>


		<div class="form-group">
			<label class="control-label col-xs-2">Link</label>
			<div class="col-xs-10">
				<input type="text" id="link" name="link" class="form-control" value="<?php echo set_value('title') ?>" placeholder="Link">
				<?php echo form_error('link');?>
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

