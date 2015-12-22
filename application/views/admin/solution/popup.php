<?php $this->load->view('admin/includes/header_popup'); ?>
<script type="text/javascript">
function selectSolution(solution_id, solution_name) 
{
	window.opener.document.getElementById('solution_ids').value=solution_id;
	window.opener.document.getElementById('solution_names').value=solution_name;
	javascript:this.close();
}
</script>

<script type="text/javascript">
function checkUncheckSolutions() 
{	
	 	{
	    	for (var i = 0; i < document.frm_popup.elements.length; i++ ) 
		    {
		    	var check_id=document.frm_popup.elements[i].id;
		    	check_id=check_id.substring(0, 3);

		        if (document.frm_popup.elements[i].type == 'checkbox' && check_id=='sol') 
			    {		        		    
		        	document.frm_popup.elements[i].checked = document.frm_popup.elements['solutions'].checked; 
		        }

	    	}
	 	}
}
</script>
<script type="text/javascript">
function selectSolutions() 
{

		
		var solution_ids='';
		var solution_names='';
		var counter=0;
		
		for (var i = 0; i < document.frm_popup.elements.length; i++ ) 
	    {
			var checkbox_id=document.frm_popup.elements[i].id;
	        if (document.frm_popup.elements[i].type == 'checkbox' && checkbox_id!='solutions' ) 
		    {		   
			        		    
	        	if(document.frm_popup.elements[i].checked)
	        	{
		        	if(counter==0)
		        	{
		        		solution_ids=solution_ids+document.frm_popup.elements[i].value;
		        		solution_names=solution_names+document.frm_popup.elements[i].name;
		        	}
		        	else
		        	{
		        		solution_ids=solution_ids+','+document.frm_popup.elements[i].value;
		        		solution_names=solution_names+','+document.frm_popup.elements[i].name;
			        	
			        }
		        	counter=counter+1;
		        } 
	        }

    	}
	
		window.opener.document.getElementById('solution_ids').value=solution_ids;
		window.opener.document.getElementById('solution_names').value=solution_names;
		
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
			echo "<th ><input type='checkbox' name='solutions' id='solutions' value='0' onclick='checkUncheckSolutions()' /></th>";
			echo"<th >".lang('solutions')." </th>";					
			echo "</tr></thead>";	
			echo "<tbody>";				
		}
				
		$id= $row->id;
		
		$solution_name='';
		if($this->lang->lang()=='ar') {
		$solution_name=$row->title_ar;
		} else {
		$solution_name=$row->title;
		}
		
			$checked='';
			
			foreach($solutions_rows as $solutions_row)
			{
				$solutions_row_id=$solutions_row->solution_id;
				if($solutions_row_id==$id)
				{
					$checked="checked='checked'";
				}
			}
		
		echo "<tr>";
		echo"<td><input type='checkbox' name='$solution_name' id='solution[]' value='$id' $checked onclick='document.frm_popup.elements[\"solutions\"].checked = false;' /></td>";
			
		echo"<td> <a  href=\"javascript:selectSolution('$id','$solution_name')\" >$solution_name</a>  </td>";	
		echo "</tr>";
		$index=$index+1;
	}
echo"</tbody></table>";
?>
	
	
<div class="form-actions">
<a class='btn btn-info' href='javascript:selectSolutions()'>
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
