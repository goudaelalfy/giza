<?php $this->load->view('admin/includes/header'); ?>

<script type='text/javascript'  src='<?php echo base_url();?>js/includes/functions.js' > </script>
<script type='text/javascript'  src='<?php echo base_url();?>js/office_setting/form.js' > </script>

<?php 

$id=0;
$phone_icon ='';
$mobile_icon ='';
$fax_icon ='';
$email_icon ='';


$last_modify_date='';

$are_disabled="";
$readonly="";

if($mode!='add')
{
	if($mode=='view')
	{
		$are_disabled="disabled='disabled'";
	}
	
	if($mode=='return')
	{
		$id=				$current_row['id'];		
		
	}
	else 
	{
		$id=				$current_row->id;
		
		$phone_icon =$current_row->phone_icon;
		$mobile_icon =$current_row->mobile_icon;
		$fax_icon =$current_row->fax_icon;
		$email_icon =$current_row->email_icon;
		
		
		$last_modify_date=	$current_row->last_modify_date;
		
	}
	
}
?>


<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> <?php echo lang('offices_settings')?></h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" id='frm_officesetting_row' name='frm_officesetting_row'  method='post' enctype='multipart/form-data'>

						<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
						<input type="hidden" name="last_modify_date" id="last_modify_date" value="<?php echo $last_modify_date; ?>"> 

							<fieldset>
							
							<div class="form-actions">
							
							
							<?php if($mode=='view') { 
	$readonly="readonly='readonly'";
	
		?>
	
    <a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/officesetting/form/<?php echo $id;?>/edit">
    <i class='icon-edit icon-white'></i>  
	<?php  echo $this->lang->line('btn_edit'); ?>
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
<label class="control-label" for="focusedInput"><?php echo lang('phone_icon'); ?></label>
<div class="controls">
<div style="width:390px" >
<input type="text" id="phone_icon_name" class="input-xlarge focused" readonly="readonly"> 
<div class="file_input_div">
<input type="button" value="<?php echo lang('btn_file_input'); ?>" class="btn btn-info" />
<input type="file" class="file_input_hidden" id="phone_icon" name="phone_icon" onchange="javascript: document.getElementById('phone_icon_name').value = this.value" />								
</div>
<br/>
<?php if($phone_icon!='') {
	$phone_icon_path=base_url().$phone_icon;
	echo "<img src='$phone_icon_path' title='$phone_icon_path' width='20px' height='20px'/>";
}?>
<br/>
</div>
</div>
</div>


<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('mobile_icon'); ?></label>
<div class="controls">
<div style="width:390px" >
<input type="text" id="mobile_icon_name" class="input-xlarge focused" readonly="readonly"> 
<div class="file_input_div">
<input type="button" value="<?php echo lang('btn_file_input'); ?>" class="btn btn-info" />
<input type="file" class="file_input_hidden" id="mobile_icon" name="mobile_icon" onchange="javascript: document.getElementById('mobile_icon_name').value = this.value" />								
</div>
<br/>
<?php if($mobile_icon!='') {
	$mobile_icon_path=base_url().$mobile_icon;
	echo "<img src='$mobile_icon_path' title='$mobile_icon_path' width='20px' height='20px'/>";
}?>
<br/>
</div>
</div>
</div>




<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('fax_icon'); ?></label>
<div class="controls">
<div style="width:390px" >
<input type="text" id="fax_icon_name" class="input-xlarge focused" readonly="readonly"> 
<div class="file_input_div">
<input type="button" value="<?php echo lang('btn_file_input'); ?>" class="btn btn-info" />
<input type="file" class="file_input_hidden" id="fax_icon" name="fax_icon" onchange="javascript: document.getElementById('fax_icon_name').value = this.value" />								
</div>
<br/>
<?php if($fax_icon!='') {
	$fax_icon_path=base_url().$fax_icon;
	echo "<img src='$fax_icon_path' title='$fax_icon_path' width='20px' height='20px'/>";
}?>
<br/>
</div>
</div>
</div>



<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('email_icon'); ?></label>
<div class="controls">
<div style="width:390px" >
<input type="text" id="email_icon_name" class="input-xlarge focused" readonly="readonly"> 
<div class="file_input_div">
<input type="button" value="<?php echo lang('btn_file_input'); ?>" class="btn btn-info" />
<input type="file" class="file_input_hidden" id="email_icon" name="email_icon" onchange="javascript: document.getElementById('email_icon_name').value = this.value" />								
</div>
<br/>
<?php if($email_icon!='') {
	$email_icon_path=base_url().$email_icon;
	echo "<img src='$email_icon_path' title='$email_icon_path' width='20px' height='20px'/>";
}?>
<br/>
</div>
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
			
			</div>




<?php $this->load->view('admin/includes/footer'); ?>