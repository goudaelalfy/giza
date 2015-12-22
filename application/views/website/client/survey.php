<?php $this->load->view('website/includes/header'); ?>
<?php echo "<script type='text/javascript'  src='".base_url()."js/website/client/form.js' > </script>";?>

<?php


/**
 * Dropdowns object.
 * 
 * Intialize object from Dropdowns class which contains methods fill all dropdowns of website.
 * @var object.
 */

$dropdowns= new Dropdowns();

/**
 * Client controller object.
 * 
 * Intialize object from Client controller class.
 * @var object.
 */

$this_object= new Client();

?>



	<!--container-->
	
	<div id="container" >
		<!--content-->
		<div class="content">
			<!--side-bar-->
			<div id="side-bar">
				<!--main-block-->
				<!-- 
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
				
				if(isset($current_alias)) {
					if($menu_alias==$current_alias) {
						$lnk_class="parent current";
					} else {
						$lnk_class="parent";
					}
				} else {
					$lnk_class="parent";
				}
				
				echo"
				<a href='$menu_homebox_content_fullurl' class='$lnk_class'>$menu_title</a>
					";
				}
				?>
				 
				</div>
				 -->
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
					<div class="hint"><?php echo $this->lang->line('clients'); ?></div>
					<h1><?php if(isset($title)) {echo $title;} ?></h1>
					<div class="main-body">
						
					
					<!--hr-application-block-->
						<div id="hr-application-block">
							<div class="tabs">
								<div class="list">
									<div class="tab current">Page 1/4</div>
									<div class="tab">Page 2/4</div>
									<div class="tab">Page 3/4</div>
									<div class="tab">Page 4/4</div>
								</div>
							</div>
							<div class="form">
								<form name="frm_client_survey" id="frm_client_survey" action="<?php echo base_url().$this->lang->lang();?>/client/savesurvey" method="post" enctype='multipart/form-data'>
									<!--group-->
									<div class="group">
									<table>
									<?php 
									foreach($client_survey_question_rows as $client_survey_question_row) {
										$client_survey_question_id=$client_survey_question_row->id;
										$client_survey_question_answer_type=$client_survey_question_row->answer_type;
										$client_survey_question_page_no=$client_survey_question_row->page_no;
										
										if($this->lang->lang()=='ar') {
											$client_survey_question=$client_survey_question_row->question_ar;
										} else {
											$client_survey_question=$client_survey_question_row->question;
										}
										
										if($client_survey_question_page_no==1){
									?>
										<tr><td colspan="2">
										<div class="row" style="height: 20px">
										<span class="name"><?php echo $client_survey_question; ?></span>
										</div>
										</td></tr>
										<tr><td width="30px"></td><td>
											<span class="field">
											<?php 
											if($client_survey_question_answer_type=='yes_no') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												$yes_checked='';
												$no_checked='';
												if($current_client_survey_question_answer=='yes') {
													$yes_checked='checked';
												} else if($current_client_survey_question_answer=='no') {
													$no_checked='checked';
												}
												echo "
												<input type='radio' name='$client_survey_question_id' id='$client_survey_question_id' value='yes' $yes_checked> ".lang('yes')."<br/>
												<input type='radio' name='$client_survey_question_id' id='$client_survey_question_id' value='no' $no_checked>  ".lang('no')."<br/><br/>		
											 
												";	
											} else if($client_survey_question_answer_type=='true_false') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												$true_checked='';
												$false_checked='';
												if($current_client_survey_question_answer=='true') {
													$true_checked='checked';
												} else if($current_client_survey_question_answer=='false') {
													$false_checked='checked';
												}
												echo "
												<input type='radio' name='$client_survey_question_id' id='$client_survey_question_id' value='true' $true_checked> ".lang('true')."<br/>
												<input type='radio' name='$client_survey_question_id' id='$client_survey_question_id' value='false' $false_checked>  ".lang('false')."<br/><br/>		
											 
												";	
												
											} else if($client_survey_question_answer_type=='small_text') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												echo "
												<input type='text' name='$client_survey_question_id' id='$client_survey_question_id' value='$current_client_survey_question_answer' class='text' />
												";	
												
											} else if($client_survey_question_answer_type=='large_text') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												echo "
												<textarea name='$client_survey_question_id' id='$client_survey_question_id'  style='width:500px' >$current_client_survey_question_answer</textarea>
												";	
												
											} else if($client_survey_question_answer_type=='choose_answer') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												$question_answers=$this->Client_survey_model->get_answers_by_id($client_survey_question_id);
												foreach($question_answers as $question_answer) {
													$question_answer_id=$question_answer->id;
													if($this->lang->lang()=='ar') {
														$question_answer_name=$question_answer->name_ar;
													} else {
														$question_answer_name=$question_answer->name;
													}
													
													$checked='';
													if($question_answer_id==$current_client_survey_question_answer) {
														$checked='checked';
													}
													
													echo "
													<input type='radio' name='$client_survey_question_id' id='$client_survey_question_id' value='$question_answer_id' $checked> $question_answer_name<br/>											 
													";
												}												
											} else if($client_survey_question_answer_type=='multi_choice') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												$question_answers=$this->Client_survey_model->get_answers_by_id($client_survey_question_id);
												foreach($question_answers as $question_answer) {
													$question_answer_id=$question_answer->id;
													if($this->lang->lang()=='ar') {
														$question_answer_name=$question_answer->name_ar;
													} else {
														$question_answer_name=$question_answer->name;
													}
													
													$checked='';
													$current_client_survey_question_answer_arr = explode(",", $current_client_survey_question_answer);
													foreach($current_client_survey_question_answer_arr as $current_client_survey_question_answer_arr_value) {
														if($question_answer_id==$current_client_survey_question_answer_arr_value) {
															$checked="checked='checked'";
														}
													}	
													
													echo "
													<input type='checkbox' id='".$client_survey_question_id."[]' name='".$client_survey_question_id."[]' value='$question_answer_id' $checked/> $question_answer_name <br/>
													";
												}												
											}  
											?>
											
											</span>
											<br/><br/>
											</td></tr>
											
											
										
									<?php 
										}
									}
									?>
									
									</table>	 
									</div>	
									<!--/group-->
									
									
									
									
									
									
									<!--group-->
									<div class="group">
									<table>
									<?php 
									foreach($client_survey_question_rows as $client_survey_question_row) {
										$client_survey_question_id=$client_survey_question_row->id;
										$client_survey_question_answer_type=$client_survey_question_row->answer_type;
										$client_survey_question_page_no=$client_survey_question_row->page_no;
										
										if($this->lang->lang()=='ar') {
											$client_survey_question=$client_survey_question_row->question_ar;
										} else {
											$client_survey_question=$client_survey_question_row->question;
										}
										
										if($client_survey_question_page_no==2){
									?>
										<tr><td colspan="2">
										<div class="row" style="height: 20px">
										<span class="name"><?php echo $client_survey_question; ?></span>
										</div>
										</td></tr>
										<tr><td width="30px"></td><td>
											<span class="field">
											<?php 
											if($client_survey_question_answer_type=='yes_no') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												$yes_checked='';
												$no_checked='';
												if($current_client_survey_question_answer=='yes') {
													$yes_checked='checked';
												} else if($current_client_survey_question_answer=='no') {
													$no_checked='checked';
												}
												echo "
												<input type='radio' name='$client_survey_question_id' id='$client_survey_question_id' value='yes' $yes_checked> ".lang('yes')."<br/>
												<input type='radio' name='$client_survey_question_id' id='$client_survey_question_id' value='no' $no_checked>  ".lang('no')."<br/><br/>		
											 
												";	
											} else if($client_survey_question_answer_type=='true_false') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												$true_checked='';
												$false_checked='';
												if($current_client_survey_question_answer=='true') {
													$true_checked='checked';
												} else if($current_client_survey_question_answer=='false') {
													$false_checked='checked';
												}
												echo "
												<input type='radio' name='$client_survey_question_id' id='$client_survey_question_id' value='true' $true_checked> ".lang('true')."<br/>
												<input type='radio' name='$client_survey_question_id' id='$client_survey_question_id' value='false' $false_checked>  ".lang('false')."<br/><br/>		
											 
												";	
												
											} else if($client_survey_question_answer_type=='small_text') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												echo "
												<input type='text' name='$client_survey_question_id' id='$client_survey_question_id' value='$current_client_survey_question_answer' class='text' />
												";	
												
											} else if($client_survey_question_answer_type=='large_text') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												echo "
												<textarea name='$client_survey_question_id' id='$client_survey_question_id'   style='width:500px'>$current_client_survey_question_answer</textarea>
												";	
												
											} else if($client_survey_question_answer_type=='choose_answer') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												$question_answers=$this->Client_survey_model->get_answers_by_id($client_survey_question_id);
												foreach($question_answers as $question_answer) {
													$question_answer_id=$question_answer->id;
													if($this->lang->lang()=='ar') {
														$question_answer_name=$question_answer->name_ar;
													} else {
														$question_answer_name=$question_answer->name;
													}
													
													$checked='';
													if($question_answer_id==$current_client_survey_question_answer) {
														$checked='checked';
													}
													
													echo "
													<input type='radio' name='$client_survey_question_id' id='$client_survey_question_id' value='$question_answer_id' $checked> $question_answer_name<br/>											 
													";
												}												
											} else if($client_survey_question_answer_type=='multi_choice') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												$question_answers=$this->Client_survey_model->get_answers_by_id($client_survey_question_id);
												foreach($question_answers as $question_answer) {
													$question_answer_id=$question_answer->id;
													if($this->lang->lang()=='ar') {
														$question_answer_name=$question_answer->name_ar;
													} else {
														$question_answer_name=$question_answer->name;
													}
													
													$checked='';
												
													$current_client_survey_question_answer_arr = explode(",", $current_client_survey_question_answer);
													foreach($current_client_survey_question_answer_arr as $current_client_survey_question_answer_arr_value) {
														if($question_answer_id==$current_client_survey_question_answer_arr_value) {
															$checked="checked='checked'";
														}
													}
													
													echo "
													<input type='checkbox' id='".$client_survey_question_id."[]' name='".$client_survey_question_id."[]' value='$question_answer_id' $checked/> $question_answer_name <br/>
													";
												}												
											}  
											?>
											
											</span>
											<br/><br/>
											</td></tr>
											
											
										
									<?php 
										}
									}
									?>
									
									</table>
									</div>
									<!--/group-->
									
									
									
									
									
									<!--group-->
									<div class="group">
									<table>
									<?php 
									foreach($client_survey_question_rows as $client_survey_question_row) {
										$client_survey_question_id=$client_survey_question_row->id;
										$client_survey_question_answer_type=$client_survey_question_row->answer_type;
										$client_survey_question_page_no=$client_survey_question_row->page_no;
										
										if($this->lang->lang()=='ar') {
											$client_survey_question=$client_survey_question_row->question_ar;
										} else {
											$client_survey_question=$client_survey_question_row->question;
										}
										
										if($client_survey_question_page_no==3){
									?>
										<tr><td colspan="2">
										<div class="row" style="height: 20px">
										<span class="name"><?php echo $client_survey_question; ?></span>
										</div>
										</td></tr>
										<tr><td width="30px"></td><td>
											<span class="field">
											<?php 
											if($client_survey_question_answer_type=='yes_no') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												$yes_checked='';
												$no_checked='';
												if($current_client_survey_question_answer=='yes') {
													$yes_checked='checked';
												} else if($current_client_survey_question_answer=='no') {
													$no_checked='checked';
												}
												echo "
												<input type='radio' name='$client_survey_question_id' id='$client_survey_question_id' value='yes' $yes_checked> ".lang('yes')."<br/>
												<input type='radio' name='$client_survey_question_id' id='$client_survey_question_id' value='no' $no_checked>  ".lang('no')."<br/><br/>		
											 
												";	
											} else if($client_survey_question_answer_type=='true_false') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												$true_checked='';
												$false_checked='';
												if($current_client_survey_question_answer=='true') {
													$true_checked='checked';
												} else if($current_client_survey_question_answer=='false') {
													$false_checked='checked';
												}
												echo "
												<input type='radio' name='$client_survey_question_id' id='$client_survey_question_id' value='true' $true_checked> ".lang('true')."<br/>
												<input type='radio' name='$client_survey_question_id' id='$client_survey_question_id' value='false' $false_checked>  ".lang('false')."<br/><br/>		
											 
												";	
												
											} else if($client_survey_question_answer_type=='small_text') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												echo "
												<input type='text' name='$client_survey_question_id' id='$client_survey_question_id' value='$current_client_survey_question_answer' class='text' />
												";	
												
											} else if($client_survey_question_answer_type=='large_text') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												echo "
												<textarea name='$client_survey_question_id' id='$client_survey_question_id'  style='width:500px' >$current_client_survey_question_answer</textarea>
												";	
												
											} else if($client_survey_question_answer_type=='choose_answer') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												$question_answers=$this->Client_survey_model->get_answers_by_id($client_survey_question_id);
												foreach($question_answers as $question_answer) {
													$question_answer_id=$question_answer->id;
													if($this->lang->lang()=='ar') {
														$question_answer_name=$question_answer->name_ar;
													} else {
														$question_answer_name=$question_answer->name;
													}
													
													$checked='';
													if($question_answer_id==$current_client_survey_question_answer) {
														$checked='checked';
													}
													
													echo "
													<input type='radio' name='$client_survey_question_id' id='$client_survey_question_id' value='$question_answer_id' $checked> $question_answer_name<br/>											 
													";
												}												
											} else if($client_survey_question_answer_type=='multi_choice') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												$question_answers=$this->Client_survey_model->get_answers_by_id($client_survey_question_id);
												foreach($question_answers as $question_answer) {
													$question_answer_id=$question_answer->id;
													if($this->lang->lang()=='ar') {
														$question_answer_name=$question_answer->name_ar;
													} else {
														$question_answer_name=$question_answer->name;
													}
													
													$checked='';
												
													$current_client_survey_question_answer_arr = explode(",", $current_client_survey_question_answer);
													foreach($current_client_survey_question_answer_arr as $current_client_survey_question_answer_arr_value) {
														if($question_answer_id==$current_client_survey_question_answer_arr_value) {
															$checked="checked='checked'";
														}
													}
													
													echo "
													<input type='checkbox' id='".$client_survey_question_id."[]' name='".$client_survey_question_id."[]' value='$question_answer_id' $checked/> $question_answer_name <br/>
													";
												}												
											}  
											?>
											
											</span>
											<br/><br/>
											</td></tr>
											
											
										
									<?php 
										}
									}
									?>
									
									</table>
									</div>
									<!--/group-->
									
									
									
									
									
									<!--group-->
									<div class="group">
									<table>
									<?php 
									foreach($client_survey_question_rows as $client_survey_question_row) {
										$client_survey_question_id=$client_survey_question_row->id;
										$client_survey_question_answer_type=$client_survey_question_row->answer_type;
										$client_survey_question_page_no=$client_survey_question_row->page_no;
										
										if($this->lang->lang()=='ar') {
											$client_survey_question=$client_survey_question_row->question_ar;
										} else {
											$client_survey_question=$client_survey_question_row->question;
										}
										
										if($client_survey_question_page_no==4){
									?>
										<tr><td colspan="2">
										<div class="row" style="height: 20px">
										<span class="name"><?php echo $client_survey_question; ?></span>
										</div>
										</td></tr>
										<tr><td width="30px"></td><td>
											<span class="field">
											<?php 
											if($client_survey_question_answer_type=='yes_no') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												$yes_checked='';
												$no_checked='';
												if($current_client_survey_question_answer=='yes') {
													$yes_checked='checked';
												} else if($current_client_survey_question_answer=='no') {
													$no_checked='checked';
												}
												echo "
												<input type='radio' name='$client_survey_question_id' id='$client_survey_question_id' value='yes' $yes_checked> ".lang('yes')."<br/>
												<input type='radio' name='$client_survey_question_id' id='$client_survey_question_id' value='no' $no_checked>  ".lang('no')."<br/><br/>		
											 
												";	
											} else if($client_survey_question_answer_type=='true_false') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												$true_checked='';
												$false_checked='';
												if($current_client_survey_question_answer=='true') {
													$true_checked='checked';
												} else if($current_client_survey_question_answer=='false') {
													$false_checked='checked';
												}
												echo "
												<input type='radio' name='$client_survey_question_id' id='$client_survey_question_id' value='true' $true_checked> ".lang('true')."<br/>
												<input type='radio' name='$client_survey_question_id' id='$client_survey_question_id' value='false' $false_checked>  ".lang('false')."<br/><br/>		
											 
												";	
												
											} else if($client_survey_question_answer_type=='small_text') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												echo "
												<input type='text' name='$client_survey_question_id' id='$client_survey_question_id' value='$current_client_survey_question_answer' class='text' />
												";	
												
											} else if($client_survey_question_answer_type=='large_text') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												echo "
												<textarea name='$client_survey_question_id' id='$client_survey_question_id'  style='width:500px' >$current_client_survey_question_answer</textarea>
												";	
												
											} else if($client_survey_question_answer_type=='choose_answer') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												$question_answers=$this->Client_survey_model->get_answers_by_id($client_survey_question_id);
												foreach($question_answers as $question_answer) {
													$question_answer_id=$question_answer->id;
													if($this->lang->lang()=='ar') {
														$question_answer_name=$question_answer->name_ar;
													} else {
														$question_answer_name=$question_answer->name;
													}
													
													$checked='';
													if($question_answer_id==$current_client_survey_question_answer) {
														$checked='checked';
													}
													
													echo "
													<input type='radio' name='$client_survey_question_id' id='$client_survey_question_id' value='$question_answer_id' $checked> $question_answer_name<br/>											 
													";
												}												
											} else if($client_survey_question_answer_type=='multi_choice') {
												
												$current_client_survey_question_answer='';
												foreach ($current_client_survey_rows as $current_client_survey_row) {
													if($current_client_survey_row->question_id==$client_survey_question_id) {
														$current_client_survey_question_answer=$current_client_survey_row->answer;
													}
												}
												
												$question_answers=$this->Client_survey_model->get_answers_by_id($client_survey_question_id);
												foreach($question_answers as $question_answer) {
													$question_answer_id=$question_answer->id;
													if($this->lang->lang()=='ar') {
														$question_answer_name=$question_answer->name_ar;
													} else {
														$question_answer_name=$question_answer->name;
													}
													
													$checked='';
													
													$current_client_survey_question_answer_arr = explode(",", $current_client_survey_question_answer);
													foreach($current_client_survey_question_answer_arr as $current_client_survey_question_answer_arr_value) {
														if($question_answer_id==$current_client_survey_question_answer_arr_value) {
															$checked="checked='checked'";
														}
													}
													
													echo "
													<input type='checkbox' id='".$client_survey_question_id."[]' name='".$client_survey_question_id."[]' value='$question_answer_id' $checked/> $question_answer_name <br/>
													";
												}												
											}  
											?>
											
											</span>
											<br/><br/>
											</td></tr>
											
											
										
									<?php 
										}
									}
									?>
									
									</table>
									</div>
									<!--/group-->
									
									<br/><br/><br/><br/>
										

									<!--buttons-->
									<div class="buttons">
										<a href="#" class="back"></a>
										<a href="#" class="next"></a>
										<a href="javascript:submitform()" class="submit"></a>
										
										<div class="clear"></div>
									</div>
									<!--/buttons-->
								</form>
							</div>
						</div>
						<!--/hr-application-block-->	
						
						
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
	