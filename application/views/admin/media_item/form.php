<?php $this->load->view('admin/includes/header'); ?>

<script type='text/javascript'  src='<?php echo base_url();?>js/includes/functions.js' > </script>
<script type='text/javascript'  src='<?php echo base_url();?>js/admin/media_item/form.js' > </script>

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


<!-- For DatePicker -->
<script type='text/javascript'  src='<?php echo base_url();?>added/datepicker/date-picker-v4/date-picker-v4/js/datepicker.js' > </script>
<link href="<?php echo base_url();?>added/datepicker/date-picker-v4/date-picker-v4/css/datepicker.css" rel="stylesheet" type="text/css" />
<!-- 
<link href="<?php echo base_url();?>added/datepicker/date-picker-v4/date-picker-v4/css/demo.css" rel="stylesheet" type="text/css" />
 -->
 
<script type="text/javascript">
// <![CDATA[     

// A quick test of the setGlobalVars method - remember, the "lang" attribute will NOT work when passed to this method
datePickerController.setGlobalVars({"split":["-dd","-mm"]});

/* 
        The following function dynamically calculates Easter Monday's date.
        It is used as the "redraw" callback function for the second last calendar on the page
        and returns an empty object.
   
        It dynamically calculates Easter Monday for the year in question and uses
        the "adddisabledDates" method of the datePickercontroller Object to
        disable the date in question.
   
        NOTE: This function is not needed, it is only present to show you how you
        might use this callback function to disable dates dynamically!   
*/            
function disableEasterMonday(argObj) { 
        // Dynamically calculate Easter Monday - I've forgotten where this code 
        // was originally found and I don't even know if it returns a valid
        // result so don't use it in a prod environment...
        var y = argObj.yyyy,
            a=y%4,
            b=y%7,
            c=y%19,
            d=(19*c+15)%30,
            e=(2*a+4*b-d+34)%7,
            m=Math.floor((d+e+114)/31),
            g=(d+e+114)%31+1,            
            yyyymmdd = y + "0" + m + String(g < 10 ? "0" + g : g);         
        
        datePickerController.addDisabledDates(argObj.id, yyyymmdd); 
        
        // The redraw callback expects an Object as a return value
        // so we just give it an empty Object... 
        return {};
};

/* 

        The following functions updates a span with an "English-ised" version of the
        currently selected date for the last datePicker on the page. 
   
        NOTE: These functions are not needed, they are only present to show you how you
        might use callback functions to use the selected date in other ways!
   
*/
function createSpanElement(argObj) {
        // Make sure the span doesn't exist already
        if(document.getElementById("EnglishDate-" + argObj.id)) return;

        // create the span node dynamically...
        var spn = document.createElement('span');
            p   = document.getElementById(argObj.id).parentNode;
            
        spn.id = "EnglishDate-" + argObj.id;
        p.parentNode.appendChild(spn);
        
        // Remove the bottom margin on the input's wrapper paragraph
        p.style.marginBottom = "0";
        
        // Add a whitespace character to the span
        spn.appendChild(document.createTextNode(String.fromCharCode(160)));
};

function showEnglishDate(argObj) {
        // Grab the span & get a more English-ised version of the selected date
        var spn = document.getElementById("EnglishDate-" + argObj.id),
            formattedDate = datePickerController.printFormattedDate(argObj.date, "l-cc-sp-d-S-sp-F-sp-Y", false);
        
        // Make sure the span exists before attempting to use it!
        if(!spn) {
                createSpanElement(argObj); 
                spn = document.getElementById("EnglishDate-" + argObj.id);
        };
        
        // Note: The 3rd argument to printFormattedDate is a Boolean value that 
        // instructs the script to use the imported locale (true) or not (false)
        // when creating the dates. In this case, I'm not using the imported locale
        // as I've used the "S" format mask, which returns the English ordinal
        // suffix for a date e.g. "st", "nd", "rd" or "th" and using an
        // imported locale would look strange if an English suffix was included
        
        // Remove the current contents of the span
        while(spn.firstChild) spn.removeChild(spn.firstChild);
        
        // Add a new text node containing our formatted date
        spn.appendChild(document.createTextNode(formattedDate));
};

      
/* 
 
        Create a datepicker using Javascript and not classNames
        -------------------------------------------------------
      
        datePickerController.createDatePicker has to be called onload as we need 
        the locale file to have loaded before we can create a datepicker.
      
        The only way to get around using an onload event is to 
        explicitly set the language by adding it before the datepicker script e.g:
      
        <script type="text/javascript" src="/the/path/to/the/language/file.js"></ script>
        <script type="text/javascript" src="/the/path/to/the/datepicker/file.js"></ script>
     
*/
            
