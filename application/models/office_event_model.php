<?php
/**
 * Office_event Model.
 *
 * It is office_event model file include the office_event database process class Office_event_model.
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
 * Office_event Model Class.
 *
 * This class manages the processes on the database table office_event
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Office_event_model extends My_Model
{
   	/**
	 * store this office_event table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='office_event';
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	function Main_model()
	{
		parent::__construct();
	}
		
	function get_by_office($office_id=0)
	{
	    $this->db->select('*');
	    
     	$this->db->where("approved", 1);
     	$this->db->where('deleted !=', 1);
     	$this->db->where("office_ids like '%$office_id%'");
     	
     	$this->db->order_by("date_from");
     	$query = $this->db->get($this->table);
        return $query->result();
	}
	
	function get_all_approved_past()
	{
		$dateTime = new DateTime(); 
		$current_date=$dateTime->format("Y-m-d");
		
	    $this->db->select('*');
	    
     	$this->db->where("approved", 1);
     	$this->db->where('deleted !=', 1);
     	$this->db->where("date_from < '$current_date'");
     	
     	$this->db->order_by("date_from");
     	$query = $this->db->get($this->table);
        return $query->result();
	}
	function get_all_approved_current()
	{
		$dateTime = new DateTime(); 
		$current_date=$dateTime->format("Y-m-d");
		
	    $this->db->select('*');
	    
     	$this->db->where("approved", 1);
     	$this->db->where('deleted !=', 1);
     	$this->db->where("date_from <= '$current_date'");
     	$this->db->where("date_to >= '$current_date'");
     	
     	$this->db->order_by("date_from");
     	$query = $this->db->get($this->table);
        return $query->result();
	}
	function get_all_approved_upcoming()
	{
		$dateTime = new DateTime(); 
		$current_date=$dateTime->format("Y-m-d");
		
	    $this->db->select('*');
	    
     	$this->db->where("approved", 1);
     	$this->db->where('deleted !=', 1);
     	$this->db->where("date_from > '$current_date'");
     	
     	$this->db->order_by("date_from");
     	$query = $this->db->get($this->table);
        return $query->result();
	}
}
?>