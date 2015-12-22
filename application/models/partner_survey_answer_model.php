<?php
/**
 * Partner_survey_answer Model.
 *
 * It is page model file include the partner_survey_answer database process class Partner_survey_answer_model.
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
 * Partner_survey_answer Model Class.
 *
 * This class manages the processes on the database table partner_survey_answer
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Partner_survey_answer_model extends My_Model
{
   	/**
	 * store this partner_survey_answer table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='partner_survey';
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	function Main_model()
	{
		parent::__construct();
	}
		
	function delete_by_partner($partner_id)
	{
	    $this->db->where("partner_id", $partner_id);
    	return $this->db->delete($this->table);
	}
	
	function get_by_partner($partner_id)
	{
	    $this->db->select('*');
	    $this->db->from($this->table);
	    $this->db->where("partner_id", $partner_id);
	    $query = $this->db->get();
        return $query->result();
	}
}
?>