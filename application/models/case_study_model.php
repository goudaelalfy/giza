<?php
/**
 * Case_study Model.
 *
 * It is case_study model file include the case_study database process class case_study_model.
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
 * Case_study Model Class.
 *
 * This class manages the processes on the database table case_study
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Case_study_model extends My_Model
{
	/**
	 * store this case_study table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='case_study';
   	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	function Main_model()
	{
		parent::__construct();
	}
	
	function updateByAlias($table='', $alias ,$data)
	{	
		if($table=='') {
			$table=$this->table;
		}
		
	   	$this->db->where('alias', $alias);
        return $this->db->update($table, $data); 
	}
	   
	/**
	 * Inserting Record Method and ignore error.
	 *
	 * Method to insert record in database by passing table name and associative arry 
	 * contains the database field name and its value and ignore errors 
	 *
	 * @access	public
	 * @param   string
	 * @param   array
	 * @return	boolean
	 */	
	function insertIgnore($table='', $data)
	{
		if($table=='') {
			$table=$this->table;
		}
	  	$insert_query = $this->db->insert_string($table, $data);
		$insert_query = str_replace('INSERT INTO','INSERT IGNORE INTO',$insert_query);
		return $this->db->query($insert_query);
	}
	
	function get_case_study_solutions_by_id($id)
	{
	    $this->db->select('case_study_solutions.*, solution.title, solution.title_ar');
	    $this->db->from('case_study_solutions');
	    $this->db->join('solution', 'case_study_solutions.solution_id = solution.id');
	    $this->db->where("case_study_solutions.case_study_id", $id);
	    
	    $query = $this->db->get();
        return $query->result();
	}
	
	function get_case_study_industries_by_id($id)
	{
	    $this->db->select('case_study_industries.*, industry.title, industry.title_ar');
	    $this->db->from('case_study_industries');
	    $this->db->join('industry', 'case_study_industries.industry_id = industry.id');
	    $this->db->where("case_study_industries.case_study_id", $id);
	    
	    $query = $this->db->get();
        return $query->result();
	}
	
	function get_by_client($client_id)
    {
    	$this->db->select('*');
    	$this->db->from($this->table);
    	
    	$this->db->where('client_id', $client_id);
    	$this->db->where("approved", 1);
    	$this->db->where('deleted !=', 1);
     	$this->db->order_by("id", "desc");
    	$query = $this->db->get();
        return $query->result();
    }
    
	function get_by_industry($industry_id)
    {
    	$this->db->select('*');
    	$this->db->from($this->table);
    	$this->db->join('case_study_industries', 'case_study_industries.case_study_id = case_study.id');
    	
    	$this->db->where('case_study_industries.industry_id', $industry_id);
    	$this->db->where("approved", 1);
    	$this->db->where('deleted !=', 1);
     	$this->db->order_by("id", "desc");
    	$query = $this->db->get();
        return $query->result();
    }
    
	function get_by_solution($solution_id)
    {
    	$this->db->select('*');
    	$this->db->from($this->table);
    	$this->db->join('case_study_solutions', 'case_study_solutions.case_study_id = case_study.id');
    	
    	$this->db->where('case_study_solutions.solution_id', $solution_id);
    	$this->db->where("approved", 1);
    	$this->db->where('deleted !=', 1);
     	$this->db->order_by("id", "desc");
    	$query = $this->db->get();
        return $query->result();
    }
    
	function get_by_condition($condition)
    {
    	$this->db->distinct();
    	$this->db->select('case_study.id, case_study.alias, case_study.title, case_study.title_ar');
    	$this->db->from($this->table);
    	$this->db->join('case_study_industries', 'case_study_industries.case_study_id = case_study.id', 'left');
    	$this->db->join('case_study_solutions', 'case_study_solutions.case_study_id = case_study.id', 'left');
    	    		    
    	$this->db->where($condition);
    	
     	$this->db->order_by("case_study.id", "desc");
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
	function get_by_alias($alias)
    {
	    $this->db->select('case_study.*, country.name as country_name, country.name_ar as country_name_ar,client.name as client_name, ');
	    $this->db->from('case_study');
	    $this->db->join('client', 'client.id = case_study.client_id', 'left');
	    $this->db->join('country', 'country.id = case_study.country_id', 'left');
	    	    	
	    $this->db->where("case_study.alias", $alias);
	    $query = $this->db->get();
        return ($query->num_rows > 0) ? $query->row() : array();
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
}
?>