<?php $this->load->view('admin/includes/header'); ?>

<script type='text/javascript'  src='<?php echo base_url();?>js/includes/functions.js' > </script>
<script type='text/javascript'  src='<?php echo base_url();?>js/admin/send_email/form.js' > </script>

<script>
function PopupCenter(pageURL, title,w,h) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=1, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}
</script>


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





<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> <?php echo lang('send_emails')?></h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" id='frm_sendemail_row' name='frm_sendemail_row'  action="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/sendemail/send" method="post" enctype='multipart/form-data' method='post' >

							<fieldset>
							
							<div class="form-actions">
							
					
		
								
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
<label class="control-label" for="focusedInput"><?php echo lang('to'); ?></label>
<div class="controls">
<div style="width:690px">
<input class="input-xlarge focused" type="text"  name="to" id="to" value="">
<a class='btn btn-primary' href='javascript:void(0)' onclick="PopupCenter('<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/sendemail/popupalumni/to' , '<?php echo $this->lang->line('alumnies')?>',400,500);" ><?php echo $this->lang->line('alumnies')?></a>
<a class='btn btn-primary' href='javascript:void(0)' onclick="PopupCenter('<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/sendemail/popupclient/to' , '<?php echo $this->lang->line('clients')?>',400,500);" ><?php echo $this->lang->line('clients')?></a>
<a class='btn btn-primary' href='javascript:void(0)' onclick="PopupCenter('<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/sendemail/popuppartner/to' , '<?php echo $this->lang->line('partners')?>',400,500);" ><?php echo $this->lang->line('partners')?></a>
<a class='btn btn-primary' href='javascript:void(0)' onclick="PopupCenter('<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/sendemail/popupsubscriber/to' , '<?php echo $this->lang->line('newsletter_subscriber')?>',400,500);" ><?php echo $this->lang->line('newsletter_subscriber')?></a>

<div class="dv_error"  id="dv_to_false" style="display:none;"><?php echo lang('to_false'); ?></div>
</div>
</div>
</div>	


<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('cc'); ?></label>
<div class="controls">
<div style="width:690px">
<input class="input-xlarge focused" type="text"  name="cc" id="cc" value="">
<a class='btn btn-primary' href='javascript:void(0)' onclick="PopupCenter('<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/sendemail/popupalumni/cc' , '<?php echo $this->lang->line('alumnies')?>',400,500);" ><?php echo $this->lang->line('alumnies')?></a>
<a class='btn btn-primary' href='javascript:void(0)' onclick="PopupCenter('<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/sendemail/popupclient/cc' , '<?php echo $this->lang->line('clients')?>',400,500);" ><?php echo $this->lang->line('clients')?></a>
<a class='btn btn-primary' href='javascript:void(0)' onclick="PopupCenter('<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/sendemail/popuppartner/cc' , '<?php echo $this->lang->line('partners')?>',400,500);" ><?php echo $this->lang->line('partners')?></a>
<a class='btn btn-primary' href='javascript:void(0)' onclick="PopupCenter('<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/sendemail/popupsubscriber/cc' , '<?php echo $this->lang->line('newsletter_subscriber')?>',400,500);" ><?php echo $this->lang->line('newsletter_subscriber')?></a>

<div class="dv_error"  id="dv_cc_false" style="display:none;"><?php echo lang('cc_false'); ?></div>
</div>
</div>
</div>	

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('bcc'); ?></label>
<div class="controls">
<div style="width:690px">
<input class="input-xlarge focused" type="text"  name="bcc" id="bcc" value="">
<a class='btn btn-primary' href='javascript:void(0)' onclick="PopupCenter('<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/sendemail/popupalumni/bcc' , '<?php echo $this->lang->line('alumnies')?>',400,500);" ><?php echo $this->lang->line('alumnies')?></a>
<a class='btn btn-primary' href='javascript:void(0)' onclick="PopupCenter('<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/sendemail/popupclient/bcc' , '<?php echo $this->lang->line('clients')?>',400,500);" ><?php echo $this->lang->line('clients')?></a>
<a class='btn btn-primary' href='javascript:void(0)' onclick="PopupCenter('<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/sendemail/popuppartner/bcc' , '<?php echo $this->lang->line('partners')?>',400,500);" ><?php echo $this->lang->line('partners')?></a>
<a class='btn btn-primary' href='javascript:void(0)' onclick="PopupCenter('<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/sendemail/popupsubscriber/bcc' , '<?php echo $this->lang->line('newsletter_subscriber')?>',400,500);" ><?php echo $this->lang->line('newsletter_subscriber')?></a>

<div class="dv_error"  id="dv_bcc_false" style="display:none;"><?php echo lang('bcc_false'); ?></div>
</div>
</div>
</div>	
					
					
			
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('subject'); ?></label>
<div class="controls">
  <input class="input-xlarge focused" type="text"  name="subject" id="subject" value="">
<div class="dv_error" id="dv_subject_false" style="display:none; "><?php echo lang('subject_false'); ?></div>

</div>
</div>		


 
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('attachment'); ?></label>
<div class="controls">
<div style="width:390px" >
<input type="text" id="attachment_name" class="input-xlarge focused" readonly="readonly"> 
<div class="file_input_div">
<input type="button" value="<?php echo lang('btn_file_input'); ?>" class="btn btn-info" />
<input type="file" class="file_input_hidden" id="attachment" name="attachment" onchange="javascript: document.getElementById('attachment_name').value = this.value" />								
</div>
<br/>
</div>
</div>
</div> 



<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('body'); ?></label>
<div class="controls">
  <textarea cols="65" rows="5"  name="body" id="body" class="input_textarea" ></textarea>
</div>
</div>

							  

 						<div class="form-actions">
							  
							  
						    <input type="submit" class="btn btn-primary" name="smt_send" id="smt_send" value="<?php echo lang('btn_send'); ?>" onclick="return validate_form('<?php echo $this->lang->lang(); ?>'); " />
							<a class='btn btn-warning' href="javascript: history.go(-1)"><?php echo lang('btn_cancel'); ?></a>
							  </div>
							</fieldset>
						  </form>
					
					</div>
				</div><!--/span-->
			
			</div>




<?php $this->load->view('admin/includes/footer'); ?>