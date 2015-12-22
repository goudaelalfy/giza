<?php
/**
 * Industrysub controller file.
 *
 * Contains controller class of the industry entity.
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
 * Controller class for the industry.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Industrysub extends Ci_Controller
{ 	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Industry_model', 'Industry_model' , True);
		$this->load->model('Industry_sub_model', 'Industry_sub_model' , True);
		$this->load->model('Menu_link_model', 'Menu_link_model' , True);
		
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
		
	}
	
	/**
	 * Content Method.
	 *
	 * Content method for to display sub details. 
	 *
	 * @access	public
	 * @param string
	 * @param string
	 */	
	public function content($industry_sub_id='')
	{	
		$data=array();
					
		$industry_sub_row=$this->Industry_sub_model->get_by_id('',$industry_sub_id);
		
		if(count($industry_sub_row)>0) {
			$data['row']=$industry_sub_row;
			$industry_id=$industry_sub_row->industry_id;
			$data['industry_id']=$industry_id;
		
			$data['industry_row']=$this->Industry_model->get_by_id('',$industry_id);
			if($this->lang->lang()=='ar') {
				$data['page_title']=$data['industry_row']->title_ar;
			} else {
			$data['page_title']=$data['industry_row']->title;
			}
			
			
			if($this->lang->lang()=='ar') {
				$data['title']=$industry_sub_row->title_ar;
				$data['seo_words']=$industry_sub_row->seo_words_ar;
				$data['brief']=$industry_sub_row->brief_ar;
				$data['body']=$industry_sub_row->body_ar;
			} else {
				$data['title']=$industry_sub_row->title;
				$data['seo_words']=$industry_sub_row->seo_words;
				$data['brief']=$industry_sub_row->brief;
				$data['body']=$industry_sub_row->body;
			}
			$data['banner_file_selected']=base_url().$industry_sub_row->banner_file_selected;
		}
		
			
		
		$menu_link_row=$this->Menu_link_model->get_by_controller_and_alias('industry', '');
		$parent_id=$menu_link_row->id;
		$data['side_menu_rows']=$this->Menu_link_model->get_all_child($parent_id);
		
		//$data['home_box_rows']=$this->Home_box_model->get_all();
		$this->load->view("website/industry/content", $data);
				
	}
	
}