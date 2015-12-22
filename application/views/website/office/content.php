<?php $this->load->view('website/includes/header'); ?>

<?php require_once getcwd().'/css/old/header.php';?>


<script src="<?php echo base_url();?>css/old/js/jquery.form.js" type="text/javascript" language="javascript"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/old/css/eventCalendar.css">	
<link rel="stylesheet" href="<?php echo base_url();?>css/old/css/eventCalendar_theme_responsive.css">								

<script language="JavaScript" src="<?php echo base_url();?>css/old/js/calendar_staff/calendar.js"></script>

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
				
				if($menu_controller_name=='office') {
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
					<div class="hint"><?php echo lang('about_giza_systems');?></div>
					<h1><?php if(isset($title)) {echo $title;} ?></h1>
					
					<div class="main-body">
					<div class="list" style="padding:0px 40px;">
					<table>
					<?php 
		              
					$office_setting_phone_icon=base_url();
					$office_setting_mobile_icon=base_url();
					$office_setting_fax_icon=base_url();
					$office_setting_email_icon=base_url();
					
					if(count($office_setting_rows)>0) {
					$office_setting_phone_icon=base_url().$office_setting_rows[0]->phone_icon;
					$office_setting_mobile_icon=base_url().$office_setting_rows[0]->mobile_icon;
					$office_setting_fax_icon=base_url().$office_setting_rows[0]->fax_icon;
					$office_setting_email_icon=base_url().$office_setting_rows[0]->email_icon;
					
					
					}
					
					
					
					foreach($country_rows as $country_row) {
		              	$country_id=$country_row->id;
		              	
		              	if($this->lang->lang()=='ar') {
		              		$country_name=$country_row->name_ar;
							
						} else {
							$country_name=$country_row->name;
							
						}
					
							echo "
							<tr> <td width='50%'>
							
		              	<!--item-->
							<div class='item'>
								<table><tr><td colspan='3'>
								";
		              	echo "<div class='left'><font style='color:#00a4e4; font-size:13px;'>$country_name</font></div></td></tr>";
		              	
						
						$office_rows=$this->Office_model->get_by_country($country_id);
						foreach($office_rows as $office_row) {
						$office_id=$office_row->id;
		              	$office_phones=$office_row->phones;
						$office_mobiles=$office_row->mobiles;
						$office_faxes=$office_row->faxes;
						$office_emails=$office_row->emails;
							
		              	if($this->lang->lang()=='ar') {
		              		$office_location=$office_row->location_ar;
							$office_address=$office_row->address_ar;
							
						} else {
							$office_location=$office_row->location;
							$office_address=nl2br($office_row->address);
						}
							
		              

		              	echo"<tr><td width='30px'></td><td><div  style='font-size:12px;color:#4a4a4a;'>
									<div class='text' ><font style='color:#00a4e4; font-size:12px;'>$office_location</font></div>
									<br/>
									<div style='font-size:12px;color:#4a4a4a;'>
										$office_address
									</div>
									";
		              	if($office_phones!='') {
		              		if($office_setting_phone_icon!=base_url()) {
		              			echo "<br/><img src='$office_setting_phone_icon' /> $office_phones";		              			
		              		} else {
								echo "<br/>$office_phones";
		              		}
		              	}
						if($office_mobiles!='') {
						if($office_setting_mobile_icon!=base_url()) {
		              			echo "<br/><img src='$office_setting_mobile_icon' /> $office_mobiles";		              			
		              		} else {
								echo "<br/>$office_mobiles";
		              		}
		              	}
						if($office_faxes!='') {
						if($office_setting_fax_icon!=base_url()) {
		              			echo "<br/><img src='$office_setting_fax_icon' /> $office_faxes";		              			
		              		} else {
								echo "<br/>$office_faxes";
		              		}
		              	}
						if($office_emails!='') {
						if($office_setting_email_icon!=base_url()) {
		              			echo "<br/><img src='$office_setting_email_icon' /> $office_emails";		              			
		              		} else {
								echo "<br/>$office_emails";
		              		}
		              	}
									echo"
									
									
								</div>
								<div class='clear'></div>
								<br/><br/><br/>
								</td>
								
								</tr>
								
								";
							
						}
						
						
						
						echo "
						
						</table>
						</div>
							<!--/item-->
							
							
							</td>
							
							<td width='30%'>
							</td>
							
							<td width='30%'>
							";
						?>
						
                                        <div id="eventCalendarInline_<?php echo $office_id;?>"></div>          
                                        <script>
											$jQuery(document).ready(function() { 

												<?php 
														
														$office_event_row= $this->Office_event_model->get_by_office($office_id);
														echo "var eventsInline = [";
														foreach($office_event_row as $office_event_row) {
															$office_event_id=$office_event_row->id;
															
															$office_event_date_from=$office_event_row->date_from;
															$office_event_date_to=$office_event_row->date_to;
															
															$office_event_date_from = strtotime($office_event_date_from)*1000;
															$office_event_date_to = strtotime($office_event_date_to)*1000;
		
															if($this->lang->lang()=='ar') {
											              		$office_event_name=$office_event_row->name;
																$office_event_brief=$office_event_row->brief;
																
																
															} else {
																$office_event_name=$office_event_row->name_ar;
																$office_event_brief=$office_event_row->brief_ar;
																
															}
															
															$event_office_ids=$office_event_row->office_ids;
															$event_office_ids = explode(",", $event_office_ids);
															
															
															foreach($event_office_ids as $event_office_id) {
																if($event_office_id==$office_id) {
																	//echo $office_event_name;
																	?>

																	{'date': '<?php echo $office_event_date_from; ?>', 'type': 'meeting', 'title': '<?php echo $office_event_name;?>', 'description': '<?php echo $office_event_brief; ?> ', 'url': '<?php echo base_url().$this->lang->lang().'/officeevent/details/'.$office_event_id; ?>'},
																	
																<?php 	
																}
															
															}
															
														}
														
														echo "]";
														?>
												 
												$jQuery("#eventCalendarInline_<?php echo $office_id;?>").eventCalendar({
													jsonData: eventsInline
												});  
											});  		
                                        </script>  
											
									 
							
							<?php
							
							echo "
							</td>
							</tr>
							
		              	";
		              }
		              
					?>
					
	</table>				
			
<script language="JavaScript" src="<?php echo base_url();?>css/old/js/jquery.eventCalendar_office.js"></script>
			
	
					
					
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
	