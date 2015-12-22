<?php
/**
 * Casestudy controller file.
 *
 * Contains controller class of the casestudy entity.
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
 * Controller class for the casestudy page.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Casestudy extends Ci_Controller
{ 	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Case_study_model', 'Case_study_model' , True);
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
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('client_casestudy');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$industry_id=''; 
		if(isset($_GET['industry_id'])) {
		$industry_id=$_GET['industry_id']; 
		}
		$data['industry_id'] = $industry_id;
		
		$solution_id=''; 
		if(isset($_GET['solution_id'])) {
		$solution_id=$_GET['solution_id']; 
		}
		$data['solution_id'] = $solution_id;
		
		$client_id=''; 
		if(isset($_GET['client_id'])) {
		$client_id=$_GET['client_id']; 
		}
		$data['client_id'] = $client_id;
		
		$condition="case_study.deleted != 1 and case_study.approved=1 ";
		
		if($industry_id!='' && $industry_id!='0') {
			$condition=$condition." and case_study_industries.industry_id = '$industry_id' "; 
		}
		
		if($solution_id!='' && $solution_id!='0') {
			$condition=$condition." and case_study_solutions.solution_id = '$solution_id' "; 
		}
		
		if($client_id!='' && $client_id!='0') {
			$condition=$condition." and case_study.client_id = '$client_id' "; 
		}
		
		$data['case_study_rows']=$this->Case_study_model->get_by_condition($condition);
																								
		$data['title']=lang('case_studies');
		
		$menu_link_row=$this->Menu_link_model->get_by_controller_and_alias('industry', '');
		$parent_id=$menu_link_row->id;
		$data['side_menu_rows']=$this->Menu_link_model->get_all_child($parent_id);
		
		
		$this->load->view('website/case_study/index',$data);
	}
	
	/**
	 * content Method.
	 *
	 * main method for each controller used to display all casestudies content. 
	 * 
	 * @access	public
	 * @param string
	 */	
	public function content($alias='')
	{	
		$data=array();
		
		$alias=urldecode($alias);
		$data['current_alias']=$alias;
		$row=$this->Case_study_model->get_by_alias($alias);
		if(count($row)>0) {
			$data['row']=$row;
			if($this->lang->lang()=='ar') {
				$data['title']=$row->title_ar;
				$data['seo_words']=$row->seo_words_ar;
				$data['client_name']=$row->client_name;
				$data['country']=$row->country_name_ar;
				
				$data['client_id']=$row->client_id;  
				$data['country_id']=$row->country_id;  
				$data['end_user']=$row->end_user_ar;
				$data['project_name']=$row->project_name_ar;  
				$data['business_unit']=$row->business_unit_ar;  
				$data['project_leader']=$row->project_leader_ar; 
				$data['client_issue']=$row->client_issue_ar;
				$data['work_scope']=$row->work_scope_ar;
				$data['outcome']=$row->outcome_ar;
				$data['team_members']=$row->team_members_ar;
				$data['testimonial']=$row->testimonial_ar;
				
			} else {
				$data['title']=$row->title;
				$data['seo_words']=$row->seo_words;
				
				$data['client_name']=$row->client_name;
				$data['country']=$row->country_name;
				
				$data['client_id']=$row->client_id;  
				$data['country_id']=$row->country_id;  
				$data['end_user']=$row->end_user;
				$data['project_name']=$row->project_name;  
				$data['business_unit']=$row->business_unit;  
				$data['project_leader']=$row->project_leader; 
				$data['client_issue']=$row->client_issue;
				$data['work_scope']=$row->work_scope;
				$data['outcome']=$row->outcome;
				$data['team_members']=$row->team_members;
				$data['testimonial']=$row->testimonial;
				
			}
			
			$data['banner_file_selected']=base_url().$row->banner_file_selected;
			
		}
		
		$menu_link_row=$this->Menu_link_model->get_by_controller_and_alias('casestudy', $alias);	
		if(count($menu_link_row)>0) {
			$parent_id=$menu_link_row->parent_id;
		} else {
			$parent_id=0;
		}
		$parent_link_row=$this->Menu_link_model->get_by_id('', $parent_id);
		if(count($parent_link_row)>0) {
			if($this->lang->lang()=='ar') {
				$data['parent_link_title']=$parent_link_row->title_ar;
			} else {
				$data['parent_link_title']=$parent_link_row->title;
			}
		}
		
		
		$menu_link_row=$this->Menu_link_model->get_by_controller_and_alias('industry', '');
		$parent_id=$menu_link_row->id;
		$data['side_menu_rows']=$this->Menu_link_model->get_all_child($parent_id);
		
		
		//$data['home_box_rows']=$this->Home_box_model->get_all();
		$this->load->view("website/case_study/content", $data);
	}
	
}