<?php $this->load->view('website/includes/header'); ?>

<link href="<?php echo base_url();?>css/old/css/pagination.css" rel="stylesheet" type="text/css" />


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
				
				
				//----------- Sub section menus --------------------------------
				if($menu_controller_name=='mediasectioncategory') {
				echo "<div class='sub' style='display: block;'>";
				$media_section_by_category_rows=$this->Media_section_model->get_by_media_section_category_alias($menu_alias);
				foreach($media_section_by_category_rows as $media_section_row) {
				$media_section_id=$media_section_row->id;
				$media_section_alias=$media_section_row->alias;
				$media_section_icon= base_url().$media_section_row->icon;
				
				if($this->lang->lang()=='ar') {
							$media_section_title=$media_section_row->title_ar;
							
						} else {
							$media_section_title=$media_section_row->title;
							
							
						}
						echo "<a href='".base_url().$this->lang->lang()."/mediasection/content/$media_section_alias'>$media_section_title</a>";
				}
				
				echo "</div>";
				}
				//-----------------------------------------------------------------
				
				
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
					<div class="hint"><?php echo lang('media_center'); ?></div>
					<h1><?php if(isset($title)) {echo $title;} ?></h1>
					<div class="main-body empty">
						 

                                <table width="100%" align="center" cellspacing="0" style="text-align:left; padding:0px; padding-top:20px;">

                                    <tr>

<?php 
$counter_loop=0;
foreach ($media_item_rows as $media_item_row) {
	
	$media_item_id=$media_item_row->id;
	$media_item_alias=$media_item_row->alias;
	$media_item_icon= $media_item_row->icon;
	$media_item_icon_path= base_url().$media_item_row->icon;
	
	$media_item_pdf_file= $media_item_row->pdf_file;
	$media_item_pdf_file_path= base_url().$media_item_row->pdf_file;
	
	$media_item_video_file= $media_item_row->video_file;
	$media_item_video_file_path= base_url().$media_item_row->video_file;
	
	if($this->lang->lang()=='ar') {
				$media_item_title=$media_item_row->title_ar;
				$media_item_seo_words=$media_item_row->seo_words_ar;
				$media_item_brief=$media_item_row->brief_ar;
				$media_item_body=$media_item_row->body_ar;
			} else {
				$media_item_title=$media_item_row->title;
				$media_item_seo_words=$media_item_row->seo_words;
				$media_item_brief=$media_item_row->brief;
				$media_item_body=$media_item_row->body;
				
			}

			 
			echo "     <td valign='top' style='padding:0px; margin:0px; padding-top:0px; text-align:justify; width:390px;'>

											<table width='100%' align='center' border='0' cellpadding='0' cellspacing='0' style='border-collapse:collapse; padding:0px;'>

												<tr>
			";
	
			//if($media_item_icon!='') {
				echo "
				 <td align='left' valign='top' width='80' style='padding:0px; margin:0px; text-align:justify;'>

                                                        <img src='$media_item_icon_path' style='border:0px solid #00a3e4' align='absmiddle' />

                                                    </td>
				
				";
			//}
?>

                                   
                                                    <td <?php if($media_item_icon=='') {?> colspan="2" <?php }?> align="left" valign="top" 

                                                        style="padding-left:<?php if($media_item_icon=='') {?> 0<?php } else {?> 10px; <?php }?> 

                                                        	padding-top:0px; margin:0px;">


                                                        <a href="<?php echo base_url().$this->lang->lang()."/mediaitem/content/$media_item_alias"; ?>" style="color:#00a4e4; text-decoration:none; padding:0px; margin:0px;">


                                                        	<font style="color:#00a4e4; font-size:12pt;"><?php echo $media_item_title; ?></font>


                                                        </a>

                                                    <div align="left" style="border:0px; margin:0px; padding:0px; border-collapse:collapse;">

                                                    <?php 
                                                    echo $media_item_brief;
                                                    ?>
													<br /><br />
                                                    <?php if($media_item_pdf_file!='') {?>

                                                    	<a href="<?php echo $media_item_pdf_file_path; ?>" style="color:#00a4e4; text-decoration:none;">

                                                            <img src="<?php echo base_url();?>css/old/images/pdf-icon.png" border="0" align="left" style="padding-top:5px;" />

                                                        </a>

                                                    <?php }?>

                                                    </div>

                                                    </td>

                                                </tr>

                                            </table>

                                        </td>

                                        <?php if($counter_loop%2==1) {?>

                                        </tr><td colspan="3" height="30" style="background:url('<?php echo base_url();?>css/old/images/horizontal-separator.png') center repeat-x;"></td><tr>

                                        <?php } else {
                                        
                                        	if($counter_loop<count($media_item_rows)){
                                        	?>

                                            <td style="background:url('<?php echo base_url();?>css/old/images/vertical-separator.png') top center repeat-y;" width="40"></td>

                                        
<?php 
                                        	}
                                        }
$counter_loop++;
}
?>

                                    </tr>
                                    
                                    
                                    <tr><td colspan="4" height="100px" align="right">
                                    <?php 
                                    $current_url=current_url();
									$current_url=str_replace('index.php','',$current_url);
									$current_url=urldecode($current_url);
									$current_url_alias= end(explode('/', $current_url));
									
                                    if($current_url_alias=='Newsletter') {
                                    	echo "<a href='".base_url().$this->lang->lang()."/subscriber' style='font-size:15px; font-weight:bold; '> ".lang('subscribe_to_nozzom')."</a>";
                                    }
                                    ?>
                                    </td></tr>
                                    
                                    <tr>
                                    <td align="center" colspan="4">
                                    
<div class="pagination">
	<ul>
	<?php 
            	$pages=ceil($rows_count/$paging_no_of_pages);
            	
            	// ------------- previous link---------
            	$previous_lnk=$page-1;
            	if($previous_lnk>0)
            	{
            		echo "<a href='".base_url().$this->lang->lang()."/mediasection/content/$current_alias/$previous_lnk'> « ‹ </a> ";
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
            			echo " <a href='".base_url().$this->lang->lang()."/mediasection/content/$current_alias/$page_no' $class_style>$page_no</a> ";
            		}
            	}
            	
            	// ------------- next link---------
            	$next_lnk=$page+1;
            	if($next_lnk<=$pages)
            	{
            		echo " <a href='".base_url().$this->lang->lang()."/mediasection/content/$current_alias/$next_lnk' > › » </a>";
            	}
            	?>
	
	
						  
							
						  </ul>
						</div>
                                    
                                    </td>
                                    </tr>

                                    </table>

                                   

						
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
	