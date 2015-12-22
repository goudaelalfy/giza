<?php
/**
 * Menu_map Model.
 *
 * It is page model file include the menu_map database process class Menu_map_model.
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
 * Menu_map Model Class.
 *
 * This class manages the processes on the database table menu_map
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Menu_map_model extends My_Model
{

	/**
	 * store this menu_map table name.
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
	function Main_model()
	{
		parent::__construct();
	}
		
	/**
	 * Method get parent menu_map, passing id of current to ignore.
	 * 
	 * @access public
	 * @param string $table
	 * @param int $id
	 * @return boolean
	 */
	function get_all_parent($table, $id)
	{
	    $this->db->select('*');
	    $this->db->where("id !=", $id);
	    $this->db->order_by("id", "desc");
	    $query = $this->db->get($table);
       	return $query->result();
	}
	
	/**
	 * Get All Record Method.
	 *
	 * Method override main model get all, to sort asc. 
	 *
	 * @access	public
	 * @param   string
	 * @return	std class array
	 */
	function get_all($table='')
	{
		if($table=='') {
			$table=$this->table;
		}
	    $this->db->select('*');
	    $this->db->where('deleted !=', 1);
	    $this->db->order_by("id", "asc");
	    $query = $this->db->get($table);
        return $query->result();
	}	
	    
}
?>