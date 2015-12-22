<?php $this->load->view('admin/includes/header'); ?>

<script type='text/javascript'  src='<?php echo base_url();?>js/includes/functions.js' > </script>
<script type='text/javascript'  src='<?php echo base_url();?>js/admin/case_study/form.js' > </script>

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
$alias=				'';

if(!isset($case_study_industry_ids)) {
$industry_ids=		'';
}
if(!isset($case_study_industry_names)) {
$industry_names=	'';
}
if(!isset($case_study_solution_ids)) {
$solution_ids=		'';
}
if(!isset($case_study_solution_names)) {
$solution_names=	'';
}

$banner_image_thumbs='';
$title=				'';
$title_ar=			'';
$seo_words=			'';
$seo_words_ar=		'';
$client_id=			'';
$country_id=		'';
$end_user=		'';
$end_user_ar=		''; 
$project_name=		'';  
$project_name_ar=		'';  
$business_unit=		'';  
$business_unit_ar=		'';  
$project_leader=		'';  
$project_leader_ar=		''; 
$client_issue=		'';
$client_issue_ar=		'';
$work_scope=		'';
$work_scope_ar=		'';
$outcome=		'';
$outcome_ar=		'';
$team_members=		'';
$team_members_ar=		'';
$testimonial=		'';
$testimonial_ar=		''; 
$sort=0;


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
		$alias=				$current_row['alias'];
		$title=				$current_row['title'];
		$title_ar=			$current_row['title_ar'];
		$seo_words=			$current_row['seo_words'];
		$seo_words_ar=		$current_row['seo_words_ar'];
		$client_id=		$current_row['client_id'];
		$country_id=		$current_row['country_id'];
               
		$end_user=		$current_row['end_user'];
		$end_user_ar=		$current_row['end_user_ar']; 
		$project_name=		$current_row['project_name'];  
		$project_name_ar=		$current_row['project_name_ar'];  
		$business_unit=		$current_row['business_unit'];  
		$business_unit_ar=		$current_row['business_unit_ar'];  
		$project_leader=		$current_row['project_leader'];  
		$project_leader_ar=		$current_row['project_leader_ar']; 
		$client_issue=		$current_row['client_issue'];
		$client_issue_ar=		$current_row['client_issue_ar'];
		$work_scope=		$current_row['work_scope'];
		$work_scope_ar=		$current_row['work_scope_ar'];
		$outcome=		$current_row['outcome'];
		$outcome_ar=		$current_row['outcome_ar'];
		$team_members=		$current_row['team_members'];
		$team_members_ar=		$current_row['team_members_ar'];
		$testimonial=		$current_row['testimonial'];
		$testimonial_ar=		$current_row['testimonial_ar']; 
		
		//$banner_image_thumbs=$current_row['banner_image_thumbs'];
		//$banner_files=		$current_row['banner_files'];
		//$banner_image_thumb_selected =$current_row['banner_image_thumb_selected'];
		//$banner_file_selected =$current_row['banner_file_selected'];
		
		$industry_ids=	$current_row['case_study_industry_ids'];
		$industry_names=$current_row['case_study_industry_names'];
		$solution_ids=		$current_row['case_study_solution_ids'];
		$solution_names=	$current_row['case_study_solution_names'];
		
	}
	else 
	{
		$id=				$current_row->id;
		$alias=				$current_row->alias;
		$title=				$current_row->title;
		$title_ar=			$current_row->title_ar;
		$seo_words=			$current_row->seo_words;
		$seo_words_ar=		$current_row->seo_words_ar;
		$client_id=		$current_row->client_id;
		$country_id=		$current_row->country_id;
               
		$end_user=		$current_row->end_user;
		$end_user_ar=		$current_row->end_user_ar; 
		$project_name=		$current_row->project_name;  
		$project_name_ar=		$current_row->project_name_ar;  
		$business_unit=		$current_row->business_unit;  
		$business_unit_ar=		$current_row->business_unit_ar;  
		$project_leader=		$current_row->project_leader;  
		$project_leader_ar=		$current_row->project_leader_ar; 
		$client_issue=		$current_row->client_issue;
		$client_issue_ar=		$current_row->client_issue_ar;
		$work_scope=		$current_row->work_scope;
		$work_scope_ar=		$current_row->work_scope_ar;
		$outcome=		$current_row->outcome;
		$outcome_ar=		$current_row->outcome_ar;
		$team_members=		$current_row->team_members;
		$team_members_ar=		$current_row->team_members_ar;
		$testimonial=		$current_row->testimonial;
		$testimonial_ar=		$current_row->testimonial_ar; 
		
		$banner_image_thumbs=$current_row->banner_image_thumbs;
		$banner_files=		$current_row->banner_files;
		$banner_image_thumb_selected =$current_row->banner_image_thumb_selected;
		$banner_file_selected =$current_row->banner_file_selected;
		
		
		$industry_ids=	$case_study_industry_ids;
		$industry_names=$case_study_industry_names;
		$solution_ids=		$case_study_solution_ids;
		$solution_names=	$case_study_solution_names;
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
 * Casestudy object.
 * 
 * Intialize object from Casestudy controller class.
 * @var object.
 */

$this_object= new Casestudy();

/**
 * Country object.
 * 
 * Intialize object from Country controller class.
 * @var object.
 */
$this->load->controller(ADMIN.'/Country');
$country_object= new Country();


/**
 * Client object.
 * 
 * Intialize object from Client controller class.
 * @var object.
 */
$this->load->controller(ADMIN.'/Client');
$client_object= new Client();

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
    url: "<?php echo base_url().$this->lang->lang().'/'.ADMIN; ?>/casestudy/check_alias_availability/<?php echo $id; ?>",  
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
<h2><i class="icon-edit"></i> <?php echo lang('case_studies')?></h2>
<div class="box-icon">
	<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
	<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
	<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
</div>

</div>
<div class="box-content">
<form class="form-horizontal" id='frm_casestudy_row' name='frm_casestudy_row'  method='post' enctype='multipart/form-data'>

<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
<input type="hidden" name="last_modify_date" id="last_modify_date" value="<?php echo $last_modify_date; ?>"> 

<input type="hidden" name="hdn_banner_image_thumbs" id="hdn_banner_image_thumbs" value="<?php echo $banner_image_thumbs; ?>">
<input type="hidden" name=" hdn_banner_files" id=" hdn_banner_files" value="<?php echo $banner_files; ?>"> 


	<fieldset>
	
	<div class="form-actions">
	<a class='btn btn-success' href='<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/casestudy/table'>
				<i class='icon-zoom-in icon-white'></i>  
				<?php  echo $this->lang->line('lnk_view_all'); ?>                                           
	</a>
		
	<?php if($mode=='view') { 
	$readonly="readonly='readonly'";
	
if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_add)) {
	
	
	?>
	
	<a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/casestudy/form/0/add">
	<i class='icon-edit icon-white'></i>
	<?php  echo $this->lang->line('btn_add'); ?>
	</a>
	
	<?php 
}

