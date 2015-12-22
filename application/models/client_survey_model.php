<?php
/**
 * Client_survey Model.
 *
 * It is client_survey model file include the client_survey database process class Client_survey_model.
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
 * Client_survey Model Class.
 *
 * This class manages the processes on the database table client_survey
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Client_survey_model extends My_Model
{
   	/**
	 * store this client_survey_question table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='client_survey_question';
	
	/**
	 * store this client_survey_answer table name.
	 *
	 * @var string
	 * @access public
	 */
	public $client_survey_answer_table='client_survey_answer';
	
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	function Main_model()
	{
		parent::__construct();
	}
	
	function get_answers_by_id($id)
	{
	    $this->db->select('*');
	    $this->db->from('client_survey_answer');
	    $this->db->where("question_id", $id);
	    //$this->db->where("page_type.approved", 1);
     	//$this->db->where('page_type.deleted !=', 1);
     	$this->db->order_by("sort");
	    $query = $this->db->get();
        return $query->result();
	}
	
	function insert_answers($question_id, $data)
	{
	  	$this->delete_answers($question_id);
	    foreach($data as $row) {
	       	$this->db->insert('client_survey_answer', $row);
	    }
	}
	function delete_answers($question_id)
	{
	    $this->db->where("question_id", $question_id);
    	return $this->db->delete("client_survey_answer");
	}
	
	function insert_answer($data)
	{
	   	$this->db->insert('client_survey_answer', $data);
	}
	function update_answer($answer_id, $data)
	{
		$this->db->where('id', $answer_id);
	   	$this->db->update('client_survey_answer', $data);
	}
	function delete_answer_by_question_and_sort($question_id, $sort)
	{
	    $this->db->where("question_id", $question_id);
	    $this->db->where("sort", $sort);
	    return $this->db->delete("client_survey_answer");
	}
	function delete_answer_by_question_and_id($question_id, $answer_id)
	{
	    $this->db->where("question_id", $question_id);
	    $this->db->where("id", $answer_id);
	    return $this->db->delete("client_survey_answer");
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
    
	function get_all_display_paging_approved($table='', $start, $count_of_rows_per_page, $fields, $sort_field=null, $sort_type=null)
	{
		if($table=='') {
			$table=$this->table;
		}
		
	    $this->db->select($fields);
    	$this->db->where('deleted !=', 1);
    	$this->db->where('approved', 1);
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
	    $query = $this->db->get($table);
        return $query->result();
	}
			
}
?>