<?php
/**
 * Client_survey_answer Model.
 *
 * It is page model file include the client_survey_answer database process class Client_survey_answer_model.
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
 * Client_survey_answer Model Class.
 *
 * This class manages the processes on the database table client_survey_answer
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Client_survey_answer_model extends My_Model
{
   	/**
	 * store this client_survey_answer table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='client_survey';
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	function Main_model()
	{
		parent::__construct();
	}

	function delete_by_client($client_id)
	{
	    $this->db->where("client_id", $client_id);
    	return $this->db->delete($this->table);
	}
	
	function get_by_client($client_id)
	{
	    $this->db->select('*');
	    $this->db->from($this->table);
	    $this->db->where("client_id", $client_id);
	    $query = $this->db->get();
        return $query->result();
	}
}
?>