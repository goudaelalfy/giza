<?php $this->load->view('admin/includes/header_popup'); ?>

<script type="text/javascript">
function checkUncheckAlumnies() 
{	
	 	{
	    	for (var i = 0; i < document.frm_popup.elements.length; i++ ) 
		    {
		    	var check_id=document.frm_popup.elements[i].id;
		    	check_id=check_id.substring(0, 3);

		        if (document.frm_popup.elements[i].type == 'checkbox' && check_id=='alu') 
			    {		        		    
		        	document.frm_popup.elements[i].checked = document.frm_popup.elements['alumnies'].checked; 
		        }

	    	}
	 	}
}
</script>
<script type="text/javascript">
function selectAlumni(input, email) 
{
	window.opener.document.getElementById(input).value=email;	
	javascript:this.close();
}
</script>
<script type="text/javascript">
function selectAlumnies(input) 
{

		var to='';
		var counter=0;
		
		for (var i = 0; i < document.frm_popup.elements.length; i++ ) 
	    {
			var checkbox_id=document.frm_popup.elements[i].id;
	        if (document.frm_popup.elements[i].type == 'checkbox' && checkbox_id!='alumnies' ) 
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
			echo "<th ><input type='checkbox' name='alumnies' id='alumnies' value='0' onclick='checkUncheckAlumnies()' /></th>";
			echo"<th >".lang('alumnies')." </th>";					
			echo "</tr></thead>";	
			echo "<tbody>";				
		}
				
		$id= $row->id;
		$alumni_email=$row->home_email;
		
		$alumni_name='';
		if($this->lang->lang()=='ar') {
		$alumni_name=$row->firstname.' '.$row->lastname;
		} else {
		$alumni_name=$row->firstname.' '.$row->lastname;
		}
		
			$checked='';
			/*
			foreach($alumnies_rows as $alumnies_row)
			{
				$alumnies_row_id=$alumnies_row->alumni_id;
				if($alumnies_row_id==$id)
				{
					$checked="checked='checked'";
				}
			}
			*/
		
		echo "<tr>";
		echo"<td><input type='checkbox' name='$alumni_email' id='alumni[]' value='$id' $checked onclick='document.frm_popup.elements[\"alumnies\"].checked = false;' /></td>";
			
		echo"<td> <a  href=\"javascript:selectAlumni('$input','$alumni_email')\" >$alumni_name</a>  </td>";	
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
            		echo "<li><a href='".base_url().$this->lang->lang()."/".ADMIN."/sendemail/popupalumni/$input/$previous_lnk'> ".lang('lnk_prev')."</a></li>";
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
            			echo "<a href='".base_url().$this->lang->lang()."/".ADMIN."/sendemail/popupalumni/$input/$page_no' $class_style>$page_no</a>";
            		}
            	}
            	
            	// ------------- next link---------
            	$next_lnk=$page+1;
            	if($next_lnk<=$pages)
            	{
            		echo "<a href='".base_url().$this->lang->lang()."/".ADMIN."/sendemail/popupalumni/$input/$next_lnk' >".lang('lnk_next')." </a>";
            	}
            	?>
	
	
						  
							
						  </ul>
						</div>				
				
	
	
	
<div class="form-actions">
<a class='btn btn-info' href="javascript:selectAlumnies('<?php echo $input; ?>')">
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
