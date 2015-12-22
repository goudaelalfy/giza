<?php $this->load->view('admin/includes/header'); ?>

<script type='text/javascript'  src='<?php echo base_url();?>js/includes/functions.js' > </script>
<script type='text/javascript'  src='<?php echo base_url();?>js/admin/user_group/form.js' > </script>

<?php 

$id=0;
$name='';

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
		$id=				$user_group_row['id'];
		$name=				$user_group_row['name'];
		
		
	}
	else 
	{
		$id=				$user_group_row->id;
		$name=				$user_group_row->name;
		$last_modify_date=		$user_group_row->last_modify_date;
		
	}
	
}
?>


<SCRIPT type="text/javascript">
pic1 = new Image(16, 16); 
pic1.src = "<?php echo base_url(); ?>images/icons/loader.gif";

$(document).ready(function(){

$("#name").change(function() { 

var name = $("#name").val().replace(/^\s+|\s+$/g, '');

if(name.length >= 4)
{
$("#dv_name_false").show();
$("#dv_name_false").html('<img src="<?php echo base_url();?>images/icons/loader.gif" align="absmiddle">&nbsp;Checking availability...');
$("#dv_name_true").html('');
    $.ajax({  
    type: "POST",  
    url: "<?php echo base_url().$this->lang->lang().'/'.ADMIN; ?>/user_group/check_name_availability/<?php echo $id; ?>",  
    data: "name="+ name,  
    success: function(msg){  
   
   $("#dv_name_false").ajaxComplete(function(event, request, settings){ 

	if(msg == 'OK')
	{ 
        $("#name").removeClass('object_error'); // if necessary
		$("#name").addClass("object_ok");
		$(this).html('');
		$("#dv_name_true").html('&nbsp;<img src="<?php echo base_url();?>images/icons/tick.gif" align="absmiddle">');
	}  
	else  
	{  
		$("#name").removeClass('object_ok'); // if necessary
		$("#name").addClass("object_error");
		$(this).html(msg+"<input type='hidden'  name ='name_not_availabe' id='name_not_availabe' >");
		$("#dv_name_true").html('');
	}  
   
   });

 } 
   
  }); 

}
else
	{
	$("#dv_name_false").show();
	$("#dv_name_false").html('<font color="red"><?php echo lang('name_length_error'); ?></font>');
	$("#dv_name_true").html('');
	$("#name").removeClass('object_ok'); // if necessary
	$("#name").addClass("object_error");
	}

});

});
</SCRIPT>

