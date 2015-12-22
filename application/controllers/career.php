<?php
/**
 * Career controller file.
 *
 * Contains controller class of the career entity.
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
 * Controller class for the career page.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Career extends Ci_Controller
{ 	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('Career_model', 'Career_model' , True);
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
		 
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('careers');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$alias=urldecode($alias);
		$data['current_alias']=$alias;

		$menu_link_row=$this->Menu_link_model->get_by_controller('career');
		$parent_id=$menu_link_row->parent_id;
		//Commented latest, for color main menu.
		//$data['side_menu_rows']=$this->Menu_link_model->get_all_child($parent_id);
		$data['title']=lang('career');
				
		$data['career1_menu_links']=$this->Menu_link_model->get_all_menu_links_by_menu_map('career1');
		$data['career2_menu_links']=$this->Menu_link_model->get_all_menu_links_by_menu_map('career2');
		$data['career3_menu_links']=$this->Menu_link_model->get_all_menu_links_by_menu_map('career3');
		$data['career4_menu_links']=$this->Menu_link_model->get_all_menu_links_by_menu_map('career4');
		
		$this->load->view("website/career/index", $data);
	}
	
		
}