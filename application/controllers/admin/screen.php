<?php
class Screen extends CI_Controller
{ 	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('language');
		$this->load->helper('url');
		$this->load->library('session');
		
		$this->lang->load('screen');
		
		$this->load->model('Setting_model','Setting_model',True);
		$this->load->model('Screen_model', 'Screen_model' , True);

		//---------- User Histroy ------------------//
		$this->load->model('User_history_model','User_history_model',True);
		//---------------------------------------------//		
		
		$this->load->view('admin/screen/functions');
		
		if(!$this->session->userdata('user_session'))
		{
			redirect(base_url().$this->lang->lang()."/admin/user/login");
		}
	}
	
	function index()
	{
		redirect(base_url().$this->lang->lang()."/admin/screen/table");
	}

	function form($id, $mode)
	{ 
        if($id!=0)
        {
			$data['screen_row'] = $this->Screen_model->get_by_id($id);
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
				$data['screen_row'] = $this->Screen_model->get_by_id($id);
				$last_modify_date=$data['screen_row']->last_modify_date;
			}
			else
			{
				$last_modify_date='';
			}
			if($id!=0 && $_POST['last_modify_date']!=$last_modify_date)
			{ 
					$data['screen_row'] = array(
								'id' => $id ,
								'code' => $_POST['code'],				               	
				               	'name' => $_POST['name'],
								'name_ar' => $_POST['name_ar'],				               	
				               	'url' => $_POST['url'],
								'parent_id' => $_POST['parent_id'],
				            );
				                 
				            $data['error']= $this->lang->line('updated_by_another_user_error')."<a  href='".base_url().$this->lang->lang()."/admin/screen/form/$id/view' >".$this->lang->line('click_here_link')."</a>";
				            
				            $data['mode']= 'return';
							$this->load->view('admin/screen/form',$data);
			}
			
				else if($this->code_redundency($id))
				{
					
					$data['screen_row'] = array(
								'id' => $id ,				               	
				               	'code' => $_POST['code'],				               	
				               	'name' => $_POST['name'],
								'name_ar' => $_POST['name_ar'],				               	
				               	'url' => $_POST['url'],
								'parent_id' => $_POST['parent_id'],
				            );
				            
				         	$duplicated_id=$this->Screen_model->get_id_by_code($_POST['code']);
				            $data['error']= lang('code_redundency_error')."<a  href='".base_url().$this->lang->lang()."/admin/screen/form/$duplicated_id/view' >".$this->lang->line('click_here_link')."</a>";
				            
				            
				            $data['mode']= 'return';
				}
				else 
				{
						$dateTime = new DateTime(); 
						$current_date=$dateTime->format("Y-m-d H:i:s");
						
					        
							if($id==0)
							{
								$data = array(
				               		'code' => $_POST['code'],				               	
				               		'name' => $_POST['name'],
									'name_ar' => $_POST['name_ar'],				               	
				               		'url' => $_POST['url'],
									'parent_id' => $_POST['parent_id'],
									'deleted' => 0,
									'last_user_id' => $this->session->userdata('user_session')->id,
								   	'last_modify_date' =>$current_date,
					            );
								
								$this->Screen_model->insert($data);
								$id=$this->Screen_model->get_max_id();

								//----------User Histroy Row ------------------//
								$this->User_history_model->insert($this->session->userdata('user_session')->id,5,1,$current_date,$id);								
								//---------------------------------------------//
								
								$this->session->set_userdata('message_session',lang('saved_successfully'));
							}
							else 
							{
								$data = array(
				               		'code' => $_POST['code'],				               	
				               		'name' => $_POST['name'],
									'name_ar' => $_POST['name_ar'],				               	
				               		'url' => $_POST['url'],
									'parent_id' => $_POST['parent_id'],
									'last_user_id' => $this->session->userdata('user_session')->id,
								   	'last_modify_date' =>$current_date,
					            );
								
								$this->Screen_model->update($id,$data);
								
								//----------User Histroy Row ------------------//
								$this->User_history_model->insert($this->session->userdata('user_session')->id,5,2,$current_date,$id);								
								//---------------------------------------------//
								
								$this->session->set_userdata('message_session',lang('saved_successfully'));
								
							}
							
							
							redirect(base_url().$this->lang->lang()."/admin/screen/form/$id/view");
				}
		}
        
		$this->load->view('admin/screen/form',$data);
	}
	
	function table($order=null, $order_type=null)
	{
		$data['rows_count'] = $this->Screen_model->get_count();
		$data['screens'] = $this->Screen_model->get_all_display($order, $order_type); 
        
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$this->load->view('admin/screen/table', $data);
	}
	
	function table_paging($order=null, $order_type=null)
	{
		$rows_count = $this->Screen_model->get_count();
		$data['rows_count']=$rows_count;
		
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$per_page = $data['paging_no_of_pages'];
		if(isset($_GET['page']))
    	$page = $_GET['page'];
		$start = ($page-1)*$per_page;

		$data['screens'] = $this->Screen_model->get_all_display_paging($start, $per_page, $order, $order_type); 
        
		
		$functions = new Functions();
		$link_to_screen=base_url().$this->lang->lang().'/screen';
		
		return $functions->display_data_table($data['screens'],$link_to_screen,$this);
	}
	
	function write_div_table_display_records($order=null, $order_type=null)
	{
		$data['screens'] = $this->Screen_model->get_all_display($order, $order_type);
		 
		$functions = new Functions();
		$link_to_screen=base_url().$this->lang->lang().'/screen';
		return $functions->display_data_table($data['screens'],$link_to_screen,$this);
	}
	
	function delete($id)
	{
		//$this->Screen_model->delete($id);		
		
		//----------User Histroy Row ------------------//
		$dateTime = new DateTime(); 
		$current_date=$dateTime->format("Y-m-d H:i:s");
		$data = array(
		'deleted' => 1,
		'last_user_id' => $this->session->userdata('user_session')->id,
		'last_modify_date' =>$current_date,
		);
								
		$this->Screen_model->update($id,$data);
		$this->User_history_model->insert($this->session->userdata('user_session')->id,5,3,$current_date,$id);								
		//---------------------------------------------//
		
		redirect(base_url().$this->lang->lang().'/admin/screen/index');
	}
	function submit_display()
	{
		//if(isset($_POST['lnk_delete']))
		{
			if(isset($_POST['chk_current_row']))
			{
				$del=$_POST['chk_current_row'];
		    
				foreach($del as $del_id)
				{
					$this->Screen_model->delete($del_id);
				}
			}			
			redirect(base_url().$this->lang->lang().'/admin/screen/index');
		}
	}
	function code_redundency($id)
	{
		$code = $_POST['code'] ;
		$code_count=$this->Screen_model->get_count_by_code($id,$code);
		
			if($code_count>0)
			{
				return true;
			}

			return false;
	}
	
	function check_code_availability($id)
	{
		if(isset($_POST['code']))
		{
			$code=$_POST['code'];
			$code_count=$this->Screen_model->get_count_by_code($id,$code);
			if($code_count>0)
			{
					echo str_replace("###",$code, lang('code_not_available_error'));
			}
			else
			{
				echo 'OK';
			}
		}
		exit;
	}
	
	
}