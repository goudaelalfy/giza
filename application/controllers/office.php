<?php
/**
 * Office controller file.
 *
 * Contains controller class of the office entity.
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
 * Controller class for the office page.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Office extends Ci_Controller
{ 	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Country_model', 'Country_model' , True);
		$this->load->model('Office_model', 'Office_model' , True);
		$this->load->model('Office_setting_model', 'Office_setting_model' , True);
		$this->load->model('Office_event_model', 'Office_event_model' , True);
		
		$this->load->model('Menu_link_model', 'Menu_link_model' , True);
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
		
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('office');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
	
		
		$alias=urldecode($alias);
		$data['current_alias']=$alias;
		
		$menu_link_row=$this->Menu_link_model->get_by_controller('office');
		$parent_id=$menu_link_row->parent_id;
		$data['side_menu_rows']=$this->Menu_link_model->get_all_child($parent_id);
		$data['title']=lang('offices');
				
		//$data['rows']=$this->Office_model->get_all();
		$data['country_rows']=$this->Office_model->get_countries();
		
		$data['office_setting_rows']=$this->Office_setting_model->get_all();
		
		$this->load->view("website/office/content", $data);
	}

	
}