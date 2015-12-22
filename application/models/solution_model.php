<?php
/**
 * Solution Model.
 *
 * It is solution model file include the solution database process class solution_model.
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
 * Solution Model Class.
 *
 * This class manages the processes on the database table solution
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Solution_model extends My_Model
{
   	/**
	 * store this solution table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='solution';
   	
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
	 * Method to get menu icon by id.
	 * access public
	 * @param string
	 * @param int
	 */
	function get_menu_icon_by_id($table, $id)
    {
    	$this->db->select('`menu_icon`');
    	$this->db->where("id", $id);
     	$query = $this->db->get($table);
        $arr=$query->result();
        	
        if($arr)
        $menu_icon=$arr[0]->menu_icon;
        else
        $menu_icon='';
        
        return $menu_icon;
    }
}
?>