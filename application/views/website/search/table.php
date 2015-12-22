<?php $this->load->view('website/includes/header'); ?>

<?php require_once getcwd().'/css/old/header.php';?>
<link href="<?php echo base_url();?>css/old/css/pagination.css" rel="stylesheet" type="text/css" />

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
				
				if($menu_controller_name=='award') {
					$lnk_class="parent current";
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
					
					<div class="main-body">
					<div class="list" style="padding: 10px;">
					
					<div style="color: #4a4a4a; font-size: 14px;">
					
					<?php 
					echo lang('search_result_for').': <font color="#34abdd">'.$keyword.'</font> <br/> <br/>';
					if($all_count>0) {
						echo '<font color="#34abdd">'.lang('all_results').': </font> ('.$all_count.' '.lang('results').') <br/>';
					}
					if($industry_count>0) {
						echo '<font color="#34abdd">'.lang('industries').': </font> ('.$industry_count.' '.lang('results').') <br/>';
					}
					if($solution_count>0) {
						echo '<font color="#34abdd">'.lang('solutions').': </font> ('.$solution_count.' '.lang('results').') <br/>';
					}
					if($page_count>0) {
						echo '<font color="#34abdd">'.lang('general').': </font> ('.$page_count.' '.lang('results').') <br/>';
					}
					if($gallery_count>0) {
						echo '<font color="#34abdd">'.lang('galleries').': </font> ('.$gallery_count.' '.lang('results').') <br/>';
					}
					if($media_item_count>0) {
						echo '<font color="#34abdd">'.lang('news').': </font> ('.$media_item_count.' '.lang('results').') <br/>';
					}
					if($office_event_count>0) {
						echo '<font color="#34abdd">'.lang('offices_events').': </font> ('.$office_event_count.' '.lang('results').') <br/>';
					}
					if($case_study_count>0) {
						echo '<font color="#34abdd">'.lang('case_studies').': </font> ('.$case_study_count.' '.lang('results').') <br/>';
					}
					if($job_count>0) {
						echo '<font color="#34abdd">'.lang('jobs').': </font> ('.$job_count.' '.lang('results').') <br/>';
					}
					?>
					</div>
					<?php 
		              foreach($rows as $row) {

		              	$search_type=$row->search_type;
		              	$alias=$row->alias;

		              	if($this->lang->lang()=='ar') {
		              		$title=$row->title_ar;
		              		//$brief=$row->brief_ar;
							$body=$row->body_ar;
						} else {
							$title=$row->title;
		              		//$brief=$row->brief;
		              		$body=$row->body;
							
						}
						  	
						$body=strip_tags($body);
						$body= substr($body, 0, 350).' ...';
						$body=str_replace($keyword,"<font color='#34abdd'>$keyword</font>",$body);
						
		              	
						$search_url='';
						if($search_type=='industry') {
							$search_url="industry/content/$alias";
						} else if($search_type=='industry_sub') {
							$search_url="industrysub/content/$alias";
						} else if($search_type=='solution') {
							$search_url="solution/content/$alias";
						} else if($search_type=='solution_sub') {
							$search_url="solutionsub/content/$alias";
						} else if($search_type=='page') {
							$search_url="page/content/$alias";
						} else if($search_type=='gallery') {
							$search_url="photo/gallery/$alias";
						} else if($search_type=='media_item') {
							$search_url="mediaitem/content/$alias";
						} else if($search_type=='office_event') {
							$search_url="officeevent";
						} else if($search_type=='case_study') {
							$search_url="casestudy/content/$alias";
						} else if($search_type=='job') {
							$search_url="job/content/$alias";
						}  
						
						
												
						
		              	echo "
		              	<!--item-->
							<div class='item'>
								
								";
							

		              		echo"<div class='right' style='padding: 10px;' >
									<a href='".base_url().$this->lang->lang()."/$search_url' class='link' style='font-size:15px;'>$title</a> <br/><br/>
									<div class='text'>
										$body
									</div>
								</div>
								<div class='clear'></div>
								
								
							</div>
							<!--/item-->
		              	";
		              	
		              }
					?>
					
										
					
					                                    
<div class="pagination" >
	<ul>
	<?php 
            	$pages=ceil($rows_count/$paging_no_of_pages);
            	
            	// ------------- previous link---------
            	$previous_lnk=$page-1;
            	if($previous_lnk>0)
            	{
            		echo "<a href='".base_url().$this->lang->lang()."/search/table/$previous_lnk?keyword=$keyword'> « ‹ </a> ";
            	}
            	
            	for ($counter = 0; $counter < $pages; $counter += 1) 
            	{
            		$page_no=$counter+1;
            		if($page==$page_no)
            		$class_style="class='current'";
            		else
            		$class_style="";
            		
            		
            		$range_previous=$page-2; 
            		$range_next=$page+2;  
            		
            		if(($page_no<$page && $page_no > $range_previous) || ($page_no>$page && $page_no < $range_next) || $page==$page_no)
            		{
            			echo " <a href='".base_url().$this->lang->lang()."/search/table/$page_no?keyword=$keyword' $class_style>$page_no</a> ";
            		}
            	}
            	
            	// ------------- next link---------
            	$next_lnk=$page+1;
            	if($next_lnk<=$pages)
            	{
            		echo " <a href='".base_url().$this->lang->lang()."/search/table/$next_lnk?keyword=$keyword' > › » </a>";
            	}
            	?>
	
	
						  
							
</ul>
</div>
					
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
	