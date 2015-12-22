<?php
class Functions {
  

   public function __construct() {
     
   }

   
	public function display_data_table($array_of_data,$link_to_screen='',$object) 
	{

		echo "
		<script type='text/javascript'  src='".base_url()."js/includes/functions.js' > </script>
		<script type='text/javascript'  src='".base_url()."js/admin/user/user.js' > </script>
		";
		//echo "<table style=' width:962px; table-layout:fixed;' border='0' cellpadding='3' cellspacing='1'>";
		echo "<table class='table table-striped table-bordered bootstrap-datatable datatable'>";
		$index=0;
		$color_row='';
		$height_row='';
		
		foreach ($array_of_data as $record)
		{
			
				$current_row_id=0;
				
				if($index==0)
				{
					echo "<thead><tr>";
					foreach ($record as $key=>$value)
					{
						if($key=='id')
						{
							echo "<th > <input type='checkbox' name='chk_all' id='chk_all' onchange='checkUncheck_DisplayDataForm()' /> </th> ";
						}
						else if($key!='are_canceled')
						{
							echo"<th >".lang($key)." </th>";
						}
					}
					
					echo"<th >".lang('btn_actions')."</th>";
					echo "</tr></thead>";
					
					
				}
				
				
				
				echo "<tbody><tr>";
				foreach ($record as $key=>$value)
				{
					if($index%2==1)
					{
						//$color_row='#e6f6fd';
						$height_row='30px';
					}
					else 
					{
						//$color_row='#FFFFFF';
						$height_row='25px';
					}

					$color_row='';
					
					if($key=='id')
					{
						echo "<td  ><input type='checkbox' id='chk_current_row[]' name='chk_current_row[]' value='$value' ></td>";
					
						$current_row_id=$value;
					}
					else if($key=='are_canceled')
					{
						if($value==0)
						{
							$what_will=1;
							$icon="cancel_for_table.png";
							$title=$object->lang->line('btn_cancel');
						}
						else
						{
							$what_will=0;
							$icon="uncancel_for_table.png";
							$title=$object->lang->line('btn_uncancel');
						}
						//$cancel_link="<a href='$link_to_screen/cancel_uncancel/$current_row_id/$what_will/view' ><img src='".base_url()."/images/icons/$icon' width='15'; height='15'  title='".$title."' /></a>";
					}
					
					else if($key=='name' )
					{
					
						$width_row='210px';
						
						echo"<td class='center'> <a  href='$link_to_screen/form/$current_row_id/view' >$value</a>  </td>";	
					}			
					else 
					{
						$width_row='150px';
						echo"<td  class='center'> $value </td>";	
					}
				}
				
				
				
				echo "
				<td class='center'>
									<a class='btn btn-success' href='$link_to_screen/form/$current_row_id/view'>
										<i class='icon-zoom-in icon-white'></i>  
											".lang('btn_view')."                                            
									</a>
									<a class='btn btn-info' href='$link_to_screen/form/$current_row_id/edit'>
										<i class='icon-edit icon-white'></i>  
										".lang('btn_edit')."                                            
									</a>
									<a class='btn btn-danger' href='$link_to_screen/delete/$current_row_id'  onclick=\"return delete_confirm('".$object->lang->lang()."')\">
										<i class='icon-trash icon-white'></i> 
										".lang('btn_delete')."
									</a>
								</td>
				";
				
				
				echo "</tr>";
				
			$index=$index+1;
		}
		
		echo"</tbody></table>";

	}
	   
}