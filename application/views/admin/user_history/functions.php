<?php
class Functions {
  

   public function __construct() {
     
   }

   
	public function display_data_table($array_of_data,$link_to_screen='',$object) 
	{

		echo "
		<script type='text/javascript'  src='".base_url()."js/includes/functions.js' > </script>
		<script type='text/javascript'  src='".base_url()."js/admin/user_history/form.js' > </script>
		
		";
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
							//echo "<th style='width:30px;' align='center'> <input type='checkbox' name='chk_all' id='chk_all' onchange='checkUncheck_DisplayDataForm()' /> </th> ";
						}
						else if($key=='screen_id')
						{
						}
						else if($key=='row_id')
						{
							echo "<th >".lang('btn_actions')."</th>";
						}
						else if($key!='are_canceled')
						{
							if($object->lang->lang()=='en')
							{
								if($key=='screen_ar' || $key=='screen_function_ar')
								{
									continue;
								}
							}
							else if($object->lang->lang()=='ar')
							{
								if($key=='screen' || $key=='screen_function')
								{
									continue;
								}
							}
							echo"<th> ".lang($key)." </th>";
						}
					}
					
					
					
					echo "</tr></thead>";

				}
				
				echo "<tbody><tr>";
				foreach ($record as $key=>$value)
				{
					
					
					if($key=='id')
					{
						//echo "<td align='center' style='width:30px;  background-color:$color_row;'><input type='checkbox' id='chk_current_row[]' name='chk_current_row[]' value='$value' ></td>";
					
						$current_row_id=$value;
					}
					else if($key=='screen_id')
					{
						$screen_url=$object->Screen_model->get_url_by_id($value);
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
						
						echo"<td > <a  href='$link_to_screen/form/$current_row_id/view' >$value</a> </td>";	
					}
					else if($key=='row_id')
					{
						$row_id=$value;
						$full_screen_url=base_url().$object->lang->lang().'/'.ADMIN.'/'.$screen_url.'/form/'.$row_id.'/view';
						echo"<td class='center' > 
						<a class='btn btn-success' href='$full_screen_url'>
										<i class='icon-zoom-in icon-white'></i>  
											".lang('btn_view')."                                            
									</a>
						</td>";
					}			
					else 
					{
							if($object->lang->lang()=='en')
							{
								if($key=='screen_ar' || $key=='screen_function_ar')
								{
									continue;
								}
							}
							else if($object->lang->lang()=='ar')
							{
								if($key=='screen' || $key=='screen_function')
								{
									continue;
								}
							}
						
						$width_row='150px';
						echo"<td  > $value </td>";	
					}
				}
				
				//echo"<td align='center' style='background-color:$color_row;'> <span class='record_btn'><a href='$link_to_screen/form/$current_row_id/edit'>    <img src='".base_url()."css/design/images/edit.png' title='".lang('btn_edit')."'/>".lang('btn_edit')."</a></span>  &nbsp; &nbsp; &nbsp; <span class='record_btn'><a href='$link_to_screen/delete/$current_row_id'  onclick=\"return delete_confirm('".$object->lang->lang()."')\"><img src='".base_url()."css/design/images/delete.png'  title='".lang('btn_delete')."' />".lang('btn_delete')."</a></span> </td>";	
				
				
				
				echo "</tr></tbody>";
				
			$index=$index+1;
		}
		
		echo"</table>";

	}
	   
}