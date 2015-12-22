<?php $this->load->view('website/includes/header'); ?>
<?php echo "<script type='text/javascript'  src='".base_url()."js/website/candidate/form.js' > </script>";?>

<!-- Date Picker By Gouda -->
<script type='text/javascript' src='<?php echo base_url();?>css/old/js/bsoft_calendar_g/bsoft.js'></script>
<script type="text/javascript" src="<?php echo base_url();?>css/old/js/bsoft_calendar_g/calendar.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>css/old/js/bsoft_calendar_g/calendar-en.js"></script>
<link href="<?php echo base_url();?>css/old/js/bsoft_calendar_g/bscal.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>css/old/js/bsoft_calendar_g/fancyblue.css" rel="stylesheet" type="text/css">


<script type="text/javascript">
 
$(document).ready(function(){

     $("#solution_id").change(function () {
		$.ajax({  
    	type: "POST",  
    	url: "<?php echo base_url().$this->lang->lang(); ?>/dropdown_ajax/get_businesslines_by_solution/"+this.value,    
    	success: function(msg){  
   		
   		$("#dv_businessline").ajaxComplete(function(event, request, settings){ 
		$(this).html(msg);
		});

 		} 
   
  		});

     });
 
     
  });
</script>




<?php 

/**
 * Variables to store the value from database, to display on screen
 */
$id=				0;
$username='';  
$password='';  
$firstname='';
$middlename='';  
$lastname='';  
$gender='';  
$birthdate='';
$nationality_id='';  
$country_id='';  
$address=''; 
$p_o_box=''; 
$city='';  
$phone='';  
$mobile='';  
$email='';  

