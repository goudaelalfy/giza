<?php
/**
 * Page Model.
 *
 * It is page model file include the page database process class page_model.
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
 * Page Model Class.
 *
 * This class manages the processes on the database table page
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Page_model extends My_Model
{
	/**
	 * store this page table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='page';
   	
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
		
}
?>