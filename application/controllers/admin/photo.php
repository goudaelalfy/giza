<?php
/**
 * Photo controller file.
 *
 * Contains controller class of the photo table.
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
 * Controller class of the photo table.
 *
 * This is the controller class of the photo table. between model and view, in MVC design pattern.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Photo extends My_Controller
{ 	
	/**
	 * store this cPhotoer photo screen id.
	 *
	 * @var int
	 * @access public
	 */
	public $screen_id=33;
	
	/**
	 * store this controller photo table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table_gallery='gallery';
	
	/**
	 * store gallery table fields to display in table.
	 *
	 * @var string
	 * @access private
	 */
	private $table_gallery_fields_to_display=" id, icon, title, title_ar ";
	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gallery_model', 'Gallery_model' , True);
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
		redirect(base_url().$this->lang->lang()."/".ADMIN."/photo/table");
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
		
		$rows_count = $this->Gallery_model->get_count($this->table_gallery);
		$data['rows_count']=$rows_count;
		
		//$settings = $this->Setting_model->get_all();
		//$data['paging_no_of_pages']=$settings[0]->paging_no_of_pages;
		$data['paging_no_of_pages']=21;
		
		$per_page = $data['paging_no_of_pages'];
    	
		$start = ($page-1)*$per_page;

		$data['rows'] = $this->Gallery_model->get_all_display_paging($this->table_gallery, $start, $per_page, $this->table_gallery_fields_to_display, $order, $order_type); 
        
		
		$this->load->view("admin/photo/table", $data);
	}
	
	function uploads($gallery_id)
	{
		$this->session->set_userdata('uploads_file',$gallery_id);
		$this->load->view('admin/photo/uploader');
	}
	function uploadstart()
	{
		$uploads_file=$this->session->userdata('uploads_file');
		
		error_reporting(E_ALL | E_STRICT);
		require(getcwd().'/added/uploader/server/php/UploadHandler.php');
		$upload_handler = new UploadHandler($uploads_file);
	}
	
}