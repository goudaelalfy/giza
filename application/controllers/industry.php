<?php
/**
 * Industry controller file.
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
class Industry extends Ci_Controller
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
		
		$this->load->model('Static_page_banner_model', 'Static_page_banner_model' , True);
		$this->load->model('Case_study_model', 'Case_study_model' , True);
		
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
		$data['banner_file_selected']=base_url()."added/uploads/banner/industry/giza_Industries_slide.swf";
		$data['row']=$this->Industry_model->get_by_alias($alias);
		$this->load->view("website/industry/index", $data);
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
	public function content($alias_industry='', $alias_industry_sub='')
	{	
		//To redirect to brief sub
		if($alias_industry_sub=='') {
			$alias_industry_sub='brief';
		}
		
		$data=array();
		
		if($alias_industry_sub=='') {
			$alias_industry=urldecode($alias_industry);
			$data['alias_industry']=$alias_industry;
		
			$industry_row=$this->Industry_model->get_by_alias($alias_industry);
			
			if(count($industry_row)>0) {
				$data['row']=$industry_row;
				if($this->lang->lang()=='ar') {
					$data['page_title']=$industry_row->title_ar;
					$data['title']=$industry_row->title_ar;
					$data['seo_words']=$industry_row->seo_words_ar;
					$data['brief']=$industry_row->brief_ar;
					$data['body']=$industry_row->body_ar;
				} else {
					$data['page_title']=$industry_row->title;
					$data['title']=$industry_row->title;
					$data['seo_words']=$industry_row->seo_words;
					$data['brief']=$industry_row->brief;
					$data['body']=$industry_row->body;
				}
				$data['banner_file_selected']=base_url().$industry_row->banner_file_selected;
			}
			
		} else {		
			$alias_industry=urldecode($alias_industry);
			$data['alias_industry']=$alias_industry;
		
			$alias_industry_sub=urldecode($alias_industry_sub);
			$data['alias_industry_sub']=$alias_industry_sub;
		
			$data['industry_row']=$this->Industry_model->get_by_alias($alias_industry);
			$data['industry_id']=$data['industry_row']->id;
			
			if($this->lang->lang()=='ar') {
				$data['page_title']=$data['industry_row']->title_ar;
			} else {
			$data['page_title']=$data['industry_row']->title;
					
			}
						
			$industry_sub_row=$this->Industry_sub_model->get_by_alias($alias_industry,$alias_industry_sub);
			
			if(count($industry_sub_row)>0) {
				$data['row']=$industry_sub_row;
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
			
		}
		
		
			
		
		$menu_link_row=$this->Menu_link_model->get_by_controller_and_alias('industry', '');
		$parent_id=$menu_link_row->id;
		$data['side_menu_rows']=$this->Menu_link_model->get_all_child($parent_id);
		
		//$data['home_box_rows']=$this->Home_box_model->get_all();
		$this->load->view("website/industry/content", $data);
				
	}
	
	
	public function casestudy($id)
	{ 
		$data=array();
		
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('client_casestudy');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$data['case_study_rows']=$this->Case_study_model->get_by_industry($id);
																								
		$data['title']=lang('case_studies');
		
		
		$data['industry_row']=$this->Industry_model->get_by_id('',$id);
		$data['industry_id']=$data['industry_row']->id;
		$data['alias_industry']=$data['industry_row']->alias;
	
		
		$menu_link_row=$this->Menu_link_model->get_by_controller_and_alias('industry', '');
		$parent_id=$menu_link_row->id;
		$data['side_menu_rows']=$this->Menu_link_model->get_all_child($parent_id);
			
		$this->load->view('website/case_study/index',$data);
	}
}