<?php $this->load->view('website/includes/header'); ?>

<?php require_once getcwd().'/css/old/header.php';?>
<script type="text/javascript">

 function checkUncheckIndustries() 
 {	
	 	{
	    	for (var i = 0; i < document.frm_advanced_search.elements.length; i++ ) 
		    {
		    	var check_id=document.frm_advanced_search.elements[i].id;
		    	check_id=check_id.substring(0, 3);

		        if (document.frm_advanced_search.elements[i].type == 'checkbox' && check_id=='ind') 
			    {		        		    
		        	document.frm_advanced_search.elements[i].checked = document.frm_advanced_search.elements['industries'].checked; 
		        }

	    	}
	 	}
}
function checkUncheckSolutions() 
 {	
	 	{
	    	for (var i = 0; i < document.frm_advanced_search.elements.length; i++ ) 
		    {
		    	var check_id=document.frm_advanced_search.elements[i].id;
		    	check_id=check_id.substring(0, 3);

		        if (document.frm_advanced_search.elements[i].type == 'checkbox' && check_id=='sol') 
			    {		        		    
		        	document.frm_advanced_search.elements[i].checked = document.frm_advanced_search.elements['solutions'].checked; 
		        }

	    	}
	 	}
}
 
 function checkUncheckMedias() 
 {	
	 	{
	    	for (var i = 0; i < document.frm_advanced_search.elements.length; i++ ) 
		    {
		    	var check_id=document.frm_advanced_search.elements[i].id;
		    	check_id=check_id.substring(0, 5);

		        if (document.frm_advanced_search.elements[i].type == 'checkbox' && check_id=='media') 
			    {		        		    
		        	document.frm_advanced_search.elements[i].checked = document.frm_advanced_search.elements['medias'].checked; 
		        }

	    	}
	 	}
}									 									
</script>



<!--container-->
<div id="container"><!--content-->
<div class="content"><!--side-bar-->
<div id="side-bar"><!--main-block-->
<div class="main-block"><?php 
if(isset($side_menu_rows)) {
	foreach($side_menu_rows as $side_menu_row) {
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

		if($menu_controller_name=='award') {
			$lnk_class="parent current";
		} else {
			$lnk_class="parent";
		}

		echo"
				<a href='$menu_homebox_content_fullurl' class='$lnk_class'>$menu_title</a>
					";
	}
}
?></div>
<!--/main-block--> <!--block-->
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
}?></div>
<!--/block--> <!--block-->
<div class="block">
<div class="title"><?php echo lang('of_further_interest')?></div>
<a href="#" class="parent">Careers</a> <a href="#" class="parent">Power
- Case Studies</a> <a href="#" class="parent">Power - Case Studies</a> <a
	href="#" class="parent">Water - Case Studies</a></div>
<!--/block--></div>
<!--/side-bar--> <!--main-->
<div id="main">
<div class="main-title">
<div class="hint"><?php if(isset($parent_link_title)) {echo $parent_link_title;}  ?></div>
<h1><?php if(isset($title)) {echo $title;} ?></h1>

<div class="main-body">
<div class="list content_font" style="padding: 10px;">


<form name="frm_advanced_search" id="frm_advanced_search" action="<?php echo base_url().$this->lang->lang(); ?>/search/advancedResult" method="get">
<table width="100%" align="center" cellspacing="0" cellpadding="0"
	style="text-align: left;">
	<tr>
		<td style="text-align: left; width: 150px;" valign="top"><font
			style="color: #00a4e4; font-size: 12pt;"><?php echo lang('search_keyword');?></font></td>
		<td style="text-align: left"><font
			style="color: #00a4e4; font-size: 14pt;"> <input type="text"
			name="keyword" id="keyword" class="styleinput" /></font></td>
	</tr>
	<tr>
		<td height="20"></td>
	</tr>

	<tr>


		<td style="text-align: left; width: 90px;" valign="top"><font
			style="color: #00a4e4; font-size: 12pt;"><?php echo lang('search_inside');?></font></td>
		<td style="text-align: left">
		<div style="float: left; width: 100%"><input type="checkbox"
			name="general" id="general" value="general"
			onclick="javascript:check(this.value);" /> <?php echo lang('general');?>
		<div style="height: 7px; clear: both"></div>
		<input type="checkbox" name="careers" id="careers" value="careers"
			onclick="javascript:check(this.value);" /> <?php echo lang('careers');?>
		<div style="height: 7px; clear: both"></div>
		<input type="checkbox" name="casestudies" id="casestudies"
			value="casestudies" onclick="javascript:check(this.value);" /> <?php echo lang('case_studies');?></div>
		<div style="height: 10px; clear: both"></div>
		<div style="float: left; width: 100%">
		<div style="float: left; width: 20%;">&nbsp;&nbsp;<?php echo lang('industries');?></div>
		<div style="float: left; width: 80%">
		<div
			style="float: left; width: 350px; height: 200px; border: 1px solid #c1c1c1; overflow: scroll; background: #fff; overflow-x: hidden;">
		<div
			style="float: left; width: 100%; height: 20px; background: #f3f3f3; padding: 5px;">
		<input type="checkbox" name="industries" id="industries" value="0"
			checked="checked" onclick="checkUncheckIndustries()" /><?php echo lang('all_industries');?>
		</div>
		
		<div
			style="float: left; width: 100%; height: 25px; padding: 5px;">
