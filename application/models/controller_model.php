<?php
/**
 * Controller Model.
 *
 * It is page model file include the controller database process class Controller_model.
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
 * Controller Model Class.
 *
 * This class manages the processes on the database table controller
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Controller_model extends My_Model
{
   	
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
	 * Method to override MY_Model method. 
	 *
	 * @access	public
	 * @param   string
	 * @return	std class array
	 */
	public function get_all()
	{
	    $this->db->select('*');
	    $this->db->where('deleted !=', 1);
	    $this->db->order_by("id");
	    $query = $this->db->get('controller');
        return $query->result();
	}
		
}
?>