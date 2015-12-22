<?php
/**
 * Candidate controller file.
 *
 * Contains controller class of the candidate table.
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
 * Controller class of the candidate table.
 *
 * This is the controller class of the candidate table. between model and view, in MVC design pattern.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Candidate extends My_Controller
{ 	
	/**
	 * store this controller candidate screen id.
	 *
	 * @var int
	 * @access public
	 */
	public $screen_id=18;
	
	/**
	 * store this controller candidate table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='hr_candidate';
	
	/**
	 * store table fields to display in table.
	 *
	 * @var string
	 * @access public
	 */
	public $table_fields_to_display=" id,  username,  firstname, lastname, approved ";
	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Candidate_model', 'Candidate_model' , True);
		 
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
		redirect(base_url().$this->lang->lang()."/".ADMIN."/candidate/table");
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
		
		$rows_count = $this->Candidate_model->get_count($this->table);
		$data['rows_count']=$rows_count;
		
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$per_page = $data['paging_no_of_pages'];
    	
		$start = ($page-1)*$per_page;

		$data['rows'] = $this->Candidate_model->get_all_display_paging($this->table, $start, $per_page, $this->table_fields_to_display, $order, $order_type); 
        
		
		$this->load->view("admin/candidate/table", $data);
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
								
		$this->Candidate_model->update($this->table, $id, $data);
		$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$id);								
		//---------------------------------------------//
		
		redirect(base_url().$this->lang->lang().'/'.ADMIN.'/candidate/index');
	}
	
	/**
	 * Submit display method.
	 * 
	 * Method was called when submit the form. 
	 *
	 * @access	public
	 */
	public function submit_display()
	{
		if(isset($_POST['smt_export'])) {
			if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_view)) {
				redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
			}
			
			if(isset($_POST['chk_current_row'])) {
				$export_ids_arr=array();
				
				$export=$_POST['chk_current_row'];
				foreach($export as $export_id) {
					//----------User Histroy Row ------------------//
					//$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,4,$current_date,$export_id);								
					//---------------------------------------------//
		
					$export_ids_arr[]=$export_id;
				}
				
				$candidate_rows=$this->Candidate_model->get_by_array($export_ids_arr);
				
				$html= "<table class='table table-striped table-bordered bootstrap-datatable datatable' border='1'>";
				$index=0;
				foreach ($candidate_rows as $record)
				{
						$current_row_id=0;
						
						if($index==0)
						{
							$html.= "<thead><tr>";
							foreach ($record as $key=>$value)
							{
								$html.="<th >".lang($key)." </th>";
								
							}
							$html.= "</tr></thead>";				
						}
						
						
						
						$html.= "<tbody><tr>";
						foreach ($record as $key=>$value)
						{
							$width_row='150px';
							$html.="<td  class='center'> $value </td>";	
							
						}
					$html.= "</tr>";
					$index=$index+1;
				}
				
				$html.="</tbody></table>";
				
				$file_name='candidatees.xls';
				header("Content-type: application/vnd.ms-excel");
				header("Content-Disposition: attachment; filename=$file_name");
				echo $html;
				exit;
		
			}
			
			
			
		} else {
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
											
					$this->Candidate_model->update($this->table, $del_id, $data);
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$del_id);								
					//---------------------------------------------//
		
				}
			}
		}			
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/candidate/index');
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
							
			$this->Candidate_model->update($this->table, $id, $data);
			$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);						
			//---------------------------------------------//
			
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/candidate/index');
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
			$data['current_row'] = $this->Candidate_model->get_by_id($this->table, $id);
			
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
				$data['current_row'] = $this->Candidate_model->get_by_id($this->table, $id);
				$last_modify_date=$data['current_row']->last_modify_date;
			} else {
				if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_add)) {
				redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
				}
				$last_modify_date='';
			}
			 {
				$dateTime = new DateTime(); 
				$current_date=$dateTime->format("Y-m-d H:i:s");
				
				
				if($this->username_redundency($id))
				{
					
					if(isset($_POST['approved'])) {
						$approved=1;
					} else {
						$approved=0;
					}
					
					$data['current_row'] = array(
					'id' => $id ,
					'username'=>$_POST['username'],  
					'password'=>$_POST['password'],
					'firstname'=>$_POST['firstname'],  
					'middlename'=>$_POST['middlename'],  
					'lastname'=>$_POST['lastname'],  
					'gender'=>$_POST['gender'],  
					'birthdate'=>$_POST['birthdate'],  
					'nationality_id'=>$_POST['nationality_id'],  
					'country_id' => $_POST['country_id'] ,
					'address'=>$_POST['address'],
					'p_o_box' => $_POST['p_o_box'] ,
					'city'=>$_POST['city'],  
					'phone' => $_POST['phone'] ,
					'mobile'=>$_POST['mobile'], 
					'email'=>$_POST['email'],  
					
	  				'maritalstatus_id'=>$_POST['maritalstatus_id'],  
	  				'dependants_count'=>$_POST['dependants_count'],  
	  				'militarystatus_id'=>$_POST['militarystatus_id'],  
	  				'car_owner'=>$_POST['car_owner'],  
	  				'driving_license'=>$_POST['driving_license'],  
	  				'communication_channel_id'=>$_POST['communication_channel_id'],  
	  				'position_apply_for'=>$_POST['position_apply_for'],  
	  				'employment_type_id'=>$_POST['employment_type_id'],  
	  				'how_soon_can_you_join'=>$_POST['how_soon_can_you_join'],  
	  				'giza_city_id'=>$_POST['giza_city_id'],  
	  				'willing_to_travel'=>$_POST['willing_to_travel'],  
	  				'contact_with_giza_by_id'=>$_POST['contact_with_giza_by_id'],  
	  				'degree_id'=>$_POST['degree_id'],  
	  				'university_id'=>$_POST['university_id'],  
	  				'faculty_id'=>$_POST['faculty_id'],  
	  				'major_id'=>$_POST['major_id'],  
	  				'university_completion_date'=>$_POST['university_completion_date'],  
	  				'grade_id'=>$_POST['grade_id'],  
	  				'postgraduate_name1'=>$_POST['postgraduate_name1'],  
	  				'postgraduate_field1'=>$_POST['postgraduate_field1'],  
	  				'postgraduate_date1'=>$_POST['postgraduate_date1'],  
	  				'postgraduate_certificate1'=>$_POST['postgraduate_certificate1'],  
	  				'postgraduate_country1_id'=>$_POST['postgraduate_country1_id'],  
	  				'postgraduate_name2'=>$_POST['postgraduate_name2'],  
	  				'postgraduate_field2'=>$_POST['postgraduate_field2'],  
	  				'postgraduate_date2'=>$_POST['postgraduate_date2'],  
	  				'postgraduate_certificate2'=>$_POST['postgraduate_certificate2'],  
	  				'postgraduate_country2_id'=>$_POST['postgraduate_country2_id'],  
	  				'postgraduate_name3'=>$_POST['postgraduate_name3'],  
	  				'postgraduate_field3'=>$_POST['postgraduate_field3'],  
	  				'postgraduate_date3'=>$_POST['postgraduate_date3'],  
	  				'postgraduate_certificate3'=>$_POST['postgraduate_certificate3'],  
	  				'postgraduate_country_id3'=>$_POST['postgraduate_country_id3'],  
					'other_qualifications'=>$_POST['other_qualifications'], 
					'other_academic_education'=>$_POST['other_academic_education'],
					'line_of_business_id'=>$_POST['line_of_business_id'],  
					'line_of_business_experience_year'=>$_POST['line_of_business_experience_year'],  
					'industry_id'=>$_POST['industry_id'],  
					'expertise_industry_experience_year'=>$_POST['expertise_industry_experience_year'],  
					'language1_id'=>$_POST['language1_id'],  
					'language_level1_id'=>$_POST['language_level1_id'],  
					'language2_id'=>$_POST['language2_id'],  
					'language_level2_id'=>$_POST['language_level2_id'],  
					'language3_id'=>$_POST['language3_id'],  
					'language_level3_id'=>$_POST['language_level3_id'],  
					'computer_skills'=>$_POST['computer_skills'],
					'training_course1_name'=>$_POST['training_course1_name'],  
					'training_course1_location'=>$_POST['training_course1_location'],  
					'training_course1_duration'=>$_POST['training_course1_duration'],  
					'training_course2_name'=>$_POST['training_course2_name'],  
					'training_course2_location'=>$_POST['training_course2_location'],  
					'training_course2_duration'=>$_POST['training_course2_duration'],  
					'training_course3_name'=>$_POST['training_course3_name'],  
					'training_course3_location'=>$_POST['training_course3_location'],  
					'training_course3_duration'=>$_POST['training_course3_duration'],  
					'professional_experience_years'=>$_POST['professional_experience_years'],  
					'student_internship_experience_years'=>$_POST['student_internship_experience_years'],  
					'job1_title'=>$_POST['job1_title'],  
					'job1_employer'=>$_POST['job1_employer'],  
					'job1_duration'=>$_POST['job1_duration'],  
					'job1_duties'=>$_POST['job1_duties'], 
					'job2_title'=>$_POST['job2_title'],  
					'job2_employer'=>$_POST['job2_employer'],  
					'job2_duration'=>$_POST['job3_duration'],  
					'job2_duties'=>$_POST['job2_duties'], 
					'job3_title'=>$_POST['job3_title'],  
					'job3_employer'=>$_POST['job3_employer'],  
					'job3_duration'=>$_POST['job3_duration'],
					'job3_duties'=>$_POST['job3_duties'], 
					'reference1_name'=>$_POST['reference1_name'],  
					'reference1_position'=>$_POST['reference1_position'],  
					'reference1_organization'=>$_POST['reference1_organization'],  
					'reference1_phone'=>$_POST['reference1_phone'],  
					'reference1_email'=>$_POST['reference1_email'],
					'reference2_name'=>$_POST['reference2_name'],  
					'reference2_position'=>$_POST['reference2_position'],  
					'reference2_organization'=>$_POST['reference2_organization'],  
					'reference2_phone'=>$_POST['reference2_phone'],  
					'reference2_email'=>$_POST['reference2_email'],
					'reference3_name'=>$_POST['reference3_name'],  
					'reference3_position'=>$_POST['reference3_position'],  
					'reference3_organization'=>$_POST['reference3_organization'],  
					'reference3_phone'=>$_POST['reference3_phone'],  
					'reference3_email'=>$_POST['reference3_email'],
					'relative1_name'=>$_POST['relative1_name'],
					'relative1_department'=>$_POST['relative1_department'],
					'relative2_name'=>$_POST['relative2_name'],
					'relative2_department'=>$_POST['relative2_department'],
					'reason_for_leaving_current_employer'=>$_POST['reason_for_leaving_current_employer'],
					'commit_years'=>$_POST['commit_years'],
					'immigrate'=>$_POST['immigrate'],
					'immigrate_yes'=>$_POST['immigrate_yes'],
					'relocating'=>$_POST['relocating'],
					'salary'=>$_POST['salary'],
					'hobbies'=>$_POST['hobbies'],
					'professional_memberships'=>$_POST['professional_memberships'],
					'extra_activities'=>$_POST['extra_activities'],
					//'cv_file'=>$cv_file,
					//'image'=>image,
					'job_notification_mail'=>$_POST['job_notification_mail'],				
				
				     );
				            
				  $duplicated_id=$this->Candidate_model->get_id_by_username($_POST['username']);
				  $data['error']= lang('username_redundency_error')."<a  href='".base_url().$this->lang->lang()."/".ADMIN."/candidate/form/$duplicated_id/view' >".$this->lang->line('click_here_link')."</a>";
				            
				  $data['mode']= 'return';
				}
				else 
				{
				
		if($_FILES['image']['name']!="") {
			$userfile_name = $_FILES['image']['name']; // file name  
			$userfile_tmp  = $_FILES['image']['tmp_name']; // actual location  
			$userfile_size  = $_FILES['image']['size']; // file size  
			$userfile_type  = $_FILES['image']['type']; // mime type of file sent by browser. PHP doesn't check it.  
			$userfile_error  = $_FILES['image']['error'];
							
			$extension = end(explode('.', $_FILES['image']['name']));
			
			 // Add image file, to solve conflict if i upload banner and image as image, will take
			 // same name.
			 	
			$name_file_timestamp=strtotime($current_date).'_image';
				
			$uplad_path_file=getcwd().'/added/uploads/candidate/' . $name_file_timestamp.'.'.$extension;
		
			//if ($userfile_type!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
			if(move_uploaded_file($_FILES["image"]["tmp_name"], $uplad_path_file))
			{
				
				if($id==0) {
					$image = '/added/uploads/candidate/'.$name_file_timestamp.'.'.$extension;
							
				} else {
						
				if($_FILES['image']['name']!='') {
					
					$image=$this->Candidate_model->get_image_by_id($this->table, $id);
					$image_path=getcwd().$image;
					if(isset($image_path) && $image_path!=getcwd()) {
					unlink($image_path);
					}
					$image = '/added/uploads/candidate/'.$name_file_timestamp.'.'.$extension;
					
				} else {
					$image = $this->Candidate_model->get_image_by_id($this->table, $id);;
				}
					
				}
			}
			
			
		}else {
			if($id==0) {
					$image = '';
							
				} else { 
					$image = $this->Candidate_model->get_image_by_id($this->table, $id);
				}
			}
		
		
		if($_FILES['cv_file']['name']!="") {
			$userfile_name = $_FILES['cv_file']['name']; // file name  
			$userfile_tmp  = $_FILES['cv_file']['tmp_name']; // actual location  
			$userfile_size  = $_FILES['cv_file']['size']; // file size  
			$userfile_type  = $_FILES['cv_file']['type']; // mime type of file sent by browser. PHP doesn't check it.  
			$userfile_error  = $_FILES['cv_file']['error'];
							
			$extension = end(explode('.', $_FILES['cv_file']['name']));
			/**
			 * Add candidate file, to solve conflict if i upload banner and candidate as image, will take
			 * same name.
			 */	
			$name_file_timestamp=strtotime($current_date).'candidate';
				
			$uplad_path_file=getcwd().'/added/uploads/candidate/' . $name_file_timestamp.'.'.$extension;
		
			//if ($userfile_type!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
			if(move_uploaded_file($_FILES["cv_file"]["tmp_name"], $uplad_path_file))
			{
				
				if($id==0) {
					$cv_file = '/added/uploads/candidate/'.$name_file_timestamp.'.'.$extension;
							
				} else {
						
				if($_FILES['cv_file']['name']!='') {
					
					$cv_file=$this->Candidate_model->get_cv_file_by_id($this->table, $id);
					$cv_file_path=getcwd().$cv_file;
					if(isset($cv_file_path) && $cv_file_path!=getcwd()) {
					unlink($cv_file_path);
					}
					$cv_file = '/added/uploads/candidate/'.$name_file_timestamp.'.'.$extension;
					
				} else {
					$cv_file = $this->Candidate_model->get_cv_file_by_id($this->table, $id);;
				}
					
				}
			}
			
			
		}else {
			if($id==0) {
					$cv_file = '';
							
				} else { 
					$cv_file = $this->Candidate_model->get_cv_file_by_id($this->table, $id);
				}
				}
				
				
				
				
				$data['current_row'] = array(
				'username'=>$_POST['username'],  
				'password'=>$_POST['password'],
				'firstname'=>$_POST['firstname'],  
				'middlename'=>$_POST['middlename'],  
				'lastname'=>$_POST['lastname'],  
				'gender'=>$_POST['gender'],  
				'birthdate'=>$_POST['birthdate'],  
				'nationality_id'=>$_POST['nationality_id'],  
				'country_id' => $_POST['country_id'] ,
				'address'=>$_POST['address'],
				'p_o_box' => $_POST['p_o_box'] ,
				'city'=>$_POST['city'],  
				'phone' => $_POST['phone'] ,
				'mobile'=>$_POST['mobile'], 
				'email'=>$_POST['email'],  
				
  				'maritalstatus_id'=>$_POST['maritalstatus_id'],  
  				'dependants_count'=>$_POST['dependants_count'],  
  				'militarystatus_id'=>$_POST['militarystatus_id'],  
  				'car_owner'=>$_POST['car_owner'],  
  				'driving_license'=>$_POST['driving_license'],  
  				'communication_channel_id'=>$_POST['communication_channel_id'],  
  				'position_apply_for'=>$_POST['position_apply_for'],  
  				'employment_type_id'=>$_POST['employment_type_id'],  
  				'how_soon_can_you_join'=>$_POST['how_soon_can_you_join'],  
  				'giza_city_id'=>$_POST['giza_city_id'],  
  				'willing_to_travel'=>$_POST['willing_to_travel'],  
  				'contact_with_giza_by_id'=>$_POST['contact_with_giza_by_id'],  
  				'degree_id'=>$_POST['degree_id'],  
  				'university_id'=>$_POST['university_id'],  
  				'faculty_id'=>$_POST['faculty_id'],  
  				'major_id'=>$_POST['major_id'],  
  				'university_completion_date'=>$_POST['university_completion_date'],  
  				'grade_id'=>$_POST['grade_id'],  
  				'postgraduate_name1'=>$_POST['postgraduate_name1'],  
  				'postgraduate_field1'=>$_POST['postgraduate_field1'],  
  				'postgraduate_date1'=>$_POST['postgraduate_date1'],  
  				'postgraduate_certificate1'=>$_POST['postgraduate_certificate1'],  
  				'postgraduate_country1_id'=>$_POST['postgraduate_country1_id'],  
  				'postgraduate_name2'=>$_POST['postgraduate_name2'],  
  				'postgraduate_field2'=>$_POST['postgraduate_field2'],  
  				'postgraduate_date2'=>$_POST['postgraduate_date2'],  
  				'postgraduate_certificate2'=>$_POST['postgraduate_certificate2'],  
  				'postgraduate_country2_id'=>$_POST['postgraduate_country2_id'],  
  				'postgraduate_name3'=>$_POST['postgraduate_name3'],  
  				'postgraduate_field3'=>$_POST['postgraduate_field3'],  
  				'postgraduate_date3'=>$_POST['postgraduate_date3'],  
  				'postgraduate_certificate3'=>$_POST['postgraduate_certificate3'],  
  				'postgraduate_country_id3'=>$_POST['postgraduate_country_id3'],  
				'other_qualifications'=>$_POST['other_qualifications'], 
				'other_academic_education'=>$_POST['other_academic_education'],
				'line_of_business_id'=>$_POST['line_of_business_id'],  
				'line_of_business_experience_year'=>$_POST['line_of_business_experience_year'],  
				'industry_id'=>$_POST['industry_id'],  
				'expertise_industry_experience_year'=>$_POST['expertise_industry_experience_year'],  
				'language1_id'=>$_POST['language1_id'],  
				'language_level1_id'=>$_POST['language_level1_id'],  
				'language2_id'=>$_POST['language2_id'],  
				'language_level2_id'=>$_POST['language_level2_id'],  
				'language3_id'=>$_POST['language3_id'],  
				'language_level3_id'=>$_POST['language_level3_id'],  
				'computer_skills'=>$_POST['computer_skills'],
				'training_course1_name'=>$_POST['training_course1_name'],  
				'training_course1_location'=>$_POST['training_course1_location'],  
				'training_course1_duration'=>$_POST['training_course1_duration'],  
				'training_course2_name'=>$_POST['training_course2_name'],  
				'training_course2_location'=>$_POST['training_course2_location'],  
				'training_course2_duration'=>$_POST['training_course2_duration'],  
				'training_course3_name'=>$_POST['training_course3_name'],  
				'training_course3_location'=>$_POST['training_course3_location'],  
				'training_course3_duration'=>$_POST['training_course3_duration'],  
				'professional_experience_years'=>$_POST['professional_experience_years'],  
				'student_internship_experience_years'=>$_POST['student_internship_experience_years'],  
				'job1_title'=>$_POST['job1_title'],  
				'job1_employer'=>$_POST['job1_employer'],  
				'job1_duration'=>$_POST['job1_duration'],  
				'job1_duties'=>$_POST['job1_duties'], 
				'job2_title'=>$_POST['job2_title'],  
				'job2_employer'=>$_POST['job2_employer'],  
				'job2_duration'=>$_POST['job3_duration'],  
				'job2_duties'=>$_POST['job2_duties'], 
				'job3_title'=>$_POST['job3_title'],  
				'job3_employer'=>$_POST['job3_employer'],  
				'job3_duration'=>$_POST['job3_duration'],
				'job3_duties'=>$_POST['job3_duties'], 
				'reference1_name'=>$_POST['reference1_name'],  
				'reference1_position'=>$_POST['reference1_position'],  
				'reference1_organization'=>$_POST['reference1_organization'],  
				'reference1_phone'=>$_POST['reference1_phone'],  
				'reference1_email'=>$_POST['reference1_email'],
				'reference2_name'=>$_POST['reference2_name'],  
				'reference2_position'=>$_POST['reference2_position'],  
				'reference2_organization'=>$_POST['reference2_organization'],  
				'reference2_phone'=>$_POST['reference2_phone'],  
				'reference2_email'=>$_POST['reference2_email'],
				'reference3_name'=>$_POST['reference3_name'],  
				'reference3_position'=>$_POST['reference3_position'],  
				'reference3_organization'=>$_POST['reference3_organization'],  
				'reference3_phone'=>$_POST['reference3_phone'],  
				'reference3_email'=>$_POST['reference3_email'],
				'relative1_name'=>$_POST['relative1_name'],
				'relative1_department'=>$_POST['relative1_department'],
				'relative2_name'=>$_POST['relative2_name'],
				'relative2_department'=>$_POST['relative2_department'],
				'reason_for_leaving_current_employer'=>$_POST['reason_for_leaving_current_employer'],
				//'commit_years'=>$_POST['commit_years'],
				'immigrate'=>$_POST['immigrate'],
				'immigrate_yes'=>$_POST['immigrate_yes'],
				'relocating'=>$_POST['relocating'],
				'salary'=>$_POST['salary'],
				'hobbies'=>$_POST['hobbies'],
				'professional_memberships'=>$_POST['professional_memberships'],
				'extra_activities'=>$_POST['extra_activities'],
				'cv_file'=>$cv_file,
				'image'=>$image,
				'job_notification_mail'=>$_POST['job_notification_mail'],				
				
				
				'registeration_datetime'=>$current_date,  
				'active'=>1,  
				'active_code'=>'admin',
				'approved' => $this->session->userdata('user_session')->admin,
				'deleted' => 0,
				'last_user_id' => $this->session->userdata('user_session')->id,
				'last_modify_date' =>$current_date,
				);
					        
				if($id==0){
					$this->Candidate_model->insert($this->table, $data['current_row']);
					$id=$this->Candidate_model->get_max_id($this->table);
					//----------User Histroy Row ------------------//
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,1,$current_date,$id);		
					//---------------------------------------------//
					$this->session->set_userdata('message_session',lang('saved_successfully'));
				} else {
					$this->Candidate_model->update($this->table, $id, $data['current_row']);
					//----------User Histroy Row ------------------//
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);
					//---------------------------------------------//
					$this->session->set_userdata('message_session',lang('saved_successfully'));
				}
				
				redirect(base_url().$this->lang->lang()."/".ADMIN."/candidate/form/$id/view");
				}
			}
		}
        
		$this->load->view('admin/candidate/form',$data);
	}
	
	function username_redundency($id)
	{
		$username = $_POST['username'] ;
		$username_count=$this->Candidate_model->get_count_by_username($id,$username);
		
			if($username_count>0)
			{
				return true;
			}

			return false;
	}
	
	function check_username_availability($id)
	{
		if(isset($_POST['username']))
		{
			$username=$_POST['username'];
			$username_count=$this->Candidate_model->get_count_by_username($id,$username);
			if($username_count>0)
			{
					echo str_replace("###",$username, lang('username_not_available_error'));
			}
			else
			{
				echo 'OK';
			}
		}
		exit;
	}
	
}