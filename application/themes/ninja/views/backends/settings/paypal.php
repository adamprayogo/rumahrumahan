
	<!--show alert messager-->

	<!--end show alert messager-->

	<form class="form-horizontal" id="form" method="post" action="" enctype="multipart/form-data">
		<fieldset>
	

			<div class="form-group">
				<label class="control-label col-xs-3" for="txtName"><?php echo lang('msg_user_name');?></label>
				<div class="controls col-xs-9">
					<input type="text" class="form-control" name="username" id="user_name" value="<?php echo $obj['username']; ?>">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-xs-3" for="txtName"><?php echo lang('msg_pwd');?></label>
				<div class="controls col-xs-9">
					<input type="password" class="form-control" name="pwd" id="skype" value="<?php echo $obj['pwd']; ?>">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-xs-3" for="txtName"><?php echo lang('msg_signature');?></label>
				<div class="controls col-xs-9">
					<input type="text" class="form-control" name="signature" id="signature" value="<?php echo $obj['signature']; ?>">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-xs-3" for="txtName"><?php echo lang('msg_test') ?></label>
				<div class="col-xs-9">
					<div class="checkbox">
						<label>
							<input type="radio"  class="position" name="is_test" value="true" <?php if($obj['is_test']=='true'){echo 'checked="true"';} ?>>&nbsp;<?php echo lang('msg_true'); ?></label>
						</div>
						<div class="checkbox">
							<label>
								<input type="radio" class="position" name="is_test" value="false" <?php if($obj['is_test']=='false'){echo 'checked="false"';} ?>>&nbsp;<?php echo lang('msg_false'); ?></label>
							</div>
						</div>
					</div>


					<div class="form-group">
						<div class="col-xs-9 col-xs-offset-3">
							<button type="submit" class="btn btn-primary" >
								<?php echo lang('msg_save');?>
							</button>
							<a href="<?php echo base_url();?>admin/settings/reset_paypal" class="btn btn-default">
								<?php echo lang('reset_default');?>
							</a>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
