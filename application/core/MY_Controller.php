<?php
/**
 * Main Controller for system or website.
 *
 * It is main Controller file include the main Controller class My_Controller.
 *
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 * @copyright	Copyright (c) 2013, Info-cast.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://www.infocast-me.com
 * @since		Version 2.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * My_Controller Class.
 *
 * This is the main controller class which other controller extend
 *
 * @package		core
 * @category	Business Login
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class My_Controller extends CI_Controller
{ 	
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
	
	
	/**
	 * Constructor
	 *
	 * Load CI package which Will used in system controllers. 
	 * @access public
	*/
	function __construct()
	{
		parent::__construct();

		$this->load->helper('language');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('cookie');
				
		
		
		$this->lang->load('main');
		
		$this->load->model('Setting_model','Setting_model',True);
		$this->load->model('User_model', 'User_model' , True);
		
		//---------- User Histroy ------------------//
		$this->load->model('User_history_model','User_history_model',True);
		//---------------------------------------------//		
		
		
		if(!$this->session->userdata('user_session'))
		{
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/user/login');
		}
	}
	
	/**
	 * User privielge Method.
	 *
	 * Method to return true if the current user have access to this region on this screen, and false if not. 
	 *
	 * @access	public
	 * @param   int
	 * @param   string
	 * @return	boolean
	 */	
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
	
	/**
	 * start_with Method.
	 *
	 * Method to check if string start with another. 
	 *
	 * @access	public
	 * @param   string
	 * @param   string
	 * @return	boolean
	 */	
	public function start_with($s, $prefix)
	{
	    return strpos($s, $prefix) === 0;
	}
	
}