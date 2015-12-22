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
				
				if($menu_controller_name=='award') {
					$lnk_class="parent current";
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
					<div class="hint"><?php if(isset($parent_link_title)) {echo $parent_link_title;}  ?></div>
					<h1><?php if(isset($title)) {echo $title;} ?></h1>
					
					<div class="main-body">
					<div class="list"  style='padding: 0px 0px 0px 0px;'>
					<table>
					<?php 
		              foreach($rows as $row) {
		              	
		              	if($this->lang->lang()=='ar') {
		              		$name=$row->name_ar;
							$seo_words=$row->seo_words_ar;
							//$brief=$row->brief_ar;
							$body=$row->body_ar;
						} else {
							$name=$row->name;
							$seo_words=$row->seo_words;
							//$brief=$row->brief;
							$body=$row->body;
							
						}
					if($row->image_selected!='') {	
		              	$image_selected=base_url().$row->image_selected;
					} else {
						$image_selected='';
					}
						
					$award_file=base_url().$row->award_file;
							
		            $pdf_icon=base_url().'/images/icons/pdf-icon.png';
		              	
		              	echo "
		              <tr><td width='150px' height='150px' valign='top'>
		              	<!--item-->
							
								
								";
		              	if($image_selected!='') {
							echo "<div class='left'><img src='$image_selected' alt='$title' /></div>";
		              	}

		              	echo"
		              	</td><td valign='top'>
		              	<div class='item' style='padding: 0px; margin: 0px;'>
		              	<div class='right' style='padding-left: 30px;'>
									<div class='title'><h3>$name</h3> </div>
									<div class='text'>
										$body
									</div>";
										
									if($row->award_file!='') {
										echo "<a href='$award_file' ><img src='$pdf_icon'/> </a>";
									}
								echo "</div>
								<div class='clear'></div><br/>";

							
							echo " </div>
							<br/><br/>
							<!--/item-->
							</td></tr>
		              	";
		              }
					?>
					</table>
					
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
	