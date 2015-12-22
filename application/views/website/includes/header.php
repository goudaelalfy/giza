<?php if($this->lang->lang()=='ar') {
	$website_css_dir='website';
	$html_dir='rtl';
} else {
	$website_css_dir='website';
	$html_dir='ltr';
}

$main_menu_links=$this->Menu_link_model->get_all_menu_links_by_menu_map('main');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title><?php 
	if(!isset($title)) {
		$title= lang('admin_panel_title');
	}
	echo $title;
	?></title>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/<?php echo $website_css_dir; ?>/css/reset.css" media="all" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/<?php echo $website_css_dir; ?>/css/main.css" media="all" />
	<!--[if IE]><link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/<?php echo $website_css_dir; ?>/css/ie.css" media="all" /><![endif]-->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/<?php echo $website_css_dir; ?>/js/apprise/apprise.css" media="all" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/<?php echo $website_css_dir; ?>/js/news_ticker/css/ticker-style.css" media="all" />

	<!-- By Gouda -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/style.css" media="all" />

	<link rel="shortcut icon" href="<?php echo base_url();?>/images/giza_logo_admin_panel.png">
	
	<script type="text/javascript" src="<?php echo base_url();?>css/<?php echo $website_css_dir; ?>/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>css/<?php echo $website_css_dir; ?>/js/jquery-migrate-1.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>css/<?php echo $website_css_dir; ?>/js/jquery.easing.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>css/<?php echo $website_css_dir; ?>/js/apprise/apprise-1.5.full.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>css/<?php echo $website_css_dir; ?>/js/jquery.placeholder.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>css/<?php echo $website_css_dir; ?>/js/slides.min.jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>css/<?php echo $website_css_dir; ?>/js/news_ticker/jquery.ticker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>css/<?php echo $website_css_dir; ?>/js/jQuery.Validate.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url();?>css/<?php echo $website_css_dir; ?>/js/global.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>css/<?php echo $website_css_dir; ?>/js/date.js"></script>
</head>
<?php $this->load->view('admin/includes/dropdowns'); ?>

<body class="has-side" >
	<!--top-sep-->
	<div id="top-sep"></div>
	<!--/top-sep-->
	<!--header-->
	<div id="header">
		<!--content-->
		<div class="content">
			<!--logo-->
			<a href="<?php echo base_url().$this->lang->lang(); ?>" class="logo"></a>
			<!--/logo-->
			<!--sg-->
			<div class="sg">
				<a href="<?php echo base_url().$this->lang->lang(); ?>/contact" class="email" title="Contact Giza Systems"></a>
				
