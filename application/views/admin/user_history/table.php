<?php $this->load->view('admin/includes/header'); ?>
<form id="frm_display_data" name="frm_display_data" action="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/user_history/submit_display" method="post">



			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user_history"></i> <?php echo lang('user_histories')?> </h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
<?php 
$functions = new Functions();
$link_to_screen=base_url().$this->lang->lang().'/'.ADMIN.'/user_history';
$functions->display_data_table($user_histories,$link_to_screen,$this); 
?>
	
	<div class="pagination pagination-centered">
	<ul>
	<?php 
            	$pages=ceil($rows_count/$paging_no_of_pages);
            	
            	// ------------- previous link---------
            	$previous_lnk=$page-1;
            	if($previous_lnk>0)
            	{
            		echo "<li><a href='".base_url().$this->lang->lang()."/".ADMIN."/user_history/table/$previous_lnk'> ".lang('lnk_prev')."</a></li>";
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
            			echo "<a href='".base_url().$this->lang->lang()."/".ADMIN."/user_history/table/$page_no' $class_style>$page_no</a>";
            		}
            	}
            	
            	// ------------- next link---------
            	$next_lnk=$page+1;
            	if($next_lnk<=$pages)
            	{
            		echo "<a href='".base_url().$this->lang->lang()."/".ADMIN."/user_history/table/$next_lnk' >".lang('lnk_next')." </a>";
            	}
            	?>
	
	
						  
							
						  </ul>
						</div>				
					
						            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

     
</form>



<?php $this->load->view('admin/includes/footer'); ?>
