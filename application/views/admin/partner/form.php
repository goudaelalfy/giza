<?php $this->load->view('admin/includes/header'); ?>

<script type='text/javascript'  src='<?php echo base_url();?>js/includes/functions.js' > </script>
<script type='text/javascript'  src='<?php echo base_url();?>js/admin/partner/form.js' > </script>

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
$name='';  
$username='';  
$password='';  
$website='';  
$address='';  
$phone='';  
$industries='';  
$solutions='';  
$brief=''; 
$logo='';  
$contact_title='';  
$contact_firstname='';  
$contact_lastname='';  
$contact_position='';  
$contact_mobile='';  
$contact_email=''; 
$interests=array();
$registeration_datetime='';  
$active='';  
$active_code='';



if(!isset($partner_industry_ids)) {
$partner_industry_ids=		'';
}
if(!isset($partner_industry_names)) {
$partner_industry_names=	'';
}
if(!isset($partner_solution_ids)) {
$partner_solution_ids=		'';
}
if(!isset($partner_solution_names)) {
$partner_solution_names=	'';
}


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
		$name=$current_row['name'];  
		$username=$current_row['username'];  
		$password=$current_row['password'];  
		$website=$current_row['website'];  
		$address=$current_row['address'];  
		$phone=$current_row['phone'];  
		//$industries=$current_row['industries'];  
		//$solutions=$current_row['solutions'];  
		$brief=$current_row['brief']; 
		//$logo=$current_row['logo'];  
		$contact_title=$current_row['contact_title'];  
		$contact_firstname=$current_row['contact_firstname'];  
		$contact_lastname=$current_row['contact_lastname'];  
		$contact_position=$current_row['contact_position'];  
		$contact_mobile=$current_row['contact_mobile'];  
		$contact_email=$current_row['contact_email']; 
		$interests=$current_row['interests'];
		//$registeration_datetime=$current_row['registeration_datetime'];  
		//$active=$current_row['active'];  
		//$active_code=$current_row['active_code'];
	
		$interests = explode(",", $interests);
		$interests_count  =count($interests); 
		
		$partner_industry_ids=	$current_row['partner_industry_ids'];
		$partner_industry_names=$current_row['partner_industry_names'];
		$partner_solution_ids=		$current_row['partner_solution_ids'];
		$partner_solution_names=	$current_row['partner_solution_names'];
		
	}
	else 
	{
		$id=	$current_row->id;
		$name=$current_row->name;  
		$username=$current_row->username;  
		$password=$current_row->password;  
		$website=$current_row->website;  
		$address=$current_row->address;  
		$phone=$current_row->phone;  
		//$industries=$current_row->industries;  
		//$solutions=$current_row->solutions;  
		$brief=$current_row->brief; 
		$logo=$current_row->logo;  
		$contact_title=$current_row->contact_title;  
		$contact_firstname=$current_row->contact_firstname;  
		$contact_lastname=$current_row->contact_lastname;  
		$contact_position=$current_row->contact_position;  
		$contact_mobile=$current_row->contact_mobile;  
		$contact_email=$current_row->contact_email; 
		$interests=$current_row->interests;
		//$registeration_datetime=$current_row->registeration_datetime;  
		//$active=$current_row->active;  
		//$active_code=$current_row->active_code;
		
		$interests = explode(",", $interests);
		$interests_count  =count($interests); 
		
		$partner_industry_ids=	$partner_industry_ids;
		$partner_industry_names=$partner_industry_names;
		$partner_solution_ids=		$partner_solution_ids;
		$partner_solution_names=	$partner_solution_names;
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
 * Partner controller object.
 * 
 * Intialize object from Partner controller class.
 * @var object.
 */

$this_object= new Partner();

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
    url: "<?php echo base_url().$this->lang->lang().'/'.ADMIN; ?>/partner/check_username_availability/<?php echo $id; ?>",  
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
<h2><i class="icon-edit"></i> <?php echo lang('partners')?></h2>
<div class="box-icon">
	<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
	<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
	<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
</div>

</div>
<div class="box-content">
<form class="form-horizontal" id='frm_partner_row' name='frm_partner_row'  method='post' enctype='multipart/form-data'>

<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
<input type="hidden" name="last_modify_date" id="last_modify_date" value="<?php echo $last_modify_date; ?>"> 


	<fieldset>
	
	<div class="form-actions">
	<a class='btn btn-success' href='<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/partner/table'>
				<i class='icon-zoom-in icon-white'></i>  
				<?php  echo $this->lang->line('lnk_view_all'); ?>                                           
	</a>
		
	<?php if($mode=='view') { 
	$readonly="readonly='readonly'";
	
if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_add)) {
	
	
	?>
	
	<a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/partner/form/0/add">
	<i class='icon-edit icon-white'></i>
	<?php  echo $this->lang->line('btn_add'); ?>
	</a>
	
	<?php 
}

