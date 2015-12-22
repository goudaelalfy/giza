<?php
class User_group_model extends CI_Model
{
   	
		function __construct()
		{
			parent::__construct();
		}
		
		
	 	function insert($data)
	    {
	       return $this->db->insert('user_group', $data);
	    }

		function insert_privielges($data)
	    {
	       return $this->db->insert('user_group_screen_privielge', $data);
	    }
	    
	    function update($id,$data)
	    {	
	    	$this->db->where('id', $id);
        	return $this->db->update('user_group', $data); 
	    }
	    
		function update_privielges($user_group_id, $screen_id, $data)
	    {
	    	if($this->get_screen_id_by_user_group_id_screen_id($user_group_id, $screen_id)==0) {
	    		$this->insert_privielges($data);
	    	} else {
	       	$this->db->where('user_group_id', $user_group_id);
	       	$this->db->where('screen_id', $screen_id);
        	return $this->db->update('user_group_screen_privielge', $data);
	    	} 
	    }
	    
		function get_screen_id_by_user_group_id_screen_id($user_group_id,$screen_id)
	    {
	    	$this->db->select('`id`');
	    	$this->db->from('screen');
	    	$this->db->join('user_group_screen_privielge', 'screen.id = user_group_screen_privielge.screen_id','right');
	    	$this->db->where("screen.id", $screen_id);
	    	$this->db->where("user_group_id", $user_group_id);
	    	$query = $this->db->get();
        	$arr=$query->result();
        	
        	if($arr)
        	$id=$arr[0]->id;
        	else
        	$id=0;
        	
        	return $id;
	    }
	    
		function delete($id)
	    {
	    	$this->db->where("id", $id);
    		return $this->db->delete("user_group");
	    }
	    
		function get_all()
	    {
	    	$this->db->select('`id`,`name`');
	    	$this->db->where('deleted !=', 1);
	     	$this->db->order_by("id", "desc");
	    	$query = $this->db->get('user_group');
        	return $query->result();
	    }

	    function get_all_display($order=null,$order_type=null)
	    {
	    	$this->db->select('`id`,`name`');
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
	    	$query = $this->db->get('user_group');
        	return $query->result();
	    }
	    
		function get_all_display_paging($start, $end, $order=null, $order_type=null)
	    {
	    	$this->db->select('`id`,`name`');
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
	    	$query = $this->db->get('user_group');
        	return $query->result();
	    }
	    
	    
		function get_by_id($id)
	    {
	    	$this->db->select('`user_group.id`,`user_group.name`,`user_group.last_user_id`,`user_group.last_modify_date`');
	     	$this->db->from('user_group');	
	    	$this->db->where("user_group.id", $id);
	    	$query = $this->db->get(); 

        	return ($query->num_rows > 0) ? $query->row() : array();
	    	
	    }
	    
	    
		function get_id_by_name($name)
	    {
	    	$this->db->select('`id`');
	    	$this->db->where("name", $name);
	     	$query = $this->db->get('user_group');
        	$arr=$query->result();
        	
        	if($arr)
        	$id=$arr[0]->id;
        	else
        	$id=0;
        	
        	return $id;
	    }
	   
		function get_count_by_name($id,$name)
	    {
			$this->db->where("name", $name);
	    	if($id!=0)
			{
				$this->db->where("id !=", $id);
			}
			$this->db->from('user_group');
			return $this->db->count_all_results();
	    }
	    
		function get_count()
		{
			$this->db->from('user_group');
			$this->db->where('deleted !=', 1);
			return $this->db->count_all_results();
		}
	    
		function get_max_id()
	    {
	    	$this->db->select_max('id');
	     	$query = $this->db->get('user_group');
        	$max_id_arr=$query->result();
        	$max_id=$max_id_arr[0]->id;
        	return $max_id;
	    }
	    
		function get_min_id()
	    {
	    	$this->db->select_min('id');
	     	$query = $this->db->get('user_group');
        	$min_id_arr=$query->result();
        	$min_id=$min_id_arr[0]->id;
        	return $min_id;
	    }
		
	    
	    
	    
		function get_screens_by_user_group_id($parent_id,$user_group_id)
	    {
	    	$this->db->select('`id`,`code`,`name`,`name_ar`,`view`,`add`,`edit`,`delete`,`cancel`');
	    	$this->db->from('screen');
	    	$this->db->join('user_group_screen_privielge', 'screen.id = user_group_screen_privielge.screen_id','right');
	    	$this->db->where("parent_id", $parent_id);
	    	$this->db->where("user_group_id", $user_group_id);
	    	$query = $this->db->get();
        	return $query->result();
	    }



}
?>