<?php
/**
 * Home controller file.
 *
 * Contains controller class of the home page.
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
 * Controller class for the home page.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Home extends Ci_Controller
{ 	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Page_model', 'Page_model' , True);
		$this->load->model('Menu_map_model', 'Menu_map_model' , True);
		$this->load->model('Menu_model', 'Menu_model' , True);
		$this->load->model('Menu_link_model', 'Menu_link_model' , True);
		$this->load->model('Home_box_model', 'Home_box_model' , True);
						
		$this->load->model('Media_item_model', 'Media_item_model' , True);
		
		$this->load->helper('language');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('cookie');
				
		
		
		$this->lang->load('main');
	}
	
	/**
	 * Index Method.
	 *
	 * Default method for each controller, called when no method name path through URL. 
	 *
	 * @access	public
	 */	
	public function index()
	{	
		$data['banner_file_selected']=base_url()."flash/giza_main_banner.swf";
		$data['home_box_rows']=$this->Home_box_model->get_all();
		
		$this->load->view("website/home", $data);
	}
	
	/**
	 * content Method.
	 *
	 * main method for each controller used to display all pages content. 
	 * 
	 * @access	public
	 * @param string
	 */	
	public function content($alias='')
	{	
		$data=array();
		
		$alias=urldecode($alias);
		$data['current_alias']=$alias;
		$row=$this->Home_box_model->get_by_alias($alias);
		if(count($row)>0) {
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
			$data['icon']=base_url().$row->icon;
			
		}
		$data['home_box_rows']=$this->Home_box_model->get_all();
		$this->load->view("website/homebox/content", $data);
	}
	
}