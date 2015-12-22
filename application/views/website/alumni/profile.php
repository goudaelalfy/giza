<?php $this->load->view('website/includes/header'); ?>
<?php echo "<script type='text/javascript'  src='".base_url()."js/website/alumni/form.js' > </script>";?>

<?php 

/**
 * Variables to store the value from database, to display on screen
 */
$id=				0;
$username='';  
$password='';  
$title='';  
$firstname='';  
$lastname='';  
$gender='';  
$birthdate='';  
$home_address='';  
$home_city='';  
$home_postal_code='';  
$home_country_id='';  
$home_phone='';  
$home_mobile='';  
$home_email='';  
$current_position='';  
$organization='';  
$work_address='';  
$work_postal_code='';  
$work_city='';  
$work_country_id='';  
$work_phone='';  
$work_mobile='';  
$work_email='';  
$giza_year_joined='';  
$giza_starting_position='';  
$giza_department='';  
$giza_year_left='';  
$giza_final_position='';  
$giza_final_department='';  
$giza_total_years='';  

$reference_contacts=array();
$interests=array();

$registeration_datetime='';  
$active='';  
$active_code='';


/*
if(!isset($alumni_industry_ids)) {
$alumni_industry_ids=		'';
}
if(!isset($alumni_industry_names)) {
$alumni_industry_names=	'';
}
if(!isset($alumni_solution_ids)) {
$alumni_solution_ids=		'';
}
if(!isset($alumni_solution_names)) {
$alumni_solution_names=	'';
}
*/

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
	$username=	$current_row->username;  
	$password=	$current_row->password;
	$title=	$current_row->title;  
	$firstname=	$current_row->firstname;  
	$lastname=	$current_row->lastname;  
	$gender=	$current_row->gender;  
	$birthdate=	$current_row->birthdate;  
	$home_address=	$current_row->home_address;
	$home_city= $current_row->home_city;
	$home_postal_code= $current_row->home_postal_code;
	$home_country_id= $current_row->home_country_id;
	$home_phone= $current_row->home_phone;
	$home_mobile=	$current_row->home_mobile; 
	$home_email=	$current_row->home_email;  
	$current_position=	$current_row->current_position;  
	$organization=	$current_row->organization;  
	$work_address=	$current_row->work_address;  
	$work_postal_code=	$current_row->work_postal_code;  
	$work_city=	$current_row->work_city;  
	$work_country_id=	$current_row->work_country_id;  
	$work_phone=	$current_row->work_phone;  
	$work_mobile=	$current_row->work_mobile;  
	$work_email=	$current_row->work_email;  
	$giza_year_joined=	$current_row->giza_year_joined;  
	$giza_starting_position=	$current_row->giza_starting_position;  
	$giza_department=	$current_row->giza_department;  
	$giza_year_left=	$current_row->giza_year_left;  
	$giza_final_position=	$current_row->giza_final_position;  
	$giza_final_department=	$current_row->giza_final_department;  
	$giza_total_years=	$current_row->giza_total_years;  
	
	$reference_contacts=	$current_row->reference_contacts;  
	$interests=	$current_row->interests;  
	
	$reference_contacts= explode(",", $reference_contacts); 
	$reference_contacts_count  =count($reference_contacts); 
	
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
 * Country object.
 * 
 * Intialize object from Country controller class.
 * @var object.
 */
//$this->load->controller(ADMIN.'/Country');
//$country_object= new Country();


/**
 * Alumni controller object.
 * 
 * Intialize object from Alumni controller class.
 * @var object.
 */