$maritalstatus_id='';  
$dependants_count='';  
$militarystatus_id='';  
$car_owner='';  
$driving_license='';  
$communication_channel_id='';  
$position_apply_for='';  
$employment_type_id='';  
$how_soon_can_you_join='';  
$giza_city_id='';  
$willing_to_travel='';  
$contact_with_giza_by_id='';  
$degree_id='';  
$university_id='';  
$faculty_id='';  
$major_id='';  
$university_completion_date='';  
$grade_id='';  
$postgraduate_name1='';  
$postgraduate_field1='';  
$postgraduate_date1='';  
$postgraduate_certificate1='';  
$postgraduate_country1_id='';  
$postgraduate_name2='';  
$postgraduate_field2='';  
$postgraduate_date2='';  
$postgraduate_certificate2='';  
$postgraduate_country2_id='';  
$postgraduate_name3='';  
$postgraduate_field3='';  
$postgraduate_date3='';  
$postgraduate_certificate3='';  
$postgraduate_country_id3='';  
$other_qualifications=''; 
$other_academic_education='';
$line_of_business_id='';  
$line_of_business_experience_year='';  
$industry_id='';  
$expertise_industry_experience_year='';  
$language1_id='';  
$language_level1_id='';  
$language2_id='';  
$language_level2_id='';  
$language3_id='';  
$language_level3_id='';  
$computer_skills='';
$training_course1_name='';  
$training_course1_location='';  
$training_course1_duration='';  
$training_course2_name='';  
$training_course2_location='';  
$training_course2_duration='';  
$training_course3_name='';  
$training_course3_location='';  
$training_course3_duration='';  
$professional_experience_years='';  
$student_internship_experience_years='';  
$job1_title='';  
$job1_employer='';  
$job1_duration='';  
$job1_duties=''; 
$job2_title='';  
$job2_employer='';  
$job2_duration='';  
$job2_duties=''; 
$job3_title='';  
$job3_employer='';  
$job3_duration='';
$job3_duties=''; 
$reference1_name='';  
$reference1_position='';  
$reference1_organization='';  
$reference1_phone='';  
$reference1_email='';
$reference2_name='';  
$reference2_position='';  
$reference2_organization='';  
$reference2_phone='';  
$reference2_email='';
$reference3_name='';  
$reference3_position='';  
$reference3_organization='';  
$reference3_phone='';  
$reference3_email='';
$relative1_name='';
$relative1_department='';
$relative2_name='';
$relative2_department='';
$reason_for_leaving_current_employer='';
$commit_years='';
$immigrate='';
$immigrate_yes='';
$relocating='';
$salary='';
$hobbies='';
$professional_memberships='';
$extra_activities='';
$cv_file='';
$image='';
$job_notification_mail='';



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
	$username=	$current_row->username;  
	$password=	$current_row->password;
	$firstname=	$current_row->firstname;  
	$middlename=	$current_row->middlename;  
	$lastname=	$current_row->lastname;  
	$gender=	$current_row->gender;  
	$birthdate=	$current_row->birthdate;  
	$nationality_id=	$current_row->nationality_id;  
	$country_id= $current_row->country_id;
	$address=	$current_row->address;
	$p_o_box= $current_row->p_o_box;
	$city=	$current_row->city;  
	$phone= $current_row->phone;
	$mobile=	$current_row->mobile; 
	$email=	$current_row->email;  
	
  	$maritalstatus_id=	$current_row->maritalstatus_id;  
  	$dependants_count=	$current_row->dependants_count;  
  	$militarystatus_id=	$current_row->militarystatus_id;  
  	$car_owner=	$current_row->car_owner;  
  	$driving_license=	$current_row->driving_license;  
  	$communication_channel_id=	$current_row->communication_channel_id;  
  	$position_apply_for=	$current_row->position_apply_for;  
  	$employment_type_id=	$current_row->employment_type_id;  
  	$how_soon_can_you_join=	$current_row->how_soon_can_you_join;  
  	$giza_city_id=	$current_row->giza_city_id;  
  	$willing_to_travel=	$current_row->willing_to_travel;  
  	$contact_with_giza_by_id=	$current_row->contact_with_giza_by_id;  
  	$degree_id=	$current_row->degree_id;  
  	$university_id=	$current_row->university_id;  
  	$faculty_id=	$current_row->faculty_id;  
  	$major_id=	$current_row->major_id;  
  	$university_completion_date=	$current_row->university_completion_date;  
  	$grade_id=	$current_row->grade_id;  
  	$postgraduate_name1=	$current_row->postgraduate_name1;  
  	$postgraduate_field1=	$current_row->postgraduate_field1;  
  	$postgraduate_date1=	$current_row->postgraduate_date1;  
  	$postgraduate_certificate1=	$current_row->postgraduate_certificate1;  
  	$postgraduate_country1_id=	$current_row->postgraduate_country1_id;  
  	$postgraduate_name2=	$current_row->postgraduate_name2;  
  	$postgraduate_field2=	$current_row->postgraduate_field2;  
  	$postgraduate_date2=	$current_row->postgraduate_date2;  
  	$postgraduate_certificate2=	$current_row->postgraduate_certificate2;  
  	$postgraduate_country2_id=	$current_row->postgraduate_country2_id;  
  	$postgraduate_name3=	$current_row->postgraduate_name3;  
  	$postgraduate_field3=	$current_row->postgraduate_field3;  
  	$postgraduate_date3=	$current_row->postgraduate_date3;  
  	$postgraduate_certificate3=	$current_row->postgraduate_certificate3;  
  	$postgraduate_country_id3=	$current_row->postgraduate_country_id3;  
	$other_qualifications=	$current_row->other_qualifications; 
	$other_academic_education=	$current_row->other_academic_education;
	$line_of_business_id=	$current_row->line_of_business_id;  
	$line_of_business_experience_year=	$current_row->line_of_business_experience_year;  
	$industry_id=	$current_row->industry_id;  
	$expertise_industry_experience_year=	$current_row->expertise_industry_experience_year;  
	$language1_id=	$current_row->language1_id;  
	$language_level1_id=	$current_row->language_level1_id;  
	$language2_id=	$current_row->language2_id;  
	$language_level2_id=	$current_row->language_level2_id;  
	$language3_id=	$current_row->language3_id;  
	$language_level3_id=	$current_row->language_level3_id;  
	$computer_skills=	$current_row->computer_skills;
	$training_course1_name=	$current_row->training_course1_name;  
	$training_course1_location=	$current_row->training_course1_location;  
	$training_course1_duration=	$current_row->training_course1_duration;  
	$training_course2_name=	$current_row->training_course2_name;  
	$training_course2_location=	$current_row->training_course2_location;  
	$training_course2_duration=	$current_row->training_course2_duration;  
	$training_course3_name=	$current_row->training_course3_name;  
	$training_course3_location=	$current_row->training_course3_location;  
	$training_course3_duration=	$current_row->training_course3_duration;  
	$professional_experience_years=	$current_row->professional_experience_years;  
	$student_internship_experience_years=	$current_row->student_internship_experience_years;  
	$job1_title=	$current_row->job1_title;  
	$job1_employer=	$current_row->job1_employer;  
	$job1_duration=	$current_row->job1_duration;  
	$job1_duties=	$current_row->job1_duties; 
	$job2_title=	$current_row->job2_title;  
	$job2_employer=	$current_row->job2_employer;  
	$job2_duration=	$current_row->job3_duration;  
	$job2_duties=	$current_row->job2_duties; 
	$job3_title=	$current_row->job3_title;  
	$job3_employer=	$current_row->job3_employer;  
	$job3_duration=	$current_row->job3_duration;
	$job3_duties=	$current_row->job3_duties; 
	$reference1_name=	$current_row->reference1_name;  
	$reference1_position=	$current_row->reference1_position;  
	$reference1_organization=	$current_row->reference1_organization;  
	$reference1_phone=	$current_row->reference1_phone;  
	$reference1_email=	$current_row->reference1_email;
	$reference2_name=	$current_row->reference2_name;  
	$reference2_position=	$current_row->reference2_position;  
	$reference2_organization=	$current_row->reference2_organization;  
	$reference2_phone=	$current_row->reference2_phone;  
	$reference2_email=	$current_row->reference2_email;
	$reference3_name=	$current_row->reference3_name;  
	$reference3_position=	$current_row->reference3_position;  
	$reference3_organization=	$current_row->reference3_organization;  
	$reference3_phone=	$current_row->reference3_phone;  
	$reference3_email=	$current_row->reference3_email;
	$relative1_name=	$current_row->relative1_name;
	$relative1_department=	$current_row->relative1_department;
	$relative2_name=	$current_row->relative2_name;
	$relative2_department=	$current_row->relative2_department;
	$reason_for_leaving_current_employer=	$current_row->reason_for_leaving_current_employer;
	$commit_years=	$current_row->commit_years;
	$immigrate=	$current_row->immigrate;
	$immigrate_yes=	$current_row->immigrate_yes;
	$relocating=	$current_row->relocating;
	$salary=	$current_row->salary;
	$hobbies=	$current_row->hobbies;
	$professional_memberships=	$current_row->professional_memberships;
	$extra_activities=	$current_row->extra_activities;
	$cv_file=	$current_row->cv_file;
	$image=	$current_row->image;
	$job_notification_mail=	$current_row->job_notification_mail;				
		
	
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
 * Hrmaindata object.
 * 
 * Intialize object from Hrmaindata controller class.
 * @var object.
 */
//$this->load->controller(ADMIN.'/hrmaindata');
//$hrmaindata_object= new Hrmaindata();

/**
 * Solution object.
 * 
 * Intialize object from Solution controller class.
 * @var object.
 */
