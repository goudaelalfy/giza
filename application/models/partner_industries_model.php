<?php
/**
 * Partner_industries Model.
 *
 * It is Partner_industries model file include the partner_industries database process class Partner_industries_model.
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
 * Partner_industries Model Class.
 *
 * This class manages the processes on the database table partner_industries
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Partner_industries_model extends My_Model
{
   	/**
	 * store this partner_industries table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='partner_industries';
	
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
	       	$this->db->insert('partner_industries', $row);
	    }
	}
	
	function delete($partner_id)
	{
	    $this->db->where("partner_id", $partner_id);
    	return $this->db->delete("partner_industries");
	}
	
}
?>