if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_edit)) {

	?>
	
    <a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/partner/form/<?php echo $id;?>/edit">
    <i class='icon-edit icon-white'></i>  
	<?php  echo $this->lang->line('btn_edit'); ?>
	</a>
		
<?php 
}

if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_delete)) {

?>		
		
	<a class='btn btn-danger' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/partner/delete/<?php echo $id;?>" onclick="return delete_confirm('<?php echo $this->lang->lang(); ?>')">
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
								<label class="control-label" for="focusedInput"><?php echo lang('name'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="name" id="name" value="<?php echo $name; ?>">
								<div class="dv_error" id="dv_name_false" style="display:none; "><?php echo lang('name_false'); ?></div>
								
								</div>
							  </div>
							 			  
			 					<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('website'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="website" id="website" value="<?php echo $website; ?>">
								
								</div>
							  </div>
							  									  
												  
							  <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('address'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="address" id="address" value="<?php echo $address; ?>">
								
								</div>
							  </div>
							  

							 <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('phone'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="phone" id="phone" value="<?php echo $phone; ?>">
								<div class="dv_error" id="dv_phone_false" style="display:none"><?php echo lang('phone_false'); ?></div>
								
								</div>
							  </div>
							
						
							
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('industries'); ?></label>
<div class="controls">
<div style="width:690px">
<input type="hidden" name="industry_ids" id="industry_ids" value="<?php echo $partner_industry_ids; ?>"> 
<input class="input-xlarge focused" type="text" readonly="readonly" name="industry_names" id="industry_names" value="<?php echo $partner_industry_names; ?>" style="width:400px;">
<a class='btn btn-primary' href='javascript:void(0)' onclick="PopupCenter('<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/partner/popupindustry/<?php echo $id;?>' , '<?php echo $this->lang->line('select_partner_industrys')?>',400,500);" >::::</a>
<div class="dv_error"  id="dv_industry_ids_false" style="display:none;"><?php echo lang('industry_ids_false'); ?></div>
</div>
</div>
</div>	

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('solutions'); ?></label>
<div class="controls">
<div style="width:690px">
<input type="hidden" name="solution_ids" id="solution_ids" value="<?php echo $partner_solution_ids; ?>"> 
<input class="input-xlarge focused" type="text" readonly="readonly" name="solution_names" id="solution_names" value="<?php echo $partner_solution_names; ?>" style="width:400px;">
<a class='btn btn-primary' href='javascript:void(0)' onclick="PopupCenter('<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/partner/popupsolution/<?php echo $id;?>' , '<?php echo $this->lang->line('select_partner_solutions')?>',400,500);" >::::</a>
<div class="dv_error"  id="dv_solution_ids_false" style="display:none;"><?php echo lang('solution_ids_false'); ?></div>
</div>
</div>
</div>			
								
								
								<div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('brief'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="brief" id="brief" value="<?php echo $brief; ?>">
								<div class="dv_error" id="dv_brief_false" style="display:none"><?php echo lang('brief_false'); ?></div>
								
								</div>
							  </div>
							  
							  							
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
 
	
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('contact_title'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="contact_title" id="contact_title" value="<?php echo $contact_title; ?>">
								<div class="dv_error" id="dv_contact_title_false" style="display:none"><?php echo lang('contact_title_false'); ?></div>
								
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('contact_firstname'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="contact_firstname" id="contact_firstname" value="<?php echo $contact_firstname; ?>">
								<div class="dv_error" id="dv_contact_firstname_false" style="display:none"><?php echo lang('contact_firstname_false'); ?></div>
								
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('contact_lastname'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="contact_lastname" id="contact_lastname" value="<?php echo $contact_lastname; ?>">
								<div class="dv_error" id="dv_contact_lastname_false" style="display:none"><?php echo lang('contact_lastname_false'); ?></div>
								
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('contact_position'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="contact_position" id="contact_position" value="<?php echo $contact_position; ?>">
								<div class="dv_error" id="dv_contact_position_false" style="display:none"><?php echo lang('contact_position_false'); ?></div>
								
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('contact_mobile'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="contact_mobile" id="contact_mobile" value="<?php echo $contact_mobile; ?>">
								<div class="dv_error" id="dv_contact_mobile_false" style="display:none"><?php echo lang('contact_mobile_false'); ?></div>
								
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('contact_email'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="contact_email" id="contact_email" value="<?php echo $contact_email; ?>">
								<div class="dv_error" id="dv_contact_email_false" style="display:none"><?php echo lang('contact_email_false'); ?></div>
								
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
    