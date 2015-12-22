<?php $this->load->view('website/includes/header'); ?>

	<!--container-->
	<div id="container">
		<!--content-->
		<div class="content">
			<!--home-boxes-->
			<div class="boxes-left-arrow"></div>
			<div class="boxes-right-arrow"></div>
			<div class="home-boxes">
				<div class="list">
				<?php foreach($solution_rows as $solution_row) {
				$alias=$solution_row->alias;
				if($this->lang->lang()=='ar') {
					$title=$solution_row->title_ar;
					$seo_words=$solution_row->seo_words_ar;
					$brief=$solution_row->brief_ar;
					$body=$solution_row->body_ar;
				} else {
					$title=$solution_row->title;
					$seo_words=$solution_row->seo_words;
					$brief=$solution_row->brief;
					$body=$solution_row->body;
					
				}
			
			$banner_file_selected=base_url().$solution_row->banner_file_selected;	
			$icon=base_url().$solution_row->menu_icon;	

			$homebox_content_fullurl=base_url().$this->lang->lang().'/solution/content/'.$alias;
			
				echo"
				<!--box-->
					<div class='box'>
					<a href='$homebox_content_fullurl' style='text-decoration:none;'>
						<img src='$icon' alt='$title' />
						
						<h1>$title</h1>
						</a>
						<div class='intro'>
							$brief
						</div>
						<div class='clear'></div>
						<a href='$homebox_content_fullurl' class='more'>".$this->lang->line('read_more')."</a>
						<div class='clear'></div>
					</div>
					<!--/box-->
					";
				}
				?>
				
					
					<div class="clear"></div>
				</div>
			</div>
			<!--/home-boxes-->
		</div>
		<!--/content-->
	</div>
	<!--/container-->
	
<?php $this->load->view('website/includes/footer'); ?>
	