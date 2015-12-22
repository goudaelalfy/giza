<?php
/**
 * Search controller file.
 *
 * Contains controller class of the search entity.
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
 * Controller class for the search page.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Search extends Ci_Controller
{ 	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Menu_link_model', 'Menu_link_model' , True);
		$this->load->model('Static_page_banner_model', 'Static_page_banner_model' , True);
		
		
		$this->load->model('Industry_model', 'Industry_model' , True);
		$this->load->model('Industry_sub_model', 'Industry_sub_model' , True);
		$this->load->model('Solution_model', 'Solution_model' , True);
		$this->load->model('Solution_sub_model', 'Solution_sub_model' , True);
		
		$this->load->model('Page_model', 'Page_model' , True);
		$this->load->model('Media_item_model', 'Media_item_model' , True);
		$this->load->model('Gallery_model', 'Gallery_model' , True);
		$this->load->model('Case_study_model', 'Case_study_model' , True);
		$this->load->model('Office_event_model', 'Office_event_model' , True);
		$this->load->model('Job_model', 'Job_model' , True);
						
		
		$this->load->controller('Website');
		$website_object= new Website();
		$website_object->load();
		
	}
	
	/**
	 * table Method.
	 *
	 * Table method used making search and call table view to display search results.. 
	 *
	 * @access	public
	 */	
	public function table($page=1, $alias='')
	{	
		$data=array();
		
		$alias=urldecode($alias);
		$data['current_alias']=$alias;

		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('search');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$data['title']=lang('search_results');
				
		
		//-------------------------- Search -----------------------------------------------
		$keyword='';
		if(isset($_GET['keyword'])) {
			$keyword=$_GET['keyword'];
		}
		$data['keyword']=$keyword;
		
		//--------- count ----------------------------
		$condition="deleted != 1 and approved=1";
		
		if($keyword!='') {
			$condition=$condition." and ( title LIKE '%".$keyword."%' OR title_ar LIKE '%".$keyword."%' OR brief LIKE '%".$keyword."%' OR brief_ar LIKE '%".$keyword."%' OR body LIKE '%".$keyword."%' OR body_ar LIKE '%".$keyword."%' )"; 
		}
		
		$data['industry_count']=$this->Industry_model->get_count_by_condition($condition) + $this->Industry_sub_model->get_count_by_condition($condition);
		$data['solution_count']=$this->Solution_model->get_count_by_condition($condition) + $this->Solution_sub_model->get_count_by_condition($condition);
		$data['page_count']=$this->Page_model->get_count_by_condition($condition) ;
		
		$data['gallery_count']=$this->Gallery_model->get_count_by_condition($condition) ;
		$data['media_item_count']=$this->Media_item_model->get_count_by_condition($condition) ;
		
		
		$office_event_condition="deleted != 1 and approved=1";
		if($keyword!='') {
		$office_event_condition=$office_event_condition." and ( name LIKE '%".$keyword."%' OR name_ar LIKE '%".$keyword."%' OR brief LIKE '%".$keyword."%' OR brief_ar LIKE '%".$keyword."%' )"; 
		}
		$data['office_event_count']=$this->Office_event_model->get_count_by_condition($office_event_condition) ;
		
		
		$case_study_condition="deleted != 1 and approved=1";
		if($keyword!='') {
		$case_study_condition=$case_study_condition." and ( `end_user` LIKE '%".$keyword."%' OR `end_user_ar` LIKE '%".$keyword."%' OR `project_name` LIKE '%".$keyword."%' OR   `project_name_ar` LIKE '%".$keyword."%' OR `business_unit` LIKE '%".$keyword."%' OR   `business_unit_ar` LIKE '%".$keyword."%' OR   `project_leader` LIKE '%".$keyword."%' OR   `project_leader_ar` LIKE '%".$keyword."%' OR  `client_issue` LIKE '%".$keyword."%' OR `client_issue_ar` LIKE '%".$keyword."%' OR `work_scope` LIKE '%".$keyword."%' OR `work_scope_ar` LIKE '%".$keyword."%' OR `outcome` LIKE '%".$keyword."%' OR `outcome_ar` LIKE '%".$keyword."%' OR `team_members` LIKE '%".$keyword."%' OR `team_members_ar` LIKE '%".$keyword."%' OR `testimonial` LIKE '%".$keyword."%' OR `testimonial_ar` LIKE '%".$keyword."%' ) ";
		}
		$data['case_study_count']=$this->Case_study_model->get_count_by_condition($case_study_condition) ;
		
		$job_condition="deleted != 1 and approved=1";
		if($keyword!='') {
		$job_condition=$job_condition." and ( title LIKE '%".$keyword."%' OR title_ar LIKE '%".$keyword."%' OR reference LIKE '%".$keyword."%' OR reference_ar LIKE '%".$keyword."%' OR description LIKE '%".$keyword."%' OR description_ar LIKE '%".$keyword."%' OR qualifications LIKE '%".$keyword."%' OR qualifications_ar LIKE '%".$keyword."%' )"; 
		}
		$data['job_count']=$this->Job_model->get_count_by_condition($job_condition) ;
		
		$data['all_count']= $data['industry_count']+ $data['solution_count']+ $data['page_count'] +$data['gallery_count'] + $data['media_item_count'] +$data['office_event_count'] + $data['case_study_count'] +$data['job_count'];
		
		//------------------------------------------------
		
		
		
		
		$data['page']=$page;		
		$data['rows_count']=$data['all_count'];
		$per_page = 10;
    	$data['paging_no_of_pages']=$per_page;
		$start = ($page-1)*$per_page;
		
		
		
		//--------------------------- Rows ---------------
		$search_query=" (select 'industry' as search_type, alias, title, title_ar, body, body_ar from industry where $condition)
		union all (select 'industry_sub' as search_type, id as alias, title, title_ar, body, body_ar from industry_sub where $condition)
		union all (select 'solution' as search_type, alias, title, title_ar, body, body_ar from solution where $condition)
		union all (select 'solution_sub' as search_type, id as alias, title, title_ar, body, body_ar from solution_sub where $condition)
		union all (select 'page' as search_type, alias, title, title_ar, body, body_ar from page where $condition)
		union all (select 'gallery' as search_type, id as alias, title, title_ar, body, body_ar from gallery where $condition)
		union all (select 'media_item' as search_type, alias, title, title_ar, body, body_ar from media_item where $condition)
		
		union all (select 'office_event' as search_type, id as alias, name as title, name_ar as title_ar, brief, brief_ar from office_event where $office_event_condition)
		union all (select 'case_study' as search_type, alias, title, title_ar, client_issue, client_issue_ar from case_study where $case_study_condition)
		union all (select 'job' as search_type, alias, title, title_ar, description, description_ar from hr_job where $job_condition)
		
		limit $start, $per_page
		";
		
		
		$search_query=$this->Page_model->execute_query($search_query);
		$data['rows']=$search_query->result();
		
		/*
		$data['industry_rows']=$this->Industry_model->get_all_by_condition($condition) ;
		$data['industry_sub_rows']=$this->Industry_sub_model->get_all_by_condition($condition) ;
		
		$data['solution_rows']=$this->Solution_model->get_all_by_condition($condition) ;
		$data['solution_sub_rows']=$this->Solution_sub_model->get_all_by_condition($condition) ;
				
		$data['page_rows']=$this->Page_model->get_all_by_condition($condition) ;
		$data['gallery_rows']=$this->Gallery_model->get_all_by_condition($condition) ;
		$data['media_item_rows']=$this->Media_item_model->get_all_by_condition($condition) ;
		$data['office_event_rows']=$this->Office_event_model->get_all_by_condition($office_event_condition) ;
		$data['case_study_rows']=$this->Case_study_model->get_all_by_condition($case_study_condition) ;
		$data['job_rows']=$this->Job_model->get_all_by_condition($job_condition) ;
		*/
		//------------------------------------------------
		
		$this->load->view("website/search/table", $data);
	}
	
	function advanced()
	{
		$data=array($alias='');
		
		$alias=urldecode($alias);
		$data['current_alias']=$alias;

		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('search');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$data['title']=lang('advanced_search');
		
		$data['industry_rows']=$this->Industry_model->get_all_approved();
		$data['solution_rows']=$this->Solution_model->get_all_approved();
		
		$this->load->view("website/search/advanced", $data);	
	}
	
	/**
	 * advancedResult Method.
	 *
	 * advancedResult used managing advanced search and displaying results. 
	 *
	 * @access	public
	 */	
	public function advancedResult($page=1, $alias='')
	{	
		$data=array();
		
		$alias=urldecode($alias);
		$data['current_alias']=$alias;

		$static_page_banner_row=$this->Static_page_banner_model->get_by_page_code('search');
		$data['banner_file_selected']=base_url().$static_page_banner_row->banner_file_selected;
		
		$data['title']=lang('search_results');
				
		
		//-------------------------- Search -----------------------------------------------
		$target='';
		
		$keyword='';
		if(isset($_GET['keyword'])) {
			$keyword=$_GET['keyword'];
		}
		$data['keyword']=$keyword;
		
		$general='';
		if(isset($_GET['general'])) {
			$general=$_GET['general'];
			$target=$target."general=$general&";
		}
		$data['general']=$general;
		
		$careers='';
		if(isset($_GET['careers'])) {
			$careers=$_GET['careers'];
			$target=$target."careers=$careers&";
		}
		$data['careers']=$careers;
		
		$casestudies='';
		if(isset($_GET['casestudies'])) {
			$casestudies=$_GET['casestudies'];
			$target=$target."casestudies=$casestudies&";
		}
		$data['casestudies']=$casestudies;
		
		$industries='';
		if(isset($_GET['industries'])) {
			$industries=$_GET['industries'];
			$target=$target."industries=$industries&";
		}
		$data['industries']=$industries;
		
		$industry='';
		if(isset($_GET['industry'])) {
			$industry=$_GET['industry'];
			
			//$industry_serialized=serialize($industry);
			$industry_after_processing='';
			if(is_array($industry)) {
				$industry_after_processing=implode($industry,',');
			} else {
				$industry_after_processing=$industry;
				$industry=explode(',',$industry);
			}
			
			$target=$target."industry=$industry_after_processing&";
		}
		$data['industry']=$industry;
		
		$solutions='';
		if(isset($_GET['solutions'])) {
			$solutions=$_GET['solutions'];
			$target=$target."solutions=$solutions&";
		}
		$data['solutions']=$solutions;
		
		$solution='';
		if(isset($_GET['solution'])) {
			$solution=$_GET['solution'];
			
			$solution_after_processing='';
			if(is_array($solution)) {
				$solution_after_processing=implode($solution,',');
			} else {
				$solution_after_processing=$solution;
				$solution=explode(',',$solution);
			}
			
			$target=$target."solution=$solution_after_processing&";
			
		}
		$data['solution']=$solution;
		
		$medias='';
		if(isset($_GET['medias'])) {
			$medias=$_GET['medias'];
			$target=$target."medias=$medias&";
		}
		$data['medias']=$medias;
		
		$media_galary='';
		if(isset($_GET['media_galary'])) {
			$media_galary=$_GET['media_galary'];
			$target=$target."media_galary=$media_galary&";
		}
		$data['media_galary']=$media_galary;
		
		$media_event='';
		if(isset($_GET['media_event'])) {
			$media_event=$_GET['media_event'];
			$target=$target."media_event=$media_event&";
		}
		$data['media_event']=$media_event;
		
		$media_news='';
		if(isset($_GET['media_news'])) {
			$media_news=$_GET['media_news'];
			$target=$target."media_news=$media_news";
		}
		$data['media_news']=$media_news;
		
		$data['target']=$target;
		
		
		
		//--------- count ----------------------------
		$condition="deleted != 1 and approved=1";
		
		if($keyword!='') {
			$condition=$condition." and ( title LIKE '%".$keyword."%' OR title_ar LIKE '%".$keyword."%' OR brief LIKE '%".$keyword."%' OR brief_ar LIKE '%".$keyword."%' OR body LIKE '%".$keyword."%' OR body_ar LIKE '%".$keyword."%' )"; 
		}
		
		
		//----------------------------- Industry ----------------------------------------------
		$industry_condition=$condition;
		$industry_sub_condition=$condition;
				
		if($industries!='') {
			$data['industry_count']=$this->Industry_model->get_count_by_condition($condition) + $this->Industry_sub_model->get_count_by_condition($condition);
		} else {
			if($industry!='') {
				$industry_counter=0;
				
				//$industry=unserialize($industry);
				
				foreach($industry as $industry_id)
				{	
					if($industry_counter==0)
					{	
						$industry_condition=$industry_condition." AND (industry.id='$industry_id'";
						$industry_sub_condition=$industry_sub_condition." AND (industry_sub.industry_id='$industry_id'";
					}
					else
					{
						$industry_condition=$industry_condition." OR industry.id='$industry_id'";
						$industry_sub_condition=$industry_sub_condition." OR industry_sub.industry_id='$industry_id'";
					}
					$industry_counter++;	
				}
				if($industry_counter>0) {
					$industry_condition=$industry_condition.")";
					$industry_sub_condition=$industry_sub_condition	.")";	
				}
				$data['industry_count']=$this->Industry_model->get_count_by_condition($industry_condition) + $this->Industry_sub_model->get_count_by_condition($industry_sub_condition);
				
				
			} else {
				$data['industry_count']=0;
			}
		}
		
		//----------------------------- Solution ----------------------------------------------
		
		$solution_condition=$condition;
		$solution_sub_condition=$condition;
				
		if($solutions!='') {
			$data['solution_count']=$this->Solution_model->get_count_by_condition($condition) + $this->Solution_sub_model->get_count_by_condition($condition);
		} else {
			if($solution!='') {
				$solution_counter=0;
				
				foreach($solution as $solution_id)
				{	
					if($solution_counter==0)
					{	
						$solution_condition=$solution_condition." AND (solution.id='$solution_id'";
						$solution_sub_condition=$solution_sub_condition." AND (solution_sub.solution_id='$solution_id'";
					}
					else
					{
						$solution_condition=$solution_condition." OR solution.id='$solution_id'";
						$solution_sub_condition=$solution_sub_condition." OR solution_sub.solution_id='$solution_id'";
					}
					$solution_counter++;	
				}
				if($solution_counter>0)
				{
					$solution_condition=$solution_condition.")";	
					$solution_sub_condition=$solution_sub_condition.")";	
				}
				$data['solution_count']=$this->Solution_model->get_count_by_condition($solution_condition) + $this->Solution_sub_model->get_count_by_condition($solution_sub_condition);
				
				
			} else {
				$data['solution_count']=0;
			}
		}
		
		
		
		if($general!='') {
			$data['page_count']=$this->Page_model->get_count_by_condition($condition) ;
		} else {
			$data['page_count']=0;
		}

		$case_study_condition="deleted != 1 and approved=1";
		if($keyword!='') {
			$case_study_condition=$case_study_condition." and ( `end_user` LIKE '%".$keyword."%' OR `end_user_ar` LIKE '%".$keyword."%' OR `project_name` LIKE '%".$keyword."%' OR   `project_name_ar` LIKE '%".$keyword."%' OR `business_unit` LIKE '%".$keyword."%' OR   `business_unit_ar` LIKE '%".$keyword."%' OR   `project_leader` LIKE '%".$keyword."%' OR   `project_leader_ar` LIKE '%".$keyword."%' OR  `client_issue` LIKE '%".$keyword."%' OR `client_issue_ar` LIKE '%".$keyword."%' OR `work_scope` LIKE '%".$keyword."%' OR `work_scope_ar` LIKE '%".$keyword."%' OR `outcome` LIKE '%".$keyword."%' OR `outcome_ar` LIKE '%".$keyword."%' OR `team_members` LIKE '%".$keyword."%' OR `team_members_ar` LIKE '%".$keyword."%' OR `testimonial` LIKE '%".$keyword."%' OR `testimonial_ar` LIKE '%".$keyword."%' ) ";
		}
		if($casestudies!='') {
			$data['case_study_count']=$this->Case_study_model->get_count_by_condition($case_study_condition) ;
		} else {
			$data['case_study_count']=0;
		}
		
		$job_condition="deleted != 1 and approved=1";
		if($keyword!='') {
			$job_condition=$job_condition." and ( title LIKE '%".$keyword."%' OR title_ar LIKE '%".$keyword."%' OR reference LIKE '%".$keyword."%' OR reference_ar LIKE '%".$keyword."%' OR description LIKE '%".$keyword."%' OR description_ar LIKE '%".$keyword."%' OR qualifications LIKE '%".$keyword."%' OR qualifications_ar LIKE '%".$keyword."%' )"; 
		}
		if($careers!='') {
			$data['job_count']=$this->Job_model->get_count_by_condition($job_condition) ;
		} else {
			$data['job_count']=0;
		}
		
		if($medias!='') {
			$data['gallery_count']=$this->Gallery_model->get_count_by_condition($condition) ;
			$data['media_item_count']=$this->Media_item_model->get_count_by_condition($condition) ;
			
			$office_event_condition="deleted != 1 and approved=1";
			if($keyword!='') {
				$office_event_condition=$office_event_condition." and ( name LIKE '%".$keyword."%' OR name_ar LIKE '%".$keyword."%' OR brief LIKE '%".$keyword."%' OR brief_ar LIKE '%".$keyword."%' )"; 
			}
			$data['office_event_count']=$this->Office_event_model->get_count_by_condition($office_event_condition) ;
						
		} else {
			if($media_galary!='') {
				$data['gallery_count']=$this->Gallery_model->get_count_by_condition($condition) ;
			} else {
				$data['gallery_count']=0;
			}
			
			if($media_news!='') {
				$data['media_item_count']=$this->Media_item_model->get_count_by_condition($condition) ;
			} else {
				$data['media_item_count']=0;
			}
			
			$office_event_condition="deleted != 1 and approved=1";
			if($keyword!='') {
				$office_event_condition=$office_event_condition." and ( name LIKE '%".$keyword."%' OR name_ar LIKE '%".$keyword."%' OR brief LIKE '%".$keyword."%' OR brief_ar LIKE '%".$keyword."%' )"; 
			}
			if($media_event!='') {
				$data['office_event_count']=$this->Office_event_model->get_count_by_condition($office_event_condition) ;
			} else {
				$data['office_event_count']=0;
			}
		}
		
		
		$data['all_count']= $data['industry_count']+ $data['solution_count']+ $data['page_count'] +$data['gallery_count'] + $data['media_item_count'] +$data['office_event_count'] + $data['case_study_count'] +$data['job_count'];
		
		//------------------------------------------------
		
		
		
		
		$data['page']=$page;		
		$data['rows_count']=$data['all_count'];
		$per_page = 10;
    	$data['paging_no_of_pages']=$per_page;
		$start = ($page-1)*$per_page;
		
		
		
		//--------------------------- Rows ---------------
		
		$first_query=false;
		$search_query='';
		
		if($general!='') {
			$search_query=" (select 'page' as search_type, alias, title, title_ar, body, body_ar from page where $condition)";
			$first_query=true;
		}
		
		if($media_galary!='' || $medias!='') {
			if($first_query) {
				$search_query=$search_query." union all (select 'gallery' as search_type, id as alias, title, title_ar, body, body_ar from gallery where $condition)";
			} else {
				$search_query=" (select 'gallery' as search_type, id as alias, title, title_ar, body, body_ar from gallery where $condition)";
				$first_query=true;
			}
		}
		
		if($media_news!=''  || $medias!='') {
			if($first_query) {
				$search_query=$search_query." union all (select 'media_item' as search_type, alias, title, title_ar, body, body_ar from media_item where $condition)";
			} else {
				$search_query="  (select 'media_item' as search_type, alias, title, title_ar, body, body_ar from media_item where $condition)";
				$first_query=true;
			}
		}
		
		if($media_event!=''  || $medias!='') {
			if($first_query) {
				$search_query=$search_query." union all (select 'office_event' as search_type, id as alias, name as title, name_ar as title_ar, brief, brief_ar from office_event where $office_event_condition)";
			} else {
				$search_query="(select 'office_event' as search_type, id as alias, name as title, name_ar as title_ar, brief, brief_ar from office_event where $office_event_condition)";
				$first_query=true;
			}
		}
		
		
		
		if($casestudies!='') {
			if($first_query) {
				$search_query=$search_query." union all (select 'case_study' as search_type, alias, title, title_ar, client_issue, client_issue_ar from case_study where $case_study_condition)";
			} else {
				$search_query=" (select 'case_study' as search_type, alias, title, title_ar, client_issue, client_issue_ar from case_study where $case_study_condition)";
				$first_query=true;
			}
		}
		
		if($careers!='') {
			if($first_query) {
				$search_query=$search_query." union all (select 'job' as search_type, alias, title, title_ar, description, description_ar from hr_job where $job_condition)";
			} else {
				$search_query=" (select 'job' as search_type, alias, title, title_ar, description, description_ar from hr_job where $job_condition)";
				$first_query=true;
			}
		}
		
		if($industries!='' || $industry!='') {
			if($first_query) {
				$search_query=$search_query." union all (select 'industry' as search_type, alias, title, title_ar, body, body_ar from industry where $industry_condition)";
				$search_query=$search_query." union all (select 'industry_sub' as search_type, id as alias, title, title_ar, body, body_ar from industry_sub where $industry_sub_condition)";
		
			} else {
				$search_query=" (select 'industry' as search_type, alias, title, title_ar, body, body_ar from industry where $industry_condition)";
				$search_query=$search_query." union all (select 'industry_sub' as search_type, id as alias, title, title_ar, body, body_ar from industry_sub where $industry_sub_condition)";
		
				$first_query=true;
			}
		}
		
		if($solutions!='' || $solution!='') {
			if($first_query) {
				$search_query=$search_query." union all (select 'solution' as search_type, alias, title, title_ar, body, body_ar from solution where $solution_condition)";
				$search_query=$search_query." union all (select 'solution_sub' as search_type, id as alias, title, title_ar, body, body_ar from solution_sub where $solution_sub_condition)";
		
			} else {
				$search_query=" (select 'solution' as search_type, alias, title, title_ar, body, body_ar from solution where $solution_condition)";
				$search_query=$search_query." union all (select 'solution_sub' as search_type, id as alias, title, title_ar, body, body_ar from solution_sub where $solution_sub_condition)";
		
				$first_query=true;
			}
		}
		
		
		if($first_query) {
			$search_query=$search_query." limit $start, $per_page";
		}
		
		if($search_query!='') {
			$search_query=$this->Page_model->execute_query($search_query);
			$data['rows']=$search_query->result();
		} else  {
			$data['rows']=array();
		}
		//------------------------------------------------
		
		$this->load->view("website/search/advanced_result", $data);
	}
	
		
}