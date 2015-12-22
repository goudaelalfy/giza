<?php
/**
 * Sql controller file.
 *
 * Contains controller class of the page_category table.
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
 * Controller class of the page_category table.
 *
 * This is the controller class of the page_category table. between model and view, in MVC design pattern.
 *
 * @package		admin
 * @category	controller
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Sql extends My_Controller
{ 	
	/**
	 * store this controller pagecat screen id.
	 *
	 * @var int
	 * @access public
	 */
	public $screen_id=32;
	
	/**
	 * store this controller page_category table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='page_category';
	
	/**
	 * store table fields to display in table.
	 *
	 * @var string
	 * @access public
	 */
	public $table_fields_to_display=" id,alias,  name,  name_ar, approved ";
	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Page_model', 'Page_model' , True);
		
	}
	
	public function importNews()
	{
		$rows=$this->News_model->get_all_including_deleted('nop_news'); 
        foreach($rows as $row) {
        	$data = array(
		
						'id' => $row->NewsID,
						'alias' => $row->Title,
					    'title' => $row->Title,
						'title_ar' => $row->Title,
						'seo_words' => $row->Title,
					    'seo_words_ar' => $row->Title,
					    'brief' => $row->Short,
						'brief_ar' => $row->Short,
					    'body' => $row->Full,
						'body_ar' => $row->Full,
						'approved' => $row->Published,
						'deleted' => 0,
						'last_user_id' => $this->session->userdata('user_session')->id,
						'last_modify_date' =>$row->CreatedOn,
						);
						 
						//$this->News_model->insertIgnore('news', $data);
        }
	}
	
	
	public function import()
	{
		$rows=$this->Page_model->get_all_including_deleted('screens_headers_images'); 

		
		$dateTime = new DateTime(); 
		$current_date=$dateTime->format("Y-m-d H:i:s");
		
				
		foreach($rows as $row) {
			
        	$data = array(
		
						//'id' => $row->giza_casestudy_id,
						'page_code' => $row->screen_name,
					    'title' => $row->screen_name,
						'title_ar' => $row->screen_name,
						
        				'banner_image_thumbs' => str_replace('images/headers','/added/uploads/banner/staticpagebanner',$row->timage)  ,
		               	'banner_files' => str_replace('images/headers','/added/uploads/banner/staticpagebanner',$row->name),
						'banner_image_thumb_selected' => str_replace('images/headers','/added/uploads/banner/staticpagebanner',$row->timage) ,
						'banner_file_selected' => str_replace('images/headers','/added/uploads/banner/staticpagebanner',$row->name) ,
		               
        	
						'approved' => 1,
						'deleted' => 0,
						'last_user_id' => $this->session->userdata('user_session')->id,
						'last_modify_date' =>'',
						);
						 
						$this->Page_model->insertIgnore('static_page_banner', $data);
						//$id=$this->Page_model->get_max_id('page');
						
						/*
						$alias=$row->title;
						$data = array(
						
						'body'=>$row->content_html1,  
						'body_ar'=>$row->content_html1,
						
						);
						 
						$this->Page_model->updateByAlias('page', $alias,  $data);
						*/
        }
	}

	
}