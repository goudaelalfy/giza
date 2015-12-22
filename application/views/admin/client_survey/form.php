<?php $this->load->view('admin/includes/header'); ?>

<script type='text/javascript'  src='<?php echo base_url();?>js/includes/functions.js' > </script>
<script type='text/javascript'  src='<?php echo base_url();?>js/admin/client_survey/form.js' > </script>

<!-- Tabber -->
<link type="text/css" href="<?php echo base_url();?>added/tabber/style.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url();?>added/tabber/tabber.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>added/tabber/tabber-minimized.js"></script>


<?php 

/**
 * Variables to store the value from database, to display on screen
 */
$id=				0;
$question='';
$question_ar='';
$answer_type='';
$page_no='';
$sort='';

if(!isset($answer_ids)) {
$answer_ids= '';
}
if(!isset($answer_names)) {
$answer_names=	'';
}

$last_modify_date='';
$are_disabled='';
$readonly='';

/**
 * Mode is varible store the status or the mode of current row, add-edit-view-return, return when wrong occur
 * 
 * @var string
 */
if($mode!='add')
{
	if($mode=='view')
	{
		$are_disabled="disabled='disabled'";
		$readonly="readonly='readonly'";
	}
	
	if($mode=='return')
	{
		
		$id=			$current_row['id'];
		$question=		$current_row['question'];
        $question_ar=	$current_row['question_ar'];
        $answer_type=	$current_row['answer_type'];
		$page_no=		$current_row['page_no'] ;
       	$sort = 		$current_row['sort'];
		
		$answer_ids=	$current_row['answer_ids'];
		$answer_names=	$current_row['answer_names'];
	}
	else 
	{
		$id=			$current_row->id;
		$question=		$current_row->question;
        $question_ar=	$current_row->question_ar;
        $answer_type=	$current_row->answer_type;
		$page_no=		$current_row->page_no;
       	$sort = 		$current_row->sort;
		
       	$answer_ids=	$answer_ids;
		$answer_names=	$answer_names;
	}
	
}



/**
 * Dropdowns object.
 * 
 * Intialize object from Dropdowns class which contains methods fill all dropdowns of website.
 * @var object.
 */

$dropdowns= new Dropdowns();

/**
 * Controller object.
 * 
 * Intialize object from Controller class.
 * @var object.
 */
$this_object= new Clientsurvey();


/**
 * Country object.
 * 
 * Intialize object from Country controller class.
 * @var object.
 */
$this->load->controller(ADMIN.'/Country');
$country_object= new Country();

?>


<script type="text/javascript">
 
$(document).ready(function(){
 
    var counter = <?php echo $answers_count+1; ?>;
 
    $(".hrf_add_answer").click(function () {
       
	if(counter>10){
            alert("Only 10 answers allow");
            return false;
	}   

	var new_div_answer = $(document.createElement('div'))
	     .attr("id", 'div_answer' + counter);

	new_div_answer.html('<table><tr><td width="100px"><label ><?php echo lang('answer'); ?> '+ counter + ' </label></td><td width="150px">' +
	      '<input type="hidden" name="answer_id_' + counter +'" id="answer_id_' + counter +'" value="0">'+
	      '<input type="text"   name="answer_' + counter +
	      '" id="answer_' + counter + '" value="" <?php echo $readonly; ?>   >'+
	      '</td><td width="100px"><label ><?php echo lang('answer_ar'); ?> '+ counter + ' </label></td><td width="150px">' +
	      '<input type="text"   name="answer_ar_' + counter +
	      '" id="answer_ar_' + counter + '" value="" <?php echo $readonly; ?>   >'+
	      '</td><td width="80px"><a href="javascript:void(0)" class="hrf_remove_answer" id="'+counter+'"><?php echo lang('remove_lnk'); ?> </a> </td><td><div class="div_error" id="answer_message_'+ counter +'"></div></td></tr></table>');
      	
	      
	new_div_answer.appendTo("#div_answer_group");
 
	counter++;
     });
 
     $(".hrf_remove_answer").live('click', function() { 
	if(counter==1){
          alert("No more answers to remove");
          return false;
       }   
 
	counter--;
 		 var hrf_id = $(this).attr('id');
        $("#div_answer" + hrf_id).remove();
 
     });
 
     
  });
