<?php if($this->lang->lang()=='ar') {
	$admin_css_dir='css_rtl';
	$html_dir='rtl';
} else {
	$admin_css_dir='css';
	$html_dir='ltr';
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php echo $html_dir; ?>">
<head>
	<!--
		Charisma v1.0.0

		Copyright 2012 Muhammad Usman
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0

		http://usman.it
		http://twitter.com/halalit_usman
	-->
	<meta charset="utf-8">
	<title><?php echo lang('admin_panel_title');?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->
	<link id="bs-css" href="<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/bootstrap-cerulean.css" rel="stylesheet" />
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	
	<link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
	
	
	<link href="<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/bootstrap-responsive.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/charisma-app.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/fullcalendar.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/fullcalendar.print.css' rel='stylesheet'  media='print' />
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/chosen.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/uniform.default.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/colorbox.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/jquery.cleditor.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/jquery.noty.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/noty_theme_default.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/elfinder.min.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/elfinder.theme.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/jquery.iphone.toggle.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/opa-icons.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/uploadify.css' rel='stylesheet' />


	<!-- The fav icon -->
	<link rel="shortcut icon" href="<?php echo base_url();?>/images/giza_logo_admin_panel.png">
		
	<script type='text/javascript'  src='<?php echo base_url();?>js/includes/jquery.js' > </script>
		
		
		
</head>

<?php $this->load->view('admin/includes/dropdowns'); ?>


<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="http://www.gizasystems.com/"> 
				<!-- 
				<span><?php echo lang('admin_panel_title');?></span>
				 -->
				 <img src="<?php echo base_url();?>/images/giza_logo_admin_panel.png" alt="" style="height: 45px; width: 110px"/>
				</a>
				
				<!-- theme selector starts -->
				<!-- 
				<div class="btn-group pull-right theme-container" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-tint"></i><span class="hidden-phone"> Change Theme / Skin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" id="themes">
						<li><a data-value="classic" href="#"><i class="icon-blank"></i> Classic</a></li>
						<li><a data-value="cerulean" href="#"><i class="icon-blank"></i> Cerulean</a></li>
						<li><a data-value="cyborg" href="#"><i class="icon-blank"></i> Cyborg</a></li>
						<li><a data-value="redy" href="#"><i class="icon-blank"></i> Redy</a></li>
						<li><a data-value="journal" href="#"><i class="icon-blank"></i> Journal</a></li>
						<li><a data-value="simplex" href="#"><i class="icon-blank"></i> Simplex</a></li>
						<li><a data-value="slate" href="#"><i class="icon-blank"></i> Slate</a></li>
						<li><a data-value="spacelab" href="#"><i class="icon-blank"></i> Spacelab</a></li>
						<li><a data-value="united" href="#"><i class="icon-blank"></i> United</a></li>
					</ul>
				</div>
				 -->
				<!-- theme selector ends -->
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> 
						<?php 
						if($this->session->userdata('user_session')) {
							echo $this->session->userdata('user_session')->username;
						}
						?>
						
						</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/user/form/<?php echo $this->session->userdata('user_session')->id;?>/edit"><?php echo lang('lnk_profile');?></a></li>
						<li class="divider"></li>
						<li><a href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/user/logout"><?php echo lang('lnk_logout');?></a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
				<div class="top-nav nav-collapse">
					<ul class="nav">
						<li><a href="<?php echo base_url();?>" target="_blank"><?php echo lang('lnk_visit_site');?></a></li>
						<li>
						<!-- 
							<form class="navbar-search pull-left">
								<input placeholder="Search" class="search-query span2" name="query" type="text">
							</form>
						-->
						<?php if($this->lang->lang()=='ar') {?>
						<li><a href="<?php echo base_url().$this->lang->lang();?>/tripleg/language/en">English</a></li>
						<?php } else {?>
						<li><a href="<?php echo base_url().$this->lang->lang();?>/tripleg/language/ar">عربى</a></li>
						<?php }?>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet"><?php echo lang('main_menu');?></li>
						<!-- 
						<li><a class="ajax-link" href="index.html"><i class="icon-home"></i><span class="hidden-tablet"> Dashboard</span></a></li>
						<li><a class="ajax-link" href="ui.html"><i class="icon-eye-open"></i><span class="hidden-tablet"> UI Features</span></a></li>
						<li><a class="ajax-link" href="form.html"><i class="icon-edit"></i><span class="hidden-tablet"> Forms</span></a></li>
						<li><a class="ajax-link" href="chart.html"><i class="icon-list-alt"></i><span class="hidden-tablet"> Charts</span></a></li>
						<li><a class="ajax-link" href="typography.html"><i class="icon-font"></i><span class="hidden-tablet"> Typography</span></a></li>
						<li><a class="ajax-link" href="gallery.html"><i class="icon-picture"></i><span class="hidden-tablet"> Gallery</span></a></li>
						<li class="nav-header hidden-tablet">Sample Section</li>
						<li><a class="ajax-link" href="table.html"><i class="icon-align-justify"></i><span class="hidden-tablet"> Tables</span></a></li>
						<li><a class="ajax-link" href="calendar.html"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span></a></li>
						<li><a class="ajax-link" href="grid.html"><i class="icon-th"></i><span class="hidden-tablet"> Grid</span></a></li>
						<li><a class="ajax-link" href="file-manager.html"><i class="icon-folder-open"></i><span class="hidden-tablet"> File Manager</span></a></li>
						<li><a href="tour.html"><i class="icon-globe"></i><span class="hidden-tablet"> Tour</span></a></li>
						<li><a class="ajax-link" href="icon.html"><i class="icon-star"></i><span class="hidden-tablet"> Icons</span></a></li>
						<li><a href="error.html"><i class="icon-ban-circle"></i><span class="hidden-tablet"> Error Page</span></a></li>
						<li><a href="login.html"><i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span></a></li>
						 -->
				<?php $this->load->model('screen_model'); ?>
<?php 
$screen_model = new Screen_model();
$screen_modules=$screen_model->get_all_module();

foreach ($screen_modules as $module)
{
	$module_id=$module->id;
	if($this->lang->lang()=='ar')
	{
		$module_name=$module->name_ar;
	}
	else
	{
		$module_name=$module->name;
	}
	$module_url=base_url().$this->lang->lang().'/'.ADMIN.'/'.$module->url;
	echo"						<li><a class='ajax-link' href='$module_url'><span class='hidden-tablet'> $module_name</span></a></li>";

	$screen_screens=$screen_model->get_all_screen($module_id);
	$count_screens=count($screen_screens);
	if($count_screens>0)
	{
		echo"<ul>";
	
		foreach ($screen_screens as $screen)
		{
			if($this->lang->lang()=='ar')
			{
				$screen_name=$screen->name_ar;
			}
			else
			{
				$screen_name=$screen->name;
			}
			$screen_url=base_url().$this->lang->lang().'/'.ADMIN.'/'.$screen->url;
			
			//echo"<li ><a href='$screen_url'>$screen_name</a></li>";
		}
		echo"</ul>";
	}
   echo"</li>";
}
?>   
				
						 
					</ul>
					<label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<?php 
					global $URI;
					/*
					if(isset($URI->segment(2)) && isset($URI->segment(3)))
					{
					*/
						$screen_url=$URI->segment(3);
					/*	
					}
					else
					{
						$screen_url='';
					}
					*/
					$module_id=$screen_model->get_module_id_by_url($screen_url);
					if($module_id==0)
					$module_id=$screen_model->get_module_id_by_url($screen_url);
					
					$screen_screens=$screen_model->get_all_screen($module_id);
					$count_screens=count($screen_screens);
					if($count_screens>0)
					foreach ($screen_screens as $screen)
					{
					if($this->lang->lang()=='ar')
					{
						$screen_name=$screen->name_ar;
					}
					else
					{
						$screen_name=$screen->name;
					}
					$screen_url=base_url().$this->lang->lang().'/'.ADMIN.'/'.$screen->url;
					
					echo"<li><a href='$screen_url'>$screen_name</a> <span class='divider'>/</span></li>";
					}
					?>
										
					
				</ul>
			</div>