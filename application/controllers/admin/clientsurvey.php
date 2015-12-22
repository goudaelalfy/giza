<?php
/**
 * Clientsurvey controller file.
 *
 * Contains controller class of the client_survey_question table.
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
 * Controller class of the client_survey_question table.
 *
 * This is the controller class of the client_survey_question table. between model and view, in MVC design pattern.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Clientsurvey extends My_Controller
{ 	
	/**
	 * store this controller clientsurvey screen id.
	 *
	 * @var int
	 * @access public
	 */
	public $screen_id=47;
	
	/**
	 * store this controller client_survey_question table name.
	 *
	 * @var string
	 * @access private
	 */
	private $table='client_survey_question';
	
	/**
	 * store table fields to display in table.
	 *
	 * @var string
	 * @access private
	 */
	private $table_fields_to_display=" id,  question, question_ar,  sort, approved ";
	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Client_survey_model', 'Client_survey_model' , True);
		 
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
		redirect(base_url().$this->lang->lang()."/".ADMIN."/clientsurvey/table");
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
		
		$rows_count = $this->Client_survey_model->get_count($this->table);
		$data['rows_count']=$rows_count;
		
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$per_page = $data['paging_no_of_pages'];
    	
		$start = ($page-1)*$per_page;

		if($order=='') {
			$order='sort';
		}
		
		$data['rows'] = $this->Client_survey_model->get_all_display_paging($this->table, $start, $per_page, $this->table_fields_to_display, $order, $order_type); 
        
		
		$this->load->view("admin/client_survey/table", $data);
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
								
		$this->Client_survey_model->update($this->table, $id, $data);
		$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$id);								
		//---------------------------------------------//
		
		redirect(base_url().$this->lang->lang().'/'.ADMIN.'/clientsurvey/index');
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
											
					$this->Client_survey_model->update($this->table, $del_id, $data);
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$del_id);								
					//---------------------------------------------//
		
				}
			}			
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/clientsurvey/index');
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
							
			$this->Client_survey_model->update($this->table, $id, $data);
			$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);						
			//---------------------------------------------//
			
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/clientsurvey/index');
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
		$alias_count=$this->Client_survey_model->get_count_by_alias($this->table,$id,$alias);
		
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
			$alias_count=$this->Client_survey_model->get_count_by_alias($this->table,$id,$alias);
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
		
		
		$data['answer_rows']=array();
		$data['answers_count']=0;
		
        if($id!=0){	
			$data['current_row'] = $this->Client_survey_model->get_by_id($this->table, $id);
			
        //------------------------ Answers ----------------------------------------
			$answer_rows = $this->Client_survey_model->get_answers_by_id($id);
			$data['answer_rows']=$answer_rows;
			$data['answers_count']=count($answer_rows);
			
			
			$arr_answers=array();
			foreach($answer_rows as $answer_row) {
				$arr_answers[$answer_row->id]=$answer_row->id;
			}
			$this->session->set_userdata('answers_session',$arr_answers);
					
		//-----------------------------------------------------------------------------------	
			
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
				$data['current_row'] = $this->Client_survey_model->get_by_id($this->table, $id);
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
				
				if($id==0)
				{
					$sort=$this->Client_survey_model->get_max_sort()+1;
				} else {
					$sort=$this->Client_survey_model->get_sort_by_id($id);
				}
				
				
				$data['current_row'] = array(
               	'question' => $_POST['question'] ,
               	'question_ar' => $_POST['question_ar'],
               	'answer_type' => $_POST['answer_type'],
				'page_no' => $_POST['page_no'] ,
              	'sort' => $sort ,
              	
				'approved' => $this->session->userdata('user_session')->admin,
				'deleted' => 0,
				'last_user_id' => $this->session->userdata('user_session')->id,
				'last_modify_date' =>$current_date,
				);
					        
				if($id==0){
					$this->Client_survey_model->insert($this->table, $data['current_row']);
					$id=$this->Client_survey_model->get_max_id($this->table);
					//----------User Histroy Row ------------------//
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,1,$current_date,$id);		
					//---------------------------------------------//
					$this->session->set_userdata('message_session',lang('saved_successfully'));
				} else {
					$this->Client_survey_model->update($this->table, $id, $data['current_row']);
					//----------User Histroy Row ------------------//
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);
					//---------------------------------------------//
					$this->session->set_userdata('message_session',lang('saved_successfully'));
				}
				
				///////////////////////Answers///////////////////
				$counter=1;
	    		$arr_answers_inputs = array();
				foreach($_POST AS $field => $value) {
					if($this->start_with($field,'answer_id_')) {
						
						//if(isset($_POST['answer_id_'.$counter])) {
							
							$counter=substr($field,10);
							if($_POST[$field]==0) {
							//$answer_data[]=array(
							$answer_data=array(
							'question_id' => $id,
							'name' => $_POST['answer_'.$counter],
							'name_ar' => $_POST['answer_ar_'.$counter],
							'sort' => $counter,
							'approved' => 1,
							'deleted' => 0,
							'last_user_id' => $this->session->userdata('user_session')->id,
							'last_modify_date' =>$current_date,
							);
							$this->Client_survey_model->insert_answer($answer_data);
							} else {
								$answer_id=$_POST['answer_id_'.$counter];
								$answer_data=array(
								'question_id' => $id,
								'name' => $_POST['answer_'.$counter],
								'name_ar' => $_POST['answer_ar_'.$counter],
								'sort' => $counter,
								'approved' => 1,
								'deleted' => 0,
								'last_user_id' => $this->session->userdata('user_session')->id,
								'last_modify_date' =>$current_date,
								);
								$this->Client_survey_model->update_answer($answer_id,$answer_data);
								
								//------------- Delete answer updated from session will deleted --------
								$arr_answers=$this->session->userdata('answers_session');
								if($arr_answers) {
									foreach($arr_answers as $key=>$value) {
										if($answer_id==$key) {
										unset($arr_answers[$key]);
										}
									}
								}
								$this->session->set_userdata('answers_session',$arr_answers);
								//----------------------------------------------------------------------
							}
						//}
						
						//$counter++;
					}
				}
				//----------- Delete answers -------------------------------
				$arr_answers=$this->session->userdata('answers_session');
				if($arr_answers) {
					foreach($arr_answers as $key=>$value) {
						$this->Client_survey_model->delete_answer_by_question_and_id($id,$value);
					}
				}
				$this->session->unset_userdata('answers_session');
				
				//---------------------------------------------------------
				
				////////////////////////////////////////////////
				
				
				redirect(base_url().$this->lang->lang()."/".ADMIN."/clientsurvey/form/$id/view");
			}
		}
        
		$this->load->view('admin/client_survey/form',$data);
	}
	
	function sort($type, $id)
	{
		$row=$this->Client_survey_model->get_by_id($this->table, $id);
		$sort=$row->sort;
		
		if($type=='up') {
			$rowbeforeafter=$this->Client_survey_model->get_by_sort_less($sort);
			$rowbeforeafter_sort=$rowbeforeafter->sort;
			$rowbeforeafter_id=$rowbeforeafter->id;
			$rowbeforeafter_sort=$sort;
			$sort=$sort-1;	
			
			
		} else {
			
			$rowbeforeafter=$this->Client_survey_model->get_by_sort_more($sort);
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
		
		$result=$this->Client_survey_model->update($this->table, $id, $data);
		$result=$this->Client_survey_model->update($this->table, $rowbeforeafter_id, $rowbeforeafter_data);
		redirect(base_url().$this->lang->lang().'/'.ADMIN.'/clientsurvey/index');
	}
	
}