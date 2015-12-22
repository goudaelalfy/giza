<?php
/**
 * Contentsetting controller file.
 *
 * Contains controller class of the content_setting table.
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
 * Controller class of the content_setting table.
 *
 * This is the controller class of the content_setting table. between model and view, in MVC design pattern.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Contentsetting extends My_Controller
{ 	
	/**
	 * store this controller page screen id.
	 *
	 * @var int
	 * @access private
	 */
	private $screen_id=21;
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	function __construct()
	{
		parent::__construct();

		$this->load->helper('language');
		$this->load->helper('url');
		$this->load->library('session');
		
		$this->lang->load('main');
		
		
		$this->load->model('Content_setting_model','Content_setting_model',True);
				
		//---------- User Histroy ------------------//
		$this->load->model('User_history_model','User_history_model',True);
		//---------------------------------------------//		
		
	}
	
	/**
	 * Index Method.
	 *
	 * Default method for each controller, called when no method name path through URL. 
	 *
	 * @access	public
	 */	
	function index()
	{
		redirect(base_url().$this->lang->lang().'/'.ADMIN.'/'."contentsetting/form/1/edit");
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
			$data['current_row'] = $this->Content_setting_model->get_by_id($id);
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
				
				$data['current_row'] = $this->Content_setting_model->get_by_id($id);
				$last_modify_date=$data['current_row']->last_modify_date;
			}
			else
			{
				$last_modify_date='';
			}
			if($id!=0 && $_POST['last_modify_date']!=$last_modify_date)
			{ 
					$data['current_row'] = array(
								'id' => $id ,				               	
				            );
				                 
				            $data['error']= $this->lang->line('updated_by_another_user_error')."<a  href='".base_url().$this->lang->lang()."/admin/contentsetting/form/$id/view' >".$this->lang->line('click_here_link')."</a>";
				            
				            $data['mode']= 'return';
							$this->load->view('admin/contentsetting/form',$data);
			}
			else 
				{
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
					
				$uplad_path_file=getcwd().'/added/uploads/banner/default/' . $name_file_timestamp.'.'.$extension;
				
				//if ($userfile_type!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
				{
					if(move_uploaded_file($_FILES["banner_file"]["tmp_name"], $uplad_path_file))
					{
						
						if($id==0) {
							$banner_files = '/added/uploads/banner/page/'.$name_file_timestamp.'.'.$extension;
							$banner_image_thumbs= '/added/uploads/banner/page/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							$banner_file_selected = '/added/uploads/banner/page/'.$name_file_timestamp.'.'.$extension;
							$banner_image_thumb_selected= '/added/uploads/banner/page/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							
						} else {
								
							if($_POST['hdn_banner_image_thumbs']=='') {
							$banner_image_thumbs = '/added/uploads/banner/page/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							} else {
								$banner_image_thumbs = $_POST['hdn_banner_image_thumbs'].',,,'.'/added/uploads/banner/page/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							}
							
							if($_POST['hdn_banner_files']=='') {
								$banner_files = '/added/uploads/banner/page/'.$name_file_timestamp.'.'.$extension;
							} else {
								$banner_files = $_POST['hdn_banner_files'].',,,'.'/added/uploads/banner/page/'.$name_file_timestamp.'.'.$extension;
							} 
							
							
							
							if(isset($_POST['are_current'])) {
							$banner_file_selected = '/added/uploads/banner/page/'.$name_file_timestamp.'.'.$extension;
							$banner_image_thumb_selected= '/added/uploads/banner/page/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							} else {
								if(isset($_POST['headers'])) {
								$banner_image_thumb_selected= $_POST['headers'];
								$banner_file_selected = str_replace('_thumb.','.',$banner_image_thumb_selected);
								} else {
								$banner_file_selected = '/added/uploads/banner/page/'.$name_file_timestamp.'.'.$extension;
								$banner_image_thumb_selected= '/added/uploads/banner/page/'.$name_file_timestamp.'_thumb'.'.'.$extension;
							
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
				
				
				$data['current_row'] = array(
               	'alias' => $_POST['alias'] ,
               	'title' => $_POST['title'] ,
               	'title_ar' => $_POST['title_ar'],
				'seo_words' => $_POST['seo_words'] ,
               	
				'banner_image_thumbs' => $banner_image_thumbs ,
               	'banner_files' => $banner_files,
				'banner_image_thumb_selected' => $banner_image_thumb_selected ,
				'banner_file_selected' => $banner_file_selected ,
               
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
					$this->Page_model->insert($this->table, $data['current_row']);
					$id=$this->Page_model->get_max_id($this->table);
					//----------User Histroy Row ------------------//
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,1,$current_date,$id);		
					//---------------------------------------------//
					$this->session->set_userdata('message_session',lang('saved_successfully'));
				} else {
					$this->Page_model->update($this->table, $id, $data['current_row']);
					//----------User Histroy Row ------------------//
					$this->User_history_model->insert($this->session->userdata('user_session')->id,$this->screen_id,2,$current_date,$id);
					//---------------------------------------------//
					$this->session->set_userdata('message_session',lang('saved_successfully'));
				}
							
				redirect(base_url().$this->lang->lang().'/'.ADMIN.'/'."contentsetting/form/$id/view");
				}
		}
        
		$this->load->view('admin/contentsetting/form',$data);
	}
	
	
}