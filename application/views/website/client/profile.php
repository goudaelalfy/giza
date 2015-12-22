<?php $this->load->view('website/includes/header'); ?>
<?php echo "<script type='text/javascript'  src='".base_url()."js/website/client/form.js' > </script>";?>

<?php 

/**
 * Variables to store the value from database, to display on screen
 */
$id=				0;
$name='';  
$username='';  
$password='';  
$website='';  
$address='';  
$phone='';  
$industries='';  
$solutions='';  
$brief=''; 
$logo='';  

$project_name='';  
$project_contract_value='';  
$project_duration='';  
$testimony='';  
$feedback='';  				
				


$contact_title='';  
$contact_firstname='';  
$contact_lastname='';  
$contact_position='';  
$contact_mobile='';  
$contact_email=''; 
$interests=array();
$registeration_datetime='';  
$active='';  
$active_code='';



$last_modify_date='';
$are_disabled='';
$readonly='';

/**
 * Mode is varible store the status or the mode of current row, add-edit-view-return, return when wrong occur
 * 
 * @var string
 */
if(isset($current_row))
{
	$id=	$current_row->id;
	$name=$current_row->name;  
	$username=$current_row->username;  
	$password=$current_row->password;  
	$website=$current_row->website;  
	$address=$current_row->address;  
	$phone=$current_row->phone;  
	//$industries=$current_row->industries;  
	//$solutions=$current_row->solutions;  
	$brief=$current_row->brief; 
	$logo=$current_row->logo;  
	
	$project_name=$current_row->project_name;  
	$project_contract_value=$current_row->project_contract_value;  
	$project_duration=$current_row->project_duration;  
	$testimony=$current_row->testimony;  
	$feedback=$current_row->feedback;  

	
	$contact_title=$current_row->contact_title;  
	$contact_firstname=$current_row->contact_firstname;  
	$contact_lastname=$current_row->contact_lastname;  
	$contact_position=$current_row->contact_position;  
	$contact_mobile=$current_row->contact_mobile;  
	$contact_email=$current_row->contact_email; 
	$interests=$current_row->interests;
	//$registeration_datetime=$current_row->registeration_datetime;  
	//$active=$current_row->active;  
	//$active_code=$current_row->active_code;
	
	
	$interests = explode(",", $interests);
	$interests_count  =count($interests);  	
	
}



/**
 * Dropdowns object.
 * 
 * Intialize object from Dropdowns class which contains methods fill all dropdowns of website.
 * @var object.
 */

$dropdowns= new Dropdowns();

/**
 * Client controller object.
 * 
 * Intialize object from Client controller class.
 * @var object.
 */

$this_object= new Client();

