<?php
class Functions {
  

   public function __construct() {
     
   }

   
	public function display_data_table($array_of_data,$link_to_screen='',$object) 
	{

		echo "
		<script type='text/javascript'  src='".base_url()."js/includes/functions.js' > </script>
		<script type='text/javascript'  src='".base_url()."js/admin/photo/form.js' > </script>
		
		<script>
		function PopupCenter(pageURL, title,w,h) {
		var left = (screen.width/2)-(w/2);
		var top = (screen.height/2)-(h/2);
		var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=1, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
		}
		</script>
		";
		
		
		//echo "<table style=' width:962px; table-layout:fixed;' border='0' cellpadding='3' cellspacing='1'>";
		echo "<ul class='thumbnails gallery'>";

		$index=0;
		
		
		foreach ($array_of_data as $record)
		{
			
				
			$this_object= new Photo();
			$privielge_add=$this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_add);
			$privielge_edit=$this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_edit);
			$privielge_delete=$this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_delete);
			
			$gallery_id = $record->id;
			$icon = $record->icon;
			if($object->lang->lang()=='ar') {
				$title = $record->title_ar;
			} else {
				$title = $record->title;
			}
			
			
			echo"
			<li id='image-1' class='thumbnail'>
			<a style='text-align:center' title='$title' href='javascript:void(0)' onclick=\"PopupCenter('".base_url().$object->lang->lang()."/".ADMIN."/photo/uploads/$gallery_id' , '".$object->lang->line('upload_images')."',1000,1000);\">
			<img src='".base_url().$icon."' title='$title'  /><br/>
			$title
			</a>
			
			</li>
			
			";	
			  			

				
			$index=$index+1;
		}
		
		echo"</ul>";

	}
	   
}