$this_object= new Alumni();

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
					<div class="hint"><?php echo $this->lang->line('alumnies'); ?></div>
					<h1><?php if(isset($title)) {echo $title;} ?></h1>
					<div class="main-body">
						
					
					<!--hr-application-block-->
						<div id="hr-application-block">
							<div class="tabs">
								<div class="list">
									<div class="tab current"><?php echo lang('personal_details');?></div>
									<div class="tab"><?php echo lang('professional_details');?></div>
									<div class="tab"><?php echo lang('career_at_giza_systems');?></div>
									<div class="tab"><?php echo lang('area_of_interest');?></div>
								</div>
							</div>
							<div class="form">
								<form name="frm_alumni_profile" id="frm_alumni_profile" action="<?php echo base_url().$this->lang->lang();?>/alumni/save" method="post" enctype='multipart/form-data'>
									<!--group-->
									<div class="group">
										
										<div class="row">
											<span class="name"><?php echo lang('title'); ?> *</span>
											<span class="field"><input type="text" name="title" id="title" value="<?php echo $title; ?>" class="text required" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('firstname'); ?> *</span>
											<span class="field"><input type="text" name="firstname" id="firstname" value="<?php echo $firstname; ?>" class="text required" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('lastname'); ?> *</span>
											<span class="field"><input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>" class="text required" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('gender'); ?></span>
											<span class="field">
											 <select  name="gender" id="gender">
												<option value="Male" <?php if($gender=='Male'){echo "selected='selected'";} ?>>Male</option>
                                                <option value="Female" <?php if($gender=='Female'){echo "selected='selected'";} ?>>Female</option>			
                                            </select>
											</span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('birthdate'); ?></span>
											<span class="field"><input type="text" name="birthdate" id="birthdate" value="<?php echo $birthdate; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('home_address'); ?></span>
											<span class="field"><input type="text" name="home_address" id="home_address" value="<?php echo $home_address; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('home_city'); ?></span>
											<span class="field"><input type="text" name="home_city" id="home_city" value="<?php echo $home_city; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('home_postal_code'); ?></span>
											<span class="field"><input type="text" name="home_postal_code" id="home_postal_code" value="<?php echo $home_postal_code; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('home_country_id'); ?></span>
											<span class="field"><?php $dropdowns->drpdwn_country($this_object, $home_country_id,'home_country_id',$are_disabled); ?></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('home_phone'); ?></span>
											<span class="field"><input type="text" name="home_phone" id="home_phone" value="<?php echo $home_phone; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('home_mobile'); ?></span>
											<span class="field"><input type="text" name="home_mobile" id="home_mobile" value="<?php echo $home_mobile; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('home_email'); ?> *</span>
											<span class="field"><input type="text" name="home_email" id="home_email" value="<?php echo $home_email; ?>" class="text required" /></span>
											<div class="clear"></div>
										</div>
										
										
									</div>	
									<!--/group-->
									<!--group-->
									<div class="group">
										<div class="row">
											<span class="name"><?php echo lang('current_position'); ?> </span>
											<span class="field"><input type="text" name="current_position" id="current_position" value="<?php echo $current_position; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('organization'); ?> *</span>
											<span class="field"><input type="text" name="organization" id="organization" value="<?php echo $organization; ?>" class="text required" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('work_address'); ?> </span>
											<span class="field"><input type="text" name="work_address" id="work_address" value="<?php echo $work_address; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('work_postal_code'); ?> </span>
											<span class="field"><input type="text" name="work_postal_code" id="work_postal_code" value="<?php echo $work_postal_code; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('work_city'); ?> </span>
											<span class="field"><input type="text" name="work_city" id="work_city" value="<?php echo $work_city; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('work_country_id'); ?> </span>
											<span class="field">
											<?php $dropdowns->drpdwn_country($this_object, $work_country_id,'work_country_id',$are_disabled); ?>
											</span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('work_phone'); ?> </span>
											<span class="field"><input type="text" name="work_phone" id="work_phone" value="<?php echo $work_phone; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('work_mobile'); ?> </span>
											<span class="field"><input type="text" name="work_mobile" id="work_mobile" value="<?php echo $work_mobile; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('work_email'); ?> </span>
											<span class="field"><input type="text" name="work_email" id="work_email" value="<?php echo $work_email; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										
									</div>
									<!--/group-->
									
									
									<!--group-->
									<div class="group">
										<div class="row">
											<span class="name"><?php echo lang('giza_year_joined'); ?> </span>
											<span class="field"><input type="text" name="giza_year_joined" id="giza_year_joined" value="<?php echo $giza_year_joined; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('giza_starting_position'); ?> </span>
											<span class="field"><input type="text" name="giza_starting_position" id="giza_starting_position" value="<?php echo $giza_starting_position; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('giza_department'); ?> </span>
											<span class="field"><input type="text" name="giza_department" id="giza_department" value="<?php echo $giza_department; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('giza_year_left'); ?> </span>
											<span class="field"><input type="text" name="giza_year_left" id="giza_year_left" value="<?php echo $giza_year_left; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('giza_final_position'); ?> </span>
											<span class="field"><input type="text" name="giza_final_position" id="giza_final_position" value="<?php echo $giza_final_position; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('giza_final_department'); ?> </span>
											<span class="field"><input type="text" name="giza_final_department" id="giza_final_department" value="<?php echo $giza_final_department; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('giza_total_years'); ?> </span>
											<span class="field"><input type="text" name="giza_total_years" id="giza_total_years" value="<?php echo $giza_total_years; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										
									
										<div class="row">
											<span class="name"><?php echo lang('reference_contacts'); ?> *</span>
											<span class="field main-body empty" style="padding: 0px">
											
												<input type="checkbox" id="reference_contacts[]" name="reference_contacts[]" value="Home Phone"
                                                <?php foreach($reference_contacts as $reference_contact) { if($reference_contact=='Home Phone'){echo "checked='checked'";} }?>
                                                > Home Phone<br>
                                                
                                                <input type="checkbox" id="reference_contacts[]" name="reference_contacts[]" value="Personal Mobile"
                                                <?php foreach($reference_contacts as $reference_contact) { if($reference_contact=='Personal Mobile'){echo "checked='checked'";} }?>
                                                > Personal Mobile<br>
                                                
                                                <input type="checkbox" id="reference_contacts[]" name="reference_contacts[]" value="Personal Email"
                                                <?php foreach($reference_contacts as $reference_contact) { if($reference_contact=='Personal Email'){echo "checked='checked'";} }?>
                                                > Personal Email<br>
                                                
                                                <input type="checkbox" id="reference_contacts[]" name="reference_contacts[]" value="Work Phone"
                                                <?php foreach($reference_contacts as $reference_contact) { if($reference_contact=='Work Phone'){echo "checked='checked'";} }?>
                                                > Work Phone<br>
                                                
                                                <input type="checkbox" id="reference_contacts[]" name="reference_contacts[]" value="Work Mobile"
                                                <?php foreach($reference_contacts as $reference_contact) { if($reference_contact=='Work Mobile'){echo "checked='checked'";} }?>
                                                > Work Mobile<br>
                                                
                                                <input type="checkbox" id="reference_contacts[]" name="reference_contacts[]" value="Work Email"
                                                <?php foreach($reference_contacts as $reference_contact) { if($reference_contact=='Work Email'){echo "checked='checked'";} }?>
                                                > Work Email<br>
                                                
											</span>
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
									
									<br/><br/><br/><br/><br/><br/><br/><br/>
										

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
	