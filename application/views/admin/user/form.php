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
$admin='';

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
		$admin=		$user_row['admin'];
		if($admin==1) {
		$admin="checked='checked'";
		}
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
			
		$admin=		$user_row->admin;
		if($admin==1) {
		$admin="checked='checked'";
		}
		
		$last_modify_date=		$user_row->last_modify_date;
		
	}
	
}


$dropdowns= new Dropdowns();
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
    url: "<?php echo base_url().$this->lang->lang().'/'.ADMIN; ?>/user/check_username_availability/<?php echo $id; ?>",  
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






			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> <?php echo lang('users')?></h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" id='frm_user_row' name='frm_user_row'  method='post' >

						<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
						<input type="hidden" name="last_modify_date" id="last_modify_date" value="<?php echo $last_modify_date; ?>"> 

							<fieldset>
							
							<div class="form-actions">
							<a class='btn btn-success' href='<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/user/table'>
										<i class='icon-zoom-in icon-white'></i>  
										<?php  echo $this->lang->line('lnk_view_all'); ?>                                           
							</a>
								
							<?php if($mode=='view') { 
	$readonly="readonly='readonly'";
	
		?>
	
	<a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/user/form/0/add">
	<i class='icon-edit icon-white'></i>
	<?php  echo $this->lang->line('btn_add'); ?>
	</a>
	
    <a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/user/form/<?php echo $id;?>/edit">
    <i class='icon-edit icon-white'></i>  
	<?php  echo $this->lang->line('btn_edit'); ?>
	</a>
		
	<a class='btn btn-danger' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/user/delete/<?php echo $id;?>" onclick="return delete_confirm('<?php echo $this->lang->lang(); ?>')">
	<i class='icon-trash icon-white'></i> 
	<?php  echo $this->lang->line('btn_delete'); ?>
	</a>
	
	
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
								<label class="control-label" for="focusedInput"><?php echo lang('mobile'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="mobile" id="mobile" value="<?php echo $mobile; ?>">
								<div class="dv_error" id="dv_mobile_false" style="display:none"><?php echo lang('mobile_false'); ?></div>
								
								</div>
							  </div>
							  
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('telephone'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="telephone" id="telephone" value="<?php echo $telephone; ?>">
								<div class="dv_error" id="dv_telephone_false" style="display:none"><?php echo lang('telephone_false'); ?></div>
								
								</div>
							  </div>
							  
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('email'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="email" id="email" value="<?php echo $email; ?>">
								<div class="dv_error" id="dv_email_false" style="display:none"><?php echo lang('email_false'); ?></div>
								
								</div>
							  </div>
							  
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('address'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="address" id="address" value="<?php echo $address; ?>">
								
								</div>
							  </div>
							  
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('user_group'); ?></label>
								<div class="controls">
								  <?php $dropdowns->drpdwn_user_group($user_group_id,'user_group_id',$are_disabled); ?>
								<div class="dv_error" id="dv_user_group_false" style="display:none"><?php echo lang('user_group_false'); ?></div>
								
								</div>
							  </div>
							  
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo lang('admin'); ?></label>
								<div class="controls">
								  <input  type="checkbox" id="admin" name="admin" <?php echo $admin; ?> <?php echo $are_disabled; ?>>
															
								</div>
							  </div>
							  								 
							  
							  
							  <div class="form-actions">
							  
							  
						    <?php if($mode!='view') { ?>
						    <input type="submit" class="btn btn-primary" name="smt_save" id="smt_save" value="<?php echo lang('btn_save'); ?>" onclick="return validate_form('<?php echo $this->lang->lang(); ?>'); " />
							<a class='btn btn-warning' href="javascript: history.go(-1)"><?php echo lang('btn_cancel'); ?></a>
							<?php }?>
							  </div>
							</fieldset>
						  </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			

<?php $this->load->view('admin/includes/footer'); ?>
    