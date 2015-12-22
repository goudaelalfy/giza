<?php $this->load->view('website/includes/header'); ?>

<?php require_once getcwd().'/css/old/header.php';?>

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
					<div class="">
					
					<br/><br/><br/>
						 <table border="0"  style="padding:0px; border:0px; border-collapse:collapse; border-radius: 15px;" cellpadding="0" cellspacing="0">

<?php if (isset($media_section_rows)) {?>
                                        <tr >
										
										<td align="center">
										
									<ul id="mycarousel" class="mycarousel jcarousel-skin-infomedia">
<?php 
$counter_loop=0;
foreach ($media_section_rows as $media_section_row) {
	
	$media_section_id=$media_section_row->id;
	$media_section_alias=$media_section_row->alias;
	$media_section_icon= base_url().$media_section_row->icon;
	
if($this->lang->lang()=='ar') {
				$media_section_title=$media_section_row->title_ar;
				//$data['seo_words']=$row->seo_words_ar;
				//$data['brief']=$row->brief_ar;
				//$data['body']=$row->body_ar;
			} else {
				$media_section_title=$media_section_row->title;
				
				
			}

			 
			echo "<li>
				<table>
				<tr>
                                           <td align='center' valign='top' height='150px' width='230px'

                                            	style='background:url($media_section_icon) no-repeat; padding:0px; margin:0px; cursor:pointer; cursor:hand; text-align:center;  border-radius: 15px;  -moz-border-radius: 15px; border: 0px solid #CCC;'

												onclick=\"window.location='".base_url().$this->lang->lang()."/mediasection/content/$media_section_alias'\";
												
                                                onmouseover=\"this.style.background='url(".base_url()."css/old/images/infomedia_section.png) no-repeat'; window.document.getElementById('section_$media_section_id').style.display=''; \"

                                                onmouseout=\"this.style.background='url($media_section_icon) no-repeat'; window.document.getElementById('section_$media_section_id').style.display='none';\">
													
                                                <br/><br/>
                                                <a id='section_$media_section_id'

'

                                                    style='display:none; text-decoration:none; color:#ffffff; font-size:18px; text-transform:uppercase; '

                                                >

                                                $media_section_title

                                                </a>

                                              
                                                
                                            </td>
                                            
			";
	
?>
										
										

                                           <?php if($counter_loop %2==0) {?>

                                            </br>
                                            
                                            <?php } else {?>

</td></tr></table>
											

                                           <?php }?>
										
										


</li>
<?php 

$counter_loop++;
}


?>
</td></tr></table>

</li>

				</ul>
										<td>
                                        </tr>

<?php 
}
?>
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
	