//$this->load->controller(ADMIN.'/Solution');
//$solution_object= new Solution();

/**
 * Industry object.
 * 
 * Intialize object from Industry controller class.
 * @var object.
 */
//$this->load->controller(ADMIN.'/Industry');
//$industry_object= new Industry();

/**
 * Businessline object.
 * 
 * Intialize object from Businessline controller class.
 * @var object.
 */
//$this->load->controller(ADMIN.'/Businessline');
//$businessline_object= new Businessline();

/**
 * Candidate controller object.
 * 
 * Intialize object from Candidate controller class.
 * @var object.
 */

$this_object= new Candidate();

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
					<div class="hint"><?php echo $this->lang->line('candidates'); ?></div>
					<h1><?php if(isset($title)) {echo $title;} ?></h1>
					<div class="main-body">
						
					
					<!--hr-application-block-->
						<div id="hr-application-block">
							<div class="tabs">
								<div class="list">
									<div class="tab current"><?php echo lang('personal_details');?></div>
									<div class="tab"><?php echo lang('education');?></div>
									<div class="tab"><?php echo lang('skills_experience');?></div>
									<div class="tab"><?php echo lang('references_other_info');?></div>
								</div>
							</div>
							<div class="form">
								<form name="frm_candidate_profile" id="frm_candidate_profile" action="<?php echo base_url().$this->lang->lang();?>/candidate/save" method="post" enctype='multipart/form-data'>
									<!--group-->
									<div class="group">
										
										
										<div class="row">
											<span class="name"><?php echo lang('firstname'); ?> *</span>
											<span class="field"><input type="text" name="firstname" id="firstname" value="<?php echo $firstname; ?>" class="text required" /></span>
											<div class="clear"></div>
										</div>
										
										<div class="row">
											<span class="name"><?php echo lang('middlename'); ?></span>
											<span class="field"><input type="text" name="middlename" id="middlename" value="<?php echo $middlename; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										
										<div class="row">
											<span class="name"><?php echo lang('lastname'); ?> *</span>
											<span class="field"><input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>" class="text required" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('gender'); ?> *</span>
											<span class="field">
											 <select  name="gender" id="gender" class="required">
												<option value="Male" <?php if($gender=='Male'){echo "selected='selected'";} ?>>Male</option>
                                                <option value="Female" <?php if($gender=='Female'){echo "selected='selected'";} ?>>Female</option>			
                                            </select>
											</span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('birthdate'); ?> </span>
											<span class="field">
											<input type="text" name="birthdate" id="birthdate" value="<?php echo $birthdate; ?>" class="text" />
											<input type="reset" value="..." id='button_birthdate' title='Click to pop up calendar' class="control">
											<script type="text/javascript">
											var cal = new BSoft.Calendar.setup({
											inputField     :    "birthdate",     // id of the input field
											ifFormat       :    "%Y-%m-%d",     //%I:%M %p format of the input field
											button         :    "button_birthdate", // What will trigger popup of the calendar
											timeInterval   :     15,
											showsTime      :     true//true
											});
											</script>
											
											</span>
											<div class="clear"></div>
										</div>
										
										<div class="row">
											<span class="name"><?php echo lang('nationality_id'); ?> *</span>
											<span class="field"><?php $dropdowns->drpdwn_country($this_object, $nationality_id,'nationality_id',$are_disabled); ?></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('address'); ?> *</span>
											<span class="field"><input type="text" name="address" id="address" value="<?php echo $address; ?>" class="text required" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('p_o_box'); ?></span>
											<span class="field"><input type="text" name="p_o_box" id="p_o_box" value="<?php echo $p_o_box; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('city'); ?> *</span>
											<span class="field"><input type="text" name="city" id="city" value="<?php echo $city; ?>" class="text required" /></span>
											<div class="clear"></div>
										</div>
										
										<div class="row">
											<span class="name"><?php echo lang('country'); ?> *</span>
											<span class="field"><?php $dropdowns->drpdwn_country($this_object, $country_id,'country_id',"class='required'"); ?></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('phone'); ?> *</span>
											<span class="field"><input type="text" name="phone" id="phone" value="<?php echo $phone; ?>" class="text digits required" /></span>
											 Format: 029876543
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('mobile'); ?> *</span>
											<span class="field"><input type="text" name="mobile" id="mobile" value="<?php echo $mobile; ?>" class="text digits required" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('email'); ?> *</span>
											<span class="field"><input type="text" name="email" id="email" value="<?php echo $email; ?>" class="text email required" /></span>
											<div class="clear"></div>
										</div>
										
										<div class="row">
											<span class="name"><?php echo lang('hr_marital_status'); ?> *</span>
											<span class="field"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_marital_status', $maritalstatus_id,'maritalstatus_id',"class='required'"); ?></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('dependants_count'); ?> *</span>
											<span class="field"><input type="text" name="dependants_count" id="dependants_count" value="<?php echo $dependants_count; ?>" class="text required" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('hr_military_status'); ?> *</span>
											<span class="field"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_military_status', $militarystatus_id,'militarystatus_id',"class='required'"); ?></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('car_owner'); ?> </span>
											<span class="field">
											<select  name="car_owner" id="car_owner">
											
											<option value="Yes" <?php if($car_owner=='Yes'){echo "selected='selected'";} ?>>Yes</option>
                                            <option value="No" <?php if($car_owner=='No'){echo "selected='selected'";} ?>>No</option>			
                                            </select>
											</span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('driving_license'); ?> </span>
											<span class="field">
											<select  name="driving_license" id="driving_license">
											<option value="Yes" <?php if($driving_license=='Yes'){echo "selected='selected'";} ?>>Yes</option>
                                            <option value="No" <?php if($driving_license=='No'){echo "selected='selected'";} ?>>No</option>			
                                            </select>
											</span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('hr_communication_channel'); ?> </span>
											<span class="field"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_communication_channel', $communication_channel_id,'communication_channel_id',$are_disabled); ?></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('position_apply_for'); ?> </span>
											<span class="field"><input type="text" name="position_apply_for" id="position_apply_for" value="<?php echo $position_apply_for; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('hr_employment_type'); ?> </span>
											<span class="field"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_employment_type', $employment_type_id,'employment_type_id',$are_disabled); ?></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('hr_city_preferred_to_work'); ?> </span>
											<span class="field"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_city_preferred_to_work', $giza_city_id,'giza_city_id',$are_disabled); ?></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('willing_to_travel'); ?> </span>
											<span class="field">
											<select  name="willing_to_travel" id="willing_to_travel">
											<option value="Yes" <?php if($willing_to_travel=='Yes'){echo "selected='selected'";} ?>>Yes</option>
                                            <option value="No" <?php if($willing_to_travel=='No'){echo "selected='selected'";} ?>>No</option>			
                                            </select>
											</span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('hr_time_to_join'); ?> </span>
											<span class="field"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_time_to_join', $how_soon_can_you_join,'how_soon_can_you_join',$are_disabled); ?></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('hr_contact_with_giza_by'); ?> </span>
											<span class="field"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_contact_with_giza_by', $contact_with_giza_by_id,'contact_with_giza_by_id',$are_disabled); ?></span>
											<div class="clear"></div>
										</div>
										
										
									</div>	
									<!--/group-->
									<!--group-->
									<div class="group">
										<div class="row">
											<span class="name"><?php echo lang('degree'); ?> *</span>
											<span class="field"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_degree', $degree_id,'degree_id',"class='required'"); ?></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('university'); ?> *</span>
											<span class="field"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_university', $university_id,'university_id',"class='required'"); ?></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('faculty'); ?> *</span>
											<span class="field"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_faculty', $faculty_id,'faculty_id',"class='required'"); ?></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('major'); ?> *</span>
											<span class="field"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_major', $major_id,'major_id',"class='required'"); ?></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('university_completion_date'); ?> *</span>
											<span class="field">
											<input type="text" name="university_completion_date" id="university_completion_date" value="<?php echo $university_completion_date; ?>" class="text" />
											<input type="reset" value="..." id='button_university_completion_date' title='Click to pop up calendar' class="control">
											<script type="text/javascript">
											var cal = new BSoft.Calendar.setup({
											inputField     :    "university_completion_date",     // id of the input field
											ifFormat       :    "%Y-%m-%d",     //%I:%M %p format of the input field
											button         :    "button_university_completion_date", // What will trigger popup of the calendar
											timeInterval   :     15,
											showsTime      :     true//true
											});
											</script>
											</span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('grade'); ?> *</span>
											<span class="field"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_grade', $grade_id,'grade_id',"class='required'"); ?></span>
											<div class="clear"></div>
										</div>
										
										
										
										
										
										
										
										<div id="dv_post_graduate_1">
										<br/>
										<?php echo lang('post_graduate_study').' 1:'; ?>
										<br/>
										<div class="row">
											<span class="name"><?php echo lang('postgraduate_name'); ?> </span>
											<span class="field"><input type="text" name="postgraduate_name1" id="postgraduate_name1" value="<?php echo $postgraduate_name1; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('postgraduate_field'); ?> </span>
											<span class="field"><input type="text" name="postgraduate_field1" id="postgraduate_field1" value="<?php echo $postgraduate_field1; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('postgraduate_date'); ?> </span>
											<span class="field">
											<input type="text" name="postgraduate_date1" id="postgraduate_date1" value="<?php echo $postgraduate_date1; ?>" class="text" />
											
											<input type="reset" value="..." id='button_postgraduate_date1' title='Click to pop up calendar' class="control">
											<script type="text/javascript">
											var cal = new BSoft.Calendar.setup({
											inputField     :    "postgraduate_date1",     // id of the input field
											ifFormat       :    "%Y-%m-%d",     //%I:%M %p format of the input field
											button         :    "button_postgraduate_date1", // What will trigger popup of the calendar
											timeInterval   :     15,
											showsTime      :     true//true
											});
											</script>
											
											</span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('postgraduate_certificate'); ?> </span>
											<span class="field"><input type="text" name="postgraduate_certificate1" id="postgraduate_certificate1" value="<?php echo $postgraduate_certificate1; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										
										<div class="row">
											<span class="name"><?php echo lang('country'); ?> </span>
											<span class="field"><?php $dropdowns->drpdwn_country($this_object, $postgraduate_country1_id,'postgraduate_country1_id',$are_disabled); ?></span>
											<div class="clear"></div>
										</div>
										
										<div id="dv_post_graduate_lnk_1" align="right"><a href ="javascript:void(0)" onclick="document.getElementById('dv_post_graduate_2').style.display='block';document.getElementById('dv_post_graduate_lnk_1').style.display='none'" ><?php echo lang('add_another'); ?></a></div>
                                            
										</div>
										
										
										
										
										
										<div id="dv_post_graduate_2" style=" display:none">
										<br/>
										<?php echo lang('post_graduate_study').' 2:'; ?>
										<br/>
										<div class="row">
											<span class="name"><?php echo lang('postgraduate_name'); ?> </span>
											<span class="field"><input type="text" name="postgraduate_name2" id="postgraduate_name2" value="<?php echo $postgraduate_name2; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('postgraduate_field'); ?> </span>
											<span class="field"><input type="text" name="postgraduate_field2" id="postgraduate_field2" value="<?php echo $postgraduate_field2; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('postgraduate_date'); ?> </span>
											<span class="field">
											<input type="text" name="postgraduate_date2" id="postgraduate_date2" value="<?php echo $postgraduate_date2; ?>" class="text" />
											
											<input type="reset" value="..." id='button_postgraduate_date2' title='Click to pop up calendar' class="control">
											<script type="text/javascript">
											var cal = new BSoft.Calendar.setup({
											inputField     :    "postgraduate_date2",     // id of the input field
											ifFormat       :    "%Y-%m-%d",     //%I:%M %p format of the input field
											button         :    "button_postgraduate_date2", // What will trigger popup of the calendar
											timeInterval   :     15,
											showsTime      :     true//true
											});
											</script>
											
											</span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('postgraduate_certificate'); ?> </span>
											<span class="field"><input type="text" name="postgraduate_certificate2" id="postgraduate_certificate2" value="<?php echo $postgraduate_certificate2; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										
										<div class="row">
											<span class="name"><?php echo lang('country'); ?> </span>
											<span class="field"><?php $dropdowns->drpdwn_country($this_object, $postgraduate_country2_id,'postgraduate_country2_id',$are_disabled); ?></span>
											<div class="clear"></div>
										</div>
										
										<div id="dv_post_graduate_lnk_2" align="right"><a href ="javascript:void(0)" onclick="document.getElementById('dv_post_graduate_3').style.display='block';document.getElementById('dv_post_graduate_lnk_2').style.display='none'" ><?php echo lang('add_another'); ?></a></div>
                                            
										</div>
										
										
										
										
										
										
										
										
										
										
										<div id="dv_post_graduate_3" style=" display:none">
										<br/>
										<?php echo lang('post_graduate_study').' 3:'; ?>
										<br/>
										<div class="row">
											<span class="name"><?php echo lang('postgraduate_name'); ?> </span>
											<span class="field"><input type="text" name="postgraduate_name3" id="postgraduate_name3" value="<?php echo $postgraduate_name3; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('postgraduate_field'); ?> </span>
											<span class="field"><input type="text" name="postgraduate_field3" id="postgraduate_field3" value="<?php echo $postgraduate_field3; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('postgraduate_date'); ?> </span>
											<span class="field">
											<input type="text" name="postgraduate_date3" id="postgraduate_date3" value="<?php echo $postgraduate_date3; ?>" class="text" />
											
											<input type="reset" value="..." id='button_postgraduate_date3' title='Click to pop up calendar' class="control">
											<script type="text/javascript">
											var cal = new BSoft.Calendar.setup({
											inputField     :    "postgraduate_date3",     // id of the input field
											ifFormat       :    "%Y-%m-%d",     //%I:%M %p format of the input field
											button         :    "button_postgraduate_date3", // What will trigger popup of the calendar
											timeInterval   :     15,
											showsTime      :     true//true
											});
											</script>
											
											</span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('postgraduate_certificate'); ?> </span>
											<span class="field"><input type="text" name="postgraduate_certificate3" id="postgraduate_certificate3" value="<?php echo $postgraduate_certificate3; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										
										<div class="row">
											<span class="name"><?php echo lang('country'); ?> </span>
											<span class="field"><?php $dropdowns->drpdwn_country($this_object, $postgraduate_country_id3,'postgraduate_country_id3',$are_disabled); ?></span>
											<div class="clear"></div>
										</div>
										
										   
										</div>
										
										
										
																	
										
										<div class="row">
											<span class="name"><?php echo lang('other_qualifications'); ?> </span>
											<span class="field"><textarea type="text" name="other_qualifications" id="other_qualifications"  ><?php echo $other_qualifications; ?></textarea></span>
											<div class="clear"></div>
										</div>
										<br/><br/><br/><br/><br/>
										
										<div class="row">
											<span class="name"><?php echo lang('other_academic_education'); ?> </span>
											<span class="field"><textarea type="text" name="other_academic_education" id="other_academic_education"  ><?php echo $other_academic_education; ?></textarea></span>
											<div class="clear"></div>
										</div>
										<br/><br/><br/><br/>										
										
									</div>
									<!--/group-->
									
									
									<!--group-->
									<div class="group">
									
										<br/>
										<?php echo lang('expertise'); ?>
										<br/>
										<div class="row">
											<span class="name"><?php echo lang('line_of_business'); ?> </span>
											<span class="field">
											<?php $dropdowns->drpdwn_solution($this_object, '','solution_id',"style='"); ?>
											<br/><br/>
											<div id="dv_businessline" >
											<?php $dropdowns->drpdwn_businessline($this_object, $line_of_business_id,'line_of_business_id',""); ?>
											</div>
											<br/>
	                                         <?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_experience_year', $line_of_business_experience_year,'line_of_business_experience_year',"style='width:150px'"); ?>

											
											</span>
											<div class="clear"></div>
										</div>
										<div class="clear"></div><br/>
										
										<div class="row">
											<span class="name"><?php echo lang('industry_sector'); ?> </span>
											<span class="field">
											<?php $dropdowns->drpdwn_industry($this_object, $industry_id,'industry_id',"style='width:200px'"); ?>
											<?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_experience_year', $expertise_industry_experience_year,'expertise_industry_experience_year',"style='width:150px'"); ?>

											
											</span>
											<div class="clear"></div>
										</div>
										
										<br/>
										<?php echo lang('languages_and_computer_skills'); ?>
										<br/>
										<div class="row">
											<span class="name"><?php echo lang('language').' 1'; ?> </span>
											<span class="field">
											<?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_language', $language1_id,'language1_id',"style='width:200px'"); ?>
											<?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_language_level', $language_level1_id,'language_level1_id',"style='width:150px'"); ?>

											
											</span>
											<div class="clear"></div>
										</div>
										
										<div class="row">
											<span class="name"><?php echo lang('language').' 2'; ?> </span>
											<span class="field">
											<?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_language', $language2_id,'language2_id',"style='width:200px'"); ?>
											<?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_language_level', $language_level2_id,'language_level2_id',"style='width:150px'"); ?>

											
											</span>
											<div class="clear"></div>
										</div>
																				
										<div class="row">
											<span class="name"><?php echo lang('language').' 3'; ?> </span>
											<span class="field">
											<?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_language', $language3_id,'language3_id',"style='width:200px'"); ?>
											<?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_language_level', $language_level3_id,'language_level3_id',"style='width:150px'"); ?>

											
											</span>
											<div class="clear"></div>
										</div>
										
										<div class="row">
											<span class="name"><?php echo lang('computer_skills'); ?></span>
											<span class="field"><textarea type="text" name="computer_skills" id="computer_skills"  ><?php echo $computer_skills; ?></textarea></span>
											<div class="clear"></div>
										</div>
										<br/><br/><br/><br/><br/>
										
										
										<br/>
										<?php echo lang('training_courses'); ?>
										<br/>
										
										
										<div id="dv_course_1">
										<br/>
										<?php echo lang('course').' 1:'; ?>
										<br/>
										<div class="row">
											<span class="name"><?php echo lang('training_course_name'); ?> </span>
											<span class="field"><input type="text" name="training_course1_name" id="training_course1_name" value="<?php echo $training_course1_name; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										
										<div class="row">
											<span class="name"><?php echo lang('training_course_location'); ?> </span>
											<span class="field"><input type="text" name="training_course1_location" id="training_course1_location" value="<?php echo $training_course1_location; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										
										<div class="row">
											<span class="name"><?php echo lang('training_course_duration'); ?> </span>
											<span class="field"><input type="text" name="training_course1_duration" id="training_course1_duration" value="<?php echo $training_course1_duration; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										
										<div id="dv_course_lnk_1" align="right"><a href ="javascript:void(0)" onclick="document.getElementById('dv_course_2').style.display='block';document.getElementById('dv_course_lnk_1').style.display='none'" ><?php echo lang('add_another'); ?></a></div>

										</div>
										
										
										
									<div id="dv_course_2"  style=" display:none">
										<br/>
										<?php echo lang('course').' 2:'; ?>
										<br/>
										<div class="row">
											<span class="name"><?php echo lang('training_course_name'); ?> </span>
											<span class="field"><input type="text" name="training_course2_name" id="training_course2_name" value="<?php echo $training_course2_name; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										
										<div class="row">
											<span class="name"><?php echo lang('training_course_location'); ?> </span>
											<span class="field"><input type="text" name="training_course2_location" id="training_course2_location" value="<?php echo $training_course2_location; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										
										<div class="row">
											<span class="name"><?php echo lang('training_course_duration'); ?> </span>
											<span class="field"><input type="text" name="training_course2_duration" id="training_course2_duration" value="<?php echo $training_course2_duration; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										
										<div id="dv_course_lnk_2" align="right"><a href ="javascript:void(0)" onclick="document.getElementById('dv_course_3').style.display='block';document.getElementById('dv_course_lnk_2').style.display='none'" ><?php echo lang('add_another'); ?></a></div>
                                            
										</div>
										
										
										
										<div id="dv_course_3"  style=" display:none">
										<br/>
										<?php echo lang('course').' 3:'; ?>
										<br/>
										<div class="row">
											<span class="name"><?php echo lang('training_course_name'); ?> </span>
											<span class="field"><input type="text" name="training_course3_name" id="training_course3_name" value="<?php echo $training_course3_name; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										
										<div class="row">
											<span class="name"><?php echo lang('training_course_location'); ?> </span>
											<span class="field"><input type="text" name="training_course3_location" id="training_course3_location" value="<?php echo $training_course3_location; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										
										<div class="row">
											<span class="name"><?php echo lang('training_course_duration'); ?> </span>
											<span class="field"><input type="text" name="training_course3_duration" id="training_course3_duration" value="<?php echo $training_course3_duration; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										
                                            
										</div>
										
										
										<br/>
										<?php echo lang('work_experience'); ?>
										<br/>
										<div class="row">
											<span class="name"><?php echo lang('professional_experience'); ?> </span>
											<span class="field">
											<?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_experience_year', $professional_experience_years,'professional_experience_years',""); ?>
											</span>
											<div class="clear"></div>
										</div>
										
										<div class="row">
											<span class="name"><?php echo lang('experience_but_not_work'); ?> </span>
											<span class="field">
											<?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_experience_year', $student_internship_experience_years,'student_internship_experience_years',""); ?>
											</span>
											<div class="clear"></div>
										</div>
										
										
										<div id="dv_job_list_1">
										<br/>
										<?php echo lang('please_list_jobs'); ?>
										<br/>
										<br/>
										<?php echo lang('job').' 1:'; ?>
										<br/>
										
										<div class="row">
											<span class="name"><?php echo lang('job_title'); ?> </span>
											<span class="field"><input type="text" name="job1_title" id="job1_title" value="<?php echo $job1_title; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('job_employer'); ?> </span>
											<span class="field"><input type="text" name="job1_employer" id="job1_employer" value="<?php echo $job1_employer; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('job_duration'); ?> </span>
											<span class="field"><input type="text" name="job1_duration" id="job1_duration" value="<?php echo $job1_duration; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('job_duties'); ?> </span>
											<span class="field"><textarea type="text" name="job1_duties" id="job1_duties"  ><?php echo $job1_duties; ?></textarea></span>
											<div class="clear"></div>
										</div>
										<br/><br/><br/><br/><br/>
										
										
										<div id="dv_job_list_lnk_1" align="right"><a href ="javascript:void(0)" onclick="document.getElementById('dv_job_list_2').style.display='block';document.getElementById('dv_job_list_lnk_1').style.display='none'" ><?php echo lang('add_another'); ?></a></div>

										</div>
										
										
										<div id="dv_job_list_2" style=" display:none">
										<br/>
										<?php echo lang('job').' 2:'; ?>
										<br/>
										
										<div class="row">
											<span class="name"><?php echo lang('job_title'); ?> </span>
											<span class="field"><input type="text" name="job2_title" id="job2_title" value="<?php echo $job2_title; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('job_employer'); ?> </span>
											<span class="field"><input type="text" name="job2_employer" id="job2_employer" value="<?php echo $job2_employer; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('job_duration'); ?> </span>
											<span class="field"><input type="text" name="job2_duration" id="job2_duration" value="<?php echo $job2_duration; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('job_duties'); ?> </span>
											<span class="field"><textarea type="text" name="job2_duties" id="job2_duties"  ><?php echo $job2_duties; ?></textarea></span>
											<div class="clear"></div>
										</div>
										<br/><br/><br/><br/><br/>
										
										<div id="dv_job_list_lnk_2" align="right"><a href ="javascript:void(0)" onclick="document.getElementById('dv_job_list_3').style.display='block';document.getElementById('dv_job_list_lnk_2').style.display='none'" ><?php echo lang('add_another'); ?></a></div>

										</div>
										
										<div id="dv_job_list_3" style=" display:none">
										<br/>
										<?php echo lang('job').' 3:'; ?>
										<br/>
										
										<div class="row">
											<span class="name"><?php echo lang('job_title'); ?> </span>
											<span class="field"><input type="text" name="job3_title" id="job3_title" value="<?php echo $job3_title; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('job_employer'); ?> </span>
											<span class="field"><input type="text" name="job3_employer" id="job3_employer" value="<?php echo $job3_employer; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('job_duration'); ?> </span>
											<span class="field"><input type="text" name="job3_duration" id="job3_duration" value="<?php echo $job3_duration; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('job_duties'); ?> </span>
											<span class="field"><textarea type="text" name="job3_duties" id="job3_duties"  ><?php echo $job3_duties; ?></textarea></span>
											<div class="clear"></div>
										</div>
										
										
										</div>
										
										
										
									</div>
									<!--/group-->
									
									
									<!--group-->
									<div class="group">
									
									<div id="dv_reference_list_1" >
										<br/>
										<?php echo lang('list_three_reference'); ?>
										<br/>
										<br/>
										<?php echo lang('reference').' 1:'; ?>
										<br/>
										
										<div class="row">
											<span class="name"><?php echo lang('name'); ?> </span>
											<span class="field"><input type="text" name="reference1_name" id="reference1_name" value="<?php echo $reference1_name; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('position'); ?> </span>
											<span class="field"><input type="text" name="reference1_position" id="reference1_position" value="<?php echo $reference1_position; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('organization'); ?> </span>
											<span class="field"><input type="text" name="reference1_organization" id="reference1_organization" value="<?php echo $reference1_organization; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('phone'); ?> </span>
											<span class="field"><input type="text" name="reference1_phone" id="reference1_phone" value="<?php echo $reference1_phone; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('email'); ?> </span>
											<span class="field"><input type="text" name="reference1_email" id="reference1_email" value="<?php echo $reference1_email; ?>" class="text email" /></span>
											<div class="clear"></div>
										</div>
										
										<div id="dv_reference_list_lnk_1" align="right"><a href ="javascript:void(0)" onclick="document.getElementById('dv_reference_list_2').style.display='block';document.getElementById('dv_reference_list_lnk_1').style.display='none'" ><?php echo lang('add_another'); ?></a></div>
										</div>
										
										
										<div id="dv_reference_list_2" style=" display:none">
										<br/>
										<?php echo lang('reference').' 2:'; ?>
										<br/>
										
										<div class="row">
											<span class="name"><?php echo lang('name'); ?> </span>
											<span class="field"><input type="text" name="reference2_name" id="reference2_name" value="<?php echo $reference2_name; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('position'); ?> </span>
											<span class="field"><input type="text" name="reference2_position" id="reference2_position" value="<?php echo $reference2_position; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('organization'); ?> </span>
											<span class="field"><input type="text" name="reference2_organization" id="reference2_organization" value="<?php echo $reference2_organization; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('phone'); ?> </span>
											<span class="field"><input type="text" name="reference2_phone" id="reference2_phone" value="<?php echo $reference2_phone; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('email'); ?> </span>
											<span class="field"><input type="text" name="reference2_email" id="reference2_email" value="<?php echo $reference2_email; ?>" class="text email" /></span>
											<div class="clear"></div>
										</div>
										
										
										<div id="dv_reference_list_lnk_2" align="right"><a href ="javascript:void(0)" onclick="document.getElementById('dv_reference_list_3').style.display='block';document.getElementById('dv_reference_list_lnk_2').style.display='none'" ><?php echo lang('add_another'); ?></a></div>

										</div>
										
										


										<div id="dv_reference_list_3" style=" display:none">
										
										<br/>
										<?php echo lang('reference').' 3:'; ?>
										<br/>
										
										<div class="row">
											<span class="name"><?php echo lang('name'); ?> </span>
											<span class="field"><input type="text" name="reference3_name" id="reference3_name" value="<?php echo $reference3_name; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('position'); ?> </span>
											<span class="field"><input type="text" name="reference3_position" id="reference3_position" value="<?php echo $reference3_position; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('organization'); ?> </span>
											<span class="field"><input type="text" name="reference3_organization" id="reference3_organization" value="<?php echo $reference3_organization; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('phone'); ?> </span>
											<span class="field"><input type="text" name="reference3_phone" id="reference3_phone" value="<?php echo $reference3_phone; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('email'); ?> </span>
											<span class="field"><input type="text" name="reference3_email" id="reference3_email" value="<?php echo $reference3_email; ?>" class="text email" /></span>
											<div class="clear"></div>
										</div>
										
										</div>
										
										
										<div id="dv_relative_list_1" >
										<br/>
										<?php echo lang('list_relative'); ?>
										<br/>
										<br/>
										<?php echo lang('relative').' 1:'; ?>
										<br/>
										
										<div class="row">
											<span class="name"><?php echo lang('name'); ?> </span>
											<span class="field"><input type="text" name="relative1_name" id="relative1_name" value="<?php echo $relative1_name; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('department'); ?> </span>
											<span class="field"><input type="text" name="relative1_department" id="relative1_department" value="<?php echo $relative1_department; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
									
										<div id="dv_relative_list_lnk_1" align="right"><a href ="javascript:void(0)" onclick="document.getElementById('dv_relative_list_2').style.display='block';document.getElementById('dv_relative_list_lnk_1').style.display='none'" ><?php echo lang('add_another'); ?></a></div>

										</div>
										
										<div id="dv_relative_list_2" style=" display:none">
										<br/>
										<?php echo lang('relative').' 2:'; ?>
										<br/>
										
										<div class="row">
											<span class="name"><?php echo lang('name'); ?> </span>
											<span class="field"><input type="text" name="relative2_name" id="relative2_name" value="<?php echo $relative2_name; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('department'); ?> </span>
											<span class="field"><input type="text" name="relative2_department" id="relative2_department" value="<?php echo $relative2_department; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>

										</div>


										<div class="row">
											<span class="name"><?php echo lang('reason_for_leaving_current_employer'); ?> </span>
											<span class="field"><input type="text" name="reason_for_leaving_current_employer" id="reason_for_leaving_current_employer" value="<?php echo $reason_for_leaving_current_employer; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										
										<div class="row">
											<span class="name"><?php echo lang('immigrate'); ?> </span>
											<span class="field">
											<select  name="immigrate" id="immigrate">
											<option value="Yes" <?php if($immigrate=='Yes'){echo "selected='selected'";} ?>>Yes</option>
                                            <option value="No" <?php if($immigrate=='No'){echo "selected='selected'";} ?>>No</option>			
                                            </select>
											</span>
											<div class="clear"></div>
										</div>
										
										<div class="row">
											<span class="name"><?php echo lang('if_yes'); ?> </span>
											<span class="field"><input type="text" name="immigrate_yes" id="immigrate_yes" value="<?php echo $immigrate_yes; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('relocating'); ?> </span>
											<span class="field">
											<select  name="relocating" id="relocating">
											<option value="Yes" <?php if($relocating=='Yes'){echo "selected='selected'";} ?>>Yes</option>
                                            <option value="No" <?php if($relocating=='No'){echo "selected='selected'";} ?>>No</option>			
                                            </select>
											</span>
											<div class="clear"></div>
										</div>
										<br/>
										<div class="row">
											<span class="name"><?php echo lang('salary'); ?> </span>
											<span class="field"><input type="text" name="salary" id="salary" value="<?php echo $salary; ?>" class="text" /></span>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('hobbies'); ?> </span>
											<span class="field"><textarea type="text" name="hobbies" id="hobbies"  ><?php echo $hobbies; ?></textarea></span>
											<div class="clear"></div>
										</div>
											<br/><br/><br/><br/><br/><br/><br/>
										<div class="row">
											<span class="name"><?php echo lang('professional_memberships'); ?> </span>
											<span class="field"><textarea type="text" name="professional_memberships" id="professional_memberships"  ><?php echo $professional_memberships; ?></textarea></span>
											<div class="clear"></div>
										</div>
										<div class="clear"></div><div class="clear"></div>
										<div class="row">
											<span class="name"><?php echo lang('extra_activities'); ?> </span>
											<span class="field"><textarea type="text" name="extra_activities" id="extra_activities"  ><?php echo $extra_activities; ?></textarea></span>
											<div class="clear"></div>
										</div>
										<div class="clear"></div><div class="clear"></div>
										<div class="row">
											<span class="name"><?php echo lang('cv_file'); ?> </span>
											<span class="field"><input type="file" name="cv_file" id="cv_file" class="text required" /></span>
											<?php if($cv_file!='') {
												$cv_file_path=base_url().$cv_file;
												echo "<a href='$cv_file_path' >".lang('cv')." </a>";
											}?>
											<div class="clear"></div>
										</div>
										<div class="row">
											<span class="name"><?php echo lang('image'); ?> </span>
											<span class="field"><input type="file" name="image" id="image" class="text" /></span>
											<?php if($image!='') {
												$image_path=base_url().$image;
												echo "<img src='$image_path' title='$image' width='120px' height='80px'/>";
											}?>
											<div class="clear"></div>
										</div>
										
										
										<div class="row">
											<span class="name"><?php echo lang('job_notification_mail'); ?> </span>
											<span class="field">
											<select  name="job_notification_mail" id="job_notification_mail" style="width: 150px">
											<option value="Yes" <?php if($job_notification_mail=='Yes'){echo "selected='selected'";} ?>>Yes</option>
                                            <option value="No" <?php if($job_notification_mail=='No'){echo "selected='selected'";} ?>>No</option>			
                                            </select>
											</span>
											<div class="clear"></div>
										</div>



									</div>
									<!--/group-->
									
									<br/><br/><br/><br/><br/>
										

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
	