if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_edit)) {

	?>
	
    <a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/casestudy/form/<?php echo $id;?>/edit">
    <i class='icon-edit icon-white'></i>  
	<?php  echo $this->lang->line('btn_edit'); ?>
	</a>
		
<?php 
}


if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_delete)) {

?>		
		
	<a class='btn btn-danger' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/casestudy/delete/<?php echo $id;?>" onclick="return delete_confirm('<?php echo $this->lang->lang(); ?>')">
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
<label class="control-label" for="focusedInput"><?php echo lang('alias'); ?></label>
<div class="controls">
	<input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="alias" id="alias" value="<?php echo $alias; ?>">

<div id="dv_alias_true"></div>
<div class="dv_error"  id="dv_alias_false" style="display:none;"><?php echo lang('alias_false'); ?></div>
								

</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('country'); ?></label>
<div class="controls">
<?php $dropdowns->drpdwn_country($country_object, $country_id,'country_id',$are_disabled); ?>
  <div class="dv_error" id="dv_country_false" style="display:none; "><?php echo lang('country_false'); ?></div>

</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('client'); ?></label>
<div class="controls">
<?php $dropdowns->drpdwn_client($client_object, $client_id,'client_id',$are_disabled); ?>
  <div class="dv_error" id="dv_client_false" style="display:none; "><?php echo lang('client_false'); ?></div>

</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('solutions'); ?></label>
<div class="controls">
<div style="width:690px">
<input type="hidden" name="solution_ids" id="solution_ids" value="<?php echo $solution_ids; ?>"> 
<input class="input-xlarge focused" type="text" readonly="readonly" name="solution_names" id="solution_names" value="<?php echo $solution_names; ?>" style="width:600px;">
<a class='btn btn-primary' href='javascript:void(0)' onclick="PopupCenter('<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/casestudy/popupSolution/<?php echo $id;?>' , '<?php echo $this->lang->line('select_case_study_solutions')?>',400,500);" >::::</a>
<div class="dv_error"  id="dv_solution_ids_false" style="display:none;"><?php echo lang('solution_ids_false'); ?></div>
</div>
</div>
</div>	

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('industries'); ?></label>
<div class="controls">
<div style="width:690px">
<input type="hidden" name="industry_ids" id="industry_ids" value="<?php echo $industry_ids; ?>"> 
<input class="input-xlarge focused" type="text" readonly="readonly" name="industry_names" id="industry_names" value="<?php echo $industry_names; ?>" style="width:600px;">
<a class='btn btn-primary' href='javascript:void(0)' onclick="PopupCenter('<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/casestudy/popupIndustry/<?php echo $id;?>' , '<?php echo $this->lang->line('select_case_study_industries')?>',400,500);" >::::</a>
<div class="dv_error"  id="dv_industry_ids_false" style="display:none;"><?php echo lang('industry_ids_false'); ?></div>
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
	   echo "<div><img src='".base_url().$banner_image_thumb."' title='$banner_image_thumb' /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='radio' name='headers' value='$banner_image_thumb' $checked> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $chk_delete</div>";
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

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('seo_words'); ?></label>
<div class="controls">
  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="seo_words" id="seo_words" value="<?php echo $seo_words; ?>" style="width:600px;">
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('end_user'); ?></label>
<div class="controls">
  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="end_user" id="end_user" value="<?php echo $end_user; ?>" style="width:600px;">
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('project_name'); ?></label>
<div class="controls">
  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="project_name" id="project_name" value="<?php echo $project_name; ?>" style="width:600px;">
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('business_unit'); ?></label>
<div class="controls">
  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="business_unit" id="business_unit" value="<?php echo $business_unit; ?>" style="width:600px;">
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('project_leader'); ?></label>
<div class="controls">
  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="project_leader" id="project_leader" value="<?php echo $project_leader; ?>" style="width:600px;">
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('client_issue'); ?></label>
<div class="controls">
  <textarea cols="65" rows="5" <?php echo $readonly; ?> name="client_issue" id="client_issue" class="input_textarea" ><?php echo $client_issue; ?></textarea>
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('work_scope'); ?></label>
<div class="controls">
  <textarea cols="65" rows="5" <?php echo $readonly; ?> name="work_scope" id="work_scope" class="input_textarea" ><?php echo $work_scope; ?></textarea>
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('outcome'); ?></label>
<div class="controls">
  <textarea cols="65" rows="5" <?php echo $readonly; ?> name="outcome" id="outcome" class="input_textarea" ><?php echo $outcome; ?></textarea>
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('team_members'); ?></label>
<div class="controls">
  <textarea cols="65" rows="5" <?php echo $readonly; ?> name="team_members" id="team_members" class="input_textarea" ><?php echo $team_members; ?></textarea>
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('testimonial'); ?></label>
<div class="controls">
  <textarea cols="65" rows="5" <?php echo $readonly; ?> name="testimonial" id="testimonial" class="input_textarea" ><?php echo $testimonial; ?></textarea>
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
  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="seo_words_ar" id="seo_words_ar" value="<?php echo $seo_words_ar; ?>" style="width:600px;">
</div>
</div>



<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('end_user'); ?></label>
<div class="controls">
  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="end_user_ar" id="end_user_ar" value="<?php echo $end_user_ar; ?>" style="width:600px;">
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('project_name'); ?></label>
<div class="controls">
  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="project_name_ar" id="project_name_ar" value="<?php echo $project_name_ar; ?>" style="width:600px;">
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('business_unit'); ?></label>
<div class="controls">
  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="business_unit_ar" id="business_unit_ar" value="<?php echo $business_unit_ar; ?>" style="width:600px;">
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('project_leader'); ?></label>
<div class="controls">
  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="project_leader_ar" id="project_leader_ar" value="<?php echo $project_leader_ar; ?>" style="width:600px;">
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('client_issue'); ?></label>
<div class="controls">
  <textarea cols="65" rows="5" <?php echo $readonly; ?> name="client_issue_ar" id="client_issue_ar" class="input_textarea" ><?php echo $client_issue_ar; ?></textarea>
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('work_scope'); ?></label>
<div class="controls">
  <textarea cols="65" rows="5" <?php echo $readonly; ?> name="work_scope_ar" id="work_scope_ar" class="input_textarea" ><?php echo $work_scope_ar; ?></textarea>
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('outcome'); ?></label>
<div class="controls">
  <textarea cols="65" rows="5" <?php echo $readonly; ?> name="outcome_ar" id="outcome_ar" class="input_textarea" ><?php echo $outcome_ar; ?></textarea>
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('team_members'); ?></label>
<div class="controls">
  <textarea cols="65" rows="5" <?php echo $readonly; ?> name="team_members_ar" id="team_members_ar" class="input_textarea" ><?php echo $team_members_ar; ?></textarea>
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('testimonial'); ?></label>
<div class="controls">
  <textarea cols="65" rows="5" <?php echo $readonly; ?> name="testimonial_ar" id="testimonial_ar" class="input_textarea" ><?php echo $testimonial_ar; ?></textarea>
</div>
</div>



</div>  
</div>



<br/>





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
    