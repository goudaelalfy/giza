<?php

/**
 * 
 * User controller mustn't extend from MY_Controller.  
 *
 */
class User extends CI_Controller
{ 	
	/**
	 * store this controller page screen id.
	 *
	 * @var int
	 * @access private
	 */
	private $screen_id=2;
	
	/**
	 * store this screen privielge view text.
	 *
	 * @var string
	 * @access public
	*/
	public $privielge_view='view';
	
	/**
	 * store this screen privielge add text.
	 *
	 * @var string
	 * @access public
	*/
	public $privielge_add='add';
	
	/**
	 * store this screen privielge edit text.
	 *
	 * @var string
	 * @access public
	*/
	public $privielge_edit='edit';
	
	/**
	 * store this screen privielge delete text.
	 *
	 * @var string
	 * @access public
	*/
	public $privielge_delete='delete';
	
	/**
	 * store this screen privielge cancel text.
	 *
	 * @var string
	 * @access public
	*/
	public $privielge_cancel='cancel';
	
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('language');
		$this->load->helper('url');
		$this->load->library('session');
		
		$this->lang->load('user');
		$this->lang->load('main');
		
		$this->load->model('Setting_model','Setting_model',True);
		$this->load->model('User_model', 'User_model' , True);
				
		//---------- User Histroy ------------------//
		$this->load->model('User_history_model','User_history_model',True);
		//---------------------------------------------//		
		
