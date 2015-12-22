<?php $this->load->view('website/includes/header'); ?>


	<!--container-->
	<div id="container">
		<!--content-->
		<div class="content">
			<!--side-bar-->
			<div id="side-bar">
				<!--main-block-->
				<div class="main-block">
				<?php foreach($side_menu_rows as $side_menu_row) {
				$menu_alias=$side_menu_row->alias;
				$menu_controller_name=$side_menu_row->controller_name;
				
				if($this->lang->lang()=='ar') {
					$menu_title=$side_menu_row->title_ar;
					
				} else {
					$menu_title=$side_menu_row->title;

				}
				
				if($menu_alias=='') {
					$menu_homebox_content_fullurl=base_url().$this->lang->lang().'/'.$menu_controller_name;
				} else {
					$menu_homebox_content_fullurl=base_url().$this->lang->lang().'/'.$menu_controller_name.'/content/'.$menu_alias;
				}
				
				$menu_title=substr($menu_title, 0, 25);
				
				if(isset($alias_industry)) {
					if($menu_alias==$alias_industry) {
						$lnk_class="parent current";
					} else {
						$lnk_class="parent";
					}
				} else {
					$lnk_class="parent";
				}
				
				/*
				echo"
				<a href='$menu_homebox_content_fullurl' class='$lnk_class'>$menu_title</a>
					";
				*/
				
				$menu_industry_row=$this->Industry_model->get_by_alias($menu_alias);
				if(count($menu_industry_row)>0) {
					
					$industry_id=$menu_industry_row->id;
				
					$industry_subs=$this->Industry_sub_model->get_all_by_industry_id('',$industry_id);
					if(count($industry_subs)>0) {
						
						$sub_style='';
					
						if(isset($alias_industry)) {
							if($menu_alias==$alias_industry) {
								$sub_style="style='display: block;'";
								
								//echo "<div class='sub' $sub_style>";
								foreach($industry_subs as $industry_sub) {
									$industry_sub_alias=$industry_sub->alias;
									if($this->lang->lang()=='ar') {
										$industry_sub_title=$industry_sub->title_ar;
									} else {
										$industry_sub_title=$industry_sub->title;
									}
									$full_industry_sub_fullurl=base_url().$this->lang->lang().'/industry/content/'.$menu_alias.'/'.$industry_sub_alias;
									echo "<a href='$full_industry_sub_fullurl' class='parent'>$industry_sub_title</a>";
								}
								
								echo "<a href='".base_url().$this->lang->lang()."/industry/casestudy/$industry_id' class='parent'>".lang('case_studies')."</a>";
								//echo "</div>";
							}
						} 
					
						/*
						//echo "<div class='sub' $sub_style>";
						foreach($industry_subs as $industry_sub) {
							$industry_sub_alias=$industry_sub->alias;
							if($this->lang->lang()=='ar') {
								$industry_sub_title=$industry_sub->title_ar;
							} else {
								$industry_sub_title=$industry_sub->title;
							}
							$full_industry_sub_fullurl=base_url().$this->lang->lang().'/industry/content/'.$menu_alias.'/'.$industry_sub_alias;
							echo "<a href='$full_industry_sub_fullurl'>$industry_sub_title</a>";
						}
						
						echo "<a href='".base_url().$this->lang->lang()."/industry/casestudy/$industry_id'>".lang('case_studies')."</a>";
						//echo "</div>";
						*/
					}
				}					
				
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
					<div class="hint"><?php echo lang('industries');?></div>
					<h1><?php if(isset($page_title)) {echo $page_title;} ?></h1>
					
					<div class="sub-title">
					<h3><?php if(isset($title)) {echo $title;} ?></h3>
					</div>
					
					<div class="main-body empty">
						 <?php 
		               if(isset($body)) {echo nl2br($body);}
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
	