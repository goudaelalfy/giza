<?php
/**
 * Candidate Model.
 *
 * It is candidate model file include the candidate database process class candidate_model.
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
 * Candidate Model Class.
 *
 * This class manages the processes on the database table candidate
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Candidate_model extends My_Model
{
	/**
	 * store this candidate table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='hr_candidate';
   	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	function Main_model()
	{
		parent::__construct();
	}
	
	function get_id_by_username($username)
    {
    	$this->db->select('`id`');
    	$this->db->where("username", $username);
     	$query = $this->db->get($this->table);
        $arr=$query->result();
        
        if($arr)
        $id=$arr[0]->id;
        else
        $id=0;
        
        return $id;
    }
   
	function get_count_by_username($id,$username)
    {
		$this->db->where("username", $username);
    	if($id!=0)
		{
			$this->db->where("id !=", $id);
		}
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
    
	function get_by_username_and_password($username,$password)
    {
		$this->db->select('`id`,  `username`,  `password`,  `firstname`,  `middlename`,  `lastname`');
    	$this->db->where("username", $username);
		$this->db->where("password", $password);
		$this->db->where("active", 1);
    	$query = $this->db->get($this->table);
        return ($query->num_rows > 0) ? $query->row() : array();
    }
    
	function get_by_email($home_email)
    {
		$this->db->select('*');
    	$this->db->where("home_email", $home_email);
		$this->db->where("active", 1);
    	$query = $this->db->get($this->table);
        return ($query->num_rows > 0) ? $query->row() : array();
    }
	
	function get_by_name_like($alpha)
	{
	    $this->db->select('candidate.*');
	    $this->db->from($this->table);
	    $this->db->where("candidate.name like '$alpha%'");
	    $this->db->where("candidate.approved", 1);
	    $this->db->where('candidate.deleted !=', 1);
	    $query = $this->db->get();
	    return $query->result();
	}
	
	function get_by_array($candidate_ids_arr)
    {
    	$this->db->select('*');
     	$this->db->from($this->table);
    	$this->db->where_in('id', $candidate_ids_arr);
    	
    	$query = $this->db->get(); 

        return $query->result();	    	
    }
    
	function activate($active_code ,$data)
	{
	   	$this->db->where('active_code', $active_code);
        return $this->db->update($this->table, $data); 
	}

	
	/**
	 * Method to get cv file path from table by id
	 * 
	 * @access public
	 * @param string table name
	 * @param int it
	 * @return string 
	 */
	function get_cv_file_by_id($table, $id)
    {
    	$this->db->select('`cv_file`');
    	$this->db->where("id", $id);
     	$query = $this->db->get($table);
        $arr=$query->result();
        	
        if($arr)
        $cv_file=$arr[0]->cv_file;
        else
        $cv_file='';
        
        return $cv_file;
    }
    
	/**
	 * Method to get image path from table by id
	 * 
	 * @access public
	 * @param string table name
	 * @param int it
	 * @return string 
	 */
	function get_image_by_id($table, $id)
    {
    	$this->db->select('`image`');
    	$this->db->where("id", $id);
     	$query = $this->db->get($table);
        $arr=$query->result();
        	
        if($arr)
        $image=$arr[0]->image;
        else
        $image='';
        
        return $image;
    }
    
	/**
	 * Get table records count Method.
	 *
	 * Method to return count of record from table.
	 * @access	public
	 * @param   int
	 * @return	int
	 */
	function get_count_by_job($job_id)
	{
		$this->db->from($this->table);
		$this->db->join('hr_candidate_job', 'hr_candidate_job.candidate_id = hr_candidate.id');
		
		$this->db->where('hr_candidate_job.job_id', $job_id);
		return $this->db->count_all_results();
	}
	

	/**
	 * Get All Record for displaying Method.
	 *
	 * Method to return all record from table page by page by passing table name, start point (no of record select start),
	 * count of rows were displayed per page, name of fields as string -- note -- this field was displayed in dynamic
	 * way so you must carefaul when select it, sort field, and sort type.  
	 *
	 * @access	public
	 * @param   int
	 * @param   int
	 * @param   int
	 * @param   string
	 * @param   string
	 * @param   string
	 * @return	std class array
	 */
	function get_all_display_paging_by_job($job_id, $start, $count_of_rows_per_page, $fields, $sort_field=null, $sort_type=null)
	{
		$this->db->select($fields);
		
		$this->db->from($this->table);
		$this->db->join('hr_candidate_job', 'hr_candidate_job.candidate_id = hr_candidate.id');
		
		$this->db->where('hr_candidate_job.job_id', $job_id);
		
		
    	$this->db->where('hr_candidate.deleted !=', 1);
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
	    $query = $this->db->get();
        return $query->result();
	}
}
?>