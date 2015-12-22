<?php $this->load->view('admin/includes/header'); ?>

<script type='text/javascript'  src='<?php echo base_url();?>js/includes/functions.js' > </script>
<script type='text/javascript'  src='<?php echo base_url();?>js/admin/subscriber/form.js' > </script>

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
$name='';  
$email='';
$company='';  
$position=	'';  
$address=	'';  
$deliver_by=	'';  


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
		$name=	$current_row['name'];  
		$email=	$current_row['email'];
		$company=	$current_row['company'];
		$position=	$current_row['position'];  
		$address=	$current_row['address'];  
		$deliver_by=	$current_row['deliver_by'];  
		
			
	}
	else 
	{
		$id=	$current_row->id;
		$name=	$current_row->name;  
		$email=	$current_row->email;
		$company=	$current_row->company;
		$position=	$current_row->position;  
		$address=	$current_row->address;  
		$deliver_by=	$current_row->deliver_by;
		
	}
	
}



/**
 * Dropdowns object.
 * 
 * Intialize object from Dropdowns class which contains methods fill all dropdowns of website.
 * @var object.
 */

$dropdowns= new Dropdowns();

/**
 * Country object.
 * 
 * Intialize object from Country controller class.
 * @var object.
 */
$this->load->controller(ADMIN.'/Country');
$country_object= new Country();

/**
 * Subscriber controller object.
 * 
 * Intialize object from Subscriber controller class.
 * @var object.
 */

$this_object= new Subscriber();

?>
<SCRIPT type="text/javascript">

$(document).ready(function(){

$("#username").change(function() { 

var usr = $("#username").val().replace(/^\s+|\s+$/g, '');

if(usr.length >= 4)
{
$("#dv_username_false").show();
$("#dv_username_false").html('<img src="<?php echo base_url();?>images/icons/loader.gif" align="absmiddle">&nbsp;Checking availability...');
$("#dv_username_true").html('');
    $.ajax({  
    type: "POST",  
    url: "<?php echo base_url().$this->lang->lang().'/'.ADMIN; ?>/subscriber/check_username_availability/<?php echo $id; ?>",  
    data: "username="+ usr,  
    success: function(msg){  
   
   $("#dv_username_false").ajaxComplete(function(event, request, settings){ 

	if(msg == 'OK')
	{ 
        $("#username").removeClass('object_error'); // if necessary
		$("#username").addClass("object_ok");
		$(this).html('');
		$("#dv_username_true").html('&nbsp;<img src="<?php echo base_url();?>images/icons/tick.gif" align="absmiddle">');
	}  
	else  
	{  
		$("#username").removeClass('object_ok'); // if necessary
		$("#username").addClass("object_error");
		$(this).html(msg+"<input type='hidden'  name ='username_not_availabe' id='username_not_availabe' >");
		$("#dv_username_true").html('');
	}  
   
   });

 } 
   
  }); 

}
else
	{
	$("#dv_username_false").show();
	$("#dv_username_false").html('<font color="red"><?php echo lang('username_false'); ?></font>');
	$("#dv_username_true").html('');
	$("#username").removeClass('object_ok'); // if necessary
	$("#username").addClass("object_error");
	}

});



$("#password").change(function() { 

	var password = $("#password").val();
	if(password== "" || password.length < 5)
	{
		$("#dv_password_false").show();
	}
	else
	{
		$("#dv_password_false").hide();
	}
});

$("#password_confirm").change(function() { 
	var password = $("#password").val();
	var password_confirm = $("#password_confirm").val();
	if(password!= password_confirm)
	{
		$("#dv_password_confirm_false").show();
	}
	else
	{
		$("#dv_password_confirm_false").hide();
	}
});


$("#name").change(function() { 

	var name = $("#name").val().replace(/^\s+|\s+$/g, '');
	if(name== "" )
	{
		$("#dv_name_false").show();
	}
	else
	{
		$("#dv_name_false").hide();
	}
});

$("#contact_mobile").change(function() { 
	
	var contact_mobile = $("#contact_mobile").val().replace(/^\s+|\s+$/g, '');
	var regexObj = /[^0-9]/;
	if(contact_mobile != "" && regexObj.test(contact_mobile)== flase)
	{
		$("#dv_contact_mobile_false").show();
	}
	else
	{
		$("#dv_contact_mobile_false").hide();
	}
});

$("#phone").change(function() { 

	var phone = $("#phone").val().replace(/^\s+|\s+$/g, '');
	var regexObj = /[^0-9]/;
	if(phone != "" && regexObj.test(phone)== flase)
	{
		$("#dv_phone_false").show();
	}
	else
	{
		$("#dv_phone_false").hide();
	}
});

$("#contact_email").change(function() { 

	var contact_email = $("#contact_email").val().replace(/^\s+|\s+$/g, '');
	var regexObj = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	if(contact_email != "" && regexObj.test(contact_email)== flase)
	{
		$("#dv_contact_email_false").show();
	}
	else
	{
		$("#dv_contact_email_false").hide();
	}
});

});
</SCRIPT>

