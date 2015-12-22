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
					<div>
					
					<br/><br/><br/>
					
<?php 
	
	$gallery_id=$gallery_row->id;
	$gallery_icon= base_url().$gallery_row->icon;
	$gallery_date= $gallery_row->last_modify_date;
	
	$gallery_date= date("Y-m-d", strtotime($gallery_date)) ;
	
	
if($this->lang->lang()=='ar') {
	$gallery_title=$gallery_row->title_ar;
$gallery_body=$gallery_row->body_ar;
	
	} else {
	$gallery_title=$gallery_row->title;	
$gallery_body=$gallery_row->body;
	
	}
?>
					
						<table width="100%" align="center" cellspacing="5" style="border:1px solid #d9d9d9; text-align:left; padding:20px; padding-top:20px; background:#f9f9f9">
									<tr>
                                    <td height="20px"></td>
                                    </tr>
                                    
                                    
                                    <tr>
                                    <td width="20px"></td>
                                    	<td colspan="2" valign="top" align="left">

                                        	<img src="<?php echo $gallery_icon;?>" style="border:0px solid #00a3e4" align="absmiddle" width="150px" height="100px"/>

                                        </td>

                                    </tr>

                                    <tr><td height="10"></td></tr>

                                    <tr>
                                    <td width="20px"></td>	
                                    	<td style="text-align:left; width:120px;"><font style="color:#00a4e4; font-size:12pt;"><?php  echo lang('album_name')?>:</font></td>

                                        <td style="text-align:left"><font style="color:#00a4e4; font-size:12pt;"><?php echo $gallery_title; ?></font></td>

                                    </tr>

                                    <tr>
                                    	<td width="20px"></td>
                                    	<td style="text-align:left; width:90px;"><font style="color:#00a4e4; font-size:12pt;"><?php echo lang('date')?>:</font></td>

                                        <td style="text-align:left"><font style="color:#00a4e4; font-size:12pt; direction:rtl; float:left;"><?php echo $gallery_date; ?></font></td>

                                    </tr>

                                    <tr>
                                    	<td width="20px"></td>
                                    	<td style="text-align:left; width:90px;" colspan="2"><font style="color:#00a4e4; font-size:12pt;"><?php  echo lang('description')?>:</font></td>

                                    </tr>

                                    <tr>
										<td width="20px"></td>
                                    	<td style="text-align:left" colspan="2"><div style="color:#7F7F7F; font-size:11pt; text-align:justify; width:680px;"><?php echo $gallery_body; ?></div></td>

                                    </tr>

                                </table>
								
                                <?php 
                                if(file_exists(getcwd()."/added/uploads/gallery/$gallery_id/")) {
                                $photos_dir=opendir(getcwd()."/added/uploads/gallery/$gallery_id/");
                               
            
                                ?>

                                <div class="gallery x">

                                <table width="100%" align="center" cellspacing="3" style="text-align:left; padding:0px; padding-top:20px;">

                                    <tr>
									<td align="left" valign="top" style="padding:0px; margin:0px; text-align:justify;">
                                    <div style="width:100%; float:left" class="gallery x">
                                    <ul style="margin:0px; padding:0px; list-style:none">
                                    <?php 
                                     while ($image = readdir($photos_dir)) {
						            if ($image == '.' || $image == '..') {
						                continue;
						            } else {
						            	$image_full_path=base_url()."/added/uploads/gallery/$gallery_id/$image";
                                    ?>
										<li class="liphotos">
                                            <a href="<?php echo $image_full_path; ?>" rel="prettyPhoto[gallery1]" title="">
           										<img src="<?php echo $image_full_path; ?>" style="cursor:pointer; cursor:hand;" align="absmiddle" width="150" height="100"/>
                                       		</a>
                                        </li>
                                   <?php }
	                                }
	                                ?>
                                    </ul>
                                    </div>
									</td>
                                    </tr>

                              	</table>
                                </div>    
                                <?php }?>
								
<link rel="stylesheet" href="<?php echo base_url();?>css/old/js/prettyPhoto_compressed_3.1.4/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script src="<?php echo base_url();?>css/old/js/prettyPhoto_compressed_3.1.4/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" charset="utf-8">
$jQuery(document).ready(function(){
	$jQuery("area[rel^='prettyPhoto']").prettyPhoto();
	$jQuery(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});
	$jQuery(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
	$jQuery("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
		custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
		changepicturecallback: function(){ initialize(); }
	});
});
</script>
						
						
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
	