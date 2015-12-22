<?php $this->load->view('admin/includes/header'); ?>

<script type='text/javascript'  src='<?php echo base_url();?>js/includes/functions.js' > </script>
<script type='text/javascript'  src='<?php echo base_url();?>js/admin/static_page_banner/form.js' > </script>

<!-- Tabber -->
<link type="text/css" href="<?php echo base_url();?>added/tabber/style.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url();?>added/tabber/tabber.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>added/tabber/tabber-minimized.js"></script>


<!-- CK Editor -->
<script src="<?php echo base_url();?>added/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url();?>added/ckeditor/samples/assets/uilanguages/languages.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>added/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

		//EL Finder, By Gouda.
		file_browser_callback : 'elFinderBrowser',
		
		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

<script type="text/javascript">
  function elFinderBrowser (field_name, url, type, win) {
      var cmsURL = '<?php echo base_url();?>added/elfinder/elfinder.php';    // script URL - use an absolute path!
      if (cmsURL.indexOf("?") < 0) {
          //add the type as the only query parameter
          cmsURL = cmsURL + "?type=" + type;
      }
      else {
          //add the type as an additional query parameter
          // (PHP session ID is now included if there is one at all)
          cmsURL = cmsURL + "&type=" + type;
      }

      tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'elFinder 2.0',
          width : 900,  
          height : 450,
          resizable : "yes",
          inline : "yes",  // This parameter only has an effect if you use the inlinepopups plugin!
          popup_css : false, // Disable TinyMCE's default popup CSS
          close_previous : "no"
      }, {
          window : win,
          input : field_name
      });
      return false;
  }



</script>


<?php 

/**
 * Variables to store the value from database, to display on screen
 */
$id=				0;
$page_code=				'';
$title=				'';
$title_ar=			'';


$banner_image_thumbs='';
$banner_files='';

$banner_image_thumb_selected ='';
$banner_file_selected ='';

$last_modify_date='';
$are_disabled='';
$readonly='';

/**
 * Mode is varible store the status or the mode of current row, add-edit-view-return, return when wrong occur
 * 
 * @var string
 */
if($mode!='add')
{
	if($mode=='view')
	{
		$are_disabled="disabled='disabled'";
		$readonly="readonly='readonly'";
	}
	
	if($mode=='return')
	{
		
		$id=				$current_row['id'];
		$page_code=				$current_row['page_code'];
		$title=				$current_row['title'];
		$title_ar=			$current_row['title_ar'];
		
	}
	else 
	{
		$id=				$current_row->id;
		$page_code=				$current_row->page_code;
		$title=				$current_row->title;
		$title_ar=			$current_row->title_ar;
				
		$banner_image_thumbs=$current_row->banner_image_thumbs;
		$banner_files=		$current_row->banner_files;
		$banner_image_thumb_selected =$current_row->banner_image_thumb_selected;
		$banner_file_selected =$current_row->banner_file_selected;
		
	}
	
}

if($banner_image_thumbs!='') {
$banner_image_thumbs_arr = explode(",,,", $banner_image_thumbs);
}


/**
 * Dropdowns object.
 * 
 * Intialize object from Dropdowns class which contains methods fill all dropdowns of website.
 * @var object.
 */

$dropdowns= new Dropdowns();

/**
 * Page object.
 * 
 * Intialize object from Page controller class.
 * @var object.
 */

$this_object= new Staticpagebanner();


?>
<SCRIPT type="text/javascript">
pic1 = new Image(16, 16); 
pic1.src = "<?php echo base_url(); ?>images/icons/loader.gif";

