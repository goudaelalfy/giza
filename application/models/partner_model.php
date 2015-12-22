<?php
/**
 * Partner Model.
 *
 * It is partner model file include the partner database process class partner_model.
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
 * Partner Model Class.
 *
 * This class manages the processes on the database table partner
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Partner_model extends My_Model
{
	/**
	 * store this partner table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='partner';
   	
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
     	$query = $this->db->get('partner');
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
		$this->db->from('partner');
		return $this->db->count_all_results();
    }
    
	function get_by_username_and_password($username,$password)
    {
		$this->db->select('*');
    	$this->db->where("username", $username);
		$this->db->where("password", $password);
		$this->db->where("active", 1);
    	$query = $this->db->get('partner');
        return ($query->num_rows > 0) ? $query->row() : array();
    }
    
	function get_by_email($contact_email)
    {
		$this->db->select('*');
    	$this->db->where("contact_email", $contact_email);
		$this->db->where("active", 1);
    	$query = $this->db->get('partner');
        return ($query->num_rows > 0) ? $query->row() : array();
    }
	function get_partner_industries_by_id($id)
	{
	    $this->db->select('partner_industries.*, industry.title, industry.title_ar');
	    $this->db->from('partner_industries');
	    $this->db->join('industry', 'partner_industries.industry_id = industry.id');
	    $this->db->where("partner_industries.partner_id", $id);
	     $this->db->where("industry.approved", 1);
     	$this->db->where('industry.deleted !=', 1);
	    $query = $this->db->get();
        return $query->result();
	}
	
	function get_partner_solutions_by_id($id)
	{
	    $this->db->select('partner_solutions.*, solution.title, solution.title_ar');
	    $this->db->from('partner_solutions');
	    $this->db->join('solution', 'partner_solutions.solution_id = solution.id');
	    $this->db->where("partner_solutions.partner_id", $id);
	     $this->db->where("solution.approved", 1);
     	$this->db->where('solution.deleted !=', 1);
	    $query = $this->db->get();
        return $query->result();
	}
	
	function get_by_industry_id($industry_id)
	{
	    $this->db->select('partner.*');
	    $this->db->from('partner');
	    $this->db->join('partner_industries', 'partner_industries.partner_id = partner.id');
	    $this->db->where("partner_industries.industry_id", $industry_id);
	    $this->db->where("partner.approved", 1);
	    $this->db->where('partner.deleted !=', 1);
	    $query = $this->db->get();
	        return $query->result();
	}
	
	function get_by_solution_id($solution_id)
	{
	    $this->db->select('partner.*');
	    $this->db->from('partner');
	    $this->db->join('partner_solutions', 'partner_solutions.partner_id = partner.id');
	    $this->db->where("partner_solutions.solution_id", $solution_id);
	    $this->db->where("partner.approved", 1);
	    $this->db->where('partner.deleted !=', 1);
	    $query = $this->db->get();
	        return $query->result();
	}
	
	function get_by_name_like($alpha)
	{
	    $this->db->select('partner.*');
	    $this->db->from('partner');
	    $this->db->where("partner.name like '$alpha%'");
	    $this->db->where("partner.approved", 1);
	    $this->db->where('partner.deleted !=', 1);
	    $query = $this->db->get();
	    return $query->result();
	}
	
	function get_by_array($partner_ids_arr)
    {
    	$this->db->select('*');
     	$this->db->from($this->table);
    	$this->db->where_in('id', $partner_ids_arr);
    	
    	$query = $this->db->get(); 

        return $query->result();	    	
    }
    
	function activate($active_code ,$data)
	{
	   	$this->db->where('active_code', $active_code);
        return $this->db->update($this->table, $data); 
	}
	
	/**
	 * Method to get logo path from table by id
	 * 
	 * @access public
	 * @param string table name
	 * @param int it
	 * @return string 
	 */
	function get_logo_by_id($table, $id)
    {
    	$this->db->select('`logo`');
    	$this->db->where("id", $id);
     	$query = $this->db->get($table);
        $arr=$query->result();
        	
        if($arr)
        $logo=$arr[0]->logo;
        else
        $logo='';
        
        return $logo;
    }

}
?>