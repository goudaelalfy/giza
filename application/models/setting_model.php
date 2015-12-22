<?php
class Setting_model extends CI_Model
{
   	
		function __construct()
		{
			parent::__construct();
		}
		
	 	function insert($data)
	    {
	       return $this->db->insert('setting', $data);
	    }

	    function update($id,$data)
	    {	
	    	$this->db->where('id', $id);
        	return $this->db->update('setting', $data); 
	    }
	    
		function delete($id)
	    {
	    	$this->db->where("id", $id);
    		return $this->db->delete("setting");
	    }
	    
		function get_by_id($id)
	    {
	    	$this->db->select('*');
	     	$this->db->from('setting');	
	    	$this->db->where("id", $id);
	    	$query = $this->db->get(); 

        	return ($query->num_rows > 0) ? $query->row() : array();
	    	
	    }
	    
		function get_all()
	    {
	    	$this->db->select('*');
	     	$this->db->order_by("id", "desc");
	    	$query = $this->db->get('setting');
        	return $query->result();
	    }

	    
		function get_count()
		{
			$this->db->from('setting');
			return $this->db->count_all_results();
		}
	    
		function get_max_id()
	    {
	    	$this->db->select_max('id');
	     	$query = $this->db->get('setting');
        	$max_id_arr=$query->result();
        	$max_id=$max_id_arr[0]->id;
        	return $max_id;
	    }
	    
		function get_min_id()
	    {
	    	$this->db->select_min('id');
	     	$query = $this->db->get('setting');
        	$min_id_arr=$query->result();
        	$min_id=$min_id_arr[0]->id;
        	return $min_id;
	    }
		
}
?>