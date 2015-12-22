<?php $this->load->view('admin/includes/header'); ?>

<script type='text/javascript'  src='<?php echo base_url();?>js/includes/functions.js' > </script>
<script type='text/javascript'  src='<?php echo base_url();?>js/screen/form.js' > </script>

<?php 

$id=0;
$code='';
$name='';
$name_ar='';
$url='';
$parent_id=0;
$last_modify_date='';

$are_disabled="";

if($mode!='add')
{
	if($mode=='view')
	{
		$are_disabled="disabled='disabled'";
	}
	
	if($mode=='return')
	{
		$id=				$screen_row['id'];
		$code=				$screen_row['code'];
		$name=				$screen_row['name'];
		$name_ar=			$screen_row['name_ar'];
		$url=				$screen_row['url'];	
		$parent_id=$screen_row['parent_id'];		
	}
	else 
	{
		$id=				$screen_row->id;
		$code=				$screen_row->code;
		$name=				$screen_row->name;
		$name_ar=			$screen_row->name_ar;
		$url=				$screen_row->url;
		$parent_id=				$screen_row->parent_id;
		
		$last_modify_date=		$screen_row->last_modify_date;
	}
	
}

$dropdowns= new Dropdowns();

?>

<SCRIPT type="text/javascript">
pic1 = new Image(16, 16); 
pic1.src = "<?php echo base_url(); ?>images/icons/loader.gif";

$(document).ready(function(){

$("#code").change(function() { 

var code = $("#code").val().replace(/^\s+|\s+$/g, '');

if(code.length >= 2)
{
$("#dv_code_false").show();
$("#dv_code_false").html('<img src="<?php echo base_url();?>images/icons/loader.gif" align="absmiddle">&nbsp;Checking availability...');
$("#dv_code_true").html('');
    $.ajax({  
    type: "POST",  
    url: "<?php echo base_url().$this->lang->lang(); ?>/admin/screen/check_code_availability/<?php echo $id; ?>",  
    data: "code="+ code,  
    success: function(msg){  
   
   $("#dv_code_false").ajaxComplete(function(event, request, settings){ 

	if(msg == 'OK')
	{ 
        $("#code").removeClass('object_error'); // if necessary
		$("#code").addClass("object_ok");
		$(this).html('');
		$("#dv_code_true").html('&nbsp;<img src="<?php echo base_url();?>images/icons/tick.gif" align="absmiddle">');
	}  
	else  
	{  
		$("#code").removeClass('object_ok'); // if necessary
		$("#code").addClass("object_error");
		$(this).html(msg+"<input type='hidden'  code ='code_not_availabe' id='code_not_availabe' >");
		$("#dv_code_true").html('');
	}  
   
   });

 } 
   
  }); 

}
else
	{
	$("#dv_code_false").show();
	$("#dv_code_false").html('<font color="red"><?php echo lang('code_length_error'); ?></font>');
	$("#dv_code_true").html('');
	$("#code").removeClass('object_ok'); // if necessary
	$("#code").addClass("object_error");
	}

});

$("#name").change(function() { 

	var name = $("#name").val();
	if(name== "" )
	{
		$("#dv_name_false").show();
	}
	else
	{
		$("#dv_name_false").hide();
	}
});


$("#name_ar").change(function() { 

	var name_ar = $("#name_ar").val();
	if(name_ar== "" )
	{
		$("#dv_name_ar_false").show();
	}
	else
	{
		$("#dv_name_ar_false").hide();
	}
});


$("#url").change(function() { 

	var url = $("#url").val();
	if(url== "" )
	{
		$("#dv_url_false").show();
	}
	else
	{
		$("#dv_url_false").hide();
	}
});


});
</SCRIPT>





<form id='frm_screen_row' name='frm_screen_row'  method='post' >