$(document).ready(function(){

$("#page_code").change(function() { 

var page_code = $("#page_code").val().replace(/^\s+|\s+$/g, '');

if(page_code.length >= 4)
{
$("#dv_page_code_false").show();
$("#dv_page_code_false").html('<img src="<?php echo base_url();?>images/icons/loader.gif" align="absmiddle">&nbsp;Checking availability...');
$("#dv_page_code_true").html('');
    $.ajax({  
    type: "POST",  
    url: "<?php echo base_url().$this->lang->lang().'/'.ADMIN; ?>/staticpagebanner/check_page_code_availability/<?php echo $id; ?>",  
    data: "page_code="+ page_code,  
    success: function(msg){  
   
   $("#dv_page_code_false").ajaxComplete(function(event, request, settings){ 

	if(msg == 'OK')
	{ 
        $("#page_code").removeClass('object_error'); // if necessary
		$("#page_code").addClass("object_ok");
		$(this).html('');
		$("#dv_page_code_true").html('&nbsp;<img src="<?php echo base_url();?>images/icons/tick.gif" align="absmiddle">');
	}  
	else  
	{  
		$("#page_code").removeClass('object_ok'); // if necessary
		$("#page_code").addClass("object_error");
		$(this).html(msg+"<input type='hidden'  name ='page_code_not_availabe' id='page_code_not_availabe' >");
		$("#dv_page_code_true").html('');
	}  
   
   });

 } 
   
  }); 

}
else
	{
	$("#dv_page_code_false").show();
	$("#dv_page_code_false").html('<font color="red"><?php echo lang('page_code_false'); ?></font>');
	$("#dv_page_code_true").html('');
	$("#page_code").removeClass('object_ok'); // if necessary
	$("#page_code").addClass("object_error");
	}

});


$("#title").change(function() { 

	var title = $("#title").val().replace(/^\s+|\s+$/g, '');
	if(title== "" )
	{
		$("#dv_title_false").show();
	}
	else
	{
		$("#dv_title_false").hide();
	}
});

$("#title_ar").change(function() { 

	var title_ar = $("#title_ar").val().replace(/^\s+|\s+$/g, '');
	if(title_ar== "" )
	{
		$("#dv_title_ar_false").show();
	}
	else
	{
		$("#dv_title_ar_false").hide();
	}
});




});
</SCRIPT>





<div class="row-fluid sortable">
<div class="box span12">
<div class="box-header well" data-original-title>
<h2><i class="icon-edit"></i> <?php echo lang('static_page_banners')?></h2>
<div class="box-icon">
	<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
	<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
	<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
</div>

</div>
<div class="box-content">
<form class="form-horizontal" id='frm_staticpagebanner_row' name='frm_staticpagebanner_row'  method='post' enctype='multipart/form-data'>

<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
<input type="hidden" name="last_modify_date" id="last_modify_date" value="<?php echo $last_modify_date; ?>"> 

<input type="hidden" name="hdn_banner_image_thumbs" id="hdn_banner_image_thumbs" value="<?php echo $banner_image_thumbs; ?>">
<input type="hidden" name=" hdn_banner_files" id=" hdn_banner_files" value="<?php echo $banner_files; ?>"> 


	<fieldset>
	
	<div class="form-actions">
	<a class='btn btn-success' href='<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/staticpagebanner/table'>
				<i class='icon-zoom-in icon-white'></i>  
				<?php  echo $this->lang->line('lnk_view_all'); ?>                                           
	</a>
		
	<?php if($mode=='view') { 
	$readonly="readonly='readonly'";
	
if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_add)) {
	
	
	?>
	
	<a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/staticpagebanner/form/0/add">
	<i class='icon-edit icon-white'></i>
	<?php  echo $this->lang->line('btn_add'); ?>
	</a>
	
	<?php 
}

if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_edit)) {

	?>
	
    <a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/staticpagebanner/form/<?php echo $id;?>/edit">
    <i class='icon-edit icon-white'></i>  
	<?php  echo $this->lang->line('btn_edit'); ?>
	</a>
		
<?php 
}


