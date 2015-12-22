<?php
/**
 * Media_section Model.
 *
 * It is Media_section model file include the Media_section database process class Media_section_model.
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
 * Media_section Model Class.
 *
 * This class manages the processes on the database table media_section
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Media_section_model extends My_Model
{
   	/**
	 * store this media_section table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='media_section';
   	
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
	 * Method get all media section by passing media_section_category_id.
	 * 
	 * @access public
	 * @param int $media_section_category_id
	 * @return boolean
	 */
	function get_by_media_section_category_id($media_section_category_id)
	{
	    $this->db->select('*');
	    $this->db->from($this->table);	
	    $this->db->where("media_section_category_id", $media_section_category_id);
	    $this->db->where('approved', 1);
	    $this->db->where('deleted !=', 1);
	    
	    //$this->db->order_by("sort");
	    $query = $this->db->get();
       	return $query->result();
	}
	
	function get_by_media_section_category_alias($media_section_category_alias)
	{
	    
		
		$this->db->select('*');
	    $this->db->from('media_section_category');
		$this->db->where('alias', $media_section_category_alias);
	   	$query = $this->db->get();
       	$media_section_category_row= $query->row();
       	
       	$media_section_category_id= $media_section_category_row->id;
       	if($media_section_category_row) {
		$this->db->select('*');
	    $this->db->from($this->table);	
	    $this->db->where("media_section_category_id", $media_section_category_id);
	    $this->db->where('approved', 1);
	    $this->db->where('deleted !=', 1);
	    
	    //$this->db->order_by("sort");
	    $query = $this->db->get();
       	return $query->result();
       	} else {
       		return array();
       	}
	}
}
?>