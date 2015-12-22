<?php
class User_group extends My_Controller
{ 	
	
	/**
	 * store this controller page screen id.
	 *
	 * @var int
	 * @access private
	 */
	private $screen_id=3;
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('language');
		$this->load->helper('url');
		$this->load->library('session');
		
		$this->lang->load('user_group');
		$this->lang->load('main');
		
		$this->load->model('Setting_model','Setting_model',True);
		$this->load->model('User_group_model', 'User_group_model' , True);
		$this->load->model('Screen_model', 'Screen_model' , True);
		
		//---------- User Histroy ------------------//
		$this->load->model('User_history_model','User_history_model',True);
		//---------------------------------------------//		
		
		$this->load->view('admin/user_group/functions');
		
		
		if(!$this->session->userdata('user_session'))
		{
			redirect(base_url().$this->lang->lang()."/".ADMIN."/user/login");
		}
	}
	
	function index()
	{
		redirect(base_url().$this->lang->lang()."/".ADMIN."/user_group/table");
	}

	function form($id, $mode)
	{ 
		if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_view)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		}
		else if($mode=='add') {
			if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_add)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
			}
		} else if($mode=='edit') {
			if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_edit)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
			}
		}
		
		$data['screens'] = $this->Screen_model->get_all_screen(0);
        if($id!=0)
        {
			$data['user_group_row'] = $this->User_group_model->get_by_id($id);
        }
        $data['mode']= $mode;

        //-----------------------------------------------------------------
        $message_session=$this->session->userdata('message_session');
		if($message_session)
		{
        	$data['message']= $message_session;
        	$this->session->unset_userdata('message_session');
		}
        //-----------------------------------------------------------------
        
		if(isset($_POST['smt_save']))
		{
			if($id!=0)
			{
				if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_edit)) {
				redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
				}
				
				$data['user_group_row'] = $this->User_group_model->get_by_id($id);
				$last_modify_date=$data['user_group_row']->last_modify_date;
			}
			else
			{
				if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_add)) {
				redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
				}
				$last_modify_date='';
			}
			if($id!=0 && $_POST['last_modify_date']!=$last_modify_date)
			{ 
					$data['user_group_row'] = array(
								'id' => $id ,				               	
				               	'name' => $_POST['name'],
				            );
				                 
				            $data['error']= $this->lang->line('updated_by_another_user_error')."<a  href='".base_url().$this->lang->lang()."/".ADMIN."/user_group/form/$id/view' >".$this->lang->line('click_here_link')."</a>";
				            
				            $data['mode']= 'return';
							$this->load->view('admin/user_group/form',$data);
			}
			
				else if($this->name_redundency($id))
				{
					
					$data['user_group_row'] = array(
								'id' => $id ,				               	
				               	'name' => $_POST['name'],
				            );
				            
				         	$duplicated_id=$this->User_group_model->get_id_by_name($_POST['name']);
				            $data['error']= lang('name_redundency_error')."<a  href='".base_url().$this->lang->lang()."/".ADMIN."/user_group/form/$duplicated_id/view' >".$this->lang->line('click_here_link')."</a>";
				            
				            
				            $data['mode']= 'return';
							//$this->load->view('admin/user_group/form',$data);
				}
				else 
				{
						$dateTime = new DateTime(); 
						$current_date=$dateTime->format("Y-m-d H:i:s");
						
					        
							if($id==0)
							{
								$data = array(
				               		'name' => $_POST['name'],
									'deleted' => 0,
									'last_user_id' => $this->session->userdata('user_session')->id,
								   	'last_modify_date' =>$current_date,
					            );
								
								$this->User_group_model->insert($data);
								$id=$this->User_group_model->get_max_id();

								$inner_screens= $this->Screen_model->get_all_inner_screens();
								
								foreach ($inner_screens as $record)
								{
									$view=0;
									$add=0;
									$edit=0;
									$delete=0;
									$cancel=0;
									
									if(isset($_POST['chk_'.$record->id.'_view']))
									{
										$view=1;
									}
									if(isset($_POST['chk_'.$record->id.'_add']))
									{
										$add=1;
									}
									if(isset($_POST['chk_'.$record->id.'_edit']))
									{
										$edit=1;
									}
									if(isset($_POST['chk_'.$record->id.'_delete']))
									{
										$delete=1;
									}
									if(isset($_POST['chk_'.$record->id.'_cancel']))
									{
										$cancel=1;
									}
									
									$data_details = array(
					               'user_group_id' => $id ,
					               'screen_id' => $record->id ,
					               'view' => $view,
					               'add' => $add,
								   'edit' => $edit,
					               'delete' => $delete,
								   'cancel' => $cancel,
					            );
									
					            $this->User_group_model->insert_privielges($data_details);
					            
								}
								
								//----------User Histroy Row ------------------//
								$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,1,$current_date,$id);								
								//---------------------------------------------//
								
								$this->session->set_userdata('message_session',lang('saved_successfully'));
							}
							else 
							{
								$data = array(
				               		'name' => $_POST['name'],
									'last_user_id' => $this->session->userdata('user_session')->id,
								   	'last_modify_date' =>$current_date,
					            );
								
								$this->User_group_model->update($id,$data);
								
								
								$inner_screens= $this->Screen_model->get_all_inner_screens();
								
								foreach ($inner_screens as $record)
								{
									$view=0;
									$add=0;
									$edit=0;
									$delete=0;
									$cancel=0;
									
									if(isset($_POST['chk_'.$record->id.'_view']))
									{
										$view=1;
									}
									if(isset($_POST['chk_'.$record->id.'_add']))
									{
										$add=1;
									}
									if(isset($_POST['chk_'.$record->id.'_edit']))
									{
										$edit=1;
									}
									if(isset($_POST['chk_'.$record->id.'_delete']))
									{
										$delete=1;
									}
									if(isset($_POST['chk_'.$record->id.'_cancel']))
									{
										$cancel=1;
									}
									
									$data_details = array(
					               'user_group_id' => $id ,
					               'screen_id' => $record->id ,
					               'view' => $view,
					               'add' => $add,
								   'edit' => $edit,
					               'delete' => $delete,
								   'cancel' => $cancel,
					            );
									
					            $this->User_group_model->update_privielges($id, $record->id,$data_details);
					            
								}
								
								
								//----------User Histroy Row ------------------//
								$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);								
								//---------------------------------------------//
								
								$this->session->set_userdata('message_session',lang('saved_successfully'));
								
							}
							
							
							redirect(base_url().$this->lang->lang()."/".ADMIN."/user_group/form/$id/view");
				}
		}
        
		$this->load->view('admin/user_group/form',$data);
	}
	
	/*
	function table($order=null, $order_type=null)
	{
		$data['rows_count'] = $this->User_group_model->get_count();
		$data['user_groups'] = $this->User_group_model->get_all_display($order, $order_type); 
        
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$this->load->view('admin/user_group/table', $data);
	}
	*/
	
	function table($page=1, $order=null, $order_type=null)
	{
		if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_view)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		}
		
		$data['page']=$page;
		
		$rows_count = $this->User_group_model->get_count();
		$data['rows_count']=$rows_count;
		
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$per_page = $data['paging_no_of_pages'];
    	
		$start = ($page-1)*$per_page;

		$data['user_groups'] = $this->User_group_model->get_all_display_paging($start, $per_page, $order, $order_type); 
        
		
		$this->load->view("admin/user_group/table", $data);
	}
	
	function write_div_table_display_records($order=null, $order_type=null)
	{
		$data['user_groups'] = $this->User_group_model->get_all_display($order, $order_type);
		 
		$functions = new Functions();
		$link_to_screen=base_url().$this->lang->lang().'/user-group';
		return $functions->display_data_table($data['user_groups'],$link_to_screen,$this);
	}
	
	function delete($id)
	{
		if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_delete)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		}
		//$this->User_group_model->delete($id);		
		
		//----------User Histroy Row ------------------//
		$dateTime = new DateTime(); 
		$current_date=$dateTime->format("Y-m-d H:i:s");
		$data = array(
		'deleted' => 1,
		'last_user_id' => $this->session->userdata('user_session')->id,
		'last_modify_date' =>$current_date,
		);
								
		$this->User_group_model->update($id,$data);
		$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$id);								
		//---------------------------------------------//
		
		redirect(base_url().$this->lang->lang().'/'.ADMIN.'/user_group/index');
	}
	function submit_display()
	{
		if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_delete)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		}
		
		//if(isset($_POST['lnk_delete']))
		{
			if(isset($_POST['chk_current_row']))
			{
				$del=$_POST['chk_current_row'];
		    
				foreach($del as $del_id)
				{
					//----------User Histroy Row ------------------//
					$dateTime = new DateTime(); 
					$current_date=$dateTime->format("Y-m-d H:i:s");
					$data = array(
					'deleted' => 1,
					'last_user_id' => $this->session->userdata('user_session')->id,
					'last_modify_date' =>$current_date,
					);
											
					$this->User_group_model->update($del_id,$data);
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$del_id);								
					//---------------------------------------------//
		
				}
			}			
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/user_group/index');
		}
	}
	function name_redundency($id)
	{
		$name = $_POST['name'] ;
		$name_count=$this->User_group_model->get_count_by_name($id,$name);
		
			if($name_count>0)
			{
				return true;
			}

			return false;
	}
	
	function check_name_availability($id)
	{
		if(isset($_POST['name']))
		{
			$name=$_POST['name'];
			$name_count=$this->User_group_model->get_count_by_name($id,$name);
			if($name_count>0)
			{
					echo str_replace("###",$name, lang('name_not_available_error'));
			}
			else
			{
				echo 'OK';
			}
		}
		exit;
	}
	
	
}