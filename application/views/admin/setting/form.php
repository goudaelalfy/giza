<?php $this->load->view('admin/includes/header'); ?>

<script type='text/javascript'  src='<?php echo base_url();?>js/includes/functions.js' > </script>
<script type='text/javascript'  src='<?php echo base_url();?>js/setting/form.js' > </script>

<?php 

$id=0;
$paging_no_of_pages=10;

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
		$id=				$setting_row['id'];
		$paging_no_of_pages=$setting_row['paging_no_of_pages'];
		
		
	}
	else 
	{
		$id=				$setting_row->id;
		$paging_no_of_pages=$setting_row->paging_no_of_pages;
		$last_modify_date=	$setting_row->last_modify_date;
		
	}
	
}
?>


<SCRIPT type="text/javascript">
pic1 = new Image(16, 16); 
pic1.src = "<?php echo base_url(); ?>images/icons/loader.gif";

$(document).ready(function(){


$("#paging_no_of_pages").change(function() { 

		var paging_no_of_pages = $("#paging_no_of_pages").val().replace(/^\s+|\s+$/g, '');
		if(paging_no_of_pages== "" )
		{
			$("#dv_paging_no_of_pages_false").show();
		}
		else
		{
			var regexObj = /^\d+$/;
			 if (regexObj.test(paging_no_of_pages)==false) 
			 {
				 $("#dv_paging_no_of_pages_false").show();
			 }
			 else if(paging_no_of_pages==0)
			 {
				 $("#dv_paging_no_of_pages_false").show();
			 }
			 else
			 {
				 $("#dv_paging_no_of_pages_false").hide();
			 }
			 
		}
	});

});
</SCRIPT>


<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> <?php echo lang('settings')?></h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" id='frm_setting_row' name='frm_setting_row'  method='post' >

						<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
						<input type="hidden" name="last_modify_date" id="last_modify_date" value="<?php echo $last_modify_date; ?>"> 

							<fieldset>
							
							<div class="form-actions">
							
							
							<?php if($mode=='view') { 
	$readonly="readonly='readonly'";
	
		?>
	
    <a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/setting/form/<?php echo $id;?>/edit">
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
								<label class="control-label" for="focusedInput"><?php echo lang('paging_no_of_pages'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="paging_no_of_pages" id="paging_no_of_pages" value="<?php echo $paging_no_of_pages; ?>">
									
									<div id="dv_paging_no_of_pages_true"></div>
									<div class="dv_error"  id="dv_paging_no_of_pages_false" style="display:none;"><?php echo lang('paging_no_of_pages_false'); ?></div>
								
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