</script>
<script type="text/javascript">
 
$(document).ready(function(){

     $("#answer_type").change(function () {
         if(this.value=='choose_answer' || this.value=='multi_choice') {
        	 $("#dv_answers").show();
         } else {
        	 $("#dv_answers").hide();
         }

     });
 
     
  });
</script>

<div class="row-fluid sortable">
<div class="box span12">
<div class="box-header well" data-original-title>
<h2><i class="icon-edit"></i> <?php echo lang('client_survey_question')?></h2>
<div class="box-icon">
	<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
	<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
	<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
</div>
</div>

<div class="box-content">
<form class="form-horizontal" id='frm_clientsurvey_row' name='frm_clientsurvey_row'  method='post' enctype='multipart/form-data'>

<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
<input type="hidden" name="last_modify_date" id="last_modify_date" value="<?php echo $last_modify_date; ?>"> 


	<fieldset>
	
	<div class="form-actions">
	<a class='btn btn-success' href='<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/clientsurvey/table'>
				<i class='icon-zoom-in icon-white'></i>  
				<?php  echo $this->lang->line('lnk_view_all'); ?>                                           
	</a>
		
	<?php if($mode=='view') { 
	$readonly="readonly='readonly'";
	
if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_add)) {
	
	
	?>
	
	<a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/clientsurvey/form/0/add">
	<i class='icon-edit icon-white'></i>
	<?php  echo $this->lang->line('btn_add'); ?>
	</a>
	
	<?php 
}
if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_edit)) {

	?>
	
    <a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/clientsurvey/form/<?php echo $id;?>/edit">
    <i class='icon-edit icon-white'></i>  
	<?php  echo $this->lang->line('btn_edit'); ?>
	</a>
		
<?php 
}

if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_delete)) {

?>		
		
	<a class='btn btn-danger' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/clientsurvey/delete/<?php echo $id;?>" onclick="return delete_confirm('<?php echo $this->lang->lang(); ?>')">
	<i class='icon-trash icon-white'></i> 
	<?php  echo $this->lang->line('btn_delete'); ?>
	</a>
<?php }?>	
	
	<?php }?>	

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
 


<div class="tabber">

<div class="tabbertab">
<h2>English</h2>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('question'); ?></label>
<div class="controls">
  <textarea name="question" id="question" rows="" cols="" style="width: 400px" <?php echo $are_disabled; ?>> <?php echo $question; ?></textarea>
<div class="dv_error" id="dv_question_false" style="display:none; "><?php echo lang('question_false'); ?></div>
	
</div>
</div>


</div>


<div class="tabbertab">
<h2>عربى</h2>  
 
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('question_ar'); ?></label>
<div class="controls">
  <textarea name="question_ar" id="question_ar" rows="" cols="" style="width: 400px" <?php echo $are_disabled; ?>> <?php echo $question_ar; ?></textarea>
<div class="dv_error" id="dv_question_ar_false" style="display:none; "><?php echo lang('question_false'); ?></div>
	
</div>
</div>


</div>  
  
  
</div>

<br/>


<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('answer_type'); ?></label>
<div class="controls">

