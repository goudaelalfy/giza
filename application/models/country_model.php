<?php
/**
 * Country Model.
 *
 * It is country model file include the country database process class country_model.
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
 * Country Model Class.
 *
 * This class manages the processes on the database table country
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Country_model extends My_Model
{
	/**
	 * store this country table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='country';
   	
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