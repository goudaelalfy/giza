<?php
/**
 * Gallery Model.
 *
 * It is Gallery model file include the Gallery database process class Gallery_model.
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
 * Gallery Model Class.
 *
 * This class manages the processes on the database table gallery
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Gallery_model extends My_Model
{
   	/**
	 * store this menu table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='gallery';
	
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
	 * Get All approved record Method.
	 *
	 * Method to return all approved record from table by passing table name.  
	 *
	 * @access	public
	 * @param   string
	 * @return	std class array
	 */
	
	function get_all_approved_not_temp()
	{
		
	    $this->db->select('*');
	    $this->db->where('temp !=', 1);
     	$this->db->where("approved", 1);
     	$this->db->where('deleted !=', 1);
     	$this->db->order_by("id", "desc");
    	$query = $this->db->get($this->table);
        return $query->result();
	}
}
?>