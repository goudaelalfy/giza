<?php $this->load->view('admin/includes/header_popup'); ?>
<script type="text/javascript">
function selectAlias(alias, title, title_ar) 
{
	window.opener.document.getElementById('alias').value=alias;
	window.opener.document.getElementById('title').value=title;
	window.opener.document.getElementById('title_ar').value=title_ar;
	
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
			echo"<th >".lang('alias')." </th>";					
			echo "</tr></thead>";	
			echo "<tbody>";				
		}
		
		$alias=$row->alias;
		
		$title='';
		$title_ar='';
		if(isset($row->title)) {
		$title=$row->title;
		$title_ar=$row->title_ar;
		} else if(isset($row->name)) {
		$title=$row->name;
		$title_ar=$row->name_ar;
		}
		
		echo "<tr>";
		echo"<td class='center'> <a  href=\"javascript:selectAlias('$alias','$title','$title_ar')\" >$alias</a>  </td>";	
		echo "</td></tr>";
		$index=$index+1;
	}
echo"</tbody></table>";
?>
	
	<!-- 
	<div class="pagination pagination-centered">
	<ul>
	<?php 
            	$pages=ceil($rows_count/$paging_no_of_pages);
            	
            	// ------------- previous link---------
            	$previous_lnk=$page-1;
            	if($previous_lnk>0)
            	{
            		echo "<li><a href='".base_url().$this->lang->lang()."/".ADMIN."/menulink/table/$previous_lnk'> ".lang('lnk_prev')."</a></li>";
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
            			echo "<a href='".base_url().$this->lang->lang()."/".ADMIN."/menulink/table/$page_no' $class_style>$page_no</a>";
            		}
            	}
            	
            	// ------------- next link---------
            	$next_lnk=$page+1;
            	if($next_lnk<=$pages)
            	{
            		echo "<a href='".base_url().$this->lang->lang()."/".ADMIN."/menulink/table/$next_lnk' >".lang('lnk_next')." </a>";
            	}
            	?>
	
	
						  
							
						  </ul>
						</div>				
		 -->			
						            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

     
</form>



<?php $this->load->view('admin/includes/footer_popup'); ?>
