<?php
$CI =& get_instance();
;?>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#name').focus();
});
</script>
<div class="container wrapper">
	<form class="form-horizontal" id="form" method="post">
		<fieldset>
			<legend>
				<?php echo lang('msg_add_county');?>
			</legend>
			<?php 
			if($CI->session->flashdata('msg_ok')){
				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>'.$CI->session->flashdata('msg_ok').'</div>';
			}
			;?>
			<div class="form-group">
				<label class="control-label col-xs-2" ><?php echo lang('msg_title');?></label>
				<div class="col-xs-10">
					<input type="text" id="title" name="title" class="form-control" value="<?php echo set_value('title');?>">
					<?php echo form_error('title');?>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-xs-2"><?php echo lang('msg_price'); ?></label>
				<div class="col-xs-10">
					<input type="text" id="price" name="price" class="form-control">
					<?php echo form_error('price'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-xs-2"><?php echo lang('msg_maximum_listing');?></label>
				<div class="col-xs-10">
					<input type="text" id="maximum_listing" name="max_post" class="form-control" >
					<?php echo form_error('max_post');?>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-xs-2"><?php echo lang('msg_expiration_time');?></label>
				<div class="col-xs-10">
					<input type="text" id="expiration_time" name="expr_time" class="form-control" >
					<?php echo form_error('expr_time');?>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-xs-2"><?php echo lang('msg_description');?></label>
				<div class="col-xs-10">
					<textarea class="form-control" name="description" cols="10"></textarea>
					<?php echo form_error('description');?>
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
</div>