<select    name='answer_type' id='answer_type' <?php echo $are_disabled; ?> >
<option value='yes_no' <?php if($answer_type=='yes_no') {echo "selected='selected'";} ?>  > <?php echo lang('yes_no');?></option>
<option value='true_false' <?php if($answer_type=='true_false') {echo "selected='selected'";} ?>  > <?php echo lang('true_false');?></option>
<option value='choose_answer' <?php if($answer_type=='choose_answer') {echo "selected='selected'";} ?>  > <?php echo lang('choose_answer');?></option>
<option value='multi_choice' <?php if($answer_type=='multi_choice') {echo "selected='selected'";} ?>  > <?php echo lang('multi_choice');?></option>
<option value='small_text' <?php if($answer_type=='small_text') {echo "selected='selected'";} ?>  > <?php echo lang('small_text');?></option>
<option value='large_text' <?php if($answer_type=='large_text') {echo "selected='selected'";} ?>  > <?php echo lang('large_text');?></option>
</select>

<div class="dv_error" id="dv_answer_type_false" style="display:none; "><?php echo lang('answer_type_false'); ?></div>

</div>
</div>


<div class="control-group" id="dv_answers" <?php if($answer_type!='choose_answer' && $answer_type!='multi_choice'){echo "style='display:none;'";} ?> >
<label class="control-label" for="focusedInput"><?php echo lang('answers'); ?></label>
<div class="controls">
  
<?php 
    $answer_conuter=0;
	echo "<br/><div class='inner_form_div'><div id='div_answer_group'>";
	foreach($answer_rows as $answer_row)
	{
		$answer_id=$answer_row->id;
		$answer_name=$answer_row->name;
		$answer_name_ar=$answer_row->name_ar;
		$answer_conuter=$answer_conuter+1;
	   	echo "
	   	<div id='div_answer$answer_conuter'><table><tr><td width='100px'>
	   		<input type='hidden' name='answer_id_$answer_conuter' id='answer_id_$answer_conuter' value='$answer_id'>
			<label>". lang('answer')." ".$answer_conuter." </label></td><td width='150px'><input $readonly type='text' value='$answer_name'  name ='answer_$answer_conuter' id='answer_$answer_conuter' ></td>
			<td width='100px'><label>". lang('answer_ar')." ".$answer_conuter." </label></td><td width='150px'><input $readonly type='text' value='$answer_name_ar'  name ='answer_ar_$answer_conuter' id='answer_ar_$answer_conuter' ></td>
			<td width='80px'><a href='javascript:void(0)' class='hrf_remove_answer' id='$answer_conuter'>". lang('remove_lnk')." </a>
			
			</td><td><div class='div_error' id='answer_message_$answer_conuter'></div></td></tr></table>
		</div>
		";  	
	}
			
	echo"</div>";
	if($mode!='view')
	{
		echo"<a href='javascript:void(0)' class='hrf_add_answer' >". lang('add_new_answer_lnk')." </a>";
	}
	echo"</div>	";
	
?>
</div>
</div>




<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('page_no'); ?></label>
<div class="controls">

<select    name='page_no' id='page_no' <?php echo $are_disabled; ?> >
<option value='1' <?php if($page_no=='1') {echo "selected='selected'";} ?>  >1</option>
<option value='2' <?php if($page_no=='2') {echo "selected='selected'";} ?>  > 2</option>
<option value='3' <?php if($page_no=='3') {echo "selected='selected'";} ?>  > 3</option>
<option value='4' <?php if($page_no=='4') {echo "selected='selected'";} ?>  >4</option>
</select>
<div class="dv_error" id="dv_page_no_false" style="display:none; "><?php echo lang('page_no_false'); ?></div>
</div>
</div>


<div class="form-actions">
<?php if($mode!='view') { ?>
<input type="submit" class="btn btn-primary" name="smt_save" id="smt_save" value="<?php echo lang('btn_save'); ?>" onclick="return validate_form('<?php echo $this->lang->lang(); ?>'); " />
<a class='btn btn-warning' href="javascript: history.go(-1)"><?php echo lang('btn_cancel'); ?></a><?php }?>
</div>
</fieldset>
					 </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			

<?php $this->load->view('admin/includes/footer'); ?>
    