<?php $this->load->view('admin/includes/header'); ?>

<script type='text/javascript'  src='<?php echo base_url();?>js/includes/functions.js' > </script>
<script type='text/javascript'  src='<?php echo base_url();?>js/contentsetting/form.js' > </script>

<?php 

$id=0;
$paging_no_of_pages=10;

$default_page_banners='';  
$default_page_banner_selected='';  
$default_industry_banners='';  
$default_industry_banner_selected='';  
$default_solution_banners='';  
$default_solution_banner_selected='';


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
		
		$default_page_banners=			$current_row['default_page_banners']; 
		$default_page_banner_selected=	$current_row['default_page_banner_selected']; 
		$default_industry_banners=		$current_row['default_industry_banners']; 
		$default_industry_banner_selected=$current_row['default_industry_banner_selected']; 
		$default_solution_banners=		$current_row['default_solution_banners']; 
		$default_solution_banner_selected=$current_row['default_solution_banner_selected'];
		
		
	}
	else 
	{
		$id=				$current_row->id;
		$default_page_banners=			$current_row->default_page_banners; 
		$default_page_banner_selected=	$current_row->default_page_banner_selected; 
		$default_industry_banners=		$current_row->default_industry_banners; 
		$default_industry_banner_selected=$current_row->default_industry_banner_selected; 
		$default_solution_banners=		$current_row->default_solution_banners; 
		$default_solution_banner_selected=$current_row->default_solution_banner_selected;
		
		$last_modify_date=	$current_row->last_modify_date;
		
	}
	
	if($default_page_banners!='') {
	$default_page_banners_arr = explode(",,,", $default_page_banners);
	}
	if($default_industry_banners!='') {
	$default_industry_banners_arr = explode(",,,", $default_industry_banners);
	}
	if($default_solution_banners!='') {
	$default_solution_banners_arr = explode(",,,", $default_solution_banners);
	}


}
?>


<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> <?php echo lang('contentsettings')?></h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" id='frm_contentsetting_row' name='frm_contentsetting_row'  method='post' >

						<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
						<input type="hidden" name="last_modify_date" id="last_modify_date" value="<?php echo $last_modify_date; ?>"> 

							<fieldset>
							
							<div class="form-actions">
							
							
							<?php if($mode=='view') { 
	$readonly="readonly='readonly'";
	
		?>
	
    <a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/contentsetting/form/<?php echo $id;?>/edit">
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
<label class="control-label" for="focusedInput"><?php echo lang('default_page_banner'); ?></label>
<div class="controls">
<div style="width:390px" >
<input type="text" id="file_default_page_banner" class="input-xlarge focused" readonly="readonly"> 
<div class="file_input_div">
<input type="button" value="<?php echo lang('btn_file_input'); ?>" class="btn btn-info" />
<input type="file" class="file_input_hidden" id="default_page_banner" name="default_page_banner" onchange="javascript: document.getElementById('file_default_page_banner').value = this.value" />
									
</div>
<br/><br/>
<input  type="checkbox" id="are_current" name="are_current"> <?php echo lang('current_header'); ?> 
</div>
</div>
</div>

<?php if($id!=0 && isset($banner_image_thumbs_arr)) {?>
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('headers'); ?></label>
<div class="controls" style="border: 1px solid silver; width:280px; min-height: 50px;">
<?php 
foreach($banner_image_thumbs_arr as $banner_image_thumb) {
	$checked='';
	$chk_delete='';
	if($banner_image_thumb==$banner_image_thumb_selected) {
		$checked='checked';
	}
	$chk_delete="<input type='checkbox' id='chk_headers_delete[]' name='chk_headers_delete[]' value='$banner_image_thumb' >&nbsp;".lang('btn_delete');
	
	if($banner_image_thumb!=='') {
	   echo "<div><img src='".base_url().$banner_image_thumb."' title='$banner_image_thumb' width='100px' height='50px'/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='radio' name='headers' value='$banner_image_thumb' $checked> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $chk_delete</div>";
	}  	
}
?>
</div>
</div>
<?php }?>







<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('default_industry_banner'); ?></label>
<div class="controls">
<div style="width:390px" >
<input type="text" id="file_default_industry_banner" class="input-xlarge focused" readonly="readonly"> 
<div class="file_input_div">
<input type="button" value="<?php echo lang('btn_file_input'); ?>" class="btn btn-info" />
<input type="file" class="file_input_hidden" id="default_industry_banner" name="default_industry_banner" onchange="javascript: document.getElementById('file_default_industry_banner').value = this.value" />
									
</div>
<br/><br/>
<input  type="checkbox" id="are_current" name="are_current"> <?php echo lang('current_header'); ?> 
</div>
</div>
</div>

<?php if($id!=0 && isset($banner_image_thumbs_arr)) {?>
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('headers'); ?></label>
<div class="controls" style="border: 1px solid silver; width:280px; min-height: 50px;">
<?php 
foreach($banner_image_thumbs_arr as $banner_image_thumb) {
	$checked='';
	$chk_delete='';
	if($banner_image_thumb==$banner_image_thumb_selected) {
		$checked='checked';
	}
	$chk_delete="<input type='checkbox' id='chk_headers_delete[]' name='chk_headers_delete[]' value='$banner_image_thumb' >&nbsp;".lang('btn_delete');
	
	if($banner_image_thumb!=='') {
	   echo "<div><img src='".base_url().$banner_image_thumb."' title='$banner_image_thumb' width='100px' height='50px'/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='radio' name='headers' value='$banner_image_thumb' $checked> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $chk_delete</div>";
	}  	
}
?>
</div>
</div>
<?php }?>








<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('default_solution_banner'); ?></label>
<div class="controls">
<div style="width:390px" >
<input type="text" id="file_default_solution_banner" class="input-xlarge focused" readonly="readonly"> 
<div class="file_input_div">
<input type="button" value="<?php echo lang('btn_file_input'); ?>" class="btn btn-info" />
<input type="file" class="file_input_hidden" id="default_solution_banner" name="default_solution_banner" onchange="javascript: document.getElementById('file_default_solution_banner').value = this.value" />
									
</div>
<br/><br/>
<input  type="checkbox" id="are_current" name="are_current"> <?php echo lang('current_header'); ?> 
</div>
</div>
</div>

<?php if($id!=0 && isset($banner_image_thumbs_arr)) {?>
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('headers'); ?></label>
<div class="controls" style="border: 1px solid silver; width:280px; min-height: 50px;">
<?php 
foreach($banner_image_thumbs_arr as $banner_image_thumb) {
	$checked='';
	$chk_delete='';
	if($banner_image_thumb==$banner_image_thumb_selected) {
		$checked='checked';
	}
	$chk_delete="<input type='checkbox' id='chk_headers_delete[]' name='chk_headers_delete[]' value='$banner_image_thumb' >&nbsp;".lang('btn_delete');
	
	if($banner_image_thumb!=='') {
	   echo "<div><img src='".base_url().$banner_image_thumb."' title='$banner_image_thumb' width='100px' height='50px'/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='radio' name='headers' value='$banner_image_thumb' $checked> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $chk_delete</div>";
	}  	
}
?>
</div>
</div>
<?php }?>





							  





							  

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