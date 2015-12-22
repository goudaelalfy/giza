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
				
				<?php foreach($side_menu_rows as $side_menu_row) {
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
					$menu_homebox_content_fullurl=base_url().$this->lang->lang().'/'.$menu_controller_name.'/content/'.$menu_alias;
				}
				
				$menu_title=substr($menu_title, 0, 25);
				
				if($menu_controller_name=='officeevent') {
					$lnk_class="parent current";
				} else {
					$lnk_class="parent";
				}
				
				echo"
				<a href='$menu_homebox_content_fullurl' class='$lnk_class'>$menu_title</a>
					";
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
					<div class="hint"><?php echo lang('media_center'); ?></div>
					<h1><?php if(isset($title)) {echo $title;} ?></h1>
					
					<br/>
					
					<div class="main-body">
					<div class="list">
					
					
					<table width="100%" align="center" cellspacing="0" style="text-align:left; padding:0px;">

                                    	<tr>

                                        	<td width="16" height="33" style="border-bottom:1px solid #e4e4e4;"></td>

                                            

                                            <td class="tab_button" id='past'>

                                               	<font style="font-size:15px;">

                                                	<?php echo lang('past_events')?>

                                                </font>

                                            </td>

                                            <td width="11" height="33" style="border-bottom:1px solid #e4e4e4;"></td>

                                            <td class="tab_button" id='current' style="background:url('<?php echo base_url();?>css/old/images/tab-inactive_wide.png') bottom left no-repeat; color:#585858;">

                                                <font style="font-size:15px;">

                                                	<?php echo lang('current_events')?>


                                                </font>

                                            </td>

                                            <td width="11" height="33" style="border-bottom:1px solid #e4e4e4;"></td>

                                            <td class="tab_button" id='upcoming' style="background:url('<?php echo base_url();?>css/old/images/tab-inactive_wide.png') bottom left no-repeat; color:#585858;">

                                                <font style="font-size:15px;">

                                                	<?php echo lang('upcoming_events')?>
                                                	

                                                </font>

                                            </td>

                                            <td style="border-bottom:1px solid #e4e4e4;">&nbsp;</td>

                                        </tr>

                                        <tr>

                                        	<td colspan="10" valign="top" height="100" style="border:1px solid #e4e4e4; border-top:0px solid #e4e4e4; padding:0px;">

                                            	<div class="tab_content" id='tabcontent_past' style="width:100%; border:0px; margin:0px;">                                                
					 							
					 							<?php 
												foreach($past_events_rows as $past_events_row) {
												$past_event_id=$past_events_row->id;
								              		
								              	if($this->lang->lang()=='ar') {
								              		$past_event_name=$past_events_row->name_ar;
													$past_event_brief=$past_events_row->brief_ar;
													
												} else {
													$past_event_name=$past_events_row->name;
													$past_event_brief=$past_events_row->brief;
												}
													
								              
						
								              	echo"
								              	<div class='item' style='width:90%; padding:0px 20px;'>
								              	
								              	<br/>
								              	<div  >
												<div  ><font style='color:#00a4e4; font-size:16px;'>$past_event_name</font></div>
												<br/>
												
												<div style='font-size:14px;color:#4a4a4a;'>
													$past_event_brief
												</div>
												
													
												</div>
												<div class='clear'></div>
												<br/><br/>
												
												</div>
												";
													
												}
					 							?>
					 							
					 							</div>




                                                <div class="tab_content" id='tabcontent_current' style="width:100%; border:0px; margin:0px; display:none;">
                                                <?php 
												foreach($current_events_rows as $current_events_row) {
												$current_event_id=$current_events_row->id;
								              		
								              	if($this->lang->lang()=='ar') {
								              		$current_event_name=$current_events_row->name_ar;
													$current_event_brief=$current_events_row->brief_ar;
													
												} else {
													$current_event_name=$current_events_row->name;
													$current_event_brief=$current_events_row->brief;
												}
													
								              
						
								              	echo"
								              	<div class='item' style='width:90%; padding:0px 20px;'>
								              	
								              	<br/>
								              	<div  >
												<div  ><font style='color:#00a4e4; font-size:16px;'>$current_event_name</font></div>
												<br/>
												
												<div style='font-size:14px;color:#4a4a4a;'>
													$current_event_brief
												</div>
																								
													
												</div>
												<div class='clear'></div>
												<br/><br/>
												
												</div>
												";
													
												}
					 							?>
                                                </div>




                                                <div class="tab_content" id='tabcontent_upcoming' style="width:100%; border:0px; margin:0px; display:none;">
                                                <?php 
												foreach($upcoming_events_rows as $upcoming_events_row) {
												$upcoming_event_id=$upcoming_events_row->id;
								              		
								              	if($this->lang->lang()=='ar') {
								              		$upcoming_event_name=$upcoming_events_row->name_ar;
													$upcoming_event_brief=$upcoming_events_row->brief_ar;
													
												} else {
													$upcoming_event_name=$upcoming_events_row->name;
													$upcoming_event_brief=$upcoming_events_row->brief;
												}
													
								              
						
								              echo"
								              	<div class='item' style='width:90%; padding:0px 20px;'>
								              	
								              	<br/>
								              	<div  >
												<div  ><font style='color:#00a4e4; font-size:16px;'>$upcoming_event_name</font></div>
												<br/>
												
												<div style='font-size:14px;color:#4a4a4a;'>
													$upcoming_event_brief
												</div>
											
												</div>
												<div class='clear'></div>
												<br/><br/>
												
												</div>
												";
													
												}
					 							?>
                                                </div>

                                            </td>

                                        </tr>

                                    </table>
					
					
					</div>
					
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
	