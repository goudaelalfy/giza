<?php
/**
 * Alumni controller file.
 *
 * Contains controller class of the alumni entity.
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
 * Controller class for the alumni page.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Alumni extends Ci_Controller
{ 	
	/**
	 * store this controller alumni table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='alumni';
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Alumni_model', 'Alumni_model' , True);
		$this->load->model('Menu_link_model', 'Menu_link_model' , True);
		$this->load->model('Industry_model', 'Industry_model' , True);
		$this->load->model('Solution_model', 'Solution_model' , True);
		//$this->load->model('Alumni_industries_model', 'Alumni_industries_model' , True);
		//$this->load->model('Alumni_solutions_model', 'Alumni_solutions_model' , True);
		$this->load->model('Email_template_model', 'Email_template_model' , True);
		$this->load->model('Static_page_banner_model', 'Static_page_banner_model' , True);
		
		
		$this->load->controller('Website');
		$website_object= new Website();
		$website_object->load();
		
	}
	
	function login()
	{
		$data=array();
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('alumni_login');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$alumni_session=$this->session->userdata('alumni_session');
		if($alumni_session)
		{
			redirect(base_url().$this->lang->lang().'/alumni/home');
		}
		/*
		if(isset($_POST['smt_login']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			if($this->checkAuth($username,$password))
			{
				redirect(base_url().$this->lang->lang().'/alumni/index');				
			}
			else
			{
				$data['login_error']=lang('login_invalid');
			}
		}
		*/
		
		$this->load->view('website/alumni/login', $data);		
	}
	
	function authourize()
	{
		$data=array();
		$alumni_session=$this->session->userdata('alumni_session');
		if($alumni_session)
		{
			redirect(base_url().$this->lang->lang().'/alumni/index');
		}
		//if(isset($_POST['smt_login']))
		//{
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			if($this->checkAuth($username,$password))
			{
				redirect(base_url().$this->lang->lang().'/alumni/home');				
			}
			else
			{
				$data['login_error']=lang('login_invalid');
			}
		//}
		
		$this->load->view('website/alumni/login', $data);		
	}
	function home()
	{
		$data=array();
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('alumni_home');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$alumni_session=$this->session->userdata('alumni_session');
		if(!$alumni_session)
		{
			redirect(base_url().$this->lang->lang().'/alumni/login');
		}
		
		$this->load->view('website/alumni/home', $data);		
	}
	
	function checkAuth($username='',$password='')
	{
		$row_data=$this->Alumni_model->get_by_username_and_password($username,$password);
		$count=count($row_data);
		if($count>0)
		{
			$this->session->set_userdata('alumni_session',$row_data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('alumni_session');
		redirect(base_url().$this->lang->lang()."/alumni/login");
	}
	
	function forgetPassword()
	{
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('alumni_forget');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$this->load->view('website/alumni/forget_password');		
	}
	
	function sendPassword()
	{
		$home_email=$_POST['home_email'];
		
		$row_data=$this->Alumni_model->get_by_email($home_email);
		$count=count($row_data);
		if($count>0) { 
			$this->session->set_userdata('message_session',lang('password_sent_successfully'));
				
			$name=$row_data->firstname;
			$username=$row_data->username;
			$password=$row_data->password;
				/*
				 * Send email to alumni
				 */
				//--------------------------------------------------------------------------------------
				$email_template_row=$this->Email_template_model->get_by_purpose('alumni_forget_password');
				$count_email_template_row=count($email_template_row);
				if($count_email_template_row>0) {
					
					$email_active=$email_template_row->active;
					$email_subject=$email_template_row->subject;
					//$email_body=$email_template_row->body;
					
					$email_body=$this->getEmailBody('forgetpassword');
					
					$email_body= str_replace('#@#@#@',$name, $email_body);
					$email_body= str_replace('#&#&#&',$username, $email_body);
					$email_body= str_replace('#*#*#*',$password, $email_body);
				
					$email_body= str_replace('#!#!#!', "<a href='".base_url().$this->lang->lang().'/alumni/login'."'>".lang('login')."</a>" , $email_body);
					//$email_body= str_replace('#%#%#%', "<a href='".base_url().$this->lang->lang()."/alumni/activate/$active_code'>".lang('activate')."</a>" , $email_body);
					$email_body= str_replace('#^#^#^','http://www.gizasystems.com', $email_body);
				
					
					if($email_active==1) {
						$email=$_POST['home_email'];
						$emailSetting= new EmailSetting();
						$sending_email=$emailSetting->send_email($email, $email_subject, $email_body);
					}
				}
				
				//---------------------------------------------------------------------------------------
				
		
		} else {
			$this->session->set_userdata('message_session',lang('this_not_exist_in_db'));
		}
		redirect(base_url().$this->lang->lang().'/alumni/result');
		
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
		$data=array();
		
		$alias=urldecode($alias);
		$data['current_alias']=$alias;

		$menu_link_row=$this->Menu_link_model->get_by_controller('alumni');
		$parent_id=$menu_link_row->parent_id;
		$data['side_menu_rows']=$this->Menu_link_model->get_all_child($parent_id);
		$data['title']=lang('alumnies');

		$data['industry_rows']=$this->Industry_model->get_all_approved();
		$data['solution_rows']=$this->Solution_model->get_all_approved();
		
		
		$data['rows']=$this->Alumni_model->get_all_approved();
		$this->load->view("website/alumni/index", $data);
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
		
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('alumni_profile');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		
		$data['title']=lang('sign_up');
		$id=0;
		if($this->session->userdata('alumni_session')) {
			$id= $this->session->userdata('alumni_session')->id;
		}
		
        if($id!=0){	
			$data['current_row'] = $this->session->userdata('alumni_session');
		
        } 
        
        
        //$data['mode']= $mode;

        //-----------------------------------------------------------------
        $message_session=$this->session->userdata('message_session');
		if($message_session) {
        	$data['message']= $message_session;
        	$this->session->unset_userdata('message_session');
		}
        //-----------------------------------------------------------------
        
		
        
		$this->load->view('website/alumni/profile',$data);
	}
	
	public function save()
	{ 	
		$id=0;
		if($this->session->userdata('alumni_session')) {
			$id= $this->session->userdata('alumni_session')->id;
		}
		
		$dateTime = new DateTime(); 
		$current_date=$dateTime->format("Y-m-d H:i:s");

		/*
		if($_FILES['logo']['name']!="") {
					$userfile_name = $_FILES['logo']['name']; // file name  
					$userfile_tmp  = $_FILES['logo']['tmp_name']; // actual location  
					$userfile_size  = $_FILES['logo']['size']; // file size  
					$userfile_type  = $_FILES['logo']['type']; // mime type of file sent by browser. PHP doesn't check it.  
					$userfile_error  = $_FILES['logo']['error'];
									
					$extension = end(explode('.', $_FILES['logo']['name']));
					
					//Add logo file, to solve conflict if i upload banner and logo as image, will take
					//same name.
					 	
					$name_file_timestamp=strtotime($current_date).'_logo';
						
					$uplad_path_file=getcwd().'/added/uploads/logo/alumni/' . $name_file_timestamp.'.'.$extension;
				
					//if ($userfile_type!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
					if(move_uploaded_file($_FILES["logo"]["tmp_name"], $uplad_path_file))
					{
						
						if($id==0) {
							$logo = '/added/uploads/logo/alumni/'.$name_file_timestamp.'.'.$extension;
									
						} else {
								
						if($_FILES['logo']['name']!='') {
							
							$logo=$this->Alumni_model->get_logo_by_id($this->table, $id);
							$logo_path=getcwd().$logo;
							if(isset($logo_path) && $logo_path!=getcwd()) {
							unlink($logo_path);
							}
							$logo = '/added/uploads/logo/alumni/'.$name_file_timestamp.'.'.$extension;
							
						} else {
							$logo = $this->Alumni_model->get_logo_by_id($this->table, $id);;
						}
							
						}
					}
					
					
				}else {
					if($id==0) {
							$logo = '';
									
						} else { 
							$logo = $this->Alumni_model->get_logo_by_id($this->table, $id);
						}
					}
				*/
			
		$reference_contacts='';
		if(isset($_POST['reference_contacts'])) {
			$reference_contacts_arr=$_POST['reference_contacts'];
			$reference_contact_counter=0;
			foreach($reference_contacts_arr as $reference_contact) {
				if($reference_contact_counter>0 && $reference_contact!=''){
					$reference_contacts=$reference_contacts.',';
				}
				if($reference_contact!=''){
			  		$reference_contacts=$reference_contacts.$reference_contact;
			  		$reference_contact_counter=$reference_contact_counter+1;
				}
			}
		}
		
		$interests='';
		if(isset($_POST['interests'])) {
			$interests_arr=$_POST['interests'];
			$interest_counter=0;
			foreach($interests_arr as $interest) {
				if($interest_counter>0 && $interest!=''){
					$interests=$interests.',';
				}
				if($interest!=''){
			  		$interests=$interests.$interest;
			  		$interest_counter=$interest_counter+1;
				}
			}
		}
		
		if($id==0) {
		$active_code=$this->randString(15);
		$username = str_replace(' ', '', $_POST['firstname']);
		$username=$username.$this->randString(3);
		$password=$this->randString(7);
		$active=0;
		} else {
			$current_row=$this->Alumni_model->get_by_id($this->table, $id);

			$active_code=$current_row->active_code;
			$username=$current_row->username;
			$password=$current_row->password;
			$active=1;
		}
		
		$data['current_row'] = array(
				'username'=>$username,  
				'password'=>$password,
				'title'=>$_POST['title'],  
				'firstname'=>$_POST['firstname'],  
				'lastname'=>$_POST['lastname'],  
				'gender'=>$_POST['gender'],  
				'birthdate'=>$_POST['birthdate'],  
				'home_address'=>$_POST['home_address'],
				'home_city' => $_POST['home_city'] ,
				'home_postal_code' => $_POST['home_postal_code'] ,
				'home_country_id' => $_POST['home_country_id'] ,
				'home_phone' => $_POST['home_phone'] ,
				'home_mobile'=>$_POST['home_mobile'], 
				'home_email'=>$_POST['home_email'],  
				'current_position'=>$_POST['current_position'],  
				'organization'=>$_POST['organization'],  
				'work_address'=>$_POST['work_address'],  
				'work_postal_code'=>$_POST['work_postal_code'],  
				'work_city'=>$_POST['work_city'],  
				'work_country_id'=>$_POST['work_country_id'],  
				'work_phone'=>$_POST['work_phone'],  
				'work_mobile'=>$_POST['work_mobile'],  
				'work_email'=>$_POST['work_email'],  
				'giza_year_joined'=>$_POST['giza_year_joined'],  
				'giza_starting_position'=>$_POST['giza_starting_position'],  
				'giza_department'=>$_POST['giza_department'],  
				'giza_year_left'=>$_POST['giza_year_left'],  
				'giza_final_position'=>$_POST['giza_final_position'],  
				'giza_final_department'=>$_POST['giza_final_department'],  
				'giza_total_years'=>$_POST['giza_total_years'],  
				'reference_contacts'=>$reference_contacts, 
				'interests'=>$interests,
				'registeration_datetime'=>$current_date,  
				'active'=>$active,  
				'active_code'=>$active_code,
				'approved' => 0,
				'deleted' => 0,
				//'last_user_id' => $this->session->userdata('user_session')->id,
				//'last_modify_date' =>$current_date,
				);
					        
				if($id==0){
					$this->Alumni_model->insert($this->table, $data['current_row']);
					$id=$this->Alumni_model->get_max_id($this->table);
					
					/*
					 * Send email to alumni
					 */
					//--------------------------------------------------------------------------------------
					$email_template_row=$this->Email_template_model->get_by_purpose('alumni_signup');
					$count_email_template_row=count($email_template_row);
					if($count_email_template_row>0) {
						
						$email_active=$email_template_row->active;
						$email_subject=$email_template_row->subject;
						//$email_body=$email_template_row->body;
						
						$email_body=$this->getEmailBody('registeration');
						
						$email_body= str_replace('#@#@#@',$_POST['firstname'], $email_body);
						$email_body= str_replace('#&#&#&',$username, $email_body);
						$email_body= str_replace('#*#*#*',$password, $email_body);
					
						$email_body= str_replace('#!#!#!', "<a href='".base_url().$this->lang->lang().'/alumni/login'."'>".lang('login')."</a>" , $email_body);
						$email_body= str_replace('#%#%#%', "<a href='".base_url().$this->lang->lang()."/alumni/activate/$active_code'>".lang('activate')."</a>" , $email_body);
						$email_body= str_replace('#^#^#^','http://www.gizasystems.com', $email_body);
					
						
						if($email_active==1) {
							$email=$_POST['home_email'];
							$emailSetting= new EmailSetting();
							$sending_email=$emailSetting->send_email($email, $email_subject, $email_body);
						}
					}
					
					//---------------------------------------------------------------------------------------
					$this->session->set_userdata('message_session',lang('registered_successfully'));
				} else {
					$this->Alumni_model->update($this->table, $id, $data['current_row']);
					$this->session->set_userdata('message_session',lang('profile_saved_successfully'));
					
					$row_data=$this->Alumni_model->get_by_id($this->table, $id);
					$count=count($row_data);
					if($count>0)
					{
						$this->session->set_userdata('alumni_session',$row_data);
					}
				}
				
		redirect(base_url().$this->lang->lang()."/alumni/result");
	}
	
	/**
	 * activate method.
	 * 
	 * Method used to activate alumni.
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
						
		$this->Alumni_model->activate($active_code, $data);
		$this->session->set_userdata('message_session',lang('activated_successfully').'<br>'."<a href='".base_url().$this->lang->lang()."/alumni/login'>".lang('login')."</a>");
		
		redirect(base_url().$this->lang->lang().'/alumni/result');

	}
	function result()
	{
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('alumni_save_result');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		//-----------------------------------------------------------------
        $data=array();
		$message_session=$this->session->userdata('message_session');
		if($message_session) {
        	$data['message']= $message_session;
        	$this->session->unset_userdata('message_session');
		}
        //-----------------------------------------------------------------
        
		$this->load->view('website/alumni/result', $data);
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