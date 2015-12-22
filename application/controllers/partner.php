<?php
/**
 * Partner controller file.
 *
 * Contains controller class of the partner entity.
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
 * Controller class for the partner page.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Partner extends Ci_Controller
{ 	
	/**
	 * store this controller partner table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='partner';
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Partner_model', 'Partner_model' , True);
		$this->load->model('Menu_link_model', 'Menu_link_model' , True);
		$this->load->model('Industry_model', 'Industry_model' , True);
		$this->load->model('Solution_model', 'Solution_model' , True);
		$this->load->model('Partner_industries_model', 'Partner_industries_model' , True);
		$this->load->model('Partner_solutions_model', 'Partner_solutions_model' , True);
		$this->load->model('Email_template_model', 'Email_template_model' , True);
		
		$this->load->model('Partner_survey_model', 'Partner_survey_model' , True);
		$this->load->model('Partner_survey_answer_model', 'Partner_survey_answer_model' , True);
		$this->load->model('Static_page_banner_model', 'Static_page_banner_model' , True);
		
		$this->load->controller('Website');
		$website_object= new Website();
		$website_object->load();
		
	}
	
	function login()
	{
		$data=array();
		
		
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('partner_login');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
	
		$partner_session=$this->session->userdata('partner_session');
		if($partner_session)
		{
			redirect(base_url().$this->lang->lang().'/partner/home');
		}
		/*
		if(isset($_POST['smt_login']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			if($this->checkAuth($username,$password))
			{
				redirect(base_url().$this->lang->lang().'/partner/index');				
			}
			else
			{
				$data['login_error']=lang('login_invalid');
			}
		}
		*/
		
		$this->load->view('website/partner/login', $data);		
	}
	
	function authourize()
	{
		$data=array();
		$partner_session=$this->session->userdata('partner_session');
		if($partner_session)
		{
			redirect(base_url().$this->lang->lang().'/partner/index');
		}
		//if(isset($_POST['smt_login']))
		//{
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			if($this->checkAuth($username,$password))
			{
				redirect(base_url().$this->lang->lang().'/partner/home');				
			}
			else
			{
				$data['login_error']=lang('login_invalid');
			}
		//}
		
		$this->load->view('website/partner/login', $data);		
	}
	
	function home()
	{
		$data=array();
			
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('partner_home');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
	
		$partner_session=$this->session->userdata('partner_session');
		if(!$partner_session)
		{
			redirect(base_url().$this->lang->lang().'/partner/login');
		}
		
		$this->load->view('website/partner/home', $data);		
	}
	
	function checkAuth($username='',$password='')
	{
		$row_data=$this->Partner_model->get_by_username_and_password($username,$password);
		$count=count($row_data);
		if($count>0)
		{
			$this->session->set_userdata('partner_session',$row_data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('partner_session');
		redirect(base_url().$this->lang->lang()."/partner/login");
	}
	
	function forgetPassword()
	{
		
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('partner_forget');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
	
		$this->load->view('website/partner/forget_password');		
	}
	
	function sendPassword()
	{
		$contact_email=$_POST['contact_email'];
		
		$row_data=$this->Partner_model->get_by_email($contact_email);
		$count=count($row_data);
		if($count>0) { 
			$this->session->set_userdata('message_session',lang('password_sent_successfully'));
				
			$name=$row_data->name;
			$username=$row_data->username;
			$password=$row_data->password;
				/*
				 * Send email to partner
				 */
				//--------------------------------------------------------------------------------------
				$email_template_row=$this->Email_template_model->get_by_purpose('partner_forget_password');
				$count_email_template_row=count($email_template_row);
				if($count_email_template_row>0) {
					
					$email_active=$email_template_row->active;
					$email_subject=$email_template_row->subject;
					//$email_body=$email_template_row->body;
					
					$email_body=$this->getEmailBody('forgetpassword');
					
					$email_body= str_replace('#@#@#@',$name, $email_body);
					$email_body= str_replace('#&#&#&',$username, $email_body);
					$email_body= str_replace('#*#*#*',$password, $email_body);
				
					$email_body= str_replace('#!#!#!', "<a href='".base_url().$this->lang->lang().'/partner/login'."'>".lang('login')."</a>" , $email_body);
					//$email_body= str_replace('#%#%#%', "<a href='".base_url().$this->lang->lang()."/partner/activate/$active_code'>".lang('activate')."</a>" , $email_body);
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
		redirect(base_url().$this->lang->lang().'/partner/result');
		
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

		
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('partner_index');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
	
		
		$menu_link_row=$this->Menu_link_model->get_by_controller('partner');
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
		$data['title']=lang('partners');

		$data['industry_rows']=$this->Industry_model->get_all_approved();
		$data['solution_rows']=$this->Solution_model->get_all_approved();
		
		
		$data['rows']=$this->Partner_model->get_all_approved();
		$this->load->view("website/partner/index", $data);
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
		$data['industry_rows'] = $this->Industry_model->get_all();
		$data['solution_rows'] = $this->Solution_model->get_all();
		
		
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('partner_profile');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
	
		
		$data['title']=lang('sign_up');
		$id=0;
		if($this->session->userdata('partner_session')) {
			$id= $this->session->userdata('partner_session')->id;
		}
		
        if($id!=0){	
			$data['current_row'] = $this->session->userdata('partner_session');
			
			//------------------------ Partner Industries ----------------------------------------
			$partner_industries_rows = $this->Partner_model->get_partner_industries_by_id($id);
			$data['partner_industries_rows']=$partner_industries_rows;
			/*
			$data['partner_industry_ids']='';
			$data['partner_industry_names']='';
        	$counter=0;
			foreach($partner_industries_rows as $partner_industries_row) {			
				$partner_industry_id=$partner_industries_row->industry_id;
				if($this->lang->lang()=='ar') {
					$partner_industry_name=$partner_industries_row->title_ar;
				} else {
					$partner_industry_name=$partner_industries_row->title;
				}
				if($counter==0) {
					$data['partner_industry_ids']=$data['partner_industry_ids'].$partner_industry_id;
					$data['partner_industry_names']=$data['partner_industry_names'].$partner_industry_name;
				} else {
					$data['partner_industry_ids']=$data['partner_industry_ids'].','.$partner_industry_id;
					$data['partner_industry_names']=$data['partner_industry_names'].','.$partner_industry_name;
				}
				$counter=$counter+1;
			}
			*/
        
			//------------------------ Partner Solution ----------------------------------------
			$partner_solutions_rows = $this->Partner_model->get_partner_solutions_by_id($id);
			$data['partner_solutions_rows']=$partner_solutions_rows;
			
			/*
			$data['partner_solution_ids']='';
			$data['partner_solution_names']='';			
			$counter=0;
			foreach($partner_solutions_rows as $partner_solutions_rows)
			{			
				$partner_solution_id=$partner_solutions_rows->solution_id;
				if($this->lang->lang()=='ar') {
					$partner_solution_name=$partner_solutions_rows->title_ar;
				} else {
					$partner_solution_name=$partner_solutions_rows->title;
				}
				if($counter==0)
				{
					$data['partner_solution_ids']=$data['partner_solution_ids'].$partner_solution_id;
					$data['partner_solution_names']=$data['partner_solution_names'].$partner_solution_name;
				}
				else
				{
					$data['partner_solution_ids']=$data['partner_solution_ids'].','.$partner_solution_id;
					$data['partner_solution_names']=$data['partner_solution_names'].','.$partner_solution_name;
				}
				$counter=$counter+1;
			}
			*/
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
					$this->Partner_model->insert($this->table, $data['current_row']);
					$id=$this->Partner_model->get_max_id($this->table);
					$this->session->set_userdata('message_session',lang('registered_successfully'));
				} else {
					$this->Partner_model->update($this->table, $id, $data['current_row']);
					$this->session->set_userdata('message_session',lang('registered_successfully'));
				}
				redirect(base_url().$this->lang->lang()."/partner/result");
			}
		*/
        
		$this->load->view('website/partner/profile',$data);
	}
	
	public function save()
	{ 	
		$id=0;
		if($this->session->userdata('partner_session')) {
			$id= $this->session->userdata('partner_session')->id;
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
						
					$uplad_path_file=getcwd().'/added/uploads/logo/partner/' . $name_file_timestamp.'.'.$extension;
				
					//if ($userfile_type!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
					if(move_uploaded_file($_FILES["logo"]["tmp_name"], $uplad_path_file))
					{
						
						if($id==0) {
							$logo = '/added/uploads/logo/partner/'.$name_file_timestamp.'.'.$extension;
									
						} else {
								
						if($_FILES['logo']['name']!='') {
							
							$logo=$this->Partner_model->get_logo_by_id($this->table, $id);
							$logo_path=getcwd().$logo;
							if(isset($logo_path) && $logo_path!=getcwd()) {
							unlink($logo_path);
							}
							$logo = '/added/uploads/logo/partner/'.$name_file_timestamp.'.'.$extension;
							
						} else {
							$logo = $this->Partner_model->get_logo_by_id($this->table, $id);;
						}
							
						}
					}
					
					
				}else {
					if($id==0) {
							$logo = '';
									
						} else { 
							$logo = $this->Partner_model->get_logo_by_id($this->table, $id);
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
			$current_row=$this->Partner_model->get_by_id($this->table, $id);

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
					$this->Partner_model->insert($this->table, $data['current_row']);
					$id=$this->Partner_model->get_max_id($this->table);
					
					/*
					 * Send email to partner
					 */
					//--------------------------------------------------------------------------------------
					$email_template_row=$this->Email_template_model->get_by_purpose('partner_signup');
					$count_email_template_row=count($email_template_row);
					if($count_email_template_row>0) {
						
						$email_active=$email_template_row->active;
						$email_subject=$email_template_row->subject;
						//$email_body=$email_template_row->body;
						
						$email_body=$this->getEmailBody('registeration');
						
						$email_body= str_replace('#@#@#@',$_POST['contact_firstname'], $email_body);
						$email_body= str_replace('#&#&#&',$username, $email_body);
						$email_body= str_replace('#*#*#*',$password, $email_body);
					
						$email_body= str_replace('#!#!#!', "<a href='".base_url().$this->lang->lang().'/partner/login'."'>".lang('login')."</a>" , $email_body);
						$email_body= str_replace('#%#%#%', "<a href='".base_url().$this->lang->lang()."/partner/activate/$active_code'>".lang('activate')."</a>" , $email_body);
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
					$this->Partner_model->update($this->table, $id, $data['current_row']);
					$this->session->set_userdata('message_session',lang('profile_saved_successfully'));
					
					$row_data=$this->Partner_model->get_by_id($this->table, $id);
					$count=count($row_data);
					if($count>0)
					{
						$this->session->set_userdata('partner_session',$row_data);
					}
				}
				
				//Insert partner Solutions.
				if(isset($_POST['solutions'])) {
					$partner_solution_data = array();
					$solutions=$_POST['solutions'];
					foreach($solutions as $solution_id) {
						$partner_solution_data[]=array('partner_id' => $id,'solution_id' => $solution_id);
					}
					$this->Partner_solutions_model->insert($id,$partner_solution_data);
				}
				
				//Insert partner Industries.
				if(isset($_POST['industries'])) {
					$partner_industry_data = array();
					$industries=$_POST['industries'];
					foreach($industries as $industry_id) {
						$partner_industry_data[]=array('partner_id' => $id,'industry_id' => $industry_id);
					}
					$this->Partner_industries_model->insert($id,$partner_industry_data);
				}
				
			redirect(base_url().$this->lang->lang()."/partner/result");
	}
	
	/**
	 * activate method.
	 * 
	 * Method used to activate partner.
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
						
		$this->Partner_model->activate($active_code, $data);
		$this->session->set_userdata('message_session',lang('activated_successfully').'<br>'."<a href='".base_url().$this->lang->lang()."/partner/login'>".lang('login')."</a>");
		
		redirect(base_url().$this->lang->lang().'/partner/result');

	}
	function result()
	{
		//-----------------------------------------------------------------
        $data=array();
        
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('partner_result');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
	
		$message_session=$this->session->userdata('message_session');
		if($message_session) {
        	$data['message']= $message_session;
        	$this->session->unset_userdata('message_session');
		}
        //-----------------------------------------------------------------
        
		$this->load->view('website/partner/result', $data);
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
													<div style='font-family:Arial, Helvetica, sans-serif; font-size:11; color:#636363; text-align:justify'>Giza Systems <a href='www.gizasystems.com' style='font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#00a4e4; text-decoration:underline'>www.gizasystems.com</a> is the number one systems integrator in Egypt and the Middle East providing a wide range of industry specific technology solutions in the Telecom, Utilities, Oil & Gas, and Manufacturing industries. We have been shaping the IT industry and corporate agendas since 1974. Our consultancy practice provides industry focused services that enhance value for our partners by streamlining operational and business processes. Operating in the Middle East through Giza Arabia <a href='www.gizaarabia.com' style='font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#00a4e4; text-decoration:underline'>www.gizaarabia.com</a>, our group of companies is focused on contributing to the local and regional development with our technology solutions, commitment and outstanding customer service. Our team of 700 professionals enables us to extend our geographic footprint delivering diverse projects and connecting us with clients in the Middle East, Africa, Europe, Latin America and Russia.</div><br />
		 
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
		  
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('partner_survey');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
	
		$data['partner_survey_question_rows'] = $this->Partner_survey_model->get_all_display_paging_approved('partner_survey_question', 0, 1000, '*', 'sort', ''); 
        		
		$data['title']=lang('sign_up');
		$id=0;
		if($this->session->userdata('partner_session')) {
			$id= $this->session->userdata('partner_session')->id;
		} else {
			redirect(base_url().$this->lang->lang()."/partner/login");
		}
		
        if($id!=0){	
			$data['current_partner_survey_rows'] = $this->Partner_survey_answer_model->get_by_partner($id);
        }
        
        
        //$data['mode']= $mode;

        //-----------------------------------------------------------------
        $message_session=$this->session->userdata('message_session');
		if($message_session) {
        	$data['message']= $message_session;
        	$this->session->unset_userdata('message_session');
		}
        //-----------------------------------------------------------------
        
		$this->load->view('website/partner/survey',$data);
	}
	
	
	public function savesurvey()
	{ 	
		$id=0;
		if($this->session->userdata('partner_session')) {
			$id= $this->session->userdata('partner_session')->id;
		} else {
			redirect(base_url().$this->lang->lang()."/partner/login");
		}
        
		$dateTime = new DateTime(); 
		$current_date=$dateTime->format("Y-m-d H:i:s");
		
		$partner_survey_question_rows = $this->Partner_survey_model->get_all_display_paging('partner_survey_question', 0, 1000, '*', 'sort', ''); 
		
		$this->Partner_survey_answer_model->delete_by_partner($id);
		
		foreach($partner_survey_question_rows as $partner_survey_question_row) {
			
			$question_id=$partner_survey_question_row->id;
			$question_answer_type=$partner_survey_question_row->answer_type;
			
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
			'partner_id'=>$id,  
			'question_id'=>$question_id,  
			'answer'=>$answer,  

			'approved' => 0,
			'deleted' => 0,
			//'last_user_id' => $this->session->userdata('user_session')->id,
			'last_modify_date' =>$current_date,
			);
						        
			$this->Partner_survey_answer_model->insert('', $data['current_row']);					
		}
		$this->session->set_userdata('message_session',lang('survey_saved_successfully'));
	 
			
		redirect(base_url().$this->lang->lang()."/partner/result");
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