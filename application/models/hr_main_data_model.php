<?php
/**
 * Hr_main_data Model.
 *
 * It is page model file include the hr_main_data database process class Hr_main_data_model.
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
 * Hr_main_data Model Class.
 *
 * This class manages the processes on the database table hr_main_data
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Hr_main_data_model extends My_Model
{
   	/**
	 * store this hr_main_data table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='';
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	function Main_model()
	{
		parent::__construct();
	}
	
	function get_all_tables()
    {
    	$this->db->select('*');
     	$this->db->from('hr_main_table');	
    	$this->db->order_by("table_name");
    	$query = $this->db->get(); 
        return $query->result();
    }
	
	/*
	function get_max_sort($table)
    {
    	$this->db->select_max('sort');
     	$query = $this->db->get($table);
        $max_sort_arr=$query->result();
        $max_sort=$max_sort_arr[0]->sort;
        return $max_sort;
    }
	function get_sort_by_id($table,$id)
    {
    	$this->db->select('`sort`');
    	$this->db->where("id", $id);
     	$query = $this->db->get($table);
        $arr=$query->result();
        
        if($arr)
        $sort=$arr[0]->sort;
        else
        $sort=0;
        
        return $sort;
    }
    
	function get_by_sort_less($table, $sort)
    {
    	$this->db->select('*');
     	$this->db->from($table);	
    	$this->db->where("sort <", $sort);
    	$this->db->limit(1);
    	$this->db->order_by("sort","desc");
    	$query = $this->db->get(); 

        return ($query->num_rows > 0) ? $query->row() : array();
    	
    }
    
	function get_by_sort_more($table, $sort)
    {
    	$this->db->select('*');
     	$this->db->from($table);	
    	$this->db->where("sort >", $sort);
    	$this->db->order_by("sort");
    	$this->db->limit(1);
    	$query = $this->db->get(); 

        return ($query->num_rows > 0) ? $query->row() : array();
    	
    }
    */
		
}
?>