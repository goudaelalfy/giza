<?php
class Emailsetting extends CI_Controller
{ 	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('language');
		$this->load->helper('url');
		$this->load->library('session');
		
		$this->lang->load('main');
		
		
		$this->load->model('Email_setting_model','Email_setting_model',True);
	}
	
	function index()
	{
		/*
		if(!$this->session->userdata('admin_session'))
		{
			redirect(base_url().$this->lang->lang()."/admin/admin/login");
		}
		redirect(base_url().$this->lang->lang()."/admin/email-setting/form/1/edit");
		*/
	}
	
	function form($id, $mode)
	{ 
		/*
		if(!$this->session->userdata('admin_session'))
		{
			redirect(base_url().$this->lang->lang()."/admin/admin/login");
		}
		
        if($id!=0)
        {
			$data['email_setting_row'] = $this->Email_setting_model->get_by_id($id);
        }
        $data['mode']= $mode;

        //-----------------------------------------------------------------
        $message_session=$this->session->userdata('message_session');
		if($message_session)
		{
        	$data['message']= $message_session;
        	$this->session->unset_userdata('message_session');
		}
        //-----------------------------------------------------------------
        
		if(isset($_POST['smt_save']))
		{
			if($id!=0)
			{
				$data['email_setting_row'] = $this->Email_setting_model->get_by_id($id);
			}
			
				
						$dateTime = new DateTime(); 
						$current_date=$dateTime->format("Y-m-d H:i:s");

						$smtp_password=base64_encode($_POST['smtp_password']);
						
						$data = array(
				               		'email_sender_type' => $_POST['email_sender_type'],
									'smtp_server' => $_POST['smtp_server'],
									'smtp_port' => $_POST['smtp_port'],
									'smtp_account' => $_POST['smtp_account'],
									'smtp_password' => $smtp_password,
									'website_mail' => $_POST['website_mail'],
					            );
								
								$this->Email_setting_model->update($id,$data);
								$this->session->set_userdata('message_session',lang('saved_successfully'));

								redirect(base_url().$this->lang->lang()."/admin/email-setting/form/$id/view");
				
		}
        
		$this->load->view('email_setting/form',$data);
		*/
	}
	
	function send_email($to, $subject, $message, $mailheaders = "Content-type: text/html", $file='', $cc='', $bcc='')
	{
		$email_settings=$this->Email_setting_model->get_all();
		$email_sender=$email_settings[0]->email_sender_type;
		
		if($email_sender=='smtp')
		{
			
			$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => $email_settings[0]->smtp_server,
			'smtp_port' => $email_settings[0]->smtp_port,
			'smtp_crypto' => 'ssl',
		    'smtp_user' => $email_settings[0]->smtp_account,
		    'smtp_pass' => base64_decode($email_settings[0]->smtp_password),
		    'mailtype'  => 'html', 
		    'charset'   => 'utf-8'
			);
			
			
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			  
			$this->email->from($email_settings[0]->smtp_account, '');
			$this->email->to($to); 
			$this->email->cc($cc); 
			$this->email->bcc($bcc);  
			$this->email->subject($subject);  
			$this->email->message($message);
			
			if($file!='')
			{
				$this->email->attach($file);
			}
			
			$result = $this->email->send();
			return $result;
		}
		else if($email_sender=='phpmail')
		{
			$config = Array(
		    'mailtype'  => 'html', 
		    'charset'   => 'utf-8'
			);
			$website_mail=$email_settings[0]->website_mail;
			//$mailheaders = "Content-type: text/html";
			//$result= mail($to, $subject, $message, $mailheaders);
			
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			 
			$this->email->from($website_mail, '');
			$this->email->to($to);  
			$this->email->cc($cc); 
			$this->email->bcc($bcc);
			$this->email->subject($subject);  
			$this->email->message($message);
			
			if($file!='')
			{
				$this->email->attach($file);
			}
			
			$result=$this->email->send();
			
			return $result;
		}
  
	}
	
	
}