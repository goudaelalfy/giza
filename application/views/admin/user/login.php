<?php if($this->lang->lang()=='ar') {
	$admin_css_dir='css_rtl';
	$html_dir='rtl';
} else {
	$admin_css_dir='css';
	$html_dir='ltr';
}
?>

<!DOCTYPE html>
<html  dir="<?php echo $html_dir; ?>">
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
	<link id="bs-css" href="<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
		<link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
	
	
	<link href="<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/charisma-app.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/fullcalendar.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/chosen.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/uniform.default.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/colorbox.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/jquery.cleditor.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/jquery.noty.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/noty_theme_default.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/elfinder.min.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/elfinder.theme.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/opa-icons.css' rel='stylesheet'>
	<link href='<?php echo base_url();?>css/admin/<?php echo $admin_css_dir; ?>/uploadify.css' rel='stylesheet'>


	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="<?php echo base_url();?>css/admin/img/favicon.ico">
		
		<script src="<?php echo base_url();?>js/includes/jquery.validate.js"></script>
		
		<script type='text/javascript'  src='<?php echo base_url();?>js/includes/functions.js' > </script>
		<script type='text/javascript'  src='<?php echo base_url();?>js/admin/user/user.js' > </script>
		
</head>

<body>
		<div class="container-fluid">
		<div class="row-fluid">
		
			<div class="row-fluid">
				<div class="span12 center login-header">
				<!-- 
					<h2><?php echo lang('login_welecome_message');?></h2>
				-->
					<br/>
					<img src="<?php echo base_url();?>/images/giza_logo_admin_panel_large.png" alt="" style="height: 140px; width: 235px "/>
					
				</div><!--/span-->
				<br/><br/><br/><br/><br/><br/>
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info">
					<?php if(isset($login_error)){echo "<div class='error_box_login'>$login_error</div>";} else { ?>
             			<?php echo lang('login_guide_message');?>
						
						<?php }?>
						
					</div>
					<form class="form-horizontal" method="post" name="frm_user_login" id="frm_user_login">
						<fieldset>
							<div class="input-prepend" title="Username" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="username" id="username" type="text" value="admin" />
														<div class="dv_error"  id="dv_username_false" style="display:none;"><?php echo lang('username_false'); ?></div>
							
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="password" id="password" type="password" value="admin123456" />
							
														<div class="dv_error"  id="dv_password_false" style="display:none;"><?php echo lang('password_false'); ?></div>
							
							</div>
							<div class="clearfix"></div>
							<!-- 
							<div class="input-prepend">
							<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>
							</div>
							 -->
							 
							<div class="clearfix"></div>

							<p class="center span5">
							<input type="submit" name="smt_login" id="smt_login" class="btn btn-primary" value="<?php echo lang('btn_login'); ?>" onclick="return validate_login() ">
							</p>
						</fieldset>
					</form>
				</div><!--/span-->
			</div><!--/row-->
			
			<!-- 
			<div class="span12 center login-header">
			<h2><?php echo lang('login_welecome_message');?></h2>
			</div>
			 -->
				</div><!--/fluid-row-->
		
	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<!-- Commented By Gouda, Becouse producing problem. -->
	<!-- 
	<script src="<?php echo base_url();?>css/admin/js/jquery-1.7.2.min.js"></script>
	 -->
	<!-- jQuery UI -->
	<script src="<?php echo base_url();?>css/admin/js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="<?php echo base_url();?>css/admin/js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="<?php echo base_url();?>css/admin/js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="<?php echo base_url();?>css/admin/js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="<?php echo base_url();?>css/admin/js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="<?php echo base_url();?>css/admin/js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="<?php echo base_url();?>css/admin/js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="<?php echo base_url();?>css/admin/js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="<?php echo base_url();?>css/admin/js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="<?php echo base_url();?>css/admin/js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="<?php echo base_url();?>css/admin/js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="<?php echo base_url();?>css/admin/js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="<?php echo base_url();?>css/admin/js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="<?php echo base_url();?>css/admin/js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="<?php echo base_url();?>css/admin/js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='<?php echo base_url();?>css/admin/js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='<?php echo base_url();?>css/admin/js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="<?php echo base_url();?>css/admin/js/excanvas.js"></script>
	<script src="<?php echo base_url();?>css/admin/js/jquery.flot.min.js"></script>
	<script src="<?php echo base_url();?>css/admin/js/jquery.flot.pie.min.js"></script>
	<script src="<?php echo base_url();?>css/admin/js/jquery.flot.stack.js"></script>
	<script src="<?php echo base_url();?>css/admin/js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="<?php echo base_url();?>css/admin/js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="<?php echo base_url();?>css/admin/js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="<?php echo base_url();?>css/admin/js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="<?php echo base_url();?>css/admin/js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="<?php echo base_url();?>css/admin/js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="<?php echo base_url();?>css/admin/js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="<?php echo base_url();?>css/admin/js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="<?php echo base_url();?>css/admin/js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="<?php echo base_url();?>css/admin/js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="<?php echo base_url();?>css/admin/js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="<?php echo base_url();?>css/admin/js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="<?php echo base_url();?>css/admin/js/charisma.js"></script>
	
		
</body>
</html>
