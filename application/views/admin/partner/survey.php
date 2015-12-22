<?php $this->load->view('admin/includes/header'); ?>

<?php


/**
 * Dropdowns object.
 * 
 * Intialize object from Dropdowns class which contains methods fill all dropdowns of website.
 * @var object.
 */

$dropdowns= new Dropdowns();

/**
 * Partner controller object.
 * 
 * Intialize object from Partner controller class.
 * @var object.
 */

$this_object= new Partner();

?>

<div class="row-fluid sortable">
<div class="box span12">
<div class="box-header well" data-original-title>
<h2><i class="icon-edit"></i> <?php echo lang('partners')?></h2>
<div class="box-icon">
	<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
	<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
	<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
</div>

</div>
<div class="box-content">
<form class="form-horizontal" id='frm_partner_row' name='frm_partner_row'  method='post' enctype='multipart/form-data'>


	<fieldset>
	
	<div class="form-actions">
	<a class='btn btn-success' href='<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/partner/table'>
				<i class='icon-zoom-in icon-white'></i>  
				<?php  echo $this->lang->line('lnk_view_all'); ?>                                           
	</a>
			

	</div>


<div  align="center" style="height: 50px">
		<?php 
		if(isset($error)) {
			echo "<div class='alert alert-error'>
							<button type='button' class='close' data-dismiss='alert'>×</button>
							 $error.
						</div>";
		}
		?>
		<?php 
		if(isset($message)) {
			echo "<div class='alert alert-success'>
							<button type='button' class='close' data-dismiss='alert'>×</button>
							 $message.
						</div>";
		}
		?>
 </div>	
 
