<?php
/**
 * Static_page_banner Model.
 *
 * It is static_page_banner model file include the static_page_banner database process class page_model.
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
 * Static_page_banner Model Class.
 *
 * This class manages the processes on the database table static_page_banner
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Static_page_banner_model extends My_Model
{
	/**
	 * store this static_page_banner table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='static_page_banner';
   	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	function Main_model()
	{
		parent::__construct();
	}
	
	function updateByAlias($table='', $alias ,$data)
	{	
		if($table=='') {
			$table=$this->table;
		}
		
	   	$this->db->where('alias', $alias);
        return $this->db->update($table, $data); 
	}
	   
	/**
	 * Inserting Record Method and ignore error.
	 *
	 * Method to insert record in database by passing table name and associative arry 
	 * contains the database field name and its value and ignore errors 
	 *
	 * @access	public
	 * @param   string
	 * @param   array
	 * @return	boolean
	 */	
	function insertIgnore($table='', $data)
	{
		if($table=='') {
			$table=$this->table;
		}
	  	$insert_query = $this->db->insert_string($table, $data);
		$insert_query = str_replace('INSERT INTO','INSERT IGNORE INTO',$insert_query);
		return $this->db->query($insert_query);
	}
	
	/**
	 * Get record id by its page_code Method.
	 *
	 * Method to return record id from table by passing table name and record page_code.  
	 *
	 * @access	public
	 * @param   string
	 * @param   string
	 * @return	int
	 */
	function get_id_by_page_code($table='', $page_code)
    {
    	if($table=='') {
			$table=$this->table;
		}
	    $this->db->select('`id`');
	    $this->db->where("page_code", $page_code);
	    $query = $this->db->get($table);
        $arr=$query->result();
        	
        if($arr)
        $id=$arr[0]->id;
        else
        $id=0;
        	
        return $id;
	 }
	   
	 
	/**
	 * Get record by its page_code Method.
	 *
	 * Method to return record record fields from table by passing table name and record page_code.  
	 *
	 * @access	public
	 * @param   string
	 * @param   string
	 * @return	int
	 */
	function get_by_page_code($page_code, $table='')
    {
    	if($table=='') {
			$table=$this->table;
		}
	    $this->db->select('*');
	    $this->db->where("page_code", $page_code);
	    $query = $this->db->get($table);
        return ($query->num_rows > 0) ? $query->row() : array();
	 }
	 
	/**
	 * Get records count by page_code Method.
	 *
	 * Method to return count of record from table by page_code, to prevent duplication of page_codees.  
	 *, pass id to ignore this id page_code when update it.
	 * @access	public
	 * @param   string
	 * @param   int
	 * @param   string
	 * @return	int
	 */
	function get_count_by_page_code($table='', $id, $page_code)
    {
    	if($table=='') {
			$table=$this->table;
		}
		$this->db->where("page_code", $page_code);
		$this->db->where('deleted !=', 1);
    	if($id!=0){
			$this->db->where("id !=", $id);
		}
		$this->db->from($table);
		return $this->db->count_all_results();
	}
		
}
?>