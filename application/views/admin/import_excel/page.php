<?php $this->load->view('admin/includes/header'); ?>

<?php 

function dropdown($sheetData,$name)
{
	$row_counter=0;
  	foreach($sheetData as $row_arr)
	{
		if($row_counter==0)
		{
		$drpdwn="<select name='$name' id='$name' >";
     	$drpdwn=$drpdwn."<option value='0'></option>";
      	
     	foreach ($row_arr as $key=>$value) 
      	{ 
      		
      	  $drpdwn=$drpdwn."<option value='$key' >$value</option>";
      	} 
     	$drpdwn=$drpdwn."</select>";
     	
		
		}
		
		$row_counter=$row_counter+1;
							
	}
	
	return $drpdwn;
}


$id=0;

$are_disabled="";

if($mode!='add')
{
	if($mode=='view')
	{
		$are_disabled="disabled='disabled'";
	}
	
	if($mode=='return')
	{
		
	}
	else 
	{
		
		
	}
	
}
?>





<div class="row-fluid sortable">
<div class="box span12">
<div class="box-header well" data-original-title>
<h2><i class="icon-edit"></i> <?php echo lang('pages')?></h2>
<div class="box-icon">
	<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
	<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
	<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
</div>

</div>
<div class="box-content">
<form class="form-horizontal" id='frm_import_page_row' name='frm_import_page_row'  method='post' enctype='multipart/form-data'>


<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">

<fieldset>

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
  
  
  <?php if($mode=='read') { 
  	?>

 
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('alias'); ?></label>
<div class="controls">
	<?php echo dropdown($sheetData,'alias'); ?>
</div>
</div>	
  	

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('title'); ?></label>
<div class="controls">
	<?php echo dropdown($sheetData,'title'); ?>
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('title_ar'); ?></label>
<div class="controls">
	<?php echo dropdown($sheetData,'title_ar'); ?>
</div>
</div>


<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('seo_words'); ?></label>
<div class="controls">
	<?php echo dropdown($sheetData,'seo_words'); ?>
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('seo_words_ar'); ?></label>
<div class="controls">
	<?php echo dropdown($sheetData,'seo_words_ar'); ?>
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('brief'); ?></label>
<div class="controls">
	<?php echo dropdown($sheetData,'brief'); ?>
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('brief_ar'); ?></label>
<div class="controls">
	<?php echo dropdown($sheetData,'brief_ar'); ?>
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('body'); ?></label>
<div class="controls">
	<?php echo dropdown($sheetData,'body'); ?>
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('body_ar'); ?></label>
<div class="controls">
	<?php echo dropdown($sheetData,'body_ar'); ?>
</div>
</div>


    <?php }

    else
    {
    ?>
    
   
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('ecxel_file'); ?></label>
<div class="controls">
<div style="width:390px" >
<input type="text" id="ecxel_file_name" class="input-xlarge focused" readonly="readonly"> 
<div class="file_input_div">
<input type="button" value="<?php echo lang('btn_file_input'); ?>" class="btn btn-info" />
<input type="file" class="file_input_hidden" id="ecxel_file" name="ecxel_file" onchange="javascript: document.getElementById('ecxel_file_name').value = this.value" />								
<div id="dv_ecxel_file_true"></div>
<div class="dv_error" id="dv_ecxel_file_false" style="display:none; "><?php echo lang('ecxel_file_false'); ?></div>
</div>
</div>
</div>
</div>  
    

    
<?php }?>
  

  <tr>
    <td></td>
    <td height="30">
    <?php if($mode=='read') { ?>
    <span class="save_btn"><input type="submit" name="smt_import" id="smt_import" value="<?php echo lang('btn_import'); ?>" /></span>
    <?php }
    else if($mode=='import')
    {
    ?>
    
<span class="save_btn"><input type="submit" name="smt_read" id="smt_read" value="<?php echo lang('btn_read'); ?>" /></span>


    <?php 
    }
    else
    {
    ?>
   
  
<div class="form-actions">
<input type="submit" class="btn btn-primary" name="smt_read" id="smt_read" value="<?php echo lang('btn_read'); ?>" />
</div>

<?php }?>

</fieldset>
					 </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->


<?php $this->load->view('admin/includes/footer'); ?>