<br/>


							<div class="form">
								<form name="frm_partner_survey" id="frm_partner_survey" action="<?php echo base_url().$this->lang->lang();?>/partner/savesurvey" method="post" enctype='multipart/form-data'>
									<!--group-->
									<div class="group" style="padding: 20px;">
									<table>
									<?php 
									foreach($partner_survey_question_rows as $partner_survey_question_row) {
										$partner_survey_question_id=$partner_survey_question_row->id;
										$partner_survey_question_answer_type=$partner_survey_question_row->answer_type;
										$partner_survey_question_page_no=$partner_survey_question_row->page_no;
										
										if($this->lang->lang()=='ar') {
											$partner_survey_question=$partner_survey_question_row->question_ar;
										} else {
											$partner_survey_question=$partner_survey_question_row->question;
										}
										
									?>
										<tr><td colspan="2">
										<div class="control-group" style="height: 20px">
										<span class="name"><?php echo $partner_survey_question; ?></span>
										</div>
										</td></tr>
										<tr><td width="30px"></td><td>
											<span class="field">
											<?php 
											if($partner_survey_question_answer_type=='yes_no') {
												
												$current_partner_survey_question_answer='';
												foreach ($current_partner_survey_rows as $current_partner_survey_row) {
													if($current_partner_survey_row->question_id==$partner_survey_question_id) {
														$current_partner_survey_question_answer=$current_partner_survey_row->answer;
													}
												}
												
												$yes_checked='';
												$no_checked='';
												if($current_partner_survey_question_answer=='yes') {
													$yes_checked='checked';
												} else if($current_partner_survey_question_answer=='no') {
													$no_checked='checked';
												}
												echo "
												<input type='radio' name='$partner_survey_question_id' id='$partner_survey_question_id' value='yes' $yes_checked> ".lang('yes')."<br/>
												<input type='radio' name='$partner_survey_question_id' id='$partner_survey_question_id' value='no' $no_checked>  ".lang('no')."<br/><br/>		
											 
												";	
											} else if($partner_survey_question_answer_type=='true_false') {
												
												$current_partner_survey_question_answer='';
												foreach ($current_partner_survey_rows as $current_partner_survey_row) {
													if($current_partner_survey_row->question_id==$partner_survey_question_id) {
														$current_partner_survey_question_answer=$current_partner_survey_row->answer;
													}
												}
												
												$true_checked='';
												$false_checked='';
												if($current_partner_survey_question_answer=='true') {
													$true_checked='checked';
												} else if($current_partner_survey_question_answer=='false') {
													$false_checked='checked';
												}
												echo "
												<input type='radio' name='$partner_survey_question_id' id='$partner_survey_question_id' value='true' $true_checked> ".lang('true')."<br/>
												<input type='radio' name='$partner_survey_question_id' id='$partner_survey_question_id' value='false' $false_checked>  ".lang('false')."<br/><br/>		
											 
												";	
												
											} else if($partner_survey_question_answer_type=='small_text') {
												
												$current_partner_survey_question_answer='';
												foreach ($current_partner_survey_rows as $current_partner_survey_row) {
													if($current_partner_survey_row->question_id==$partner_survey_question_id) {
														$current_partner_survey_question_answer=$current_partner_survey_row->answer;
													}
												}
												
												echo "
												<input type='text' name='$partner_survey_question_id' id='$partner_survey_question_id' value='$current_partner_survey_question_answer' class='text' />
												";	
												
											} else if($partner_survey_question_answer_type=='large_text') {
												
												$current_partner_survey_question_answer='';
												foreach ($current_partner_survey_rows as $current_partner_survey_row) {
													if($current_partner_survey_row->question_id==$partner_survey_question_id) {
														$current_partner_survey_question_answer=$current_partner_survey_row->answer;
													}
												}
												
												echo "
												<textarea name='$partner_survey_question_id' id='$partner_survey_question_id'  style='width:500px' >$current_partner_survey_question_answer</textarea>
												";	
												
											} else if($partner_survey_question_answer_type=='choose_answer') {
												
												$current_partner_survey_question_answer='';
												foreach ($current_partner_survey_rows as $current_partner_survey_row) {
													if($current_partner_survey_row->question_id==$partner_survey_question_id) {
														$current_partner_survey_question_answer=$current_partner_survey_row->answer;
													}
												}
												
												$question_answers=$this->Partner_survey_model->get_answers_by_id($partner_survey_question_id);
												foreach($question_answers as $question_answer) {
													$question_answer_id=$question_answer->id;
													if($this->lang->lang()=='ar') {
														$question_answer_name=$question_answer->name_ar;
													} else {
														$question_answer_name=$question_answer->name;
													}
													
													$checked='';
													if($question_answer_id==$current_partner_survey_question_answer) {
														$checked='checked';
													}
													
													echo "
													<input type='radio' name='$partner_survey_question_id' id='$partner_survey_question_id' value='$question_answer_id' $checked> $question_answer_name<br/>											 
													";
												}												
											} else if($partner_survey_question_answer_type=='multi_choice') {
												
												$current_partner_survey_question_answer='';
												foreach ($current_partner_survey_rows as $current_partner_survey_row) {
													if($current_partner_survey_row->question_id==$partner_survey_question_id) {
														$current_partner_survey_question_answer=$current_partner_survey_row->answer;
													}
												}
												
												$question_answers=$this->Partner_survey_model->get_answers_by_id($partner_survey_question_id);
												foreach($question_answers as $question_answer) {
													$question_answer_id=$question_answer->id;
													if($this->lang->lang()=='ar') {
														$question_answer_name=$question_answer->name_ar;
													} else {
														$question_answer_name=$question_answer->name;
													}
													
													$checked='';
													$current_partner_survey_question_answer_arr = explode(",", $current_partner_survey_question_answer);
													foreach($current_partner_survey_question_answer_arr as $current_partner_survey_question_answer_arr_value) {
														if($question_answer_id==$current_partner_survey_question_answer_arr_value) {
															$checked="checked='checked'";
														}
													}	
													
													echo "
													<input type='checkbox' id='".$partner_survey_question_id."[]' name='".$partner_survey_question_id."[]' value='$question_answer_id' $checked/> $question_answer_name <br/>
													";
												}												
											}  
											?>
											
											</span>
											<br/><br/>
											</td></tr>
											
											
										
									<?php 
										
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
						
	
	

<div class="form-actions">
<!-- 
<input type="submit" class="btn btn-primary" name="smt_save" id="smt_save" value="<?php echo lang('btn_save'); ?>" onclick="return validate_form('<?php echo $this->lang->lang(); ?>'); " />
 -->
<a class='btn btn-warning' href="javascript: history.go(-1)"><?php echo lang('btn_cancel'); ?></a>


</div>
</fieldset>
					 </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			

<?php $this->load->view('admin/includes/footer'); ?>
	