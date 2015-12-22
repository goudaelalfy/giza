<?php $this->load->view('website/includes/header'); ?>
<?php require_once getcwd().'/css/old/header.php';?>

<!--container-->
	<div id="container">
		<!--content-->
		<div class="content">
			<!--list-->
			<div class="list">
				<!--block-->
				<div class="block">
					<div class="hint">Why</div>
					<div class="title">Giza Systems?</div>
					<div class="body">
					
					<?php 
					foreach($career1_menu_links as $career1_menu_link) {
					$link_id=$career1_menu_link->id;
					$link_controller_name=$career1_menu_link->controller_name;
					$link_alias=$career1_menu_link->alias;
					
					if($link_alias=='') {
						$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name;
					} else {
						$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name.'/content/'.$link_alias;
					}
					
					if($this->lang->lang()=='ar') {
						$link_title=$career1_menu_link->title_ar;
					} else {
						$link_title=$career1_menu_link->title;
					}
					echo "<a class='arrow_link2' href='$full_link_url'>$link_title</a>";
					}
					?>
					
						
					</div>
				</div>
				<!--/block-->
				<!--block-->
				<div class="block">
					<div class="hint">Is Giza Systems</div>
					<div class="title">for Me?</div>
					<div class="body">
						<?php 
					foreach($career2_menu_links as $career2_menu_link) {
					$link_id=$career2_menu_link->id;
					$link_controller_name=$career2_menu_link->controller_name;
					$link_alias=$career2_menu_link->alias;
					
					if($link_alias=='') {
						$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name;
					} else {
						if($link_controller_name=='page') {
							$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name.'/content/'.$link_alias;
						} else {
							$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name.'/'.$link_alias;
						}
					}
					
					if($this->lang->lang()=='ar') {
						$link_title=$career2_menu_link->title_ar;
					} else {
						$link_title=$career2_menu_link->title;
					}
					echo "<a class='arrow_link2' href='$full_link_url'>$link_title</a>";
					}
					?>
					</div>
				</div>
				<!--/block-->
				<!--block-->
				<div class="block">
					<div class="hint">How do I </div>
					<div class="title">Apply?</div>
					<div class="body">
					<?php 
					foreach($career3_menu_links as $career3_menu_link) {
					$link_id=$career3_menu_link->id;
					$link_controller_name=$career3_menu_link->controller_name;
					$link_alias=$career3_menu_link->alias;
					
					if($link_alias=='') {
						$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name;
					} else {
						$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name.'/content/'.$link_alias;
					}
					
					if($this->lang->lang()=='ar') {
						$link_title=$career3_menu_link->title_ar;
					} else {
						$link_title=$career3_menu_link->title;
					}
					echo "<a class='arrow_link2' href='$full_link_url'>$link_title</a>";
					}
					?>
					</div>
				</div>
				<!--/block-->
				<!--block-->
				<div class="block last-child">
					<div class="hint">Integrate</div>
					<div class="title">Me</div>
					<div class="body">
					<?php 
					foreach($career4_menu_links as $career4_menu_link) {
					$link_id=$career4_menu_link->id;
					$link_controller_name=$career4_menu_link->controller_name;
					$link_alias=$career4_menu_link->alias;
					
					if($link_alias=='') {
						$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name;
					} else {
					if($link_controller_name=='page') {
							$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name.'/content/'.$link_alias;
						} else {
							$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name.'/'.$link_alias;
						}
					}
					
					if($this->lang->lang()=='ar') {
						$link_title=$career4_menu_link->title_ar;
					} else {
						$link_title=$career4_menu_link->title;
					}
					echo "<a class='arrow_link2' href='$full_link_url'>$link_title</a>";
					}
					?>					
					</div>
				</div>
				<!--/block-->
				<div class="clear"></div>
			</div>
			<!--/list-->
		</div>
		<!--/content-->
	</div>
	<!--/container-->

<?php $this->load->view('website/includes/footer'); ?>
