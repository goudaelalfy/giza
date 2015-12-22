<?php
/**
 * Job controller file.
 *
 * Contains controller class of the job entity.
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
 * Controller class for the job page.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Job extends Ci_Controller
{ 	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Job_model', 'Job_model' , True);
		$this->load->model('Candidate_job_model', 'Candidate_job_model' , True);
		$this->load->model('Solution_model', 'Solution_model' , True);
		$this->load->model('Hr_business_line_model', 'Hr_business_line_model' , True);
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
		
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('jobs');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
	
		$alias=urldecode($alias);
		$data['current_alias']=$alias;
		/*
		$row=$this->Job_model->get_all($alias);
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
		
		
		/*
		$menu_link_row=$this->Menu_link_model->get_by_controller('job');
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
		*/
		
		$data['title']=lang('job');
				
		$data['rows']=$this->Job_model->get_all_approved('','sort','');
		$this->load->view("website/job/all", $data);
	}
		
	public function professional($alias='')
	{	
		$data=array();
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('jobs');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
	
		$alias=urldecode($alias);
		$data['current_alias']=$alias;
	
		$menu_link_row=$this->Menu_link_model->get_by_controller('job');
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
		$data['title']=lang('job');
				
		$data['rows']=$this->Job_model->get_all_professional_approved('sort','');
		$this->load->view("website/job/all", $data);
	}
	
	
	public function internship($alias='')
	{	
		$data=array();
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('jobs');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
	
		$alias=urldecode($alias);
		$data['current_alias']=$alias;
	
		$menu_link_row=$this->Menu_link_model->get_by_controller('job');
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
		$data['title']=lang('job');
				
		$data['rows']=$this->Job_model->get_all_internship_approved('sort','');
		$this->load->view("website/job/all", $data);
	}
	
	public function applied($alias='')
	{	
		$data=array();
		
		$alias=urldecode($alias);
		$data['current_alias']=$alias;
	
		$menu_link_row=$this->Menu_link_model->get_by_controller('job');
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
		$data['title']=lang('job');
				
		$candidate_session=$this->session->userdata('candidate_session');
		if(!$candidate_session)
		{
			redirect(base_url().$this->lang->lang().'/candidate/login');
		} else {
		$data['rows']=$this->Job_model->get_by_candidate($candidate_session->id);
		$this->load->view("website/job/all", $data);
		}
	}
	
	public function cart($alias='')
	{	
		$data=array();
		
		$alias=urldecode($alias);
		$data['current_alias']=$alias;
	
		$menu_link_row=$this->Menu_link_model->get_by_controller('job');
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
		$data['title']=lang('job');
				
		$candidate_session=$this->session->userdata('candidate_session');
		if(!$candidate_session)
		{
			redirect(base_url().$this->lang->lang().'/candidate/login');
		} else {
			
			$cart_job_ids=array(0);
			$jobs_cart_session=$this->session->userdata('jobs_cart');
			if($jobs_cart_session)
			{
				$cart_job_ids=$jobs_cart_session;
			}
			$data['rows']=$this->Job_model->get_by_ids_arr($cart_job_ids);
			$this->load->view("website/job/all", $data);
		}
	}
	
	/**
	 * Method search.
	 * 
	 * method to display database rows by specific condtion.
	 * @access public
	 * @param int no of page (paging)
	 * @param string filed to order by.
	 * @param string order type (asc, desc)
	 * @return boolean 
	 */
	public function search($page=1, $order=null, $order_type=null)
	{
		//---------------------------------------
		$data=array();
		
		//$alias=urldecode($alias);
		//$data['current_alias']=$alias;
	
		$menu_link_row=$this->Menu_link_model->get_by_controller('job');
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
		$data['title']=lang('job');
		
		
		//---------------------------------------
		
		
		$keyword=''; 
		if(isset($_GET['keyword'])) {
		$keyword=$_GET['keyword']; 
		}
		$data['keyword'] = $keyword;
		
		
		$job_title=''; 
		if(isset($_GET['job_title'])) {
		$job_title=$_GET['job_title']; 
		}
		$data['job_title'] = $job_title;
		
		$the_date=''; 
		if(isset($_GET['the_date'])) {
		$the_date=$_GET['the_date']; 
		$the_date = date("Y-m-d",strtotime($the_date));
					
		}
		$data['the_date'] = $the_date;
		
		$city=''; 
		if(isset($_GET['city'])) {
		$city=$_GET['city']; 
		}
		$data['city'] = $city;
		
		$industry_id=''; 
		if(isset($_GET['industry_id'])) {
		$industry_id=$_GET['industry_id']; 
		}
		$data['industry_id'] = $industry_id;
		
		$department=''; 
		if(isset($_GET['department'])) {
		$department=$_GET['department']; 
		}
		$data['department'] = $department;
		
		$employment_status=''; 
		if(isset($_GET['employment_status'])) {
		$employment_status=$_GET['employment_status']; 
		}
		$data['employment_status'] = $employment_status;
		
		$employment_type=''; 
		if(isset($_GET['employment_type'])) {
		$employment_type=$_GET['employment_type']; 
		}
		$data['employment_type'] = $employment_type;
		
		$solution_id=''; 
		if(isset($_GET['solution_id'])) {
		$solution_id=$_GET['solution_id']; 
		}
		$data['solution_id'] = $solution_id;
		
		
		$data['page']=$page;
		
		/**
		 * Set search condition.
		 */
		$condition="hr_job.deleted != 1 and hr_job.approved=1 ";
		
		
		if($keyword!='') {
			$condition=$condition." and (hr_job.title like '%$keyword%' or hr_job.title_ar like '%$keyword%' or hr_job.reference like '%$keyword%' or hr_job.reference_ar like '%$keyword%' or hr_job.description like '%$keyword%' or hr_job.description_ar like '%$keyword%' or hr_job.qualifications like '%$keyword%' or hr_job.qualifications_ar like '%$keyword%') "; 
		}	
		
		if($job_title!='') {
			$condition=$condition." and (hr_job.title like '%$job_title%' or hr_job.title_ar like '%$job_title%') "; 
		}
		
		if($the_date!='') {
			$condition=$condition." and (hr_job.date_from = '$the_date' or hr_job.date_to = '$the_date') "; 
		}
		
		if($city!='') {
			$condition=$condition." and hr_job.hr_city_preferred_to_work_id = '$city' "; 
		}
		if($department!='') {
			$condition=$condition." and hr_job.hr_department_id = '$department' "; 
		}
		if($employment_type!='') {
			$condition=$condition." and hr_job.hr_employment_type_id = '$employment_type' "; 
		}
		if($employment_status!='') {
			$condition=$condition." and hr_job.hr_employment_status_id = '$employment_status' "; 
		}
		if($industry_id!=0) {
			$condition=$condition." and hr_job.industry_id = '$industry_id' "; 
		}
		if($solution_id!='') {
			$condition=$condition." and hr_job.solution_id = '$solution_id' "; 
		}
		
		//------------- Business line ----------------------------------------------
		$solutions='';
		$solution_sub='';
		if(isset($_GET['all_solution_sub'])) {
			$solution_sub=$_GET['all_solution_sub'];
		} else {
			$solution_counter=0;
			$solution_sub_counter=0;
			foreach($_GET as $key=>$value) {
				if($this->startsWith($key,'solution_') && !$this->startsWith($key,'solution_sub')) {
					if($solution_counter==0) {
						$solutions=$solutions.$value;
					} else {
						$solutions=$solutions.','.$value;
					}
					$solution_counter=$solution_counter+1;
				}  else if($this->startsWith($key,'solution_sub')) {
					$value=str_replace('_','',strstr($value, '_'));
					if($solution_sub_counter==0) {
						$solution_sub=$solution_sub.$value;
					} else {
						$solution_sub=$solution_sub.','.$value;
					}
					$solution_sub_counter=$solution_sub_counter+1;
				}
			}
		}
		
		if(isset($_GET['all_solutions'])) {
			$all_solutions=$_GET['all_solutions'];
		} else if($solution_sub!='') {
			$condition=$condition." and (line_of_business_id IN ($solution_sub))";
		}
		
		//--------------------------------------------------------------------------
		
		
		//$rows_count = $this->Number_send_model->get_count_by_condition($condition);
		//$data['rows_count']=$rows_count;
		
		//$settings = $this->Setting_model->get_all();
		//$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		$data['paging_no_of_pages']=50;
		
		$per_page = $data['paging_no_of_pages'];
		$start = ($page-1)*$per_page;
		
		$data['rows']=$this->Job_model->get_all_display_paging_search($condition,$start, $per_page, $order, $order_type); 
		$this->load->view("website/job/all", $data);
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
		
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('job_details');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
	
		$menu_link_row=$this->Menu_link_model->get_by_controller('job');
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
		
		
		$alias=urldecode($alias);
		$data['current_alias']=$alias;

		$row=$this->Job_model->get_by_alias($alias);
		if(count($row)>0) {
			$data['row']=$row;
			$data['alias']=$row->alias;
			$data['current_alias']=$row->alias;
			$job_id=$data['id']=$row->id;
			
              $data['date_from']=$row->date_from;
              $data['date_to']=$row->date_to;
              $data['date_from']=$row->date_from;
              $data['date_to']=$row->date_to;
              $data['date_from']=$row->date_from;
              $data['date_to']=$row->date_to;
              
              
             if($this->lang->lang()=='ar') {
				$data['title']=$row->title_ar;
				$data['seo_words']=$row->seo_words_ar;
				$data['description']=$row->description_ar;
				$data['reference']=$row->reference_ar;
				$data['qualifications']=$row->qualifications_ar;
				
				$data['city']=$row->city_ar;
				$data['employment_status']=$row->employment_status_ar;
				$data['employment_type']=$row->employment_type_ar;
				$data['department']=$row->department_ar;
				$data['business_line']=$row->business_line_ar;
				$data['industry']=$row->industry_ar;
			} else {
				$data['title']=$row->title;
				$data['seo_words']=$row->seo_words;
				$data['description']=$row->description;
				$data['reference']=$row->reference;
				$data['qualifications']=$row->qualifications;
				
				$data['city']=$row->city;
				$data['employment_status']=$row->employment_status;
				$data['employment_type']=$row->employment_type;
				$data['department']=$row->department;
				$data['business_line']=$row->business_line;
				$data['industry']=$row->industry;
			}
		}
						
		$this->load->view("website/job/content", $data);
	}
	
	/**
	 * apply Method.
	 *
	 *  method register applying to candidate for jobs. 
	 * 
	 * @access	public
	 * @param int
	 */	
	public function apply($alias)
	{	
		$data=array();
		
		$menu_link_row=$this->Menu_link_model->get_by_controller('job');
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
		
		$alias=urldecode($alias);
		$data['current_alias']=$alias;
		
		
		$candidate_session_id=$this->session->userdata('candidate_session_id');
		if(!$candidate_session_id)
		{
			redirect(base_url().$this->lang->lang().'/candidate/login');
		}

		$job_id=0;
		$row=$this->Job_model->get_by_alias($alias);
		if(count($row)>0) {
			$data['row']=$row;
			$job_id=$data['id']=$row->id;
			
			$data['candidate_job']=array(
				'candidate_id'=>$candidate_session_id,  
				'job_id'=>$job_id);
			
			$row=$this->Job_model->get_by_alias($alias);
			$this->Candidate_job_model->insertIgnore($data['candidate_job']);
			
			$data['message']=lang('applied_successfully');
			
			
			$data['alias']=$row->alias;
			$data['current_alias']=$row->alias;
			
              $data['date_from']=$row->date_from;
              $data['date_to']=$row->date_to;
              $data['date_from']=$row->date_from;
              $data['date_to']=$row->date_to;
              $data['date_from']=$row->date_from;
              $data['date_to']=$row->date_to;
              
              
		if($this->lang->lang()=='ar') {
				$data['title']=$row->title_ar;
				$data['seo_words']=$row->seo_words_ar;
				$data['description']=$row->description_ar;
				$data['reference']=$row->reference_ar;
				$data['qualifications']=$row->qualifications_ar;
				
				$data['city']=$row->city_ar;
				$data['employment_status']=$row->employment_status_ar;
				$data['employment_type']=$row->employment_type_ar;
				$data['department']=$row->department_ar;
				$data['business_line']=$row->business_line_ar;
				$data['industry']=$row->industry_ar;
			} else {
				$data['title']=$row->title;
				$data['seo_words']=$row->seo_words;
				$data['description']=$row->description;
				$data['reference']=$row->reference;
				$data['qualifications']=$row->qualifications;
				
				$data['city']=$row->city;
				$data['employment_status']=$row->employment_status;
				$data['employment_type']=$row->employment_type;
				$data['department']=$row->department;
				$data['business_line']=$row->business_line;
				$data['industry']=$row->industry;
			}
		}
						
		$this->load->view("website/job/content", $data);
	}
	
	public function addtocart($alias)
	{	
		$data=array();
				
		
		$menu_link_row=$this->Menu_link_model->get_by_controller('job');
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
		$alias=urldecode($alias);
		$data['current_alias']=$alias;
		
		
		$row=$this->Job_model->get_by_alias($alias);
		
		if(count($row)>0) {
		$job_id=$data['id']=$row->id;

		$jobs_cart_session=$this->session->userdata('jobs_cart');
		if($jobs_cart_session)
		{
			$jobs_cart_arr = $jobs_cart_session;
			array_push($jobs_cart_arr, $job_id);
			$this->session->set_userdata('jobs_cart',$jobs_cart_arr);
		}
		else
		{
			$this->session->set_userdata('jobs_cart',array($job_id));
		}
	
		
		
		
		$candidate_session_id=$this->session->userdata('candidate_session_id');
		if(!$candidate_session_id)
		{
			redirect(base_url().$this->lang->lang().'/candidate/login');
		}

		$job_id=0;
		//$row=$this->Job_model->get_by_alias($alias);
		if(count($row)>0) {
			$data['row']=$row;
			$job_id=$data['id']=$row->id;
			
			$data['candidate_job']=array(
				'candidate_id'=>$candidate_session_id,  
				'job_id'=>$job_id);
			
			$row=$this->Job_model->get_by_alias($alias);
			
			$data['message']=lang('added_to_cart_successfully');
			
			
			$data['alias']=$row->alias;
			$data['current_alias']=$row->alias;
			
              $data['date_from']=$row->date_from;
              $data['date_to']=$row->date_to;
              $data['date_from']=$row->date_from;
              $data['date_to']=$row->date_to;
              $data['date_from']=$row->date_from;
              $data['date_to']=$row->date_to;
              
              
		if($this->lang->lang()=='ar') {
				$data['title']=$row->title_ar;
				$data['seo_words']=$row->seo_words_ar;
				$data['description']=$row->description_ar;
				$data['reference']=$row->reference_ar;
				$data['qualifications']=$row->qualifications_ar;
				
				$data['city']=$row->city_ar;
				$data['employment_status']=$row->employment_status_ar;
				$data['employment_type']=$row->employment_type_ar;
				$data['department']=$row->department_ar;
				$data['business_line']=$row->business_line_ar;
				$data['industry']=$row->industry_ar;
			} else {
				$data['title']=$row->title;
				$data['seo_words']=$row->seo_words;
				$data['description']=$row->description;
				$data['reference']=$row->reference;
				$data['qualifications']=$row->qualifications;
				
				$data['city']=$row->city;
				$data['employment_status']=$row->employment_status;
				$data['employment_type']=$row->employment_type;
				$data['department']=$row->department;
				$data['business_line']=$row->business_line;
				$data['industry']=$row->industry;
			}
		}
						
		}
		$this->load->view("website/job/content", $data);
	}
	
	function searchadvanced() 
	{
		$data=array();
		
		
		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('job_search');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
	
		
		$data['solution_rows']=$this->Solution_model->get_all_approved();
		$data['business_line_rows']=$this->Hr_business_line_model->get_all_approved();
			
		$menu_link_row=$this->Menu_link_model->get_by_controller('job');
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
		$data['current_alias']='';
		
		$this->load->view("website/job/search_advanced", $data);
	}
	
	function startsWith($haystack, $needle)
	{
	    return !strncmp($haystack, $needle, strlen($needle));
	}
	
}