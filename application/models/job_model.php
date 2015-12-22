<?php
/**
 * Job Model.
 *
 * It is page model file include the job database process class Job_model.
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
 * Job Model Class.
 *
 * This class manages the processes on the database table job
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Job_model extends My_Model
{
   	/**
	 * store this job table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='hr_job';
	
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
    
	function get_by_candidate( $candidate_id=0)
	{
		$this->db->select('hr_job.*, hr_city_preferred_to_work.name city, hr_city_preferred_to_work.name_ar city_ar');
		$this->db->from($this->table);	
		$this->db->join('hr_city_preferred_to_work', 'hr_city_preferred_to_work.id = hr_job.hr_city_preferred_to_work_id', 'left');
		
		$this->db->join('hr_candidate_job', 'hr_candidate_job.job_id = hr_job.id', 'left');
		$this->db->where("hr_candidate_job.candidate_id", $candidate_id);
     	$this->db->where("hr_job.approved", 1);
     	$this->db->where('hr_job.deleted !=', 1);
     	
    	$query = $this->db->get();
        return $query->result();
	}
	
	function get_by_ids_arr( $ids_arr=array(0))
	{
		$this->db->select('hr_job.*, hr_city_preferred_to_work.name city, hr_city_preferred_to_work.name_ar city_ar');
		$this->db->from($this->table);	
		$this->db->join('hr_city_preferred_to_work', 'hr_city_preferred_to_work.id = hr_job.hr_city_preferred_to_work_id', 'left');
		
		$this->db->where_in("hr_job.id", $ids_arr);
     	$this->db->where("hr_job.approved", 1);
     	$this->db->where('hr_job.deleted !=', 1);
     	
    	$query = $this->db->get();
        return $query->result();
	}
	
	function get_all_approved( $sort_field=null, $sort_type=null)
	{
		$this->db->select('hr_job.*, hr_city_preferred_to_work.name city, hr_city_preferred_to_work.name_ar city_ar');
		$this->db->from($this->table);	
		$this->db->join('hr_city_preferred_to_work', 'hr_city_preferred_to_work.id = hr_job.hr_city_preferred_to_work_id', 'left');
		
     	$this->db->where("hr_job.approved", 1);
     	$this->db->where('hr_job.deleted !=', 1);
     	
     	
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
    
	function get_all_professional_approved( $sort_field=null, $sort_type=null)
	{
		$this->db->select('hr_job.*, hr_city_preferred_to_work.name city, hr_city_preferred_to_work.name_ar city_ar');
		$this->db->from($this->table);	
		$this->db->join('hr_city_preferred_to_work', 'hr_city_preferred_to_work.id = hr_job.hr_city_preferred_to_work_id', 'left');
		
		$this->db->where("hr_job.hr_employment_type_id", 1);
     	$this->db->where("hr_job.approved", 1);
     	$this->db->where('hr_job.deleted !=', 1);
     	
     	
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
	
	function get_all_internship_approved( $sort_field=null, $sort_type=null)
	{
		$this->db->select('hr_job.*, hr_city_preferred_to_work.name city, hr_city_preferred_to_work.name_ar city_ar');
		$this->db->from($this->table);	
		$this->db->join('hr_city_preferred_to_work', 'hr_city_preferred_to_work.id = hr_job.hr_city_preferred_to_work_id', 'left');
		
		$this->db->where("hr_job.hr_employment_type_id", 2);
     	$this->db->where("hr_job.approved", 1);
     	$this->db->where('hr_job.deleted !=', 1);
     	
     	
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
		
	/**
	 * Get all records to display in table.
	 *
	 * Method to return records from table by condition.  
	 * @access	public
	 * @param   string
	 * @param   int
	 * @param   int
	 * @param   string
	 * @param 	string
	 * @return	array
	 */
	function get_all_display_paging_search($condition, $start, $end, $order=null, $order_type=null)
	{
	   	$this->db->select('hr_job.*, hr_city_preferred_to_work.name city, hr_city_preferred_to_work.name_ar city_ar');
		$this->db->from($this->table);	
		$this->db->join('hr_city_preferred_to_work', 'hr_city_preferred_to_work.id = hr_job.hr_city_preferred_to_work_id', 'left');

		$this->db->where($condition);
	 	$this->db->limit($end, $start);
		if($order==null) {
			$this->db->order_by("hr_job.sort", "desc");
	 	} else {
	 		if($order_type==null) {
	 			$this->db->order_by($order, "asc");
	 		} else {
	 			$this->db->order_by($order, $order_type);
	 		}
	 	}
		$query = $this->db->get();
    	return $query->result();
	}
		
	
	/**
	 * Get record by its alias Method.
	 *
	 * Method to return record record fields from table by passing table name and record alias.  
	 *
	 * @access	public
	 * @param   string
	 * @param   string
	 * @return	int
	 */
	function get_by_alias($alias, $table='')
    {
	    $this->db->select('hr_job.*, hr_city_preferred_to_work.name city, hr_city_preferred_to_work.name_ar city_ar, 
	    hr_employment_status.name employment_status, hr_employment_status.name_ar employment_status_ar,
	    hr_employment_type.name employment_type, hr_employment_type.name_ar employment_type_ar,
	    hr_department.name department, hr_department.name_ar department_ar,
	   	hr_business_line.name business_line, hr_business_line.name_ar business_line_ar,
	    industry.title industry, industry.title_ar industry_ar
	    
	    ');
		
	    $this->db->join('hr_city_preferred_to_work', 'hr_city_preferred_to_work.id = hr_job.hr_city_preferred_to_work_id', 'left');
	    $this->db->join('hr_employment_status', 'hr_employment_status.id = hr_job.hr_employment_status_id', 'left');
	    $this->db->join('hr_employment_type', 'hr_employment_type.id = hr_job.hr_employment_type_id', 'left');
	    $this->db->join('hr_department', 'hr_department.id = hr_job.hr_department_id', 'left');
	    $this->db->join('hr_business_line', 'hr_business_line.id = hr_job.line_of_business_id', 'left');
	    $this->db->join('industry', 'industry.id = hr_job.industry_id', 'left');
	    
	    $this->db->from($this->table);
	    $this->db->where("hr_job.alias", $alias);
	    $query = $this->db->get();
        return ($query->num_rows > 0) ? $query->row() : array();
	 }
	 
}
?>