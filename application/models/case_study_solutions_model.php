<?php
/**
 * case_study_solutions Model.
 *
 * It is page model file include the page_categories database process class case_study_solutions_model.
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
 * case_study_solutions Model Class.
 *
 * This class manages the processes on the database table page_categories
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class case_study_solutions_model extends My_Model
{
   	/**
	 * store this case_study_solutions table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='case_study_solutions';
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	function Main_model()
	{
		parent::__construct();
	}

	
	function insert($case_study_id, $data)
	{
	  $this->delete($case_study_id);
	    	
	    foreach($data as $row)
	    {
	       	$this->db->insert('case_study_solutions', $row);
	    }
	}
	
	function delete($case_study_id)
	{
	    $this->db->where("case_study_id", $case_study_id);
    	return $this->db->delete("case_study_solutions");
	}
	
}
?>