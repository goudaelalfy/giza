<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo lang('title')?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/admin/style.css" />
<script type="text/javascript" src="<?php echo base_url();?>css/admin/clockp.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>css/admin/clockh.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>css/admin/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>css/admin/ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>

<script type="text/javascript" src="<?php echo base_url();?>css/admin/jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>

<script language="javascript" type="text/javascript" src="<?php echo base_url();?>css/admin/niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>css/admin/niceforms-default.css" />

<script type='text/javascript'  src='<?php echo base_url();?>js/includes/jquery.js' > </script>


</head>
<body>
<?php $this->load->view('admin/includes/dropdowns'); ?>

<div id="main_container">

	<div class="header">
    <div class="logo"><a href="http://www.gizasystems.com/" target="blank"><img src="<?php echo base_url();?>css/admin/images/giza/giza_logo.png" width="80px" height="58px" alt="" title="" border="0" /></a></div>
    
    <div class="right_header">Welcome Admin | <a href="<?php echo base_url().$this->lang->lang();?>/admin/user/logout" class="logout">Logout</a></div>
    <div id="clock_a"></div>
    </div>
    
    <div class="main_content">
    
                    <div class="menu">
                    <ul>
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
	$module_url=base_url().$this->lang->lang().'/'.$module->url;
	echo"<li><a href='$module_url'>$module_name</a>";

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
			$screen_url=base_url().$this->lang->lang().'/'.$screen->url;
			
			echo"<li><a href='$screen_url'>$screen_name</a></li>";
		}
		echo"</ul>";
	}
   echo"</li>";
}
?>   
                    
                    
</ul>
</div> 
                    

                
    <div class="center_content">  
    
    
    
<div class="left_content">
    
   <!--              
 <div class="sidebarmenu">
            
            
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
	$module_url=base_url().$this->lang->lang().'/'.$module->url;
	echo"<a class='menuitem submenuheader'  href='$module_url'>$module_name</a>";

	$screen_screens=$screen_model->get_all_screen($module_id);
	$count_screens=count($screen_screens);
	if($count_screens>0)
	{
		echo"<div class='submenu'><ul>";
	
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
			$screen_url=base_url().$this->lang->lang().'/'.$screen->url;
			
			echo"<li><a href='$screen_url'>$screen_name</a></li>";
		}
		echo"</ul>";
	}
   echo"</div>";
}
?>           
                <!-- 
                <a class="menuitem_green" href="">Green button</a>
                <a class="menuitem_red" href="">Red button</a>
                 
                     
</div>
         -->
              
    
    </div>  
    <div class="right_content">            