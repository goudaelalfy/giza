<?php
/**
 * Menu Model.
 *
 * It is page model file include the menu database process class Menu_model.
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
 * Menu Model Class.
 *
 * This class manages the processes on the database table menu
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Menu_model extends My_Model
{
   	/**
	 * store this menu table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='menu';
	
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
	 * Method get parent menu, passing id of current to ignore.
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
}
?>