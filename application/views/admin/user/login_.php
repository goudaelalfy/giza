<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> ADMIN PANEL | Powered by Giza Systems</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/admin/style.css" />
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

<script type='text/javascript'  src='<?php echo base_url();?>js/includes/functions.js' > </script>
<script type='text/javascript'  src='<?php echo base_url();?>js/admin/user/user.js' > </script>


</head>
<body>
<div id="main_container">

	<div class="header_login">
    <div class="logo"><a href="http://www.gizasystems.com/" target="blank"><img src="<?php echo base_url();?>css/admin/images/giza/giza_logo.png" alt="" title="" border="0" /></a></div>
    
    </div>

     
         <div class="login_form">
         
         <h3><?php echo lang('users_login'); ?></h3>
         <!-- 
         <a href="#" class="forgot_pass">Forgot password</a> 
          -->
         <form action="" method="post" class="niceform">
         
                <fieldset>
                    <dl>
                        <dt><label for="email"><?php echo lang('username'); ?></label></dt>
                        <dd><input type="text" name="username" id="username" size="54" /></dd>
                    </dl>
                    <dl>
                        <dt><label for="password"><?php echo lang('password'); ?></label></dt>
                        <dd><input type="password" name="password" id="password" size="54" /></dd>
                    </dl>
                    
                    <dl>
                        <dt><label></label></dt>
                        <dd>                      
                        
        				<?php if(isset($login_error)){echo "<div class='error_box_login'>$login_error</div>";} ?>
             			
                        </dd>
                    </dl>
                    
                     <dl class="submit">
                     <dd>
                    <input type="submit" name="smt_login" id="smt_login" value="<?php echo lang('btn_login'); ?>" onclick="return validate_login() "/>
                     </dd>
                     </dl>
                    
                </fieldset>
                
         </form>
         </div>  
          
	
    
    <div class="footer_login">
    
    	<div class="left_footer_login"> Powered by <a href="http://www.gizasystems.com/" target="blank">Giza Systems</a></div>
    	<div class="right_footer_login"><a href="http://www.gizasystems.com/" target="blank"><img src="<?php echo base_url();?>css/admin/images/giza/giza_logo.png" alt="" title="" border="0" /></a></div>
    
    </div>

</div>		
</body>
</html>

