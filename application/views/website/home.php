<?php $this->load->view('website/includes/header'); ?>

<!--news-bar-->
	<div id="news-bar">
		<!--content-->
		<div class="content">
			<ul id="js-news" class="js-hidden">
				<?php 
				
				$media_item_rows=$this->Media_item_model->get_by_media_section_id(1, 0, 20);
				foreach($media_item_rows as $media_item_row) {
					$mediaitem_id=$media_item_row->id;
					$mediaitem_alias=$media_item_row->alias;
					$mediaitem_pdf_file=$media_item_row->pdf_file;
					$mediaitem_video_file=$media_item_row->video_file;

					$mediaitem_date=$media_item_row->the_date;
					//$mediaitem_date = date("Y-m-d",strtotime($mediaitem_date));
					$mediaitem_date = date("d-m-Y",strtotime($mediaitem_date));
					
					if($this->lang->lang()=='ar') {
						$mediaitem_title=$media_item_row->title_ar;
						$mediaitem_seo_words=$media_item_row->seo_words_ar;
						$mediaitem_brief=$media_item_row->brief_ar;
						$mediaitem_body=$media_item_row->body_ar;
					} else {
						$mediaitem_title=$media_item_row->title;
						$mediaitem_seo_words=$media_item_row->seo_words;
						$mediaitem_brief=$media_item_row->brief;
						$mediaitem_body=$media_item_row->body;
						
					}
					
					$mediaitem_full_url=base_url().$this->lang->lang().'/mediaitem/content/'.$mediaitem_alias;
						
					echo "<li class='news-item'><span class='date'>$mediaitem_date</span><a href=\"$mediaitem_full_url\">$mediaitem_title</a></li>";
				}
				?>
			
			   
			  </ul>
		</div>
		<!--/content-->
	</div>
	<!--/news-bar-->


	<!--container-->
	<div id="container">
		<!--content-->
		<div class="content">
			<!--home-boxes-->
			<div class="boxes-left-arrow"></div>
			<div class="boxes-right-arrow"></div>
			<div class="home-boxes">
				<div class="list">
				
				<?php foreach($home_box_rows as $home_box_row) {
				$alias=$home_box_row->alias;
				if($this->lang->lang()=='ar') {
					$title=$home_box_row->title_ar;
					$seo_words=$home_box_row->seo_words_ar;
					$brief=$home_box_row->brief_ar;
					$body=$home_box_row->body_ar;
				} else {
					$title=$home_box_row->title;
					$seo_words=$home_box_row->seo_words;
					$brief=$home_box_row->brief;
					$body=$home_box_row->body;
					
				}
			
			$banner_file_selected=base_url().$home_box_row->banner_file_selected;	
			$icon=base_url().$home_box_row->icon;	

			$homebox_content_fullurl=base_url().$this->lang->lang().'/home/content/'.$alias;
			
				echo"
				<!--box-->
					<div class='box'>
						<img src='$icon' alt='$title' />
						<h1>$title</h1>
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
