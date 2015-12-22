<?php $this->load->view('website/includes/header'); ?>
<?php require_once getcwd().'/css/old/header.php';?>


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
								
								<form action="<?php echo base_url().$this->lang->lang();?>/job/apply/<?php echo $current_alias; ?>" method="post" name="step1" id="step1" >
                                <table width="100%"cellpadding="0" cellspacing="0" style="border-collapse:collapse;" >
                                	<tr>
                                	<td colspan="3" style="color:#7F7F7F; font-size: 10px">
                   					<?php if(isset($message)) {echo $message;} ?>
                   					<br/>
                                	
                                	<div style="float:left; width:100%" align="right">
                                	<div style="width:140px;
													height:26px;
													
													text-align:center
													"
													>
													<a style="text-decoration:none;color:#FFF;" href ="javascript:void(0)" onclick="document.getElementById('dv_share_friend').style.display='block';"><img src="<?php echo base_url();?>css/old/images/friend_share.png" border="0" /></a>
									
									
									
									<div id="dv_share_friend" style="width:210px;
													height:70px;
													border:solid 1px;
													background-color:#EEE;
													border-color:#CCC;
													display:none;
													position: absolute;
													"
													>
										<table>
                                		<tr><td><?php echo lang('email')?>:</td><td><input type="text" name="friend_email" id="friend_email" class="required email" /></td></tr>
                                		<tr><td></td><td align="right" height="50px">
                                		<button value="Share" onclick="document.getElementById('dv_share_friend').style.display='none';" class="btnsubmit" name="smt_share_with_friend" id="smt_share_with_friend">Share</button>
                                         </td></tr>
                                		
                                		</table>
                                				
													
									</div>
                                	</div>
                                	
                                	</td>
                                	</tr>
                                	<tr>
                                    		<td valign="top" align="left" style="padding-left:20px;">
											<div class="breackform"></div>
                                        	<div class="divtitleform"><?php echo lang('title'); ?></div>
                                            <div class="conform"><?php echo $title; ?></div>
                                            
                                           	<div class="breackform"></div>
                                        	<div class="divtitleform"><?php echo lang('reference'); ?></div>
                                            <div class="conform"><?php echo $reference; ?></div>
                                            
                                          	<div class="breackform"></div>
                                        	<div class="divtitleform"><?php echo lang('hr_employment_status'); ?></div>
                                            <div class="conform"><?php echo $employment_status; ?></div>
                                            
                                            <div class="breackform"></div>
                                        	<div class="divtitleform">Job Location:</div>
                                            <div class="conform"><?php echo $city; ?></div>
                                            
                                            <div class="breackform"></div>
                                        	<div class="divtitleform">Department (if applicable):</div>
                                            <div class="conform"><?php echo $department; ?></div>
                                            
                                            
                                            <div class="breackform"></div>
                                        	<div class="divtitleform"><?php echo lang('description'); ?></div>
                                            <div class="conform"><?php echo $description; ?></div>
                                            
                                            <div class="breackform"></div>
                                        	<div class="divtitleform">Industry (if applicable):</div>
                                            <div class="conform"><?php echo $industry; ?></div>
                                            
                                            <div class="breackform"></div>
                                        	<div class="divtitleform">Line of Business/Offering (if applicable):</div>
                                            <div class="conform"><?php echo $business_line; ?></div>
                                            
                                            <div class="breackform"></div>
                                        	<div class="divtitleform">Desired Qualifications:</div>
                                            <div class="conform"><?php echo $qualifications; ?></div>
                                            
                                            <div class="breackform"></div>
                                        	<div class="divtitleform"><?php echo lang('hr_employment_type'); ?></div>
                                            <div class="conform"><?php echo $employment_type; ?></div>
                                            
											                              				
                                            
                                          </td>
                                       </tr>
                                       <tr height="100px">
                                       		
                                           	<td>
                                           
                                           <?php 

                                           $this_job_added_to_cart=false;
                                           if(isset($_SESSION['jobs_cart'])) {
                                           	$jobs_cart_arr= $_SESSION['jobs_cart'];
                                           	foreach($jobs_cart_arr as $jobs_cart) {
                                           		if($jobs_cart==$id) {
                                           			$this_job_added_to_cart=true;
                                           		}
                                           	}
                                           }
                                           	if(!$this_job_added_to_cart) {
                                           ?>
													<div style="float:left; width:30%" align="center">
                                                    <div style="width:140px;
													height:26px;
													border:1px;
													border-color:#00b4e4;
													background-color:#00a4e4;"
													>
													<a style="text-decoration:none;color:#FFF;" href="<?php echo base_url().$this->lang->lang();?>/job/addtocart/<?php echo $alias;?>"><img src="<?php echo base_url();?>css/old/images/add_job_cart.png" border="0" /> </a>
													</div>
													</div>
													                          
											<?php //echo $s;
                                           	}
                                           
											?>	                          
													                                                    
                                                    <div style="float:left; width:20%" align="center">
                                                    <!--
                                                    {if $jobs_cart_arr}
													<div style="width:125px;
													height:26px;
													border:1px;
													border-color:#00b4e4;
													background-color:#00a4e4;" 
													>                                                   
													<a style="text-decoration:none;color:#FFF;" href="jobs-cart">View my Job Cart </a>
													</div>
                                                    {/if}
                                                    -->
                                                    </div>
                                                    
                                                    
                                                    <div class="conform" style="float:left; width:10%; font-size: 10px" align="right" >
                                                    <?php if($this->session->userdata('candidate_session_id')) {
                                                    $candidate_id=$this->session->userdata('candidate_session_id');
                                                    $candidate_job_rows=$this->Candidate_job_model->get_by_candidate_and_job($candidate_id, $id);
													if(count($candidate_job_rows)>0) {
                                                    ?>
                                                    You Are Already Applied
                                                    <?php 
													} else {
                                                    ?>
                                                    <button value="Apply" class="btnsubmit" name="smt_apply" id="smt_apply">Apply</button>
                                                    <?php }
                                                    } else {
                                                    ?>
                                                   
                                                    <div style="width:130px;
													height:26px;
													
													" 
													>                                                    
													<a style="text-decoration:none;color:#FFF;" href="<?php echo base_url().$this->lang->lang();?>/candidate/profile"><img src="<?php echo base_url();?>css/old/images/register_to_apply.png" border="0" /></a>
													</div>
                                                    <?php }?>
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
	