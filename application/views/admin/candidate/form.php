<?php $this->load->view('admin/includes/header'); ?>

<script type='text/javascript'  src='<?php echo base_url();?>js/includes/functions.js' > </script>
<script type='text/javascript'  src='<?php echo base_url();?>js/admin/candidate/form.js' > </script>

<!-- Tabber -->
<link type="text/css" href="<?php echo base_url();?>added/tabber/style.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url();?>added/tabber/tabber.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>added/tabber/tabber-minimized.js"></script>



<!-- For DatePicker -->
<script type='text/javascript'  src='<?php echo base_url();?>added/datepicker/date-picker-v4/date-picker-v4/js/datepicker.js' > </script>
<link href="<?php echo base_url();?>added/datepicker/date-picker-v4/date-picker-v4/css/datepicker.css" rel="stylesheet" type="text/css" />
<!-- 
<link href="<?php echo base_url();?>added/datepicker/date-picker-v4/date-picker-v4/css/demo.css" rel="stylesheet" type="text/css" />
 -->
 
<script type="text/javascript">
// <![CDATA[     

// A quick test of the setGlobalVars method - remember, the "lang" attribute will NOT work when passed to this method
datePickerController.setGlobalVars({"split":["-dd","-mm"]});

/* 
        The following function dynamically calculates Easter Monday's date.
        It is used as the "redraw" callback function for the second last calendar on the page
        and returns an empty object.
   
        It dynamically calculates Easter Monday for the year in question and uses
        the "adddisabledDates" method of the datePickercontroller Object to
        disable the date in question.
   
        NOTE: This function is not needed, it is only present to show you how you
        might use this callback function to disable dates dynamically!   
*/            
function disableEasterMonday(argObj) { 
        // Dynamically calculate Easter Monday - I've forgotten where this code 
        // was originally found and I don't even know if it returns a valid
        // result so don't use it in a prod environment...
        var y = argObj.yyyy,
            a=y%4,
            b=y%7,
            c=y%19,
            d=(19*c+15)%30,
            e=(2*a+4*b-d+34)%7,
            m=Math.floor((d+e+114)/31),
            g=(d+e+114)%31+1,            
            yyyymmdd = y + "0" + m + String(g < 10 ? "0" + g : g);         
        
        datePickerController.addDisabledDates(argObj.id, yyyymmdd); 
        
        // The redraw callback expects an Object as a return value
        // so we just give it an empty Object... 
        return {};
};

/* 

        The following functions updates a span with an "English-ised" version of the
        currently selected date for the last datePicker on the page. 
   
        NOTE: These functions are not needed, they are only present to show you how you
        might use callback functions to use the selected date in other ways!
   
*/
function createSpanElement(argObj) {
        // Make sure the span doesn't exist already
        if(document.getElementById("EnglishDate-" + argObj.id)) return;

        // create the span node dynamically...
        var spn = document.createElement('span');
            p   = document.getElementById(argObj.id).parentNode;
            
        spn.id = "EnglishDate-" + argObj.id;
        p.parentNode.appendChild(spn);
        
        // Remove the bottom margin on the input's wrapper paragraph
        p.style.marginBottom = "0";
        
        // Add a whitespace character to the span
        spn.appendChild(document.createTextNode(String.fromCharCode(160)));
};

function showEnglishDate(argObj) {
        // Grab the span & get a more English-ised version of the selected date
        var spn = document.getElementById("EnglishDate-" + argObj.id),
            formattedDate = datePickerController.printFormattedDate(argObj.date, "l-cc-sp-d-S-sp-F-sp-Y", false);
        
        // Make sure the span exists before attempting to use it!
        if(!spn) {
                createSpanElement(argObj); 
                spn = document.getElementById("EnglishDate-" + argObj.id);
        };
        
        // Note: The 3rd argument to printFormattedDate is a Boolean value that 
        // instructs the script to use the imported locale (true) or not (false)
        // when creating the dates. In this case, I'm not using the imported locale
        // as I've used the "S" format mask, which returns the English ordinal
        // suffix for a date e.g. "st", "nd", "rd" or "th" and using an
        // imported locale would look strange if an English suffix was included
        
        // Remove the current contents of the span
        while(spn.firstChild) spn.removeChild(spn.firstChild);
        
        // Add a new text node containing our formatted date
        spn.appendChild(document.createTextNode(formattedDate));
};

      
/* 
 
        Create a datepicker using Javascript and not classNames
        -------------------------------------------------------
      
        datePickerController.createDatePicker has to be called onload as we need 
        the locale file to have loaded before we can create a datepicker.
      
        The only way to get around using an onload event is to 
        explicitly set the language by adding it before the datepicker script e.g:
      
        <script type="text/javascript" src="/the/path/to/the/language/file.js"></ script>
        <script type="text/javascript" src="/the/path/to/the/datepicker/file.js"></ script>
     
*/
            
datePickerController.addEvent(window, "load", function() {
      var opts = {
        // The ID of the associated form element
        id:"dp-js1",
        // The date format to use
        format:"d-sl-m-sl-Y",
        // Days to highlight (starts on Monday)
        highlightDays:[0,0,0,0,0,1,1],
        // Days of the week to disable (starts on Monday)
        disabledDays:[0,0,0,0,0,0,0],
        // Dates to disable (YYYYMMDD format, "*" wildcards excepted)
        disabledDates:{
                "20090601":"20090612", // Range of dates
                "20090622":"1",        // Single date
                "****1225":"1"         // Wildcard example 
                },
        // Date to always enable
        enabledDates:{},
        // Don't fade in the datepicker
        // NOTE: Only relevant if "staticPos" is set to false
        noFadeEffect:false,
        // Is it inline or popup
        staticPos:false,
        // Do we hide the associated form element on create
        hideInput:false,
        // Do we hide the today button
        noToday:true,
        // Do we show weeks along the left hand side
        showWeeks:true,
        // Is it drag disabled
        // NOTE: Only relevant if "staticPos" is set to false
        dragDisabled:true,
        // Positioned the datepicker within a wrapper div of your choice (requires the ID of the wrapper element)
        // NOTE: Only relevant if "staticPos" is set to true
        positioned:"",
        // Do we fill the entire grid with dates
        fillGrid:true,
        // Do we constrain dates not within the current month so that they cannot be selected
        constrainSelection:true,
        // Callback Object
        callbacks:{"create":[createSpanElement], "dateselect":[showEnglishDate]},
        // Do we create the button within a wrapper element of your choice (requires the ID of the wrapper element)
        // NOTE: Only relevant if staticPos is set to false
        buttonWrapper:"",
        // Do we start the cursor on a specific date (YYYYMMDD format string)
        cursorDate:""      
      };
      datePickerController.createDatePicker(opts);
});

