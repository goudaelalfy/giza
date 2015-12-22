<?php
/**
 * Subscriber Model.
 *
 * It is page model file include the subscriber database process class Subscriber_model.
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
 * Subscriber Model Class.
 *
 * This class manages the processes on the database table subscriber
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Subscriber_model extends My_Model
{
   	/**
	 * store this subscriber table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='subscriber';
	
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