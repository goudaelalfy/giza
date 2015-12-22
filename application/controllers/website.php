<?php
/**
 * Main Controller for website.
 *
 * It is main Controller file include the main Controller class Website Controller.
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
 * Website Class.
 *
 * This is the main controller class which other controller extend
 *
 * @package		core
 * @category	Business Login
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Website extends CI_Controller
{ 	
	
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
	}
	
	public function load()
	{
		$this->load->helper('language');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('cookie');
		$this->lang->load('main');
		
		$this->load->model('Menu_map_model', 'Menu_map_model' , True);
		$this->load->model('Menu_model', 'Menu_model' , True);
		$this->load->model('Menu_link_model', 'Menu_link_model' , True);
		$this->load->model('Industry_model', 'Industry_model' , True);	
		$this->load->model('Industry_sub_model', 'Industry_sub_model' , True);	
		$this->load->model('Solution_model', 'Solution_model' , True);	
		$this->load->model('Solution_sub_model', 'Solution_sub_model' , True);	
		$this->load->model('Office_model', 'Office_model' , True);	
		$this->load->model('Partner_model', 'Partner_model' , True);
		$this->load->model('Client_model', 'Client_model' , True);
		$this->load->model('Candidate_job_model', 'Candidate_job_model' , True);
		$this->load->model('Office_event_model', 'Office_event_model' , True);
		$this->load->model('Client_survey_model', 'Client_survey_model' , True);
		$this->load->model('Partner_survey_model', 'Partner_survey_model' , True);
		$this->load->model('Case_study_model', 'Case_study_model' , True);
		$this->load->model('Media_section_model', 'Media_section_model' , True);
		
		
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