<?php
class Functions {
  

   public function __construct() {
     
   }

   
	public function display_data_table($array_of_data,$link_to_screen='',$object) 
	{

		echo "
		<script type='text/javascript'  src='".base_url()."js/includes/functions.js' > </script>
		<script type='text/javascript'  src='".base_url()."js/screen/form.js' > </script>
		";
		echo "<table style=' width:962px; table-layout:fixed;' border='0' cellpadding='3' cellspacing='1'>";
		$index=0;
		$color_row='';
		$height_row='';
		
		foreach ($array_of_data as $record)
		{
			
				$current_row_id=0;
				
				if($index==0)
				{
					echo "<tr style='background-image: url(".base_url()."/css/design/images/top_ti_bg.gif); height:29px; color:#FFFFFF'>";
					foreach ($record as $key=>$value)
					{
						if($key=='id')
						{
							echo "<th style='width:30px;' align='center'> <input type='checkbox' name='chk_all' id='chk_all' onchange='checkUncheck_DisplayDataForm()' /> </th> ";
						}
						else if($key!='are_canceled')
						{
							echo"<th style='overflow:hidden;' align='center'><img hspace='5' src='".base_url()."/css/design/images/arw__.png'  title='".lang('btn_sort_desc')."'  onclick=\"sort('$link_to_screen/write_div_table_display_records/$key/desc');\"   onmouseover='this.cursor=hand;' />   &nbsp;".lang($key)."  &nbsp; <img class='sort_images' src='".base_url()."/images/icons/sort_asc.png' width='15'; height='15' title='".lang('btn_sort_asc')."'  onclick=\"sort('$link_to_screen/write_div_table_display_records/$key/asc');\"/></th>";
						}
					}
					
					echo"<th style='width:180px;' align='center'>".lang('btn_manage_from_table')."</th>";
					echo "</tr>";
				}
				
				echo "<tr>";
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
						echo "<td align='center' style='width:30px; background-color:$color_row;'><input type='checkbox' id='chk_current_row[]' name='chk_current_row[]' value='$value' ></td>";
					
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
				
				echo"<td align='center' style='background-color:$color_row;'> <span class='record_btn'><a href='$link_to_screen/form/$current_row_id/edit'>    <img src='".base_url()."css/design/images/edit.png' title='".lang('btn_edit')."'/>".lang('btn_edit')."</a></span>  &nbsp; &nbsp; &nbsp; <span class='record_btn'><a href='$link_to_screen/delete/$current_row_id'  onclick=\"return delete_confirm('".$object->lang->lang()."')\"><img src='".base_url()."css/design/images/delete.png'  title='".lang('btn_delete')."' />".lang('btn_delete')."</a></span> </td>";	
				echo "</tr>";
				
			$index=$index+1;
		}
		
		echo"</table>";

	}
	   
}