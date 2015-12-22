<?php
class Functions {
  

   public function __construct() {
     
   }

   
	public function display_data_table($array_of_data,$link_to_screen='',$object) 
	{

		echo "
		<script type='text/javascript'  src='".base_url()."js/includes/functions.js' > </script>
		<script type='text/javascript'  src='".base_url()."js/admin/job/form.js' > </script>
		";
		
		
		//echo "<table style=' width:962px; table-layout:fixed;' border='0' cellpadding='3' cellspacing='1'>";
		echo "<table class='table table-striped table-bordered bootstrap-datatable datatable'>";
		$index=0;
		$color_row='';
		$height_row='';
		
		foreach ($array_of_data as $record)
		{
			$count_of_records=count($array_of_data);
				$current_row_id=0;
				
				if($index==0)
				{
					echo "<thead><tr>";
					foreach ($record as $key=>$value)
					{
						if($key=='id')
						{
							echo "<th > <input type='checkbox' name='chk_all' id='chk_all' onchange='checkUncheck_DisplayDataForm()' /> </th> ";
						}else if($key=='approved') {
							if($object->session->userdata('user_session')->admin==1) {
								echo"<th >".lang($key)." </th>";
							}
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
					
					else if($key=='alias' || $key=='name' || $key=='name_ar')
					{
					
						$width_td='160px';
						
						echo"<td class='center' width='$width_td'> <a  href='$link_to_screen/form/$current_row_id/view' >$value</a>  </td>";	
					} else if($key=='image_thumb_selected' ) {
					
						$width_row='210px';
						echo"<td class='center' > <img src='".base_url().$value."' title='$value' width='100px' height='50px' /> </td>";	
					}else if($key=='sort' )
					{
					
						$width_row='210px';
						echo"<td align='center' >";
						
						if($index+1<$count_of_records) {
							echo "<a href='$link_to_screen/sort/down/$current_row_id'><i class='icon-circle-arrow-down'></i></a>";
						} else {
							echo "<i class='icon-circle-arrow-down'></i> ";
						}
						echo "&nbsp; &nbsp; &nbsp;";
						
						if($index>0) {
							echo "<a href='$link_to_screen/sort/up/$current_row_id'><i class='icon-circle-arrow-up'></i></a>";
						} else {
							echo "<i class='icon-circle-arrow-up'></i> ";
						}
						echo "</td>";	
					}	 else if($key=='approved' )
					{
						if($object->session->userdata('user_session')->admin==1) {
							if($value==0) {					
								echo"<td class='center'> <a  href='$link_to_screen/approve/$current_row_id/1' ><span class='label label-warning'>".lang('no')."</span></a> </td>";
							} else {
								echo"<td class='center'> <a  href='$link_to_screen/approve/$current_row_id/0' ><span class='label label-success'>".lang('yes')."</span></a>  </td>";
							}
						}
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

											";
				$this_object= new Job();
				if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_edit)) {
				
				echo"<a class='btn btn-info' href='$link_to_screen/form/$current_row_id/edit'>
										<i class='icon-edit icon-white'></i>  
										".lang('btn_edit')."                                            
									</a>
				";
				}

				if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_delete)) {
								
				echo"<a class='btn btn-danger' href='$link_to_screen/delete/$current_row_id' onclick='return delete_confirm(\"".$object->lang->lang()."\")'>
										<i class='icon-trash icon-white'></i> 
										".lang('btn_delete')."
									</a>
								";
								}

				echo"<a class='btn btn-success' href='$link_to_screen/candidate/$current_row_id' >
										<i class='icon-zoom-in icon-white'></i> 
										".lang('view_candidate')."
									</a>
								";							
				
				echo "</td></tr>";
				
			$index=$index+1;
		}
		
		echo"</tbody></table>";

	}
	   
}