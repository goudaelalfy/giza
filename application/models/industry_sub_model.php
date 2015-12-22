<?php
/**
 * Industry_sub Model.
 *
 * It is industry_sub model file include the industry_sub database process class Industry_sub_model.
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
 * Industry_sub Model Class.
 *
 * This class manages the processes on the database table industry_sub
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Industry_sub_model extends My_Model
{
	/**
	 * store this industry_sub table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='industry_sub';
   	
   	
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
	 * Get All By Industry_id Method.
	 *
	 * Method to return all record from industry_sub table by foreign key industry_id. 
	 *
	 * @access	public
	 * @param   int
	 * @return	std class array
	 */
	public function get_all_by_industry_id($table, $industry_id)
	{
		if($table=='') {
			$table=$this->table;
		}
	    $this->db->select('*');
     	$this->db->where("industry_id", $industry_id);
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
	 * Get records count by alias and industry_id Method.
	 *
	 * Method to return count of record from table by alias, to prevent duplication of aliases.  
	 *, pass id to ignore this id alias when update it.
	 * @access	public
	 * @param   string
	 * @param   int
	 * @param   string
	 * @return	int
	 */
	function get_count_by_industry_and_alias($table='', $id, $industry_id, $alias)
    {
    	if($table=='') {
			$table=$this->table;
		}
		$this->db->where("alias", $alias);
		$this->db->where("industry_id", $industry_id);
		$this->db->where('deleted !=', 1);
    	if($id!=0){
			$this->db->where("id !=", $id);
		}
		$this->db->from($table);
		return $this->db->count_all_results();
	}
	
	/**
	 * Get sub by industry_alias and its alias Method.
	 *
	 * Method to return record fields from table by passing industry_alias and sub alias.  
	 *
	 * @access	public
	 * @param   string
	 * @param   string
	 * @return	int
	 */
	function get_by_alias($alias_industry='',$alias_industry_sub='')
    {
	    $this->db->select('industry_sub.*');
	    $this->db->from('industry_sub');
	    $this->db->join('industry', 'industry.id = industry_sub.industry_id', 'left');
	    $this->db->where("industry.alias", $alias_industry);
	    $this->db->where("industry_sub.alias", $alias_industry_sub);
	    $query = $this->db->get();
        return ($query->num_rows > 0) ? $query->row() : array();
	 }
}
?>