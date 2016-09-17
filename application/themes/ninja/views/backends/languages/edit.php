<script type="text/javascript" src="<?php echo base_url() ?>statics/codemirror/codemirror.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>statics/codemirror/mode/php/php.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>statics/codemirror/mode/clike/clike.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>statics/codemirror/addon/edit/matchbrackets.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>statics/codemirror/addon/selection/active-line.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>statics/codemirror/codemirror.css">
<style type="text/css">
.CodeMirror{
	height: 500px;
	background: rgb(229, 229, 229);
}
</style>
<?php
$CI =& get_instance();
?>
<div class="container-fluid wrapper">
	<form class="form-horizontal" id="form" method="post" action="" enctype="multipart/form-data">
		<fieldset>
			<?php 
			if($CI->session->flashdata('msg_ok')){
				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>'.$CI->session->flashdata('msg_ok').'</div>';
			}
			?>
			<input type="hidden" name="id_post" id="id_post" value="<?php echo $obj[0]->id;?>">
			<!-- <div class="form-group">
				<label class="control-label col-xs-2" for="txtName"><?php //echo lang('msg_lang_name');?></label>
				<div class="col-xs-10">
					<input type="text" id="lang_name" class="form-control" name="lang_name" value="<?php //echo $obj[0]->name;?>">
					<?php //echo form_error('lang_name');?>
				</div>
			</div> -->

			<div class="form-group">
				<label class="control-label col-xs-2" for="txtName"><?php echo lang('msg_lang');?></label>
				<div class="col-xs-10 code-wrapper" >
					<textarea class="col-xs-12 code"
					name="string">
					<?php 
					echo $lang_string;
					?>
				</textarea>
				<?php echo form_error('string');?>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-xs-2" for="txtName"><?php echo lang('msg_form_validation_lang');?></label>
			<div class="col-xs-10 code-wrapper" >
				<textarea class="col-xs-12 code"
				name="form_validation_lang">
				<?php 
				echo $form_validation_lang;
				?>
			</textarea>
			<?php echo form_error('form_validation_lang');?>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-xs-2" for="txtName"><?php echo lang('msg_upload_lang');?></label>
		<div class="col-xs-10 code-wrapper" >
			<textarea class="col-xs-12 code"
			name="upload_lang">
			<?php 
			echo $upload_lang;
			?>
		</textarea>
		<?php echo form_error('upload_lang');?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-xs-2" for="txtName"><?php echo lang('msg_imglib_lang');?></label>
	<div class="col-xs-10 code-wrapper" >
		<textarea class="col-xs-12 code"
		name="imglib_lang">
		<?php 
		echo $imglib_lang;
		?>
	</textarea>
	<?php echo form_error('imglib_lang');?>
</div>
</div>

<div class="form-group">
	<label class="control-label col-xs-2" for="txtName"><?php echo lang('db_lang');?></label>
	<div class="col-xs-10 code-wrapper" >
		<textarea class="col-xs-12 code"
		name="db_lang">
		<?php 
		echo $db_lang;
		?>
	</textarea>
	<?php echo form_error('db_lang');?>
</div>
</div>

<div class="form-group">
	<label class="control-label col-xs-2" for="txtName"><?php echo lang('msg_email_lang');?></label>
	<div class="col-xs-10 code-wrapper" >
		<textarea class="col-xs-12 code"
		name="email_lang">
		<?php 
		echo $email_lang;
		?>
	</textarea>
	<?php echo form_error('email_lang');?>
</div>
</div>

<div class="form-group">
	<div class="col-xs-10 col-xs-offset-2">
		<button type="submit" class="btn btn-primary" >
			<?php echo lang('msg_save');?>
		</button>
		<!-- <input class="btn" type="reset" value="<?php //echo lang('msg_reset');?>" class="form-control"> -->
	</div>
</div>
</fieldset>
</form>
<script type="text/javascript">
(function($){$.fn.codemirror = function(options) {

	var result = this;

	var settings = $.extend( {
		'mode' : 'javascript',
		'lineNumbers' : false,
		'runmode' : false
	}, options);

	if (settings.runmode) this.each(function() {
		var obj = $(this);
		var accum = [], gutter = [], size = 0;
		var callback = function(string, style) {
			if (string == "\n") {
				accum.push("<br>");
				gutter.push('<pre>'+(++size)+'</pre>');
			}
			else if (style) {
				accum.push("<span class=\"cm-" + CodeMirror.htmlEscape(style) + "\">" + CodeMirror.htmlEscape(string) + "</span>");
			}
			else {
				accum.push(CodeMirror.htmlEscape(string));
			}
		}
		CodeMirror.runMode(obj.val(), settings.mode, callback);
		$('<div class="CodeMirror">'+(settings.lineNumbers?('<div class="CodeMirror-gutter"><div class="CodeMirror-gutter-text">'+gutter.join('')+'</div></div>'):'<!--gutter-->')+'<div class="CodeMirror-lines">'+(settings.lineNumbers?'<div style="position: relative; margin-left: '+size.toString().length+'em;">':'<div>')+'<pre class="cm-s-default">'+accum.join('')+'</pre></div></div></div>').insertAfter(obj);
		obj.hide();
	});
		else this.each(function() {
			result = CodeMirror.fromTextArea(this, settings);
		});

			return result;
		};})( jQuery );


		</script>

		<script type="text/javascript">
		$('.code').codemirror({
			lineNumbers: true,
			matchBrackets: true,
			mode: "text/x-php",
			indentUnit: 4,
			indentWithTabs: true
		});

		</script>
