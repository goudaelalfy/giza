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
				
				if($menu_controller_name=='managementteam') {
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
					<div class="list">
					<?php 
		              foreach($rows as $row) {
		              	$id=$row->id;
		              	if($this->lang->lang()=='ar') {
		              		$name=$row->name_ar;
							$title=$row->title_ar;
							$seo_words=$row->seo_words_ar;
							$brief=$row->brief_ar;
							$body=$row->body_ar;
						} else {
							$name=$row->name;
							$title=$row->title;
							$seo_words=$row->seo_words;
							$brief=$row->brief;
							$body=$row->body;
							
						}
					if($row->image_selected!='') {	
		              	$image_selected=base_url().$row->image_selected;
					} else {
						$image_selected='';
					}
						
		              	
		              	echo "
		              	<!--item-->
							<div class='item'>
								<table><tr>
								";
		              	if($image_selected!='') {
							echo "<td valign='top'><br/><div class='left'><img src='$image_selected' alt='$title' /></div></td>";
		              	}

		              	echo"<td valign='top'><div class='right' style='padding-left: 10px;'>
									<div class='title'><h3>$name</h3>$title</div>
									<div class='text'>
										$brief
							
										
										<div id='dv_more_lnk_$id' ><a href ='javascript:void(0)' onclick=\"document.getElementById('dv_more_$id').style.display='block';document.getElementById('dv_more_lnk_$id').style.display='none'\" style='text-decoration: none; color: #00a4e4;'>...". lang('read_more')."</a></div>	
										
										<div id='dv_more_$id' style='display:none; color: #4a4a4a;'>
										$body
										<div id='dv_less_lnk_$id' ><a href ='javascript:void(0)' onclick=\"document.getElementById('dv_more_$id').style.display='none';document.getElementById('dv_more_lnk_$id').style.display='block'\" style='text-decoration: none; color: #00a4e4;'>...". lang('less')."</a></div>	
										</div>
										
									</div>
									
									
								</div>
								
								<div class='clear'></div>
								
							</td>
							</tr>
							</table>
							
							
							
							</div>
							<!--/item-->
		              	";
		              }
					?>
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
	