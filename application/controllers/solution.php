<?php
/**
 * Solution controller file.
 *
 * Contains controller class of the solution entity.
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
 * Controller class for the solution.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Solution extends Ci_Controller
{ 	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Solution_model', 'Solution_model' , True);
		$this->load->model('Solution_sub_model', 'Solution_sub_model' , True);
		$this->load->model('Menu_link_model', 'Menu_link_model' , True);
		$this->load->model('Case_study_model', 'Case_study_model' , True);		
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
		
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('solutions');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
	
		$data['solution_rows']=$this->Solution_model->get_all();
		
		$this->load->view("website/solution/index", $data);
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
	public function content($alias_solution='', $alias_solution_sub='')
	{	
		//To redirect to brief sub
		if($alias_solution_sub=='') {
			$alias_solution_sub='brief';
		}
		
		$data=array();
		
		if($alias_solution_sub=='') {
			$alias_solution=urldecode($alias_solution);
			$data['alias_solution']=$alias_solution;
		
			$solution_row=$this->Solution_model->get_by_alias($alias_solution);
			
			if(count($solution_row)>0) {
				$data['row']=$solution_row;
				if($this->lang->lang()=='ar') {
					$data['page_title']=$solution_row->title_ar;
					$data['title']=$solution_row->title_ar;
					$data['seo_words']=$solution_row->seo_words_ar;
					$data['brief']=$solution_row->brief_ar;
					$data['body']=$solution_row->body_ar;
				} else {
					$data['page_title']=$solution_row->title;
					$data['title']=$solution_row->title;
					$data['seo_words']=$solution_row->seo_words;
					$data['brief']=$solution_row->brief;
					$data['body']=$solution_row->body;
				}
				$data['banner_file_selected']=base_url().$solution_row->banner_file_selected;
			}
			
		} else {		
			$alias_solution=urldecode($alias_solution);
			$data['alias_solution']=$alias_solution;
		
			$alias_solution_sub=urldecode($alias_solution_sub);
			$data['alias_solution_sub']=$alias_solution_sub;
		
			$data['solution_row']=$this->Solution_model->get_by_alias($alias_solution);
			$data['solution_id']=$data['solution_row']->id;
			
			if($this->lang->lang()=='ar') {
				$data['page_title']=$data['solution_row']->title_ar;
			} else {
			$data['page_title']=$data['solution_row']->title;
					
			}
						
			$solution_sub_row=$this->Solution_sub_model->get_by_alias($alias_solution,$alias_solution_sub);
			
			if(count($solution_sub_row)>0) {
				$data['row']=$solution_sub_row;
				if($this->lang->lang()=='ar') {
					$data['title']=$solution_sub_row->title_ar;
					$data['seo_words']=$solution_sub_row->seo_words_ar;
					$data['brief']=$solution_sub_row->brief_ar;
					$data['body']=$solution_sub_row->body_ar;
				} else {
					$data['title']=$solution_sub_row->title;
					$data['seo_words']=$solution_sub_row->seo_words;
					$data['brief']=$solution_sub_row->brief;
					$data['body']=$solution_sub_row->body;
				}
				$data['banner_file_selected']=base_url().$solution_sub_row->banner_file_selected;
			}
			
		}
		
		
			
		
		$menu_link_row=$this->Menu_link_model->get_by_controller_and_alias('solution', '');
		$parent_id=$menu_link_row->id;
		$data['side_menu_rows']=$this->Menu_link_model->get_all_child($parent_id);
		
		//$data['home_box_rows']=$this->Home_box_model->get_all();
		$this->load->view("website/solution/content", $data);
				
	}
	
	public function casestudy($id)
	{ 
		$data=array();
		
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('client_casestudy');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$data['case_study_rows']=$this->Case_study_model->get_by_solution($id);
																								
		$data['title']=lang('case_studies');
		
		
		$data['solution_row']=$this->Solution_model->get_by_id('',$id);
		$data['solution_id']=$data['solution_row']->id;
		$data['alias_solution']=$data['solution_row']->alias;
	
		
		$menu_link_row=$this->Menu_link_model->get_by_controller_and_alias('solution', '');
		$parent_id=$menu_link_row->id;
		$data['side_menu_rows']=$this->Menu_link_model->get_all_child($parent_id);
			
		$this->load->view('website/case_study/index',$data);
	}
	
	
}