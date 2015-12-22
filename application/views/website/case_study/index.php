<?php $this->load->view('website/includes/header'); ?>
<?php require_once getcwd().'/css/old/header.php';?>


<?php 
$dropdowns= new Dropdowns();
?>

	<!--container-->
	
	<div id="container" >
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
				
				if(isset($alias_industry)) {
					if($menu_alias==$alias_industry) {
						$lnk_class="parent current";
					} else {
						$lnk_class="parent";
					}
				} else {
					$lnk_class="parent";
				}
				
				/*
				echo"
				<a href='$menu_homebox_content_fullurl' class='$lnk_class'>$menu_title</a>
					";
				*/
				
				$menu_industry_row=$this->Industry_model->get_by_alias($menu_alias);
				if(count($menu_industry_row)>0) {
					
					$industry_id=$menu_industry_row->id;
				
					$industry_subs=$this->Industry_sub_model->get_all_by_industry_id('',$industry_id);
					if(count($industry_subs)>0) {
						
						$sub_style='';
					
						if(isset($alias_industry)) {
							if($menu_alias==$alias_industry) {
								$sub_style="style='display: block;'";
								
								
								//echo "<div class='sub' $sub_style>";
						
						foreach($industry_subs as $industry_sub) {
							$industry_sub_alias=$industry_sub->alias;
							if($this->lang->lang()=='ar') {
								$industry_sub_title=$industry_sub->title_ar;
							} else {
								$industry_sub_title=$industry_sub->title;
							}
							$full_industry_sub_fullurl=base_url().$this->lang->lang().'/industry/content/'.$menu_alias.'/'.$industry_sub_alias;
							
							//echo "<a href='$full_industry_sub_fullurl'>$industry_sub_title</a>";
							echo "<a href='$full_industry_sub_fullurl' class='parent'>$industry_sub_title</a>";
							
						}
						
						echo "<a href='".base_url().$this->lang->lang()."/industry/casestudy/$industry_id' class='parent'>".lang('case_studies')."</a>";
						
						
						//echo "</div>";
								
							}
						} 
					
						
						
					}
				}					
				
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
					<div class="hint"></div>
					<h1><?php echo $this->lang->line('case_studies'); ?></h1>
					<div class="main-body">
								
                                    <table width="100%" align="center" cellspacing="0" cellpadding="0" style="text-align:left; padding:0px; padding-top:10px;">

<tr>

    <td colspan="2" valign="top" style="background:url('<?php echo base_url();?>css/old/images/filter_bg.png') no-repeat top center; background-size:100%; height:38px; width:790px; padding:4px; margin:0px;">

        <table width="100%" align="center" cellspacing="0" style="text-align:left; padding:0px; margin:0px;">

            <tr>

                <td width="10"></td>

                <td valign="middle" align="center">

                    <?php $dropdowns->drpdwn_industry($this, '','industry_id', 'style="width:150px; border: 1px solid #A8ACAD; color: #727272; height: 22px;"'); ?>
                    

                </td>

                <td valign="middle" align="center">

				<?php $dropdowns->drpdwn_solution($this, '','solution_id','style="width:200px; border: 1px solid #A8ACAD; color: #727272; height: 22px;"'); ?>
                    

                </td>

                <td valign="middle" align="center">

                    <?php $dropdowns->drpdwn_client($this, '','client_id','style="width:200px; border: 1px solid #A8ACAD; color: #727272; height: 22px;"'); ?>


                </td>

                <td style="padding:0px; margin:0px; padding-right:10px;" align="right" valign="top">

                    <img src="<?php echo base_url();?>css/old/images/filter_btn.png" border="0" align="top" height="27" style="cursor:pointer; cursor:hand;"

                    onclick="window.location='<?php echo base_url().$this->lang->lang(); ?>/casestudy/index?industry_id='+window.document.getElementById('industry_id').options[window.document.getElementById('industry_id').selectedIndex].value+'&solution_id='+window.document.getElementById('solution_id').options[window.document.getElementById('solution_id').selectedIndex].value+'&client_id='+window.document.getElementById('client_id').options[window.document.getElementById('client_id').selectedIndex].value; "

                     />

                </td>

            </tr>

        </table>

        

    </td>

</tr>

<tr><td height="10"></td></tr>

<?php 
foreach($case_study_rows as $case_study_row) {
	
	$case_study_id=$case_study_row->id;
	$case_study_alias=$case_study_row->alias;
	if($this->lang->lang()=='ar') {
		$case_study_title=$case_study_row->title_ar;
	} else {
		$case_study_title=$case_study_row->title;
	}
?>

<tr>

    <td class="bullet"></td>

    <td align="left" valign="middle" style="padding:0px; margin:0px; padding-bottom:0px;">

        <a href="<?php echo base_url().$this->lang->lang(); ?>/casestudy/content/<?php echo $case_study_alias;?>" style="text-decoration:none;">

        <font style="color:#00a4e4; font-size:14px;"><?php echo $case_study_title; ?></font>

        </a>

    </td>

</tr>

<tr><td height="10"></td></tr>

<?php 
}
?>

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
	