		$this->load->view('admin/user/functions');
		
	}
	
	function index()
	{
		if(!$this->session->userdata('user_session'))
		{
			redirect(base_url().$this->lang->lang()."/".ADMIN."/user/login");
		}
		
		redirect(base_url().$this->lang->lang()."/".ADMIN."/user/table");
	}
	
	function login()
	{
		$data=array();
		$user_session=$this->session->userdata('user_session');
		if($user_session)
		{
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/user/index');
		}
		if(isset($_POST['smt_login']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			if($this->checkAuth($username,$password))
			{
				redirect(base_url().$this->lang->lang().'/'.ADMIN.'/user/index');				
			}
			else
			{
				$data['login_error']=lang('login_invalid');
			}
		}
		
		$this->load->view('admin/user/login', $data);		
	}
	
	function checkAuth($username='',$password='')
	{
			$row_data=$this->User_model->get_by_username_and_password($username,$password);
			$count=count($row_data);
			//echo $count; exit;
			if($count>0)
			{
				$this->session->set_userdata('user_session',$row_data);
				
				//User Privielges
				$user_privielges=$this->User_model->get_privielges_by_user_id($this->session->userdata('user_session')->id);
				//$user_privielges=serialize($user_privielges);
				//$this->session->set_userdata('user_privielges_session',$user_privielges);
				
				//foreach ($this->session->userdata('user_privielges_session') as $ss)
				//printf($ss->view);
				//exit;
				
				return TRUE;
			}
			else
			{
				return FALSE;
			}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('user_session');
		$this->session->unset_userdata('user_privielges_session');
		redirect(base_url().$this->lang->lang()."/".ADMIN."/user/login");
	}
	
	function form($id, $mode)
	{ 
		if(!$this->session->userdata('user_session'))
		{
			redirect(base_url().$this->lang->lang()."/".ADMIN."/user/login");
		}
		if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_view)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		} else if($mode=='add') {
			if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_add)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
			}
		} else if($mode=='edit') {
			if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_edit)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
			}
		}
		
        if($id!=0)
        {
			$data['user_row'] = $this->User_model->get_by_id($id);
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
				if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_edit)) {
				redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
				}
				
				$data['user_row'] = $this->User_model->get_by_id($id);
				$last_modify_date=$data['user_row']->last_modify_date;
			}
			else
			{
				if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_add)) {
				redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
				}
				
				$last_modify_date='';
			}
			if($id!=0 && $_POST['last_modify_date']!=$last_modify_date)
			{ 
					if(isset($_POST['admin'])) {
					$admin=1;
					} else {
					$admin=0;
					}
					
					$data['user_row'] = array(
								'id' => $id ,
					//$this->db->escape(
				               	'username' => $_POST['username'] ,
				               	'password' => $_POST['password'] ,
				               	'name' => $_POST['name'],
								'mobile' => $_POST['mobile'] ,
				               	'telephone' => $_POST['telephone'] ,
				               	'email' => $_POST['email'],
								'address' => $_POST['address'] ,
				               	'user_group_id' => $_POST['user_group_id'],
								//'user_rule_id' => $_POST['user_rule'] ,
								'admin' => $admin,
				            );
				                 
				            $data['error']= $this->lang->line('updated_by_another_user_error')."<a  href='".base_url().$this->lang->lang()."/".ADMIN."/user/form/$id/view' >".$this->lang->line('click_here_link')."</a>";
				            
				            $data['mode']= 'return';
							$this->load->view('admin/user/form',$data);
			}
			
				else if($this->username_redundency($id))
				{
					
					if(isset($_POST['admin'])) {
					$admin=1;
					} else {
					$admin=0;
					}
					
					$data['user_row'] = array(
								'id' => $id ,
				               	'username' => $_POST['username'] ,
				               	'password' => $_POST['password'] ,
				               	'name' => $_POST['name'],
								'mobile' => $_POST['mobile'] ,
				               	'telephone' => $_POST['telephone'] ,
				               	'email' => $_POST['email'],
								'address' => $_POST['address'] ,
				               	'user_group_id' => $_POST['user_group_id'],
								'admin' => $admin,
								//'user_rule_id' => $_POST['user_rule'] ,
				            );
				            
				         	$duplicated_id=$this->User_model->get_id_by_username($_POST['username']);
				            $data['error']= lang('username_redundency_error')."<a  href='".base_url().$this->lang->lang()."/".ADMIN."/user/form/$duplicated_id/view' >".$this->lang->line('click_here_link')."</a>";
				            
				            
				            $data['mode']= 'return';
							//$this->load->view('admin/user/form',$data);
				}
				else 
				{
						$dateTime = new DateTime(); 
						$current_date=$dateTime->format("Y-m-d H:i:s");
						
				if(isset($_POST['admin'])) {
					$admin=1;
					} else {
					$admin=0;
					}
							if($id==0)
							{
							
					
								$data = array(
					              	'username' => $_POST['username'] ,
					               	'password' => $_POST['password'] ,
					               	'name' => $_POST['name'],
									'mobile' => $_POST['mobile'] ,
					               	'telephone' => $_POST['telephone'] ,
					               	'email' => $_POST['email'],
									'address' => $_POST['address'] ,
					               	'user_group_id' => $_POST['user_group_id'],
									'admin' => $admin,
									'deleted' => 0,
									'last_user_id' => $this->session->userdata('user_session')->id,
								   	'last_modify_date' =>$current_date,
					            );
								
								$this->User_model->insert($data);
								$id=$this->User_model->get_max_id();

								//----------User Histroy Row ------------------//
								$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,1,$current_date,$id);								
								//---------------------------------------------//
								
								$this->session->set_userdata('message_session',lang('saved_successfully'));
							}
							else 
							{
								
								$data = array(
					              	'username' => $_POST['username'] ,
					               	'password' => $_POST['password'] ,
					               	'name' => $_POST['name'],
									'mobile' => $_POST['mobile'] ,
					               	'telephone' => $_POST['telephone'] ,
					               	'email' => $_POST['email'],
									'address' => $_POST['address'] ,
					               	'user_group_id' => $_POST['user_group_id'],
									//'user_rule_id' => $_POST['user_rule'] ,
									'admin' => $admin,
									'last_user_id' => $this->session->userdata('user_session')->id,
								   	'last_modify_date' =>$current_date,
					            );
								
								$this->User_model->update($id,$data);
								
								//----------User Histroy Row ------------------//
								$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);								
								//---------------------------------------------//
								
								$this->session->set_userdata('message_session',lang('saved_successfully'));
								
							}
							
							/*
							echo "
							<script type='text/javascript'>
							if(confirm('".lang('add_new_confirm')."'))
							window.location='".base_url().$this->lang->lang()."/".ADMIN."/user/form/0/add'
							else
							window.location='".base_url().$this->lang->lang()."/".ADMIN."/user/table'
							</script>
							";
							exit;
							*/
							
							redirect(base_url().$this->lang->lang()."/".ADMIN."/user/form/$id/view");
				}
		}
        
		$this->load->view('admin/user/form',$data);
	}
	
	/*
	function table($page=1, $order=null, $order_type=null)
	{
		if(!$this->session->userdata('user_session'))
		{
			redirect(base_url().$this->lang->lang()."/".ADMIN."/user/login");
		}
		
		$data['rows_count'] = $this->User_model->get_count();
		$data['users'] = $this->User_model->get_all_display($order, $order_type); 
        
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$this->load->view("admin/user/table", $data);
	}
	*/
	function table($page=1, $order=null, $order_type=null)
	{
		if(!$this->session->userdata('user_session'))
		{
			redirect(base_url().$this->lang->lang()."/".ADMIN."/user/login");
		}
	if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_view)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		}
		
		
		$data['page']=$page;
		
		$rows_count = $this->User_model->get_count();
		$data['rows_count']=$rows_count;
		
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$per_page = $data['paging_no_of_pages'];
    	
		$start = ($page-1)*$per_page;

		$data['users'] = $this->User_model->get_all_display_paging($start, $per_page, $order, $order_type); 
        
		
		$this->load->view("admin/user/table", $data);
	}
	
	function write_div_table_display_records($order=null, $order_type=null)
	{
		if(!$this->session->userdata('user_session'))
		{
			redirect(base_url().$this->lang->lang()."/".ADMIN."/user/login");
		}
		
		$rows_count = $this->User_model->get_count();
		$data['rows_count']=$rows_count;
		
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$per_page = $data['paging_no_of_pages'];
		if(isset($_GET['page']))
    	$page = $_GET['page'];
    	else
    	$page=1;
    	
		$start = ($page-1)*$per_page;

		$data['users'] = $this->User_model->get_all_display_paging($start, $per_page, $order, $order_type); 
        
		
		$functions = new Functions();
		$link_to_screen=base_url().$this->lang->lang().'/'.ADMIN.'/user';
		
		$inner_html="
		<script type='text/javascript'  src='".base_url()."js/includes/jquery.js' > </script>
		<script type='text/javascript'  src='".base_url()."js/admin/user/ajax_paging.js' > </script>
		<div id='news' class='tabcon'>
		<div id='resn'></div>";

		$inner_html=$inner_html. "<div id='pagesn'>";
	
		$ipp=$per_page;//items per page
		$totalpages=ceil($rows_count/$ipp);
		$inner_html=$inner_html."<span class='peg'><ul class='pages'>";
		for($i=1;$i<=$totalpages; $i++)
		{
			$inner_html=$inner_html."<li class='$i'><a href='#'>$i</a></li>";
		}
		$inner_html=$inner_html."</ul></span>";
	
		$inner_html=$inner_html. "</div></div>";
		
		$inner_html= printf($inner_html); 
		
		return $inner_html.$functions->display_data_table($data['users'],$link_to_screen,$this);
		
	}
	
	function delete($id)
	{
		if(!$this->session->userdata('user_session'))
		{
			redirect(base_url().$this->lang->lang()."/".ADMIN."/user/login");
		}
		
	if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_delete)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		}
		//$this->User_model->delete($id);		
		
		//----------User Histroy Row ------------------//
		$dateTime = new DateTime(); 
		$current_date=$dateTime->format("Y-m-d H:i:s");
		$data = array(
		'deleted' => 1,
		'last_user_id' => $this->session->userdata('user_session')->id,
		'last_modify_date' =>$current_date,
		);
								
		$this->User_model->update($id,$data);
		$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$id);								
		//---------------------------------------------//
		
		
		redirect(base_url().$this->lang->lang().'/'.ADMIN.'/user/index');
	}
	
	function submit_display()
	{
		if(!$this->session->userdata('user_session'))
		{
			redirect(base_url().$this->lang->lang()."/".ADMIN."/user/login");
		}
	if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_delete)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		}
		
		//if(isset($_POST['lnk_delete']))
		{
			if(isset($_POST['chk_current_row']))
			{
				$del=$_POST['chk_current_row'];
		    
				foreach($del as $del_id)
				{
					//----------User Histroy Row ------------------//
					$dateTime = new DateTime(); 
					$current_date=$dateTime->format("Y-m-d H:i:s");
					$data = array(
					'deleted' => 1,
					'last_user_id' => $this->session->userdata('user_session')->id,
					'last_modify_date' =>$current_date,
					);
											
					$this->User_model->update($del_id,$data);
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$del_id);								
					//---------------------------------------------//
		
				}
			}			
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/user/index');
		}
	}
	
	function username_redundency($id)
	{
		$username = $_POST['username'] ;
		$username_count=$this->User_model->get_count_by_username($id,$username);
		
			if($username_count>0)
			{
				return true;
			}

			return false;
	}
	
	function check_username_availability($id)
	{
		if(isset($_POST['username']))
		{
			$username=$_POST['username'];
			$username_count=$this->User_model->get_count_by_username($id,$username);
			if($username_count>0)
			{
					echo str_replace("###",$username, lang('username_not_available_error'));
			}
			else
			{
				echo 'OK';
			}
		}
		exit;
	}
	
	
	
	public function user_screen_privielge_allowed($screen_id, $privielge)
	{
		if(!$this->session->userdata('user_session')) {
			return false;
		}
		
		$privielge_value=$this->User_model->get_privielge_value_by_user_id_and_screen_id($this->session->userdata('user_session')->id, $screen_id, $privielge);
		if($privielge_value==1) {
			return true;
		}		
		return false;
	}
	
}