<script>
function PopupMapImage(pageURL, title,w,h) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=1, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}
</script>


				
				<a class="map" href='javascript:void(0)' onclick="PopupMapImage('<?php echo base_url(); ?>/images/map.jpg' , '',800,540);"></a>
				<a href="javascript:bookmarksite('Giza%20Systems',%20'http://www.gizasystems.com')" class="favorites" title="Bookmark Giza Systems" ></a>
				<a href="#" class="download" title="Downloads"></a>
				<a href="#" class="rss" title="RSS Feeds"></a>
				<a href="http://www.linkedin.com/company/28195?trk=tyah" class="linkedin" title="Giza Systems on LinkedIn"></a>
				<a href="http://twitter.com/giza_systems" class="twitter" title="Follow Giza Systems on Twitter"></a>
				<a href="http://www.facebook.com/pages/Giza-Systems/107442189334877" class="facebook" title="Giza Systems on Facebook"></a>
				<a href="http://www.youtube.com/user/gizamarketing" class="youtube" title="Giza Systems on YouTube"></a>
			</div>
			<!--/sg-->
			<!--search-->
			<div class="search">
				<form action="#" method="get">
					<input type="text" value="" name="public_search_keyword" id="public_search_keyword" placeholder="Search Giza Systems" />
					<a href="javascript:void()" onclick="window.location='<?php echo base_url().$this->lang->lang(); ?>/search/table?keyword='+window.document.getElementById('public_search_keyword').value" class="submit"></a>
					<div class="clear"></div>
					<a href="<?php echo base_url().$this->lang->lang(); ?>/search/advanced" class="advanced"><?php echo lang('advanced_search');?></a>
					<div class="clear"></div>
				</form>
			</div>
			<!--/search-->
		</div>
		<!--/content-->
	</div>
	<!--/header-->
	<!--nav-->
	<div id="nav">
		<div class="menu">
			<a href="<?php echo base_url().$this->lang->lang();?>" class="home"></a>
			
			
			<?php 
						
			foreach($main_menu_links as $main_menu_link) {
			$link_id=$main_menu_link->id;
			$link_controller_name=$main_menu_link->controller_name;
			$link_alias=$main_menu_link->alias;
			
			if($link_alias=='') {
				$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name;
			} else {
				$full_link_url=base_url().$this->lang->lang().'/'.$link_controller_name.'/content/'.$link_alias;
			}
			
			if($this->lang->lang()=='ar') {
				$link_title=$main_menu_link->title_ar;
			} else {
				$link_title=$main_menu_link->title;
			}
			
			$link_style=$main_menu_link->style;
			
			
			//-- To color the current menu.
			$current_style='';
			if(isset($side_menu_rows)) {
				
				if(count($side_menu_rows)>0){
					
				$parent_id=$side_menu_rows[0]->parent_id;
				$current_link_id=$side_menu_rows[0]->id;
				
					if($parent_id==$link_id) {
						$current_style='color: #00A4E4';
					}
				}
			} else {
				$current_url=current_url();
				$current_url=str_replace('index.php','',$current_url);
				$current_url=urldecode($current_url);
				$current_url= end(explode('/', $current_url));
						
				if($link_id==1 && $current_url=='About Giza Systems') {
					$current_style='color: #00A4E4';
				}
				if($link_id==2 && $current_url=='industry') {
					$current_style='color: #00A4E4';
				}
				if($link_id==3 && $current_url=='solution') {
					$current_style='color: #00A4E4';
				}
				if($link_id==4 && $current_url=='Corporate Profile') {
					$current_style='color: #00A4E4';
				}
				if($link_id==24 && $current_url=='career') {
					$current_style='color: #00A4E4';
				}
			}
			
			
			echo "
			<div class='item' style='$link_style'>
			<a href='$full_link_url' class='item' style='$current_style'>$link_title</a>
			";			
			
			
			//-------------------- Childs ----------------------------------------------
			$menu_link_childs=$this->Menu_link_model->get_all_child($link_id);
			$menu_link_childs_count=count($menu_link_childs);
			if($menu_link_childs_count>0) {
				echo"<div class='sub'>";
				foreach($menu_link_childs as $menu_link_child) {
				$child_link_id=$menu_link_child->id;
				$child_link_controller_name=$menu_link_child->controller_name;
				$child_link_alias=$menu_link_child->alias;
				
				
				$child_link_icon=base_url().$menu_link_child->icon;
				
				if($link_controller_name=='career') {
					if($child_link_controller_name!='page') {
						$child_full_link_url=base_url().$this->lang->lang().'/'.$child_link_controller_name.'/'.$child_link_alias;
					} else {
						if($child_link_alias=='') {
							$child_full_link_url=base_url().$this->lang->lang().'/'.$child_link_controller_name;
						} else {
							$child_full_link_url=base_url().$this->lang->lang().'/'.$child_link_controller_name.'/content/'.$child_link_alias;
						}
					}
					
				} else {
					if($child_link_alias=='') {
						$child_full_link_url=base_url().$this->lang->lang().'/'.$child_link_controller_name;
					} else {
						$child_full_link_url=base_url().$this->lang->lang().'/'.$child_link_controller_name.'/content/'.$child_link_alias;
					}
				}
				
				if($this->lang->lang()=='ar') {
					$child_link_title=$menu_link_child->title_ar;
				} else {
					$child_link_title=$menu_link_child->title;
				}
					
				if($menu_link_child->icon=='') {	
					echo"<a href='$child_full_link_url' class='sub'><span>$child_link_title</span></a>";
				} else {
					echo"<a href='$child_full_link_url' class='sub'><span><img src='$child_link_icon' alt='' />$child_link_title</span></a>";
	
				}
				}
				echo"</div>";
			}
			//--------------------------------------------------------------------------
			
			
			echo"</div>";
			}
			?>
			
			
			
			
			
	</div>
	</div>
	<!--/nav-->
	
	
	<?php 
	if(isset($banner_file_selected)) {
		$extension = end(explode('.', $banner_file_selected));
		if($extension=='swf') {	
			$embed_height='';
			$file_flash_name= end(explode('/', $banner_file_selected));
			
			if($file_flash_name=='giza_main_banner.swf') {
				$embed_height='575';
			} else if($file_flash_name=='1363963959.swf') {
				$embed_height='373';
			} else if($file_flash_name=='giza_Industries_slide.swf') {
				$embed_height='575';
			}
	?>
	<!--flash-banner-->
	<div id="banner" class="flash-banner">
		<embed src="<?php echo $banner_file_selected; ?>" FlashVars="page=" quality="high" wmode="transparent" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="100%" height="<?php echo $embed_height;?>"></embed>
		<!-- 
		<embed src="<?php echo $banner_file_selected; ?>" FlashVars="page=" quality="high" wmode="transparent" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="100%" height="575"></embed>
		 -->
	</div>
	<!--/flash-banner-->
	<?php 
		} else {
						
	?>
	
	<!-- By Gouda -->
	<style>
	#banner.sub-page-banner{
	background: transparent url("../images/sub_page_banner_bg.png") repeat-x scroll left top;
	height: 235px;
	}
	#banner.sub-page-banner .g-header{
	background: transparent url("<?php echo $banner_file_selected; ?>") no-repeat scroll center top;
	height: 235px;
	}
	</style>
	<!-- Gouda -->
	
	<!--banner-->
	<div id="banner" class="sub-page-banner">
	<div class="g-header"></div>
	</div>
	<!--/banner-->
	<?php 
		}
	} else {
	?>
	<style>
	#banner.sub-page-banner{
	background: transparent url("../images/sub_page_banner_bg.png") repeat-x scroll left top;
	height: 235px;
	}
	#banner.sub-page-banner .g-header{
	background: transparent url("<?php echo base_url()."/added/uploads/banner/default/banner.png"; ?>") no-repeat scroll center top;
	height: 235px;
	}
	</style>
	
	<!--banner-->
	<div id="banner" class="sub-page-banner">
	<div class="g-header"></div>
	</div>
	<!--/banner-->
	<?php 
	}
	?>
	
	
	
<?php 
/**
 * Set array for visited links.
 */

/**
 * Tripleg object.
 * 
 * Intialize object from Tripleg controller class.
 * @var object.
 */
$this->load->controller('Tripleg');
$tripleg_object= new Tripleg();

$url=current_url();
$url=str_replace('index.php','',$url);	
//$url=str_replace('en','',$url);	
//$url=str_replace('ar','',$url);	

session_start();
//unset($_SESSION["visited_links"]);
if(!isset($_SESSION["visited_links"])) {
$_SESSION["visited_links"] = array();
}
is_array($_SESSION["visited_links"]) or $_SESSION["visited_links"] = array();
if(trim($url)!=base_url() && !in_array($url, $_SESSION['visited_links'])){
$_SESSION['visited_links'][] = $url;
}
$_SESSION["visited_links"] = array_slice($_SESSION["visited_links"], -5);


?>	
	
	