<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> <?php echo lang('users_groups')?></h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" id='frm_user_group_row' name='frm_user_group_row'  method='post' >

						<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
						<input type="hidden" name="last_modify_date" id="last_modify_date" value="<?php echo $last_modify_date; ?>"> 

							<fieldset>
							
							<div class="form-actions">
							<a class='btn btn-success' href='<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/user_group/table'>
										<i class='icon-zoom-in icon-white'></i>  
										<?php  echo $this->lang->line('lnk_view_all'); ?>                                           
							</a>
								
							<?php if($mode=='view') { 
	$readonly="readonly='readonly'";
	
		?>
	
	<a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/user_group/form/0/add">
	<i class='icon-edit icon-white'></i>
	<?php  echo $this->lang->line('btn_add'); ?>
	</a>
	
    <a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/user_group/form/<?php echo $id;?>/edit">
    <i class='icon-edit icon-white'></i>  
	<?php  echo $this->lang->line('btn_edit'); ?>
	</a>
		
	<a class='btn btn-danger' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/user_group/delete/<?php echo $id;?>" onclick="return delete_confirm('<?php echo $this->lang->lang(); ?>')">
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
								<label class="control-label" for="focusedInput"><?php echo lang('name'); ?></label>
								<div class="controls">
								  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="name" id="name" value="<?php echo $name; ?>">
									
									<div id="dv_name_true"></div>
									<div class="dv_error"  id="dv_name_false" style="display:none;"><?php echo lang('name_false'); ?></div>
								
								</div>
							  </div>
							  
							  <div class="control-group">
								  <?php 

echo "<table class='table_details' cellspacing='1'>";
		
		$index=0;
		$color_row='';
		$height_row='';
		
		foreach ($screens as $record)
		{
			
				$current_row_id=0;
				
				if($index==0)
				{
					/*
					echo "<tr>";

							echo"<th>". lang('screens')."</th>";
							echo"<th>". lang('prev_view')."</th>";
							echo"<th>". lang('prev_add')."</th>";
							echo"<th>". lang('prev_edit')."</th>";
							echo"<th>". lang('prev_delete')."</th>";
							echo"<th>". lang('prev_all')."</th>";
							
					echo "</tr>";
					*/
				}
				
				
				
				$parent_screen_id=$record->id;
				$screen_code=$record->code;
				
				if($this->lang->lang()=='en')
				{
					$screen_name=$record->name;
				}
				else if($this->lang->lang()=='ar')
				{
					$screen_name=$record->name_ar;
				}
					echo "<tr>";
					echo "<td colspan='6' align='center'> $screen_name </td>";	
					echo "</tr>";
					
					echo "<tr>";

							echo"<th>". lang('screens')."</th>";
							echo"<th>". lang('prev_view')."</th>";
							echo"<th>". lang('prev_add')."</th>";
							echo"<th>". lang('prev_edit')."</th>";
							echo"<th>". lang('prev_delete')."</th>";
							echo"<th>". lang('prev_all')."</th>";
							
					echo "</tr>";
					
				if($mode=='add' || ($mode=='return' && $id==0) )
				{
		
					$data['screens_inner'] = $this->Screen_model->get_all_screen($parent_screen_id);
					$screens_inner=$data['screens_inner'];
					
					//$this->session->set_userdata('group_screens', $screens_inner);
					
					foreach ($screens_inner as $record_inner)
					{
						
						$screen_id=$record_inner->id;
						
						if($this->lang->lang()=='en')
						{
							$screen_name=$record_inner->name;
						}
						else if($this->lang->lang()=='ar')
						{
							$screen_name=$record_inner->name_ar;
						}
						
						
							echo "<tr>";
						
						
							//$color_row='#C2D1E0';
							$color_row='#FFFFFF';
							$height_row='25px';
							
		
							
							
							echo "<td align='center' style='font-size: 11px; height:$height_row; background-color:$color_row;'> $screen_name </td>";	
							echo "<td align='center' style='font-size: 11px; height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_id."_view'   name='chk_".$screen_id."_view'  	onchange=\"uncheckByView_for_screen('".$screen_id."')\" /></td>";
							echo "<td align='center' style='font-size: 11px; height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_id."_add'    name='chk_".$screen_id."_add'   	onchange=\"checkView_for_screen('chk_".$screen_id."_add','".$screen_id."')\" /></td>";
							echo "<td align='center' style='font-size: 11px; height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_id."_edit'   name='chk_".$screen_id."_edit'  	onchange=\"checkView_for_screen('chk_".$screen_id."_edit','".$screen_id."')\" /></td>";
							echo "<td align='center' style='font-size: 11px; height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_id."_delete' name='chk_".$screen_id."_delete' 	onchange=\"checkView_for_screen('chk_".$screen_id."_delete','".$screen_id."')\" /></td>";
							//echo "<td align='center' style='font-size: 11px; height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_id."_cancel' name='chk_".$screen_id."_cancel' 	onchange=\"checkView_for_screen('chk_".$screen_id."_cancel','".$screen_id."')\" /></td>";
							echo "<td align='center' style='font-size: 11px; height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_id."_all' name='chk_".$screen_id."_all'  		onchange=\"checkUncheck_for_screen('".$screen_id."')\"/></td>";
							
							
							
							echo "</tr>";
						}
					
					$index=$index+1;
				}
				
				else 
				{
				/**
					 * 
					 * Updated By Gouda.
					 */
					$data['screens_inner'] = $this->Screen_model->get_all_screen($parent_screen_id);
					$screens_inner_all=$data['screens_inner'];
					
					$data['screens_inner'] = $this->User_group_model->get_screens_by_user_group_id($parent_screen_id,$id);				
					$screens_inner=$data['screens_inner'];
					
					foreach ($screens_inner_all as $record_inner_all)
					{
					
						$view_checked="";
						$add_checked="";
						$edit_checked="";
						$delete_checked="";
						$cancel_checked="";

						$screen_id=$record_inner_all->id;
						if($this->lang->lang()=='en')
						{
							$screen_name=$record_inner_all->name;
						}
						else if($this->lang->lang()=='ar')
						{
							$screen_name=$record_inner_all->name_ar;
						}
					
					foreach ($screens_inner as $record_inner)
					{
						
						
						
						if($record_inner->id==$screen_id) {
						
						
						
						/*
						$view_checked="";
						$add_checked="";
						$edit_checked="";
						$delete_checked="";
						$cancel_checked="";
						*/
						
						if($record_inner->view==1)
						{
							$view_checked="checked='checked'";
						}
						if($record_inner->add==1)
						{
							$add_checked="checked='checked'";
						}
						if($record_inner->edit==1)
						{
							$edit_checked="checked='checked'";
						}
						if($record_inner->delete==1)
						{
							$delete_checked="checked='checked'";
						}
						if($record_inner->cancel==1)
						{
							$cancel_checked="checked='checked'";
						}
						}
					}
						
							echo "<tr>";
						
						
							//$color_row='#C2D1E0';
							$color_row='#FFFFFF';
							$height_row='25px';
							
		
							
							
							echo "<td align='center' style='font-size: 11px;  height:$height_row; background-color:$color_row;'> $screen_name </td>";	
							echo "<td align='center' style='font-size: 11px;  height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_id."_view'   name='chk_".$screen_id."_view'   ".$view_checked."     ".$are_disabled."		onchange=\"uncheckByView_for_screen('".$screen_id."')\" /></td>";
							echo "<td align='center' style='font-size: 11px;  height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_id."_add'    name='chk_".$screen_id."_add'    ".$add_checked."      ".$are_disabled."  	onchange=\"checkView_for_screen('chk_".$screen_id."_add','".$screen_id."')\" /></td>";
							echo "<td align='center' style='font-size: 11px;  height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_id."_edit'   name='chk_".$screen_id."_edit'   ".$edit_checked."     ".$are_disabled."		onchange=\"checkView_for_screen('chk_".$screen_id."_edit','".$screen_id."')\" /></td>";
							echo "<td align='center' style='font-size: 11px;  height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_id."_delete' name='chk_".$screen_id."_delete' ".$delete_checked."   ".$are_disabled."		onchange=\"checkView_for_screen('chk_".$screen_id."_delete','".$screen_id."')\" /></td>";
							//echo "<td align='center' style='font-size: 11px;  height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_id."_cancel' name='chk_".$screen_id."_cancel' ".$cancel_checked."   ".$are_disabled."		onchange=\"checkView_for_screen('chk_".$screen_id."_cancel','".$screen_id."')\" /></td>";
							echo "<td align='center' style='font-size: 11px;  height:$height_row; background-color:$color_row;'><input type='checkbox' id='chk_".$screen_id."_all' name='chk_".$screen_id."_all'  	   						 ".$are_disabled."  	onchange=\"checkUncheck_for_screen('".$screen_id."')\" /></td>";
							
							
							
							
							echo "</tr>";
						
					
					$index=$index+1;
					}
					
				}
				
				
				
				
		}
		
		echo"</table>";
			
?>
  
  
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