datePickerController.addEvent(window, "load", function() {
      var opts = {
        // The ID of the associated form element
        id:"dp-js1",
        // The date format to use
        format:"d-sl-m-sl-Y",
        // Days to highlight (starts on Monday)
        highlightDays:[0,0,0,0,0,1,1],
        // Days of the week to disable (starts on Monday)
        disabledDays:[0,0,0,0,0,0,0],
        // Dates to disable (YYYYMMDD format, "*" wildcards excepted)
        disabledDates:{
                "20090601":"20090612", // Range of dates
                "20090622":"1",        // Single date
                "****1225":"1"         // Wildcard example 
                },
        // Date to always enable
        enabledDates:{},
        // Don't fade in the datepicker
        // NOTE: Only relevant if "staticPos" is set to false
        noFadeEffect:false,
        // Is it inline or popup
        staticPos:false,
        // Do we hide the associated form element on create
        hideInput:false,
        // Do we hide the today button
        noToday:true,
        // Do we show weeks along the left hand side
        showWeeks:true,
        // Is it drag disabled
        // NOTE: Only relevant if "staticPos" is set to false
        dragDisabled:true,
        // Positioned the datepicker within a wrapper div of your choice (requires the ID of the wrapper element)
        // NOTE: Only relevant if "staticPos" is set to true
        positioned:"",
        // Do we fill the entire grid with dates
        fillGrid:true,
        // Do we constrain dates not within the current month so that they cannot be selected
        constrainSelection:true,
        // Callback Object
        callbacks:{"create":[createSpanElement], "dateselect":[showEnglishDate]},
        // Do we create the button within a wrapper element of your choice (requires the ID of the wrapper element)
        // NOTE: Only relevant if staticPos is set to false
        buttonWrapper:"",
        // Do we start the cursor on a specific date (YYYYMMDD format string)
        cursorDate:""      
      };
      datePickerController.createDatePicker(opts);
});

// ]]>
</script>



<?php 

/**
 * Variables to store the value from database, to display on screen
 */
$id=				0;
$alias=				'';
$media_section_id=0;
$banner_image_thumbs='';
$title=				'';
$title_ar=			'';
$seo_words=			'';
$seo_words_ar=		'';
$brief=				'';
$brief_ar=			'';
$body=				'';
$body_ar=			'';

$banner_image_thumbs='';
$banner_files='';

$banner_image_thumb_selected ='';
$banner_file_selected ='';
$icon='';

