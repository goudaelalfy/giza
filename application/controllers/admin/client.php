<?php
/**
 * Client controller file.
 *
 * Contains controller class of the client table.
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
 * Controller class of the client table.
 *
 * This is the controller class of the client table. between model and view, in MVC design pattern.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Client extends My_Controller
{ 	
	/**
	 * store this controller client screen id.
	 *
	 * @var int
	 * @access public
	 */
	public $screen_id=19;
	
	/**
	 * store this controller client table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='client';
	
	/**
	 * store table fields to display in table.
	 *
	 * @var string
	 * @access public
	 */
	public $table_fields_to_display=" id,  name,  website, address, approved ";
	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Client_model', 'Client_model' , True);
		 
		$this->load->model('Industry_model', 'Industry_model' , True);
		//$this->load->model('Solution_model', 'Solution_model' , True);
		$this->load->model('Client_industries_model', 'Client_industries_model' , True);
		$this->load->model('Client_project_industries_model', 'Client_project_industries_model' , True);
		 
		$this->load->model('Client_survey_model', 'Client_survey_model' , True);
		$this->load->model('Client_survey_answer_model', 'Client_survey_answer_model' , True);
		
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
		redirect(base_url().$this->lang->lang()."/".ADMIN."/client/table");
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
		
		$rows_count = $this->Client_model->get_count($this->table);
		$data['rows_count']=$rows_count;
		
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$per_page = $data['paging_no_of_pages'];
    	
		$start = ($page-1)*$per_page;

		$data['rows'] = $this->Client_model->get_all_display_paging($this->table, $start, $per_page, $this->table_fields_to_display, $order, $order_type); 
        
		
		$this->load->view("admin/client/table", $data);
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
								
		$this->Client_model->update($this->table, $id, $data);
		$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$id);								
		//---------------------------------------------//
		
		redirect(base_url().$this->lang->lang().'/'.ADMIN.'/client/index');
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
				
				$client_rows=$this->Client_model->get_by_array($export_ids_arr);
				
				$html= "<table class='table table-striped table-bordered bootstrap-datatable datatable' border='1'>";
				$index=0;
				foreach ($client_rows as $record)
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
				
				$file_name='clients.xls';
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
											
					$this->Client_model->update($this->table, $del_id, $data);
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$del_id);								
					//---------------------------------------------//
		
				}
			}
		}			
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/client/index');
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
							
			$this->Client_model->update($this->table, $id, $data);
			$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);						
			//---------------------------------------------//
			
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/client/index');
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
			$data['current_row'] = $this->Client_model->get_by_id($this->table, $id);
			
        //------------------------ Client Industries ----------------------------------------
			$client_industries_rows = $this->Client_model->get_client_industries_by_id($id);
			$data['client_industry_ids']='';
			$data['client_industry_names']='';
        	$counter=0;
			foreach($client_industries_rows as $client_industries_row) {			
				$client_industry_id=$client_industries_row->industry_id;
				if($this->lang->lang()=='ar') {
					$client_industry_name=$client_industries_row->title_ar;
				} else {
					$client_industry_name=$client_industries_row->title;
				}
				if($counter==0) {
					$data['client_industry_ids']=$data['client_industry_ids'].$client_industry_id;
					$data['client_industry_names']=$data['client_industry_names'].$client_industry_name;
				} else {
					$data['client_industry_ids']=$data['client_industry_ids'].','.$client_industry_id;
					$data['client_industry_names']=$data['client_industry_names'].','.$client_industry_name;
				}
				$counter=$counter+1;
			}
			
        //------------------------ Client Project Industries ----------------------------------------
			$client_project_industries_rows = $this->Client_model->get_client_project_industries_by_id($id);
			$data['client_project_industry_ids']='';
			$data['client_project_industry_names']='';			
			$counter=0;
			foreach($client_project_industries_rows as $client_project_industries_rows)
			{			
				$client_project_industry_id=$client_project_industries_rows->industry_id;
				if($this->lang->lang()=='ar') {
					$client_project_industry_name=$client_project_industries_rows->title_ar;
				} else {
					$client_project_industry_name=$client_project_industries_rows->title;
				}
				if($counter==0)
				{
					$data['client_project_industry_ids']=$data['client_project_industry_ids'].$client_project_industry_id;
					$data['client_project_industry_names']=$data['client_project_industry_names'].$client_project_industry_name;
				}
				else
				{
					$data['client_project_industry_ids']=$data['client_project_industry_ids'].','.$client_project_industry_id;
					$data['client_project_industry_names']=$data['client_project_industry_names'].','.$client_project_industry_name;
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
				$data['current_row'] = $this->Client_model->get_by_id($this->table, $id);
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

				$interests='';
				if(isset($_POST['interests'])) {
					$interests_arr=$_POST['interests'];
					$interest_counter=0;
					foreach($interests_arr as $interest) {
						if($interest_counter>0 && $interest!=''){
							$interests=$interests.',';
						}
						if($interest!=''){
					  		$interests=$interests.$interest;
					  		$interest_counter=$interest_counter+1;
						}
					}
				}
				
				
				
				if($this->username_redundency($id))
				{
					
					if(isset($_POST['approved'])) {
						$approved=1;
					} else {
						$approved=0;
					}
					
					$data['current_row'] = array(
					'id' => $id ,
					'name'=>$_POST['name'],  
					'username'=>$_POST['username'],  
					'password'=>$_POST['password'],  
					'website'=>$_POST['website'],  
					'address'=>$_POST['address'],  
					'phone'=>$_POST['phone'],  
					//'industries'=>$_POST['industries'],  
					//'solutions'=>$_POST['solutions'],  
					'client_industry_ids' => $_POST['industry_ids'] ,
					'client_industry_names' => $_POST['industry_names'] ,
					'client_project_industry_ids' => $_POST['project_industry_ids'] ,
					'client_project_industry_names' => $_POST['project_industry_names'] ,
					'brief'=>$_POST['brief'], 
					//'logo'=>$_POST['logo'],  
					'project_name'=>$_POST['project_name'],  
					'project_contract_value'=>$_POST['project_contract_value'],  
					'project_duration'=>$_POST['project_duration'],  
					'testimony'=>$_POST['testimony'],  
					'feedback'=>$_POST['feedback'],  
					
					'contact_title'=>$_POST['contact_title'],  
					'contact_firstname'=>$_POST['contact_firstname'],  
					'contact_lastname'=>$_POST['contact_lastname'],  
					'contact_position'=>$_POST['contact_position'],  
					'contact_mobile'=>$_POST['contact_mobile'],  
					'contact_email'=>$_POST['contact_email'], 
					'interests'=>$interests,
					
					  
					
					//'registeration_datetime'=>$current_date,  
					//'active'=>$_POST['active'],  
					//'active_code'=>$_POST['active_code'],
				     );
				            
				  $duplicated_id=$this->Client_model->get_id_by_username($_POST['username']);
				  $data['error']= lang('username_redundency_error')."<a  href='".base_url().$this->lang->lang()."/".ADMIN."/client/form/$duplicated_id/view' >".$this->lang->line('click_here_link')."</a>";
				            
				  $data['mode']= 'return';
				}
				else 
				{
			
				if($_FILES['logo']['name']!="") {
					$userfile_name = $_FILES['logo']['name']; // file name  
					$userfile_tmp  = $_FILES['logo']['tmp_name']; // actual location  
					$userfile_size  = $_FILES['logo']['size']; // file size  
					$userfile_type  = $_FILES['logo']['type']; // mime type of file sent by browser. PHP doesn't check it.  
					$userfile_error  = $_FILES['logo']['error'];
									
					$extension = end(explode('.', $_FILES['logo']['name']));
					/**
					 * Add logo file, to solve conflict if i upload banner and logo as image, will take
					 * same name.
					 */	
					$name_file_timestamp=strtotime($current_date).'_logo';
						
					$uplad_path_file=getcwd().'/added/uploads/logo/client/' . $name_file_timestamp.'.'.$extension;
				
					//if ($userfile_type!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
					if(move_uploaded_file($_FILES["logo"]["tmp_name"], $uplad_path_file))
					{
						
						if($id==0) {
							$logo = '/added/uploads/logo/client/'.$name_file_timestamp.'.'.$extension;
									
						} else {
								
						if($_FILES['logo']['name']!='') {
							
							$logo=$this->Client_model->get_logo_by_id($this->table, $id);
							$logo_path=getcwd().$logo;
							if(isset($logo_path) && $logo_path!=getcwd()) {
							unlink($logo_path);
							}
							$logo = '/added/uploads/logo/client/'.$name_file_timestamp.'.'.$extension;
							
						} else {
							$logo = $this->Client_model->get_logo_by_id($this->table, $id);;
						}
							
						}
					}
					
					
				}else {
					if($id==0) {
							$logo = '';
									
						} else { 
							$logo = $this->Client_model->get_logo_by_id($this->table, $id);
						}
					}
					
				
				$data['current_row'] = array(
				'name'=>$_POST['name'],  
				'username'=>$_POST['username'],  
				'password'=>$_POST['password'],  
				'website'=>$_POST['website'],  
				'address'=>$_POST['address'],  
				'phone'=>$_POST['phone'],  
				//'industries'=>$_POST['industries'],  
				//'solutions'=>$_POST['solutions'],  
				'brief'=>$_POST['brief'], 
				'logo'=>$logo,  
				
				'project_name'=>$_POST['project_name'],  
				'project_contract_value'=>$_POST['project_contract_value'],  
				'project_duration'=>$_POST['project_duration'],  
				'testimony'=>$_POST['testimony'],  
				'feedback'=>$_POST['feedback'],  
					
				
				'contact_title'=>$_POST['contact_title'],  
				'contact_firstname'=>$_POST['contact_firstname'],  
				'contact_lastname'=>$_POST['contact_lastname'],  
				'contact_position'=>$_POST['contact_position'],  
				'contact_mobile'=>$_POST['contact_mobile'],  
				'contact_email'=>$_POST['contact_email'], 
				'interests'=>$interests,
				'registeration_datetime'=>$current_date,  
				'active'=>1,  
				'active_code'=>'admin',
				'approved' => $this->session->userdata('user_session')->admin,
				'deleted' => 0,
				'last_user_id' => $this->session->userdata('user_session')->id,
				'last_modify_date' =>$current_date,
				);
					        
				if($id==0){
					$this->Client_model->insert($this->table, $data['current_row']);
					$id=$this->Client_model->get_max_id($this->table);
					//----------User Histroy Row ------------------//
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,1,$current_date,$id);		
					//---------------------------------------------//
					$this->session->set_userdata('message_session',lang('saved_successfully'));
				} else {
					$this->Client_model->update($this->table, $id, $data['current_row']);
					//----------User Histroy Row ------------------//
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);
					//---------------------------------------------//
					$this->session->set_userdata('message_session',lang('saved_successfully'));
				}
				
				//Insert client industries.
				$client_industry_ids = $_POST['industry_ids'];
				$client_industry_ids = $client_industry_ids;
				$client_industry_ids = explode(",", $client_industry_ids);
				$client_industry_data = array();
				foreach($client_industry_ids as $client_industry_id) {
					if($client_industry_id!=0) {
					$client_industry_data[]=array('client_id' => $id,'industry_id' => $client_industry_id);
					}
				}
				$this->Client_industries_model->insert($id,$client_industry_data);

				//Insert client project industries.
				$client_project_industry_ids = $_POST['project_industry_ids'];
				$client_project_industry_ids = $client_project_industry_ids;
				$client_project_industry_ids = explode(",", $client_project_industry_ids);
				$client_project_industry_data = array();
				foreach($client_project_industry_ids as $client_project_industry_id) {
					if($client_project_industry_id!=0) {
					$client_project_industry_data[]=array('client_id' => $id,'industry_id' => $client_project_industry_id);
					}
				}
				$this->Client_project_industries_model->insert($id,$client_project_industry_data);
				
				
				redirect(base_url().$this->lang->lang()."/".ADMIN."/client/form/$id/view");
				}
			}
		}
        
		$this->load->view('admin/client/form',$data);
	}
	
	function username_redundency($id)
	{
		$username = $_POST['username'] ;
		$username_count=$this->Client_model->get_count_by_username($id,$username);
		
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
			$username_count=$this->Client_model->get_count_by_username($id,$username);
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
	
	/**
	 * Methos popupindustry to display popup for industry.
	 * @access public
	 * @return boolean
	*/
	public function popupindustry($id)
	{
		$data['rows'] = $this->Industry_model->get_all();
		
		$industries_rows = $this->Client_model->get_client_industries_by_id($id);
		$data['industries_rows'] = $industries_rows;
		
		$this->load->view('admin/industry/popup', $data);
	}
	
	/**
	 * Methos popupindustry to display popup for industry.
	 * @access public
	 * @return boolean
	*/
	public function popupprojectindustry($id)
	{
		$data['rows'] = $this->Industry_model->get_all();
		
		$industries_rows = $this->Client_model->get_client_project_industries_by_id($id);
		$data['industries_rows'] = $industries_rows;
		
		$this->load->view('admin/client/project_industry_popup', $data);
	}
	
	
	public function survey($id)
	{ 		
		if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_view)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		} 
		
        $data=array();
		
		$data['client_survey_question_rows'] = $this->Client_survey_model->get_all_display_paging('client_survey_question', 0, 1000, '*', 'sort', ''); 
        		
		$data['title']=lang('sign_up');
		
        if($id!=0){	
			$data['current_client_survey_rows'] = $this->Client_survey_answer_model->get_by_client($id);
        }
        
        
        //$data['mode']= $mode;

        //-----------------------------------------------------------------
        $message_session=$this->session->userdata('message_session');
		if($message_session) {
        	$data['message']= $message_session;
        	$this->session->unset_userdata('message_session');
		}
        //-----------------------------------------------------------------
        
		$this->load->view('admin/client/survey',$data);
	}
	
}