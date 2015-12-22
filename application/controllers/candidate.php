<?php
/**
 * Candidate controller file.
 *
 * Contains controller class of the candidate entity.
 *
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 * @copyright	Copyright (c) 2013, Info-cast.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://www.infocast-me.com
 * @since		Version 2.0
 * @filesource
 */

// ------------------------------------------------------------------------

require(APPPATH.'controllers/'.ADMIN.'/email_setting.php');


/**
 * Controller class for the candidate page.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Candidate extends Ci_Controller
{ 	
	/**
	 * store this controller candidate table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='hr_candidate';
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Candidate_model', 'Candidate_model' , True);
		$this->load->model('Menu_link_model', 'Menu_link_model' , True);
		$this->load->model('Industry_model', 'Industry_model' , True);
		$this->load->model('Solution_model', 'Solution_model' , True);
		$this->load->model('Email_template_model', 'Email_template_model' , True);
		$this->load->model('Static_page_banner_model', 'Static_page_banner_model' , True);
		
		
		$this->load->controller('Website');
		$website_object= new Website();
		$website_object->load();
				
		$this->load->library('session');
		
	}
	
	function login()
	{
		$data=array();
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('candidate_login');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$candidate_session_id=$this->session->userdata('candidate_session_id');
		if($candidate_session_id)
		{
			redirect(base_url().$this->lang->lang().'/candidate/home');
		}
		/*
		if(isset($_POST['smt_login']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			if($this->checkAuth($username,$password))
			{
				redirect(base_url().$this->lang->lang().'/candidate/index');				
			}
			else
			{
				$data['login_error']=lang('login_invalid');
			}
		}
		*/
		
		$this->load->view('website/candidate/login', $data);		
	}
	
	function authourize()
	{
		$data=array();
		$candidate_session_id=$this->session->userdata('candidate_session_id');
		if($candidate_session_id)
		{
			redirect(base_url().$this->lang->lang().'/candidate/index');
		}
		//if(isset($_POST['smt_login']))
		//{
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			if($this->checkAuth($username,$password))
			{
				redirect(base_url().$this->lang->lang().'/candidate/home');				
			}
			else
			{
				$data['login_error']=lang('login_invalid');
			}
		//}
		
		$this->load->view('website/candidate/login', $data);		
	}
	
	function home()
	{
		$data=array();
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('candidate_home');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$candidate_session=$this->session->userdata('candidate_session');
		if(!$candidate_session)
		{
			redirect(base_url().$this->lang->lang().'/candidate/login');
		}
		
		$this->load->view('website/candidate/home', $data);		
	}
	
	function checkAuth($username='',$password='')
	{
		$row_data=$this->Candidate_model->get_by_username_and_password($username,$password);
		$count=count($row_data);
		if($count>0)
		{
			$this->session->set_userdata('candidate_session_id',$row_data->id);
			$this->session->set_userdata('candidate_session',$row_data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('candidate_session_id');
		$this->session->unset_userdata('candidate_session');
		redirect(base_url().$this->lang->lang()."/candidate/login");
	}
	
	function forgetPassword()
	{
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('candidate_forget');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$this->load->view('website/candidate/forget_password');		
	}
	
	function sendPassword()
	{
		$email=$_POST['email'];
		
		$row_data=$this->Candidate_model->get_by_email($email);
		$count=count($row_data);
		if($count>0) { 
			$this->session->set_userdata('message_session',lang('password_sent_successfully'));
				
			$name=$row_data->firstname;
			$username=$row_data->username;
			$password=$row_data->password;
				/*
				 * Send email to candidate
				 */
				//--------------------------------------------------------------------------------------
				$email_template_row=$this->Email_template_model->get_by_purpose('candidate_forget_password');
				$count_email_template_row=count($email_template_row);
				if($count_email_template_row>0) {
					
					$email_active=$email_template_row->active;
					$email_subject=$email_template_row->subject;
					//$email_body=$email_template_row->body;
					
					$email_body=$this->getEmailBody('forgetpassword');
					
					$email_body= str_replace('#@#@#@',$name, $email_body);
					$email_body= str_replace('#&#&#&',$username, $email_body);
					$email_body= str_replace('#*#*#*',$password, $email_body);
				
					$email_body= str_replace('#!#!#!', "<a href='".base_url().$this->lang->lang().'/candidate/login'."'>".lang('login')."</a>" , $email_body);
					//$email_body= str_replace('#%#%#%', "<a href='".base_url().$this->lang->lang()."/candidate/activate/$active_code'>".lang('activate')."</a>" , $email_body);
					$email_body= str_replace('#^#^#^','http://www.gizasystems.com', $email_body);
				
					
					if($email_active==1) {
						$email=$_POST['email'];
						$emailSetting= new EmailSetting();
						$sending_email=$emailSetting->send_email($email, $email_subject, $email_body);
					}
				}
				
				//---------------------------------------------------------------------------------------
				
		
		} else {
			$this->session->set_userdata('message_session',lang('this_not_exist_in_db'));
		}
		redirect(base_url().$this->lang->lang().'/candidate/result');
		
	}	
	
	/**
	 * Index Method.
	 *
	 * Default method for each controller, called when no method name path through URL. 
	 *
	 * @access	public
	 */	
	public function index($alias='')
	{	
		redirect(base_url().$this->lang->lang().'/candidate/login');
	}
	
	/**
	 * profile Method.
	 *
	 * profile method used in registeration and updating profile.
	 * 
	 *  @access	public
	 */	
	public function profile()
	{ 
		$data=array();
		//$data['industry_rows'] = $this->Industry_model->get_all();
		//$data['solution_rows'] = $this->Solution_model->get_all();
		
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('candidate_profile');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		
		$data['title']=lang('sign_up');
		$id=0;
		if($this->session->userdata('candidate_session_id')) {
			$id= $this->session->userdata('candidate_session_id');
		}
		
        if($id!=0){	
			$data['current_row'] = $this->Candidate_model->get_by_id('',$id);
		
        } 
        
        
        //$data['mode']= $mode;

        //-----------------------------------------------------------------
        $message_session=$this->session->userdata('message_session');
		if($message_session) {
        	$data['message']= $message_session;
        	$this->session->unset_userdata('message_session');
		}
        //-----------------------------------------------------------------
        
		
        
		$this->load->view('website/candidate/profile',$data);
	}
	
	public function save()
	{ 	
		$id=0;
		if($this->session->userdata('candidate_session_id')) {
			$id= $this->session->userdata('candidate_session_id');
		}
		
		$dateTime = new DateTime(); 
		$current_date=$dateTime->format("Y-m-d H:i:s");

		
		
		if($_FILES['image']['name']!="") {
			$userfile_name = $_FILES['image']['name']; // file name  
			$userfile_tmp  = $_FILES['image']['tmp_name']; // actual location  
			$userfile_size  = $_FILES['image']['size']; // file size  
			$userfile_type  = $_FILES['image']['type']; // mime type of file sent by browser. PHP doesn't check it.  
			$userfile_error  = $_FILES['image']['error'];
							
			$extension = end(explode('.', $_FILES['image']['name']));
			
			 // Add image file, to solve conflict if i upload banner and image as image, will take
			 // same name.
			 	
			$name_file_timestamp=strtotime($current_date).'_image';
				
			$uplad_path_file=getcwd().'/added/uploads/candidate/' . $name_file_timestamp.'.'.$extension;
		
			//if ($userfile_type!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
			if(move_uploaded_file($_FILES["image"]["tmp_name"], $uplad_path_file))
			{
				
				if($id==0) {
					$image = '/added/uploads/candidate/'.$name_file_timestamp.'.'.$extension;
							
				} else {
						
				if($_FILES['image']['name']!='') {
					
					$image=$this->Candidate_model->get_image_by_id($this->table, $id);
					$image_path=getcwd().$image;
					if(isset($image_path) && $image_path!=getcwd()) {
					unlink($image_path);
					}
					$image = '/added/uploads/candidate/'.$name_file_timestamp.'.'.$extension;
					
				} else {
					$image = $this->Candidate_model->get_image_by_id($this->table, $id);;
				}
					
				}
			}
			
			
		}else {
			if($id==0) {
					$image = '';
							
				} else { 
					$image = $this->Candidate_model->get_image_by_id($this->table, $id);
				}
			}
		
		
		if($_FILES['cv_file']['name']!="") {
			$userfile_name = $_FILES['cv_file']['name']; // file name  
			$userfile_tmp  = $_FILES['cv_file']['tmp_name']; // actual location  
			$userfile_size  = $_FILES['cv_file']['size']; // file size  
			$userfile_type  = $_FILES['cv_file']['type']; // mime type of file sent by browser. PHP doesn't check it.  
			$userfile_error  = $_FILES['cv_file']['error'];
							
			$extension = end(explode('.', $_FILES['cv_file']['name']));
			/**
			 * Add candidate file, to solve conflict if i upload banner and candidate as image, will take
			 * same name.
			 */	
			$name_file_timestamp=strtotime($current_date).'candidate';
				
			$uplad_path_file=getcwd().'/added/uploads/candidate/' . $name_file_timestamp.'.'.$extension;
		
			//if ($userfile_type!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
			if(move_uploaded_file($_FILES["cv_file"]["tmp_name"], $uplad_path_file))
			{
				
				if($id==0) {
					$cv_file = '/added/uploads/candidate/'.$name_file_timestamp.'.'.$extension;
							
				} else {
						
				if($_FILES['cv_file']['name']!='') {
					
					$cv_file=$this->Candidate_model->get_cv_file_by_id($this->table, $id);
					$cv_file_path=getcwd().$cv_file;
					if(isset($cv_file_path) && $cv_file_path!=getcwd()) {
					unlink($cv_file_path);
					}
					$cv_file = '/added/uploads/candidate/'.$name_file_timestamp.'.'.$extension;
					
				} else {
					$cv_file = $this->Candidate_model->get_cv_file_by_id($this->table, $id);;
				}
					
				}
			}
			
			
		}else {
			if($id==0) {
					$cv_file = '';
							
				} else { 
					$cv_file = $this->Candidate_model->get_cv_file_by_id($this->table, $id);
				}
				}
				
				
				
			
		
		if($id==0) {
		$active_code=$this->randString(15);
		$username = str_replace(' ', '', $_POST['firstname']);
		$username=$username.$this->randString(3);
		$password=$this->randString(7);
		$active=0;
		} else {
			$current_row=$this->Candidate_model->get_by_id($this->table, $id);

			$active_code=$current_row->active_code;
			$username=$current_row->username;
			$password=$current_row->password;
			$active=1;
		}
		
		$data['current_row'] = array(
				'username'=>$username,  
				'password'=>$password,
				'firstname'=>$_POST['firstname'],  
				'middlename'=>$_POST['middlename'],  
				'lastname'=>$_POST['lastname'],  
				'gender'=>$_POST['gender'],  
				'birthdate'=>$_POST['birthdate'],  
				'nationality_id'=>$_POST['nationality_id'],  
				'country_id' => $_POST['country_id'] ,
				'address'=>$_POST['address'],
				'p_o_box' => $_POST['p_o_box'] ,
				'city'=>$_POST['city'],  
				'phone' => $_POST['phone'] ,
				'mobile'=>$_POST['mobile'], 
				'email'=>$_POST['email'],  
				
  				'maritalstatus_id'=>$_POST['maritalstatus_id'],  
  				'dependants_count'=>$_POST['dependants_count'],  
  				'militarystatus_id'=>$_POST['militarystatus_id'],  
  				'car_owner'=>$_POST['car_owner'],  
  				'driving_license'=>$_POST['driving_license'],  
  				'communication_channel_id'=>$_POST['communication_channel_id'],  
  				'position_apply_for'=>$_POST['position_apply_for'],  
  				'employment_type_id'=>$_POST['employment_type_id'],  
  				'how_soon_can_you_join'=>$_POST['how_soon_can_you_join'],  
  				'giza_city_id'=>$_POST['giza_city_id'],  
  				'willing_to_travel'=>$_POST['willing_to_travel'],  
  				'contact_with_giza_by_id'=>$_POST['contact_with_giza_by_id'],  
  				'degree_id'=>$_POST['degree_id'],  
  				'university_id'=>$_POST['university_id'],  
  				'faculty_id'=>$_POST['faculty_id'],  
  				'major_id'=>$_POST['major_id'],  
  				'university_completion_date'=>$_POST['university_completion_date'],  
  				'grade_id'=>$_POST['grade_id'],  
  				'postgraduate_name1'=>$_POST['postgraduate_name1'],  
  				'postgraduate_field1'=>$_POST['postgraduate_field1'],  
  				'postgraduate_date1'=>$_POST['postgraduate_date1'],  
  				'postgraduate_certificate1'=>$_POST['postgraduate_certificate1'],  
  				'postgraduate_country1_id'=>$_POST['postgraduate_country1_id'],  
  				'postgraduate_name2'=>$_POST['postgraduate_name2'],  
  				'postgraduate_field2'=>$_POST['postgraduate_field2'],  
  				'postgraduate_date2'=>$_POST['postgraduate_date2'],  
  				'postgraduate_certificate2'=>$_POST['postgraduate_certificate2'],  
  				'postgraduate_country2_id'=>$_POST['postgraduate_country2_id'],  
  				'postgraduate_name3'=>$_POST['postgraduate_name3'],  
  				'postgraduate_field3'=>$_POST['postgraduate_field3'],  
  				'postgraduate_date3'=>$_POST['postgraduate_date3'],  
  				'postgraduate_certificate3'=>$_POST['postgraduate_certificate3'],  
  				'postgraduate_country_id3'=>$_POST['postgraduate_country_id3'],  
				'other_qualifications'=>$_POST['other_qualifications'], 
				'other_academic_education'=>$_POST['other_academic_education'],
				'line_of_business_id'=>$_POST['line_of_business_id'],  
				'line_of_business_experience_year'=>$_POST['line_of_business_experience_year'],  
				'industry_id'=>$_POST['industry_id'],  
				'expertise_industry_experience_year'=>$_POST['expertise_industry_experience_year'],  
				'language1_id'=>$_POST['language1_id'],  
				'language_level1_id'=>$_POST['language_level1_id'],  
				'language2_id'=>$_POST['language2_id'],  
				'language_level2_id'=>$_POST['language_level2_id'],  
				'language3_id'=>$_POST['language3_id'],  
				'language_level3_id'=>$_POST['language_level3_id'],  
				'computer_skills'=>$_POST['computer_skills'],
				'training_course1_name'=>$_POST['training_course1_name'],  
				'training_course1_location'=>$_POST['training_course1_location'],  
				'training_course1_duration'=>$_POST['training_course1_duration'],  
				'training_course2_name'=>$_POST['training_course2_name'],  
				'training_course2_location'=>$_POST['training_course2_location'],  
				'training_course2_duration'=>$_POST['training_course2_duration'],  
				'training_course3_name'=>$_POST['training_course3_name'],  
				'training_course3_location'=>$_POST['training_course3_location'],  
				'training_course3_duration'=>$_POST['training_course3_duration'],  
				'professional_experience_years'=>$_POST['professional_experience_years'],  
				'student_internship_experience_years'=>$_POST['student_internship_experience_years'],  
				'job1_title'=>$_POST['job1_title'],  
				'job1_employer'=>$_POST['job1_employer'],  
				'job1_duration'=>$_POST['job1_duration'],  
				'job1_duties'=>$_POST['job1_duties'], 
				'job2_title'=>$_POST['job2_title'],  
				'job2_employer'=>$_POST['job2_employer'],  
				'job2_duration'=>$_POST['job3_duration'],  
				'job2_duties'=>$_POST['job2_duties'], 
				'job3_title'=>$_POST['job3_title'],  
				'job3_employer'=>$_POST['job3_employer'],  
				'job3_duration'=>$_POST['job3_duration'],
				'job3_duties'=>$_POST['job3_duties'], 
				'reference1_name'=>$_POST['reference1_name'],  
				'reference1_position'=>$_POST['reference1_position'],  
				'reference1_organization'=>$_POST['reference1_organization'],  
				'reference1_phone'=>$_POST['reference1_phone'],  
				'reference1_email'=>$_POST['reference1_email'],
				'reference2_name'=>$_POST['reference2_name'],  
				'reference2_position'=>$_POST['reference2_position'],  
				'reference2_organization'=>$_POST['reference2_organization'],  
				'reference2_phone'=>$_POST['reference2_phone'],  
				'reference2_email'=>$_POST['reference2_email'],
				'reference3_name'=>$_POST['reference3_name'],  
				'reference3_position'=>$_POST['reference3_position'],  
				'reference3_organization'=>$_POST['reference3_organization'],  
				'reference3_phone'=>$_POST['reference3_phone'],  
				'reference3_email'=>$_POST['reference3_email'],
				'relative1_name'=>$_POST['relative1_name'],
				'relative1_department'=>$_POST['relative1_department'],
				'relative2_name'=>$_POST['relative2_name'],
				'relative2_department'=>$_POST['relative2_department'],
				'reason_for_leaving_current_employer'=>$_POST['reason_for_leaving_current_employer'],
				//'commit_years'=>$_POST['commit_years'],
				'immigrate'=>$_POST['immigrate'],
				'immigrate_yes'=>$_POST['immigrate_yes'],
				'relocating'=>$_POST['relocating'],
				'salary'=>$_POST['salary'],
				'hobbies'=>$_POST['hobbies'],
				'professional_memberships'=>$_POST['professional_memberships'],
				'extra_activities'=>$_POST['extra_activities'],
				'cv_file'=>$cv_file,
				'image'=>$image,
				'job_notification_mail'=>$_POST['job_notification_mail'],				
				'registeration_datetime'=>$current_date,  
				'active'=>$active,  
				'active_code'=>$active_code,
				'approved' => 0,
				'deleted' => 0,
				//'last_user_id' => $this->session->userdata('user_session')->id,
				//'last_modify_date' =>$current_date,
				);
					        
				if($id==0){
					$this->Candidate_model->insert($this->table, $data['current_row']);
					$id=$this->Candidate_model->get_max_id($this->table);
					
					/*
					 * Send email to candidate
					 */
					//--------------------------------------------------------------------------------------
					$email_template_row=$this->Email_template_model->get_by_purpose('candidate_signup');
					$count_email_template_row=count($email_template_row);
					if($count_email_template_row>0) {
						
						$email_active=$email_template_row->active;
						$email_subject=$email_template_row->subject;
						//$email_body=$email_template_row->body;
						
						$email_body=$this->getEmailBody('registeration');
						
						$email_body= str_replace('#@#@#@',$_POST['firstname'], $email_body);
						$email_body= str_replace('#&#&#&',$username, $email_body);
						$email_body= str_replace('#*#*#*',$password, $email_body);
					
						$email_body= str_replace('#!#!#!', "<a href='".base_url().$this->lang->lang().'/candidate/login'."'>".lang('login')."</a>" , $email_body);
						$email_body= str_replace('#%#%#%', "<a href='".base_url().$this->lang->lang()."/candidate/activate/$active_code'>".lang('activate')."</a>" , $email_body);
						$email_body= str_replace('#^#^#^','http://www.gizasystems.com', $email_body);
					
						
						if($email_active==1) {
							$email=$_POST['email'];
							$emailSetting= new EmailSetting();
							$sending_email=$emailSetting->send_email($email, $email_subject, $email_body);
						}
					}
					
					//---------------------------------------------------------------------------------------
					$this->session->set_userdata('message_session',lang('registered_successfully'));
				} else {
					$this->Candidate_model->update($this->table, $id, $data['current_row']);
					$this->session->set_userdata('message_session',lang('profile_saved_successfully'));
					
					$row_data=$this->Candidate_model->get_by_id($this->table, $id);
					$count=count($row_data);
					if($count>0)
					{
						$this->session->set_userdata('candidate_session_id',$row_data->id);
					}
				}
				
		redirect(base_url().$this->lang->lang()."/candidate/result");
	}
	
	/**
	 * activate method.
	 * 
	 * Method used to activate candidate.
	 *
	 * @access	public
	 * @param int
	 * @param int
	 */
	public function activate($active_code)
	{
		$data = array(
		'active' => 1,
		);
						
		$this->Candidate_model->activate($active_code, $data);
		$this->session->set_userdata('message_session',lang('activated_successfully').'<br>'."<a href='".base_url().$this->lang->lang()."/candidate/login'>".lang('login')."</a>");
		
		redirect(base_url().$this->lang->lang().'/candidate/result');

	}
	function result()
	{
		//-----------------------------------------------------------------
        $data=array();
        
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('candidate_result');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$message_session=$this->session->userdata('message_session');
		if($message_session) {
        	$data['message']= $message_session;
        	$this->session->unset_userdata('message_session');
		}
        //-----------------------------------------------------------------
        
		$this->load->view('website/candidate/result', $data);
	}
	
	function getEmailBody($case)
	{
		$message='';
		if($case=='registeration') {
		$message = "<html>
			<head>
				<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
				<title>Giza Systems</title>
			</head>
			<body>
				<table width='100%' cellpadding='0' cellspacing='0'>
					<tr>
						<td valign='top' align='center'>
							<table width='800' cellpadding='0' cellspacing='0' style='background:#fbfbfb'>
								<tr>
									<td height='20'></td>
								</tr>
								<tr>
									<td valign='top' align='center'>
										<img src='".base_url()."added/uploads/development_images/imgemailtemp.jpg' border='0' />
									</td>
								</tr>
								<tr>
									<td height='20'></td>
								</tr>
								<tr>
									<td valign='top' align='left'>
										<table width='750' cellpadding='0' cellspacing='0' style='margin-left:40px;'>
											<tr>
												<td height='20'></td>
											</tr>
											<tr>
												<td align='left' valign='top'>
													<span style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>Dear</span> 
													<span style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#00a4e4'>	#@#@#@</span>
												</td>
											</tr>
											<tr>
												<td height='20'></td>
											</tr>
											<tr>
												<td align='center' valign='top'>
													<div style='font-family:Arial, Helvetica, sans-serif; font-size:17px; color:#00a4e4'>
													Thank you for registering on the Giza Systems website. Your account has been created. 
													</div>
												</td>
											</tr>
											<tr>
												<td height='20'></td>
											</tr>
											<tr>
												<td align='left' valign='top'>
													<span style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>Your Username is: </span> 
													<span style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#00a4e4'>	#&#&#&</span>
												</td>
											</tr>
											<tr>
												<td height='10'></td>
											</tr>
											<tr>
												<td align='left' valign='top'>
													<span style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>Your Password is: </span> 
													<span style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#00a4e4'>	#*#*#*</span>
												</td>
											</tr>
											<tr>
												<td height='10'></td>
											</tr>
											<tr>
												<td align='left' valign='top'>
													<span style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>To activate your account please follow the link : </span> 
													<span style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#00a4e4'>	#%#%#% </span>
												</td>
											</tr>
											<tr>
												<td height='20'></td>
											</tr>
											<tr>
												<td align='left' valign='top'>
													<div style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>To login and/or edit your profile and contact information,<br /> 
		please visit: <span style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#00a4e4'> #!#!#! </span>
		</div> 
												</td>
											</tr>
											<tr>
												<td height='20'></td>
											</tr>
											<tr>
												<td align='left' valign='top'>
													<div style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>If at any time you have questions about our website and the services we provide, please feel free to contact us at <a href='mailto:info@gizasystems.com' style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#00a4e4; text-decoration:underline'>info@gizasystems.com</a></div> 
												</td>
											</tr>
											<tr>
												<td height='40'></td>
											</tr>
											<tr>
												<td align='left' valign='top'>
													<div style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>Thank You,</div>
													<div style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>Giza Systems Team</div>
												</td>
											</tr>
											<tr>
												<td height='40'></td>
											</tr>
											<tr>
												<td align='left' valign='top'>
													<div style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>Giza Systems</div>
													<div style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>Plot No. 176, Second Sector, City Center | New Cairo 11835, Egypt </div>
													<div style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>Phone +(202) 26146000</div>
													<div style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>Fax +(202) 26146001 </div>
												</td>
											</tr>
											<tr>
												<td height='40'></td>
											</tr>
											<tr>
												<td align='left' valign='top'>
													<div style='font-family:Arial, Helvetica, sans-serif; font-size:11; color:#636363; text-align:justify'>Giza Systems <a href='www.gizasystems.com' style='font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#00a4e4; text-decoration:underline'>www.gizasystems.com</a> is the number one systems integrator in Egypt and the Middle East providing a wide range of industry specific technology solutions in the Telecom, Utilities, Oil & Gas, and Manufacturing industries. We have been shaping the IT industry and corporate agendas since 1974. Our consultancy practice provides industry focused services that enhance value for our clients by streamlining operational and business processes. Operating in the Middle East through Giza Arabia <a href='www.gizaarabia.com' style='font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#00a4e4; text-decoration:underline'>www.gizaarabia.com</a>, our group of companies is focused on contributing to the local and regional development with our technology solutions, commitment and outstanding customer service. Our team of 700 professionals enables us to extend our geographic footprint delivering diverse projects and connecting us with clients in the Middle East, Africa, Europe, Latin America and Russia.</div><br />
		 
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</body>
		</html>";
		} else if($case=='forgetpassword') {
			$message = "<html>
				<head>
					<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
					<title>Giza Systems</title>
				</head>
				<body>
					<table width='100%' cellpadding='0' cellspacing='0'>
						<tr>
							<td valign='top' align='center'>
								<table width='800' cellpadding='0' cellspacing='0' style='background:#fbfbfb'>
									<tr>
										<td height='20'></td>
									</tr>
									<tr>
										<td valign='top' align='center'>
											<img src='images/imgemailtemp.jpg' border='0' />
										</td>
									</tr>
									<tr>
										<td height='20'></td>
									</tr>
									<tr>
										<td valign='top' align='left'>
											<table width='750' cellpadding='0' cellspacing='0' style='margin-left:40px;'>
												<tr>
													<td align='left' valign='top'>
														<span style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>Dear</span> 
														<span style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#00a4e4'>	#@#@#@</span>
													</td>
												</tr>
												<tr>
													<td height='20'></td>
												</tr>
												<tr>
													<td align='center' valign='top'>
														<div style='font-family:Arial, Helvetica, sans-serif; font-size:17px; color:#00a4e4'>
															Thank you for using Giza Systems website. 
														</div>
													</td>
												</tr>
												<tr>
													<td height='20'></td>
												</tr>
												<tr>
													<td align='left' valign='top'>
														<span style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>Your Username is: </span> 
														<span style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#00a4e4'>#&#&#&</span>
													</td>
												</tr>
												<tr>
													<td height='10'></td>
												</tr>
												<tr>
													<td align='left' valign='top'>
														<span style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>Your Password is: </span> 
														<span style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#00a4e4'>#*#*#* </span>
													</td>
												</tr>
												<tr>
													<td height='20'></td>
												</tr>
												<tr>
												<td align='left' valign='top'>
													<div style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>To login and/or edit your profile and contact information,<br /> 
		please visit: <span style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#00a4e4'> #!#!#! </span>
		</div> 
												</td>
											</tr>
												<tr>
													<td height='20'></td>
												</tr>
												<tr>
													<td align='left' valign='top'>
														<div style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>If at any time you have questions about our website and the services we provide, please feel free to contact us at <a href='mailto:info@gizasystems.com' style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#00a4e4; text-decoration:underline'>info@gizasystems.com</a></div> 
													</td>
												</tr>
												<tr>
													<td height='40'></td>
												</tr>
												<tr>
													<td align='left' valign='top'>
														<div style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>Thank You,</div>
														<div style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>Giza Systems Team</div>
													</td>
												</tr>
												<tr>
													<td height='40'></td>
												</tr>
												<tr>
													<td align='left' valign='top'>
														<div style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>Giza Systems</div>
														<div style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>Plot No. 176, Second Sector, City Center | New Cairo 11835, Egypt </div>
														<div style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>Phone +(202) 26146000</div>
														<div style='font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#636363'>Fax +(202) 26146001 </div>
													</td>
												</tr>
												<tr>
													<td height='40'></td>
												</tr>
												<tr>
													<td align='left' valign='top'>
														<div style='font-family:Arial, Helvetica, sans-serif; font-size:11; color:#636363; text-align:justify'>Giza Systems <a href='www.gizasystems.com' style='font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#00a4e4; text-decoration:underline'>www.gizasystems.com</a> is the number one systems integrator in Egypt and the Middle East providing a wide range of industry specific technology solutions in the Telecom, Utilities, Oil & Gas, and Manufacturing industries. We have been shaping the IT industry and corporate agendas since 1974. Our consultancy practice provides industry focused services that enhance value for our clients by streamlining operational and business processes. Operating in the Middle East through Giza Arabia <a href='www.gizaarabia.com' style='font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#00a4e4; text-decoration:underline'>www.gizaarabia.com</a>, our group of companies is focused on contributing to the local and regional development with our technology solutions, commitment and outstanding customer service. Our team of 700 professionals enables us to extend our geographic footprint delivering diverse projects and connecting us with clients in the Middle East, Africa, Europe, Latin America and Russia.</div><br />
			 
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</body>
			</html>";
		}
		return $message;
	}
	
	function randString($length=5) 
	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$size = strlen( $chars );
		$str='';
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}
    	$str = substr( str_shuffle( $chars ), 0, $length );
    	return $str;
	}
		
}