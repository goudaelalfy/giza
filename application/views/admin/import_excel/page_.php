<?php $this->load->view('includes/header'); ?>
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





<form id='frm_import_page_row' name='frm_import_page_row'  method='post' enctype='multipart/form-data'>

<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="top_title"><?php echo lang('pages')?></td>
  </tr>
  <tr>
<td class="bot_tab">
	
	
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
  
  
  <?php if($mode=='read') { 
  	?>
<tr>
    <td><?php echo lang('name'); ?></td>
    <td><?php echo dropdown($sheetData,'name'); ?></td>
</tr>
<tr>
    <td><?php echo lang('emails'); ?></td>
    <td><?php echo dropdown($sheetData,'emails'); ?></td>
</tr>


<tr>
    <td><?php echo lang('telephones'); ?></td>
    <td><?php echo dropdown($sheetData,'telephones'); ?></td>
</tr>
 
  

    <?php }

    else
    {
    ?>
 <tr>
    <td width="200px"><?php echo lang('ecxel_file'); ?></td>
    <td><input type="file"  name="ecxel_file" id="ecxel_file"/></td>
  	<td>
    <div id="dv_ecxel_file_true"></div>
    </td>
  </tr>

<tr>
<td></td><td>
<div class="dv_error" id="dv_ecxel_file_false" style="display:none; "><?php echo lang('ecxel_file_false'); ?></div>
</td>
</tr>
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
    <span class="save_btn"><input type="submit" name="smt_read" id="smt_read" value="<?php echo lang('btn_read'); ?>" /></span>
    <?php }?>
    </td>
  <td></td>
  </tr>
 
  
</table>


</td>
  </tr>
  
</table>

</form>


<?php $this->load->view('includes/footer'); ?>