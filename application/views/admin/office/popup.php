<?php $this->load->view('admin/includes/header_popup'); ?>
<script type="text/javascript">
function selectOffice(office_id, office_location) 
{
	window.opener.document.getElementById('office_ids').value=office_id;
	window.opener.document.getElementById('office_locations').value=office_location;
	javascript:this.close();
}
</script>

<script type="text/javascript">
function checkUncheckOffices() 
{	
	 	{
	    	for (var i = 0; i < document.frm_popup.elements.length; i++ ) 
		    {
		    	var check_id=document.frm_popup.elements[i].id;
		    	check_id=check_id.substring(0, 3);

		        if (document.frm_popup.elements[i].type == 'checkbox' && check_id=='off') 
			    {		        		    
		        	document.frm_popup.elements[i].checked = document.frm_popup.elements['offices'].checked; 
		        }

	    	}
	 	}
}
</script>
<script type="text/javascript">
function selectOffices() 
{

		
		var office_ids='';
		var office_locations='';
		var counter=0;
		
		for (var i = 0; i < document.frm_popup.elements.length; i++ ) 
	    {
			var checkbox_id=document.frm_popup.elements[i].id;
	        if (document.frm_popup.elements[i].type == 'checkbox' && checkbox_id!='offices' ) 
		    {		   
			        		    
	        	if(document.frm_popup.elements[i].checked)
	        	{
		        	if(counter==0)
		        	{
		        		office_ids=office_ids+document.frm_popup.elements[i].value;
		        		office_locations=office_locations+document.frm_popup.elements[i].name;
		        	}
		        	else
		        	{
		        		office_ids=office_ids+','+document.frm_popup.elements[i].value;
		        		office_locations=office_locations+','+document.frm_popup.elements[i].name;
			        	
			        }
		        	counter=counter+1;
		        } 
	        }

    	}
	
		window.opener.document.getElementById('office_ids').value=office_ids;
		window.opener.document.getElementById('office_locations').value=office_locations;
		
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
			echo "<th ><input type='checkbox' name='offices' id='offices' value='0' onclick='checkUncheckOffices()' /></th>";
			echo"<th >".lang('offices')." </th>";					
			echo "</tr></thead>";	
			echo "<tbody>";				
		}
				
		$id= $row->id;
		
		$location='';
		if($this->lang->lang()=='ar') {
		$location=$row->location_ar;
		} else {
		$location=$row->location;
		}
		
			$checked='';
			
			foreach($event_office_ids as $event_office_id)
			{
				if($event_office_id==$id)
				{
					$checked="checked='checked'";
				}
			}
		
		echo "<tr>";
		echo"<td><input type='checkbox' name='$location' id='office[]' value='$id' $checked onclick='document.frm_popup.elements[\"offices\"].checked = false;' /></td>";
			
		echo"<td> <a  href=\"javascript:selectOffice('$id','$location')\" >$location</a>  </td>";	
		echo "</tr>";
		$index=$index+1;
	}
echo"</tbody></table>";
?>
	
	
<div class="form-actions">
<a class='btn btn-info' href='javascript:selectOffices()'>
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