// ]]>
</script>

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
if($mode!='add')
{
	if($mode=='view')
	{
		$are_disabled="disabled='disabled'";
		$readonly="readonly='readonly'";
	}
	
	if($mode=='return')
	{
		
		$id=				$current_row['id'];
		
		$username=	$current_row['username'];  
		$password=	$current_row['password'];
		$firstname=	$current_row['firstname'];  
		$middlename=	$current_row['middlename'];  
		$lastname=	$current_row['lastname'];  
		$gender=	$current_row['gender'];  
		$birthdate=	$current_row['birthdate'];  
		$nationality_id=	$current_row['nationality_id'];  
		$country_id= $current_row['country_id'];
		$address=	$current_row['address'];
		$p_o_box= $current_row['p_o_box'];
		$city=	$current_row['city'];  
		$phone= $current_row['phone'];
		$mobile=	$current_row['mobile']; 
		$email=	$current_row['email'];  
		
  		$maritalstatus_id=	$current_row['maritalstatus_id'];  
  		$dependants_count=	$current_row['dependants_count'];  
  		$militarystatus_id=	$current_row['militarystatus_id'];  
  		$car_owner=	$current_row['car_owner'];  
  		$driving_license=	$current_row['driving_license'];  
  		$communication_channel_id=	$current_row['communication_channel_id'];  
  		$position_apply_for=	$current_row['position_apply_for'];  
  		$employment_type_id=	$current_row['employment_type_id'];  
  		$how_soon_can_you_join=	$current_row['how_soon_can_you_join'];  
  		$giza_city_id=	$current_row['giza_city_id'];  
  		$willing_to_travel=	$current_row['willing_to_travel'];  
  		$contact_with_giza_by_id=	$current_row['contact_with_giza_by_id'];  
  		$degree_id=	$current_row['degree_id'];  
  		$university_id=	$current_row['university_id'];  
  		$faculty_id=	$current_row['faculty_id'];  
  		$major_id=	$current_row['major_id'];  
  		$university_completion_date=	$current_row['university_completion_date'];  
  		$grade_id=	$current_row['grade_id'];  
  		$postgraduate_name1=	$current_row['postgraduate_name1'];  
  		$postgraduate_field1=	$current_row['postgraduate_field1'];  
  		$postgraduate_date1=	$current_row['postgraduate_date1'];  
  		$postgraduate_certificate1=	$current_row['postgraduate_certificate1'];  
  		$postgraduate_country1_id=	$current_row['postgraduate_country1_id'];  
  		$postgraduate_name2=	$current_row['postgraduate_name2'];  
  		$postgraduate_field2=	$current_row['postgraduate_field2'];  
  		$postgraduate_date2=	$current_row['postgraduate_date2'];  
  		$postgraduate_certificate2=	$current_row['postgraduate_certificate2'];  
  		$postgraduate_country2_id=	$current_row['postgraduate_country2_id'];  
  		$postgraduate_name3=	$current_row['postgraduate_name3'];  
  		$postgraduate_field3=	$current_row['postgraduate_field3'];  
  		$postgraduate_date3=	$current_row['postgraduate_date3'];  
  		$postgraduate_certificate3=	$current_row['postgraduate_certificate3'];  
  		$postgraduate_country_id3=	$current_row['postgraduate_country_id3'];  
		$other_qualifications=	$current_row['other_qualifications']; 
		$other_academic_education=	$current_row['other_academic_education'];
		$line_of_business_id=	$current_row['line_of_business_id'];  
		$line_of_business_experience_year=	$current_row['line_of_business_experience_year'];  
		$industry_id=	$current_row['industry_id'];  
		$expertise_industry_experience_year=	$current_row['expertise_industry_experience_year'];  
		$language1_id=	$current_row['language1_id'];  
		$language_level1_id=	$current_row['language_level1_id'];  
		$language2_id=	$current_row['language2_id'];  
		$language_level2_id=	$current_row['language_level2_id'];  
		$language3_id=	$current_row['language3_id'];  
		$language_level3_id=	$current_row['language_level3_id'];  
		$computer_skills=	$current_row['computer_skills'];
		$training_course1_name=	$current_row['training_course1_name'];  
		$training_course1_location=	$current_row['training_course1_location'];  
		$training_course1_duration=	$current_row['training_course1_duration'];  
		$training_course2_name=	$current_row['training_course2_name'];  
		$training_course2_location=	$current_row['training_course2_location'];  
		$training_course2_duration=	$current_row['training_course2_duration'];  
		$training_course3_name=	$current_row['training_course3_name'];  
		$training_course3_location=	$current_row['training_course3_location'];  
		$training_course3_duration=	$current_row['training_course3_duration'];  
		$professional_experience_years=	$current_row['professional_experience_years'];  
		$student_internship_experience_years=	$current_row['student_internship_experience_years'];  
		$job1_title=	$current_row['job1_title'];  
		$job1_employer=	$current_row['job1_employer'];  
		$job1_duration=	$current_row['job1_duration'];  
		$job1_duties=	$current_row['job1_duties']; 
		$job2_title=	$current_row['job2_title'];  
		$job2_employer=	$current_row['job2_employer'];  
		$job2_duration=	$current_row['job3_duration'];  
		$job2_duties=	$current_row['job2_duties']; 
		$job3_title=	$current_row['job3_title'];  
		$job3_employer=	$current_row['job3_employer'];  
		$job3_duration=	$current_row['job3_duration'];
		$job3_duties=	$current_row['job3_duties']; 
		$reference1_name=	$current_row['reference1_name'];  
		$reference1_position=	$current_row['reference1_position'];  
		$reference1_organization=	$current_row['reference1_organization'];  
		$reference1_phone=	$current_row['reference1_phone'];  
		$reference1_email=	$current_row['reference1_email'];
		$reference2_name=	$current_row['reference2_name'];  
		$reference2_position=	$current_row['reference2_position'];  
		$reference2_organization=	$current_row['reference2_organization'];  
		$reference2_phone=	$current_row['reference2_phone'];  
		$reference2_email=	$current_row['reference2_email'];
		$reference3_name=	$current_row['reference3_name'];  
		$reference3_position=	$current_row['reference3_position'];  
		$reference3_organization=	$current_row['reference3_organization'];  
		$reference3_phone=	$current_row['reference3_phone'];  
		$reference3_email=	$current_row['reference3_email'];
		$relative1_name=	$current_row['relative1_name'];
		$relative1_department=	$current_row['relative1_department'];
		$relative2_name=	$current_row['relative2_name'];
		$relative2_department=	$current_row['relative2_department'];
		$reason_for_leaving_current_employer=	$current_row['reason_for_leaving_current_employer'];
		$commit_years=	$current_row['commit_years'];
		$immigrate=	$current_row['immigrate'];
		$immigrate_yes=	$current_row['immigrate_yes'];
		$relocating=	$current_row['relocating'];
		$salary=	$current_row['salary'];
		$hobbies=	$current_row['hobbies'];
		$professional_memberships=	$current_row['professional_memberships'];
		$extra_activities=	$current_row['extra_activities'];
		$cv_file=	$current_row['cv_file'];
		$image=	$current_row['image'];
		$job_notification_mail=	$current_row['job_notification_mail'];				
		
			
	}
	else 
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
$this->load->controller(ADMIN.'/Country');
$country_object= new Country();

/**
 * Candidate controller object.
 * 
 * Intialize object from Candidate controller class.
 * @var object.
 */

$this_object= new Candidate();

?>
<SCRIPT type="text/javascript">

$(document).ready(function(){

$("#username").change(function() { 

var usr = $("#username").val().replace(/^\s+|\s+$/g, '');

if(usr.length >= 4)
{
$("#dv_username_false").show();
$("#dv_username_false").html('<img src="<?php echo base_url();?>images/icons/loader.gif" align="absmiddle">&nbsp;Checking availability...');
$("#dv_username_true").html('');
    $.ajax({  
    type: "POST",  
    url: "<?php echo base_url().$this->lang->lang().'/'.ADMIN; ?>/candidate/check_username_availability/<?php echo $id; ?>",  
    data: "username="+ usr,  
    success: function(msg){  
   
   $("#dv_username_false").ajaxComplete(function(event, request, settings){ 

	if(msg == 'OK')
	{ 
        $("#username").removeClass('object_error'); // if necessary
		$("#username").addClass("object_ok");
		$(this).html('');
		$("#dv_username_true").html('&nbsp;<img src="<?php echo base_url();?>images/icons/tick.gif" align="absmiddle">');
	}  
	else  
	{  
		$("#username").removeClass('object_ok'); // if necessary
		$("#username").addClass("object_error");
		$(this).html(msg+"<input type='hidden'  name ='username_not_availabe' id='username_not_availabe' >");
		$("#dv_username_true").html('');
	}  
   
   });

 } 
   
  }); 

}
else
	{
	$("#dv_username_false").show();
	$("#dv_username_false").html('<font color="red"><?php echo lang('username_false'); ?></font>');
	$("#dv_username_true").html('');
	$("#username").removeClass('object_ok'); // if necessary
	$("#username").addClass("object_error");
	}

});



$("#password").change(function() { 

	var password = $("#password").val();
	if(password== "" || password.length < 5)
	{
		$("#dv_password_false").show();
	}
	else
	{
		$("#dv_password_false").hide();
	}
});

$("#password_confirm").change(function() { 
	var password = $("#password").val();
	var password_confirm = $("#password_confirm").val();
	if(password!= password_confirm)
	{
		$("#dv_password_confirm_false").show();
	}
	else
	{
		$("#dv_password_confirm_false").hide();
	}
});


$("#name").change(function() { 

	var name = $("#name").val().replace(/^\s+|\s+$/g, '');
	if(name== "" )
	{
		$("#dv_name_false").show();
	}
	else
	{
		$("#dv_name_false").hide();
	}
});

$("#contact_mobile").change(function() { 
	
	var contact_mobile = $("#contact_mobile").val().replace(/^\s+|\s+$/g, '');
	var regexObj = /[^0-9]/;
	if(contact_mobile != "" && regexObj.test(contact_mobile)== flase)
	{
		$("#dv_contact_mobile_false").show();
	}
	else
	{
		$("#dv_contact_mobile_false").hide();
	}
});

$("#phone").change(function() { 

	var phone = $("#phone").val().replace(/^\s+|\s+$/g, '');
	var regexObj = /[^0-9]/;
	if(phone != "" && regexObj.test(phone)== flase)
	{
		$("#dv_phone_false").show();
	}
	else
	{
		$("#dv_phone_false").hide();
	}
});

$("#contact_email").change(function() { 

	var contact_email = $("#contact_email").val().replace(/^\s+|\s+$/g, '');
	var regexObj = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	if(contact_email != "" && regexObj.test(contact_email)== flase)
	{
		$("#dv_contact_email_false").show();
	}
	else
	{
		$("#dv_contact_email_false").hide();
	}
});

});
</SCRIPT>

<script>
function PopupCenter(pageURL, title,w,h) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=1, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}
</script>



