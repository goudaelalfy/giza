<?php
/**
 * Hr_business_line Model.
 *
 * It is page model file include the hr_business_line database process class Hr_business_line_model.
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
 * Hr_business_line Model Class.
 *
 * This class manages the processes on the database table hr_business_line
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Hr_business_line_model extends My_Model
{
   	/**
	 * store this hr_business_line table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='hr_business_line';
	
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
    
	function get_all_by_solution($solution_id)
	{
	    $this->db->select('*');
	    $this->db->where('deleted !=', 1);
	    $this->db->where('approved', 1);
	    $this->db->where('solution_id', $solution_id);
	    $this->db->order_by("id", "desc");
	    $query = $this->db->get($this->table);
        return $query->result();
	}
		
}
?>