?>



	<!--container-->
	
	<div id="container" >
		<!--content-->
		<div class="content">
			<!--side-bar-->
			<div id="side-bar">
				<!--main-block-->
				<!-- 
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
				
				if(isset($current_alias)) {
					if($menu_alias==$current_alias) {
						$lnk_class="parent current";
					} else {
						$lnk_class="parent";
					}
				} else {
					$lnk_class="parent";
				}
				
				echo"
				<a href='$menu_homebox_content_fullurl' class='$lnk_class'>$menu_title</a>
					";
				}
				?>
				 
				</div>
				 -->
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
					<div class="hint"><?php echo $this->lang->line('clients'); ?></div>
					<h1><?php if(isset($title)) {echo $title;} ?></h1>
					<div class="main-body">
						
					
					<!--hr-application-block-->
						<div id="hr-application-block">
							<div class="tabs">
								<div class="list">
									<div class="tab current"><?php echo lang('company_details');?></div>
									<div class="tab"><?php echo lang('project_details');?></div>
									<div class="tab"><?php echo lang('personal_details');?></div>
									<div class="tab"><?php echo lang('area_of_interest');?></div>
								</div>
							</div>
							<div class="form">
								<form name="frm_client_profile" id="frm_client_profile" action="<?php echo base_url().$this->lang->lang();?>/client/save" method="post" enctype='multipart/form-data'>
									<!--group-->
									<div class="group">
										<div class="row">
											<span class="name"><?php echo lang('company_name'); ?> *</span>
											<span class="field"><input type="text" name="name" id="name" value="<?php echo $name; ?>" class="text required" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('website'); ?></span>
											<span class="field"><input type="text" name="website" id="website" value="<?php echo $website; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('address'); ?>  *</span>
											<span class="field"><input type="text" name="address" id="address" value="<?php echo $address; ?>" class="text required" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('telephone'); ?> *</span>
											<span class="field"><input type="text" name="phone" id="phone" value="<?php echo $phone; ?>" class="text digits required" /></span>
											<div class="clear"></div>
										</div>
										
										<div class="row">
											<span class="name"><?php echo lang('industries'); ?> *</span>
											<span class="field main-body empty" style="padding: 0px">
											<?php 
											foreach($industry_rows as $industry_row) {
												$industry_id=$industry_row->id;
												if($this->lang->lang()=='ar') {
													$industry_title=$industry_row->title_ar;
													
												} else {
													$industry_title=$industry_row->title;
												}
												
												$checked='';
												if(isset($client_industries_rows)) {
													foreach ($client_industries_rows as $client_industries_row) {
														$client_industry_id=$client_industries_row->industry_id;
														if($industry_id==$client_industry_id) {
															$checked="checked='checked'";
														}
													}
												}
												echo "<input type='checkbox' id='industries[]' name='industries[]' value='$industry_id' $checked/> $industry_title <br/>";
												
											}
											?>	
											</span>
											<div class="clear"></div>
										</div>
										<div class="clear"></div>
									
										<div class="row">
											<span class="name"><?php echo lang('brief'); ?> *</span>
											<span class="field"><textarea type="text" name="brief" id="brief"  class="required" ><?php echo $brief; ?></textarea></span>
											<div class="clear"></div>
										</div>
										<br/><br/><br/><br/>
										
										 
									</div>	
									<!--/group-->
									
									
									<!--group-->
									<div class="group">
									<div class="row">
											<span class="name"><?php echo lang('project_name'); ?> *</span>
											<span class="field"><input type="text" name="project_name" id="project_name" value="<?php echo $project_name; ?>" class="text required" /></span>
											<div class="clear"></div>
									</div>
									
									<div class="row">
											<span class="name"><?php echo lang('industry_sector'); ?> *</span>
											<span class="field main-body empty" style="padding: 0px">
											<?php 
											foreach($industry_rows as $project_industry_row) {
												$project_industry_id=$project_industry_row->id;
												if($this->lang->lang()=='ar') {
													$project_industry_title=$project_industry_row->title_ar;
													
												} else {
													$project_industry_title=$project_industry_row->title;
												}
												
												$checked='';
												if(isset($client_project_industries_rows)) {
													foreach ($client_project_industries_rows as $client_project_industries_row) {
														$client_project_industry_id=$client_project_industries_row->industry_id;
														if($project_industry_id==$client_project_industry_id) {
															$checked="checked='checked'";
														}
													}
												}
												echo "<input type='checkbox' id='project_industries[]' name='project_industries[]' value='$project_industry_id' $checked/> $project_industry_title <br/>";
												
											}
											?>	
											</span>
											<div class="clear"></div>
									</div>
									<br/><br/><br/><br/><br/>
										
									
									<div class="row">
											<span class="name"><?php echo lang('project_contract_value'); ?></span>
											<span class="field"><input type="text" name="project_contract_value" id="project_contract_value" value="<?php echo $project_contract_value; ?>" class="text" /></span>
											<div class="clear"></div>
									</div>
									
									<div class="row">
											<span class="name"><?php echo lang('project_duration'); ?></span>
											<span class="field"><input type="text" name="project_duration" id="project_duration" value="<?php echo $project_duration; ?>" class="text" /></span>
											<div class="clear"></div>
									</div>
									
									<div class="row">
										<span class="name"><?php echo lang('testimony'); ?> </span>
										<span class="field"><textarea type="text" name="testimony" id="testimony"  ><?php echo $testimony; ?></textarea></span>
										<div class="clear"></div>
									</div>
									<br/><br/><br/><br/><br/>
									
									<div class="row">
										<span class="name"><?php echo lang('feedback'); ?> </span>
										<span class="field"><textarea type="text" name="feedback" id="feedback"  ><?php echo $feedback; ?></textarea></span>
										<div class="clear"></div>
									</div>
									<br/><br/><br/><br/><br/><br/>
										
									<div class="row">
											<span class="name"><?php echo lang('logo'); ?> </span>
											<span class="field"><input type="file" name="logo" id="logo" class="text" /></span>
											<?php if($logo!='') {
												$logo_path=base_url().$logo;
												echo "<img src='$logo_path' title='$logo' width='120px' height='80px'/>";
											}?>
											<div class="clear"></div>
										</div>
										<br/><br/>
									
										
									</div>	
									<!--/group-->
									
									
									
									<!--group-->
									<div class="group">
										<div class="row">
											<span class="name"><?php echo lang('contact_title'); ?>  *</span>
											<span class="field"><input type="text" name="contact_title" id="contact_title" value="<?php echo $contact_title; ?>" class="text required" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('contact_firstname'); ?>  *</span>
											<span class="field"><input type="text" name="contact_firstname" id="contact_firstname" value="<?php echo $contact_firstname; ?>" class="text required" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('contact_lastname'); ?>  *</span>
											<span class="field"><input type="text" name="contact_lastname" id="contact_lastname" value="<?php echo $contact_lastname; ?>" class="text required" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('contact_position'); ?>  *</span>
											<span class="field"><input type="text" name="contact_position" id="contact_position" value="<?php echo $contact_position; ?>" class="text required" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('contact_mobile'); ?>  *</span>
											<span class="field"><input type="text" name="contact_mobile" id="contact_mobile" value="<?php echo $contact_mobile; ?>" class="text digits required" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('contact_email'); ?>  *</span>
											<span class="field"><input type="text" name="contact_email" id="contact_email" value="<?php echo $contact_email; ?>" class="text email required" /></span>
											<div class="clear"></div>
										</div>
									</div>
									<!--/group-->
									<!--group-->
									<div class="group">
										<div class="row">
											<span class="name"><?php echo lang('please_check_all_that_apply'); ?> *</span>
											<span class="field main-body empty" style="padding: 0px">
											
												<input type="checkbox" id="interests[]" name="interests[]" value="Industries" 
												<?php foreach($interests as $interest) { if($interest=='Industries'){echo "checked='checked'";} }?>
												> Industries<br>
                								
                								<input type="checkbox" id="interests[]" name="interests[]" value="Solutions"
                								<?php foreach($interests as $interest) { if($interest=='Solutions'){echo "checked='checked'";} }?>
                								> Solutions<br>
                                                
                                                <input type="checkbox" id="interests[]" name="interests[]" value="New Projects / Awards"
                                                <?php foreach($interests as $interest) { if($interest=='New Projects / Awards'){echo "checked='checked'";} }?>
                                                > New Projects / Awards<br>
                                                
                                                <input type="checkbox" id="interests[]" name="interests[]" value="Receive corporate newsletter"
                                                <?php foreach($interests as $interest) { if($interest=='Receive corporate newsletter'){echo "checked='checked'";} }?>
                                                > Receive corporate newsletter<br>
                                                
                                                <input type="checkbox" id="interests[]" name="interests[]" value="Giza Systems Publications"
                                                <?php foreach($interests as $interest) { if($interest=='Giza Systems Publications'){echo "checked='checked'";} }?>
                                                > Giza Systems Publications<br>
                                                
                                                <input type="checkbox" id="interests[]" name="interests[]" value="CSR projects"
                                                <?php foreach($interests as $interest) { if($interest=='CSR projects'){echo "checked='checked'";} }?>
                                                > CSR projects<br>
                                                
                                                <input type="checkbox" id="interests[]" name="interests[]" value="Giza Systems Events"
                                                <?php foreach($interests as $interest) { if($interest=='Giza Systems Events'){echo "checked='checked'";} }?>
                                                > Giza Systems Events<br>
                                                
                                                <input type="checkbox" id="interests[]" name="interests[]" value="Job Opportunities"
                                                <?php foreach($interests as $interest) { if($interest=='Job Opportunities'){echo "checked='checked'";} }?>
                                                > Job Opportunities<br />			
                                            
											</span>
											<div class="clear"></div>
											
										</div>
									</div>
									<!--/group-->
									
									<br/><br/><br/><br/>
										

									<!--buttons-->
									<div class="buttons">
										<a href="#" class="back"></a>
										<a href="#" class="next"></a>
										<a href="javascript:submitform()" class="submit"></a>
										
										<div class="clear"></div>
									</div>
									<!--/buttons-->
								</form>
							</div>
						</div>
						<!--/hr-application-block-->	
						
						
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
	