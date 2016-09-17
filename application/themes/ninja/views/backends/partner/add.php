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
			<div class="col-xs-10 col-xs-offset-2">
				<button type="submit" class="btn btn-primary" >
					<?php echo lang('msg_save');?>
				</button>
				<input type="reset" class="btn" value="<?php echo lang('msg_reset');?>"/>
			</div>
		</div>

	</fieldset>
</form>

<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#content').tinymce({
                        // Location of TinyMCE script
                        script_url : '<?php echo base_url()?>statics/tinymce/tiny_mce.js',
                        language : "vi",
                        width:'100%',
                        height:'500',
                        // General options
                        theme : "advanced",
                        plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

                        // Theme options
                        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
                        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
                        theme_advanced_toolbar_location : "top",
                        theme_advanced_toolbar_align : "left",
                        theme_advanced_statusbar_location : "bottom",
                        theme_advanced_resizing : true,

                        // Example content CSS (should be your site CSS)
                        //content_css : "css/content.css",

                        // Drop lists for link/image/media/template dialogs
                        template_external_list_url : "lists/template_list.js",
                        external_link_list_url : "lists/link_list.js",
                        external_image_list_url : "lists/image_list.js",
                        media_external_list_url : "lists/media_list.js",

                        // Replace values for the template plugin
                        template_replace_values : {
                        	username : "Some User",
                        	staffid : "991234"
                        }
                    });	
});
</script>
