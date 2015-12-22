<?php $this->load->view('admin/includes/header'); ?>

<script type='text/javascript'  src='<?php echo base_url();?>js/includes/functions.js' > </script>
<script type='text/javascript'  src='<?php echo base_url();?>js/admin/alumni/form.js' > </script>

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
$username='';  
$password='';  
$title='';  
$firstname='';  
$lastname='';  
$gender='';  
$birthdate='';  
$home_address='';  
$home_city='';  
$home_postal_code='';  
$home_country_id='';  
$home_phone='';  
$home_mobile='';  
$home_email='';  
$current_position='';  
$organization='';  
$work_address='';  
$work_postal_code='';  
$work_city='';  
$work_country_id='';  
$work_phone='';  
$work_mobile='';  
$work_email='';  
$giza_year_joined='';  
$giza_starting_position='';  
$giza_department='';  
$giza_year_left='';  
$giza_final_position='';  
$giza_final_department='';  
$giza_total_years='';  

$reference_contacts=array();
$interests=array();

$registeration_datetime='';  
$active='';  
$active_code='';



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
		$username=	$current_row['username'];  
		$password=	$current_row['password'];
		$title=	$current_row['title'];  
		$firstname=	$current_row['firstname'];  
		$lastname=	$current_row['lastname'];  
		$gender=	$current_row['gender'];  
		$birthdate=	$current_row['birthdate'];  
		$home_address=	$current_row['home_address'];
		$home_city= $current_row['home_city'];
		$home_postal_code= $current_row['home_postal_code'];
		$home_country_id= $current_row['home_country_id'];
		$home_phone= $current_row['home_phone'];
		$home_mobile=	$current_row['home_mobile']; 
		$home_email=	$current_row['home_email'];  
		$current_position=	$current_row['current_position'];  
		$organization=	$current_row['organization'];  
		$work_address=	$current_row['work_address'];  
		$work_postal_code=	$current_row['work_postal_code'];  
		$work_city=	$current_row['work_city'];  
		$work_country_id=	$current_row['work_country_id'];  
		$work_phone=	$current_row['work_phone'];  
		$work_mobile=	$current_row['work_mobile'];  
		$work_email=	$current_row['work_email'];  
		$giza_year_joined=	$current_row['giza_year_joined'];  
		$giza_starting_position=	$current_row['giza_starting_position'];  
		$giza_department=	$current_row['giza_department'];  
		$giza_year_left=	$current_row['giza_year_left'];  
		$giza_final_position=	$current_row['giza_final_position'];  
		$giza_final_department=	$current_row['giza_final_department'];  
		$giza_total_years=	$current_row['giza_total_years'];  
		
		$reference_contacts=	$current_row['reference_contacts'];  
		$interests=	$current_row['interests'];  
		
		$reference_contacts= explode(",", $reference_contacts); 
		$reference_contacts_count  =count($reference_contacts); 
		
		$interests = explode(",", $interests);
		$interests_count  =count($interests); 
		
			
	}
	else 
	{
		$id=	$current_row->id;
		$username=	$current_row->username;  
		$password=	$current_row->password;
		$title=	$current_row->title;  
		$firstname=	$current_row->firstname;  
		$lastname=	$current_row->lastname;  
		$gender=	$current_row->gender;  
		$birthdate=	$current_row->birthdate;  
		$home_address=	$current_row->home_address;
		$home_city= $current_row->home_city;
		$home_postal_code= $current_row->home_postal_code;
		$home_country_id= $current_row->home_country_id;
		$home_phone= $current_row->home_phone;
		$home_mobile=	$current_row->home_mobile; 
		$home_email=	$current_row->home_email;  
		$current_position=	$current_row->current_position;  
		$organization=	$current_row->organization;  
		$work_address=	$current_row->work_address;  
		$work_postal_code=	$current_row->work_postal_code;  
		$work_city=	$current_row->work_city;  
		$work_country_id=	$current_row->work_country_id;  
		$work_phone=	$current_row->work_phone;  
		$work_mobile=	$current_row->work_mobile;  
		$work_email=	$current_row->work_email;  
		$giza_year_joined=	$current_row->giza_year_joined;  
		$giza_starting_position=	$current_row->giza_starting_position;  
		$giza_department=	$current_row->giza_department;  
		$giza_year_left=	$current_row->giza_year_left;  
		$giza_final_position=	$current_row->giza_final_position;  
		$giza_final_department=	$current_row->giza_final_department;  
		$giza_total_years=	$current_row->giza_total_years;  
		
		$reference_contacts=	$current_row->reference_contacts;  
		$interests=	$current_row->interests;  
		
		$reference_contacts= explode(",", $reference_contacts); 
		$reference_contacts_count  =count($reference_contacts); 
		
		$interests = explode(",", $interests);
		$interests_count  =count($interests); 
		
		
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
 * Alumni controller object.
 * 
 * Intialize object from Alumni controller class.
 * @var object.
 */

$this_object= new Alumni();

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
    url: "<?php echo base_url().$this->lang->lang().'/'.ADMIN; ?>/alumni/check_username_availability/<?php echo $id; ?>",  
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
<h2><i class="icon-edit"></i> <?php echo lang('alumnies')?></h2>
<div class="box-icon">
	<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
	<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
	<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
</div>

</div>
<div class="box-content">
<form class="form-horizontal" id='frm_alumni_row' name='frm_alumni_row'  method='post' enctype='multipart/form-data'>

<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
<input type="hidden" name="last_modify_date" id="last_modify_date" value="<?php echo $last_modify_date; ?>"> 


	<fieldset>
	
	<div class="form-actions">
	<a class='btn btn-success' href='<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/alumni/table'>
				<i class='icon-zoom-in icon-white'></i>  
				<?php  echo $this->lang->line('lnk_view_all'); ?>                                           
	</a>
		
	<?php if($mode=='view') { 
	$readonly="readonly='readonly'";
	
if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_add)) {
	
	
	?>
	
	<a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/alumni/form/0/add">
	<i class='icon-edit icon-white'></i>
	<?php  echo $this->lang->line('btn_add'); ?>
	</a>
	
	<?php 
}

