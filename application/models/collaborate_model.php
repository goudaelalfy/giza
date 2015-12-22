<?php
/**
 * Collaborate Model.
 *
 * It is page model file include the collaborate database process class Collaborate_model.
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
 * Collaborate Model Class.
 *
 * This class manages the processes on the database table collaborate
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Collaborate_model extends My_Model
{
   	/**
	 * store this collaborate table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='collaborate';
	
	/**
	 * Constructor
	 *
	 * @access public
	*/
	function Main_model()
	{
		parent::__construct();
	}
		
}
?>