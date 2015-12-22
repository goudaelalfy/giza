<!--footer-->
	<div id="footer">
		<div class="holder">
			<div class="content">
				<!--block-->
				<div class="block">
					<h2>Subsidiaries</h2>
					<div class="body_footer">
						<div><a href="#">Giza Arabia</a></div>
						<div><a href="#">Giza Systems Gulf</a></div>
						<div><a href="#">Giza Systems JLT</a></div>
						<div><a href="#">Giza Systems Electromechanical</a></div>
						<div><a href="#">Giza Systems and Distribution</a></div>
						<div><a href="#">Giza Systems Free Zone</a></div>
						<div><a href="#">Giza Systems School of Technology</a></div>
						<div><a href="#">Giza Systems Foundation</a></div>
					</div>
				</div>
				<!--/block-->
				<!--block-->
				<div class="block">
						<?php 
				$media_center_links=$this->Menu_link_model->get_all_menu_links_by_menu_map('footer_2');
				
				$index=0;
				foreach($media_center_links as $media_center_link) {
				$link_id=$media_center_link->id;
				$link_controller_name=$media_center_link->controller_name;
				$link_alias=$media_center_link->alias;
				
				if($link_alias=='') {
					$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name;
				} else {
					//$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name.'/content/'.$link_alias;
					$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name.'/'.$link_alias;
				}
				
				if($this->lang->lang()=='ar') {
					$link_title=$media_center_link->title_ar;
					$menu_title=$media_center_link->menu_title_ar;
				} else {
					$link_title=$media_center_link->title;
					$menu_title=$media_center_link->menu_title;
				}
				
				$link_style=$media_center_link->style;
				
				if($index==0) {
					echo "
				<h2>$menu_title</h2>
					<div class='body_footer'>
				";
				}
				$index++;
				
				echo "
				<div><a href='$full_link_url'>$link_title</a></div>
				";
				}
				?>
					</div>
				</div>
				<!--/block-->
				<!--block-->
				<div class="block">
				<?php 
				$media_center_links=$this->Menu_link_model->get_all_menu_links_by_menu_map('footer_3');
				
				$index=0;
				foreach($media_center_links as $media_center_link) {
				$link_id=$media_center_link->id;
				$link_controller_name=$media_center_link->controller_name;
				$link_alias=$media_center_link->alias;
				
				if($link_alias=='') {
					$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name;
				} else {
					//$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name.'/content/'.$link_alias;
					$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name.'/'.$link_alias;
				}
				
				if($this->lang->lang()=='ar') {
					$link_title=$media_center_link->title_ar;
					$menu_title=$media_center_link->menu_title_ar;
				} else {
					$link_title=$media_center_link->title;
					$menu_title=$media_center_link->menu_title;
				}
				
				$link_style=$media_center_link->style;
				
				if($index==0) {
					echo "
				<h2>$menu_title</h2>
					<div class='body_footer'>
				";
				}
				$index++;
				
				echo "
				<div><a href='$full_link_url'>$link_title</a></div>
				";
				}
				?>
				</div>
				</div>
				<!--/block-->
				<!--block-->
				<div class="block">
				<?php 
				$media_center_links=$this->Menu_link_model->get_all_menu_links_by_menu_map('footer_4');
				
				$index=0;
				foreach($media_center_links as $media_center_link) {
				$link_id=$media_center_link->id;
				$link_controller_name=$media_center_link->controller_name;
				$link_alias=$media_center_link->alias;
				
				if($link_alias=='') {
					$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name;
				} else {
					$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name.'/content/'.$link_alias;
					//$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name.'/'.$link_alias;
				}
				
				if($this->lang->lang()=='ar') {
					$link_title=$media_center_link->title_ar;
					$menu_title=$media_center_link->menu_title_ar;
				} else {
					$link_title=$media_center_link->title;
					$menu_title=$media_center_link->menu_title;
				}
				
				$link_style=$media_center_link->style;
				
				if($index==0) {
					echo "
				<h2>$menu_title</h2>
					<div class='body_footer'>
				";
				}
				$index++;
				
				echo "
				<div><a href='$full_link_url'>$link_title</a></div>
				";
				}
				?>

					</div>
				</div>
				<!--/block-->
				<!--block-->
				<div class="block last">
						<?php 
				$media_center_links=$this->Menu_link_model->get_all_menu_links_by_menu_map('footer_5');
				
				$index=0;
				foreach($media_center_links as $media_center_link) {
				$link_id=$media_center_link->id;
				$link_controller_name=$media_center_link->controller_name;
				$link_alias=$media_center_link->alias;
				
				if($link_alias=='') {
					$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name;
				} else {
					//$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name.'/content/'.$link_alias;
					$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name.'/'.$link_alias;
				}
				
				if($this->lang->lang()=='ar') {
					$link_title=$media_center_link->title_ar;
					$menu_title=$media_center_link->menu_title_ar;
				} else {
					$link_title=$media_center_link->title;
					$menu_title=$media_center_link->menu_title;
				}
				
				$link_style=$media_center_link->style;
				
				if($index==0) {
					echo "
				<h2>$menu_title</h2>
					<div class='body_footer'>
				";
				}
				$index++;
				
				echo "
				<div><a href='$full_link_url'>$link_title</a></div>
				";
				}
				?>
					</div>
				</div>
				<!--/block-->
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<!--/footer-->
	<!--copy-->
	<div id="copy">
		<div class="content">
			<div class="text">&copy; 2011 Giza Systems. All rights reserved</div>
		</div>
	</div>
	<!--/copy-->
	<!--INTERNET_EXPLORER_6_ERROR-->
	<div id="ie6-error">
		<div class="close">[ Close ]</div>
		<div class="title">Dear Visitor,</div>
		<div>You may need to upgrade your browser to use our Website.</div>
		<div>
			<div>please download one of the browsers below to enjoy our site to the fullest! </div>
			<a href="http://windows.microsoft.com/en-US/internet-explorer/downloads/ie" target="_blank">Internet Explorer latest version</a>
			<a href="http://www.google.com/chrome" target="_blank">Google Chrome</a>
			<a href="http://www.mozilla.org" target="_blank">Mozilla Firefox</a>
			<a href="http://www.apple.com/safari/download/" target="_blank">Apple Safari</a>
			<a href="http://www.opera.com/download/" target="_blank">Opera</a>
		</div>
	</div>
	<!--/INTERNET_EXPLORER_6_ERROR-->
</body>

</html>