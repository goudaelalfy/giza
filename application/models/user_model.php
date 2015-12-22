<?php
class User_model extends CI_Model
{
   	
		function User_model()
		{
			parent::__construct();
		}
		
		
	 	function insert($data)
	    {
	       return $this->db->insert('user', $data);
	    }

	    function update($id,$data)
	    {	
	    	$this->db->where('id', $id);
        	return $this->db->update('user', $data); 
	    }
	    
		function delete($id)
	    {
	    	$this->db->where("id", $id);
    		return $this->db->delete("user");
	    }
	    
		function get_all()
	    {
	    	$this->db->select('`id`,`username`,`password`,`name`,`mobile`,`telephone`,`email`,`address`,`user_group_id`,`admin`');
	     	$this->db->where('deleted !=', 1);
	    	$this->db->order_by("id", "desc");
	    	$query = $this->db->get('user');
        	return $query->result();
	    }
	    
		function get_all_active()
	    {
	    	$this->db->select('`id`,`username`,`password`,`name`,`mobile`,`telephone`,`email`,`address`,`user_group_id`,`admin`');
	     	$this->db->where("are_canceled", 0);
	     	$this->db->order_by("id", "desc");
	    	$query = $this->db->get('user');
        	return $query->result();
	    }
	    
		function get_all_display($order=null,$order_type=null)
	    {
	    	$this->db->select('`id`,`username`,`name`,`mobile`,`email`');
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
	    	$query = $this->db->get('user');
        	return $query->result();
	    }
	    
		function get_all_display_paging($start, $end, $order=null, $order_type=null)
	    {
	    	$this->db->select('`id`,`username`,`name`,`mobile`,`email`');
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
	    	$query = $this->db->get('user');
        	return $query->result();
	    }
	    
		function get_all_display_active()
	    {
	    	$this->db->select('`id`,`username`,`name`,`mobile`,`email`,`address`');
	    	$this->db->where("are_canceled", 0);
	     	$this->db->order_by("id", "desc");
	    	$query = $this->db->get('user');
        	return $query->result();
	    }
	    
	    
		function get_by_id($id)
	    {
	    	$this->db->select('`user.id`,`user.username`,`user.password`,`user.name`,`user.mobile`,`user.telephone`,`user.email`,`user.address`,`user.user_group_id`, `admin`,`user.last_modify_date`,`user_group.name` as `group`');
	     	$this->db->from('user');	
	    	$this->db->join('user_group', 'user_group.id = user.user_group_id', 'left');
	    	$this->db->where("user.id", $id);
	    	$query = $this->db->get(); 

        	return ($query->num_rows > 0) ? $query->row() : array();
	    	
	    }
	    
	    
		function get_id_by_username($username)
	    {
	    	$this->db->select('`id`');
	    	$this->db->where("username", $username);
	     	$query = $this->db->get('user');
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
			$this->db->from('user');
			return $this->db->count_all_results();
	    }
	    
		function get_by_username_and_password($username,$password)
	    {
			$this->db->select('*');
	    	$this->db->where("username", $username);
			$this->db->where("password", $password);
	    	$query = $this->db->get('user');
        	return ($query->num_rows > 0) ? $query->row() : array();
	    }
	    
		function get_count()
		{
			$this->db->from('user');
			$this->db->where('deleted !=', 1);
			return $this->db->count_all_results();
		}
	    
		function get_max_id()
	    {
	    	$this->db->select_max('id');
	     	$query = $this->db->get('user');
        	$max_id_arr=$query->result();
        	$max_id=$max_id_arr[0]->id;
        	return $max_id;
	    }
	    
		function get_min_id()
	    {
	    	$this->db->select_min('id');
	     	$query = $this->db->get('user');
        	$min_id_arr=$query->result();
        	$min_id=$min_id_arr[0]->id;
        	return $min_id;
	    }
	    
		function get_privielges_by_user_id($user_id)
	    {
	    	$this->db->select('`screen_id`,`view`,`add`,`edit`,`delete`,`cancel`');
	    	$this->db->from('user_group_screen_privielge');
	    	$this->db->join('user_group', 'user_group_screen_privielge.user_group_id = user_group.id');
	    	$this->db->join('user', 'user.user_group_id = user_group.id');
	    	$this->db->where("user.id", $user_id);
	    	$query = $this->db->get();
        	return $query->result();
	    }
	    
		function get_privielge_value_by_user_id_and_screen_id($user_id, $screen_id, $privielge)
	    {
	    	$this->db->select($privielge);
	    	$this->db->from('user_group_screen_privielge');
	    	$this->db->join('user_group', 'user_group_screen_privielge.user_group_id = user_group.id');
	    	$this->db->join('user', 'user.user_group_id = user_group.id');
	    	$this->db->where("user.id", $user_id);
	    	$this->db->where("user_group_screen_privielge.screen_id", $screen_id);
	    	$query = $this->db->get();
			$privielge_value_arr=$query->result();
			if(isset($privielge_value_arr[0])) {
        	$privielge_value=$privielge_value_arr[0]->$privielge;
        	 return $privielge_value;
			} else {
        	return 0;
			}
	    }
		
}
?>