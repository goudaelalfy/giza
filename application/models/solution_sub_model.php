<?php
/**
 * Solution_sub Model.
 *
 * It is solution_sub model file include the solution_sub database process class Solution_sub_model.
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
 * Solution_sub Model Class.
 *
 * This class manages the processes on the database table solution_sub
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Solution_sub_model extends My_Model
{
	/**
	 * store this solution_sub table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='solution_sub';
   	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	function Main_model()
	{
		parent::__construct();
	}
		
	/**
	 * Get All By Solution_id Method.
	 *
	 * Method to return all record from solution_sub table by foreign key solution_id. 
	 *
	 * @access	public
	 * @param   int
	 * @return	std class array
	 */
	public function get_all_by_solution_id($table, $solution_id)
	{
		if($table=='') {
			$table=$this->table;
		}
	    $this->db->select('*');
     	$this->db->where("solution_id", $solution_id);
     	$this->db->where('deleted !=', 1);
     	$this->db->order_by("sort");
    	$query = $this->db->get($table);
        return $query->result();
	}
	
	/**
	 * Get maximum sort Method.
	 *
	 * Method to return maximum sort from table.
	 * @access	private
	 * @param   string
	 * @return	int
	 */
	function get_max_sort($table)
	{
    	$this->db->select_max('sort');
     	$query = $this->db->get($table);
        $max_sort_arr=$query->result();
        $max_sort=$max_sort_arr[0]->sort;
        return $max_sort;
	}
	
	/**
	 * Get records count by alias and solution_id Method.
	 *
	 * Method to return count of record from table by alias, to prevent duplication of aliases.  
	 *, pass id to ignore this id alias when update it.
	 * @access	public
	 * @param   string
	 * @param   int
	 * @param   string
	 * @return	int
	 */
	function get_count_by_solution_and_alias($table='', $id, $solution_id, $alias)
    {
    	if($table=='') {
			$table=$this->table;
		}
		$this->db->where("alias", $alias);
		$this->db->where("solution_id", $solution_id);
		$this->db->where('deleted !=', 1);
    	if($id!=0){
			$this->db->where("id !=", $id);
		}
		$this->db->from($table);
		return $this->db->count_all_results();
	}
	
	/**
	 * Get sub by solution_alias and its alias Method.
	 *
	 * Method to return record fields from table by passing solution_alias and sub alias.  
	 *
	 * @access	public
	 * @param   string
	 * @param   string
	 * @return	int
	 */
	function get_by_alias($alias_solution='',$alias_solution_sub='')
    {
	    $this->db->select('solution_sub.*');
	    $this->db->from('solution_sub');
	    $this->db->join('solution', 'solution.id = solution_sub.solution_id', 'left');
	    $this->db->where("solution.alias", $alias_solution);
	    $this->db->where("solution_sub.alias", $alias_solution_sub);
	    $query = $this->db->get();
        return ($query->num_rows > 0) ? $query->row() : array();
	 }
}
?>