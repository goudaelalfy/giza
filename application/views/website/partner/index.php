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
				
				if($menu_controller_name=='partner') {
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
					<div class="hint"><?php if(isset($parent_link_title)) {echo $parent_link_title;}  ?></div>
					<h1><?php if(isset($title)) {echo $title;} ?></h1>
					
					<div class="main-body">
					<div class="list">
					
					
					<table width="100%" align="center" cellspacing="0" style="text-align:left; padding:0px;">

                                    	<tr>

                                        	<td width="16" height="33" style="border-bottom:1px solid #e4e4e4;"></td>

                                            

                                            <td class="tab_button" id='alphapetical'>

                                               	<font style="font-size:15px;">

                                                	<?php echo lang('alphapetical')?>

                                                </font>

                                            </td>

                                            <td width="11" height="33" style="border-bottom:1px solid #e4e4e4;"></td>

                                            <td class="tab_button" id='industry' style="background:url('<?php echo base_url();?>css/old/images/tab-inactive_wide.png') bottom left no-repeat; color:#585858;">

                                                <font style="font-size:15px;">

                                                	<?php echo lang('industry')?>


                                                </font>

                                            </td>

                                            <td width="11" height="33" style="border-bottom:1px solid #e4e4e4;"></td>

                                            <td class="tab_button" id='solutions' style="background:url('<?php echo base_url();?>css/old/images/tab-inactive_wide.png') bottom left no-repeat; color:#585858;">

                                                <font style="font-size:15px;">

                                                	<?php echo lang('solutions')?>
                                                	

                                                </font>

                                            </td>

                                            <td style="border-bottom:1px solid #e4e4e4;">&nbsp;</td>

                                        </tr>

                                        <tr>

                                        	<td colspan="10" valign="top" height="100" style="border:1px solid #e4e4e4; border-top:0px solid #e4e4e4; padding:0px;">

                                            	<div class="tab_content" id='tabcontent_alphapetical' style="width:100%; border:0px; margin:0px;">

                                                	<table width="100%" align="center" cellspacing="0" style="text-align:left; padding:0px;">

                                                    	<tr><td height="18"></td></tr>

                                                    	<tr>

                                                        	<td valign="middle" align="left" height="33" >

                                                            	<table width="100%" align="left" cellspacing="0" style="text-align:left; padding:0px;">

                                                                	<tr style="background-color: #00a4e4;">

																		<td id="alpha_b" class="subtab_button"></td>
																		
                                                                    	<td id="alpha_a" class="subtab_button" style="color:#ffffff;">A</td>

                                                                        <td id="alpha_b" class="subtab_button">B</td>

                                                                        <td id="alpha_c" class="subtab_button">C</td>

                                                                        <td id="alpha_d" class="subtab_button">D</td>

                                                                        <td id="alpha_e" class="subtab_button">E</td>

                                                                        <td id="alpha_f" class="subtab_button">F</td>

                                                                        <td id="alpha_g" class="subtab_button">G</td>

                                                                        <td id="alpha_h" class="subtab_button">H</td>

                                                                        <td id="alpha_i" class="subtab_button">I</td>

                                                                        <td id="alpha_j" class="subtab_button">J</td>

                                                                        <td id="alpha_k" class="subtab_button">K</td>

                                                                        <td id="alpha_l" class="subtab_button">L</td>

                                                                        <td id="alpha_m" class="subtab_button">M</td>

                                                                        <td id="alpha_n" class="subtab_button">N</td>

                                                                        <td id="alpha_o" class="subtab_button">O</td>

                                                                        <td id="alpha_p" class="subtab_button">P</td>

                                                                        <td id="alpha_q" class="subtab_button">Q</td>

                                                                        <td id="alpha_r" class="subtab_button">R</td>

                                                                        <td id="alpha_s" class="subtab_button">S</td>

                                                                        <td id="alpha_t" class="subtab_button">T</td>

                                                                        <td id="alpha_u" class="subtab_button">U</td>

                                                                        <td id="alpha_v" class="subtab_button">V</td>

                                                                        <td id="alpha_w" class="subtab_button">W</td>

                                                                        <td id="alpha_x" class="subtab_button">X</td>

                                                                        <td id="alpha_y" class="subtab_button">Y</td>

                                                                        <td id="alpha_z" class="subtab_button">Z</td>

                                                                    </tr>

                                                                    <tr>

                                                                    	<td colspan="100" style="padding:10px; margin:0px;">
<?php 
$arr_alpha = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
$arr_alpha_partners = array();
$arr_alpha_partners_index = 0;
foreach($arr_alpha as $index=>$alpha)
{
	$style_display='';
	if($arr_alpha_partners_index!=0) {
		$style_display='display:none;';
	}
	echo "<div class='subtab_content' id='subtabcontent_alpha_$alpha' 
	style='width:100%; border:0px; margin:0px; $style_display'>
 	<table width='100%' align='left' cellspacing='0' style='text-align:left; padding:0px;'>
	";
	
	$partner_rows= $this->Partner_model->get_by_name_like($alpha);
	
	foreach($partner_rows as $partner_row)
	{
		$partner_id=$partner_row->id;
		$partner_name=$partner_row->name;
		
		echo "
		<tr>
		<td class='bullet'></td>
		<td style='color: #4a4a4a;'>$partner_name</td>
		
		<td width='200'>
		<!--
		<a href='".base_url().$this->lang->lang()."/casestudies/$partner_id' style='text-decoration:none;' class='link'>".lang('case_studies')."</a>
		--> 
		</td>
		
		</tr>
		";
		
		
	}
	echo "
	</table>
	</div>
	";
	
	$arr_alpha_partners_index++;
}




?>
                                                                        	  

                                                                        </td>

                                                                    </tr>

                                                                </table>

                                                            </td>

                                                        </tr>

                                                    </table>
					 </div>

                                                <div class="tab_content" id='tabcontent_industry' style="width:100%; border:0px; margin:0px; display:none;">

                                                	<table width="100%" align="center" cellspacing="0" style="text-align:left; padding:0px;">

                                                    	<tr><td height="18"></td></tr>

                                                    	<tr>

                                                        	<td valign="middle" align="left" height="33" >

                                                            	<table width="100%" align="left" cellspacing="0" style="text-align:left; padding:0px;">

                                                                	<tr style="background-color: #00a4e4;">
<?php 
if(isset($industry_rows)) {
	$counter_loop=0;
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
				//$banner_file_selected=base_url().$industry_row->banner_file_selected;
				
				
				$style='';
				if($counter_loop==0) {
					$style="style='color:#ffffff;'";
				}
				$counter_loop++;
				 echo "<td id='industry_$industry_id' class='subtabindustry_button' $style> $title </td>";

?>
<?php
 }
}
?>

                                                                    </tr>

                                                                    <tr>

                                                                    	<td colspan="100" style="padding:10px; margin:0px;">



