<?php
/**
 * Menulink controller file.
 *
 * Contains controller class of the menu_link table.
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
 * Controller class of the menu_link table.
 *
 * This is the controller class of the menu_link table. between model and view, in MVC design pattern.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Menulink extends My_Controller
{ 	
	/**
	 * store this controller menulink screen id.
	 *
	 * @var int
	 * @access public
	 */
	public $screen_id=31;
	
	/**
	 * store this controller menu_link table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='menu_link';
	
	/**
	 * store table fields to display in table.
	 *
	 * @var string
	 * @access public
	 */
	public $table_fields_to_display=" id, controller_name, alias,  title,  title_ar, approved ";
	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_link_model', 'Menu_link_model' , True);
		$this->load->model('Page_model', 'Page_model' , True);
		$this->load->model('Industry_model', 'Industry_model' , True);
		$this->load->model('Solution_model', 'Solution_model' , True);
		$this->load->model('Media_section_category_model', 'Media_section_category_model' , True);
		
		
				
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
		redirect(base_url().$this->lang->lang()."/".ADMIN."/menulink/table");
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
		
		$rows_count = $this->Menu_link_model->get_count($this->table);
		$data['rows_count']=$rows_count;
		
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$per_page = $data['paging_no_of_pages'];
    	
		$start = ($page-1)*$per_page;

		$data['rows'] = $this->Menu_link_model->get_all_display_paging($this->table, $start, $per_page, $this->table_fields_to_display, $order, $order_type); 
        
		
		$this->load->view("admin/menu_link/table", $data);
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
								
		$this->Menu_link_model->update($this->table, $id, $data);
		$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$id);								
		//---------------------------------------------//
		
		redirect(base_url().$this->lang->lang().'/'.ADMIN.'/menulink/index');
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
											
					$this->Menu_link_model->update($this->table, $del_id, $data);
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$del_id);								
					//---------------------------------------------//
		
				}
			}			
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/menulink/index');
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
							
			$this->Menu_link_model->update($this->table, $id, $data);
			$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);						
			//---------------------------------------------//
			
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/menulink/index');
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
			$data['current_row'] = $this->Menu_link_model->get_by_id($this->table, $id);
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
				$data['current_row'] = $this->Menu_link_model->get_by_id($this->table, $id);
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

				
				
			 if($_FILES['icon']['name']!="") {
					$userfile_name = $_FILES['icon']['name']; // file name  
					$userfile_tmp  = $_FILES['icon']['tmp_name']; // actual location  
					$userfile_size  = $_FILES['icon']['size']; // file size  
					$userfile_type  = $_FILES['icon']['type']; // mime type of file sent by browser. PHP doesn't check it.  
					$userfile_error  = $_FILES['icon']['error'];
									
					$extension = end(explode('.', $_FILES['icon']['name']));
					/**
					 * Add award file, to solve conflict if i upload banner and award as image, will take
					 * same name.
					 */	
					$name_file_timestamp=strtotime($current_date).'award';
						
					$uplad_path_file=getcwd().'/added/uploads/menu/' . $name_file_timestamp.'.'.$extension;
				
					//if ($userfile_type!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
					if(move_uploaded_file($_FILES["icon"]["tmp_name"], $uplad_path_file))
					{
						
						if($id==0) {
							$icon = '/added/uploads/menu/'.$name_file_timestamp.'.'.$extension;
									
						} else {
								
						if($_FILES['icon']['name']!='') {
							
							$icon=$this->Menu_link_model->get_icon_by_id($this->table, $id);
							$icon_path=getcwd().$icon;
							if(isset($icon_path) && $icon_path!=getcwd()) {
							unlink($icon_path);
							}
							$icon = '/added/uploads/menu/'.$name_file_timestamp.'.'.$extension;
							
						} else {
							$icon = $this->Menu_link_model->get_icon_by_id($this->table, $id);;
						}
							
						}
					}
					
					
				}else {
					if($id==0) {
							$icon = '';
									
						} else { 
							$icon = $this->Menu_link_model->get_icon_by_id($this->table, $id);
						}
						}
				
				
				$data['current_row'] = array(
               	'parent_id' => $_POST['parent_id'] ,
               	'controller_name' => $_POST['controller_name'],
				'alias' => $_POST['alias'] ,
				'title' => $_POST['title'] ,
               	'title_ar' => $_POST['title_ar'],
				'menu_id' => $_POST['menu_id'] ,
				'icon' => $icon ,
				
				'approved' => $this->session->userdata('user_session')->admin,
				'deleted' => 0,
				'last_user_id' => $this->session->userdata('user_session')->id,
				'last_modify_date' =>$current_date,
				);
					        
				if($id==0){
					$this->Menu_link_model->insert($this->table, $data['current_row']);
					$id=$this->Menu_link_model->get_max_id($this->table);
					//----------User Histroy Row ------------------//
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,1,$current_date,$id);		
					//---------------------------------------------//
					$this->session->set_userdata('message_session',lang('saved_successfully'));
				} else {
					$this->Menu_link_model->update($this->table, $id, $data['current_row']);
					//----------User Histroy Row ------------------//
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);
					//---------------------------------------------//
					$this->session->set_userdata('message_session',lang('saved_successfully'));
				}
				redirect(base_url().$this->lang->lang()."/".ADMIN."/menulink/form/$id/view");
			}
		}
        
		$this->load->view('admin/menu_link/form',$data);
	}
	
	/**
	 * Method writealiaspopup.
	 * 
	 * Method used to change alias popup url, called from ajax. 
	 *
	 * @access	public
	 */
	public function writealiaspopup()
	{
		$controller_name=$_POST['controller_name'];
		if($controller_name !='') {
			echo "<a class='btn btn-primary' href='javascript:void(0)' onclick=\"PopupCenter('".base_url().$this->lang->lang()."/".ADMIN."/menulink/aliaspopup/$controller_name' , '".lang('select_alias')."',400,500);\" >::::</a>";
		} else {
			echo '';
		}
		exit;
	}
	
	/**
	 * Methos aliapopup to display popup for aliases.
	 * @access public
	 * @return boolean
	*/
	public function aliaspopup($controller_name)
	{
		 if($controller_name=='page') {
		 	$data['rows'] = $this->Page_model->get_all();
			$this->load->view('admin/menu_link/popup', $data);
		 }
		if($controller_name=='industry') {
		 	$data['rows'] = $this->Industry_model->get_all();
			$this->load->view('admin/menu_link/popup', $data);
		 }
		if($controller_name=='solution') {
		 	$data['rows'] = $this->Solution_model->get_all();
			$this->load->view('admin/menu_link/popup', $data);
		 }
		if($controller_name=='mediasectioncategory') {
		 	$data['rows'] = $this->Media_section_category_model->get_all();
			$this->load->view('admin/menu_link/popup', $data);
		 }
	}
	
	/**
	 * Methos childpopup to display popup for menu link childs.
	 * @access public
	 * @return boolean
	*/
	public function childpopup($id)
	{
		$data['menu_link_rows'] = $this->Menu_link_model->get_all_child($id);
		$this->load->view('admin/menu_link/childpopup', $data);
	}
	
}