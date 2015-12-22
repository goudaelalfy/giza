<?php
class Defaultpage extends My_Controller
{ 	
	/**
	 * Constructor
	 *
	 */
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('language');
		$this->load->helper('url');
		$this->load->library('session');
		
		$this->lang->load('main');

		
		if(!$this->session->userdata('user_session'))
		{
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/'."user/login");
		}
	}
	
	function index()
	{
		$this->load->view('admin/defaultpage/index');
	}
	
	
	
}