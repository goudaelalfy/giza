<?php $this->load->view('admin/includes/header'); ?>

<script type='text/javascript'  src='<?php echo base_url();?>js/includes/functions.js' > </script>
<script type='text/javascript'  src='<?php echo base_url();?>js/admin/email_template/form.js' > </script>

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

$id=0;
$purpose=''; 
$subject='';
$body='';
$sms='';

$active=0;

$last_modify_date='';

$are_disabled='';
$readonly='';

if($mode!='add')
{
	if($mode=='view')
	{
		$are_disabled="disabled='disabled'";
	}
	
	if($mode=='return')
	{
		$id=		$current_row['id'];
		$purpose=	$current_row['purpose']; 
		$subject=	$current_row['subject'];
		$body=		$current_row['body'];
		//$sms=		$current_row['sms'];
		
		$active=	$current_row['active'];
		
		if($active==1) {
			$active="checked='checked'";
		}
	}
	else 
	{
		$id=				$current_row->id;
		$purpose=	$current_row->purpose; 
		$subject=	$current_row->subject;
		$body=		$current_row->body;
		//$sms=		$current_row->sms;
		
		$active=	$current_row->active;
		
		if($active==1) {
			$active="checked='checked'";
		}
		
		$last_modify_date=		$current_row->last_modify_date;
		
	}
	
}

$this_object= new EmailTemplate();
	
?>


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
<h2><i class="icon-edit"></i> <?php echo lang('email_templates')?></h2>
<div class="box-icon">
	<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
	<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
	<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
</div>

</div>
<div class="box-content">
<form class="form-horizontal" id='frm_emailTemplate_row' name='frm_emailTemplate_row'  method='post' enctype='multipart/form-data'>

<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
<input type="hidden" name="last_modify_date" id="last_modify_date" value="<?php echo $last_modify_date; ?>"> 


	<fieldset>
	
	<div class="form-actions">
	<a class='btn btn-success' href='<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/emailTemplate/table'>
				<i class='icon-zoom-in icon-white'></i>  
				<?php  echo $this->lang->line('lnk_view_all'); ?>                                           
	</a>
		
	<?php if($mode=='view') { 
	$readonly="readonly='readonly'";
	
if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_add)) {
	
	
	?>
	<!--
	<a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/emailTemplate/form/0/add">
	<i class='icon-edit icon-white'></i>
	<?php  echo $this->lang->line('btn_add'); ?>
	</a>
 	-->
	
	<?php 
}

if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_edit)) {

	?>
	
    <a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/emailTemplate/form/<?php echo $id;?>/edit">
    <i class='icon-edit icon-white'></i>  
	<?php  echo $this->lang->line('btn_edit'); ?>
	</a>
		
<?php 
}

if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_delete)) {

?>		
	<!-- 	
	<a class='btn btn-danger' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/emailTemplate/delete/<?php echo $id;?>" onclick="return delete_confirm('<?php echo $this->lang->lang(); ?>')">
	<i class='icon-trash icon-white'></i> 
	<?php  echo $this->lang->line('btn_delete'); ?>
	</a>
	 -->
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
<label class="control-label"><?php echo lang('purpose'); ?></label>
<div class="controls"><input type="text" <?php echo $readonly; ?> name="purpose" id="purpose" readonly="readonly" value="<?php echo $purpose; ?>" class="input-block-level" />
</div>
</div>


<div class="control-group">
<label class="control-label"><?php echo lang('subject'); ?></label>
<div class="controls"><input type="text" <?php echo $readonly; ?> name="subject" id="subject" value="<?php echo $subject; ?>" class="input-block-level" />
<div class="dv_error"  id="dv_subject_false" style="display:none;"><?php echo lang('subject_false'); ?></div>
</div>
</div>

<div class="control-group">
<label class="control-label"><?php echo lang('body'); ?></label>
<div class="controls">

<?php 
echo "<table border='0'>";

//echo"<tr><td width='100px'>".lang('username')."</td><td width='100px'> #$#$#$ </td></tr>";
echo "<tr><td width='100px'>".lang('firstname').'</td><td> #@#@#@ </td></tr>';
echo '<tr><td>'.lang('username').'</td><td> #&#&#& </td></tr>';
echo '<tr><td>'.lang('password').'</td><td> #*#*#* </td></tr>';
echo '<tr><td>'.lang('login_link').'</td><td> #!#!#! </td></tr>';
echo '<tr><td>'.lang('activate_link').'</td><td> #%#%#% </td></tr>';
echo '<tr><td>'.lang('gizasystems_link').'</td><td> #^#^#^ </td></tr>';

echo '</table><br/>';

?>

<textarea <?php echo $readonly; ?>  name="body" id="body" rows="" cols="" class="input-block-level" style="height: 300px"><?php echo $body; ?></textarea>

<div id="dv_body_true"></div>
<div class="dv_error"  id="dv_body_false" style="display:none;"><?php echo lang('body_false'); ?></div>
</div>
</div>


<!-- 
<div class="control-group">
<label class="control-label"><?php echo lang('sms'); ?></label>
<div class="controls">

<?php 
echo "<table border='0'>";

//echo"<tr><td width='100px'>".lang('username')."</td><td width='100px'> #$#$#$ </td></tr>";
echo "<tr><td width='100px'>".lang('firstname').'</td><td> #@#@#@ </td></tr>';
echo '<tr><td>'.lang('username').'</td><td> #&#&#& </td></tr>';
echo '<tr><td>'.lang('password').'</td><td> #*#*#* </td></tr>';
echo '<tr><td>'.lang('lnk_login').'</td><td> #%#%#% </td></tr>';
echo '<tr><td>'.lang('lnk_gizasystems').'</td><td> #^#^#^ </td></tr>';

echo '</table><br/>';

?>

<textarea <?php echo $readonly; ?>  name="sms" id="sms" rows="" cols="" class="input-xlarge" style="height: 100px"><?php echo $sms; ?></textarea>

<div id="dv_sms_true"></div>
<div class="dv_error"  id="dv_sms_false" style="display:none;"><?php echo lang('sms_false'); ?></div>
</div>
</div>
 -->
 
 
<div class="control-group">
<label class="control-label"><?php echo lang('active'); ?></label>
<div class="controls"><input type='checkbox' <?php echo $readonly; ?> name='active' id='active' <?php echo $active; ?> class="input-block-level" />
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
    