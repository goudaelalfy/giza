<?php
class Screen_model extends CI_Model
{
   	
		function __construct()
		{
			parent::__construct();
		}
		
		
	 	function insert($data)
	    {
	       return $this->db->insert('screen', $data);
	    }

	    function update($id,$data)
	    {	
	    	$this->db->where('id', $id);
        	return $this->db->update('screen', $data); 
	    }
	    
		function delete($id)
	    {
	    	$this->db->where("id", $id);
    		return $this->db->delete("screen");
	    }
	    
		function get_all()
	    {
	    	$this->db->select('`id`,`code`,`name`,`name_ar`,`url`,`parent_id`');
	    	$this->db->where('deleted !=', 1);
	     	$this->db->order_by("id", "desc");
	    	$query = $this->db->get('screen');
        	return $query->result();
	    }

		function get_all_module()
	    {
	    	$this->db->select('`id`,`code`,`name`,`name_ar`,`url`');
	    	$this->db->where("screen.parent_id", 0);
	    	$this->db->where('screen.deleted !=', 1);
	     	$this->db->order_by("sort", "asc");
	    	$query = $this->db->get('screen');
        	return $query->result();
	    }
	    
		function get_all_screen($parent_id)
	    {
	    	$this->db->select('`id`,`code`,`name`,`name_ar`,`url`');
	    	$this->db->where("screen.parent_id ", $parent_id);
	    	$this->db->where('screen.deleted !=', 1);
	     	$this->db->order_by("sort", "asc");
	    	$query = $this->db->get('screen');
        	return $query->result();
	    }
		function get_all_inner_screens()
	    {
	    	$this->db->select('`id`,`code`,`name`,`name_ar`,`url`');
	    	$this->db->where("parent_id !=", 0);
	    	$this->db->where('screen.deleted !=', 1);
	    	$this->db->order_by("sort", "asc");
	    	
	    	$query = $this->db->get('screen');
        	return $query->result();
	    }
	    
		function get_module_id_by_url($url)
		{
			$this->db->select('`parent_id`');
	    	$this->db->where("url", $url);
	     	$query = $this->db->get('screen');
        	$arr=$query->result();
        	
        	if($arr)
        	$module_id=$arr[0]->parent_id;
        	else
        	$module_id=0;
        	
        	if($module_id==0)
        	{
        		$this->db->select('`id`');
		    	$this->db->where("url", $url);
		     	$query = $this->db->get('screen');
	        	$arr=$query->result();
	        	
	        	if($arr)
	        	$module_id=$arr[0]->id;
	        	else
	        	$module_id=0;
        	}
        	
        	return $module_id;
		}
	    
	    function get_all_display($order=null,$order_type=null)
	    {
	    	$this->db->select('`id`,`code`,`name`,`name_ar`,`url`');
	    	$this->db->where('deleted !=', 1);
	     	if($order==null)
	     	{
	    		$this->db->order_by("id", "desc");
	     	}
	     	else 
	     	{
	     		if($order_type==null)
	     		{
	     			$this->db->order_by($order, "asc");
	     		}
	     		else 
	     		{
	     			$this->db->order_by($order, $order_type);
	     		}
	     	}
	    	$query = $this->db->get('screen');
        	return $query->result();
	    }
	    
		function get_all_display_paging($start, $end, $order=null, $order_type=null)
	    {
	    	$this->db->select('`id`,`code`,`name`,`name_ar`,`url`');
	    	$this->db->where('deleted !=', 1);
	     	$this->db->limit($end, $start);
	    	if($order==null)
	     	{
	    		$this->db->order_by("id", "desc");
	     	}
	     	else 
	     	{
	     		if($order_type==null)
	     		{
	     			$this->db->order_by($order, "asc");
	     		}
	     		else 
	     		{
	     			$this->db->order_by($order, $order_type);
	     		}
	     	}
	    	$query = $this->db->get('screen');
        	return $query->result();
	    }
	    
	    
		function get_by_id($id)
	    {
	    	$this->db->select('`screen.id`,`screen.code`,`screen.name`,`screen.name_ar`,`screen.url`,`screen.parent_id`,`screen.last_user_id`,`screen.last_modify_date`');
	     	$this->db->from('screen');	
	    	$this->db->where("screen.id", $id);
	    	$query = $this->db->get(); 

        	return ($query->num_rows > 0) ? $query->row() : array();
	    	
	    }
	    
	    
		function get_id_by_code($code)
	    {
	    	$this->db->select('`id`');
	    	$this->db->where("code", $code);
	     	$query = $this->db->get('screen');
        	$arr=$query->result();
        	
        	if($arr)
        	$id=$arr[0]->id;
        	else
        	$id=0;
        	
        	return $id;
	    }
	    
		function get_url_by_id($id)
		{
			$this->db->select('`url`');
	    	$this->db->where("id", $id);
	     	$query = $this->db->get('screen');
        	$arr=$query->result();
        	
        	if($arr)
        	$url=$arr[0]->url;
        	else
        	$url=0;
        	
        	return $url;
		}
	   
		function get_count_by_code($id,$code)
	    {
			$this->db->where("code", $code);
	    	if($id!=0)
			{
				$this->db->where("id !=", $id);
			}
			$this->db->from('screen');
			return $this->db->count_all_results();
	    }
	    
		function get_count()
		{
			$this->db->from('screen');
			$this->db->where('deleted !=', 1);
			return $this->db->count_all_results();
		}
	    
		function get_max_id()
	    {
	    	$this->db->select_max('id');
	     	$query = $this->db->get('screen');
        	$max_id_arr=$query->result();
        	$max_id=$max_id_arr[0]->id;
        	return $max_id;
	    }
	    
		function get_min_id()
	    {
	    	$this->db->select_min('id');
	     	$query = $this->db->get('screen');
        	$min_id_arr=$query->result();
        	$min_id=$min_id_arr[0]->id;
        	return $min_id;
	    }
		
}
?>