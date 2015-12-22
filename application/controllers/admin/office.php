<?php
/**
 * Office controller file.
 *
 * Contains controller class of the office table.
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
 * Controller class of the office table.
 *
 * This is the controller class of the office table. between model and view, in MVC design pattern.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Office extends My_Controller
{ 	
	/**
	 * store this controller office screen id.
	 *
	 * @var int
	 * @access public
	 */
	public $screen_id=25;
	
	/**
	 * store this controller office table name.
	 *
	 * @var string
	 * @access private
	 */
	private $table='office';
	
	/**
	 * store table fields to display in table.
	 *
	 * @var string
	 * @access private
	 */
	private $table_fields_to_display=" id,  location, location_ar,  address, address_ar, sort, approved ";
	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Office_model', 'Office_model' , True);
		 
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
		redirect(base_url().$this->lang->lang()."/".ADMIN."/office/table");
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
		
		$rows_count = $this->Office_model->get_count($this->table);
		$data['rows_count']=$rows_count;
		
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$per_page = $data['paging_no_of_pages'];
    	
		$start = ($page-1)*$per_page;

		if($order=='') {
			$order='sort';
		}
		$data['rows'] = $this->Office_model->get_all_display_paging($this->table, $start, $per_page, $this->table_fields_to_display, $order, $order_type); 
        
		
		$this->load->view("admin/office/table", $data);
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
								
		$this->Office_model->update($this->table, $id, $data);
		$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$id);								
		//---------------------------------------------//
		
		redirect(base_url().$this->lang->lang().'/'.ADMIN.'/office/index');
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
											
					$this->Office_model->update($this->table, $del_id, $data);
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$del_id);								
					//---------------------------------------------//
		
				}
			}			
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/office/index');
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
							
			$this->Office_model->update($this->table, $id, $data);
			$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);						
			//---------------------------------------------//
			
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/office/index');
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
		$alias_count=$this->Office_model->get_count_by_alias($this->table,$id,$alias);
		
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
			$alias_count=$this->Office_model->get_count_by_alias($this->table,$id,$alias);
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
			$data['current_row'] = $this->Office_model->get_by_id($this->table, $id);
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
				$data['current_row'] = $this->Office_model->get_by_id($this->table, $id);
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
				
						///////////////////////Phones///////////////////
			    		$phones='';
	    				$counter=0;
						foreach($_POST AS $field => $value) {
							if($this->start_with($field,'phone')){
								if($counter>0 && $value!=''){
									$phones=$phones.',';
								}
								if($value!=''){
							  		$phones=$phones.$value;
							  		$counter=$counter+1;
								}
							}
						} 
						////////////////////////////////////////////////						
						///////////////////////Mobiles///////////////////
			    		$mobiles='';
	    				$counter=0;
						foreach($_POST AS $field => $value) {
							if($this->start_with($field,'mobile')){
								if($counter>0 && $value!=''){
									$mobiles=$mobiles.',';
								}
								if($value!=''){
							  		$mobiles=$mobiles.$value;
							  		$counter=$counter+1;
								}
							}
						} 
						////////////////////////////////////////////////	

						
						///////////////////////Faxes///////////////////
			    		$faxes='';
	    				$counter=0;
						foreach($_POST AS $field => $value) {
							if($this->start_with($field,'fax')){
								if($counter>0 && $value!=''){
									$faxes=$faxes.',';
								}
								if($value!=''){
							  		$faxes=$faxes.$value;
							  		$counter=$counter+1;
								}
							}
						} 
						////////////////////////////////////////////////
						
						///////////////////////Emails///////////////////
			    		$emails='';
	    				$counter=0;
						foreach($_POST AS $field => $value) {
							if($this->start_with($field,'email')) {
								if($counter>0 && $value!='') {
									$emails=$emails.',';
								}
								if($value!=''){
						  			$emails=$emails.$value;
						  			$counter=$counter+1;
								}
							}
						}
						////////////////////////////////////////////////
				
				
				if($id==0)
				{
					$sort=$this->Office_model->get_max_sort()+1;
				} else {
					$sort=$this->Office_model->get_sort_by_id($id);
				}
				
				$data['current_row'] = array(
               	'location' => $_POST['location'] ,
               	'location_ar' => $_POST['location_ar'],
               	'address' => $_POST['address'],
				'address_ar' => $_POST['address_ar'] ,
              	'phones' => $phones ,
              	'mobiles' => $mobiles ,
				'faxes' => $faxes ,
				'website' => $_POST['website'] ,
				'country_id' => $_POST['country_id'] ,
				
				'emails' => $emails ,
				'sort' => $sort ,
				
				'approved' => $this->session->userdata('user_session')->admin,
				'deleted' => 0,
				'last_user_id' => $this->session->userdata('user_session')->id,
				'last_modify_date' =>$current_date,
				);
					        
				if($id==0){
					$this->Office_model->insert($this->table, $data['current_row']);
					$id=$this->Office_model->get_max_id($this->table);
					//----------User Histroy Row ------------------//
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,1,$current_date,$id);		
					//---------------------------------------------//
					$this->session->set_userdata('message_session',lang('saved_successfully'));
				} else {
					$this->Office_model->update($this->table, $id, $data['current_row']);
					//----------User Histroy Row ------------------//
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);
					//---------------------------------------------//
					$this->session->set_userdata('message_session',lang('saved_successfully'));
				}
				redirect(base_url().$this->lang->lang()."/".ADMIN."/office/form/$id/view");
			}
		}
        
		$this->load->view('admin/office/form',$data);
	}
	
function sort($type, $id)
	{
		$row=$this->Office_model->get_by_id($this->table, $id);
		$sort=$row->sort;
		
		if($type=='up') {
			$rowbeforeafter=$this->Office_model->get_by_sort_less($sort);
			$rowbeforeafter_sort=$rowbeforeafter->sort;
			$rowbeforeafter_id=$rowbeforeafter->id;
			$rowbeforeafter_sort=$sort;
			$sort=$sort-1;	
			
			
		} else {
			
			$rowbeforeafter=$this->Office_model->get_by_sort_more($sort);
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
		
		$result=$this->Office_model->update($this->table, $id, $data);
		$result=$this->Office_model->update($this->table, $rowbeforeafter_id, $rowbeforeafter_data);
		redirect(base_url().$this->lang->lang().'/'.ADMIN.'/office/index');

	}
	
	
}