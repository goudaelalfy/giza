<?php
/**
 * Home_box Model.
 *
 * It is Home_box model file include the Home_box database process class Home_box_model.
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
 * Home_box Model Class.
 *
 * This class manages the processes on the database table home_box
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Home_box_model extends My_Model
{
   	/**
	 * store this home_box table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='home_box';
   	
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
	 * Get All Record Method.
	 *
	 * Method to return all record from specific table by passing table name. 
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
	    $this->db->order_by("sort");
	    $query = $this->db->get($table);
        return $query->result();
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
		
}
?>