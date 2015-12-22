<?php $this->load->view('admin/includes/header'); ?>

<script type="text/javascript">
$(document).ready(function(){
	
	$(".hrf_unactive_class").live("click", function()
	{	
		var email_template_id = $(this).attr("id");
		$("#dv_active_"+email_template_id).html('<img src="<?php echo base_url();?>images/icons/loader.gif" align="absmiddle">');
						
		$.ajax({  
		type: "POST",  
		url: "<?php echo base_url().$this->lang->lang().'/'.ADMIN; ?>/emailTemplate/active/1",  
		data: "email_template_id="+ email_template_id, 
		success: function(msg){  
		   
			$("#dv_active_"+email_template_id).ajaxComplete(function(event, request, settings)
			{ 
				$("#dv_active_"+email_template_id).html(msg);
		   	});
		 }  
		}); 
	});



	$(".hrf_active_class").live("click", function()
			{	
				var email_template_id = $(this).attr("id");
				$("#dv_active_"+email_template_id).html('<img src="<?php echo base_url();?>images/icons/loader.gif" align="absmiddle">');
								
				$.ajax({  
				type: "POST",  
				url: "<?php echo base_url().$this->lang->lang().'/'.ADMIN; ?>/emailTemplate/active/0",  
				data: "email_template_id="+ email_template_id, 
				success: function(msg){  
				   
					$("#dv_active_"+email_template_id).ajaxComplete(function(event, request, settings)
					{ 
						$("#dv_active_"+email_template_id).html(msg);
				   	});
				 }  
				}); 
			});

	

	
}); 
</script>



<form id="frm_display_data" name="frm_display_data" action="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/emailTemplate/delete_all" method="post">



			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> <?php echo lang('email_templates')?> </h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
<?php 
$this->load->view('admin/email_template/functions');
$functions = new Functions();
$link_to_screen=base_url().$this->lang->lang()."/".ADMIN."/emailTemplate";
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
            		echo "<li><a href='".base_url().$this->lang->lang()."/".ADMIN."/emailTemplate/table/$previous_lnk'> ".lang('lnk_prev')."</a></li>";
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
            			echo "<a href='".base_url().$this->lang->lang()."/".ADMIN."/emailTemplate/table/$page_no' $class_style>$page_no</a>";
            		}
            	}
            	
            	// ------------- next link---------
            	$next_lnk=$page+1;
            	if($next_lnk<=$pages)
            	{
            		echo "<a href='".base_url().$this->lang->lang()."/".ADMIN."/emailTemplate/table/$next_lnk' >".lang('lnk_next')." </a>";
            	}
            	?>
	
	
						  
							
						  </ul>
						</div>				
					
						            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
</form>

       
<?php $this->load->view('admin/includes/footer'); ?>