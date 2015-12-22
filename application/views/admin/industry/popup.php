<?php $this->load->view('admin/includes/header_popup'); ?>
<script type="text/javascript">
function selectIndustry(industry_id, industry_name) 
{
	window.opener.document.getElementById('industry_ids').value=industry_id;
	window.opener.document.getElementById('industry_names').value=industry_name;
	javascript:this.close();
}
</script>

<script type="text/javascript">
function checkUncheckIndustries() 
{	
	 	{
	    	for (var i = 0; i < document.frm_popup.elements.length; i++ ) 
		    {
		    	var check_id=document.frm_popup.elements[i].id;
		    	check_id=check_id.substring(0, 3);

		        if (document.frm_popup.elements[i].type == 'checkbox' && check_id=='ind') 
			    {		        		    
		        	document.frm_popup.elements[i].checked = document.frm_popup.elements['industries'].checked; 
		        }

	    	}
	 	}
}
</script>
<script type="text/javascript">
function selectIndustries() 
{

		
		var industry_ids='';
		var industry_names='';
		var counter=0;
		
		for (var i = 0; i < document.frm_popup.elements.length; i++ ) 
	    {
			var checkbox_id=document.frm_popup.elements[i].id;
	        if (document.frm_popup.elements[i].type == 'checkbox' && checkbox_id!='industries' ) 
		    {		   
			        		    
	        	if(document.frm_popup.elements[i].checked)
	        	{
		        	if(counter==0)
		        	{
		        		industry_ids=industry_ids+document.frm_popup.elements[i].value;
		        		industry_names=industry_names+document.frm_popup.elements[i].name;
		        	}
		        	else
		        	{
		        		industry_ids=industry_ids+','+document.frm_popup.elements[i].value;
		        		industry_names=industry_names+','+document.frm_popup.elements[i].name;
			        	
			        }
		        	counter=counter+1;
		        } 
	        }

    	}
	
		window.opener.document.getElementById('industry_ids').value=industry_ids;
		window.opener.document.getElementById('industry_names').value=industry_names;
		
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
			echo "<th ><input type='checkbox' name='industries' id='industries' value='0' onclick='checkUncheckIndustries()' /></th>";
			echo"<th >".lang('industries')." </th>";					
			echo "</tr></thead>";	
			echo "<tbody>";				
		}
				
		$id= $row->id;
		
		$industry_name='';
		if($this->lang->lang()=='ar') {
		$industry_name=$row->title_ar;
		} else {
		$industry_name=$row->title;
		}
		
			$checked='';
			
			foreach($industries_rows as $industries_row)
			{
				$industries_row_id=$industries_row->industry_id;
				if($industries_row_id==$id)
				{
					$checked="checked='checked'";
				}
			}
		
		echo "<tr>";
		echo"<td><input type='checkbox' name='$industry_name' id='industry[]' value='$id' $checked onclick='document.frm_popup.elements[\"industries\"].checked = false;' /></td>";
			
		echo"<td> <a  href=\"javascript:selectIndustry('$id','$industry_name')\" >$industry_name</a>  </td>";	
		echo "</tr>";
		$index=$index+1;
	}
echo"</tbody></table>";
?>
	
	
<div class="form-actions">
<a class='btn btn-info' href='javascript:selectIndustries()'>
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