if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_delete)) {

?>		
		
	<a class='btn btn-danger' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/staticpagebanner/delete/<?php echo $id;?>" onclick="return delete_confirm('<?php echo $this->lang->lang(); ?>')">
	<i class='icon-trash icon-white'></i> 
	<?php  echo $this->lang->line('btn_delete'); ?>
	</a>
<?php }?>	
	
	<?php }?>	

</div>


<div  align="center" style="height: 50px">
		<?php 
		if(isset($error)) {
			echo "<div class='alert alert-error'>
							<button type='button' class='close' data-dismiss='alert'>×</button>
							 $error.
						</div>";
		}
		?>
		<?php 
		if(isset($message)) {
			echo "<div class='alert alert-success'>
							<button type='button' class='close' data-dismiss='alert'>×</button>
							 $message.
						</div>";
		}
		?>
 </div>	
 

	  
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('page_code'); ?></label>
<div class="controls">
	<input class="input-xlarge focused" type="text" <?php if($id!=0){ ?> readonly="readonly" <?php }?> name="page_code" id="page_code" value="<?php echo $page_code; ?>">

<div id="dv_page_code_true"></div>
<div class="dv_error"  id="dv_page_code_false" style="display:none;"><?php echo lang('page_code_false'); ?></div>
								

</div>
</div>


<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('banner_file'); ?></label>
<div class="controls">
<div style="width:390px" >
<input type="text" id="fileName" class="input-xlarge focused" readonly="readonly"> 
<div class="file_input_div">
<input type="button" value="<?php echo lang('btn_file_input'); ?>" class="btn btn-info" />
<input type="file" class="file_input_hidden" id="banner_file" name="banner_file" onchange="javascript: document.getElementById('fileName').value = this.value" />
									
</div>
<br/><br/>
<input  type="checkbox" id="are_current" name="are_current"> <?php echo lang('current_header'); ?> 
</div>
</div>
</div>

<?php if($id!=0 && isset($banner_image_thumbs_arr)) {?>
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('headers'); ?></label>
<div class="controls" style="border: 1px solid silver; width:280px; min-height: 50px;">
<?php 
foreach($banner_image_thumbs_arr as $banner_image_thumb) {
	$checked='';
	$chk_delete='';
	if($banner_image_thumb==$banner_image_thumb_selected) {
		$checked='checked';
	}
	$chk_delete="<input type='checkbox' id='chk_headers_delete[]' name='chk_headers_delete[]' value='$banner_image_thumb' >&nbsp;".lang('btn_delete');
	
	if($banner_image_thumb!=='') {
	   echo "<div><img src='".base_url().$banner_image_thumb."' title='$banner_image_thumb' width='100px' height='50px'/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='radio' name='headers' value='$banner_image_thumb' $checked> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $chk_delete</div>";
	}  	
}
?>
</div>
</div>
<?php }?>

 
<div class="tabber">

<div class="tabbertab">
<h2>English</h2>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('title'); ?></label>
<div class="controls">
  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="title" id="title" value="<?php echo $title; ?>">
<div class="dv_error" id="dv_title_false" style="display:none; "><?php echo lang('title_false'); ?></div>

</div>
</div>

</div>


<div class="tabbertab">
<h2>عربى</h2>  
  
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('title_ar'); ?></label>
<div class="controls">
  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="title_ar" id="title_ar" value="<?php echo $title_ar; ?>">
  <div class="dv_error" id="dv_title_ar_false" style="display:none; "><?php echo lang('title_ar_false'); ?></div>

</div>
</div>
</div>  
  
  
</div>








<div class="form-actions">
<?php if($mode!='view') { ?>
<input type="submit" class="btn btn-primary" name="smt_save" id="smt_save" value="<?php echo lang('btn_save'); ?>" onclick="return validate_form('<?php echo $this->lang->lang(); ?>'); " />
<a class='btn btn-warning' href="javascript: history.go(-1)"><?php echo lang('btn_cancel'); ?></a><?php }?>
</div>
</fieldset>
					 </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			

<?php $this->load->view('admin/includes/footer'); ?>
    