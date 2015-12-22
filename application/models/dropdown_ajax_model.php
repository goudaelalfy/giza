<?php
class Dropdown_ajax_model extends CI_Model
{
   	
		function __construct()
		{
			parent::__construct();
		}

		function get_all_cities_by_country($country_id)
	    {
	    	$this->db->select('`id`,`name`');
	    	$this->db->where("city.country_id", $country_id);
	     	$this->db->order_by("id", "desc");
	    	$query = $this->db->get('city');
        	return $query->result();
	    }
		
}
?>