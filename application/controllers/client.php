<?php
/**
 * Client controller file.
 *
 * Contains controller class of the client entity.
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
 * Controller class for the client page.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Client extends Ci_Controller
{ 	
	/**
	 * store this controller client table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='client';
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Client_model', 'Client_model' , True);
		$this->load->model('Menu_link_model', 'Menu_link_model' , True);
		$this->load->model('Industry_model', 'Industry_model' , True);
		$this->load->model('Solution_model', 'Solution_model' , True);
		$this->load->model('Client_industries_model', 'Client_industries_model' , True);
		$this->load->model('Client_project_industries_model', 'Client_project_industries_model' , True);
		$this->load->model('Email_template_model', 'Email_template_model' , True);
		
		$this->load->model('Client_survey_model', 'Client_survey_model' , True);
		$this->load->model('Client_survey_answer_model', 'Client_survey_answer_model' , True);
		$this->load->model('Case_study_model', 'Case_study_model' , True);
		
		
		$this->load->model('Static_page_banner_model', 'Static_page_banner_model' , True);
		
		
		$this->load->controller('Website');
		$website_object= new Website();
		$website_object->load();
		
	}
	
	function login()
	{
		$data=array();
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('client_login');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$client_session=$this->session->userdata('client_session');
		if($client_session)
		{
			redirect(base_url().$this->lang->lang().'/client/home');
		}
		/*
		if(isset($_POST['smt_login']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			if($this->checkAuth($username,$password))
			{
				redirect(base_url().$this->lang->lang().'/client/index');				
			}
			else
			{
				$data['login_error']=lang('login_invalid');
			}
		}
		*/
		
		$this->load->view('website/client/login', $data);		
	}
	
	function authourize()
	{
		$data=array();
		$client_session=$this->session->userdata('client_session');
		if($client_session)
		{
			redirect(base_url().$this->lang->lang().'/client/index');
		}
		//if(isset($_POST['smt_login']))
		//{
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			if($this->checkAuth($username,$password))
			{
				redirect(base_url().$this->lang->lang().'/client/home');				
			}
			else
			{
				$data['login_error']=lang('login_invalid');
			}
		//}
		
		$this->load->view('website/client/login', $data);		
	}
	
	function home()
	{
		$data=array();
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('client_home');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$client_session=$this->session->userdata('client_session');
		if(!$client_session)
		{
			redirect(base_url().$this->lang->lang().'/client/login');
		}
		
		$this->load->view('website/client/home', $data);		
	}
	function checkAuth($username='',$password='')
	{
		$row_data=$this->Client_model->get_by_username_and_password($username,$password);
		$count=count($row_data);
		if($count>0)
		{
			$this->session->set_userdata('client_session',$row_data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('client_session');
		redirect(base_url().$this->lang->lang()."/client/login");
	}
	
	function forgetPassword()
	{
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('client_forget');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$this->load->view('website/client/forget_password');		
	}
	
	function sendPassword()
	{
		$contact_email=$_POST['contact_email'];
		
		$row_data=$this->Client_model->get_by_email($contact_email);
		$count=count($row_data);
		if($count>0) { 
			$this->session->set_userdata('message_session',lang('password_sent_successfully'));
				
			$name=$row_data->name;
			$username=$row_data->username;
			$password=$row_data->password;
				/*
				 * Send email to client
				 */
				//--------------------------------------------------------------------------------------
				$email_template_row=$this->Email_template_model->get_by_purpose('client_forget_password');
				$count_email_template_row=count($email_template_row);
				if($count_email_template_row>0) {
					
					$email_active=$email_template_row->active;
					$email_subject=$email_template_row->subject;
					//$email_body=$email_template_row->body;
					
					$email_body=$this->getEmailBody('forgetpassword');
					
					$email_body= str_replace('#@#@#@',$name, $email_body);
					$email_body= str_replace('#&#&#&',$username, $email_body);
					$email_body= str_replace('#*#*#*',$password, $email_body);
				
					$email_body= str_replace('#!#!#!', "<a href='".base_url().$this->lang->lang().'/client/login'."'>".lang('login')."</a>" , $email_body);
					//$email_body= str_replace('#%#%#%', "<a href='".base_url().$this->lang->lang()."/client/activate/$active_code'>".lang('activate')."</a>" , $email_body);
					$email_body= str_replace('#^#^#^','http://www.gizasystems.com', $email_body);
				
					
					if($email_active==1) {
						$email=$_POST['contact_email'];
						$emailSetting= new EmailSetting();
						$sending_email=$emailSetting->send_email($email, $email_subject, $email_body);
					}
				}
				
				//---------------------------------------------------------------------------------------
				
		
		} else {
			$this->session->set_userdata('message_session',lang('this_not_exist_in_db'));
		}
		redirect(base_url().$this->lang->lang().'/client/result');
		
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
		
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('client_index');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$alias=urldecode($alias);
		$data['current_alias']=$alias;

		$menu_link_row=$this->Menu_link_model->get_by_controller('client');
		$parent_id=$menu_link_row->parent_id;

		$parent_link_row=$this->Menu_link_model->get_by_id('', $parent_id);
		if(count($parent_link_row)>0) {
			if($this->lang->lang()=='ar') {
				$data['parent_link_title']=$parent_link_row->title_ar;
			} else {
				$data['parent_link_title']=$parent_link_row->title;
			}
		}
		
		$data['side_menu_rows']=$this->Menu_link_model->get_all_child($parent_id);
		$data['title']=lang('clients');

		$data['industry_rows']=$this->Industry_model->get_all_approved();
		$data['solution_rows']=$this->Solution_model->get_all_approved();
		
		
		
		$data['rows']=$this->Client_model->get_all_approved();
		$this->load->view("website/client/index", $data);
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
		
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('client_profile');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$data['industry_rows'] = $this->Industry_model->get_all();
		//$data['solution_rows'] = $this->Solution_model->get_all();
		
		$data['title']=lang('sign_up');
		$id=0;
		if($this->session->userdata('client_session')) {
			$id= $this->session->userdata('client_session')->id;
		}
		
        if($id!=0){	
			$data['current_row'] = $this->session->userdata('client_session');
			
			//------------------------ Client Industries ----------------------------------------
			$client_industries_rows = $this->Client_model->get_client_industries_by_id($id);
			$data['client_industries_rows']=$client_industries_rows;
        
			//------------------------ Client Project industries ----------------------------------------
			$client_project_industries_rows = $this->Client_model->get_client_project_industries_by_id($id);
			$data['client_project_industries_rows']=$client_project_industries_rows;
			
        }
        
        
        //$data['mode']= $mode;

        //-----------------------------------------------------------------
        $message_session=$this->session->userdata('message_session');
		if($message_session) {
        	$data['message']= $message_session;
        	$this->session->unset_userdata('message_session');
		}
        //-----------------------------------------------------------------
        
		/*
		if(isset($_POST['smt_save'])) {
			$dateTime = new DateTime(); 
			$current_date=$dateTime->format("Y-m-d H:i:s");

			$data['current_row'] = array(
               	'name' => $_POST['name'] ,
               	'name_ar' => $_POST['name_ar'],
				'approved' => $this->session->userdata('user_session')->admin,
				'deleted' => 0,
				'last_user_id' => $this->session->userdata('user_session')->id,
				'last_modify_date' =>$current_date,
				);
					        
				if($id==0){
					$this->Client_model->insert($this->table, $data['current_row']);
					$id=$this->Client_model->get_max_id($this->table);
					$this->session->set_userdata('message_session',lang('registered_successfully'));
				} else {
					$this->Client_model->update($this->table, $id, $data['current_row']);
					$this->session->set_userdata('message_session',lang('registered_successfully'));
				}
				redirect(base_url().$this->lang->lang()."/client/result");
			}
		*/
        
		$this->load->view('website/client/profile',$data);
	}
	
	public function save()
	{ 	
		$id=0;
		if($this->session->userdata('client_session')) {
			$id= $this->session->userdata('client_session')->id;
		}
		
		$dateTime = new DateTime(); 
		$current_date=$dateTime->format("Y-m-d H:i:s");

		if($_FILES['logo']['name']!="") {
					$userfile_name = $_FILES['logo']['name']; // file name  
					$userfile_tmp  = $_FILES['logo']['tmp_name']; // actual location  
					$userfile_size  = $_FILES['logo']['size']; // file size  
					$userfile_type  = $_FILES['logo']['type']; // mime type of file sent by browser. PHP doesn't check it.  
					$userfile_error  = $_FILES['logo']['error'];
									
					$extension = end(explode('.', $_FILES['logo']['name']));
					/**
					 * Add logo file, to solve conflict if i upload banner and logo as image, will take
					 * same name.
					 */	
					$name_file_timestamp=strtotime($current_date).'_logo';
						
					$uplad_path_file=getcwd().'/added/uploads/logo/client/' . $name_file_timestamp.'.'.$extension;
				
					//if ($userfile_type!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
					if(move_uploaded_file($_FILES["logo"]["tmp_name"], $uplad_path_file))
					{
						
						if($id==0) {
							$logo = '/added/uploads/logo/client/'.$name_file_timestamp.'.'.$extension;
									
						} else {
								
						if($_FILES['logo']['name']!='') {
							
							$logo=$this->Client_model->get_logo_by_id($this->table, $id);
							$logo_path=getcwd().$logo;
							if(isset($logo_path) && $logo_path!=getcwd()) {
							unlink($logo_path);
							}
							$logo = '/added/uploads/logo/client/'.$name_file_timestamp.'.'.$extension;
							
						} else {
							$logo = $this->Client_model->get_logo_by_id($this->table, $id);;
						}
							
						}
					}
					
					
				}else {
					if($id==0) {
							$logo = '';
									
						} else { 
							$logo = $this->Client_model->get_logo_by_id($this->table, $id);
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
		$username = str_replace(' ', '', $_POST['name']);
		$username=$username.$this->randString(3);
		$password=$this->randString(7);
		$active=0;
		} else {
			$current_row=$this->Client_model->get_by_id($this->table, $id);

			$active_code=$current_row->active_code;
			$username=$current_row->username;
			$password=$current_row->password;
			$active=1;
		}
		
		$data['current_row'] = array(
				'name'=>$_POST['name'],  
				'username'=>$username,  
				'password'=>$password,  
				'website'=>$_POST['website'],  
				'address'=>$_POST['address'],  
				'phone'=>$_POST['phone'],  
				//'industries'=>$_POST['industries'],  
				//'solutions'=>$_POST['solutions'],  
				'brief'=>$_POST['brief'], 
				'logo'=>$logo,  
		
				'project_name'=>$_POST['project_name'],  
				'project_contract_value'=>$_POST['project_contract_value'],  
				'project_duration'=>$_POST['project_duration'],  
				'testimony'=>$_POST['testimony'],  
				'feedback'=>$_POST['feedback'],  
					
				'contact_title'=>$_POST['contact_title'],  
				'contact_firstname'=>$_POST['contact_firstname'],  
				'contact_lastname'=>$_POST['contact_lastname'],  
				'contact_position'=>$_POST['contact_position'],  
				'contact_mobile'=>$_POST['contact_mobile'],  
				'contact_email'=>$_POST['contact_email'], 
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
					$this->Client_model->insert($this->table, $data['current_row']);
					$id=$this->Client_model->get_max_id($this->table);
					
					/*
					 * Send email to client
					 */
					//--------------------------------------------------------------------------------------
					$email_template_row=$this->Email_template_model->get_by_purpose('client_signup');
					$count_email_template_row=count($email_template_row);
					if($count_email_template_row>0) {
						
						$email_active=$email_template_row->active;
						$email_subject=$email_template_row->subject;
						//$email_body=$email_template_row->body;
						
						$email_body=$this->getEmailBody('registeration');
						
						$email_body= str_replace('#@#@#@',$_POST['contact_firstname'], $email_body);
						$email_body= str_replace('#&#&#&',$username, $email_body);
						$email_body= str_replace('#*#*#*',$password, $email_body);
					
						$email_body= str_replace('#!#!#!', "<a href='".base_url().$this->lang->lang().'/client/login'."'>".lang('login')."</a>" , $email_body);
						$email_body= str_replace('#%#%#%', "<a href='".base_url().$this->lang->lang()."/client/activate/$active_code'>".lang('activate')."</a>" , $email_body);
						$email_body= str_replace('#^#^#^','http://www.gizasystems.com', $email_body);
					
						
						if($email_active==1) {
							$email=$_POST['contact_email'];
							$emailSetting= new EmailSetting();
							$sending_email=$emailSetting->send_email($email, $email_subject, $email_body);
						}
					}
					
					//---------------------------------------------------------------------------------------
					$this->session->set_userdata('message_session',lang('registered_successfully'));
				} else {
					$this->Client_model->update($this->table, $id, $data['current_row']);
					$this->session->set_userdata('message_session',lang('profile_saved_successfully'));
					
					$row_data=$this->Client_model->get_by_id($this->table, $id);
					$count=count($row_data);
					if($count>0)
					{
						$this->session->set_userdata('client_session',$row_data);
					}
				}
				
				//Insert client Project Industries.
				if(isset($_POST['project_industries'])) {
					$client_project_industry_data = array();
					$project_industries=$_POST['project_industries'];
					foreach($project_industries as $project_industry_id) {
						$client_project_industry_data[]=array('client_id' => $id,'industry_id' => $project_industry_id);
					}
					$this->Client_project_industries_model->insert($id,$client_project_industry_data);
				}
				
				//Insert client Industries.
				if(isset($_POST['industries'])) {
					$client_industry_data = array();
					$industries=$_POST['industries'];
					foreach($industries as $industry_id) {
						$client_industry_data[]=array('client_id' => $id,'industry_id' => $industry_id);
					}
					$this->Client_industries_model->insert($id,$client_industry_data);
				}
				
			redirect(base_url().$this->lang->lang()."/client/result");
	}
	
	/**
	 * activate method.
	 * 
	 * Method used to activate client.
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
						
		$this->Client_model->activate($active_code, $data);
		$this->session->set_userdata('message_session',lang('activated_successfully').'<br>'."<a href='".base_url().$this->lang->lang()."/client/login'>".lang('login')."</a>");
		
		redirect(base_url().$this->lang->lang().'/client/result');

	}
	function result()
	{
		//-----------------------------------------------------------------
        $data=array();
        
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('client_result');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$message_session=$this->session->userdata('message_session');
		if($message_session) {
        	$data['message']= $message_session;
        	$this->session->unset_userdata('message_session');
		}
        //-----------------------------------------------------------------
        
		$this->load->view('website/client/result', $data);
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
	

	public function survey()
	{ 
		$data=array();
		
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('client_survey');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$data['client_survey_question_rows'] = $this->Client_survey_model->get_all_display_paging('client_survey_question', 0, 1000, '*', 'sort', ''); 
        		
		$data['title']=lang('sign_up');
		$id=0;
		if($this->session->userdata('client_session')) {
			$id= $this->session->userdata('client_session')->id;
		} else {
			redirect(base_url().$this->lang->lang()."/client/login");
		}
		
        if($id!=0){	
			$data['current_client_survey_rows'] = $this->Client_survey_answer_model->get_by_client($id);
        }
        
        
        //$data['mode']= $mode;

        //-----------------------------------------------------------------
        $message_session=$this->session->userdata('message_session');
		if($message_session) {
        	$data['message']= $message_session;
        	$this->session->unset_userdata('message_session');
		}
        //-----------------------------------------------------------------
        
		$this->load->view('website/client/survey',$data);
	}
	
	
	public function savesurvey()
	{ 	
		$id=0;
		if($this->session->userdata('client_session')) {
			$id= $this->session->userdata('client_session')->id;
		} else {
			redirect(base_url().$this->lang->lang()."/client/login");
		}
        
		$dateTime = new DateTime(); 
		$current_date=$dateTime->format("Y-m-d H:i:s");
		
		$client_survey_question_rows = $this->Client_survey_model->get_all_display_paging_approved('client_survey_question', 0, 1000, '*', 'sort', ''); 
		
		$this->Client_survey_answer_model->delete_by_client($id);
		
		foreach($client_survey_question_rows as $client_survey_question_row) {
			
			$question_id=$client_survey_question_row->id;
			$question_answer_type=$client_survey_question_row->answer_type;
			
			$answer='';
			if($question_answer_type=='small_text' || $question_answer_type=='large_text') {
				$answer=$_POST[$question_id];
			} else if($question_answer_type=='yes_no' || $question_answer_type=='true_false' || $question_answer_type=='choose_answer') {
				if(isset($_POST[$question_id])) {
					$answer=$_POST[$question_id];
				}
			} else if($question_answer_type=='multi_choice'){
				if(isset($_POST[$question_id])) {
					$answers_ids_arr=$_POST[$question_id];
					$counter=0;
					foreach($answers_ids_arr as $answers_id) {
						if($counter==0) {
							$answer=$answer.$answers_id;
						} else {
							$answer=$answer.','.$answers_id;
						}
						$counter=$counter+1;
					}
				}	
			}
			
			$data['current_row'] = array(
			'client_id'=>$id,  
			'question_id'=>$question_id,  
			'answer'=>$answer,  

			'approved' => 0,
			'deleted' => 0,
			//'last_user_id' => $this->session->userdata('user_session')->id,
			'last_modify_date' =>$current_date,
			);
						        
			$this->Client_survey_answer_model->insert('', $data['current_row']);					
		}
		$this->session->set_userdata('message_session',lang('survey_saved_successfully'));
	 
			
		redirect(base_url().$this->lang->lang()."/client/result");
	}
	
	public function casestudy($id)
	{ 
		$data=array();
		
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('client_casestudy');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$data['case_study_rows']=$this->Case_study_model->get_by_client($id);

		$menu_link_row=$this->Menu_link_model->get_by_controller('client');
		$parent_id=$menu_link_row->parent_id;
		$data['side_menu_rows']=$this->Menu_link_model->get_all_child($parent_id);
		
		$data['title']=lang('case_studies');
		
		$this->load->view('website/case_study/index',$data);
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