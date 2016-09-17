<?php
$CI =& get_instance();
;?>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#name').focus();
});
</script>

	<form class="form-horizontal" id="form" method="post" >
		<fieldset>
			<?php 
			if($CI->session->flashdata('msg_ok')){
				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>'.$CI->session->flashdata('msg_ok').'</div>';
			}
			;?>
			<div class="form-group">
				<label class="control-label col-sm-2" for="txtName"><?php echo lang('msg_name');?></label>
				<div class="controls col-sm-10">
					<input type="text" id="name" name="name" value="" class="form-control">
					<?php echo form_error('name');?>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="txtName"><?php echo lang('msg_parent_categories');?></label>
				<div class="col-sm-10">
					<select id="parent_id" name="parent_id" class="form-control">
						<option value="0">-----<?php echo lang('msg_not_set'); ?>----</option>
						<?php foreach($types as $r){?>
						<option value="<?php echo $r->id; ?>"><?php echo $r->name; ?></option>
						<?php }?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="txtName"><?php echo lang('msg_position'); ?></label>
				<div class="col-sm-10">
					<input type="text" id="order" name="order" value="" class="form-control">
					<?php echo form_error('order');?>
				</div>
			</div>


			<div class="form-group">
				<label class="control-label col-sm-2" for="txtName"><?php echo lang('msg_type_menu'); ?></label>
				<div class="col-sm-10">
					<select name="type" class="form-control">
						<option value="1"><?php echo lang('msg_estates_post')?></option>
						<option value="2"><?php echo lang('msg_news') ?></option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<button type="submit" class="btn btn-primary" >
						<?php echo lang('msg_save');?>
					</button>
					<button type="reset" class="btn"><?php echo lang('msg_reset');?></button>
				</div>
			</div>
		</fieldset>
	</form>
	<!--end form-->
	<!--end container fluid-->
</div>