if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_edit)) {

	?>
	
    <a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/alumni/form/<?php echo $id;?>/edit">
    <i class='icon-edit icon-white'></i>  
	<?php  echo $this->lang->line('btn_edit'); ?>
	</a>
		
<?php 
}

if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_delete)) {

?>		
		
	<a class='btn btn-danger' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/alumni/delete/<?php echo $id;?>" onclick="return delete_confirm('<?php echo $this->lang->lang(); ?>')">
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
 

<br/>
								<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('username'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="username" id="username" value="<?php echo $username; ?>">
									
									<div id="dv_username_true"></div>
									<div class="dv_error"  id="dv_username_false" style="display:none;"><?php echo lang('username_false'); ?></div>
								
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('password'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="password" <?php echo $readonly; ?> name="password" id="password" value="<?php echo $password; ?>">
								<div class="dv_error" id="dv_password_false" style="display:none"><?php echo lang('password_false'); ?></div>
								
								</div>
							  </div>
							  
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('password_confirm'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="password" <?php echo $readonly; ?> name="password_confirm" id="password_confirm" value="<?php echo $password; ?>">
								<div class="dv_error" id="dv_password_confirm_false" style="display:none"><?php echo lang('password_confirm_false'); ?></div>
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('title'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="title" id="title" value="<?php echo $title; ?>">
								</div>
							  	</div>
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('firstname'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="firstname" id="firstname" value="<?php echo $firstname; ?>">
								</div>
							  	</div>
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('lastname'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="lastname" id="lastname" value="<?php echo $lastname; ?>">
								</div>
							  	</div>
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('gender'); ?></label>
								<div class="controls">
								  <select  name="gender" id="gender" <?php echo $readonly; ?>>
										<option value="Male" <?php if($gender=='Male'){echo "selected='selected'";} ?>>Male</option>
                                     	<option value="Female" <?php if($gender=='Female'){echo "selected='selected'";} ?>>Female</option>			
                                  </select>
								</div>
							  	</div>
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('birthdate'); ?></label>
								<div class="controls">
								  <input class="w16em dateformat-Y-ds-m-ds-d" type="text" readonly="readonly"  name="birthdate" id="birthdate" value="<?php echo $birthdate; ?>">
								</div>
							  	</div>
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('home_address'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="home_address" id="home_address" value="<?php echo $home_address; ?>">
								</div>
							  	</div>
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('home_city'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="home_city" id="home_city" value="<?php echo $home_city; ?>">
								</div>
							  	</div>
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('home_postal_code'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="home_postal_code" id="home_postal_code" value="<?php echo $home_postal_code; ?>">
								</div>
							  	</div>
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('home_country_id'); ?></label>
								<div class="controls">
								  <?php $dropdowns->drpdwn_country($country_object, $home_country_id,'home_country_id',$are_disabled); ?>
								</div>
							  	</div>
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('home_phone'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="home_phone" id="home_phone" value="<?php echo $home_phone; ?>">
								</div>
							  	</div>
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('home_mobile'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="home_mobile" id="home_mobile" value="<?php echo $home_mobile; ?>">
								</div>
							  	</div>
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('home_email'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="home_email" id="home_email" value="<?php echo $home_email; ?>">
								</div>
							  	</div>
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('current_position'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="current_position" id="current_position" value="<?php echo $current_position; ?>">
								</div>
							  	</div>
							  	
							  								 			  
			 					<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('organization'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="organization" id="organization" value="<?php echo $organization; ?>">
								</div>
							  	</div>
							  			
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('work_address'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="work_address" id="work_address" value="<?php echo $work_address; ?>">
								</div>
							  	</div>
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('work_postal_code'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="work_postal_code" id="work_postal_code" value="<?php echo $work_postal_code; ?>">
								</div>
							  	</div>
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('work_city'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="work_city" id="work_city" value="<?php echo $work_city; ?>">
								</div>
							  	</div>
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('work_country_id'); ?></label>
								<div class="controls">
								  <?php $dropdowns->drpdwn_country($country_object, $work_country_id,'work_country_id',$are_disabled); ?>
								</div>
							  	</div>
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('work_phone'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="work_phone" id="work_phone" value="<?php echo $work_phone; ?>">
								</div>
							  	</div>
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('work_mobile'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="work_mobile" id="work_mobile" value="<?php echo $work_mobile; ?>">
								</div>
							  	</div>
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('work_email'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="work_email" id="work_email" value="<?php echo $work_email; ?>">
								</div>
							  	</div>
							  	
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('giza_year_joined'); ?></label>
								<div class="controls">
								  <input class="w16em dateformat-Y-ds-m-ds-d" type="text" readonly="readonly"  name="giza_year_joined" id="giza_year_joined" value="<?php echo $giza_year_joined; ?>">
								  
								</div>
							  	</div>						  
												  
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('giza_starting_position'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="giza_starting_position" id="giza_starting_position" value="<?php echo $giza_starting_position; ?>">
								</div>
							  	</div>
							  
							  				  
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('giza_department'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="giza_department" id="giza_department" value="<?php echo $giza_department; ?>">
								</div>
							  	</div>
							  				  
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('giza_year_left'); ?></label>
								<div class="controls">
								  <input class="w16em dateformat-Y-ds-m-ds-d" type="text" readonly="readonly"  name="giza_year_left" id="giza_year_left" value="<?php echo $giza_year_left; ?>">
								  
								</div>
							  	</div>
							  				  
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('giza_final_position'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="giza_final_position" id="giza_final_position" value="<?php echo $giza_final_position; ?>">
								</div>
							  	</div>
							  				  
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('giza_final_department'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="giza_final_department" id="giza_final_department" value="<?php echo $giza_final_department; ?>">
								</div>
							  	</div>
							  				  
							  	<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('giza_total_years'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="giza_total_years" id="giza_total_years" value="<?php echo $giza_total_years; ?>">
								</div>
							  	</div>
							  
<!-- 							  							
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('logo'); ?></label>
<div class="controls">
<div style="width:390px" >
<input type="text" id="logo_name" class="input-xlarge focused" readonly="readonly"> 
<div class="file_input_div">
<input type="button" value="<?php echo lang('btn_file_input'); ?>" class="btn btn-info" />
<input type="file" class="file_input_hidden" id="logo" name="logo" onchange="javascript: document.getElementById('logo_name').value = this.value" />								
</div>
<br/>
<?php if($logo!='') {
	$logo_path=base_url().$logo;
	echo "<img src='$logo_path' title='$logo' width='120px' height='80px'/>";
}?>
<br/>
</div>
</div>
</div> 
  -->
	
							  <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('reference_contacts'); ?></label>
								<div class="controls">
								
												 
                                                <input type="checkbox" id="reference_contacts[]" name="reference_contacts[]" value="Home Phone"
                                                <?php foreach($reference_contacts as $reference_contact) { if($reference_contact=='Home Phone'){echo "checked='checked'";} }?>
                                                > Home Phone<br>
                                                
                                                <input type="checkbox" id="reference_contacts[]" name="reference_contacts[]" value="Personal Mobile"
                                                <?php foreach($reference_contacts as $reference_contact) { if($reference_contact=='Personal Mobile'){echo "checked='checked'";} }?>
                                                > Personal Mobile<br>
                                                
                                                <input type="checkbox" id="reference_contacts[]" name="reference_contacts[]" value="Personal Email"
                                                <?php foreach($reference_contacts as $reference_contact) { if($reference_contact=='Personal Email'){echo "checked='checked'";} }?>
                                                > Personal Email<br>
                                                
                                                <input type="checkbox" id="reference_contacts[]" name="reference_contacts[]" value="Work Phone"
                                                <?php foreach($reference_contacts as $reference_contact) { if($reference_contact=='Work Phone'){echo "checked='checked'";} }?>
                                                > Work Phone<br>
                                                
                                                <input type="checkbox" id="reference_contacts[]" name="reference_contacts[]" value="Work Mobile"
                                                <?php foreach($reference_contacts as $reference_contact) { if($reference_contact=='Work Mobile'){echo "checked='checked'";} }?>
                                                > Work Mobile<br>
                                                
                                                <input type="checkbox" id="reference_contacts[]" name="reference_contacts[]" value="Work Email"
                                                <?php foreach($reference_contacts as $reference_contact) { if($reference_contact=='Work Email'){echo "checked='checked'";} }?>
                                                > Work Email<br>
                                                
                                                                       
								
								<div class="dv_error" id="dv_reference_contact_false" style="display:none"><?php echo lang('reference_contact_false'); ?></div>
								
								</div>
							  </div>
							  
						

								<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('interests'); ?></label>
								<div class="controls">
								
												<input type="checkbox" id="interests[]" name="interests[]" value="Industries" 
												<?php foreach($interests as $interest) { if($interest=='Industries'){echo "checked='checked'";} }?>
												> Industries<br>
                								
                								<input type="checkbox" id="interests[]" name="interests[]" value="Solutions"
                								<?php foreach($interests as $interest) { if($interest=='Solutions'){echo "checked='checked'";} }?>
                								> Solutions<br>
                                                
                                                <input type="checkbox" id="interests[]" name="interests[]" value="New Projects / Awards"
                                                <?php foreach($interests as $interest) { if($interest=='New Projects / Awards'){echo "checked='checked'";} }?>
                                                > New Projects / Awards<br>
                                                
                                                <input type="checkbox" id="interests[]" name="interests[]" value="Receive corporate newsletter"
                                                <?php foreach($interests as $interest) { if($interest=='Receive corporate newsletter'){echo "checked='checked'";} }?>
                                                > Receive corporate newsletter<br>
                                                
                                                <input type="checkbox" id="interests[]" name="interests[]" value="Giza Systems Publications"
                                                <?php foreach($interests as $interest) { if($interest=='Giza Systems Publications'){echo "checked='checked'";} }?>
                                                > Giza Systems Publications<br>
                                                
                                                <input type="checkbox" id="interests[]" name="interests[]" value="CSR projects"
                                                <?php foreach($interests as $interest) { if($interest=='CSR projects'){echo "checked='checked'";} }?>
                                                > CSR projects<br>
                                                
                                                <input type="checkbox" id="interests[]" name="interests[]" value="Giza Systems Events"
                                                <?php foreach($interests as $interest) { if($interest=='Giza Systems Events'){echo "checked='checked'";} }?>
                                                > Giza Systems Events<br>
                                                
                                                <input type="checkbox" id="interests[]" name="interests[]" value="Job Opportunities"
                                                <?php foreach($interests as $interest) { if($interest=='Job Opportunities'){echo "checked='checked'";} }?>
                                                > Job Opportunities<br />
								
								<div class="dv_error" id="dv_interests_false" style="display:none"><?php echo lang('interests_false'); ?></div>
								
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
    