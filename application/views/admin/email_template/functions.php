<?php
class Functions {
  

   public function __construct() {
     
   }

   
	public function display_data_table($array_of_data,$link_to_screen='',$object) 
	{

		echo "
		<script type='text/javascript'  src='".base_url()."js/includes/functions.js' > </script>
		<script type='text/javascript'  src='".base_url()."js/admin/email_template/form.js' > </script>
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
							//echo "<th> <input type='checkbox' name='chk_all' id='chk_all' onchange='checkUncheck_DisplayDataForm()' /> </th> ";
						}
						if($key=='active')
						{
							//echo "<th> <input type='checkbox' name='chk_all' id='chk_all' onchange='checkUncheck_DisplayDataForm()' /> </th> ";
						}
						else if($key!='are_canceled')
						{
							echo"<th >   ".lang($key)." </th>";
							//echo"<th style='overflow:hidden;' align='center'><a href='$link_to_screen/table/$key/desc' ><img hspace='5' src='".base_url()."/css/design/images/arw.png'  title='".lang('btn_sort_desc')."'   onmouseover='this.cursor=hand;' /></a>   &nbsp;".lang($key)."  &nbsp; <img class='sort_images' src='".base_url()."/images/icons/sort_asc.png' width='15'; height='15' title='".lang('btn_sort_asc')."'  onclick=\"sort('$link_to_screen/write_div_table_display_records/$key/asc');\"/></th>";
						}
					}
					
					//By Gouda, To run ajax paging. -- Commented Before --
					echo"<th >".lang('btn_manage_from_table')."</th>";
					echo "</tr></thead>";
				}
				
				echo "<tbody><tr class='even gradeA'>";
				foreach ($record as $key=>$value)
				{
					if($index%2==1)
					{
						$color_row='#e6f6fd';
						$height_row='30px';
					}
					else 
					{
						$color_row='#FFFFFF';
						$height_row='25px';
					}

					if($key=='id')
					{
						//echo "<td ><input type='checkbox' id='chk_current_row[]' name='chk_current_row[]' value='$value' ></td>";
					
						$current_row_id=$value;
					}
					if($key=='active')
					{
							
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
						
						echo"<td > <span class='table_lnk'><a  href='$link_to_screen/form/$current_row_id/view' >$value</a> </sapn> </td>";	
					} else if($key=='active') {
						if($value==0) {
							//echo"<td><a href='$link_to_screen/active/$current_row_id/1' ><i class='icon iconfugue16-cross'></i></a></td>";
							echo"<td><div id='dv_active_$current_row_id'><a href='javascript:void();' id='$current_row_id' class='hrf_unactive_class' ><i class='icon iconfugue16-cross'></i></a></div></td>";
						} else {
							//echo "<td><a href='$link_to_screen/active/$current_row_id/0' ><i class='icon iconfugue16-tick'></i></a></td>";
							echo"<td><div id='dv_active_$current_row_id'><a href='javascript:void();' id='$current_row_id' class='hrf_active_class' ><i class='icon iconfugue16-tick'></i></a></div></td>";
						
						}
					}			
					else 
					{
						$width_row='150px';
						echo"<td  > $value </td>";	
					}
				}
				
				
				echo "
				<td class='center'>
									<a class='btn btn-success' href='$link_to_screen/form/$current_row_id/view'>
										<i class='icon-zoom-in icon-white'></i>  
											".lang('btn_view')."                                            

											</a>

											";
				$this_object= new EmailTemplate();
				if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_edit)) {
				
				echo"<a class='btn btn-info' href='$link_to_screen/form/$current_row_id/edit'>
										<i class='icon-edit icon-white'></i>  
										".lang('btn_edit')."                                            
									</a>
				";
				}

			

											
				
				echo "</td></tr>";
				
				
			$index=$index+1;
		}
		
		echo"<tbody></table>";

	}
	   
}