<?php
/**
 * Industry Model.
 *
 * It is industry model file include the industry database process class industry_model.
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
 * Industry Model Class.
 *
 * This class manages the processes on the database table industry
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Industry_model extends My_Model
{
   	/**
	 * store this industry table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='industry';
   	
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