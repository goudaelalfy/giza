<?php
/**
 * Main Model for system or website.
 *
 * It is main model file include the main database process class Main_model.
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
 * Main Model Class.
 *
 * This is the main class manage the processes on the database
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Main_model extends CI_Model
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
	 * Inserting Record Method.
	 *
	 * Method to insert record in database by passing table name and associative arry 
	 * contains the database field name and its value. 
	 *
	 * @access	private
	 * @param   string
	 * @param   array
	 * @return	boolean
	 */	
	function insert($table, $data)
	{
	  	return $this->db->insert($table, $data);
	}

	/**
	 * Updating Record Method.
	 *
	 * Method to update record in database by passing table name, id, and associative arry 
	 * contains the database field name and its value. 
	 *
	 * @access	private
	 * @param   string
	 * @param   int
	 * @param   array
	 * @return	boolean
	 */
	function update($table, $id ,$data)
	{	
	   	$this->db->where('id', $id);
        return $this->db->update($table, $data); 
	}
	    
	/**
	 * Deleting Record Method.
	 *
	 * Method to delete record from database by passing id of the record 
	 *
	 * @access	private
	 * @param   int
	 * @return	boolean
	 */
	function delete($id)
	{
	    $this->db->where("id", $id);
    	return $this->db->delete("user");
	}
	    
	/**
	 * Get All Record Method.
	 *
	 * Method to return all record from specific table by passing table name. 
	 *
	 * @access	private
	 * @param   string
	 * @return	std class array
	 */
	function get_all($table)
	{
	    $this->db->select('*');
	    $this->db->where('deleted !=', 1);
	    $this->db->order_by("id", "desc");
	    $query = $this->db->get($table);
        return $query->result();
	}	
	    
	/**
	 * Get All Record for displaying Method.
	 *
	 * Method to return all record from table page by page by passing table name, start point (no of record select start),
	 * count of rows were displayed per page, name of fields as string -- note -- this field was displayed in dynamic
	 * way so you must carefaul when select it, sort field, and sort type.  
	 *
	 * @access	private
	 * @param   string
	 * @param   int
	 * @param   int
	 * @param   string
	 * @param   string
	 * @param   string
	 * @return	std class array
	 */
	function get_all_display_paging($table, $start, $count_of_rows_per_page, $fields, $sort_field=null, $sort_type=null)
	{
	    $this->db->select($fields);
    	$this->db->where('deleted !=', 1);
     	$this->db->limit($count_of_rows_per_page, $start);
    	if($sort_field==null) {
	    	$this->db->order_by("id", "desc");
	    } else {
	     	if($sort_type==null) {
	     		$this->db->order_by($sort_field, "asc");
	     	} else {
	     		$this->db->order_by($sort_field, $sort_type);
	     	}
	    }
	    $query = $this->db->get($table);
        return $query->result();
	}
	    
	/**
	 * Get All approved record Method.
	 *
	 * Method to return all approved record from table by passing table name.  
	 *
	 * @access	private
	 * @param   string
	 * @return	std class array
	 */
	
	function get_all_approved($table)
	{
	    $this->db->select('*');
     	$this->db->where("approved", 1);
     	$this->db->order_by("id", "desc");
    	$query = $this->db->get($table);
        return $query->result();
	}

	/**
	 * Get All not approved record Method.
	 *
	 * Method to return all not approved record from table by passing table name.  
	 *
	 * @access	private
	 * @param   string
	 * @return	std class array
	 */
	function get_all_not_approved($table)
    {
    	$this->db->select('*');
    	$this->db->where("approved", 0);
     	$this->db->order_by("id", "desc");
    	$query = $this->db->get($table);
        return $query->result();
    }
    
    /**
	 * Get record by its id Method.
	 *
	 * Method to return record from table by passing table name and record id.  
	 *
	 * @access	private
	 * @param   string
	 * @param   int
	 * @return	array
	 */
	function get_by_id($table, $id)
    {
    	$this->db->select('*');
     	$this->db->from($table);
    	$this->db->where("id", $id);
    	$query = $this->db->get(); 

        return ($query->num_rows > 0) ? $query->row() : array();
    }
    
    /**
	 * Get record id by its alias Method.
	 *
	 * Method to return record id from table by passing table name and record alias.  
	 *
	 * @access	private
	 * @param   string
	 * @param   string
	 * @return	int
	 */
	function get_id_by_alias($table, $alias)
    {
	    $this->db->select('`id`');
	    $this->db->where("alias", $alias);
	    $query = $this->db->get($table);
        $arr=$query->result();
        	
        if($arr)
        $id=$arr[0]->id;
        else
        $id=0;
        	
        return $id;
	 }
	   
	/**
	 * Get records count by alias Method.
	 *
	 * Method to return count of record from table by alias, to prevent duplication of aliases.  
	 *, pass id to ignore this id alias when update it.
	 * @access	private
	 * @param   string
	 * @param   int
	 * @param   string
	 * @return	int
	 */
	function get_count_by_alias($table, $id, $alias)
    {
		$this->db->where("alias", $alias);
    	if($id!=0){
			$this->db->where("id !=", $id);
		}
		$this->db->from($table);
		return $this->db->count_all_results();
	}
	    
	/**
	 * Get table records count Method.
	 *
	 * Method to return count of record from table.
	 * @access	private
	 * @param   string
	 * @return	int
	 */
	function get_count($table)
	{
		$this->db->from($table);
		$this->db->where('deleted !=', 1);
		return $this->db->count_all_results();
	}

	/**
	 * Get maximum id Method.
	 *
	 * Method to return maximum id from table.
	 * @access	private
	 * @param   string
	 * @return	int
	 */
	function get_max_id($table)
	{
    	$this->db->select_max('id');
     	$query = $this->db->get($table);
        $max_id_arr=$query->result();
        $max_id=$max_id_arr[0]->id;
        return $max_id;
	}
	    
	/**
	 * Get minimum id Method.
	 *
	 * Method to return minimum id from table.
	 * @access	private
	 * @param   string
	 * @return	int
	 */
	function get_min_id($table)
	{
    	$this->db->select_min('id');
     	$query = $this->db->get($table);
        $min_id_arr=$query->result();
        $min_id=$min_id_arr[0]->id;
        return $min_id;
    }	
}
?>