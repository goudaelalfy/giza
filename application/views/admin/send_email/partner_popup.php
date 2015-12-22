<?php $this->load->view('admin/includes/header_popup'); ?>

<script type="text/javascript">
function checkUncheckPartners() 
{	
	 	{
	    	for (var i = 0; i < document.frm_popup.elements.length; i++ ) 
		    {
		    	var check_id=document.frm_popup.elements[i].id;
		    	check_id=check_id.substring(0, 3);

		        if (document.frm_popup.elements[i].type == 'checkbox' && check_id=='par') 
			    {		        		    
		        	document.frm_popup.elements[i].checked = document.frm_popup.elements['partners'].checked; 
		        }

	    	}
	 	}
}
</script>
<script type="text/javascript">
function selectPartner(input, email) 
{
	window.opener.document.getElementById(input).value=email;	
	javascript:this.close();
}
</script>
<script type="text/javascript">
function selectPartners(input) 
{

		var to='';
		var counter=0;
		
		for (var i = 0; i < document.frm_popup.elements.length; i++ ) 
	    {
			var checkbox_id=document.frm_popup.elements[i].id;
	        if (document.frm_popup.elements[i].type == 'checkbox' && checkbox_id!='partners' ) 
		    {		   
			        		    
	        	if(document.frm_popup.elements[i].checked)
	        	{
		        	if(counter==0)
		        	{
		        		to=to+document.frm_popup.elements[i].name;
		        	}
		        	else
		        	{
		        		to=to+','+document.frm_popup.elements[i].name;
			        	
			        }
		        	counter=counter+1;
		        } 
	        }

    	}
	
		window.opener.document.getElementById(input).value=to;
		
	javascript:this.close();
}
</script>


<form id="frm_popup" name="frm_popup"  method="post">



			<div class="row-fluid sortable">		
				<div class="box span12">
					
					<div class="box-content">
<?php 
echo "<table class='table table-striped table-bordered bootstrap-datatable datatable'>";
	$index=0;		
	foreach ($rows as $row) {
		if($index==0){
			echo "<thead><tr>";
			echo "<th ><input type='checkbox' name='partners' id='partners' value='0' onclick='checkUncheckPartners()' /></th>";
			echo"<th >".lang('partners')." </th>";					
			echo "</tr></thead>";	
			echo "<tbody>";				
		}
				
		$id= $row->id;
		$partner_email=$row->contact_email;
		
		$partner_name='';
		if($this->lang->lang()=='ar') {
		$partner_name=$row->name;
		} else {
		$partner_name=$row->name;
		}
		
			$checked='';
			/*
			foreach($partners_rows as $partners_row)
			{
				$partners_row_id=$partners_row->partner_id;
				if($partners_row_id==$id)
				{
					$checked="checked='checked'";
				}
			}
			*/
		
		echo "<tr>";
		echo"<td><input type='checkbox' name='$partner_email' id='partner[]' value='$id' $checked onclick='document.frm_popup.elements[\"partners\"].checked = false;' /></td>";
			
		echo"<td> <a  href=\"javascript:selectPartner('$input','$partner_email')\" >$partner_name</a>  </td>";	
		echo "</tr>";
		$index=$index+1;
	}
echo"</tbody></table>";
?>
	
	
	<div class="pagination pagination-centered">
	<ul>
	<?php 
            	$pages=ceil($rows_count/$paging_no_of_pages);
            	
            	// ------------- previous link---------
            	$previous_lnk=$page-1;
            	if($previous_lnk>0)
            	{
            		echo "<li><a href='".base_url().$this->lang->lang()."/".ADMIN."/sendemail/popuppartner/$input/$previous_lnk'> ".lang('lnk_prev')."</a></li>";
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
            			echo "<a href='".base_url().$this->lang->lang()."/".ADMIN."/sendemail/popuppartner/$input/$page_no' $class_style>$page_no</a>";
            		}
            	}
            	
            	// ------------- next link---------
            	$next_lnk=$page+1;
            	if($next_lnk<=$pages)
            	{
            		echo "<a href='".base_url().$this->lang->lang()."/".ADMIN."/sendemail/popuppartner/$input/$next_lnk' >".lang('lnk_next')." </a>";
            	}
            	?>
	
	
						  
							
						  </ul>
						</div>				
				
	
	
	
<div class="form-actions">
<a class='btn btn-info' href="javascript:selectPartners('<?php echo $input; ?>')">
<i class='icon-zoom-in icon-white'></i>  
<?php  echo $this->lang->line('ok'); ?>                                           
</a>
		

<a class='btn btn-warning' href="javascript:this.close();">
<i class='icon-edit icon-white'></i>
<?php  echo $this->lang->line('btn_cancel'); ?>
</a>			            

					</div>
				</div><!--/span-->
			
			</div><!--/row-->

     
</form>



<?php $this->load->view('admin/includes/footer_popup'); ?>
