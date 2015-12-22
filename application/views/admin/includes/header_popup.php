<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
	<link id="bs-css" href="<?php echo base_url();?>css/admin/css/bootstrap-cerulean.css" rel="stylesheet" />
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	
	<link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
	
	
	<link href="<?php echo base_url();?>css/admin/css/bootstrap-responsive.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>css/admin/css/charisma-app.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>css/admin/css/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
	<link href='<?php echo base_url();?>css/admin/css/fullcalendar.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/css/fullcalendar.print.css' rel='stylesheet'  media='print' />
	<link href='<?php echo base_url();?>css/admin/css/chosen.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/css/uniform.default.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/css/colorbox.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/css/jquery.cleditor.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/css/jquery.noty.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/css/noty_theme_default.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/css/elfinder.min.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/css/elfinder.theme.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/css/jquery.iphone.toggle.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/css/opa-icons.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>css/admin/css/uploadify.css' rel='stylesheet' />


	<!-- The fav icon -->
	<link rel="shortcut icon" href="<?php echo base_url();?>css/admin/img/favicon.ico">
		
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
				<a class="brand" href="http://www.gizasystems.com/"> <span><?php echo lang('admin_panel_title');?></span></a>
				
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
				
				
				
				
			</div>
		</div>
	</div>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
		
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			