$pdf_file ='';
$video_file ='';
$the_date='';
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
		$alias=				$current_row['alias'];
		$media_sectio_id=$current_row['media_section_id'];
		$title=				$current_row['title'];
		$title_ar=			$current_row['title_ar'];
		$seo_words=			$current_row['seo_words'];
		$seo_words_ar=		$current_row['seo_words_ar'];
		$brief=				$current_row['brief'];
		$brief_ar=			$current_row['brief_ar'];
		$body=				$current_row['body'];
		$body_ar=			$current_row['body_ar'];
		$the_date=			$current_row['the_date'];
		
		
		//$banner_image_thumbs=$current_row['banner_image_thumbs'];
		//$banner_files=		$current_row['banner_files'];
		//$banner_image_thumb_selected =$current_row['banner_image_thumb_selected'];
		//$banner_file_selected =$current_row['banner_file_selected'];
		
	}
	else 
	{
		$id=				$current_row->id;
		$alias=				$current_row->alias;
		$media_section_id=$current_row->media_section_id;
		$title=				$current_row->title;
		$title_ar=			$current_row->title_ar;
		$seo_words=			$current_row->seo_words;
		$seo_words_ar=		$current_row->seo_words_ar;
		$brief=				$current_row->brief;
		$brief_ar=			$current_row->brief_ar;
		$body=				$current_row->body;
		$body_ar=			$current_row->body_ar;
		
		$banner_image_thumbs=$current_row->banner_image_thumbs;
		$banner_files=		$current_row->banner_files;
		$banner_image_thumb_selected =$current_row->banner_image_thumb_selected;
		$banner_file_selected =$current_row->banner_file_selected;
		
		$icon =$current_row->icon;
		$pdf_file		=$current_row->pdf_file;
		$video_file		=$current_row->video_file;
		
		$the_date=			$current_row->the_date;
		
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


$this_object= new Mediaitem();

/**
 * Mediasection object.
 * 
 * Intialize object from Mediasection controller class.
 * @var object.
 */
$this->load->controller(ADMIN.'/Mediasection');
$media_section_object= new Mediasection();

?>
<SCRIPT type="text/javascript">
pic1 = new Image(16, 16); 
pic1.src = "<?php echo base_url(); ?>images/icons/loader.gif";

$(document).ready(function(){

$("#alias").change(function() { 

var alias = $("#alias").val().replace(/^\s+|\s+$/g, '');

if(alias.length >= 4)
{
$("#dv_alias_false").show();
$("#dv_alias_false").html('<img src="<?php echo base_url();?>images/icons/loader.gif" align="absmiddle">&nbsp;Checking availability...');
$("#dv_alias_true").html('');
    $.ajax({  
    type: "POST",  
    url: "<?php echo base_url().$this->lang->lang().'/'.ADMIN; ?>/mediaitem/check_alias_availability/<?php echo $id; ?>",  
    data: "alias="+ alias,  
    success: function(msg){  
   
   $("#dv_alias_false").ajaxComplete(function(event, request, settings){ 

	if(msg == 'OK')
	{ 
        $("#alias").removeClass('object_error'); // if necessary
		$("#alias").addClass("object_ok");
		$(this).html('');
		$("#dv_alias_true").html('&nbsp;<img src="<?php echo base_url();?>images/icons/tick.gif" align="absmiddle">');
	}  
	else  
	{  
		$("#alias").removeClass('object_ok'); // if necessary
		$("#alias").addClass("object_error");
		$(this).html(msg+"<input type='hidden'  name ='alias_not_availabe' id='alias_not_availabe' >");
		$("#dv_alias_true").html('');
	}  
   
   });

 } 
   
  }); 

}
else
	{
	$("#dv_alias_false").show();
	$("#dv_alias_false").html('<font color="red"><?php echo lang('alias_false'); ?></font>');
	$("#dv_alias_true").html('');
	$("#alias").removeClass('object_ok'); // if necessary
	$("#alias").addClass("object_error");
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
<h2><i class="icon-edit"></i> <?php echo lang('media_items')?></h2>
<div class="box-icon">
	<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
	<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
	<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
</div>

</div>
<div class="box-content">
<form class="form-horizontal" id='frm_mediaitem_row' name='frm_mediaitem_row'  method='post' enctype='multipart/form-data'>

<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
<input type="hidden" name="last_modify_date" id="last_modify_date" value="<?php echo $last_modify_date; ?>"> 

<input type="hidden" name="hdn_banner_image_thumbs" id="hdn_banner_image_thumbs" value="<?php echo $banner_image_thumbs; ?>">
<input type="hidden" name=" hdn_banner_files" id=" hdn_banner_files" value="<?php echo $banner_files; ?>"> 


	<fieldset>
	
	<div class="form-actions">
	<a class='btn btn-success' href='<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/mediaitem/table'>
				<i class='icon-zoom-in icon-white'></i>  
				<?php  echo $this->lang->line('lnk_view_all'); ?>                                           
	</a>
		
	<?php if($mode=='view') { 
	$readonly="readonly='readonly'";
	
if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_add)) {
	
	
	?>
	
	<a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/mediaitem/form/0/add">
	<i class='icon-edit icon-white'></i>
	<?php  echo $this->lang->line('btn_add'); ?>
	</a>
	
	<?php 
}
if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_edit)) {

	?>
	
    <a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/mediaitem/form/<?php echo $id;?>/edit">
    <i class='icon-edit icon-white'></i>  
	<?php  echo $this->lang->line('btn_edit'); ?>
	</a>	
		
<?php 
}

if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_delete)) {

?>		
		
	<a class='btn btn-danger' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/mediaitem/delete/<?php echo $id;?>" onclick="return delete_confirm('<?php echo $this->lang->lang(); ?>')">
	<i class='icon-trash icon-white'></i> 
	<?php  echo $this->lang->line('btn_delete'); ?>
	</a>
<?php }?>	
		
	<?php }
	if($id!=0) {
	?>	


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
<label class="control-label" for="focusedInput"><?php echo lang('alias'); ?></label>
<div class="controls">
	<input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="alias" id="alias" value="<?php echo $alias; ?>">

<div id="dv_alias_true"></div>
<div class="dv_error"  id="dv_alias_false" style="display:none;"><?php echo lang('alias_false'); ?></div>
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('media_section'); ?></label>
<div class="controls">
<?php $dropdowns->drpdwn_media_section($media_section_object, $media_section_id,'media_section_id',$are_disabled); ?>
<div class="dv_error"  id="dv_media_section_id_false" style="display:none;"><?php echo lang('media_section_false'); ?></div>
</div>
</div>


<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('icon'); ?></label>
<div class="controls">
<div style="width:390px" >
<input type="text" id="icon_name" class="input-xlarge focused" readonly="readonly"> 
<div class="file_input_div">
<input type="button" value="<?php echo lang('btn_file_input'); ?>" class="btn btn-info" />
<input type="file" class="file_input_hidden" id="icon" name="icon" onchange="javascript: document.getElementById('icon_name').value = this.value" />								
</div>
<br/>
<?php if($icon!='') {
	$icon_path=base_url().$icon;
	echo "<a href='$icon_path' target='_blank'>".lang('icon')."</a>";
}?>
<br/>
</div>
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



 
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('pdf_file'); ?></label>
<div class="controls">
<div style="width:390px" >
<input type="text" id="pdf_file_name" class="input-xlarge focused" readonly="readonly"> 
<div class="file_input_div">
<input type="button" value="<?php echo lang('btn_file_input'); ?>" class="btn btn-info" />
<input type="file" class="file_input_hidden" id="pdf_file" name="pdf_file" onchange="javascript: document.getElementById('pdf_file_name').value = this.value" />								
</div>
<br/>
<?php if($pdf_file!='') {
	$pdf_file_path=base_url().$pdf_file;
	echo "<a href='$pdf_file_path' target='_blank'>".lang('pdf_file')."</a>";
}?>
<br/>
</div>
</div>
</div>


 
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('video_file'); ?></label>
<div class="controls">
<div style="width:390px" >
<input type="text" id="video_file_name" class="input-xlarge focused" readonly="readonly"> 
<div class="file_input_div">
<input type="button" value="<?php echo lang('btn_file_input'); ?>" class="btn btn-info" />
<input type="file" class="file_input_hidden" id="video_file" name="video_file" onchange="javascript: document.getElementById('video_file_name').value = this.value" />								
</div>
<br/>
<?php if($video_file!='') {
	$video_file_path=base_url().$video_file;
	echo "<a href='$video_file_path' target='_blank'>".lang('video_file')."</a>";
}?>
<br/>
</div>
</div>
</div>
 
 <div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('the_date'); ?></label>
<div class="controls">
  <input class="w16em dateformat-Y-ds-m-ds-d" type="text" readonly="readonly"  name="the_date" id="the_date" value="<?php echo $the_date; ?>">
<div class="dv_error" id="dv_the_date_false" style="display:none; "><?php echo lang('the_date_false'); ?></div>

</div>
</div>
 
 
 
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
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('seo_words'); ?></label>
<div class="controls">
  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="seo_words" id="seo_words" value="<?php echo $seo_words; ?>">
</div>
</div>
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('brief'); ?></label>
<div class="controls">
<textarea cols="65" rows="2" <?php echo $readonly; ?> name="brief" id="brief" class="input_textarea" ><?php echo $brief; ?></textarea>
</div>
</div>
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('body'); ?></label>
<div class="controls">
  <textarea cols="65" rows="5" <?php echo $readonly; ?> name="body" id="body" class="input_textarea" ><?php echo $body; ?></textarea>
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
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('seo_words_ar'); ?></label>
<div class="controls">
  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="seo_words_ar" id="seo_words_ar" value="<?php echo $seo_words_ar; ?>">
</div>
</div>
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('brief_ar'); ?></label>
<div class="controls">
<textarea cols="65" rows="2" <?php echo $readonly; ?> name="brief_ar" id="brief_ar" class="input_textarea" ><?php echo $brief_ar; ?></textarea>
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('body_ar'); ?></label>
<div class="controls">
  <textarea cols="65" rows="5" <?php echo $readonly; ?> name="body_ar" id="body_ar" class="input_textarea" ><?php echo $body_ar; ?></textarea>
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
			

<?php $this->load->view('admin/includes/footer_sub'); ?>
    