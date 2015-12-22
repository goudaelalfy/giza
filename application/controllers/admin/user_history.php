<?php
class User_history extends My_Controller
{ 	
	/**
	 * store this controller page screen id.
	 *
	 * @var int
	 * @access private
	 */
	private $screen_id=7;
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('language');
		$this->load->helper('url');
		$this->load->library('session');
		
		$this->lang->load('user_history');
		$this->lang->load('main');
		
		$this->load->model('User_history_model','User_history_model',True);
		$this->load->model('Setting_model','Setting_model',True);
		$this->load->model('Screen_model','Screen_model',True);
		
		$this->load->view('admin/user_history/functions');
		
		if(!$this->session->userdata('user_session'))
		{
			redirect(base_url().$this->lang->lang()."/".ADMIN."/user/login");
		}
	}
	
	function index()
	{
		redirect(base_url().$this->lang->lang()."/".ADMIN."/user_history/table");
	}
	
	//Not Useable.
	function add($user_id,  $screen_id,  $screen_function_id,  $the_date, $row_id)
	{ 		
        $data = array(
				'user_id' => $user_id,
				'screen_id' =>$screen_id,
        		'screen_function_id' =>$screen_function_id,
        		'the_date' =>$the_date,
        		'row_id' =>$row_id,
				);
								
		$this->User_history_model->insert($data);
	}
	
	/*
	function table($order=null, $order_type=null)
	{
		$data['rows_count'] = $this->User_history_model->get_count();
		$data['user_histories'] = $this->User_history_model->get_all_display($order, $order_type); 
        
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$this->load->view('admin/user_history/table', $data);
	}
	*/
	
	function table($page=1, $order=null, $order_type=null)
	{
		if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_view)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		}
		
		$rows_count = $this->User_history_model->get_count();
		$data['rows_count']=$rows_count;
		
		$data['page']=$page;
		
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$per_page = $data['paging_no_of_pages'];
		if(isset($_GET['page']))
    	$page = $_GET['page'];
		$start = ($page-1)*$per_page;

		$data['user_histories'] = $this->User_history_model->get_all_display_paging($start, $per_page, $order, $order_type); 
        
		
		$this->load->view('admin/user_history/table', $data);
	}
	
	
}