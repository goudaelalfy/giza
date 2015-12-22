<?php
class Tripleg extends CI_Controller
{ 	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('language');
		$this->load->helper('url');
		$this->load->library('session');

		$this->load->library('user_agent');
		
		/*
		if(!$this->session->userdata('user_session'))
		{
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/user/login');
		}
		*/
	}
	
	function index()
	{
		
	}
	
	function language($language)
	{
		global $CFG;
		global $URI;
		global $RTR;
		$lang_object=new MY_Lang();
		$segment = $URI->segment(1);
		if (isset($lang_object->languages[$segment]))	// URI with language -> ok
		{
			$current_language = $lang_object->languages[$segment];
			if($current_language=='english')
			$curr_lang='en';
			else if($current_language=='arabic')
			$curr_lang='ar';
			else
			$curr_lang=$current_language;
			
			//printf($this->agent->referrer());
			//printf($current_language);
			//printf($language);
			
			$url=$this->agent->referrer();
			$url=str_replace('index.php','',$url);	
			$url=str_replace('/'.$curr_lang.'/','/'.$language.'/',$url);	

			//printf($url);
			
			redirect($url);
		}	
	}
}