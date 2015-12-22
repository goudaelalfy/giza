<?php
/**
 * Officeevent controller file.
 *
 * Contains controller class of the officeevent entity.
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
 * Controller class for the officeevent page.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Officeevent extends Ci_Controller
{ 	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
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
		
		$alias=urldecode($alias);
		$data['current_alias']=$alias;

		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('office_event');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
	
		
		$menu_link_row=$this->Menu_link_model->get_by_controller('officeevent');
		$parent_id=$menu_link_row->parent_id;

		$parent_link_row=$this->Menu_link_model->get_by_id('', $parent_id);
		if(count($parent_link_row)>0) {
			if($this->lang->lang()=='ar') {
				$data['parent_link_title']=$parent_link_row->title_ar;
			} else {
				$data['parent_link_title']=$parent_link_row->title;
			}
		}
		
		$menu_link_row=$this->Menu_link_model->get_by_controller_and_alias('officeevent', $alias);
		$menu_id=$menu_link_row->menu_id;
		$data['side_menu_rows']=$this->Menu_link_model->get_all_by_menu_id($menu_id);
		
		$data['title']=lang('office_events');

		$data['past_events_rows']=$this->Office_event_model->get_all_approved_past();
		$data['current_events_rows']=$this->Office_event_model->get_all_approved_current();
		$data['upcoming_events_rows']=$this->Office_event_model->get_all_approved_upcoming();
		
		$this->load->view("website/office_event/index", $data);
	}
	
}