<?php 

$counter_loop=0;
foreach($industry_rows as $industry_row) {
$industry_id=$industry_row->id;
if($this->lang->lang()=='ar') {
	$industry_title=$industry_row->title_ar;
} else {
	$industry_title=$industry_row->title;
}


?>

                                                                        	<div class="subtabindustry_content" 

                                                                            	id='subtabindustrycontent_industry_<?php echo $industry_id;?>' 

                                                                            	style="width:100%; border:0px; margin:0px; <?php if($counter_loop!=0) {?>display:none; <?php }?>">

                                                                                <table width="100%" align="left" cellspacing="0" style="text-align:left; padding:0px;">

<?php 
$industry_partner_rows= $this->Partner_model->get_by_industry_id($industry_id);
foreach($industry_partner_rows as $industry_partner_row) {
$partner_id=$industry_partner_row->id;

if($this->lang->lang()=='ar') {
	$partner_name=$industry_partner_row->name_ar;
} else {
	$partner_name=$industry_partner_row->name;
}

?>

                                                                					<tr>

                                                                                    	<td class="bullet"></td>

                                                                                        <td style='color: #4a4a4a;'><?php echo $partner_name; ?></td>
<!-- 
                                                                                        
 -->
                                                                                        <td width="200">
																							<!-- 
                                                                                        	<a href="<?php echo base_url().$this->lang->lang();?>/casestudies/$partner_id" style="text-decoration:none;" class="link"><?php lang('case_studies');?></a>
																							 -->
                                                                                        </td>
<!-- 
                                                                                        
 -->
                                                                                	</tr>

<?php 
}
?>

                                                                                </table>

                                                                            </div>
<?php 
$counter_loop++;
}
?>

                                                                            

                                                                        </td>

                                                                    </tr>

                                                                </table>
					</td>

                                                        </tr>

                                                    </table>
					
					
                                                </div>

                                                <div class="tab_content" id='tabcontent_solutions' style="width:100%; border:0px; margin:0px; display:none;">

                                                	<table width="100%" align="center" cellspacing="0" style="text-align:left; padding:0px;">

                                                    	<tr><td height="18"></td></tr>

                                                    	<tr>

                                                        	<td valign="middle" align="left" height="33" 

                                                            	style="background:url('<?php echo base_url();?>css/old/images/') top left no-repeat; padding:0px; padding-left:10px; margin:0px;">

                                                            	<table width="100%" align="left" cellspacing="0" style="text-align:left; padding:0px;">

                                                                	<tr>
