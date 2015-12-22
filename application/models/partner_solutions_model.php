<?php
/**
 * Partner_solutions Model.
 *
 * It is Partner_solutions model file include the partner_solutions database process class Partner_solutions_model.
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
 * Partner_solutions Model Class.
 *
 * This class manages the processes on the database table partner_solutions
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Partner_solutions_model extends My_Model
{
   	/**
	 * store this partner_solutions table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='partner_solutions';
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	function Main_model()
	{
		parent::__construct();
	}
		
	function insert($partner_id, $data)
	{
	  $this->delete($partner_id);
	    	
	    foreach($data as $row)
	    {
	       	$this->db->insert('partner_solutions', $row);
	    }
	}
	
	function delete($partner_id)
	{
	    $this->db->where("partner_id", $partner_id);
    	return $this->db->delete("partner_solutions");
	}
	
}
?>