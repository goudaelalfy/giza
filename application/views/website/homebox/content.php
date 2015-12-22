<?php $this->load->view('website/includes/header'); ?>


	<!--container-->
	<div id="container">
		<!--content-->
		<div class="content">
			<!--side-bar-->
			<div id="side-bar">
				<!--main-block-->
				<div class="main-block">
					
				<?php foreach($home_box_rows as $home_box_row) {
				$menu_alias=$home_box_row->alias;
				if($this->lang->lang()=='ar') {
					$menu_title=$home_box_row->title_ar;
					$menu_seo_words=$home_box_row->seo_words_ar;
					$menu_brief=$home_box_row->brief_ar;
					$menu_body=$home_box_row->body_ar;
				} else {
					$menu_title=$home_box_row->title;
					$menu_seo_words=$home_box_row->seo_words;
					$menu_brief=$home_box_row->brief;
					$menu_body=$home_box_row->body;
					
				}
			
				$menu_banner_file_selected=base_url().$home_box_row->banner_file_selected;	
				$menu_icon=base_url().$home_box_row->icon;	
	
				$menu_homebox_content_fullurl=base_url().$this->lang->lang().'/home/content/'.$menu_alias;
			
				
				$menu_title=substr($menu_title, 0, 25);
				
				if(isset($current_alias)) {
					if($menu_alias==$current_alias) {
						$lnk_class="parent current";
					} else {
						$lnk_class="parent";
					}
				} else {
					$lnk_class="parent";
				}
				
				echo"
				<a href='$menu_homebox_content_fullurl' class='$lnk_class'>$menu_title</a>
					";
				}
				?>
				</div>
				<!--/main-block-->
				
				<!--block-->
				<div class="block">
					<div class="title"><?php echo lang('you_just_viewed')?></div>
					<?php 
					$visited_links_arr=$_SESSION["visited_links"];
					sort($visited_links_arr);
					foreach ($visited_links_arr as $link) {

						$visited_link_title=urldecode($link);
						$visited_link_title= end(explode('/', $visited_link_title));
						$visited_link_title=substr($visited_link_title, 0, 25);
						
						if($visited_link_title=='en' || $visited_link_title=='ar') {
							$visited_link_title=lang('home');
						}
						
					if(!is_numeric($visited_link_title)) {
							$visited_link_title=ucfirst($visited_link_title);
							echo "<a href='$link' class='parent'>$visited_link_title</a>";
						
						}
					}?>
				</div>
				<!--/block-->
				<!--block-->
				<div class="block">
					<div class="title"><?php echo lang('of_further_interest')?></div>
					<a href="#" class="parent">Careers</a>
					<a href="#" class="parent">Power - Case Studies</a>
					<a href="#" class="parent">Power - Case Studies</a>
					<a href="#" class="parent">Water - Case Studies</a>
				</div>
				<!--/block-->
			</div>
			<!--/side-bar-->
			<!--main-->
			<div id="main">
				<div class="main-title">
					<div class="hint"><?php ?></div>
					<h1><?php if(isset($title)) {echo $title;} ?></h1>
					<div class="main-body empty">
						 <?php 
		               if(isset($body)) {echo $body;}
		               ?>

						
					</div>
				</div>
			</div>
			<!--/main-->
			<div class="clear"></div>
		</div>
		<!--/content-->
	</div>
	<!--/container-->
	
<?php $this->load->view('website/includes/footer'); ?>
	