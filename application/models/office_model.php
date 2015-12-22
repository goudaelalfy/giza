<?php
/**
 * Office Model.
 *
 * It is office model file include the office database process class Office_model.
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
 * Office Model Class.
 *
 * This class manages the processes on the database table office
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Office_model extends My_Model
{
   	/**
	 * store this office table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='office';
	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	function Main_model()
	{
		parent::__construct();
	}
	
	function get_max_sort()
    {
    	$this->db->select_max('sort');
     	$query = $this->db->get($this->table);
        $max_sort_arr=$query->result();
        $max_sort=$max_sort_arr[0]->sort;
        return $max_sort;
    }
	function get_sort_by_id($id)
    {
    	$this->db->select('`sort`');
    	$this->db->where("id", $id);
     	$query = $this->db->get($this->table);
        $arr=$query->result();
        
        if($arr)
        $sort=$arr[0]->sort;
        else
        $sort=0;
        
        return $sort;
    }
    
	function get_by_sort_less($sort)
    {
    	$this->db->select('*');
     	$this->db->from($this->table);	
    	$this->db->where("sort <", $sort);
    	$this->db->limit(1);
    	$this->db->order_by("sort","desc");
    	$query = $this->db->get(); 

        return ($query->num_rows > 0) ? $query->row() : array();
    	
    }
    
	function get_by_sort_more($sort)
    {
    	$this->db->select('*');
     	$this->db->from($this->table);	
    	$this->db->where("sort >", $sort);
    	$this->db->order_by("sort");
    	$this->db->limit(1);
    	$query = $this->db->get(); 

        return ($query->num_rows > 0) ? $query->row() : array();
    	
    }
	
	
	function get_countries()
	{
		$this->db->distinct();
	    $this->db->select('country.*');
	    $this->db->from("country");
		$this->db->join('office', 'country.id = office.country_id', 'left');
		
     	$this->db->where("office.approved", 1);
     	$this->db->where('office.deleted !=', 1);
     	
     	$this->db->order_by("office.sort");
    	$query = $this->db->get();
        return $query->result();
	}
	
	/**
	 * Get All approved record Method.
	 *
	 * Method to return all approved record from table by passing table name.  
	 *
	 * @access	public
	 * @param   string
	 * @return	std class array
	 */
	
	function get_by_country($country_id=0)
	{
	    $this->db->select('*');
     	$this->db->where("approved", 1);
     	$this->db->where('deleted !=', 1);
     	$this->db->where('country_id ', $country_id);
     	
     	$this->db->order_by("office.sort");
     	$query = $this->db->get($this->table);
        return $query->result();
	}
		
}
?>