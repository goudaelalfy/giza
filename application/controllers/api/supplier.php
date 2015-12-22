<?php
require(APPPATH.'libraries/REST_Controller.php');
class Supplier extends REST_Controller
{ 	
	/*
	 ?format=json
	 ?format=html
	*/
	function __construct()
	{
		parent::__construct();

		$this->load->helper('language');
		$this->load->helper('url');
		$this->load->library('session');
		
		$this->lang->load('admin');
		
		$this->load->model('Admin_model', 'Admin_model' , True);
		$this->load->model('Supplier_model', 'Supplier_model' , True);
		
	}

	function index_get($order=null, $order_type=null)
	{
		$output='';
		$rows=$this->Supplier_model->get_all_display($order, $order_type); 
		/*
		foreach ($rows as $row)
		{
			foreach ($row as $key=>$value)
			{
				if($key=='name' )
				{
					$output=$output.$value.'<br/>';
				}
			}
		}
		
		 return $output;
		 */
		if($rows)  
        {  
            $this->response($rows, 200); // 200 being the HTTP response code  
        }  
        else  
        {  
            $this->response(NULL, 404);  
        }  
	}
	
	function get_suppliers_get($code=null,$username=null,$password=null)
	{
		
			if($code=='' || $username=='' ||$password=='')
			{
				$output= array('code'=>'101','message'=>'No Authentication Data Sended (Username,Password, And Employee ID).');
				$this->response($output, 200);
			}
			else 
			{
				$employee_id=$this->Admin_model->get_id_by_code_username_password($code,$username,$password);
				if($employee_id==0)
				{
					if(isset($_REQUEST['format']))
					{
						if($_REQUEST['format']=='php')
						{
							$output='Authentication Failed.';
						}
						else
						{
							$output= array('code'=>'102','message'=>'Authentication Failed.');
						}
					}
					else
					{
							$output= array('code'=>'102','message'=>'Authentication Failed.');
					}
					$this->response($output, 200);
				}
				else
				{
					$rows=$this->Supplier_model->get_all(); 
					$row_count=count($rows);
					if($row_count>0)
					{
						$output=array('code'=>'103','message'=>'Data Returned successfully.');
						
						
						$output['result']=$rows;
						
						
						
						if(isset($_REQUEST['format']))
						{
							if($_REQUEST['format']=='php')
							{
								$output='Data Returned successfully';
							}
						}
					}
					else
					{
						if(isset($_REQUEST['format']))
						{
							if($_REQUEST['format']=='php')
							{
								$output='No Supplier.';
							}
							else
							{
								$output= array('code'=>'104','message'=>'No Supplier.');
							}
						}
						else
						{
								$output= array('code'=>'104','message'=>'No Supplier.');
						}
					}
				
					$this->response($output, 200);
				}
			} 
		      
	}
	
	
	function get_categories_get($code=null,$username=null,$password=null, $supplier_id=0)
	{
		
			if($code=='' || $username=='' ||$password=='')
			{
				$output= array('code'=>'101','message'=>'No Authentication Data Sended (Username,Password, And Employee ID).');
				$this->response($output, 200);
			}
			else 
			{
				$employee_id=$this->Admin_model->get_id_by_code_username_password($code,$username,$password);
				if($employee_id==0)
				{
					if(isset($_REQUEST['format']))
					{
						if($_REQUEST['format']=='php')
						{
							$output='Authentication Failed.';
						}
						else
						{
							$output= array('code'=>'102','message'=>'Authentication Failed.');
						}
					}
					else
					{
							$output= array('code'=>'102','message'=>'Authentication Failed.');
					}
					$this->response($output, 200);
				}
				else
				{
					$rows=$this->Supplier_model->get_categories($supplier_id); 
					$row_count=count($rows);
					if($row_count>0)
					{
						$output=array('code'=>'103','message'=>'Data Returned successfully.');
						
						
						$output['result']=$rows;
						
						
						
						if(isset($_REQUEST['format']))
						{
							if($_REQUEST['format']=='php')
							{
								$output='Data Returned successfully';
							}
						}
					}
					else
					{
						if(isset($_REQUEST['format']))
						{
							if($_REQUEST['format']=='php')
							{
								$output='No Categories For This Supplier.';
							}
							else
							{
								$output= array('code'=>'104','message'=>'No Categories For This Supplier.');
							}
						}
						else
						{
								$output= array('code'=>'104','message'=>'No Categories For This Supplier.');
						}
					}
				
					$this->response($output, 200);
				}
			} 
		      
	}
	
	
	function add_get($code=null,$username=null,$password=null, $name=null, $telephones=null, $emails=null, $notes=null)
	{
		
			if($code=='' || $username=='' ||$password=='' || $name=='')
			{
				$output= array('code'=>'101','message'=>'No Authentication Data Sended (Username,Password, And Employee ID). OR Missing Data Must Be Entered');
				$this->response($output, 200);
			}
			else 
			{
				$employee_id=$this->Admin_model->get_id_by_code_username_password($code,$username,$password);
				if($employee_id==0)
				{
					if(isset($_REQUEST['format']))
					{
						if($_REQUEST['format']=='php')
						{
							$output='Authentication Failed.';
						}
						else
						{
							$output= array('code'=>'102','message'=>'Authentication Failed.');
						}
					}
					else
					{
							$output= array('code'=>'102','message'=>'Authentication Failed.');
					}
					$this->response($output, 200);
				}
				else
				{
					
					$data = array(
					'assigned_to'=> $employee_id,
					'name' => $name,
					'telephones' => urldecode($telephones) ,
					'emails' => urldecode($emails) ,
					'notes' => urldecode($notes) ,
					   			);
								
					$saved=$this->Temp_customer_model->insert($data);
								
					if($saved)
					{
						$output=array('code'=>'103','message'=>'Data Saved successfully.');
						
						if(isset($_REQUEST['format']))
						{
							if($_REQUEST['format']=='php')
							{
								$output='Data Saved successfully';
							}
						}
					}
					else
					{
						if(isset($_REQUEST['format']))
						{
							if($_REQUEST['format']=='php')
							{
								$output='Failed Saving Data.';
							}
							else
							{
								$output= array('code'=>'105','message'=>'Failed Saving Data.');
							}
						}
						else
						{
								$output= array('code'=>'105','message'=>'Failed Saving Data.');
						}
					}
				
					$this->response($output, 200);
				}
			} 
		      
	}
	

}