<div class="row-fluid sortable">
<div class="box span12">
<div class="box-header well" data-original-title>
<h2><i class="icon-edit"></i> <?php echo lang('candidates')?></h2>
<div class="box-icon">
	<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
	<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
	<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
</div>

</div>
<div class="box-content">
<form class="form-horizontal" id='frm_candidate_row' name='frm_candidate_row'  method='post' enctype='multipart/form-data'>

<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
<input type="hidden" name="last_modify_date" id="last_modify_date" value="<?php echo $last_modify_date; ?>"> 


	<fieldset>
	
	<div class="form-actions">
	<a class='btn btn-success' href='<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/candidate/table'>
				<i class='icon-zoom-in icon-white'></i>  
				<?php  echo $this->lang->line('lnk_view_all'); ?>                                           
	</a>
		
	<?php if($mode=='view') { 
	$readonly="readonly='readonly'";
	
if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_add)) {
	
	
	?>
	
	<a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/candidate/form/0/add">
	<i class='icon-edit icon-white'></i>
	<?php  echo $this->lang->line('btn_add'); ?>
	</a>
	
	<?php 
}

if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_edit)) {

	?>
	
    <a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/candidate/form/<?php echo $id;?>/edit">
    <i class='icon-edit icon-white'></i>  
	<?php  echo $this->lang->line('btn_edit'); ?>
	</a>
		
<?php 
}

