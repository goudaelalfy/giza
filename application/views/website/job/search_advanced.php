<?php $this->load->view('website/includes/header'); ?>
<?php require_once getcwd().'/css/old/header.php';?>

<?php 


/**
 * Dropdowns object.
 * 
 * Intialize object from Dropdowns class which contains methods fill all dropdowns of website.
 * @var object.
 */

$dropdowns= new Dropdowns();

/**
 * Job controller object.
 * 
 * Intialize object from Job controller class.
 * @var object.
 */

$this_object= new Job();


?>


<script type="text/javascript">

function checkUncheckSolutions() 
 {	
	 	{
	    	for (var i = 0; i < document.frm_job_search.elements.length; i++ ) 
		    {
		    	var check_id=document.frm_job_search.elements[i].id;
		    	check_id=check_id.substring(0, 3);

		        if (document.frm_job_search.elements[i].type == 'checkbox' && check_id=='sol') 
			    {		        		    
		        	document.frm_job_search.elements[i].checked = document.frm_job_search.elements['all_solutions'].checked; 
		        }

	    	}
	 	}
}
function checkUncheckSubSolutions(id) 
 {
 	document.frm_job_search.elements['all_solutions'].checked=false;
    for (var i = 0; i < document.frm_job_search.elements.length; i++ ) 
    {
    	var check_value=document.frm_job_search.elements[i].value;
    	check_value=check_value.split("_");
    	check_value=check_value[0];
        if (document.frm_job_search.elements[i].type == 'checkbox' && check_value==id) 
	    {		        		    
        	document.frm_job_search.elements[i].checked = document.frm_job_search.elements['solution_'+id].checked; 
        }

    }
 }

										
										
