<?php $this->load->view('admin/includes/header'); ?>

<script type='text/javascript'  src='<?php echo base_url();?>js/includes/functions.js' > </script>
<script type='text/javascript'  src='<?php echo base_url();?>js/admin/user/user.js' > </script>



<?php 

$id=0;
$username=	'';
$password=	'';
$name='';
$mobile=	'';
$telephone=	'';
$email='';
$address=	'';
$notes='';

$user_group_id=0;
//$user_group='';
//$user_rule_id=0;
//$user_rule=	'';

$last_modify_date='';

$are_disabled='';
$readonly='';

if($mode!='add')
{
	if($mode=='view')
	{
		$are_disabled="disabled='disabled'";
		$readonly="readonly='readonly'";
		
	}
	
	if($mode=='return')
	{
		$id=				$user_row['id'];
		$username=			$user_row['username'];
		$password=			$user_row['password'];
		$name=				$user_row['name'];
		$mobile=			$user_row['mobile'];
		$telephone=			$user_row['telephone'];
		$email=				$user_row['email'];
		$address=			$user_row['address'];
		
		$user_group_id=		$user_row['user_group_id'];
		//$user_group=		$user_row['group'];
		//$user_rule_id=		$user_row['user_rule_id'];
		//$user_rule=			$user_row['rule'];
		
	}
	else 
	{
		$id=				$user_row->id;
		$username=			$user_row->username;
		$password=			$user_row->password;
		$name=				$user_row->name;
		$mobile=			$user_row->mobile;
		$telephone=			$user_row->telephone;
		$email=				$user_row->email;
		$address=			$user_row->address;
		
		$user_group_id=		$user_row->user_group_id;
		//$user_group=		$user_row->group;
		//$user_rule_id=		$user_row->user_rule_id;
		//$user_rule=			$user_row->rule;
		
		
		$last_modify_date=		$user_row->last_modify_date;
		
	}
	
}


$dropdowns= new Dropdowns();
?>
<SCRIPT type="text/javascript">
pic1 = new Image(16, 16); 
pic1.src = "<?php echo base_url(); ?>images/icons/loader.gif";

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
    url: "<?php echo base_url().$this->lang->lang(); ?>/admin/user/check_username_availability/<?php echo $id; ?>",  
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

$("#mobile").change(function() { 
	
	var mobile = $("#mobile").val().replace(/^\s+|\s+$/g, '');
	var regexObj = /[^0-9]/;
	if(mobile != "" && regexObj.test(mobile)== flase)
	{
		$("#dv_mobile_false").show();
	}
	else
	{
		$("#dv_mobile_false").hide();
	}
});

$("#telephone").change(function() { 

	var telephone = $("#telephone").val().replace(/^\s+|\s+$/g, '');
	var regexObj = /[^0-9]/;
	if(telephone != "" && regexObj.test(telephone)== flase)
	{
		$("#dv_telephone_false").show();
	}
	else
	{
		$("#dv_telephone_false").hide();
	}
});

$("#email").change(function() { 

	var email = $("#email").val().replace(/^\s+|\s+$/g, '');
	var regexObj = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	if(email != "" && regexObj.test(email)== flase)
	{
		$("#dv_email_false").show();
	}
	else
	{
		$("#dv_email_false").hide();
	}
});

$("#email").change(function() { alert('');
	
	alert('');
	
});

});
</SCRIPT>




<form id='frm_user_row' name='frm_user_row'  method='post' >

