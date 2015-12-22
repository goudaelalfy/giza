<?php
/**
 * Techworld Dalil.
 * 
 * Dalil web application serve our clients, check number availability and website guide.
 * 
 * @copyright @ Techworld
 * @author gouda <goudaelalfy@hotmail.com>
 * @link www.tech-world.ws
 */

//-----------------------------------------------------------

/**
 * Techworld gateway model calss.
 * 
 * This class extend from MY_Model.
 *  
 * @author gouda
 * @package Gateway
 *
 */
class Email_template_model extends MY_Model
{
   		/**
	 * store this controller email_template table name.
	 *
	 * @var string
	 * @access private
	 */
	private $table='email_template';
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Get record by its purpose Method.
	 *
	 * Method to return record from table by passing table name and record purpose.  
	 *
	 * @access	public
	 * @param   string
	 * @param   string
	 * @return	array
	 */
	function get_by_purpose($purpose)
    {
    	$this->db->select('*');
     	$this->db->from($this->table);
    	$this->db->where("purpose", $purpose);
    	$query = $this->db->get(); 

        return ($query->num_rows > 0) ? $query->row() : array();
    }
	
}
?>