<?php 
	if(isset($industry_rows)) {

			foreach($industry_rows as $industry_row) {
				$industry_id=$industry_row->id;
				if($this->lang->lang()=='ar') {
					$title=$industry_row->title_ar;
					$seo_words=$industry_row->seo_words_ar;
					//$brief=$industry_row->brief_ar;
					//$body=$industry_row->body_ar;
				} else {
					$title=$industry_row->title;
					$seo_words=$industry_row->seo_words;
					//$brief=$industry_row->brief;
					//$body=$industry_row->body;
				}
		echo "  <input type='checkbox' style=' padding: 5px;'
			name='industry[]' id='industry[]'
			value='$industry_id'
			onclick='javascript:document.getElementById(\"industries\").checked = false;' /> $title<br />
		";
	}
	}
?>
		</div>
		
		</div>
		</div>
		</div>
		<div style="height: 10px; clear: both"></div>
		<div style="float: left; width: 100%">
		<div style="float: left; width: 20%;">&nbsp;&nbsp;<?php echo lang('solutions');?></div>
		<div style="float: left; width: 80%">
		<div
			style="float: left; width: 350px; height: 200px; border: 1px solid #c1c1c1; overflow: scroll; background: #fff; overflow-x: hidden">
		<div
			style="float: left; width: 100%; height: 20px; background: #f3f3f3; padding: 5px;">
		<input type="checkbox" name="solutions" id="solutions" value="0"
			onclick="checkUncheckSolutions()" checked="checked" /><?php echo lang('all_solutions');?></div>
			
			<div
			style="float: left; width: 100%; height: 25px; padding: 5px;">
<?php 
if(isset($solution_rows)) {
	
	foreach($solution_rows as $solution_row) {
		$solution_id=$solution_row->id;
		
				if($this->lang->lang()=='ar') {
					$title=$solution_row->title_ar;
					$seo_words=$solution_row->seo_words_ar;
					//$brief=$solution_row->brief_ar;
					//$body=$solution_row->body_ar;
				} else {
					$title=$solution_row->title;
					$seo_words=$solution_row->seo_words;
					//$brief=$solution_row->brief;
					//$body=$solution_row->body;
				}
		
		echo "<input type='checkbox' style=' padding: 5px;'
			name='solution[]' id='solution[]'
			value='$solution_id'
			onclick='javascript:document.getElementById('solutions').checked = false;' /> $title<br />
		";
		
	}
}
?>		
		</div>
		
		</div>
		</div>
		</div>
		<div style="height: 10px; clear: both"></div>
		<div style="float: left; width: 100%">
		<div style="float: left; width: 20%;">&nbsp;&nbsp;<?php echo lang('media');?></div>
		<div style="float: left; width: 80%">
		<div
			style="float: left; width: 350px; height: 120px; border: 1px solid #c1c1c1; overflow: scroll; background: #fff; overflow-x: hidden">
		<div
			style="float: left; width: 100%; height: 20px; background: #f3f3f3; padding: 5px;">
		<input type="checkbox" name="medias" id="medias" value="me_all"
			checked="checked" onclick="checkUncheckMedias();" /><?php echo lang('all_media');?></div>
			
			<div
			style="float: left; width: 100%; height: 25px; padding: 5px;">
		<input type="checkbox" name="media_galary" id="media_galary"
			value="media_galary"
			onclick="javascript:document.getElementById('medias').checked = false;" /> <?php echo lang('galleries');?> <br/>
		<input type="checkbox" name="media_event" id="media_event"
			value="media_event"
			onclick="javascript:document.getElementById('medias').checked = false;" /> <?php echo lang('events');?> <br/>
		<input type="checkbox" name="media_news" id="media_news"
			value="media_news"
			onclick="javascript:document.getElementById('medias').checked = false;" /> <?php echo lang('news');?> <br/>
		</div>
		
		</div>
		</div>
		</div>
		</td>
	</tr>
	<tr>
		<td height="20"></td>
	</tr>
	<tr>
		<td colspan="2"></td>
		<td align="center" style="width: 90px;"><input
			type="image" src="<?php echo base_url();?>css/old/images/search_btn.png" border="0"
			style="cursor: pointer; cursor: hand;"
			onclick="if(window.document.getElementById('keyword').value == '') {alert('<?php echo lang('search_keyword_required'); ?>.');window.document.getElementById('keyword').focus(); return false;}" />
			<br/><br/>
		</td>
	</tr>
</table>
</form>

</div>
</div>
</div>
</div>
<!--/main-->
<div class="clear"></div>
</div>
<!--/content--></div>
<!--/container-->

<?php $this->load->view('website/includes/footer'); ?>
