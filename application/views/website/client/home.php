<?php $this->load->view('website/includes/header'); ?>
<?php echo "<script type='text/javascript'  src='".base_url()."js/website/client/form.js' > </script>";?>


	<!--container-->
	
	<div id="container" >
		<!--content-->
		<div class="content">
			<!--side-bar-->
			<div id="side-bar">
				<!--main-block-->
				<!-- 
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
				 -->
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
					<div class="hint"><?php echo $this->lang->line('clients_welcome'); ?></div>
					<h1><?php echo $this->lang->line('welcome').' '.$this->session->userdata('client_session')->username; ?></h1>
					<div class="main-body">
								
                                    <div style="width:100%; height:50px;"></div>
                                    <div style="width:100%; height:50px; font-size:18px; color:#7d7d7d" align="center"><?php echo $this->lang->line('What_would_you_like_to_do'); ?></div>
                                    <div style="width:33%; float:left" align="center">
                                        <a href="<?php echo base_url().$this->lang->lang();?>/client/profile"><img src="<?php echo base_url();?>css/old/images/Giza-img-editprofile.jpg" border="0" /></a>
                                    </div>
                                    
                                    <div style="width:33%; float:left" align="center">
                                        <a href="<?php echo base_url().$this->lang->lang();?>/client/survey"><img src="<?php echo base_url();?>css/old/images/Giza-img-sur.jpg" border="0" /></a>	
                                    </div>
                                    
					
									<div style="width:33%; float:left" align="center">
                                        <a href="<?php echo base_url().$this->lang->lang();?>/client/logout"><img src="<?php echo base_url();?>css/old/images/logout.png" border="0" /></a>	
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
	