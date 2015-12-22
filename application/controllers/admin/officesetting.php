<?php
/**
 * Officesetting controller file.
 *
 * Contains controller class of the office_setting table.
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
 * Controller class of the office_setting table.
 *
 * This is the controller class of the office table. between model and view, in MVC design pattern.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Officesetting extends My_Controller
{ 	
	/**
	 * store this controller office_setting screen id.
	 *
	 * @var int
	 * @access public
	 */
	public $screen_id=28;
	
	/**
	 * store this controller office_setting table name.
	 *
	 * @var string
	 * @access private
	 */
	private $table='office_setting';
	

	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Office_setting_model', 'Office_setting_model' , True);
		 
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
		redirect(base_url().$this->lang->lang()."/".ADMIN."/officesetting/form/1/edit");
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
			$data['current_row'] = $this->Office_setting_model->get_by_id($this->table, $id);
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
				$data['current_row'] = $this->Office_setting_model->get_by_id($this->table, $id);
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

				 if($_FILES['phone_icon']['name']!="") {
					$userfile_name = $_FILES['phone_icon']['name']; // file name  
					$userfile_tmp  = $_FILES['phone_icon']['tmp_name']; // actual location  
					$userfile_size  = $_FILES['phone_icon']['size']; // file size  
					$userfile_type  = $_FILES['phone_icon']['type']; // mime type of file sent by browser. PHP doesn't check it.  
					$userfile_error  = $_FILES['phone_icon']['error'];
									
					$extension = end(explode('.', $_FILES['phone_icon']['name']));
					/**
					 * Add award file, to solve conflict if i upload banner and award as image, will take
					 * same name.
					 */	
					$name_file_timestamp=strtotime($current_date).'phone_icon';
						
					$uplad_path_file=getcwd().'/added/uploads/office/' . $name_file_timestamp.'.'.$extension;
				
					//if ($userfile_type!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
					if(move_uploaded_file($_FILES["phone_icon"]["tmp_name"], $uplad_path_file))
					{
						
						if($id==0) {
							$phone_icon = '/added/uploads/office/'.$name_file_timestamp.'.'.$extension;
									
						} else {
								
						if($_FILES['phone_icon']['name']!='') {
							
							$phone_icon=$this->Office_setting_model->get_phone_icon_by_id($this->table, $id);
							$phone_icon_path=getcwd().$phone_icon;
							if(isset($phone_icon_path) && $phone_icon_path!=getcwd()) {
							unlink($phone_icon_path);
							}
							$phone_icon = '/added/uploads/office/'.$name_file_timestamp.'.'.$extension;
							
						} else {
							$phone_icon = $this->Office_setting_model->get_phone_icon_by_id($this->table, $id);;
						}
							
						}
					}
					
					
				}else {
					if($id==0) {
							$phone_icon = '';
									
						} else { 
							$phone_icon = $this->Office_setting_model->get_phone_icon_by_id($this->table, $id);
						}
						}
				
				
						
			if($_FILES['mobile_icon']['name']!="") {
					$userfile_name = $_FILES['mobile_icon']['name']; // file name  
					$userfile_tmp  = $_FILES['mobile_icon']['tmp_name']; // actual location  
					$userfile_size  = $_FILES['mobile_icon']['size']; // file size  
					$userfile_type  = $_FILES['mobile_icon']['type']; // mime type of file sent by browser. PHP doesn't check it.  
					$userfile_error  = $_FILES['mobile_icon']['error'];
									
					$extension = end(explode('.', $_FILES['mobile_icon']['name']));
					/**
					 * Add award file, to solve conflict if i upload banner and award as image, will take
					 * same name.
					 */	
					$name_file_timestamp=strtotime($current_date).'mobile_icon';
						
					$uplad_path_file=getcwd().'/added/uploads/office/' . $name_file_timestamp.'.'.$extension;
				
					//if ($userfile_type!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
					if(move_uploaded_file($_FILES["mobile_icon"]["tmp_name"], $uplad_path_file))
					{
						
						if($id==0) {
							$mobile_icon = '/added/uploads/office/'.$name_file_timestamp.'.'.$extension;
									
						} else {
								
						if($_FILES['mobile_icon']['name']!='') {
							
							$mobile_icon=$this->Office_setting_model->get_mobile_icon_by_id($this->table, $id);
							$mobile_icon_path=getcwd().$mobile_icon;
							if(isset($mobile_icon_path) && $mobile_icon_path!=getcwd()) {
							unlink($mobile_icon_path);
							}
							$mobile_icon = '/added/uploads/office/'.$name_file_timestamp.'.'.$extension;
							
						} else {
							$mobile_icon = $this->Office_setting_model->get_mobile_icon_by_id($this->table, $id);;
						}
							
						}
					}
					
					
				}else {
					if($id==0) {
							$mobile_icon = '';
									
						} else { 
							$mobile_icon = $this->Office_setting_model->get_mobile_icon_by_id($this->table, $id);
						}
						}
						
						
			if($_FILES['fax_icon']['name']!="") {
					$userfile_name = $_FILES['fax_icon']['name']; // file name  
					$userfile_tmp  = $_FILES['fax_icon']['tmp_name']; // actual location  
					$userfile_size  = $_FILES['fax_icon']['size']; // file size  
					$userfile_type  = $_FILES['fax_icon']['type']; // mime type of file sent by browser. PHP doesn't check it.  
					$userfile_error  = $_FILES['fax_icon']['error'];
									
					$extension = end(explode('.', $_FILES['fax_icon']['name']));
					/**
					 * Add award file, to solve conflict if i upload banner and award as image, will take
					 * same name.
					 */	
					$name_file_timestamp=strtotime($current_date).'fax_icon';
						
					$uplad_path_file=getcwd().'/added/uploads/office/' . $name_file_timestamp.'.'.$extension;
				
					//if ($userfile_type!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
					if(move_uploaded_file($_FILES["fax_icon"]["tmp_name"], $uplad_path_file))
					{
						
						if($id==0) {
							$fax_icon = '/added/uploads/office/'.$name_file_timestamp.'.'.$extension;
									
						} else {
								
						if($_FILES['fax_icon']['name']!='') {
							
							$fax_icon=$this->Office_setting_model->get_fax_icon_by_id($this->table, $id);
							$fax_icon_path=getcwd().$fax_icon;
							if(isset($fax_icon_path) && $fax_icon_path!=getcwd()) {
							unlink($fax_icon_path);
							}
							$fax_icon = '/added/uploads/office/'.$name_file_timestamp.'.'.$extension;
							
						} else {
							$fax_icon = $this->Office_setting_model->get_fax_icon_by_id($this->table, $id);;
						}
							
						}
					}
					
					
				}else {
					if($id==0) {
							$fax_icon = '';
									
						} else { 
							$fax_icon = $this->Office_setting_model->get_fax_icon_by_id($this->table, $id);
						}
						}
						
						
			if($_FILES['email_icon']['name']!="") {
					$userfile_name = $_FILES['email_icon']['name']; // file name  
					$userfile_tmp  = $_FILES['email_icon']['tmp_name']; // actual location  
					$userfile_size  = $_FILES['email_icon']['size']; // file size  
					$userfile_type  = $_FILES['email_icon']['type']; // mime type of file sent by browser. PHP doesn't check it.  
					$userfile_error  = $_FILES['email_icon']['error'];
									
					$extension = end(explode('.', $_FILES['email_icon']['name']));
					/**
					 * Add award file, to solve conflict if i upload banner and award as image, will take
					 * same name.
					 */	
					$name_file_timestamp=strtotime($current_date).'email_icon';
						
					$uplad_path_file=getcwd().'/added/uploads/office/' . $name_file_timestamp.'.'.$extension;
				
					//if ($userfile_type!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
					if(move_uploaded_file($_FILES["email_icon"]["tmp_name"], $uplad_path_file))
					{
						
						if($id==0) {
							$email_icon = '/added/uploads/office/'.$name_file_timestamp.'.'.$extension;
									
						} else {
								
						if($_FILES['email_icon']['name']!='') {
							
							$email_icon=$this->Office_setting_model->get_email_icon_by_id($this->table, $id);
							$email_icon_path=getcwd().$email_icon;
							if(isset($email_icon_path) && $email_icon_path!=getcwd()) {
							unlink($email_icon_path);
							}
							$email_icon = '/added/uploads/office/'.$name_file_timestamp.'.'.$extension;
							
						} else {
							$email_icon = $this->Office_setting_model->get_email_icon_by_id($this->table, $id);;
						}
							
						}
					}
					
					
				}else {
					if($id==0) {
							$email_icon = '';
									
						} else { 
							$email_icon = $this->Office_setting_model->get_email_icon_by_id($this->table, $id);
						}
						}
				
				
				$data['current_row'] = array(
               
              	'phone_icon' => $phone_icon ,
              	'mobile_icon' => $mobile_icon ,
				'fax_icon' => $fax_icon ,
				'email_icon' => $email_icon ,
				
				'approved' => $this->session->userdata('user_session')->admin,
				'deleted' => 0,
				'last_user_id' => $this->session->userdata('user_session')->id,
				'last_modify_date' =>$current_date,
				);
					        
				if($id==0){
					$this->Office_setting_model->insert($this->table, $data['current_row']);
					$id=$this->Office_setting_model->get_max_id($this->table);
					//----------User Histroy Row ------------------//
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,1,$current_date,$id);		
					//---------------------------------------------//
					$this->session->set_userdata('message_session',lang('saved_successfully'));
				} else {
					$this->Office_setting_model->update($this->table, $id, $data['current_row']);
					//----------User Histroy Row ------------------//
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);
					//---------------------------------------------//
					$this->session->set_userdata('message_session',lang('saved_successfully'));
				}
				redirect(base_url().$this->lang->lang()."/".ADMIN."/officesetting/form/$id/view");
			}
		}
        
		$this->load->view('admin/office_setting/form',$data);
	}
	
	
	
}