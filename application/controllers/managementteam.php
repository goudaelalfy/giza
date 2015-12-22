<?php
/**
 * Managementteam controller file.
 *
 * Contains controller class of the managementteam entity.
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
 * Controller class for the managementteam page.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Managementteam extends Ci_Controller
{ 	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Management_team_model', 'Management_team_model' , True);
		$this->load->model('Static_page_banner_model', 'Static_page_banner_model' , True);
		
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
		$data=array();
		
		$alias=urldecode($alias);
		$data['current_alias']=$alias;
		
		
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('management_team');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		/*
		$row=$this->Managementteam_model->get_all($alias);
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
			
		}
		*/
		$menu_link_row=$this->Menu_link_model->get_by_controller('managementteam');
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
		$data['title']=lang('managementteam');
				
		$data['rows']=$this->Management_team_model->get_all_approved('','sort','');
		$this->load->view("website/management_team/content", $data);
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
		/*
		$row=$this->Managementteam_model->get_all($alias);
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
			
		}
		*/
		$data['title']=lang('managementteam');
				
		$data['rows']=$this->Management_team_model->get_all();
		$this->load->view("website/management_team/content", $data);
	}
	
}