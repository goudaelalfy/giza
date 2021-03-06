<?php
/**
 * Client_industries Model.
 *
 * It is Client_industries model file include the client_industries database process class Client_industries_model.
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
 * Client_industries Model Class.
 *
 * This class manages the processes on the database table client_industries
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Client_industries_model extends My_Model
{
   	/**
	 * store this client_industries table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='client_industries';
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	function Main_model()
	{
		parent::__construct();
	}
		
	function insert($client_id, $data)
	{
	  $this->delete($client_id);
	    	
	    foreach($data as $row)
	    {
	       	$this->db->insert('client_industries', $row);
	    }
	}
	
	function delete($client_id)
	{
	    $this->db->where("client_id", $client_id);
    	return $this->db->delete("client_industries");
	}
	
}
?>