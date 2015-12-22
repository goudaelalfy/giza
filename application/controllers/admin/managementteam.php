<?php
/**
 * Managementteam controller file.
 *
 * Contains controller class of the management_team table.
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
 * Controller class of the management_team table.
 *
 * This is the controller class of the management_team table. between model and view, in MVC design pattern.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Managementteam extends My_Controller
{ 	
	/**
	 * store this controller management_team screen id.
	 *
	 * @var int
	 * @access public
	 */
	public $screen_id=23;
	
	/**
	 * store this controller management_team table name.
	 *
	 * @var string
	 * @access private
	 */
	private $table='management_team';
	
	/**
	 * store table fields to display in table.
	 *
	 * @var string
	 * @access private
	 */
	private $table_fields_to_display=" id,  alias, image_thumb_selected,  name, name_ar, sort, approved ";
	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Management_team_model', 'Management_team_model' , True);
		 
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
		redirect(base_url().$this->lang->lang()."/".ADMIN."/managementteam/table");
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
		
		$rows_count = $this->Management_team_model->get_count($this->table);
		$data['rows_count']=$rows_count;
		
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$per_page = $data['paging_no_of_pages'];
    	
		$start = ($page-1)*$per_page;
	
		if($order=='') {
			$order='sort';
		}
		$data['rows'] = $this->Management_team_model->get_all_display_paging($this->table, $start, $per_page, $this->table_fields_to_display, $order, $order_type); 
        
		
		$this->load->view("admin/management_team/table", $data);
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
								
		$this->Management_team_model->update($this->table, $id, $data);
		$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$id);								
		//---------------------------------------------//
		
		redirect(base_url().$this->lang->lang().'/'.ADMIN.'/managementteam/index');
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
											
					$this->Management_team_model->update($this->table, $del_id, $data);
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$del_id);								
					//---------------------------------------------//
		
				}
			}			
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/managementteam/index');
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
							
			$this->Management_team_model->update($this->table, $id, $data);
			$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);						
			//---------------------------------------------//
			
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/managementteam/index');
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
		$alias_count=$this->Management_team_model->get_count_by_alias($this->table,$id,$alias);
		
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
			$alias_count=$this->Management_team_model->get_count_by_alias($this->table,$id,$alias);
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
			$data['current_row'] = $this->Management_team_model->get_by_id($this->table, $id);
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
				$data['current_row'] = $this->Management_team_model->get_by_id($this->table, $id);
				$last_modify_date=$data['current_row']->last_modify_date;
			} else {
				if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_add)) {
				redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
				}
				$last_modify_date='';
			}
			if($this->alias_redundency($id)) {
					$data['current_row'] = array(
								'id' => $id ,
				               	'alias' => $_POST['alias'] ,
								'name' => $_POST['name'] ,
               					'name_ar' => $_POST['name_ar'],
				               	'title' => $_POST['title'] ,
				               	'title_ar' => $_POST['title_ar'],
								'seo_words' => $_POST['seo_words'] ,
				               	'seo_words_ar' => $_POST['seo_words_ar'] ,
				               	'brief' => $_POST['brief'],
								'brief_ar' => $_POST['brief_ar'] ,
				               	'body' => $_POST['body'],
								'body_ar' => $_POST['body_ar'] ,
				            );
				            
				         	$duplicated_id=$this->Management_team_model->get_id_by_alias($this->table,$_POST['alias']);
				            $data['error']= lang('alias_redundency_error')."<a  href='".base_url().$this->lang->lang()."/".ADMIN."/managementteam/form/$duplicated_id/view' >".$this->lang->line('click_here_link')."</a>";
				            
				            
				            $data['mode']= 'return';
				} else {
				$dateTime = new DateTime(); 
				$current_date=$dateTime->format("Y-m-d H:i:s");

				if($_FILES['image']['name']!='') {
					
				$userfile_name = $_FILES['image']['name']; // file name  
				$userfile_tmp  = $_FILES['image']['tmp_name']; // actual location  
				$userfile_size  = $_FILES['image']['size']; // file size  
				$userfile_type  = $_FILES['image']['type']; // mime type of file sent by browser. PHP doesn't check it.  
				$userfile_error  = $_FILES['image']['error'];
					
				$extension = end(explode('.', $_FILES['image']['name']));
		
				$name_file_timestamp=strtotime($current_date);
					
				$uplad_path_file=getcwd().'/added/uploads/management_team/' . $name_file_timestamp.'.'.$extension;
				
				//if ($userfile_type!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
				{
					if(move_uploaded_file($_FILES["image"]["tmp_name"], $uplad_path_file))
					{
						
						if($id==0) {
							$images = '/added/uploads/management_team/'.$name_file_timestamp.'.'.$extension;
							$image_thumbs= '/added/uploads/management_team/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							$image_selected = '/added/uploads/management_team/'.$name_file_timestamp.'.'.$extension;
							$image_thumb_selected= '/added/uploads/management_team/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							
						} else {
								
							if($_POST['hdn_image_thumbs']=='') {
							$image_thumbs = '/added/uploads/management_team/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							} else {
								$image_thumbs = $_POST['hdn_image_thumbs'].',,,'.'/added/uploads/management_team/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							}
							
							if($_POST['hdn_images']=='') {
								$images = '/added/uploads/management_team/'.$name_file_timestamp.'.'.$extension;
							} else {
								$images = $_POST['hdn_images'].',,,'.'/added/uploads/management_team/'.$name_file_timestamp.'.'.$extension;
							} 
							
							
							
							if(isset($_POST['are_current'])) {
							$image_selected = '/added/uploads/management_team/'.$name_file_timestamp.'.'.$extension;
							$image_thumb_selected= '/added/uploads/management_team/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							} else {
								if(isset($_POST['images'])) {
								$image_thumb_selected= $_POST['images'];
								$image_selected = str_replace('_thumb.','.',$image_thumb_selected);
								} else {
								$image_selected = '/added/uploads/management_team/'.$name_file_timestamp.'.'.$extension;
								$image_thumb_selected= '/added/uploads/management_team/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							
								}
							}
						}
					} else {
						
						
					}
					
				    $config['image_library'] = 'gd2';
					$config['source_image'] = $uplad_path_file;
					$config['create_thumb'] = TRUE;
					$config['maintain_ratio'] = TRUE;
					$config['width'] = 100;
					$config['height'] = 50;
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();       
				            							            
							            
							            
					}
					
				} else {
				 	if($id==0) {
							$image_thumbs = '';
							$images = '';
							$image_selected = '';
							$image_thumb_selected= '';
						} else {
							$image_thumbs = $_POST['hdn_image_thumbs'];
							$images = $_POST['hdn_images'];
							if(isset($_POST['images'])) {
							$image_thumb_selected= $_POST['images'];
							$image_selected = str_replace('_thumb.','.',$image_thumb_selected);
							} else {
							$image_selected = '';
							$image_thumb_selected= '';
							}
						}
				}
				
				/**
				 * Delete Banners selected.
				 */
				if(isset($_POST['chk_images_delete'])) {
					$del_images=$_POST['chk_images_delete'];
					foreach($del_images as $del_image) {
						
						$del_image_thumb_full_path=getcwd().$del_image;
						$del_image_full_path=str_replace('_thumb.','.',$del_image_thumb_full_path);
						
						$del_image_thumb=$del_image;
						$del_image=str_replace('_thumb.','.',$del_image_thumb);
						
						
						/**
						 * Un Set current image value if deleted. 
						 */
						if($del_image_thumb==$image_thumb_selected) {
							$image_selected = '';
							$image_thumb_selected= '';
						}
						
						
						if(file_exists($del_image_thumb_full_path)) {
							unlink($del_image_thumb_full_path);
						}
						if(file_exists($del_image_full_path)) {
							unlink($del_image_full_path);
						}
						
						if (strpos($image_thumbs, ',,,'.$del_image_thumb) !== false) {
							$image_thumbs=str_replace(',,,'.$del_image_thumb,'',$image_thumbs);
						} else {
							$image_thumbs=str_replace($del_image_thumb,'',$image_thumbs);
						}
						
						if (strpos($images, ',,,'.$del_image) !== false) {
							$images=str_replace(',,,'.$del_image,'',$images);
						} else {
							$images=str_replace($del_image,'',$images);
						}
						
						
						
					}
				}
				
				////////////////////////////////////////////////
				if($id==0)
				{
					$sort=$this->Management_team_model->get_max_sort()+1;
				} else {
					$sort=$this->Management_team_model->get_sort_by_id($id);
				}
				
				$data['current_row'] = array(
               	'alias' => $_POST['alias'] ,
               	'name' => $_POST['name'] ,
               	'name_ar' => $_POST['name_ar'],
				'title' => $_POST['title'] ,
               	'title_ar' => $_POST['title_ar'],
				'seo_words' => $_POST['seo_words'] ,
               	
				'image_thumbs' => $image_thumbs ,
               	'images' => $images,
				'image_thumb_selected' => $image_thumb_selected ,
				'image_selected' => $image_selected ,
               
				'seo_words_ar' => $_POST['seo_words_ar'] ,
               	'brief' => $_POST['brief'],
				'brief_ar' => $_POST['brief_ar'] ,
               	'body' => $_POST['body'],
				'body_ar' => $_POST['body_ar'] ,
				'sort' => $sort ,
              	
				'approved' => $this->session->userdata('user_session')->admin,
				'deleted' => 0,
				'last_user_id' => $this->session->userdata('user_session')->id,
				'last_modify_date' =>$current_date,
				);
					        
				if($id==0){
					$this->Management_team_model->insert($this->table, $data['current_row']);
					$id=$this->Management_team_model->get_max_id($this->table);
					//----------User Histroy Row ------------------//
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,1,$current_date,$id);		
					//---------------------------------------------//
					$this->session->set_userdata('message_session',lang('saved_successfully'));
				} else {
					$this->Management_team_model->update($this->table, $id, $data['current_row']);
					//----------User Histroy Row ------------------//
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);
					//---------------------------------------------//
					$this->session->set_userdata('message_session',lang('saved_successfully'));
				}
				redirect(base_url().$this->lang->lang()."/".ADMIN."/managementteam/form/$id/view");
			}
		}
        
		$this->load->view('admin/management_team/form',$data);
	}
	
	function sort($type, $id)
	{
		$row=$this->Management_team_model->get_by_id($this->table, $id);
		$sort=$row->sort;
		
		if($type=='up') {
			$rowbeforeafter=$this->Management_team_model->get_by_sort_less($sort);
			$rowbeforeafter_sort=$rowbeforeafter->sort;
			$rowbeforeafter_id=$rowbeforeafter->id;
			$rowbeforeafter_sort=$sort;
			$sort=$sort-1;	
			
			
		} else {
			
			$rowbeforeafter=$this->Management_team_model->get_by_sort_more($sort);
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
		
		$result=$this->Management_team_model->update($this->table, $id, $data);
		$result=$this->Management_team_model->update($this->table, $rowbeforeafter_id, $rowbeforeafter_data);
		redirect(base_url().$this->lang->lang().'/'.ADMIN.'/managementteam/index');
	}
}