</script>


	<!--container-->
	<div id="container">
		<!--content-->
		<div class="content">
			<!--side-bar-->
			<div id="side-bar">
				<!--main-block-->
				<div class="main-block">
				
				<?php 
				if(isset($side_menu_rows)) {
				foreach($side_menu_rows as $side_menu_row) {
				$menu_alias=$side_menu_row->alias;
				$menu_controller_name=$side_menu_row->controller_name;
				
				if($this->lang->lang()=='ar') {
					$menu_title=$side_menu_row->title_ar;
					
				} else {
					$menu_title=$side_menu_row->title;

				}
				
				if($menu_alias=='') {
					$menu_homebox_content_fullurl=base_url().$this->lang->lang().'/'.$menu_controller_name;
				} else {
					//$menu_homebox_content_fullurl=base_url().$this->lang->lang().'/'.$menu_controller_name.'/content/'.$menu_alias;
					$menu_homebox_content_fullurl=base_url().$this->lang->lang().'/'.$menu_controller_name.'/'.$menu_alias;
				}
				
				$menu_title=substr($menu_title, 0, 25);
				
				if($menu_controller_name=='managementteam') {
					$lnk_class="parent current";
				} else {
					$lnk_class="parent";
				}
				
				echo"
				<a href='$menu_homebox_content_fullurl' class='$lnk_class'>$menu_title</a>
					";
				}
				}
				?>
				
				</div>
				<!--/main-block-->
				
				<!--block-->
				<div class="block">
					<div class="title"><?php echo lang('you_just_viewed')?></div>
					<?php 
					$visited_links_arr=$_SESSION["visited_links"];
					sort($visited_links_arr);
					foreach ($visited_links_arr as $link) {

						$visited_link_title=urldecode($link);
						$visited_link_title= end(explode('/', $visited_link_title));
						$visited_link_title=substr($visited_link_title, 0, 25);
						
						if($visited_link_title=='en' || $visited_link_title=='ar') {
							$visited_link_title=lang('home');
						}
						
					if(!is_numeric($visited_link_title)) {
							$visited_link_title=ucfirst($visited_link_title);
							echo "<a href='$link' class='parent'>$visited_link_title</a>";
						
						}
					}?>
				</div>
				<!--/block-->
				<!--block-->
				<div class="block">
					<div class="title"><?php echo lang('of_further_interest')?></div>
					<a href="#" class="parent">Careers</a>
					<a href="#" class="parent">Power - Case Studies</a>
					<a href="#" class="parent">Power - Case Studies</a>
					<a href="#" class="parent">Water - Case Studies</a>
				</div>
				<!--/block-->
			</div>
			<!--/side-bar-->
			<!--main-->
			<div id="main">
				<div class="main-title">
					<div class="hint"><?php if(isset($parent_link_title)) {echo $parent_link_title;}  ?></div>
					<h1><?php if(isset($title)) {echo $title;} ?></h1>
					
					<div class="main-body">
					

								<div id="preview"></div>
								
								<form action="<?php echo base_url().$this->lang->lang();?>/job/search" method="get" name="frm_job_search" id="frm_job_search" >
                                <table width="100%"cellpadding="0" cellspacing="0" style="border-collapse:collapse;" >
                                	<tr>
                                	<td colspan="3" style="color:#7F7F7F; font-size: 10px">
                   					<?php if(isset($message)) {echo $message;} ?>
                   					<br/>
                                	
                                
                                	</td>
                                	</tr>
                                	<tr>
                                    		<td valign="top" align="left" style="padding-left:20px;">
											<div class="breackform"></div>
                                        	<div class="divtitleform">Keyword</div>
                                            <div class="conform"><input type="text" name="keyword" id="keyword" class="styleinputselect"/></div>
                                            
                                           	<div class="breackform"></div>
                                        	<div class="divtitleform">Industry (if applicable)</div>
                                            <div class="conform"><?php $dropdowns->drpdwn_industry($this_object, '','industry_id', "class='styleinputselect'"); ?>
											</div>
                                            
                                          	<div class="breackform"></div>
                                        	<div class="divtitleform">Line of Business / Offering (if applicable)</div>
                                            <div class="conform">
                                            
                                            <input type="checkbox" name="all_solutions" id="all_solutions" value="0" onclick="checkUncheckSolutions()" checked='ckecked'/>All Solutions   
                                            <div style=" width:100%">
                                            <div style=" width:400px; height:120px; border:1px solid #c1c1c1; overflow:scroll; background:#fff;overflow-x:hidden">
                                                  
                                            <?php 
                                            foreach($solution_rows as $solution_row) {
                                            	$solution_id=$solution_row->id;
                                            if($this->lang->lang()=='ar') {
												$solution_title=$solution_row->title_ar;
											} else {
												$solution_title=$solution_row->title;
											}
                                            ?>
                                            	<div style="float:left; width:100%; height:25px; background:#f3f3f3">
                                            	<input type="checkbox" name="solution_<?php echo $solution_id;?>" id="solution_<?php echo $solution_id;?>" value="<?php echo $solution_id;?>" onclick="checkUncheckSubSolutions(this.value)" /> <?php echo $solution_title;?><br />
                                                </div>
                                                
                                                <?php 
	                                            foreach($business_line_rows as $business_line_row) {
	                                            	$business_line_id=$business_line_row->id;
	                                            	$business_line_solution_id=$business_line_row->solution_id;
	                                            if($this->lang->lang()=='ar') {
													$business_line_name=$business_line_row->name_ar;
												} else {
													$business_line_name=$business_line_row->name;
												}
												
												if($solution_id==$business_line_solution_id) {
	                                            ?>
                                                    <div style="padding-left:15px;"> <input type="checkbox" name="solution_sub_<?php echo $business_line_id;?>" id="solution_sub_<?php echo $business_line_id;?>"  value="<?php echo $solution_id;?>_<?php echo $business_line_id;?>" onclick="javascript:document.getElementById('solution_<?php echo $solution_id;?>').checked = false; document.frm_job_search.elements['all_solutions'].checked=false;" /> <?php echo $business_line_name;?></div>
                                                <?php 
												}
	                                            }
                                                ?>
                                                
                                            <?php 
                                            }
                                            ?>		
                                            
                                            </div>
                                            </div>
                                            </div>
                                            
                                            <div class="breackform"></div>
                                        	<div class="divtitleform">Job Location:</div>
                                            <div class="conform"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_city_preferred_to_work', '', 'city', "class='styleinputselect'"); ?></div>
                                            
                                            <div class="breackform"></div>
                                        	<div class="divtitleform">Department (if applicable):</div>
                                            <div class="conform"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_department', '', 'department',  "class='styleinputselect'"); ?></div>
                                            
                                            <div class="breackform"></div>
                                        	<div class="divtitleform"><?php echo lang('hr_employment_status'); ?></div>
                                            <div class="conform"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_employment_status', '', 'employment_status', "class='styleinputselect'"); ?></div>
                                            
											<div class="breackform"></div>
                                        	<div class="divtitleform"><?php echo lang('hr_employment_type'); ?></div>
                                            <div class="conform"><?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_employment_type', '', 'employment_type', "class='styleinputselect'"); ?></div>
                                            
											                              				
                                            
                                          </td>
                                       </tr>
                                       <tr height="100px">
                                       		
                                           	<td>
                                           
													<div style="float:left; width:30%" align="center">
                                                  
													</div>
													
                                                    <div style="float:left; width:70%" align="right">
                                                    
                                                    <button value="Search" class="btnsubmit" name="smt_serach" id="smt_serach">Search</button>
                                                   
                                                    </div>

                                            </td>
                                       </tr>
                                    </table>
                                    </form>
						

					
					</div>
				</div>
			</div>
			<!--/main-->
			<div class="clear"></div>
		</div>
		<!--/content-->
	</div>
	<!--/container-->
	
<?php $this->load->view('website/includes/footer'); ?>
	