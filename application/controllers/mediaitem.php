<?php
/**
 * Mediaitem controller file.
 *
 * Contains controller class of the mediaitem entity.
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
 * Controller class for the mediaitem page.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Mediaitem extends Ci_Controller
{ 	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Media_item_model', 'Media_item_model' , True);
		
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
		$row=$this->Media_item_model->get_by_alias($alias);
		$data=array();
		if(count($row)>0) {
			$data['row']=$row;
			if($this->lang->lang()=='ar') {
				$data['page_title']=$row->title_ar;
			} else {
				$data['page_title']=$row->title;
			}
			if($this->lang->lang()=='ar') {
				$data['seo_words']=$row->seo_words_ar;
			} else {
				$data['seo_words']=$row->seo_words;
			}
			$data['banner_file_selected']=$row->banner_file_selected;
			
		}
		$this->load->view("website/media_item/index", $data);
	}
	
	/**
	 * content Method.
	 *
	 * main method for each controller used to display all mediaitems content. 
	 * 
	 * @access	public
	 * @param string
	 */	
	public function content($alias='')
	{	
		$data=array();
		
		$alias=urldecode($alias);
		$data['current_alias']=$alias;
		$row=$this->Media_item_model->get_by_alias($alias);
		$mediaitem_id=0;
		if(count($row)>0) {
			$mediaitem_id=$row->id;
			$data['id']=$mediaitem_id;
			$data['pdf_file']=$row->pdf_file;
			$data['video_file']=$row->video_file;
				
			$data['row']=$row;
			if($this->lang->lang()=='ar') {
				$data['title']=$row->title_ar;
				$data['seo_words']=$row->seo_words_ar;
				$data['brief']=$row->brief_ar;
				$data['body']=$row->body_ar;
			} else {
				$data['title']=$row->title;
				$data['seo_words']=$row->seo_words;
				$data['brief']=$row->brief;
				$data['body']=$row->body;
				
			}
			
			$data['banner_file_selected']=base_url().$row->banner_file_selected;
			
		}
		
		
		$menu_link_row=$this->Menu_link_model->get_by_controller('mediasectioncategory');
		$menu_id=$menu_link_row->menu_id;
		$data['side_menu_rows']=$this->Menu_link_model->get_all_by_menu_id($menu_id);
		
		//$data['home_box_rows']=$this->Home_box_model->get_all();
		$this->load->view("website/media_item/index", $data);
	}
	
}