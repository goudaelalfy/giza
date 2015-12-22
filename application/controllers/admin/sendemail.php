<?php
require(APPPATH.'controllers/'.ADMIN.'/email_setting.php');
require(APPPATH.'controllers/api/ExceptionThrower.php');

class Sendemail extends My_Controller
{ 	
	/**
	 * store this controller page screen id.
	 *
	 * @var int
	 * @access private
	 */
	private $screen_id=51;
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('language');
		$this->load->helper('url');
		$this->load->library('session');
		
		$this->lang->load('main');
						
		$this->load->model('Alumni_model','Alumni_model',True);
		$this->load->model('Client_model','Client_model',True);
		$this->load->model('Partner_model','Partner_model',True);
		$this->load->model('Subscriber_model','Subscriber_model',True);
				
		//---------- User Histroy ------------------//
		$this->load->model('User_history_model','User_history_model',True);
		//---------------------------------------------//		
		
				
		if(!$this->session->userdata('user_session'))
		{
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/'."user/login");
		}
	}
	
	function index()
	{
		if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_view)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		} 
		
		$data=array();
		 //-----------------------------------------------------------------
        $message_session=$this->session->userdata('message_session');
		if($message_session) {
        	$data['message']= $message_session;
        	$this->session->unset_userdata('message_session');
		}
        //-----------------------------------------------------------------
        
		$this->load->view('admin/send_email/form',$data);
	}
	
	function send()
	{ 
		if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_view)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		} 
		if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_edit)) {
		redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		}
		
		
        
        //-----------------------------------------------------------------
        $message_session=$this->session->userdata('message_session');
		if($message_session)
		{
        	$data['message']= $message_session;
        	$this->session->unset_userdata('message_session');
		}
        //-----------------------------------------------------------------
        
		if(isset($_POST['smt_send'])) {
			
			$attachment_file='';
			$uplad_path_file='';
			if($_FILES['attachment']['name']!='') {
					$userfile_name = $_FILES['attachment']['name']; // file name  
					$userfile_tmp  = $_FILES['attachment']['tmp_name']; // actual location  
					$userfile_size  = $_FILES['attachment']['size']; // file size  
					$userfile_type  = $_FILES['attachment']['type']; // mime type of file sent by browser. PHP doesn't check it.  
					$userfile_error  = $_FILES['attachment']['error'];
									
					$extension = end(explode('.', $_FILES['attachment']['name']));
					
				$uplad_path_file=getcwd().'/added/uploads/email_attachment/' . $userfile_name.'.'.$extension;
				if(move_uploaded_file($_FILES["attachment"]["tmp_name"], $uplad_path_file)) {
					$attachment_file=$uplad_path_file;
				}
			}
			$to=$_POST['to'];
			$cc=$_POST['cc'];
			$bcc=$_POST['bcc'];
			
			$subject=$_POST['subject'];
			$message_body=$_POST['body'];
			
			$emailsetting= new Emailsetting();
			$emailsetting->send_email($to, $subject, $message_body, '', $attachment_file, $cc, $bcc);

			if(file_exists($uplad_path_file)) {
				unlink($uplad_path_file);
			}
			
			$this->session->set_userdata('message_session',lang('email_sent_successfully'));
			
			redirect(base_url().$this->lang->lang()."/".ADMIN."/sendemail");
		}
        
		$this->load->view('admin/send_email/form',$data);
	}
	
	
	public function popupalumni($input_ctrl, $page=1 )
	{
		$data['input'] = $input_ctrl;
		
		$data['page']=$page;
		
		$rows_count = $this->Alumni_model->get_count('alumni');
		$data['rows_count']=$rows_count;
		
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$per_page = $data['paging_no_of_pages'];
    	
		$start = ($page-1)*$per_page;

		$table_fields_to_display='`id`,  `username`,  `password`,  `title`,  `firstname`,  `lastname`,`home_email`';
		$data['rows'] = $this->Alumni_model->get_all_display_paging('alumni', $start, $per_page, $table_fields_to_display, '', ''); 
        
		
		$this->load->view('admin/send_email/alumni_popup', $data);
	}
	
	public function popupclient($input_ctrl, $page=1 )
	{
		$data['input'] = $input_ctrl;
		
		$data['page']=$page;
		
		$rows_count = $this->Client_model->get_count('client');
		$data['rows_count']=$rows_count;
		
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$per_page = $data['paging_no_of_pages'];
    	
		$start = ($page-1)*$per_page;

		$table_fields_to_display='`id`,  `name`,`contact_email`';
		$data['rows'] = $this->Client_model->get_all_display_paging('client', $start, $per_page, $table_fields_to_display, '', ''); 
        
		
		$this->load->view('admin/send_email/client_popup', $data);
	}	
	
	public function popuppartner($input_ctrl, $page=1 )
	{
		$data['input'] = $input_ctrl;
		
		$data['page']=$page;
		
		$rows_count = $this->Partner_model->get_count('partner');
		$data['rows_count']=$rows_count;
		
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$per_page = $data['paging_no_of_pages'];
    	
		$start = ($page-1)*$per_page;

		$table_fields_to_display='`id`,  `name`,`contact_email`';
		$data['rows'] = $this->Partner_model->get_all_display_paging('partner', $start, $per_page, $table_fields_to_display, '', ''); 
        
		
		$this->load->view('admin/send_email/partner_popup', $data);
	}
	
	public function popupsubscriber($input_ctrl, $page=1 )
	{
		$data['input'] = $input_ctrl;
		
		$data['page']=$page;
		
		$rows_count = $this->Subscriber_model->get_count('subscriber');
		$data['rows_count']=$rows_count;
		
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$per_page = $data['paging_no_of_pages'];
    	
		$start = ($page-1)*$per_page;

		$table_fields_to_display='`id`,  `name`,`email`';
		$data['rows'] = $this->Subscriber_model->get_all_display_paging('subscriber', $start, $per_page, $table_fields_to_display, '', ''); 
        
		
		$this->load->view('admin/send_email/subscriber_popup', $data);
	}
	
	
}