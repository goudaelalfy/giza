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
					<div class="hint"><?php if(isset($parent_link_title)) {echo $parent_link_title;}  ?></div>
					<h1><?php if(isset($title)) {echo $title;} ?></h1>
					<div class="main-body empty" >
						<?php 
		               //if(isset($project_name)) {echo $project_name;}
		               ?>

					<div class="form">
					<form name="" id="" action="" method="post" enctype='multipart/form-data'>
								
						<div class="group">
						<!-- 
						<div class="row">
						<span class="name"><?php echo lang('title'); ?></span>
						<div class="controls">
						  <?php if(isset($title)) { echo $title; } ?>
						</div>
						</div>
						 -->
						<div class="row">
						<span class="name"><?php echo lang('project_name'); ?></span>
						<div class="controls">
						  <?php if(isset($project_name)) { echo $project_name; } ?>
						</div>
						</div>
						
						<div class="row">
						<span class="name"><?php echo lang('client'); ?></span>
						<div class="controls">
						  <?php if(isset($client_name)) { echo $client_name; } ?>
						</div>
						</div>
						
						<div class="row">
						<span class="name"><?php echo lang('country'); ?></span>
						<div class="controls">
						  <?php if(isset($country)) { echo $country; } ?>
						</div>
						</div>
						
						<div class="row">
						<span class="name"><?php echo lang('end_user'); ?></span>
						<div class="controls">
						  <?php if(isset($end_user)) { echo $end_user; } ?>
						</div>
						</div>
												
						<div class="row">
						<span class="name"><?php echo lang('business_unit'); ?></span>
						<div class="controls">
						  <?php if(isset($business_unit)) { echo $business_unit; } ?>
						</div>
						</div>
						
						<div class="row">
						<span class="name"><?php echo lang('project_leader'); ?></span>
						<div class="controls">
						  <?php if(isset($project_leader)) { echo $project_leader; } ?>
						</div>
						</div>
						
						<br/>
						<div class="row">
						<span class="name"><?php echo lang('client_issue'); ?></span>
						<div class="controls">
						  <?php if(isset($client_issue)) { echo $client_issue; } ?>
						</div>
						</div>
						
						<br/>
						<div class="row">
						<span class="name"><?php echo lang('work_scope'); ?></span>
						<div class="controls">
						  <?php if(isset($work_scope)) { echo $work_scope; } ?>
						</div>
						</div>
						
						<br/>
						<div class="row">
						<span class="name"><?php echo lang('outcome'); ?></span>
						<div class="controls" >
						  <?php if(isset($outcome)) { echo $outcome; } ?>
						</div>
						</div>
						
						<br/>
						<div class="row">
						<span class="name"><?php echo lang('team_members'); ?></span>
						<div class="controls">
						  <?php if(isset($team_members)) { echo $team_members; } ?>
						</div>
						</div>
						
						<br/>
						<div class="row">
						<span class="name"><?php echo lang('testimonial'); ?></span>
						<div class="controls">
						  <?php if(isset($testimonial)) { echo $testimonial; } ?>
						</div>
						</div>
						
						
						</div>
						</form>
						</div>
						
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
	