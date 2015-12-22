<?php $this->load->view('admin/includes/header'); ?>
<?php 
if(!isset($table)) {
	$table='hr_city_preferred_to_work';
}
?>
<script type="text/javascript">
 
$(document).ready(function(){

    $("#hr_main_table").change(function () {
    $("#dv_hr_main_table").html('<img src="<?php echo base_url();?>images/icons/loader.gif" align="absmiddle">&nbsp;Checking availability...');
         
		$.ajax({  
    	type: "POST",  
    	url: "<?php echo base_url().$this->lang->lang(); ?>/dropdown_ajax/get_hr_table_data/"+this.value,    
    	success: function(msg){  
   		
   		$("#dv_hr_main_table").ajaxComplete(function(event, request, settings){ 
		$(this).html(msg);
		});

 		} 
   
  		});

     });
 
     
  });
</script>


<form  class="form-horizontal" id="frm_display_data" name="frm_display_data" action="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/hrmaindata/delete_all" method="post">

<div class="form-actions">

<?php 
$this_object= new Hrmaindata();
if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_delete)) {
?>
<a class='btn btn-danger'  href="javascript: submitform()" class="bt_red" onclick="return delete_all_confirm('<?php echo $this->lang->lang(); ?>');">
<i class='icon-trash icon-white'></i> 
<?php  echo $this->lang->line('btn_delete_all'); ?>
</a>                          
<?php }
if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_add)) {

?>
<a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/hrmaindata/form/0/add/<?php echo $table; ?>">
<i class='icon-edit icon-white'></i>
<?php  echo $this->lang->line('btn_add'); ?>
</a>
<?php 
}
?>
</div>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> <?php echo lang('hr_main_data')?> </h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
<?php 

/**
 * Dropdowns object.
 * 
 * Intialize object from Dropdowns class which contains methods fill all dropdowns of website.
 * @var object.
 */

$dropdowns= new Dropdowns();

/**
 * Hrmaindata controller object.
 * 
 * Intialize object from Hrmaindata controller class.
 * @var object.
 */

$this_object= new Hrmaindata();

?>				


	
<br/>		
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('hr_tables'); ?></label>
<div class="controls">
<?php $dropdowns->drpdwn_hr_tables($this_object, $table ,'hr_main_table'); ?>
<div class="dv_error" id="dv_solution_id_false" style="display:none; "><?php echo lang('solution_false'); ?></div>

</div>
</div>
		
					
<div class="box-content" id="dv_hr_main_table">
<?php 
$this->load->view('admin/hr_main_data/functions');
$functions = new Functions();
$link_to_screen=base_url().$this->lang->lang()."/".ADMIN."/hrmaindata";
$functions->display_data_table($table, $rows,$link_to_screen,$this); 
?>
	
	<div class="pagination pagination-centered">
	<ul>
	<?php 
            	$pages=ceil($rows_count/$paging_no_of_pages);
            	
            	// ------------- previous link---------
            	$previous_lnk=$page-1;
            	if($previous_lnk>0)
            	{
            		echo "<li><a href='".base_url().$this->lang->lang()."/".ADMIN."/hrmaindata/table/$previous_lnk'> ".lang('lnk_prev')."</a></li>";
            	}
            	
            	for ($counter = 0; $counter < $pages; $counter += 1) 
            	{
            		$page_no=$counter+1;
            		if($page==$page_no)
            		$class_style="class='active'";
            		else
            		$class_style="";
            		
            		
            		$range_previous=$page-2; 
            		$range_next=$page+2;  
            		
            		if(($page_no<$page && $page_no > $range_previous) || ($page_no>$page && $page_no < $range_next) || $page==$page_no)
            		{
            			echo "<a href='".base_url().$this->lang->lang()."/".ADMIN."/hrmaindata/table/$page_no' $class_style>$page_no</a>";
            		}
            	}
            	
            	// ------------- next link---------
            	$next_lnk=$page+1;
            	if($next_lnk<=$pages)
            	{
            		echo "<a href='".base_url().$this->lang->lang()."/".ADMIN."/hrmaindata/table/$next_lnk' >".lang('lnk_next')." </a>";
            	}
            	?>
	
	
						  
							
						  </ul>
						</div>				
					
						            
					</div>
					
					
					
				</div><!--/span-->
			
			</div><!--/row-->

     
</form>



<?php $this->load->view('admin/includes/footer'); ?>
