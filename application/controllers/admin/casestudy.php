<?php
/**
 * Casestudy controller file.
 *
 * Contains controller class of the case_study table.
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
 * Controller class of the case_study table.
 *
 * This is the controller class of the case_study table. between model and view, in MVC design pattern.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Casestudy extends My_Controller
{ 	
	/**
	 * store this controller case_study screen id.
	 *
	 * @var int
	 * @access public
	 */
	public $screen_id=49;
	
	/**
	 * store this controller case_study table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='case_study';
	
	/**
	 * store table fields.
	 *
	 * @var string
	 * @access public
	 */
	public $table_fields="'id',  'alias', 'banner_image_thumbs', 'banner_files', 'banner_file_selected',  'title',  'title_ar', 'seo_words', 'seo_words_ar', 'brief', 'brief_ar', 'body', 'body_ar'";
	
	/**
	 * store table fields to display in table.
	 *
	 * @var string
	 * @access public
	 */
	public $table_fields_to_display=" id,  alias, banner_image_thumb_selected,  title,  title_ar, sort, approved ";
	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Case_study_model', 'Case_study_model' , True);
		$this->load->model('Industry_model', 'Industry_model' , True);
		$this->load->model('Solution_model', 'Solution_model' , True);
		$this->load->model('Case_study_industries_model', 'Case_study_industries_model' , True);
		$this->load->model('Case_study_solutions_model', 'Case_study_solutions_model' , True);
		 
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
		redirect(base_url().$this->lang->lang()."/".ADMIN."/casestudy/table");
	}

	/**
	 * Method displaying records or rows in table.
	 * 
	 * Method to call model get_all_display_paging method and pass this table records to view
	 * to display in table. 
	 *
	 * @access	public
	 * @param   int
	 * @param   string
	 * @param   string
	 */
	public function table($page=1, $order=null, $order_type=null)
	{
		if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_view)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		} 
		
		$data['page']=$page;
		
		$rows_count = $this->Case_study_model->get_count($this->table);
		$data['rows_count']=$rows_count;
		
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$per_page = $data['paging_no_of_pages'];
    	
		$start = ($page-1)*$per_page;
	
		if($order=='') {
			$order='sort';
		}
		$data['rows'] = $this->Case_study_model->get_all_display_paging($this->table, $start, $per_page, $this->table_fields_to_display, $order, $order_type); 
        
		
		$this->load->view("admin/case_study/table", $data);
	}
	
	/**
	 * Delete method.
	 * 
	 * Method used to delete one record. 
	 *
	 * @access	public
	 * @param   int
	 */
	public function delete($id)
	{	
		if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_delete)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		}	
		//----------User Histroy Row ------------------//
		$dateTime = new DateTime(); 
		$current_date=$dateTime->format("Y-m-d H:i:s");
		$data = array(
		'deleted' => 1,
		'last_user_id' => $this->session->userdata('user_session')->id,
		'last_modify_date' =>$current_date,
		);
								
		$this->Case_study_model->update($this->table, $id, $data);
		$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$id);								
		//---------------------------------------------//
		
		redirect(base_url().$this->lang->lang().'/'.ADMIN.'/casestudy/index');
	}
	
	/**
	 * Delete all method.
	 * 
	 * Method used to delete alot of records, by submit the form. 
	 *
	 * @access	public
	 */
	public function delete_all()
	{
		if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_delete)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		}
			if(isset($_POST['chk_current_row'])) {
				$del=$_POST['chk_current_row'];
				foreach($del as $del_id) {
					//----------User Histroy Row ------------------//
					$dateTime = new DateTime(); 
					$current_date=$dateTime->format("Y-m-d H:i:s");
					$data = array(
					'deleted' => 1,
					'last_user_id' => $this->session->userdata('user_session')->id,
					'last_modify_date' =>$current_date,
					);
											
					$this->Case_study_model->update($this->table, $del_id, $data);
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$del_id);								
					//---------------------------------------------//
		
				}
			}			
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/casestudy/index');
	}
	
	/**
	 * Approve method.
	 * 
	 * Method used to approve or un approve record.
	 *
	 * @access	public
	 * @param int
	 * @param int
	 */
	public function approve($id, $approve=0)
	{
		if($this->session->userdata('user_session')->admin!=1) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		}
			//----------User Histroy Row ------------------//
			$dateTime = new DateTime(); 
			$current_date=$dateTime->format("Y-m-d H:i:s");
			$data = array(
			'approved' => $approve,
			'last_user_id' => $this->session->userdata('user_session')->id,
			'last_modify_date' =>$current_date,
			);
							
			$this->Case_study_model->update($this->table, $id, $data);
			$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);						
			//---------------------------------------------//
			
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/casestudy/index');
	}
	
	
	/**
	 * Method check redundency of alias.
	 * 
	 * Method used to check redundency of alias py passing id as paramter to ignore. 
	 *
	 * @param   int
	 * @access	public
	 */
	public function alias_redundency($id)
	{
		$alias = $_POST['alias'] ;
		$alias_count=$this->Case_study_model->get_count_by_alias($this->table,$id,$alias);
		
			if($alias_count>0)
			{
				return true;
			}

			return false;
	}
	
	/**
	 * Method check availability of alias.
	 * 
	 * Method used to check availability of alias called from ajax. 
	 *
	 * @param   int
	 * @access	public
	 */
	public function check_alias_availability($id)
	{
		if(isset($_POST['alias']))
		{
			$alias=$_POST['alias'];
			$alias_count=$this->Case_study_model->get_count_by_alias($this->table,$id,$alias);
			if($alias_count>0)
			{
					echo str_replace("###",$alias, lang('alias_not_available_error'));
			}
			else
			{
				echo 'OK';
			}
		}
		exit;
	}
		
	/**
	 * Method form used to save data.
	 * 
	 * Method used to save data redirect by form submit. 
	 *
	 * @param   int
	 * @param   string
	 * @access	public
	 */
	public function form($id, $mode)
	{ 		
		if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_view)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		} else if($mode=='add') {
			if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_add)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
			}
		}
		else if($mode=='edit') {
			if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_edit)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
			}
		}
		
        if($id!=0){	
			$data['current_row'] = $this->Case_study_model->get_by_id($this->table, $id);
			//------------------------ Casestudy Categories ----------------------------------------
			$case_study_industries_rows = $this->Case_study_model->get_case_study_industries_by_id($id);
			$data['case_study_industry_ids']='';
			$data['case_study_industry_names']='';			
			$counter=0;
			foreach($case_study_industries_rows as $case_study_industries_rows)
			{			
				$case_study_industry_id=$case_study_industries_rows->industry_id;
				if($this->lang->lang()=='ar') {
					$case_study_industry_name=$case_study_industries_rows->title_ar;
				} else {
					$case_study_industry_name=$case_study_industries_rows->title;
				}
				if($counter==0)
				{
					$data['case_study_industry_ids']=$data['case_study_industry_ids'].$case_study_industry_id;
					$data['case_study_industry_names']=$data['case_study_industry_names'].$case_study_industry_name;
				}
				else
				{
					$data['case_study_industry_ids']=$data['case_study_industry_ids'].','.$case_study_industry_id;
					$data['case_study_industry_names']=$data['case_study_industry_names'].','.$case_study_industry_name;
				}
				$counter=$counter+1;
			}
			
			//------------------------ Casestudy Types ----------------------------------------
			$case_study_solutions_rows = $this->Case_study_model->get_case_study_solutions_by_id($id);
			$data['case_study_solution_ids']='';
			$data['case_study_solution_names']='';
        	$counter=0;
			foreach($case_study_solutions_rows as $case_study_solutions_row) {			
				$case_study_solution_id=$case_study_solutions_row->solution_id;
				if($this->lang->lang()=='ar') {
					$case_study_solution_name=$case_study_solutions_row->title_ar;
				} else {
					$case_study_solution_name=$case_study_solutions_row->title;
				}
				if($counter==0) {
					$data['case_study_solution_ids']=$data['case_study_solution_ids'].$case_study_solution_id;
					$data['case_study_solution_names']=$data['case_study_solution_names'].$case_study_solution_name;
				} else {
					$data['case_study_solution_ids']=$data['case_study_solution_ids'].','.$case_study_solution_id;
					$data['case_study_solution_names']=$data['case_study_solution_names'].','.$case_study_solution_name;
				}
				$counter=$counter+1;
			}
			
        } 
        $data['mode']= $mode;

        //-----------------------------------------------------------------
        $message_session=$this->session->userdata('message_session');
		if($message_session) {
        	$data['message']= $message_session;
        	$this->session->unset_userdata('message_session');
		}
        //-----------------------------------------------------------------
        
		if(isset($_POST['smt_save'])) {
			if($id!=0) {
				if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_edit)) {
				redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
				}
				$data['current_row'] = $this->Case_study_model->get_by_id($this->table, $id);
				$last_modify_date=$data['current_row']->last_modify_date;
			} else {
				if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_add)) {
				redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
				}
				$last_modify_date='';
			}
			if($this->alias_redundency($id)) {
					$data['current_row'] = array(
								'id' => $id ,
				               	'alias' => $_POST['alias'] ,
								'case_study_industry_ids' => $_POST['industry_ids'] ,
								'case_study_industry_names' => $_POST['industry_names'] ,
								'case_study_solution_ids' => $_POST['solution_ids'] ,
								'case_study_solution_names' => $_POST['solution_names'] ,
				               	'title' => $_POST['title'] ,
				               	'title_ar' => $_POST['title_ar'],
								'seo_words' => $_POST['seo_words'] ,
				               	'seo_words_ar' => $_POST['seo_words_ar'] ,
				               	'client_id' => $_POST['client_id'],
								'country_id' => $_POST['country_id'] ,
				               
								'end_user' => $_POST['end_user'] ,
								'end_user_ar' => $_POST['end_user_ar'] , 
								'project_name' => $_POST['project_name'] ,  
								'project_name_ar' => $_POST['project_name_ar'] ,  
								'business_unit' => $_POST['business_unit'] ,  
								'business_unit_ar' => $_POST['business_unit_ar'] ,  
								'project_leader' => $_POST['project_leader'] ,  
								'project_leader_ar' => $_POST['project_leader_ar'] , 
								'client_issue' => $_POST['client_issue'] ,
								'client_issue_ar' => $_POST['client_issue_ar'] ,
								'work_scope' => $_POST['work_scope'] ,
								'work_scope_ar' => $_POST['work_scope_ar'] ,
								'outcome' => $_POST['outcome'] ,
								'outcome_ar' => $_POST['outcome_ar'] ,
								'team_members' => $_POST['team_members'] ,
								'team_members_ar' => $_POST['team_members_ar'] ,
								'testimonial' => $_POST['testimonial'] ,
								'testimonial_ar' => $_POST['testimonial_ar'] ,
				            );
				            
				         	$duplicated_id=$this->Case_study_model->get_id_by_alias($this->table,$_POST['alias']);
				            $data['error']= lang('alias_redundency_error')."<a  href='".base_url().$this->lang->lang()."/".ADMIN."/casestudy/form/$duplicated_id/view' >".$this->lang->line('click_here_link')."</a>";
				            
				            
				            $data['mode']= 'return';
				} else {
				$dateTime = new DateTime(); 
				$current_date=$dateTime->format("Y-m-d H:i:s");

				if($_FILES['banner_file']['name']!='') {
					
				$userfile_name = $_FILES['banner_file']['name']; // file name  
				$userfile_tmp  = $_FILES['banner_file']['tmp_name']; // actual location  
				$userfile_size  = $_FILES['banner_file']['size']; // file size  
				$userfile_type  = $_FILES['banner_file']['type']; // mime type of file sent by browser. PHP doesn't check it.  
				$userfile_error  = $_FILES['banner_file']['error'];
					
				$extension = end(explode('.', $_FILES['banner_file']['name']));
		
				$name_file_timestamp=strtotime($current_date);
					
				$uplad_path_file=getcwd().'/added/uploads/banner/casestudy/' . $name_file_timestamp.'.'.$extension;
				
				//if ($userfile_type!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
				{
					if(move_uploaded_file($_FILES["banner_file"]["tmp_name"], $uplad_path_file))
					{
						
						if($id==0) {
							$banner_files = '/added/uploads/banner/casestudy/'.$name_file_timestamp.'.'.$extension;
							$banner_image_thumbs= '/added/uploads/banner/casestudy/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							$banner_file_selected = '/added/uploads/banner/casestudy/'.$name_file_timestamp.'.'.$extension;
							$banner_image_thumb_selected= '/added/uploads/banner/casestudy/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							
						} else {
								
							if($_POST['hdn_banner_image_thumbs']=='') {
							$banner_image_thumbs = '/added/uploads/banner/casestudy/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							} else {
								$banner_image_thumbs = $_POST['hdn_banner_image_thumbs'].',,,'.'/added/uploads/banner/casestudy/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							}
							
							if($_POST['hdn_banner_files']=='') {
								$banner_files = '/added/uploads/banner/casestudy/'.$name_file_timestamp.'.'.$extension;
							} else {
								$banner_files = $_POST['hdn_banner_files'].',,,'.'/added/uploads/banner/casestudy/'.$name_file_timestamp.'.'.$extension;
							} 
							
							
							
							if(isset($_POST['are_current'])) {
							$banner_file_selected = '/added/uploads/banner/casestudy/'.$name_file_timestamp.'.'.$extension;
							$banner_image_thumb_selected= '/added/uploads/banner/casestudy/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							} else {
								if(isset($_POST['headers'])) {
								$banner_image_thumb_selected= $_POST['headers'];
								$banner_file_selected = str_replace('_thumb.','.',$banner_image_thumb_selected);
								} else {
								$banner_file_selected = '/added/uploads/banner/casestudy/'.$name_file_timestamp.'.'.$extension;
								$banner_image_thumb_selected= '/added/uploads/banner/casestudy/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							
								}
							}
						}
					} else {
						
						
					}
					/*
					list($width, $height, $type, $attr) = getimagesize($uplad_path_file);
					if($width>2000) {
					$new_width=$width/7;
					$new_height=$height/7;
					} elseif ($width>1500) {
						$new_width=$width/6;
						$new_height=$height/6;
					} elseif ($width>1000) {
						$new_width=$width/4;
						$new_height=$height/4;
					} elseif ($width>750) {
						$new_width=$width/3;
						$new_height=$height/3;
					}elseif ($width>350) {
						$new_width=$width/2;
						$new_height=$height/2;
					} else {
						$new_width=$width;
						$new_height=$height;
					}
					*/
				    
				            
				    $config['image_library'] = 'gd2';
					$config['source_image'] = $uplad_path_file;
					$config['create_thumb'] = TRUE;
					$config['maintain_ratio'] = TRUE;
					$config['width'] = 100;
					$config['height'] = 50;
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();       
				            							            
							            
							            
					}
					
				} else {
				 	if($id==0) {
							$banner_image_thumbs = '';
							$banner_files = '';
							$banner_file_selected = '';
							$banner_image_thumb_selected= '';
						} else {
							$banner_image_thumbs = $_POST['hdn_banner_image_thumbs'];
							$banner_files = $_POST['hdn_banner_files'];
							if(isset($_POST['headers'])) {
							$banner_image_thumb_selected= $_POST['headers'];
							$banner_file_selected = str_replace('_thumb.','.',$banner_image_thumb_selected);
							} else {
							$banner_file_selected = '';
							$banner_image_thumb_selected= '';
							}
						}
				}
				
				/**
				 * Delete Banners selected.
				 */
				if(isset($_POST['chk_headers_delete'])) {
					$del_headers=$_POST['chk_headers_delete'];
					foreach($del_headers as $del_header) {
						
						$del_header_thumb_full_path=getcwd().$del_header;
						$del_header_full_path=str_replace('_thumb.','.',$del_header_thumb_full_path);
						
						$del_header_thumb=$del_header;
						$del_header=str_replace('_thumb.','.',$del_header_thumb);
						
						
						/**
						 * Un Set current banner value if deleted. 
						 */
						if($del_header_thumb==$banner_image_thumb_selected) {
							$banner_file_selected = '';
							$banner_image_thumb_selected= '';
						}
						
						
						if(file_exists($del_header_thumb_full_path)) {
							unlink($del_header_thumb_full_path);
						}
						if(file_exists($del_header_full_path)) {
							unlink($del_header_full_path);
						}
						
						if (strpos($banner_image_thumbs, ',,,'.$del_header_thumb) !== false) {
							$banner_image_thumbs=str_replace(',,,'.$del_header_thumb,'',$banner_image_thumbs);
						} else {
							$banner_image_thumbs=str_replace($del_header_thumb,'',$banner_image_thumbs);
						}
						
						if (strpos($banner_files, ',,,'.$del_header) !== false) {
							$banner_files=str_replace(',,,'.$del_header,'',$banner_files);
						} else {
							$banner_files=str_replace($del_header,'',$banner_files);
						}
						
						
						
					}
				}
				
				
				if($id==0)
				{
					$sort=$this->Case_study_model->get_max_sort()+1;
				} else {
					$sort=$this->Case_study_model->get_sort_by_id($id);
				}
				
				$data['current_row'] = array(
               	'alias' => $_POST['alias'] ,
               	'title' => $_POST['title'] ,
               	'title_ar' => $_POST['title_ar'],
				'seo_words' => $_POST['seo_words'] ,
               	'seo_words_ar' => $_POST['seo_words_ar'] ,
				
				'banner_image_thumbs' => $banner_image_thumbs ,
               	'banner_files' => $banner_files,
				'banner_image_thumb_selected' => $banner_image_thumb_selected ,
				'banner_file_selected' => $banner_file_selected ,
               
               	'client_id' => $_POST['client_id'],
				'country_id' => $_POST['country_id'] ,
               
				'end_user' => $_POST['end_user'] ,
				'end_user_ar' => $_POST['end_user_ar'] , 
				'project_name' => $_POST['project_name'] ,  
				'project_name_ar' => $_POST['project_name_ar'] ,  
				'business_unit' => $_POST['business_unit'] ,  
				'business_unit_ar' => $_POST['business_unit_ar'] ,  
				'project_leader' => $_POST['project_leader'] ,  
				'project_leader_ar' => $_POST['project_leader_ar'] , 
				'client_issue' => $_POST['client_issue'] ,
				'client_issue_ar' => $_POST['client_issue_ar'] ,
				'work_scope' => $_POST['work_scope'] ,
				'work_scope_ar' => $_POST['work_scope_ar'] ,
				'outcome' => $_POST['outcome'] ,
				'outcome_ar' => $_POST['outcome_ar'] ,
				'team_members' => $_POST['team_members'] ,
				'team_members_ar' => $_POST['team_members_ar'] ,
				'testimonial' => $_POST['testimonial'] ,
				'testimonial_ar' => $_POST['testimonial_ar'] , 
				'sort' => $sort ,
				
				'approved' => $this->session->userdata('user_session')->admin,
				'deleted' => 0,
				'last_user_id' => $this->session->userdata('user_session')->id,
				'last_modify_date' =>$current_date,
				);
					        
				if($id==0){
					$this->Case_study_model->insert($this->table, $data['current_row']);
					$id=$this->Case_study_model->get_max_id($this->table);
					//----------User Histroy Row ------------------//
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,1,$current_date,$id);		
					//---------------------------------------------//
					$this->session->set_userdata('message_session',lang('saved_successfully'));
				} else {
					$this->Case_study_model->update($this->table, $id, $data['current_row']);
					//----------User Histroy Row ------------------//
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);
					//---------------------------------------------//
					$this->session->set_userdata('message_session',lang('saved_successfully'));
				}
				
				
				//Insert page categoriess.
				$case_study_industry_ids = $_POST['industry_ids'];
				$case_study_industry_ids = $case_study_industry_ids;
				$case_study_industry_ids = explode(",", $case_study_industry_ids);
				$case_study_industry_data = array();
				foreach($case_study_industry_ids as $case_study_industry_id) {
					if($case_study_industry_id!=0) {
					$case_study_industry_data[]=array('case_study_id' => $id,'industry_id' => $case_study_industry_id);
					}
				}
				$this->Case_study_industries_model->insert($id,$case_study_industry_data);

				//Insert page types.
				$case_study_solution_ids = $_POST['solution_ids'];
				$case_study_solution_ids = $case_study_solution_ids;
				$case_study_solution_ids = explode(",", $case_study_solution_ids);
				$case_study_solution_data = array();
				foreach($case_study_solution_ids as $case_study_solution_id) {
					if($case_study_solution_id!=0) {
					$case_study_solution_data[]=array('case_study_id' => $id,'solution_id' => $case_study_solution_id);
					}
				}
				$this->Case_study_solutions_model->insert($id,$case_study_solution_data);
				
				
				
				redirect(base_url().$this->lang->lang()."/".ADMIN."/casestudy/form/$id/view");
			}
		}
        
		$this->load->view('admin/case_study/form',$data);
	}
	
	/**
	 * Methos popupSolution to display popup for solution.
	 * @access public
	 * @return boolean
	*/
	public function popupSolution($id)
	{
		$data['rows'] = $this->Solution_model->get_all();
		
		$case_study_solutions_rows = $this->Case_study_model->get_case_study_solutions_by_id($id);
		/*
		$count_case_study_solutions=count($case_study_solutions_rows);
		if($count_case_study_solutions>0) {
		$event_office_ids=$case_study_solution_row->office_ids;
		$event_office_ids = explode(",", $event_office_ids);
		} else {
			$event_office_ids=array();
		}
		*/
		$data['solutions_rows'] = $case_study_solutions_rows;
		
		$this->load->view('admin/solution/popup', $data);
	}
	
	/**
	 * Methos popupIndustry to display popup for industry.
	 * @access public
	 * @return boolean
	*/
	public function popupIndustry($id)
	{
		$data['rows'] = $this->Industry_model->get_all();
		
		$case_study_industries_rows = $this->Case_study_model->get_case_study_industries_by_id($id);
		$data['industries_rows'] = $case_study_industries_rows;
		
		$this->load->view('admin/industry/popup', $data);
	}
	
	
function sort($type, $id)
	{
		$row=$this->Case_study_model->get_by_id($this->table, $id);
		$sort=$row->sort;
		
		if($type=='up') {
			$rowbeforeafter=$this->Case_study_model->get_by_sort_less($sort);
			$rowbeforeafter_sort=$rowbeforeafter->sort;
			$rowbeforeafter_id=$rowbeforeafter->id;
			$rowbeforeafter_sort=$sort;
			$sort=$sort-1;	
			
			
		} else {
			
			$rowbeforeafter=$this->Case_study_model->get_by_sort_more($sort);
			$rowbeforeafter_sort=$rowbeforeafter->sort;
			$rowbeforeafter_id=$rowbeforeafter->id;
			$rowbeforeafter_sort=$sort;
			
			$sort=$sort+1;
		
		}
		
		$data = array(
		'sort' => $sort,
		);
		
		$rowbeforeafter_data = array(
		'sort' => $rowbeforeafter_sort,
		);
		
		$result=$this->Case_study_model->update($this->table, $id, $data);
		$result=$this->Case_study_model->update($this->table, $rowbeforeafter_id, $rowbeforeafter_data);
		redirect(base_url().$this->lang->lang().'/'.ADMIN.'/casestudy/index');

	}
}