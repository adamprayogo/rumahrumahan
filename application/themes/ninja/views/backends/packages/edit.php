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
			<input type="hidden" id="id" name="id" value="<?php echo $obj[0]->id; ?>">
			<div class="form-group">
				<label class="control-label col-xs-2" ><?php echo lang('msg_title');?></label>
				<div class="col-xs-10">
					<input type="text" id="title" name="title" class="form-control" value="<?php echo $obj[0]->title;?>">
					<?php echo form_error('title');?>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-xs-2"><?php echo lang('msg_price'); ?></label>
				<div class="col-xs-10">
					<input type="text" id="price" name="price" class="form-control" value="<?php echo $obj[0]->price; ?>">
					<?php echo form_error('price'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-xs-2"><?php echo lang('msg_maximum_listing');?></label>
				<div class="col-xs-10">
					<input type="text" id="maximum_listing" name="max_post" class="form-control" value="<?php echo $obj[0]->max_post; ?>">
					<?php echo form_error('maximum_listing');?>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-xs-2"><?php echo lang('msg_expiration_time');?></label>
				<div class="col-xs-10">
					<input type="text" id="expr_time" name="expr_time" class="form-control" value="<?php 
					echo $obj[0]->expr_time;
					?>">
					<?php echo form_error('expiration_time');?>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-xs-2"><?php echo lang('msg_description');?></label>
				<div class="col-xs-10">
					<textarea class="form-control" name="description" cols="10"><?php echo $obj[0]->description; ?></textarea>
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