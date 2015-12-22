<?php
/**
 * Office_setting Model.
 *
 * It is page model file include the office_setting database process class Office_setting_model.
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
 * Office_setting Model Class.
 *
 * This class manages the processes on the database table office_setting
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Office_setting_model extends My_Model
{

	/**
	 * store this office_setting table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='office_setting';
   	
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
	 * Method to get phone_icon by id.
	 * access public
	 * @param string
	 * @param int
	 */
	function get_phone_icon_by_id($table, $id)
    {
    	$this->db->select('`phone_icon`');
    	$this->db->where("id", $id);
     	$query = $this->db->get($table);
        $arr=$query->result();
        	
        if($arr)
        $phone_icon=$arr[0]->phone_icon;
        else
        $phone_icon='';
        
        return $phone_icon;
    }
    
	/**
	 * Method to get mobile_icon by id.
	 * access public
	 * @param string
	 * @param int
	 */
	function get_mobile_icon_by_id($table, $id)
    {
    	$this->db->select('`mobile_icon`');
    	$this->db->where("id", $id);
     	$query = $this->db->get($table);
        $arr=$query->result();
        	
        if($arr)
        $mobile_icon=$arr[0]->mobile_icon;
        else
        $mobile_icon='';
        
        return $mobile_icon;
    }
    
	/**
	 * Method to get fax_icon by id.
	 * access public
	 * @param string
	 * @param int
	 */
	function get_fax_icon_by_id($table, $id)
    {
    	$this->db->select('`fax_icon`');
    	$this->db->where("id", $id);
     	$query = $this->db->get($table);
        $arr=$query->result();
        	
        if($arr)
        $fax_icon=$arr[0]->fax_icon;
        else
        $fax_icon='';
        
        return $fax_icon;
    }
    
	/**
	 * Method to get email_icon by id.
	 * access public
	 * @param string
	 * @param int
	 */
	function get_email_icon_by_id($table, $id)
    {
    	$this->db->select('`email_icon`');
    	$this->db->where("id", $id);
     	$query = $this->db->get($table);
        $arr=$query->result();
        	
        if($arr)
        $email_icon=$arr[0]->email_icon;
        else
        $email_icon='';
        
        return $email_icon;
    }
}
?>