<form class="form-horizontal" id="form" method="post" action="" enctype="multipart/form-data">
	<fieldset>
		<div class="form-group">
			<label class="control-label col-xs-3" for="txtName"><?php echo lang('msg_author');?></label>
			<div class="controls col-xs-9">
				<input type="text" class="form-control" name="author" id="author" value="<?php echo $obj['author']; ?>">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-xs-3" for="txtName"><?php echo lang('msg_title'); ?></label>
			<div class="controls col-xs-9">
				<input type="text" class="form-control" name="title" id="title" value="<?php echo $obj['title']; ?>">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-xs-3" for="txtName"><?php echo lang('msg_description');?></label>
			<div class="controls col-xs-9">
				<input type="text" class="form-control" name="desc" id="desc" value="<?php echo $obj['desc']; ?>">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-xs-3" for="txtName"><?php echo lang('msg_keywords');?></label>
			<div class="controls col-xs-9">
				<input type="text" class="form-control" name="keyword" id="keyword" value="<?php echo $obj['keyword']; ?>">
			</div>
		</div>


		<div class="form-group">
			<label class="control-label col-xs-3" for="txtName">Video Link</label>
			<div class="controls col-xs-9">
				<input type="text" class="form-control" name="video_link" id="video_link" value="<?php echo $obj['video_link']; ?>">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-xs-3" for="txtName"><?php echo lang('msg_twitter');?></label>
			<div class="controls col-xs-9">
				<input type="text" class="form-control" name="twitter" id="twitter" value="<?php echo $obj['twitter']; ?>">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-xs-3" for="txtName"><?php echo lang('msg_google_plus');?></label>
			<div class="controls col-xs-9">
				<input type="text" class="form-control" name="google_plus" id="google_plus" value="<?php echo $obj['google_plus']; ?>">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-xs-3" for="txtName"><?php echo lang('msg_pinterest');?></label>
			<div class="controls col-xs-9">
				<input type="text" class="form-control" name="pinterest" id="pinterest" value="<?php echo $obj['pinterest']; ?>">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-xs-3" for="txtName"><?php echo lang('msg_facebook_fanpage');?></label>
			<div class="controls col-xs-9">
				<input type="text" class="form-control" name="facebook_fanpage" id="facebook_fanpage" value="<?php echo $obj['facebook_fanpage']; ?>">
			</div>
		</div>


		<div class="form-group">
			<label class="control-label col-xs-3" for="txtName"><?php echo lang('msg_copyright');?></label>
			<div class="controls col-xs-9">
				<input type="text" class="form-control" name="copyright" id="copyright" value="<?php echo $obj['copyright']; ?>">
			</div>
		</div>


		<div class="form-group">
			<label class="control-label col-xs-3" for="txtName"><?php echo lang('msg_ga_code');?></label>
			<div class="controls col-xs-9">
				<textarea rows="10" class="form-control" id="ga_code" name="ga_code"><?php echo $obj['ga_code']; ?></textarea>	
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-9 col-xs-offset-3">
				<button type="submit" class="btn btn-primary" >
					<?php echo lang('msg_save');?>
				</button>
				<a href="<?php echo base_url();?>admin/settings/reset_general_settings" class="btn btn-default">
					<?php echo lang('reset_default');?>
				</a>
			</div>
		</div>
	</fieldset>
</form>
