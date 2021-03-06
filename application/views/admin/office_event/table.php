<?php $this->load->view('admin/includes/header'); ?>
<form id="frm_display_data" name="frm_display_data" action="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/officeevent/delete_all" method="post">

<div class="form-actions">

<?php 
$this_object= new Officeevent();
if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_delete)) {
?>
<a class='btn btn-danger'  href="javascript: submitform()" class="bt_red" onclick="return delete_all_confirm('<?php echo $this->lang->lang(); ?>');">
<i class='icon-trash icon-white'></i> 
<?php  echo $this->lang->line('btn_delete_all'); ?>
</a>                          
<?php }
if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_add)) {

?>
<a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/officeevent/form/0/add">
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
						<h2><i class="icon-user"></i> <?php echo lang('offices_events')?> </h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
<?php 
$this->load->view('admin/office_event/functions');
$functions = new Functions();
$link_to_screen=base_url().$this->lang->lang()."/".ADMIN."/officeevent";
$functions->display_data_table($rows,$link_to_screen,$this); 
?>
	
	<div class="pagination pagination-centered">
	<ul>
	<?php 
            	$pages=ceil($rows_count/$paging_no_of_pages);
            	
            	// ------------- previous link---------
            	$previous_lnk=$page-1;
            	if($previous_lnk>0)
            	{
            		echo "<li><a href='".base_url().$this->lang->lang()."/".ADMIN."/officeevent/table/$previous_lnk'> ".lang('lnk_prev')."</a></li>";
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
            			echo "<a href='".base_url().$this->lang->lang()."/".ADMIN."/officeevent/table/$page_no' $class_style>$page_no</a>";
            		}
            	}
            	
            	// ------------- next link---------
            	$next_lnk=$page+1;
            	if($next_lnk<=$pages)
            	{
            		echo "<a href='".base_url().$this->lang->lang()."/".ADMIN."/officeevent/table/$next_lnk' >".lang('lnk_next')." </a>";
            	}
            	?>
	
	
						  
							
						  </ul>
						</div>				
					
						            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

     
</form>



<?php $this->load->view('admin/includes/footer'); ?>
