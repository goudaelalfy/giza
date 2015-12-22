<?php
require_once  getcwd().'/added/php_excel_library/Classes/PHPExcel/IOFactory.php';

/**
 * Importpage controller file.
 *
 * Contains controller class of the importpage table.
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
 * Controller class of the importpage table.
 *
 * This is the controller class of the importpage table. between model and view, in MVC design pattern.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Importpage extends MY_Controller
{
	/**
	 * store this controller importpage screen id.
	 *
	 * @var int
	 * @access public
	 */
	public $screen_id=36;

		/**
	 * store this controller page table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='page';
	
	
	/**
	 * Constructor
	 *
	 * @access public
	 */
	function __construct()
	{
		parent::__construct();

		$this->load->model('Page_model', 'Page_model' , True);

		error_reporting(E_ALL);
		set_time_limit(0);
		date_default_timezone_set('Africa/Cairo');
	}

	/**
	 * Index Method.
	 *
	 * Default method for each controller, called when no method name path through URL.
	 *
	 * @access	public
	 */
	function index($mode='')
	{
		if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_view)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		}
		if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_add)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		}
		if(!$this->user_screen_privielge_allowed($this->screen_id, $this->privielge_edit)) {
			redirect(base_url().$this->lang->lang()."/".ADMIN."/accessforbidden");
		}


		$data['mode']= $mode;

		if(isset($_POST['smt_read']))
		{
				
			if($_FILES['ecxel_file']['name']=="")
			{
				$data['error']= lang('please_select_excel_file');
			}
			else
			{

				$userfile_name = $_FILES['ecxel_file']['name']; // file name
				$userfile_tmp  = $_FILES['ecxel_file']['tmp_name']; // actual location
				$userfile_size  = $_FILES['ecxel_file']['size']; // file size
				$userfile_type  = $_FILES['ecxel_file']['type']; // mime type of file sent by browser. PHP doesn't check it.
				$userfile_error  = $_FILES['ecxel_file']['error'];

				$extension = end(explode('.', $_FILES['ecxel_file']['name']));

				if ($userfile_type!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
				{
					$data['error']= lang('must_select_excel_file');
				}
				else
				{
					$dateTime = new DateTime();
					$current_date=$dateTime->format("Y-m-d H:i:s");

					$name_file_timestamp=strtotime($current_date);
					$uplad_path_file=getcwd().'/added/uploads/excel/' . $name_file_timestamp.'.'.$extension;
					if(move_uploaded_file($_FILES["ecxel_file"]["tmp_name"], $uplad_path_file))
					{
						$this->session->set_userdata('excel_file_session',$uplad_path_file);

						$inputFileName=$uplad_path_file;
						//echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory to identify the format<br />';
						$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);


						$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
						//var_dump($sheetData);




						$data['sheetData']=$sheetData;
						$data['mode']= 'read';
					}
					else
					{
						$data['error']= lang('file_saving_error');
					}

				}
			}
				
			$this->load->view('admin/import_excel/page',$data);
		}
		else if(isset($_POST['smt_import']))
		{
				
			if($this->session->userdata('excel_file_session'))
			{
				$inputFileName= $this->session->userdata('excel_file_session');
					
				//echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory to identify the format<br />';
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);


				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
				//var_dump($sheetData);

				$row_counter=0;
				foreach($sheetData as $row_arr)
				{
					if($row_counter>0)
					{
						$dateTime = new DateTime(); 
						$current_date=$dateTime->format("Y-m-d H:i:s");

				
						$data = array(
						//'page_category_id' => 3,
						//'page_category_id' => 2,
						'page_category_id' => 1,
						
						'alias' => $row_arr[$_POST['alias']],
					    'title' => $row_arr[$_POST['title']],
					    'title_ar' => $row_arr[$_POST['title_ar']],
						'seo_words' => $row_arr[$_POST['seo_words']],
					    'seo_words_ar' => $row_arr[$_POST['seo_words_ar']],
					    'brief' => $row_arr[$_POST['brief']],
						'brief_ar' => $row_arr[$_POST['brief_ar']],
					    'body' => $row_arr[$_POST['body']],
						'body_ar' => $row_arr[$_POST['body_ar']],
						'approved' => $this->session->userdata('user_session')->admin,
						'deleted' => 0,
						'last_user_id' => $this->session->userdata('user_session')->id,
						'last_modify_date' =>$current_date,
						);
						 
						$this->Page_model->insert($this->table, $data);
					}
					$row_counter=$row_counter+1;
				}

				$data['mode']= 'import';
				$data['message']= lang('import_successfully');

				unlink($inputFileName);
			}
			else
			{
				$data['error']= lang('file_saving_error');
			}
			$this->load->view('admin/import_excel/page',$data);
		}
		else
		{
			$this->load->view('admin/import_excel/page',$data);
		}
	}

}