<?php
$CI =& get_instance();
?>

	<form class="form-horizontal" id="form" method="post" enctype="multipart/form-data">
		<fieldset>
			<?php 
			if($CI->session->flashdata('msg_ok')){
				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>'.$CI->session->flashdata('msg_ok').'</div>';
			}
			?>
			<input type="hidden" name="id_post" id="id_post" value="<?php echo $obj[0]->id;?>">
			<div class="form-group">
				<label class="control-label col-xs-2" for="txtName"><?php echo lang('msg_phone');?></label>
				<div class="col-xs-10">
					<input type="text" id="hotline" name="hotline" class="form-control" value="<?php echo $obj[0]->phone; ?>">
					<?php echo form_error('hotline');?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-10 col-xs-offset-2">
					<button type="submit" class="btn btn-primary" >
						<?php echo lang('msg_save');?>
					</button>
				</div>
			</div>
		</fieldset>
	</form>

	