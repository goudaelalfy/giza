<?php
/**
 * Award controller file.
 *
 * Contains controller class of the award entity.
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
 * Controller class for the award page.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Award extends Ci_Controller
{ 	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Award_model', 'Award_model' , True);
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

		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('award');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$menu_link_row=$this->Menu_link_model->get_by_controller('award');
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
		
		if($this->lang->lang()=='ar') {
			$data['title']=$menu_link_row->title_ar;
		} else {
			$data['title']=$menu_link_row->title;
		}
		//$data['title']=lang('award');
				
		$data['rows']=$this->Award_model->get_all_approved('','sort','');
		$this->load->view("website/award/content", $data);
	}
	
		
}