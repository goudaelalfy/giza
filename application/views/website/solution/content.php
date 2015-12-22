<?php $this->load->view('website/includes/header'); ?>


	<!--container-->
	<div id="container">
		<!--content-->
		<div class="content">
			<!--side-bar-->
			<div id="side-bar">
				<!--main-block-->
				<div class="main-block">
				<?php 
				if(isset($side_menu_rows)) {
				foreach($side_menu_rows as $side_menu_row) {
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
				
				if(isset($alias_solution)) {
					if($menu_alias==$alias_solution) {
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
				
				$menu_solution_row=$this->Solution_model->get_by_alias($menu_alias);
				if(count($menu_solution_row)>0) {
					
					$solution_id=$menu_solution_row->id;
				
					$solution_subs=$this->Solution_sub_model->get_all_by_solution_id('',$solution_id);
					if(count($solution_subs)>0) {
						
						$sub_style='';
					
						if(isset($alias_solution)) {
							if($menu_alias==$alias_solution) {
								$sub_style="style='display: block;'";
								
								//echo "<div class='sub' $sub_style>";
								foreach($solution_subs as $solution_sub) {
									$solution_sub_alias=$solution_sub->alias;
									if($this->lang->lang()=='ar') {
										$solution_sub_title=$solution_sub->title_ar;
									} else {
										$solution_sub_title=$solution_sub->title;
									}
									$full_solution_sub_fullurl=base_url().$this->lang->lang().'/solution/content/'.$menu_alias.'/'.$solution_sub_alias;
									echo "<a href='$full_solution_sub_fullurl'  class='parent'>$solution_sub_title</a>";
								}
								echo "<a href='".base_url().$this->lang->lang()."/solution/casestudy/$solution_id'  class='parent'>".lang('case_studies')."</a>";
								//echo "</div>";
						
							}
						} 
						
						/*
						echo "<div class='sub' $sub_style>";
						foreach($solution_subs as $solution_sub) {
							$solution_sub_alias=$solution_sub->alias;
							if($this->lang->lang()=='ar') {
								$solution_sub_title=$solution_sub->title_ar;
							} else {
								$solution_sub_title=$solution_sub->title;
							}
							$full_solution_sub_fullurl=base_url().$this->lang->lang().'/solution/content/'.$menu_alias.'/'.$solution_sub_alias;
							echo "<a href='$full_solution_sub_fullurl'>$solution_sub_title</a>";
						}
						echo "<a href='".base_url().$this->lang->lang()."/solution/casestudy/$solution_id'>".lang('case_studies')."</a>";
						echo "</div>";
						*/
					}
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
					<div class="hint"><?php echo lang('solutions') ?></div>
					<h1><?php if(isset($page_title)) {echo $page_title;} ?></h1>
					<br/>
					<div class="sub-title">
					<h3><?php if(isset($title)) {echo $title;} ?></h3>
					</div>
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
	