<?php
/**
 * Mediasection controller file.
 *
 * Contains controller class of the media_section table.
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
 * Controller class of the media_section table.
 *
 * This is the controller class of the media_section table. between model and view, in MVC design pattern.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Mediasection extends My_Controller
{ 	
	/**
	 * store this controller media_section screen id.
	 *
	 * @var int
	 * @access public
	 */
	public $screen_id=14;
	
	/**
	 * store this controller media_section table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='media_section';
	
	/**
	 * store table fields to display in table.
	 *
	 * @var string
	 * @access private
	 */
	private $table_fields_to_display=" id,  alias, banner_image_thumb_selected,  title,  title_ar, approved ";
	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Media_section_model', 'Media_section_model' , True);
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
		redirect(base_url().$this->lang->lang()."/".ADMIN."/mediasection/table");
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
		
		$rows_count = $this->Media_section_model->get_count($this->table);
		$data['rows_count']=$rows_count;
		
		$settings = $this->Setting_model->get_all();
		$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		
		$per_page = $data['paging_no_of_pages'];
    	
		$start = ($page-1)*$per_page;

		$data['rows'] = $this->Media_section_model->get_all_display_paging($this->table, $start, $per_page, $this->table_fields_to_display, $order, $order_type); 
        
		
		$this->load->view("admin/media_section/table", $data);
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
								
		$this->Media_section_model->update($this->table, $id, $data);
		$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$id);								
		//---------------------------------------------//
		
		redirect(base_url().$this->lang->lang().'/'.ADMIN.'/mediasection/index');
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
											
					$this->Media_section_model->update($this->table, $del_id, $data);
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,3,$current_date,$del_id);								
					//---------------------------------------------//
		
				}
			}			
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/mediasection/index');
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
							
			$this->Media_section_model->update($this->table, $id, $data);
			$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);						
			//---------------------------------------------//
			
			redirect(base_url().$this->lang->lang().'/'.ADMIN.'/mediasection/index');
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
		$alias_count=$this->Media_section_model->get_count_by_alias($this->table,$id,$alias);
		
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
			$alias_count=$this->Media_section_model->get_count_by_alias($this->table,$id,$alias);
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
			$data['current_row'] = $this->Media_section_model->get_by_id($this->table, $id);
		
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
				$data['current_row'] = $this->Media_section_model->get_by_id($this->table, $id);
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
								'media_section_category_id' => $_POST['media_section_category_id'] ,
				               	'alias' => $_POST['alias'] ,
				               	'title' => $_POST['title'] ,
				               	'title_ar' => $_POST['title_ar'],
								'seo_words' => $_POST['seo_words'] ,
				               	'seo_words_ar' => $_POST['seo_words_ar'] ,
				               	'brief' => $_POST['brief'],
								'brief_ar' => $_POST['brief_ar'] ,
				               	'body' => $_POST['body'],
								'body_ar' => $_POST['body_ar'] ,
				            );
				            
				         	$duplicated_id=$this->Media_section_model->get_id_by_alias($this->table,$_POST['alias']);
				            $data['error']= lang('alias_redundency_error')."<a  href='".base_url().$this->lang->lang()."/".ADMIN."/mediasection/form/$duplicated_id/view' >".$this->lang->line('click_here_link')."</a>";
				            
				            
				            $data['mode']= 'return';
				} else {
				$dateTime = new DateTime(); 
				$current_date=$dateTime->format("Y-m-d H:i:s");

				if($_FILES['banner_file']['name']!='') {
					
				$userfile_name = $_FILES['banner_file']['name']; // file name  
				$userfile_tmp  = $_FILES['banner_file']['tmp_name']; // actual location  
				$userfile_size  = $_FILES['banner_file']['size']; // file size  
				$userfile_type  = $_FILES['banner_file']['type']; // mime type of file sent by browser. PHP doesn't check it.  
				$userfile_error  = $_FILES['banner_file']['error'];
					
				$extension = end(explode('.', $_FILES['banner_file']['name']));
		
				$name_file_timestamp=strtotime($current_date);
					
				$uplad_path_file=getcwd().'/added/uploads/banner/media_section/' . $name_file_timestamp.'.'.$extension;
				
				//if ($userfile_type!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
				{
					if(move_uploaded_file($_FILES["banner_file"]["tmp_name"], $uplad_path_file))
					{
						
						if($id==0) {
							$banner_files = '/added/uploads/banner/media_section/'.$name_file_timestamp.'.'.$extension;
							$banner_image_thumbs= '/added/uploads/banner/media_section/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							$banner_file_selected = '/added/uploads/banner/media_section/'.$name_file_timestamp.'.'.$extension;
							$banner_image_thumb_selected= '/added/uploads/banner/media_section/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							
						} else {
								
							if($_POST['hdn_banner_image_thumbs']=='') {
							$banner_image_thumbs = '/added/uploads/banner/media_section/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							} else {
								$banner_image_thumbs = $_POST['hdn_banner_image_thumbs'].',,,'.'/added/uploads/banner/media_section/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							}
							
							if($_POST['hdn_banner_files']=='') {
								$banner_files = '/added/uploads/banner/media_section/'.$name_file_timestamp.'.'.$extension;
							} else {
								$banner_files = $_POST['hdn_banner_files'].',,,'.'/added/uploads/banner/media_section/'.$name_file_timestamp.'.'.$extension;
							} 
							
							
							
							if(isset($_POST['are_current'])) {
							$banner_file_selected = '/added/uploads/banner/media_section/'.$name_file_timestamp.'.'.$extension;
							$banner_image_thumb_selected= '/added/uploads/banner/media_section/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							} else {
								if(isset($_POST['headers'])) {
								$banner_image_thumb_selected= $_POST['headers'];
								$banner_file_selected = str_replace('_thumb.','.',$banner_image_thumb_selected);
								} else {
								$banner_file_selected = '/added/uploads/banner/media_section/'.$name_file_timestamp.'.'.$extension;
								$banner_image_thumb_selected= '/added/uploads/banner/media_section/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							
								}
							}
						}
					} else {
						
						
					}
					/*
					list($width, $height, $type, $attr) = getimagesize($uplad_path_file);
					if($width>2000) {
					$new_width=$width/7;
					$new_height=$height/7;
					} elseif ($width>1500) {
						$new_width=$width/6;
						$new_height=$height/6;
					} elseif ($width>1000) {
						$new_width=$width/4;
						$new_height=$height/4;
					} elseif ($width>750) {
						$new_width=$width/3;
						$new_height=$height/3;
					}elseif ($width>350) {
						$new_width=$width/2;
						$new_height=$height/2;
					} else {
						$new_width=$width;
						$new_height=$height;
					}
					*/
				    
				            
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
							$banner_image_thumbs = '';
							$banner_files = '';
							$banner_file_selected = '';
							$banner_image_thumb_selected= '';
						} else {
							$banner_image_thumbs = $_POST['hdn_banner_image_thumbs'];
							$banner_files = $_POST['hdn_banner_files'];
							if(isset($_POST['headers'])) {
							$banner_image_thumb_selected= $_POST['headers'];
							$banner_file_selected = str_replace('_thumb.','.',$banner_image_thumb_selected);
							} else {
							$banner_file_selected = '';
							$banner_image_thumb_selected= '';
							}
						}
				}
				
				/**
				 * Delete Banners selected.
				 */
				if(isset($_POST['chk_headers_delete'])) {
					$del_headers=$_POST['chk_headers_delete'];
					foreach($del_headers as $del_header) {
						
						$del_header_thumb_full_path=getcwd().$del_header;
						$del_header_full_path=str_replace('_thumb.','.',$del_header_thumb_full_path);
						
						$del_header_thumb=$del_header;
						$del_header=str_replace('_thumb.','.',$del_header_thumb);
						
						
						/**
						 * Un Set current banner value if deleted. 
						 */
						if($del_header_thumb==$banner_image_thumb_selected) {
							$banner_file_selected = '';
							$banner_image_thumb_selected= '';
						}
						
						
						if(file_exists($del_header_thumb_full_path)) {
							unlink($del_header_thumb_full_path);
						}
						if(file_exists($del_header_full_path)) {
							unlink($del_header_full_path);
						}
						
						if (strpos($banner_image_thumbs, ',,,'.$del_header_thumb) !== false) {
							$banner_image_thumbs=str_replace(',,,'.$del_header_thumb,'',$banner_image_thumbs);
						} else {
							$banner_image_thumbs=str_replace($del_header_thumb,'',$banner_image_thumbs);
						}
						
						if (strpos($banner_files, ',,,'.$del_header) !== false) {
							$banner_files=str_replace(',,,'.$del_header,'',$banner_files);
						} else {
							$banner_files=str_replace($del_header,'',$banner_files);
						}
						
						
						
					}
				}
				
				if($_FILES['icon']['name']!="") {
					$userfile_name = $_FILES['icon']['name']; // file name  
					$userfile_tmp  = $_FILES['icon']['tmp_name']; // actual location  
					$userfile_size  = $_FILES['icon']['size']; // file size  
					$userfile_type  = $_FILES['icon']['type']; // mime type of file sent by browser. PHP doesn't check it.  
					$userfile_error  = $_FILES['icon']['error'];
									
					$extension = end(explode('.', $_FILES['icon']['name']));
					/**
					 * Add icon file, to solve conflict if i upload banner and icon as image, will take
					 * same name.
					 */	
					$name_file_timestamp=strtotime($current_date).'_icon';
						
					$uplad_path_file=getcwd().'/added/uploads/banner/media_section/' . $name_file_timestamp.'.'.$extension;
				
					//if ($userfile_type!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
					if(move_uploaded_file($_FILES["icon"]["tmp_name"], $uplad_path_file))
					{
						
						if($id==0) {
							$icon = '/added/uploads/banner/media_section/'.$name_file_timestamp.'.'.$extension;
									
						} else {
								
						if($_FILES['icon']['name']!='') {
							
							$icon=$this->Media_section_model->get_icon_by_id($this->table, $id);
							$icon_path=getcwd().$icon;
							if(isset($icon_path) && $icon_path!=getcwd()) {
							unlink($icon_path);
							}
							$icon = '/added/uploads/banner/media_section/'.$name_file_timestamp.'.'.$extension;
							
						} else {
							$icon = $this->Media_section_model->get_icon_by_id($this->table, $id);;
						}
							
						}
					}
					
					
				}else {
					if($id==0) {
							$icon = '';
									
						} else { 
							$icon = $this->Media_section_model->get_icon_by_id($this->table, $id);
						}
						}
				
				
				
				$data['current_row'] = array(
               	'alias' => $_POST['alias'] ,
				'media_section_category_id' => $_POST['media_section_category_id'],
               	'title' => $_POST['title'] ,
               	'title_ar' => $_POST['title_ar'],
				'seo_words' => $_POST['seo_words'] ,
               	
				'banner_image_thumbs' => $banner_image_thumbs ,
               	'banner_files' => $banner_files,
				'banner_image_thumb_selected' => $banner_image_thumb_selected ,
				'banner_file_selected' => $banner_file_selected ,
                'icon' => $icon ,
				
				'seo_words_ar' => $_POST['seo_words_ar'] ,
               	'brief' => $_POST['brief'],
				'brief_ar' => $_POST['brief_ar'] ,
               	'body' => $_POST['body'],
				'body_ar' => $_POST['body_ar'] ,
				'approved' => $this->session->userdata('user_session')->admin,
				'deleted' => 0,
				'last_user_id' => $this->session->userdata('user_session')->id,
				'last_modify_date' =>$current_date,
				);
					        
				if($id==0){
					$this->Media_section_model->insert($this->table, $data['current_row']);
					$id=$this->Media_section_model->get_max_id($this->table);
					//----------User Histroy Row ------------------//
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,1,$current_date,$id);		
					//---------------------------------------------//
					$this->session->set_userdata('message_session',lang('saved_successfully'));
				} else {
					$this->Media_section_model->update($this->table, $id, $data['current_row']);
					//----------User Histroy Row ------------------//
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);
					//---------------------------------------------//
					$this->session->set_userdata('message_session',lang('saved_successfully'));
				}
				redirect(base_url().$this->lang->lang()."/".ADMIN."/mediasection/form/$id/view");
				
			}
		}
        
		$this->load->view('admin/media_section/form',$data);
	}
	
	
}