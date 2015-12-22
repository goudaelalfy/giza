<?php
/**
 * Menu_link Model.
 *
 * It is page model file include the menu_link database process class Menu_link_model.
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
 * Menu_link Model Class.
 *
 * This class manages the processes on the database table menu_link
 *
 * @package		models
 * @category	Database
 * @author		Eng Gouda Elalfy <goudaelalfy@hotmail.com>
 */
class Menu_link_model extends My_Model
{

	/**
	 * store this menu_link table name.
	 *
	 * @var string
	 * @access public
	 */
	public $table='menu_link';
   	
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
	 * Get All Record for displaying Method.
	 *
	 * Method to return all record from table page by page by passing table name, start point (no of record select start),
	 * count of rows were displayed per page, name of fields as string -- note -- this field was displayed in dynamic
	 * way so you must carefaul when select it, sort field, and sort type.  
	 *
	 * @access	public
	 * @param   string
	 * @param   int
	 * @param   int
	 * @param   string
	 * @param   string
	 * @param   string
	 * @return	std class array
	 */
	function get_all_display_paging($table='', $start, $count_of_rows_per_page, $fields, $sort_field=null, $sort_type=null)
	{
		if($table=='') {
			$table=$this->table;
		}
		
	    $this->db->select($fields);
    	$this->db->where('deleted !=', 1);
    	//$this->db->where('parent_id', 0);
     	$this->db->limit($count_of_rows_per_page, $start);
    	if($sort_field==null) {
	    	$this->db->order_by("id", "desc");
	    } else {
	     	if($sort_type==null) {
	     		$this->db->order_by($sort_field, "asc");
	     	} else {
	     		$this->db->order_by($sort_field, $sort_type);
	     	}
	    }
	    $query = $this->db->get($table);
        return $query->result();
	}	
	
	/**
	 * Method get parent menu_link, passing id of current to ignore.
	 * 
	 * @access public
	 * @param string $table
	 * @param int $id
	 * @return boolean
	 */
	function get_all_parent($table, $id)
	{
	    $this->db->select('*');
	    $this->db->where("id !=", $id);
	    $this->db->where("parent_id", 0);
	    $this->db->where('deleted !=', 1);
	    $this->db->order_by("id", "desc");
	    $query = $this->db->get($table);
       	return $query->result();
	}
	
	/**
	 * Method get all menu links by passing menu_map_code.
	 * 
	 * @access public
	 * @param int $menu_map_code
	 * @return boolean
	 */
	function get_all_menu_links_by_menu_map($menu_map_code)
	{
	    $this->db->select('menu_link.`id`, menu_link.`controller_name`,  menu_link.`alias`,  menu_link.`parent_id`,  menu_link.`title`,  menu_link.`title_ar`,  menu_link.`sort`, menu_link.`style`,  menu_link.`menu_id`, menu.`title` as menu_title, menu.`title_ar` as menu_title_ar');
	    $this->db->from('menu_link');	
	    $this->db->join('menu', 'menu.id = menu_link.menu_id');
	    $this->db->join('menu_map', 'menu.id = menu_map.menu_id');
	    $this->db->where("menu_map.code", $menu_map_code);
	    $this->db->where('menu_link.deleted !=', 1);
	    $this->db->order_by("sort");
	    $query = $this->db->get();
       	return $query->result();
	}
	
	/**
	 * Method get all menu links by passing menu_id.
	 * 
	 * @access public
	 * @param int $menu_id
	 * @return boolean
	 */
	function get_all_by_menu_id($menu_id)
	{
	    $this->db->select('*');
	    $this->db->from($this->table);	
	    $this->db->where("menu_id", $menu_id);
	    $this->db->where('menu_link.deleted !=', 1);
	    
	    $this->db->order_by("sort");
	    $query = $this->db->get();
       	return $query->result();
	}
	
	/**
	 * Method get all child for menu link by passing menu_link_id.
	 * 
	 * @access public
	 * @param int $menu_link_id
	 * @return boolean
	 */
	function get_all_child($menu_link_id)
	{
	    $this->db->select('menu_link.`id`, menu_link.`controller_name`,  menu_link.`alias`,  menu_link.`parent_id`,  menu_link.`title`,  menu_link.`title_ar`,  menu_link.`sort`,  menu_link.`menu_id`, menu_link.`icon`');
	    $this->db->from('menu_link');	
	    $this->db->where("parent_id", $menu_link_id);
	    $this->db->where('menu_link.deleted !=', 1);
	    
	    $this->db->order_by("sort");
	    $query = $this->db->get();
       	return $query->result();
	}
	
 	/**
	 * Get record by its controller Method.
	 *
	 * Method to return record from table by passing controller name.  
	 *
	 * @access	public
	 * @param   string
	 * @param   int
	 * @return	array
	 */
	function get_by_controller($controller_name='')
    {
    	$this->db->select('*');
     	$this->db->from($this->table);
    	$this->db->where("controller_name", $controller_name);
    	$query = $this->db->get(); 

        return ($query->num_rows > 0) ? $query->row() : array();
    }
    
	/**
	 * Get record by its controller and alias Method.
	 *
	 * Method to return record from table by passing controller name.  
	 *
	 * @access	public
	 * @param   string
	 * @param   int
	 * @return	array
	 */
	function get_by_controller_and_alias($controller_name='', $alias='')
    {
    	$this->db->select('*');
     	$this->db->from($this->table);
    	$this->db->where("controller_name", $controller_name);
    	$this->db->where("alias", $alias);
    	
    	$query = $this->db->get(); 

        return ($query->num_rows > 0) ? $query->row() : array();
    }
    
    
	/**
	 * Method to get icon by id.
	 * access public
	 * @param string
	 * @param int
	 */
	function get_icon_by_id($table, $id)
    {
    	$this->db->select('`icon`');
    	$this->db->where("id", $id);
     	$query = $this->db->get($table);
        $arr=$query->result();
        	
        if($arr)
        $icon=$arr[0]->icon;
        else
        $icon='';
        
        return $icon;
    }
    
}
?>