<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
<input type="hidden" name="last_modify_date" id="last_modify_date" value="<?php echo $last_modify_date; ?>"> 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="top_title"><?php echo lang('title')?></td>
  </tr>
  <tr>
    <td class="bot_tab">
	<div class="form_ico_pad">
	
	<span class="record_btn"><a href="<?php echo base_url().$this->lang->lang();?>/admin/user/table"><img src="<?php echo base_url();?>css/design/images/view.png" border="0" /><?php  echo $this->lang->line('lnk_view_all'); ?></a></span>
	
	<?php if($mode=='view') { 
	$readonly="readonly='readonly'";
	
		?>
	
    <span class="record_btn"><a href="<?php echo base_url().$this->lang->lang();?>/admin/user/form/<?php echo $id;?>/edit"><img src="<?php echo base_url();?>css/design/images/edit.png" border="0" /><?php  echo $this->lang->line('btn_edit'); ?></a></span>
	<span class="record_btn"><a href="<?php echo base_url().$this->lang->lang();?>/admin/user/delete/<?php echo $id;?>" onclick="return delete_confirm('<?php echo $this->lang->lang(); ?>')"><img src="<?php echo base_url();?>css/design/images/delete.png" border="0" /><?php  echo $this->lang->line('btn_delete'); ?></a></span>
	<span class="record_btn"><a href="<?php echo base_url().$this->lang->lang();?>/admin/user/form/0/add"><img src="<?php echo base_url();?>css/design/images/New.png" border="0" /><?php  echo $this->lang->line('btn_add'); ?></a></span>
	<?php }?>
	
	<?php if($mode!='view') {
		 
		$readonly="";
	
		if($id==0)
		{
			$undo_redirect_url=base_url().$this->lang->lang()."/admin/user/table";
		}
		else 
		{
			
			$undo_redirect_url=base_url().$this->lang->lang()."/admin/user/form/$id/view";
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
    <td width="25%"><?php echo lang('username'); ?></td>
    <td><input type="text" <?php echo $readonly; ?> name="username" id="username" value="<?php echo $username; ?>" class="input_pr" /></td>
  <td>
    <div id="dv_username_true"></div>
    </td>
  </tr>

<tr >
<td></td><td>
<div class="dv_error"  id="dv_username_false" style="display:none;"><?php echo lang('username_false'); ?></div>
</td>
</tr>

  <tr>
    <td><?php echo lang('password'); ?></td>
    <td><input  type="password" <?php echo $readonly; ?> name="password" id="password" value="<?php echo $password; ?>" class="input_pr" /></td>
 </tr>

<tr>
<td></td><td>
<div class="dv_error" id="dv_password_false" style="display:none"><?php echo lang('password_false'); ?></div>
</td>
  </tr>
  <tr>
    <td><?php echo lang('password_confirm'); ?></td>
    <td><input type="password" <?php echo $readonly; ?> name="password_confirm" id="password_confirm" value="<?php echo $password; ?>" class="input_pr" /></td>
  </tr>

<tr>
<td></td><td>
<div class="dv_error" id="dv_password_confirm_false" style="display:none"><?php echo lang('password_confirm_false'); ?></div>
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
    <td><?php echo lang('mobile'); ?></td>
    <td><input type="text" <?php echo $readonly; ?> name="mobile" id="mobile" value="<?php echo $mobile; ?>" class="input_pr" /></td>
  </tr>

<tr>
<td></td><td>
<div class="dv_error" id="dv_mobile_false" style="display:none"><?php echo lang('mobile_false'); ?></div>
</td>
  </tr>
  <tr>
    <td><?php echo lang('telephone'); ?></td>
    <td><input type="text" <?php echo $readonly; ?> name="telephone" id="telephone" value="<?php echo $telephone; ?>" class="input_pr" /></td>
  </tr>

<tr>
<td></td><td>
<div class="dv_error" id="dv_telephone_false" style="display:none"><?php echo lang('telephone_false'); ?></div>
</td>
  </tr>
  <tr>
    <td><?php echo lang('email'); ?></td>
    <td><input type="text" <?php echo $readonly; ?> name="email" id="email" value="<?php echo $email; ?>" class="input_pr" /></td>
 </tr>

<tr>
<td></td><td>
<div class="dv_error" id="dv_email_false" style="display:none"><?php echo lang('email_false'); ?></div>
</td>
  </tr>
  <tr>
    <td><?php echo lang('address'); ?></td>
    <td><input type="text" <?php echo $readonly; ?> name="address" id="address" value="<?php echo $address; ?>" class="input_pr" /></td>
  <td></td>
  </tr>
  
  <tr>
    <td><?php echo lang('user_group'); ?></td>
    <td><?php $dropdowns->drpdwn_user_group($user_group_id,'user_group_id'); ?></td>
</tr>
<tr>
<td></td><td>
<div class="dv_error" id="dv_user_group_false" style="display:none"><?php echo lang('user_group_false'); ?></div>
</td>
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
    