if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_delete)) {

?>		
		
	<a class='btn btn-danger' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/candidate/delete/<?php echo $id;?>" onclick="return delete_confirm('<?php echo $this->lang->lang(); ?>')">
	<i class='icon-trash icon-white'></i> 
	<?php  echo $this->lang->line('btn_delete'); ?>
	</a>
<?php }?>	
	
	<?php }?>	

</div>


<div  align="center" style="height: 50px">
		<?php 
		if(isset($error)) {
			echo "<div class='alert alert-error'>
							<button type='button' class='close' data-dismiss='alert'>×</button>
							 $error.
						</div>";
		}
		?>
		<?php 
		if(isset($message)) {
			echo "<div class='alert alert-success'>
							<button type='button' class='close' data-dismiss='alert'>×</button>
							 $message.
						</div>";
		}
		?>
 </div>	
 

<br/>
								<!--group-->
									<div class="group">
										<div class="control-group">
										<label class="control-label" for="focusedInput"><?php echo lang('username'); ?></label>
										<div class="controls">
										  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="username" id="username" value="<?php echo $username; ?>">
											
											<div id="dv_username_true"></div>
											<div class="dv_error"  id="dv_username_false" style="display:none;"><?php echo lang('username_false'); ?></div>
										
										</div>
									  </div>
									  
									  <div class="control-group">
										<label class="control-label" for="focusedInput"><?php echo lang('password'); ?></label>
										<div class="controls">
										  <input class="input-xlarge focused" type="password" <?php echo $readonly; ?> name="password" id="password" value="<?php echo $password; ?>">
										<div class="dv_error" id="dv_password_false" style="display:none"><?php echo lang('password_false'); ?></div>
										
										</div>
									  	</div>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('firstname'); ?> *</label>
											<div class="controls"><input type="text" name="firstname" id="firstname" value="<?php echo $firstname; ?>" class="text required" /></div>
											<div class="clear"></div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('middlename'); ?></label>
											<div class="controls"><input type="text" name="middlename" id="middlename" value="<?php echo $middlename; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('lastname'); ?> *</label>
											<div class="controls"><input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>" class="text required" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('gender'); ?> *</label>
											<div class="controls">
											 <select  name="gender" id="gender" class="required">
												<option value="Male" <?php if($gender=='Male'){echo "selected='selected'";} ?>>Male</option>
                                                <option value="Female" <?php if($gender=='Female'){echo "selected='selected'";} ?>>Female</option>			
                                            </select>
											</div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('birthdate'); ?> </label>
											<div class="controls">
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
											
											</div>
											<div class="clear"></div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('nationality_id'); ?> *</label>
											<div class="controls"><?php $dropdowns->drpdwn_country($this_object, $nationality_id,'nationality_id',$are_disabled); ?></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('address'); ?> *</label>
											<div class="controls"><input type="text" name="address" id="address" value="<?php echo $address; ?>" class="text required" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('p_o_box'); ?></label>
											<div class="controls"><input type="text" name="p_o_box" id="p_o_box" value="<?php echo $p_o_box; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('city'); ?> *</label>
											<div class="controls"><input type="text" name="city" id="city" value="<?php echo $city; ?>" class="text required" /></div>
											<div class="clear"></div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('country'); ?> *</label>
											<div class="controls"><?php $dropdowns->drpdwn_country($this_object, $country_id,'country_id',"class='required'"); ?></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('phone'); ?> *</label>
											<div class="controls"><input type="text" name="phone" id="phone" value="<?php echo $phone; ?>" class="text digits required" /></div>
											 Format: 029876543
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('mobile'); ?> *</label>
											<div class="controls"><input type="text" name="mobile" id="mobile" value="<?php echo $mobile; ?>" class="text digits required" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('email'); ?> *</label>
											<div class="controls"><input type="text" name="email" id="email" value="<?php echo $email; ?>" class="text email required" /></div>
											<div class="clear"></div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('hr_marital_status'); ?> *</label>
											<div class="controls"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_marital_status', $maritalstatus_id,'maritalstatus_id',"class='required'"); ?></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('dependants_count'); ?> *</label>
											<div class="controls"><input type="text" name="dependants_count" id="dependants_count" value="<?php echo $dependants_count; ?>" class="text required" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('hr_military_status'); ?> *</label>
											<div class="controls"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_military_status', $militarystatus_id,'militarystatus_id',"class='required'"); ?></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('car_owner'); ?> </label>
											<div class="controls">
											<select  name="car_owner" id="car_owner">
											
											<option value="Yes" <?php if($car_owner=='Yes'){echo "selected='selected'";} ?>>Yes</option>
                                            <option value="No" <?php if($car_owner=='No'){echo "selected='selected'";} ?>>No</option>			
                                            </select>
											</div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('driving_license'); ?> </label>
											<div class="controls">
											<select  name="driving_license" id="driving_license">
											<option value="Yes" <?php if($driving_license=='Yes'){echo "selected='selected'";} ?>>Yes</option>
                                            <option value="No" <?php if($driving_license=='No'){echo "selected='selected'";} ?>>No</option>			
                                            </select>
											</div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('hr_communication_channel'); ?> </label>
											<div class="controls"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_communication_channel', $communication_channel_id,'communication_channel_id',$are_disabled); ?></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('position_apply_for'); ?> </label>
											<div class="controls"><input type="text" name="position_apply_for" id="position_apply_for" value="<?php echo $position_apply_for; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('hr_employment_type'); ?> </label>
											<div class="controls"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_employment_type', $employment_type_id,'employment_type_id',$are_disabled); ?></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('hr_city_preferred_to_work'); ?> </label>
											<div class="controls"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_city_preferred_to_work', $giza_city_id,'giza_city_id',$are_disabled); ?></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('willing_to_travel'); ?> </label>
											<div class="controls">
											<select  name="willing_to_travel" id="willing_to_travel">
											<option value="Yes" <?php if($willing_to_travel=='Yes'){echo "selected='selected'";} ?>>Yes</option>
                                            <option value="No" <?php if($willing_to_travel=='No'){echo "selected='selected'";} ?>>No</option>			
                                            </select>
											</div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('hr_time_to_join'); ?> </label>
											<div class="controls"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_time_to_join', $how_soon_can_you_join,'how_soon_can_you_join',$are_disabled); ?></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('hr_contact_with_giza_by'); ?> </label>
											<div class="controls"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_contact_with_giza_by', $contact_with_giza_by_id,'contact_with_giza_by_id',$are_disabled); ?></div>
											<div class="clear"></div>
										</div>
										
										
									</div>	
									<!--/group-->
									<!--group-->
									<div class="group">
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('degree'); ?> *</label>
											<div class="controls"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_degree', $degree_id,'degree_id',"class='required'"); ?></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('university'); ?> *</label>
											<div class="controls"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_university', $university_id,'university_id',"class='required'"); ?></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('faculty'); ?> *</label>
											<div class="controls"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_faculty', $faculty_id,'faculty_id',"class='required'"); ?></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('major'); ?> *</label>
											<div class="controls"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_major', $major_id,'major_id',"class='required'"); ?></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('university_completion_date'); ?> *</label>
											<div class="controls">
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
											</div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('grade'); ?> *</label>
											<div class="controls"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_grade', $grade_id,'grade_id',"class='required'"); ?></div>
											<div class="clear"></div>
										</div>
										
										
										
										
										
										
										
										<div id="dv_post_graduate_1">
										<br/>
										<?php echo lang('post_graduate_study').' 1:'; ?>
										<br/>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('postgraduate_name'); ?> </label>
											<div class="controls"><input type="text" name="postgraduate_name1" id="postgraduate_name1" value="<?php echo $postgraduate_name1; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('postgraduate_field'); ?> </label>
											<div class="controls"><input type="text" name="postgraduate_field1" id="postgraduate_field1" value="<?php echo $postgraduate_field1; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('postgraduate_date'); ?> </label>
											<div class="controls">
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
											
											</div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('postgraduate_certificate'); ?> </label>
											<div class="controls"><input type="text" name="postgraduate_certificate1" id="postgraduate_certificate1" value="<?php echo $postgraduate_certificate1; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('country'); ?> </label>
											<div class="controls"><?php $dropdowns->drpdwn_country($this_object, $postgraduate_country1_id,'postgraduate_country1_id',$are_disabled); ?></div>
											<div class="clear"></div>
										</div>
										
										<div id="dv_post_graduate_lnk_1" align="right"><a href ="javascript:void(0)" onclick="document.getElementById('dv_post_graduate_2').style.display='block';document.getElementById('dv_post_graduate_lnk_1').style.display='none'" ><?php echo lang('add_another'); ?></a></div>
                                            
										</div>
										
										
										
										
										
										<div id="dv_post_graduate_2" style=" display:none">
										<br/>
										<?php echo lang('post_graduate_study').' 2:'; ?>
										<br/>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('postgraduate_name'); ?> </label>
											<div class="controls"><input type="text" name="postgraduate_name2" id="postgraduate_name2" value="<?php echo $postgraduate_name2; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('postgraduate_field'); ?> </label>
											<div class="controls"><input type="text" name="postgraduate_field2" id="postgraduate_field2" value="<?php echo $postgraduate_field2; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('postgraduate_date'); ?> </label>
											<div class="controls">
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
											
											</div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('postgraduate_certificate'); ?> </label>
											<div class="controls"><input type="text" name="postgraduate_certificate2" id="postgraduate_certificate2" value="<?php echo $postgraduate_certificate2; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('country'); ?> </label>
											<div class="controls"><?php $dropdowns->drpdwn_country($this_object, $postgraduate_country2_id,'postgraduate_country2_id',$are_disabled); ?></div>
											<div class="clear"></div>
										</div>
										
										<div id="dv_post_graduate_lnk_2" align="right"><a href ="javascript:void(0)" onclick="document.getElementById('dv_post_graduate_3').style.display='block';document.getElementById('dv_post_graduate_lnk_2').style.display='none'" ><?php echo lang('add_another'); ?></a></div>
                                            
										</div>
										
										
										
										
										
										
										
										
										
										
										<div id="dv_post_graduate_3" style=" display:none">
										<br/>
										<?php echo lang('post_graduate_study').' 3:'; ?>
										<br/>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('postgraduate_name'); ?> </label>
											<div class="controls"><input type="text" name="postgraduate_name3" id="postgraduate_name3" value="<?php echo $postgraduate_name3; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('postgraduate_field'); ?> </label>
											<div class="controls"><input type="text" name="postgraduate_field3" id="postgraduate_field3" value="<?php echo $postgraduate_field3; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('postgraduate_date'); ?> </label>
											<div class="controls">
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
											
											</div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('postgraduate_certificate'); ?> </label>
											<div class="controls"><input type="text" name="postgraduate_certificate3" id="postgraduate_certificate3" value="<?php echo $postgraduate_certificate3; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('country'); ?> </label>
											<div class="controls"><?php $dropdowns->drpdwn_country($this_object, $postgraduate_country_id3,'postgraduate_country_id3',$are_disabled); ?></div>
											<div class="clear"></div>
										</div>
										
										   
										</div>
										
										
										
																	
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('other_qualifications'); ?> </label>
											<div class="controls"><textarea type="text" name="other_qualifications" id="other_qualifications"  ><?php echo $other_qualifications; ?></textarea></div>
											<div class="clear"></div>
										</div>
										<br/><br/><br/><br/><br/>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('other_academic_education'); ?> </label>
											<div class="controls"><textarea type="text" name="other_academic_education" id="other_academic_education"  ><?php echo $other_academic_education; ?></textarea></div>
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
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('line_of_business'); ?> </label>
											<div class="controls">
											<?php $dropdowns->drpdwn_solution($this_object, '','solution_id',"style='"); ?>
											<br/><br/>
											<div id="dv_businessline" >
											<?php $dropdowns->drpdwn_businessline($this_object, $line_of_business_id,'line_of_business_id',""); ?>
											</div>
											<br/>
	                                         <?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_experience_year', $line_of_business_experience_year,'line_of_business_experience_year',"style='width:150px'"); ?>

											
											</div>
											<div class="clear"></div>
										</div>
										<div class="clear"></div><br/>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('industry_sector'); ?> </label>
											<div class="controls">
											<?php $dropdowns->drpdwn_industry($this_object, $industry_id,'industry_id',"style='width:200px'"); ?>
											<?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_experience_year', $expertise_industry_experience_year,'expertise_industry_experience_year',"style='width:150px'"); ?>

											
											</div>
											<div class="clear"></div>
										</div>
										
										<br/>
										<?php echo lang('languages_and_computer_skills'); ?>
										<br/>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('language').' 1'; ?> </label>
											<div class="controls">
											<?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_language', $language1_id,'language1_id',"style='width:200px'"); ?>
											<?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_language_level', $language_level1_id,'language_level1_id',"style='width:150px'"); ?>

											
											</div>
											<div class="clear"></div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('language').' 2'; ?> </label>
											<div class="controls">
											<?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_language', $language2_id,'language2_id',"style='width:200px'"); ?>
											<?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_language_level', $language_level2_id,'language_level2_id',"style='width:150px'"); ?>

											
											</div>
											<div class="clear"></div>
										</div>
																				
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('language').' 3'; ?> </label>
											<div class="controls">
											<?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_language', $language3_id,'language3_id',"style='width:200px'"); ?>
											<?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_language_level', $language_level3_id,'language_level3_id',"style='width:150px'"); ?>

											
											</div>
											<div class="clear"></div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('computer_skills'); ?></label>
											<div class="controls"><textarea type="text" name="computer_skills" id="computer_skills"  ><?php echo $computer_skills; ?></textarea></div>
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
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('training_course_name'); ?> </label>
											<div class="controls"><input type="text" name="training_course1_name" id="training_course1_name" value="<?php echo $training_course1_name; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('training_course_location'); ?> </label>
											<div class="controls"><input type="text" name="training_course1_location" id="training_course1_location" value="<?php echo $training_course1_location; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('training_course_duration'); ?> </label>
											<div class="controls"><input type="text" name="training_course1_duration" id="training_course1_duration" value="<?php echo $training_course1_duration; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										
										<div id="dv_course_lnk_1" align="right"><a href ="javascript:void(0)" onclick="document.getElementById('dv_course_2').style.display='block';document.getElementById('dv_course_lnk_1').style.display='none'" ><?php echo lang('add_another'); ?></a></div>

										</div>
										
										
										
									<div id="dv_course_2"  style=" display:none">
										<br/>
										<?php echo lang('course').' 2:'; ?>
										<br/>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('training_course_name'); ?> </label>
											<div class="controls"><input type="text" name="training_course2_name" id="training_course2_name" value="<?php echo $training_course2_name; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('training_course_location'); ?> </label>
											<div class="controls"><input type="text" name="training_course2_location" id="training_course2_location" value="<?php echo $training_course2_location; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('training_course_duration'); ?> </label>
											<div class="controls"><input type="text" name="training_course2_duration" id="training_course2_duration" value="<?php echo $training_course2_duration; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										
										<div id="dv_course_lnk_2" align="right"><a href ="javascript:void(0)" onclick="document.getElementById('dv_course_3').style.display='block';document.getElementById('dv_course_lnk_2').style.display='none'" ><?php echo lang('add_another'); ?></a></div>
                                            
										</div>
										
										
										
										<div id="dv_course_3"  style=" display:none">
										<br/>
										<?php echo lang('course').' 3:'; ?>
										<br/>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('training_course_name'); ?> </label>
											<div class="controls"><input type="text" name="training_course3_name" id="training_course3_name" value="<?php echo $training_course3_name; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('training_course_location'); ?> </label>
											<div class="controls"><input type="text" name="training_course3_location" id="training_course3_location" value="<?php echo $training_course3_location; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('training_course_duration'); ?> </label>
											<div class="controls"><input type="text" name="training_course3_duration" id="training_course3_duration" value="<?php echo $training_course3_duration; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										
                                            
										</div>
										
										
										<br/>
										<?php echo lang('work_experience'); ?>
										<br/>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('professional_experience'); ?> </label>
											<div class="controls">
											<?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_experience_year', $professional_experience_years,'professional_experience_years',""); ?>
											</div>
											<div class="clear"></div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('experience_but_not_work'); ?> </label>
											<div class="controls">
											<?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_experience_year', $student_internship_experience_years,'student_internship_experience_years',""); ?>
											</div>
											<div class="clear"></div>
										</div>
										
										
										<div id="dv_job_list_1">
										<br/>
										<?php echo lang('please_list_jobs'); ?>
										<br/>
										<br/>
										<?php echo lang('job').' 1:'; ?>
										<br/>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('job_title'); ?> </label>
											<div class="controls"><input type="text" name="job1_title" id="job1_title" value="<?php echo $job1_title; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('job_employer'); ?> </label>
											<div class="controls"><input type="text" name="job1_employer" id="job1_employer" value="<?php echo $job1_employer; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('job_duration'); ?> </label>
											<div class="controls"><input type="text" name="job1_duration" id="job1_duration" value="<?php echo $job1_duration; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('job_duties'); ?> </label>
											<div class="controls"><textarea type="text" name="job1_duties" id="job1_duties"  ><?php echo $job1_duties; ?></textarea></div>
											<div class="clear"></div>
										</div>
										<br/><br/><br/><br/><br/>
										
										
										<div id="dv_job_list_lnk_1" align="right"><a href ="javascript:void(0)" onclick="document.getElementById('dv_job_list_2').style.display='block';document.getElementById('dv_job_list_lnk_1').style.display='none'" ><?php echo lang('add_another'); ?></a></div>

										</div>
										
										
										<div id="dv_job_list_2" style=" display:none">
										<br/>
										<?php echo lang('job').' 2:'; ?>
										<br/>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('job_title'); ?> </label>
											<div class="controls"><input type="text" name="job2_title" id="job2_title" value="<?php echo $job2_title; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('job_employer'); ?> </label>
											<div class="controls"><input type="text" name="job2_employer" id="job2_employer" value="<?php echo $job2_employer; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('job_duration'); ?> </label>
											<div class="controls"><input type="text" name="job2_duration" id="job2_duration" value="<?php echo $job2_duration; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('job_duties'); ?> </label>
											<div class="controls"><textarea type="text" name="job2_duties" id="job2_duties"  ><?php echo $job2_duties; ?></textarea></div>
											<div class="clear"></div>
										</div>
										<br/><br/><br/><br/><br/>
										
										<div id="dv_job_list_lnk_2" align="right"><a href ="javascript:void(0)" onclick="document.getElementById('dv_job_list_3').style.display='block';document.getElementById('dv_job_list_lnk_2').style.display='none'" ><?php echo lang('add_another'); ?></a></div>

										</div>
										
										<div id="dv_job_list_3" style=" display:none">
										<br/>
										<?php echo lang('job').' 3:'; ?>
										<br/>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('job_title'); ?> </label>
											<div class="controls"><input type="text" name="job3_title" id="job3_title" value="<?php echo $job3_title; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('job_employer'); ?> </label>
											<div class="controls"><input type="text" name="job3_employer" id="job3_employer" value="<?php echo $job3_employer; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('job_duration'); ?> </label>
											<div class="controls"><input type="text" name="job3_duration" id="job3_duration" value="<?php echo $job3_duration; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('job_duties'); ?> </label>
											<div class="controls"><textarea type="text" name="job3_duties" id="job3_duties"  ><?php echo $job3_duties; ?></textarea></div>
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
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('name'); ?> </label>
											<div class="controls"><input type="text" name="reference1_name" id="reference1_name" value="<?php echo $reference1_name; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('position'); ?> </label>
											<div class="controls"><input type="text" name="reference1_position" id="reference1_position" value="<?php echo $reference1_position; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('organization'); ?> </label>
											<div class="controls"><input type="text" name="reference1_organization" id="reference1_organization" value="<?php echo $reference1_organization; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('phone'); ?> </label>
											<div class="controls"><input type="text" name="reference1_phone" id="reference1_phone" value="<?php echo $reference1_phone; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('email'); ?> </label>
											<div class="controls"><input type="text" name="reference1_email" id="reference1_email" value="<?php echo $reference1_email; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										
										<div id="dv_reference_list_lnk_1" align="right"><a href ="javascript:void(0)" onclick="document.getElementById('dv_reference_list_2').style.display='block';document.getElementById('dv_reference_list_lnk_1').style.display='none'" ><?php echo lang('add_another'); ?></a></div>
										</div>
										
										
										<div id="dv_reference_list_2" style=" display:none">
										<br/>
										<?php echo lang('reference').' 2:'; ?>
										<br/>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('name'); ?> </label>
											<div class="controls"><input type="text" name="reference2_name" id="reference2_name" value="<?php echo $reference2_name; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('position'); ?> </label>
											<div class="controls"><input type="text" name="reference2_position" id="reference2_position" value="<?php echo $reference2_position; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('organization'); ?> </label>
											<div class="controls"><input type="text" name="reference2_organization" id="reference2_organization" value="<?php echo $reference2_organization; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('phone'); ?> </label>
											<div class="controls"><input type="text" name="reference2_phone" id="reference2_phone" value="<?php echo $reference2_phone; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('email'); ?> </label>
											<div class="controls"><input type="text" name="reference2_email" id="reference2_email" value="<?php echo $reference2_email; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										
										
										<div id="dv_reference_list_lnk_2" align="right"><a href ="javascript:void(0)" onclick="document.getElementById('dv_reference_list_3').style.display='block';document.getElementById('dv_reference_list_lnk_2').style.display='none'" ><?php echo lang('add_another'); ?></a></div>

										</div>
										
										


										<div id="dv_reference_list_3" style=" display:none">
										
										<br/>
										<?php echo lang('reference').' 3:'; ?>
										<br/>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('name'); ?> </label>
											<div class="controls"><input type="text" name="reference3_name" id="reference3_name" value="<?php echo $reference3_name; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('position'); ?> </label>
											<div class="controls"><input type="text" name="reference3_position" id="reference3_position" value="<?php echo $reference3_position; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('organization'); ?> </label>
											<div class="controls"><input type="text" name="reference3_organization" id="reference3_organization" value="<?php echo $reference3_organization; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('phone'); ?> </label>
											<div class="controls"><input type="text" name="reference3_phone" id="reference3_phone" value="<?php echo $reference3_phone; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('email'); ?> </label>
											<div class="controls"><input type="text" name="reference3_email" id="reference3_email" value="<?php echo $reference3_email; ?>" class="text" /></div>
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
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('name'); ?> </label>
											<div class="controls"><input type="text" name="relative1_name" id="relative1_name" value="<?php echo $relative1_name; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('department'); ?> </label>
											<div class="controls"><input type="text" name="relative1_department" id="relative1_department" value="<?php echo $relative1_department; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
									
										<div id="dv_relative_list_lnk_1" align="right"><a href ="javascript:void(0)" onclick="document.getElementById('dv_relative_list_2').style.display='block';document.getElementById('dv_relative_list_lnk_1').style.display='none'" ><?php echo lang('add_another'); ?></a></div>

										</div>
										
										<div id="dv_relative_list_2" style=" display:none">
										<br/>
										<?php echo lang('relative').' 2:'; ?>
										<br/>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('name'); ?> </label>
											<div class="controls"><input type="text" name="relative2_name" id="relative2_name" value="<?php echo $relative2_name; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('department'); ?> </label>
											<div class="controls"><input type="text" name="relative2_department" id="relative2_department" value="<?php echo $relative2_department; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>

										</div>


										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('reason_for_leaving_current_employer'); ?> </label>
											<div class="controls"><input type="text" name="reason_for_leaving_current_employer" id="reason_for_leaving_current_employer" value="<?php echo $reason_for_leaving_current_employer; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('immigrate'); ?> </label>
											<div class="controls">
											<select  name="immigrate" id="immigrate">
											<option value="Yes" <?php if($immigrate=='Yes'){echo "selected='selected'";} ?>>Yes</option>
                                            <option value="No" <?php if($immigrate=='No'){echo "selected='selected'";} ?>>No</option>			
                                            </select>
											</div>
											<div class="clear"></div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('if_yes'); ?> </label>
											<div class="controls"><input type="text" name="immigrate_yes" id="immigrate_yes" value="<?php echo $immigrate_yes; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('relocating'); ?> </label>
											<div class="controls">
											<select  name="relocating" id="relocating">
											<option value="Yes" <?php if($relocating=='Yes'){echo "selected='selected'";} ?>>Yes</option>
                                            <option value="No" <?php if($relocating=='No'){echo "selected='selected'";} ?>>No</option>			
                                            </select>
											</div>
											<div class="clear"></div>
										</div>
										<br/>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('salary'); ?> </label>
											<div class="controls"><input type="text" name="salary" id="salary" value="<?php echo $salary; ?>" class="text" /></div>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('hobbies'); ?> </label>
											<div class="controls"><textarea type="text" name="hobbies" id="hobbies"  ><?php echo $hobbies; ?></textarea></div>
											<div class="clear"></div>
										</div>
											<br/><br/><br/><br/><br/><br/><br/>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('professional_memberships'); ?> </label>
											<div class="controls"><textarea type="text" name="professional_memberships" id="professional_memberships"  ><?php echo $professional_memberships; ?></textarea></div>
											<div class="clear"></div>
										</div>
										<div class="clear"></div><div class="clear"></div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('extra_activities'); ?> </label>
											<div class="controls"><textarea type="text" name="extra_activities" id="extra_activities"  ><?php echo $extra_activities; ?></textarea></div>
											<div class="clear"></div>
										</div>
										<div class="clear"></div><div class="clear"></div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('cv_file'); ?> </label>
											<div class="controls"><input type="file" name="cv_file" id="cv_file" class="text" /></div>
											<?php if($cv_file!='') {
												$cv_file_path=base_url().$cv_file;
												echo "<a href='$cv_file_path' >".lang('cv')." </a>";
											}?>
											<div class="clear"></div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('image'); ?> </label>
											<div class="controls"><input type="file" name="image" id="image" class="text" /></div>
											<?php if($image!='') {
												$image_path=base_url().$image;
												echo "<img src='$image_path' title='$image' width='120px' height='80px'/>";
											}?>
											<div class="clear"></div>
										</div>
										
										
										<div class="control-group">
											<label class="control-label" for="focusedInput"><?php echo lang('job_notification_mail'); ?> </label>
											<div class="controls">
											<select  name="job_notification_mail" id="job_notification_mail" style="width: 150px">
											<option value="Yes" <?php if($job_notification_mail=='Yes'){echo "selected='selected'";} ?>>Yes</option>
                                            <option value="No" <?php if($job_notification_mail=='No'){echo "selected='selected'";} ?>>No</option>			
                                            </select>
											</div>
											<div class="clear"></div>
										</div>



									</div>
									<!--/group-->
							  




<div class="form-actions">
<?php if($mode!='view') { ?>
<input type="submit" class="btn btn-primary" name="smt_save" id="smt_save" value="<?php echo lang('btn_save'); ?>" onclick="return validate_form('<?php echo $this->lang->lang(); ?>'); " />
<a class='btn btn-warning' href="javascript: history.go(-1)"><?php echo lang('btn_cancel'); ?></a><?php }?>
</div>
</fieldset>
					 </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			

<?php $this->load->view('admin/includes/footer'); ?>
    