<?php
/**
 * Media_item Model.
 *
 * It is Media_item model file include the Media_item database process class Media_item_model.
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
 * Media_item Model Class.
 *
 * This class manages the processes on the database table media_item
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Media_item_model extends My_Model
{
   	/**
	 * store this media_item table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='media_item';
   	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	function Main_model()
	{
		parent::__construct();
	}
		
	
	/**
	 * Method to get icon by id.
	 * access public
	 * @param string
	 * @param int
	 */
	function get_icon_by_id($table, $id)
    {
    	$this->db->select('`icon`');
    	$this->db->where("id", $id);
     	$query = $this->db->get($table);
        $arr=$query->result();
        	
        if($arr)
        $icon=$arr[0]->icon;
        else
        $icon='';
        
        return $icon;
    }
    
	/**
	 * Method to get PDF file path from table by id
	 * 
	 * @access public
	 * @param string table name
	 * @param int it
	 * @return string 
	 */
	function get_pdf_file_by_id($table, $id)
    {
    	$this->db->select('`pdf_file`');
    	$this->db->where("id", $id);
     	$query = $this->db->get($table);
        $arr=$query->result();
        	
        if($arr)
        $pdf_file=$arr[0]->pdf_file;
        else
        $pdf_file='';
        
        return $pdf_file;
    }
	/**
	 * Method to get Video file path from table by id
	 * 
	 * @access public
	 * @param string table name
	 * @param int it
	 * @return string 
	 */
	function get_video_file_by_id($table, $id)
    {
    	$this->db->select('`video_file`');
    	$this->db->where("id", $id);
     	$query = $this->db->get($table);
        $arr=$query->result();
        	
        if($arr)
        $video_file=$arr[0]->video_file;
        else
        $video_file='';
        
        return $video_file;
    }
    
	/**
	 * Method get all media items by passing media_section_id.
	 * 
	 * @access public
	 * @param int $media_section_category_id
	 * @return boolean
	 */
	function get_by_media_section_id($media_section_id, $start, $count_of_rows_per_page, $sort_field=null, $sort_type=null)
	{
	    $this->db->select('*');
	    $this->db->from($this->table);	
	    $this->db->where("media_section_id", $media_section_id);
	    $this->db->where('approved', 1);
	    $this->db->where('deleted !=', 1);
		$this->db->limit($count_of_rows_per_page, $start);
    	if($sort_field==null) {
	    	$this->db->order_by("id", "desc");
	    } else {
	     	if($sort_type==null) {
	     		$this->db->order_by($sort_field, "asc");
	     	} else {
	     		$this->db->order_by($sort_field, $sort_type);
	     	}
	    }
	    
	    //$this->db->order_by("sort");
	    $query = $this->db->get();
       	return $query->result();
	}
	
	
	/**
	 * Get table records count Method.
	 *
	 * Method to return count of record from table.
	 * @access	public
	 * @param   string
	 * @return	int
	 */
	function get_count_by_section_id($media_section_id)
	{
		$this->db->from($this->table);	
	    $this->db->where("media_section_id", $media_section_id);
	    $this->db->where('approved', 1);
	    $this->db->where('deleted !=', 1);
		return $this->db->count_all_results();
	}
}
?>