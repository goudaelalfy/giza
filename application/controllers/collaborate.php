<?php
/**
 * Collaborate controller file.
 *
 * Contains controller class of the collaborate entity.
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
 * Controller class for the collaborate.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Collaborate extends Ci_Controller
{ 	
	/**
	 * store this controller industry screen id.
	 *
	 * @var int
	 * @access public
	 */
	public $screen_id=0;
	
	/**
	 * store this controller industry table name.
	 *
	 * @var string
	 * @access private
	 */
	private $table='collaborate';
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Collaborate_model', 'Collaborate_model' , True);
		$this->load->model('Menu_link_model', 'Menu_link_model' , True);
		$this->load->model('Email_setting_model','Email_setting_model',True);
		$this->load->model('Static_page_banner_model', 'Static_page_banner_model' , True);
		
		$this->load->controller('Website');
		$website_object= new Website();
		$website_object->load();
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
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('collaborate_form');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
	
		$alias=urldecode($alias);
		$data['current_alias']=$alias;
		$menu_link_row=$this->Menu_link_model->get_by_controller('collaborate');
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
		$data['title']=lang('collaborate');
						
		$this->load->view("website/collaborate/form", $data);
	}
	
	function submit()
	{
		$dateTime = new DateTime(); 
		$current_date=$dateTime->format("Y-m-d H:i:s");
		
		$data['current_row'] = array(
		'name'=>$_POST['name'],  
		'email'=>$_POST['email'], 
		'type'=>$_POST['type'], 
		'message'=>$_POST['message'], 
		
		'approved' => 0,
		'deleted' => 0,
		//'last_user_id' => $this->session->userdata('user_session')->id,
		'last_modify_date' =>$current_date,
		);
		        
	
		$this->Collaborate_model->insert($this->table, $data['current_row']);
		$id=$this->Collaborate_model->get_max_id($this->table);
		
		/*
		 * Send email to partner
		 */
		//--------------------------------------------------------------------------------------
		
		
		//$email_template_row=$this->Email_template_model->get_by_purpose('collaborate_client');
		//$count_email_template_row=count($email_template_row);
		//if($count_email_template_row>0) {
			
			//$email_active=$email_template_row->active;
			$email_active=1;
			
			$email_subject=lang('collaborate_with_us');
			//$email_body=$email_template_row->body;
			
			$email_body=$_POST['message'];
			$email_body=$email_body.'<br/> from:'.$_POST['name'].'<br/> email:'.$_POST['email'].'<br/> type:'.$_POST['type'];
			/*
			$email_body= str_replace('#@#@#@',$_POST['contact_firstname'], $email_body);
			$email_body= str_replace('#&#&#&',$username, $email_body);
			$email_body= str_replace('#*#*#*',$password, $email_body);
		
			$email_body= str_replace('#!#!#!', "<a href='".base_url().$this->lang->lang().'/partner/login'."'>".lang('login')."</a>" , $email_body);
			$email_body= str_replace('#%#%#%', "<a href='".base_url().$this->lang->lang()."/partner/activate/$active_code'>".lang('activate')."</a>" , $email_body);
			$email_body= str_replace('#^#^#^','http://www.gizasystems.com', $email_body);
			*/
			
			if($email_active==1) {
				//$email=$_POST['email'];
				$email_settings=$this->Email_setting_model->get_all();
				$website_mail=$email_settings[0]->website_mail;
		
				$emailSetting= new EmailSetting();
				$sending_email=$emailSetting->send_email($website_mail, $email_subject, $email_body);
			}
		//}
		
		//---------------------------------------------------------------------------------------
		$this->session->set_userdata('message_session',lang('message_sent_successfully'));
	
			
		redirect(base_url().$this->lang->lang()."/collaborate/result");
	}
	
	function result()
	{
		//-----------------------------------------------------------------
        $data=array();
        $static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('collaborate_result');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
	
		$message_session=$this->session->userdata('message_session');
		if($message_session) {
        	$data['message']= $message_session;
        	$this->session->unset_userdata('message_session');
		}
        //-----------------------------------------------------------------
        
		$this->load->view('website/collaborate/result', $data);
	}
}