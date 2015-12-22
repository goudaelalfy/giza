<?php
/**
 * Pagecat Model.
 *
 * It is page model file include the page_category database process class Page_cat_model.
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
 * Pagecat Model Class.
 *
 * This class manages the processes on the database table page_category
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Pagecat_model extends My_Model
{
   	/**
	 * store this page_category table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='page_category';
	
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