<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
<input type="hidden" name="last_modify_date" id="last_modify_date" value="<?php echo $last_modify_date; ?>"> 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="top_title"><?php echo lang('title')?></td>
  </tr>
  <tr>
    <td class="bot_tab">
	<div class="form_ico_pad">
	
	<span class="record_btn"><a href="<?php echo base_url().$this->lang->lang();?>/admin/screen/table"><img src="<?php echo base_url();?>css/design/images/view.png" border="0" /><?php  echo $this->lang->line('lnk_view_all'); ?></a></span>
	
	<?php if($mode=='view') { 
	$readonly="readonly='readonly'";
	
		?>
	
    <span class="record_btn"><a href="<?php echo base_url().$this->lang->lang();?>/admin/screen/form/<?php echo $id;?>/edit"><img src="<?php echo base_url();?>css/design/images/edit.png" border="0" /><?php  echo $this->lang->line('btn_edit'); ?></a></span>
	<span class="record_btn"><a href="<?php echo base_url().$this->lang->lang();?>/admin/screen/delete/<?php echo $id;?>" onclick="return delete_confirm('<?php echo $this->lang->lang(); ?>')"><img src="<?php echo base_url();?>css/design/images/delete.png" border="0" /><?php  echo $this->lang->line('btn_delete'); ?></a></span>
	<span class="record_btn"><a href="<?php echo base_url().$this->lang->lang();?>/admin/screen/form/0/add"><img src="<?php echo base_url();?>css/design/images/New.png" border="0" /><?php  echo $this->lang->line('btn_add'); ?></a></span>
	<?php }?>
	
	<?php if($mode!='view') {
		 
		$readonly="";
	
		if($id==0)
		{
			$undo_redirect_url=base_url().$this->lang->lang()."/admin/screen/table";
		}
		else 
		{
			
			$undo_redirect_url=base_url().$this->lang->lang()."/admin/screen/form/$id/view";
		}
		?>
		
		<span class="record_btn"><a href="<?php echo $undo_redirect_url; ?>"><img src="<?php echo base_url();?>css/design/images/undo.png" border="0" /><?php  echo $this->lang->line('btn_undo'); ?></a></span>
	 
		 
		<?php }?>
	
	
	
	</div>
	
<table width="70%" border="0" cellspacing="3" cellpadding="0">

<tr height="40px">
<td colspan="3" >
  <span style="font-weight:normal; color: red;">
		<?php 
		if(isset($error))
		{
			echo $error;
		}
		?>
		</span>
		<span style="font-weight:normal;">
		<?php 
		if(isset($message))
		{
			echo $message;
		}
		?>
		</span>
</td>
</tr>

 
  <tr>
    <td width="100px"><?php echo lang('code'); ?></td>
    <td><input type="text" <?php echo $readonly; if($mode=='edit') echo "readonly='readonly'";?> name="code" id="code" value="<?php echo $code; ?>" class="input_pr" /></td>
  	<td>
    <div id="dv_code_true"></div>
    </td>
  </tr>

<tr>
<td></td><td>
<div class="dv_error" id="dv_code_false" style="display:none; "><?php echo lang('code_false'); ?></div>
</td>
  </tr>
 
 <tr>
    <td><?php echo lang('name'); ?></td>
    <td><input type="text" <?php echo $readonly; ?> name="name" id="name" value="<?php echo $name; ?>" class="input_pr" /></td>
  </tr>

<tr>
<td></td><td>
<div class="dv_error" id="dv_name_false" style="display:none; "><?php echo lang('name_false'); ?></div>
</td>
  </tr>
  
  
  <tr>
    <td><?php echo lang('name_ar'); ?></td>
    <td><input type="text" <?php echo $readonly; ?> name="name_ar" id="name_ar" value="<?php echo $name_ar; ?>" class="input_pr" /></td>
  </tr>

<tr>
<td></td><td>
<div class="dv_error" id="dv_name_ar_false" style="display:none; "><?php echo lang('name_ar_false'); ?></div>
</td>
  </tr>
  
  
  
  <tr>
    <td><?php echo lang('url'); ?></td>
    <td><input type="text" <?php echo $readonly; ?> name="url" id="url" value="<?php echo $url; ?>" class="input_pr" /></td>
  </tr>

<tr>
<td></td><td>
<div class="dv_error" id="dv_url_false" style="display:none; "><?php echo lang('url_false'); ?></div>
</td>
  </tr>
  
  
    <tr>
    <td><?php echo lang('parent'); ?></td>
    <td><?php $dropdowns->drpdwn_screen_module($parent_id,'parent_id'); ?></td>
  </tr>

  
  <tr>
    <td></td>
    <td height="30">
    <?php if($mode!='view') { ?>
    <span class="save_btn"><input type="submit" name="smt_save" id="smt_save" value="<?php echo lang('btn_save'); ?>" onclick="return validate_form('<?php echo $this->lang->lang(); ?>'); " /></span></td>
    <?php }?>
  <td></td>
  </tr>
 
  
</table>


</td>
  </tr>
  
</table>

</form>


<?php $this->load->view('admin/includes/footer'); ?>