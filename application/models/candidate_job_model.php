<?php
/**
 * Candidate_job Model.
 *
 * It is page model file include the candidate_job database process class Candidate_job_model.
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
 * Candidate_job Model Class.
 *
 * This class manages the processes on the database table candidate_job
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Candidate_job_model extends My_Model
{
   	/**
	 * store this candidate_job table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='hr_candidate_job';
	
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
	function insertIgnore($data)
	{
	  	$insert_query = $this->db->insert_string($this->table, $data);
		$insert_query = str_replace('INSERT INTO','INSERT IGNORE INTO',$insert_query);
		return $this->db->query($insert_query);
	}
	
	function get_by_candidate_and_job($candidate_id,$job_id)
    {
		$this->db->select('*');
    	$this->db->where("candidate_id", $candidate_id);
		$this->db->where("job_id", $job_id);
    	$query = $this->db->get($this->table);
        return ($query->num_rows > 0) ? $query->row() : array();
    }
    

}
?>