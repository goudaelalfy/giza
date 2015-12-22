<?php
/**
 * Photo controller file.
 *
 * Contains controller class of the gallery entity.
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
 * Controller class for the gallery page.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Photo extends Ci_Controller
{ 	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gallery_model', 'Gallery_model' , True);
		$this->load->model('Media_section_model', 'Media_section_model' , True);
		
		$this->load->model('Menu_link_model', 'Menu_link_model' , True);
		$this->load->model('Static_page_banner_model', 'Static_page_banner_model' , True);
		
		$this->load->controller('Website');
		$website_object= new Website();
		$website_object->load();
	}
	
	
	public function gallery($id='')
	{	
		$data=array();
		$alias='';
		
		
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('photo');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
	
		
		$gallery_row=$this->Gallery_model->get_by_id('',$id);
		if($this->lang->lang()=='ar') {
			$data['title']=$gallery_row->title_ar;
		} else {
			$data['title']=$gallery_row->title;
		}
				
		$data['gallery_row']=$gallery_row;
		
		$menu_link_row=$this->Menu_link_model->get_by_controller_and_alias('gallery', $alias);
		$menu_id=$menu_link_row->menu_id;
		$data['side_menu_rows']=$this->Menu_link_model->get_all_by_menu_id($menu_id);
		
		//$data['home_box_rows']=$this->Home_box_model->get_all();
		$this->load->view("website/photo/index", $data);
	}
	
}