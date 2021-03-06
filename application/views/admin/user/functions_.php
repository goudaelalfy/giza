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
		echo "<table id='rounded-corner' summary='2007 Major IT Companies Profit' >";
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
							echo "<th scope='col' class='rounded-company'> <input type='checkbox' name='chk_all' id='chk_all' onchange='checkUncheck_DisplayDataForm()' /> </th> ";
						}
						else if($key!='are_canceled')
						{
							echo"<th scope='col' class='rounded'><img hspace='5' src='".base_url()."/css/design/images/arw.png'  title='".lang('btn_sort_desc')."'  onclick=\"sort_('$link_to_screen/write_div_table_display_records/$key/desc');\"   onmouseover='this.cursor=hand;' />   &nbsp;".lang($key)."  &nbsp; <img class='sort_images' src='".base_url()."/images/icons/sort_asc.png' width='15'; height='15' title='".lang('btn_sort_asc')."'  onclick=\"sort_('$link_to_screen/write_div_table_display_records/$key/asc');\"/></th>";
							//echo"<th style='overflow:hidden;' align='center'><a href='$link_to_screen/table/$key/desc' ><img hspace='5' src='".base_url()."/css/design/images/arw.png'  title='".lang('btn_sort_desc')."'   onmouseover='this.cursor=hand;' /></a>   &nbsp;".lang($key)."  &nbsp; <img class='sort_images' src='".base_url()."/images/icons/sort_asc.png' width='15'; height='15' title='".lang('btn_sort_asc')."'  onclick=\"sort('$link_to_screen/write_div_table_display_records/$key/asc');\"/></th>";
						}
					}
					
					echo"<th scope='col' class='rounded'>".lang('btn_edit')."</th>";
					echo"<th scope='col' class='rounded-q4'>".lang('btn_delete')."</th>";
					echo "</tr></thead>";
					
					echo "
					<tfoot>
	    			<tr>
	        		<td colspan='6' class='rounded-foot-left' align='center'><em>".count($array_of_data)."</em></td>
	        		<td class='rounded-foot-right'>&nbsp;</td>
	        		</tr>
	    			</tfoot>
					";
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
						echo "<td align='center' style='width:30px;  background-color:$color_row;'><input type='checkbox' id='chk_current_row[]' name='chk_current_row[]' value='$value' ></td>";
					
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
						
						echo"<td align='center' style='width:$width_row; overflow:hidden; background-color:$color_row;'> <span class='table_lnk'><a  href='$link_to_screen/form/$current_row_id/view' >$value</a> </sapn> </td>";	
					}			
					else 
					{
						$width_row='150px';
						echo"<td  align='center' style='width:$width_row; overflow:hidden; background-color:$color_row;'> $value </td>";	
					}
				}
				
				echo"<td align='center' style='background-color:$color_row;'> <span class='record_btn'><a href='$link_to_screen/form/$current_row_id/edit'>    <img src='".base_url()."css/admin/images/user_edit.png' title='".lang('btn_edit')."'/></a></span>  </td>
				<td align='center' style='background-color:$color_row;'> <span class='record_btn'><a href='$link_to_screen/delete/$current_row_id'  onclick=\"return delete_confirm('".$object->lang->lang()."')\"><img src='".base_url()."css/admin/images/trash.png'  title='".lang('btn_delete')."' /></a></span> </td>";	
				echo "</tr>";
				
			$index=$index+1;
		}
		
		echo"</tbody></table>";

	}
	   
}