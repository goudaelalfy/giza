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
				
				if($menu_controller_name=='gallery') {
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
					<div class="hint"><?php echo lang('media_center'); ?></div>
					<h1><?php if(isset($title)) {echo $title;} ?></h1>
					<div class="">
					
					<br/><br/><br/>
					
						<table width="100%" align="center" cellspacing="0" style="text-align:left; padding:0px; padding-top:20px;">

                                    <tr>

<?php 
$counter_loop=0;
foreach ($gallery_rows as $gallery_row) {
	
	$gallery_id=$gallery_row->id;
	$gallery_icon= base_url().$gallery_row->icon;
	
if($this->lang->lang()=='ar') {
	$gallery_title=$gallery_row->title_ar;
$gallery_body=$gallery_row->body_ar;
	
	} else {
	$gallery_title=$gallery_row->title;	
$gallery_body=$gallery_row->body;
	
	}
?>
                                        <td valign="top" style="padding:0px; margin:0px; padding-top:0px; text-align:justify; width:400px;">

											<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; padding:0px;">

												<tr>


                                                    <td align="left" valign="top" width="80" style="padding:0px; margin:0px; text-align:justify;">

                                                        <a href="<?php echo base_url().$this->lang->lang().'/photo/gallery/'.$gallery_id;?>" style="color:#00a4e4; text-decoration:none; padding:0px; margin:0px;">

                                                        <img src="<?php echo $gallery_icon; ?>" width="150" height="100" align="absmiddle" border="0" />

                                                        </a>

                                                    </td>


                                                    <td <?php if($gallery_row->icon !='') { echo "colspan='2'"; }?> align="left" 

                                                        style="padding-left:10px; vertical-align:top; padding-top:0px; margin:0px;">

                                                        <a href="<?php echo base_url().$this->lang->lang().'/photo/gallery/'.$gallery_id;?>" style="color:#00a4e4; text-decoration:none; padding:0px; margin:0px;">

                                                        	<font style="color:#00a4e4; font-size:14pt;"><?php echo $gallery_title;?></font>

                                                    	</a>

                                                    <div align="left" style="border:0px; margin:0px; padding:0px; border-collapse:collapse; font-size:13px; text-align:justify; line-height:20px;">

                                                   <?php echo $gallery_body;?>

                                                    </div>

                                                    </td>

                                                </tr>

                                            </table>

                                        </td>

                                        <?php if($counter_loop%2==1 ) {?>


                                        </tr><tr><td colspan="3" height="30" style="background:url('<?php echo base_url()."css/old";?>/images/horizontal-separator.png') center repeat-x;"></td><tr>

                                        <?php } else if($counter_loop%2==0) {?>


                                            <td style="background:url('<?php echo base_url()."css/old";?>/images/vertical-separator.png') top center repeat-y;" width="40"></td>

                                            <?php }
                                            ?>

<?php 
$counter_loop++;
} 

?>

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
	