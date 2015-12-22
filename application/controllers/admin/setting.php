<?php
class Setting extends My_Controller
{ 	
	/**
	 * store this controller page screen id.
	 *
	 * @var int
	 * @access private
	 */
	private $screen_id=6;
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('language');
		$this->load->helper('url');
		$this->load->library('session');
		
		$this->lang->load('setting');
		$this->lang->load('main');
		
		
		$this->load->model('Setting_model','Setting_model',True);
				
		//---------- User Histroy ------------------//
		$this->load->model('User_history_model','User_history_model',True);
		//---------------------------------------------//		
		
				
		if(!$this->session->userdata('user_session'))
		{
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/'."user/login");
		}
	}
	
	function index()
	{
		redirect(base_url().$this->lang->lang().'/'.ADMIN.'/'."setting/form/1/edit");
	}
	
	function form($id, $mode)
	{ 
		if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_view)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		} else if($mode=='edit') {
			if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_edit)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
			}
		}
		
        if($id!=0)
        {
			$data['setting_row'] = $this->Setting_model->get_by_id($id);
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
				
				$data['setting_row'] = $this->Setting_model->get_by_id($id);
				$last_modify_date=$data['setting_row']->last_modify_date;
			}
			else
			{
				$last_modify_date='';
			}
			if($id!=0 && $_POST['last_modify_date']!=$last_modify_date)
			{ 
					$data['setting_row'] = array(
								'id' => $id ,				               	
				               	'paging_no_of_pages' => $_POST['paging_no_of_pages'],
				            );
				                 
				            $data['error']= $this->lang->line('updated_by_another_user_error')."<a  href='".base_url().$this->lang->lang()."/admin/setting/form/$id/view' >".$this->lang->line('click_here_link')."</a>";
				            
				            $data['mode']= 'return';
							$this->load->view('admin/setting/form',$data);
			}
			else 
				{
						$dateTime = new DateTime(); 
						$current_date=$dateTime->format("Y-m-d H:i:s");
						
					        
							if($id==0)
							{
								$data = array(
									'last_user_id' => 1,
								   	'last_modify_date' =>$current_date,
					            );
								
								$this->Setting_model->insert($data);
								
								$id=$this->Setting_model->get_max_id();

								$this->session->set_userdata('message_session',lang('saved_successfully'));
							}
							else 
							{
								$data = array(
				               		'paging_no_of_pages' => $_POST['paging_no_of_pages'],
									'last_user_id' => 1,
								   	'last_modify_date' =>$current_date,
					            );
								
								$this->Setting_model->update($id,$data);
								$this->session->set_userdata('message_session',lang('saved_successfully'));
								
								//----------User Histroy Row ------------------//
								$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);								
								//---------------------------------------------//
								
							}
							
							
							redirect(base_url().$this->lang->lang().'/'.ADMIN.'/'."setting/form/$id/view");
				}
		}
        
		$this->load->view('admin/setting/form',$data);
	}
	
	
}