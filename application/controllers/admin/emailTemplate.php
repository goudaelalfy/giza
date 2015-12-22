<?php
/**
 * Techworld Dalil.
 * 
 * Dalil web application serve our clients, check number availability and website guide.
 * 
 * @copyright @ Techworld
 * @author gouda <goudaelalfy@hotmail.com>
 * @link www.tech-world.ws
 */

//-----------------------------------------------------------

/**
 * Techworld User Group controller calss.
 * 
 * This class contains methods of user entity as controller between model and view.
 *  
 * @author gouda
 * @package UMS
 *
 */
class EmailTemplate extends MY_Controller
{ 	
	
	/**
	 * store this controller page screen id.
	 *
	 * @var int
	 * @access private
	 */
	public $screen_id=39;
	
	/**
	 * store this controller gateway table name.
	 *
	 * @var string
	 * @access private
	 */
	private $table='email_template';
	
	/**
	 * store table fields to display in table.
	 *
	 * @var string
	 * @access private
	 */
	private $table_fields_to_display="`id`, purpose`,  `subject`, `active` ";
	
	
	/**
	 * Constructor
	 * 
	 * Load language file, models needed in the class, and other libraries used after that in the class.
	 * 
	 * @access public
	 * @return boolean
	 */
	function __construct()
	{
		parent::__construct();

		$this->load->model('Email_template_model', 'Email_template_model' , True);
	}
	
	/**
	 * Default method of controller which called by default, if there is no other method passed through URL.
	 * 
	 * @access public
	 * @return boolean
	 */
	function index()
	{
		redirect(base_url().$this->lang->lang()."/".ADMIN."/emailTemplate/table");
	}
	
	/**
	 * Method form.
	 * 
	 * method to save or display current.
	 * @access public
	 * @param int id
	 * @param string mode of current record (new, edit, return)
	 * @return boolean 
	 */
	function form($id, $mode)
	{ 
        if($id!=0) {
			$data['current_row'] = $this->Email_template_model->get_by_id($this->table, $id);
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
				$data['current_row'] = $this->Email_template_model->get_by_id($this->table, $id);
				$last_modify_date=$data['current_row']->last_modify_date;
			} else {
				$last_modify_date='';
			}
			
						$dateTime = new DateTime(); 
						$current_date=$dateTime->format("Y-m-d H:i:s");
						
						if(isset($_POST['active'])) {
							$active=1;
						} else {
							$active=0;
						}
			
						
						$data = array(
				               		'subject' => $_POST['subject'],
									'body' => $_POST['body'],
									//'sms' => $_POST['sms'],
									'active' => $active ,
									'deleted' => 0,
									'last_user_id' => $this->session->userdata('user_session')->id,
								   	'last_modify_date' =>$current_date,
					            );
					        
							if($id==0) {
								
								
								$this->Email_template_model->insert($this->table, $data);
								$id=$this->Email_template_model->get_max_id($this->table);
								
								//----------User Histroy Row ------------------//
								$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,1,$current_date,$id);								
								//---------------------------------------------//
								
								$this->session->set_userdata('message_session',lang('saved_successfully'));
							} else {
								
								$this->Email_template_model->update($this->table, $id,$data);
								
								//----------User Histroy Row ------------------//
								$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);								
								//---------------------------------------------//
								
								$this->session->set_userdata('message_session',lang('saved_successfully'));
							}
							
					redirect(base_url().$this->lang->lang()."/".ADMIN."/emailTemplate/form/$id/view");
				
		}
        
		$this->load->view('admin/email_template/form',$data);
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
		
		$rows_count = $this->Email_template_model->get_count($this->table);
		$data['rows_count']=$rows_count;
		
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$per_page = $data['paging_no_of_pages'];
    	
		$start = ($page-1)*$per_page;

		$data['rows'] = $this->Email_template_model->get_all_display_paging($this->table, $start, $per_page, $this->table_fields_to_display,  $order, $order_type); 
        
		
		$this->load->view("admin/email_template/table", $data);
	}
	
	/**
	 * Method delete.
	 * 
	 * method to put deleted falg=1.
	 * @access public
	 * @param int id
	 * @return boolean 
	 */
	function delete($id)
	{
		//$this->Email_template_model->delete($id);		
		
		//----------User Histroy Row ------------------//
		$dateTime = new DateTime(); 
		$current_date=$dateTime->format("Y-m-d H:i:s");
		$data = array(
		'deleted' => 1,
		'last_user_id' => $this->session->userdata('user_session')->id,
		'last_modify_date' =>$current_date,
		);
								
		$this->Email_template_model->update($id,$data);
		$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$id);								
		//---------------------------------------------//
		
		redirect(base_url().$this->lang->lang().'/'.ADMIN.'/emailTemplate/index');
	}
	
	/**
	 * Method submit display.
	 * 
	 * method  which rows table form redirect.
	 * @access public
	 * @return boolean 
	 */
	function submit_display()
	{
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
											
					$this->Email_template_model->update($del_id,$data);
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$del_id);								
					//---------------------------------------------//
				}
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/emailTemplate/index');
		}
	}
	
	/**
	 * Method name redundency.
	 * 
	 * method  check if name exist in database or not.
	 * @access public
	 * @param int id, to ignore when update record
	 * @return boolean 
	 */
	function name_redundency($id)
	{
		$name = $_POST['name'] ;
		$name_count=$this->Email_template_model->get_count_by_name($id,$name);
		
			if($name_count>0) {
				return true;
			}

			return false;
	}
	
	/**
	 * Method name availability.
	 * 
	 * method  check if name exist in database or not, this method used through ajax.
	 * @access public
	 * @param int id, to ignore when update record
	 * @return boolean 
	 */
	function check_name_availability($id)
	{
		if(isset($_POST['name'])) {
			$name=$_POST['name'];
			$name_count=$this->Email_template_model->get_count_by_name($id,$name);
			if($name_count>0) {
					echo str_replace("###",$name, lang('name_not_available_error'));
			} else {
				echo 'OK';
			}
		}
		exit;
	}
	
	/**
	 * Method active for ajax.
	 * 
	 * method to put active falg=1 or 0.
	 * @access public
	 * @param int id
	 * @return boolean 
	 */
	public function active($active=0)
	{
		$id=$_POST['email_template_id'];
		
		if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_edit)) {
			echo lang('cannot_deactive_current_user');
			exit;
		}
		
			
		//----------User Histroy Row ------------------//
		$dateTime = new DateTime(); 
		$current_date=$dateTime->format("Y-m-d H:i:s");
		$data = array(
		'active' => $active,
		'last_user_id' => $this->session->userdata('user_session')->id,
		'last_modify_date' =>$current_date,
		);
								
		$this->Email_template_model->update($this->table, $id,$data);
		$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);								
		//---------------------------------------------//
		
		if($active==0) {
			echo"<a href='javascript:void();' id='$id' class='hrf_unactive_class' ><i class='icon iconfugue16-cross'></i></a>";
		} else {
			echo"<a href='javascript:void();' id='$id' class='hrf_active_class' ><i class='icon iconfugue16-tick'></i></a>";
		}
		exit;
		
		
	}
	
	
}