<script>
function PopupCenter(pageURL, title,w,h) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=1, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}
</script>



<div class="row-fluid sortable">
<div class="box span12">
<div class="box-header well" data-original-title>
<h2><i class="icon-edit"></i> <?php echo lang('subscribers')?></h2>
<div class="box-icon">
	<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
	<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
	<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
</div>

</div>
<div class="box-content">
<form class="form-horizontal" id='frm_subscriber_row' name='frm_subscriber_row'  method='post' enctype='multipart/form-data'>

<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
<input type="hidden" name="last_modify_date" id="last_modify_date" value="<?php echo $last_modify_date; ?>"> 


	<fieldset>
	
	<div class="form-actions">
	<a class='btn btn-success' href='<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/subscriber/table'>
				<i class='icon-zoom-in icon-white'></i>  
				<?php  echo $this->lang->line('lnk_view_all'); ?>                                           
	</a>
		
	<?php if($mode=='view') { 
	$readonly="readonly='readonly'";
	
if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_add)) {
	
	
	?>
	
	<a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/subscriber/form/0/add">
	<i class='icon-edit icon-white'></i>
	<?php  echo $this->lang->line('btn_add'); ?>
	</a>
	
	<?php 
}

if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_edit)) {

	?>
	
    <a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/subscriber/form/<?php echo $id;?>/edit">
    <i class='icon-edit icon-white'></i>  
	<?php  echo $this->lang->line('btn_edit'); ?>
	</a>
		
<?php 
}

if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_delete)) {

?>		
		
	<a class='btn btn-danger' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/subscriber/delete/<?php echo $id;?>" onclick="return delete_confirm('<?php echo $this->lang->lang(); ?>')">
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
		if(isset($message_after_event)) {
			echo "<div class='alert alert-success'>
							<button type='button' class='close' data-dismiss='alert'>×</button>
							 $message_after_event.
						</div>";
		}
		?>
 </div>	
 

<br/>
								<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('name'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="name" id="name" value="<?php echo $name; ?>">
									
									<div id="dv_name_true"></div>
									<div class="dv_error"  id="dv_name_false" style="display:none;"><?php echo lang('name_false'); ?></div>
								
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('email'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="email" id="email" value="<?php echo $email; ?>">
								<div class="dv_error"  id="dv_email_false" style="display:none;"><?php echo lang('email_false'); ?></div>
								
								</div>
							  	</div>
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('company'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="company" id="company" value="<?php echo $company; ?>">
								</div>
							  	</div>
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('position'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="position" id="position" value="<?php echo $position; ?>">
								</div>
							  	</div>
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('address'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="address" id="address" value="<?php echo $address; ?>">
								</div>
							  	</div>
							  	
							  	
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('deliver_by'); ?></label>
								<div class="controls">
								<select class="name" name="deliver_by" id="deliver_by" >
                                <option value="Email" <?php if($deliver_by=='Email'){echo "selected='selected'";} ?>>Email</option>	
                                <option value="Address" <?php if($deliver_by=='Address'){echo "selected='selected'";} ?>>Address</option>	
                                </select>
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
    