<?php 
if(isset($solution_rows)) {
	
	echo "<tr style='background-color: #00a4e4;'>
	";
	
	$counter_loop=1;
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
				//$banner_file_selected=base_url().$solution_row->banner_file_selected;
				$style='';
				if($counter_loop==1) {
					$style="style='color:#ffffff;'";
				}
				
				$alias_title=urlencode($title);
				
				 echo "<td id='solution_$solution_id' class='subtabsolution_button' $style> $title </td>";

				 if($counter_loop%3==0) {
				 	echo "</tr><tr style='background-color: #00a4e4;'>
				 	";
				 }
				 $counter_loop++;
				
?>
<?php
 }
 
if($counter_loop%3==2) {
	echo "<td></td><td></td></tr>";
}
if($counter_loop%3==1) {
		echo "</tr>";
}
if($counter_loop%3==0) {
		echo "<td></td></tr>";
}
}
?>
 

                                                                    </tr>

                                                                    <tr>

                                                                    	<td colspan="100" style="padding:10px; margin:0px;">
<?php 

$counter_loop=0;
foreach($solution_rows as $solution_row) {
$solution_id=$solution_row->id;
if($this->lang->lang()=='ar') {
	$solution_title=$solution_row->title_ar;
} else {
	$solution_title=$solution_row->title;
}

$alias_solution_title=urlencode($solution_title);
?>
 	<div class="subtabsolution_content" 

                                                                            	id='subtabsolutioncontent_solution_<?php echo $solution_id;?>' 

                                                                            	style="width:100%; border:0px; margin:0px; <?php if($counter_loop!=0) {?>display:none; <?php }?>">

                                                                                <table width="100%" align="left" cellspacing="0" style="text-align:left; padding:0px;">

<?php 
$solution_partner_rows= $this->Partner_model->get_by_solution_id($solution_id);
foreach($solution_partner_rows as $solution_partner_row) {
$partner_id=$solution_partner_row->id;

if($this->lang->lang()=='ar') {
	$partner_name=$solution_partner_row->name_ar;
} else {
	$partner_name=$solution_partner_row->name;
}

?>
                                                                					<tr>

                                                                                    	<td class="bullet"></td>

                                                                                        <td style='color: #4a4a4a;'><?php echo $partner_name; ?></td>
<!-- 
                                                                                        
 -->
                                                                                        <td width="200">
																						<!-- 
                                                                                        	<a href="<?php echo base_url().$this->lang->lang();?>/casestudies/$partner_id" style="text-decoration:none;" class="link"><?php lang('case_studies');?></a>
																						 -->
                                                                                        </td>
<!-- 
                                                                                        
 -->
                                                                                	</tr>
<?php 
}
?>

                                                                                </table>

                                                                            </div>
<?php 
$counter_loop++;
}
?>

                                                                        </td>

                                                                    </tr>

                                                                </table>

                                                            </td>

                                                        </tr>

                                                    </table>

                                                </div>

                                            </td>

                                        </tr>

                                    </table>
					
					
					</div>
					
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
	