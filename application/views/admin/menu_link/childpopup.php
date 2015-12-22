<?php $this->load->view('admin/includes/header_popup'); ?>

<!-- ------------------------------------------- Sorting Sub----------------------------------------- -->

<script type="text/javascript" src="<?php echo base_url();?>added/jquery-drag-n-drop/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>added/jquery-drag-n-drop/jquery-ui-1.7.1.custom.min.js"></script>

<style>

#contentLeft li {
	list-style: none;
	margin: 0 0 4px 0;
	padding: 10px;
	background-color:rgb(245, 245, 245);
	border: #CCCCCC solid 1px;
	width: 97%;
	
	
-moz-border-radius: 5px 5px 5px 5px ;
border-radius: 5px 5px 5px 5px ;
}
</style>


<script type="text/javascript">
$(document).ready(function(){ 
						   
	$(function() {
		$("#contentLeft ul").sortable({ opacity: 0.6, cursor: 'move', update: function() {
			var order = $(this).sortable("serialize") + '&action=updateRecordsListings'; 
			$.post("<?php echo base_url().$this->lang->lang().'/'.ADMIN; ?>/menu/sortlink", order, function(theResponse){
				//$("#contentRight").html(theResponse);
			}); 															 
		}								  
		});
	});

});	
</script>
<!-- ------------------------------------------------------------------------------------------------------ -->




<br/><br/>
<h3> <?php echo lang('menu_link_childs')?></h3>
<br/><br/>
<div class="control-group">
<div id="contentLeft">
<ul>
		
<?php 
if(isset($menu_link_rows))
foreach($menu_link_rows as $menu_link_row)
{
				
				$menu_link_id=$menu_link_row->id;
				$menu_link_alias=$menu_link_row->alias;
				$menu_link_title=$menu_link_row->title;
				$menu_link_title_ar=$menu_link_row->title_ar;
				$sort=$menu_link_row->sort; 
							
				
				echo"<li id='recordsArray_$menu_link_id'>
				<table width='100%'><tr><td >
				$menu_link_alias
				</td><td >
				$menu_link_title
				</td><td >
				$menu_link_title_ar
				</td>
				<td width='20%'>
				<!--
				<a href='".base_url().$this->lang->lang().'/'.ADMIN."/menulink/delete/$menu_link_id' class='btn btn-danger' onclick='return delete_confirm(\"".$this->lang->lang()."\")' ><i class='icon-trash icon-white'></i>".lang('btn_delete')."</a>
				<a href='".base_url().$this->lang->lang().'/'.ADMIN."/menulink/form/$menu_link_id/edit'  class='btn btn-info' ><i class='icon-edit icon-white'></i>".lang('btn_edit')."</a>
				-->
				
				</td>
				</tr></table>
				</li>
				";	
}
?>				
</ul>
</div>
</div>



<?php $this->load->view('admin/includes/footer_sub'); ?>
