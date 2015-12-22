<?php
class Menumap extends My_Controller
{ 	
	/**
	 * store this controller page screen id.
	 *
	 * @var int
	 * @access private
	 */
	private $screen_id=34;
	
	/**
	 * store this controller menu_map table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='menu_map';
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_map_model','Menu_map_model',True);	
	}
	
	function index()
	{
		redirect(base_url().$this->lang->lang().'/'.ADMIN.'/'."menumap/form/1/edit");
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
		
        $data['menu_map_rows'] = $this->Menu_map_model->get_all($this->table);
        
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
			
			if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_edit)) {
				redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
				}
			
						$dateTime = new DateTime(); 
						$current_date=$dateTime->format("Y-m-d H:i:s");
						
					      
								
					            $menu_map_rows = $this->Menu_map_model->get_all($this->table);
					            foreach($menu_map_rows as $menu_map_row) {
					            	
					            	$id=$menu_map_row->id;
					            	$menu_id=$_POST[$menu_map_row->code];					            	
					            	
					            	$data = array(
					            	'menu_id' => $menu_id,
									'approved' => $this->session->userdata('user_session')->admin,
									'deleted' => 0,
									'last_user_id' => $this->session->userdata('user_session')->id,
									'last_modify_date' =>$current_date,
					            	);
					            	
					            	$this->Menu_map_model->update($this->table,$id,$data);
					            }
					            
								
								$this->session->set_userdata('message_session',lang('saved_successfully'));
								
								//----------User Histroy Row ------------------//
								$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);								
								//---------------------------------------------//
								
							
							
							
							redirect(base_url().$this->lang->lang().'/'.ADMIN.'/'."menumap/form/$id/view");
		}
        
		$this->load->view('admin/menu_map/form',$data);
	}
	
	
}