<?php
$CI =& get_instance();
?>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#name').focus();
});
</script>
	<form class="form-horizontal" id="form" method="post" enctype="multipart/form-data">
		<fieldset>
			<?php 
			if($CI->session->flashdata('msg_ok')){
				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>'.$CI->session->flashdata('msg_ok').'</div>';
			}
			?>

			<div class="form-group">
				<label class="control-label col-xs-2" for="txtName"><?php echo lang('msg_avatar');?></label>
				<div class="col-xs-10">
					<img src="<?php echo ($obj[0]->avt!=null)?base_url().$obj[0]->avt:base_url().'statics/images/no_photo.png'; ?>" width="100" height="100">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-xs-2" for="txtName"><?php echo lang('msg_upload_avatar');?></label>
				<div class="col-xs-10">
					<input type="file" id="avt" class="form-control" name="avt">
					<span style="margin-top:5px;display:block">JPEG|JPN|PNG 5MB</span>
				</div>
			</div>

			<input type="hidden" name="id_post" id="id_post" value="<?php echo $obj[0]->id;?>">
			<div class="form-group">
				<label class="control-label col-xs-2" for="txtName"><?php echo lang('msg_title'); ?></label>
				<div class="col-xs-10">
					<input type="text" id="title" name="title" value="<?php echo $obj[0]->title; ?>" class="form-control" >
					<?php echo form_error('title'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-xs-2" for="txtName"><?php echo lang('msg_types'); ?></label>
				<div class="controls col-xs-9 multil_select">
					<?php 
					$CI =& get_instance();
					$CI->load->model('type_model');
					$types=$obj[0]->cat_id;
					$types_array=explode(',', $types);
					function show_types($parent_id,$types_array){
						$CI =& get_instance();
						$types=$CI->type_model->get('*',array('parent_id'=>$parent_id,'type'=>2));
						if($types!=null){
							foreach ($types as $r) {
								echo '<div class="checkbox">
								<label>
								<input  ';
								foreach ($types_array as $id) {
									if($id==$r->id){
										echo 'checked="checked"';
									}
								}
								echo ' type="checkbox" class="types" name="types[]" value="'.$r->id.'">'.$r->name.'
								</label>';
								show_types($r->id,$types_array);
								echo '</div>';
							}
						}
					}
					show_types(0,$types_array);
					?>
				</div>
				<div class="col-xs-10 col-xs-offset-2">
					<?php echo form_error('types'); ?>
				</div>
			</div>

			<style type="text/css">
			.multil_select{
				height:150px;
				display:block;
				position:relative;
				overflow-y:scroll;
				border:1px solid #CDCDCD;
				margin-left: 15px;
				padding-left: 35px;
			}
			</style>

			<div class="form-group">
				<label class="control-label col-xs-2" for="txtName"><?php echo lang('msg_description'); ?></label>
				<div class="controls col-xs-10">
					<textarea rows="10" id="description" name="description" class="form-control"><?php echo $obj[0]->description; ?></textarea>
					<?php echo form_error('description'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-xs-2" for="txtName"><?php echo lang('msg_keywords'); ?></label>
				<div class="controls col-xs-10">
					<input type="text" class="form-control" name="keyword" id="keyword" value="<?php echo $obj[0]->keyword; ?>">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="txtName"><?php echo lang('msg_content'); ?></label>
				<div class="controls col-sm-10">
					<textarea id="content" name="content" class="form-control">
						<?php echo htmlspecialchars_decode($obj[0]->content) ?></textarea>
						<?php echo form_error('content'); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-10 col-xs-offset-2">
						<button type="submit" class="btn btn-primary" >
							<?php echo lang('msg_save'); ?>
						</button>
						<input type="reset" class="btn" value="<?php echo lang('msg_reset'); ?>"/>
					</div>
				</div>
			</fieldset>
		</form>


	<script type="text/javascript" src="<?php echo base_url()?>statics/tinymce/jquery.tinymce.js"></script>
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
