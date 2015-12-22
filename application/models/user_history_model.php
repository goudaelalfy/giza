<?php
class User_history_model extends CI_Model
{
   	
		function __construct()
		{
			parent::__construct();
		}
		
		
	 	function insert($user_id,  $screen_id,  $screen_function_id,  $the_date, $row_id)
	    {
	    	$data = array(
				'user_id' => $user_id,
				'screen_id' =>$screen_id,
        		'screen_function_id' =>$screen_function_id,
        		'the_date' =>$the_date,
        		'row_id' =>$row_id,
				);
				
	       return $this->db->insert('user_history', $data);
	    }

	    function update($id,$data)
	    {	
	    	$this->db->where('id', $id);
        	return $this->db->update('user_history', $data); 
	    }
	    
		function delete($id)
	    {
	    	$this->db->where("id", $id);
    		return $this->db->delete("user_history");
	    }
	    
		function get_all()
	    {
	    	$this->db->select('*');
	     	$this->db->order_by("id", "desc");
	    	$query = $this->db->get('user_history');
        	return $query->result();
	    }

	    function get_all_display($order=null,$order_type=null)
	    {
	    	$this->db->select('user_history.`id`,user.name as user, user_history.`screen_id`, screen.name as screen, screen.name_ar as screen_ar, `screen_function`.name as screen_function,`screen_function`.name_ar as screen_function_ar,`user_history.the_date`,`user_history.row_id`');
	    	$this->db->from('user_history');
	    	$this->db->join('user', 'user.id = user_history.user_id');
	    	$this->db->join('screen', 'screen.id = user_history.screen_id');
	    	$this->db->join('screen_function', 'screen_function.id = user_history.screen_function_id');
	    	
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
	    	$query = $this->db->get();
        	return $query->result();
	    }
	    
		function get_all_display_paging($start, $end, $order=null, $order_type=null)
	    {
	    	$this->db->select('user_history.`id`,user.name as user, user_history.`screen_id`, screen.name as screen, screen.name_ar as screen_ar, `screen_function`.name as screen_function,`screen_function`.name_ar as screen_function_ar,`user_history.the_date`,`user_history.row_id`');
	    	$this->db->from('user_history');
	    	$this->db->join('user', 'user.id = user_history.user_id');
	    	$this->db->join('screen', 'screen.id = user_history.screen_id');
	    	$this->db->join('screen_function', 'screen_function.id = user_history.screen_function_id');
	    	
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
	    	$query = $this->db->get();
        	return $query->result();
	    }
	    
	    
		function get_by_id($id)
	    {
	    	$this->db->select('`user_history.id`,`user_history.user_id`,`user_history.screen_id`,`user_history.function`,`user_history.the_date`');
	     	$this->db->from('user_history');	
	    	$this->db->where("user_history.id", $id);
	    	$query = $this->db->get(); 

        	return ($query->num_rows > 0) ? $query->row() : array();
	    	
	    }

		function get_count()
		{
			$this->db->from('user_history');
			return $this->db->count_all_results();
		}
	    
		function get_max_id()
	    {
	    	$this->db->select_max('id');
	     	$query = $this->db->get('user_history');
        	$max_id_arr=$query->result();
        	$max_id=$max_id_arr[0]->id;
        	return $max_id;
	    }
	    
		function get_min_id()
	    {
	    	$this->db->select_min('id');
	     	$query = $this->db->get('user_history');
        	$min_id_arr=$query->result();
        	$min_id=$min_id_arr[0]->id;
        	return $min_id;
	    }
		
}
?>