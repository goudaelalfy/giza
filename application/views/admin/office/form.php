<?php $this->load->view('admin/includes/header'); ?>

<script type='text/javascript'  src='<?php echo base_url();?>js/includes/functions.js' > </script>
<script type='text/javascript'  src='<?php echo base_url();?>js/admin/office/form.js' > </script>

<!-- Tabber -->
<link type="text/css" href="<?php echo base_url();?>added/tabber/style.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url();?>added/tabber/tabber.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>added/tabber/tabber-minimized.js"></script>


<?php 

/**
 * Variables to store the value from database, to display on screen
 */
$id=				0;
$phones=				'';
$mobiles=			'';
$faxes=			'';
$website=			'';

$emails=				'';
$location=				'';
$location_ar=			'';
$address=			'';
$address_ar=		'';

$country_id=0;

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
		
		$id=				$current_row['id'];
		$phones=				$current_row['phones'];
		$mobiles=				$current_row['mobiles'];
		$faxes=					$current_row['faxes'];
		$website=				$current_row['website'];
		
		$emails=				$current_row['emails'];		
		$location=				$current_row['location'];
		$location_ar=			$current_row['location_ar'];
		$address=			$current_row['address'];
		$address_ar=		$current_row['address_ar'];
		$country_id=		$current_row['country_id'];
		
	}
	else 
	{
		$id=				$current_row->id;
		$phones=				$current_row->phones;
		$mobiles=			$current_row->mobiles;
		$faxes=					$current_row->faxes;
		$website=				$current_row->website;
		
		$emails=				$current_row->emails;
		
		$location=				$current_row->location;
		$location_ar=			$current_row->location_ar;
		$address=			$current_row->address;
		$address_ar=		$current_row->address_ar;
		
		$country_id=		$current_row->country_id;
		
	}
	
}


$phones = $phones;
$phones = explode(",", $phones);
$phones_count  =count($phones);  	
$phone_false_message=lang('phone_false');

$mobiles = $mobiles;
$mobiles = explode(",", $mobiles);
$mobiles_count  =count($mobiles);  	
$mobile_false_message=lang('mobile_false');

$faxes = $faxes;
$faxes = explode(",", $faxes);
$faxes_count  =count($faxes);  	
$fax_false_message=lang('fax_false');


$emails = $emails;
$emails = explode(",", $emails);
$emails_count  =count($emails);  	
$email_false_message=lang('email_false');



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
$this_object= new Office();


/**
 * Country object.
 * 
 * Intialize object from Country controller class.
 * @var object.
 */
$this->load->controller(ADMIN.'/Country');
$country_object= new Country();

?>
<SCRIPT type="text/javascript">
pic1 = new Image(16, 16); 
pic1.src = "<?php echo base_url(); ?>images/icons/loader.gif";

$(document).ready(function(){



$("#location").change(function() { 

	var location = $("#location").val().replace(/^\s+|\s+$/g, '');
	if(location== "" )
	{
		$("#dv_location_false").show();
	}
	else
	{
		$("#dv_location_false").hide();
	}
});

$("#location_ar").change(function() { 

	var location_ar = $("#location_ar").val().replace(/^\s+|\s+$/g, '');
	if(location_ar== "" )
	{
		$("#dv_location_ar_false").show();
	}
	else
	{
		$("#dv_location_ar_false").hide();
	}
});


});
</SCRIPT>

<script type="text/javascript">
 
$(document).ready(function(){
 
    var counter = <?php echo $phones_count+1; ?>;
 
    $(".hrf_add_phone").click(function () {
	if(counter>10){
            alert("Only 10 phones allow");
            return false;
	}   

	var new_div_phone = $(document.createElement('div'))
	     .attr("id", 'div_phone' + counter);

	new_div_phone.html('<table><tr><td width="100px"><label ><?php echo lang('phone'); ?> '+ counter + ' </label></td><td width="150px">' +
	      '<input type="text"   name="phone_' + counter +
	      '" id="phone_' + counter + '" value="" <?php echo $readonly; ?>  onchange="validate_phone(this.value,\'phone_'+ counter +'\',\'phone_message_'+ counter +'\',\'<?php echo $phone_false_message;?>\')" >'+
	      '</td><td width="80px"><a href="javascript:void(0)" class="hrf_remove_phone" id="'+counter+'"><?php echo lang('remove_lnk'); ?> </a> </td><td><div class="div_error" id="phone_message_'+ counter +'"></div></td></tr></table>');
      	
	      
	new_div_phone.appendTo("#div_phone_group");
 
	counter++;
     });
 
     $(".hrf_remove_phone").live('click', function() { 
	if(counter==1){
          alert("No more phones to remove");
          return false;
       }   
 
	counter--;
 		 var hrf_id = $(this).attr('id');
        $("#div_phone" + hrf_id).remove();
 
     });
 
     
  });
</script>

<script type="text/javascript">
 
$(document).ready(function(){
 
    var counter = <?php echo $mobiles_count+1; ?>;
 
    $(".hrf_add_mobile").click(function () {
	if(counter>10){
            alert("Only 10 mobiles allow");
            return false;
	}   

	var new_div_mobile = $(document.createElement('div'))
	     .attr("id", 'div_mobile' + counter);

	new_div_mobile.html('<table><tr><td width="100px"><label ><?php echo lang('mobile'); ?> '+ counter + ' </label></td><td width="150px">' +
	      '<input type="text"   name="mobile_' + counter +
	      '" id="mobile_' + counter + '" value="" <?php echo $readonly; ?>  onchange="validate_mobile(this.value,\'mobile_'+ counter +'\',\'mobile_message_'+ counter +'\',\'<?php echo $mobile_false_message;?>\')" >'+
	      '</td><td width="80px"><a href="javascript:void(0)" class="hrf_remove_mobile" id="'+counter+'"><?php echo lang('remove_lnk'); ?> </a> </td><td><div class="div_error" id="mobile_message_'+ counter +'"></div></td></tr></table>');
      	
	      
	new_div_mobile.appendTo("#div_mobile_group");
 
	counter++;
     });
 
     $(".hrf_remove_mobile").live('click', function() { 
	if(counter==1){
          alert("No more mobiles to remove");
          return false;
       }   
 
	counter--;
 		 var hrf_id = $(this).attr('id');
        $("#div_mobile" + hrf_id).remove();
 
     });
 
     
  });
</script>


<script type="text/javascript">
 
$(document).ready(function(){
 
    var counter = <?php echo $faxes_count+1; ?>;
 
    $(".hrf_add_fax").click(function () {
	if(counter>10){
            alert("Only 10 faxes allow");
            return false;
	}   

	var new_div_fax = $(document.createElement('div'))
	     .attr("id", 'div_fax' + counter);

	new_div_fax.html('<table><tr><td width="100px"><label ><?php echo lang('fax'); ?> '+ counter + ' </label></td><td width="150px">' +
	      '<input type="text"   name="fax_' + counter +
	      '" id="fax_' + counter + '" value="" <?php echo $readonly; ?>  onchange="validate_fax(this.value,\'fax_'+ counter +'\',\'fax_message_'+ counter +'\',\'<?php echo $fax_false_message;?>\')" >'+
	      '</td><td width="80px"><a href="javascript:void(0)" class="hrf_remove_fax" id="'+counter+'"><?php echo lang('remove_lnk'); ?> </a> </td><td><div class="div_error" id="fax_message_'+ counter +'"></div></td></tr></table>');
      	
	      
	new_div_fax.appendTo("#div_fax_group");
 
	counter++;
     });
 
     $(".hrf_remove_fax").live('click', function() { 
	if(counter==1){
          alert("No more faxes to remove");
          return false;
       }   
 
	counter--;
 		 var hrf_id = $(this).attr('id');
        $("#div_fax" + hrf_id).remove();
 
     });
 
     
  });
</script>




<script type="text/javascript">
 
$(document).ready(function(){
 
    var counter = <?php echo $emails_count+1; ?>;
 
    $(".hrf_add_email").click(function () {
	if(counter>10){
            alert("Only 10 emails allow");
            return false;
	}   

	var new_div_email = $(document.createElement('div'))
	     .attr("id", 'div_email' + counter);

	new_div_email.html('<table><tr><td width="100px"><label ><?php echo lang('email'); ?> '+ counter + ' </label></td><td width="150px">' +
	      '<input type="text"   name="email_' + counter +
	      '" id="email_' + counter + '" value="" <?php echo $readonly; ?>  onchange="validate_email(this.value,\'email_'+ counter +'\',\'email_message_'+ counter +'\',\'<?php echo $email_false_message;?>\')" >'+
	      '</td><td width="80px"><a href="javascript:void(0)" class="hrf_remove_email" id="'+counter+'"><?php echo lang('remove_lnk'); ?> </a> </td><td><div class="div_error" id="email_message_'+ counter +'"></div></td></tr></table>');
      	
	      
	new_div_email.appendTo("#div_email_group");
 
	counter++;
     });
 
     $(".hrf_remove_email").live('click', function() { 
	if(counter==1){
          alert("No more emails to remove");
          return false;
       }   
 
	counter--;
 		 var hrf_id = $(this).attr('id');
        $("#div_email" + hrf_id).remove();
 
     });
 
     
  });
</script>

<div class="row-fluid sortable">
<div class="box span12">
<div class="box-header well" data-original-title>
<h2><i class="icon-edit"></i> <?php echo lang('offices')?></h2>
<div class="box-icon">
	<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
	<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
	<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
</div>
</div>

<div class="box-content">
<form class="form-horizontal" id='frm_office_row' name='frm_office_row'  method='post' enctype='multipart/form-data'>

<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
<input type="hidden" name="last_modify_date" id="last_modify_date" value="<?php echo $last_modify_date; ?>"> 


	<fieldset>
	
	<div class="form-actions">
	<a class='btn btn-success' href='<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/office/table'>
				<i class='icon-zoom-in icon-white'></i>  
				<?php  echo $this->lang->line('lnk_view_all'); ?>                                           
	</a>
		
	<?php if($mode=='view') { 
	$readonly="readonly='readonly'";
	
if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_add)) {
	
	
	?>
	
	<a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/office/form/0/add">
	<i class='icon-edit icon-white'></i>
	<?php  echo $this->lang->line('btn_add'); ?>
	</a>
	
	<?php 
}
if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_edit)) {

	?>
	
    <a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/office/form/<?php echo $id;?>/edit">
    <i class='icon-edit icon-white'></i>  
	<?php  echo $this->lang->line('btn_edit'); ?>
	</a>
		
<?php 
}

if($this_object->user_screen_privielge_allowed($this_object->screen_id, $this_object->privielge_delete)) {

?>		
		
	<a class='btn btn-danger' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/office/delete/<?php echo $id;?>" onclick="return delete_confirm('<?php echo $this->lang->lang(); ?>')">
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
 

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('country'); ?></label>
<div class="controls">
<?php $dropdowns->drpdwn_country($country_object, $country_id,'country_id',$are_disabled); ?>
<div class="dv_error" id="dv_country_false" style="display:none; "><?php echo lang('country_false'); ?></div>

</div>
</div>


<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('phones'); ?></label>
<div class="controls">
  
<?php 
    $phone_conuter=0;
    
	echo "<br/><div class='inner_form_div'><div id='div_phone_group'>";
	foreach($phones as $phone)
	{
		$phone_conuter=$phone_conuter+1;
	   	echo "
	   	<div id='div_phone$phone_conuter'><table><tr><td width='100px'>
			<label>". lang('phone')." ".$phone_conuter." </label></td><td width='150px'><input $readonly type='text' value='$phone'  name ='phone_$phone_conuter' id='phone_$phone_conuter' onchange='validate_phone(this.value,\"phone_$phone_conuter\",\"phone_message_$phone_conuter\",\"$phone_false_message\")'></td><td width='80px'><a href='javascript:void(0)' class='hrf_remove_phone' id='$phone_conuter'>". lang('remove_lnk')." </a>
			</td><td><div class='div_error' id='phone_message_$phone_conuter'></div></td></tr></table>
		</div>
		";  	
	}
			
	echo"</div>";
	if($mode!='view')
	{
		echo"<a href='javascript:void(0)' class='hrf_add_phone' >". lang('add_new_phone_lnk')." </a>";
	}
	echo"</div>	";
	
?>
</div>
</div>




<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('mobiles'); ?></label>
<div class="controls">
  
<?php 
    $mobile_conuter=0;
    
	echo "<br/><div class='inner_form_div'><div id='div_mobile_group'>";
	foreach($mobiles as $mobile)
	{
		$mobile_conuter=$mobile_conuter+1;
	   	echo "
	   	<div id='div_mobile$mobile_conuter'><table><tr><td width='100px'>
			<label>". lang('mobile')." ".$mobile_conuter." </label></td><td width='150px'><input $readonly type='text' value='$mobile'  name ='mobile_$mobile_conuter' id='mobile_$mobile_conuter' onchange='validate_mobile(this.value,\"mobile_$mobile_conuter\",\"mobile_message_$mobile_conuter\",\"$mobile_false_message\")'></td><td width='80px'><a href='javascript:void(0)' class='hrf_remove_mobile' id='$mobile_conuter'>". lang('remove_lnk')." </a>
			</td><td><div class='div_error' id='mobile_message_$mobile_conuter'></div></td></tr></table>
		</div>
		";  	
	}
			
	echo"</div>";
	if($mode!='view')
	{
		echo"<a href='javascript:void(0)' class='hrf_add_mobile' >". lang('add_new_mobile_lnk')." </a>";
	}
	echo"</div>	";
	
?>
</div>
</div>



<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('faxes'); ?></label>
<div class="controls">
  
<?php 
    $fax_conuter=0;
    
	echo "<br/><div class='inner_form_div'><div id='div_fax_group'>";
	foreach($faxes as $fax)
	{
		$fax_conuter=$fax_conuter+1;
	   	echo "
	   	<div id='div_fax$fax_conuter'><table><tr><td width='100px'>
			<label>". lang('fax')." ".$fax_conuter." </label></td><td width='150px'><input $readonly type='text' value='$fax'  name ='fax_$fax_conuter' id='fax_$fax_conuter' onchange='validate_fax(this.value,\"fax_$fax_conuter\",\"fax_message_$fax_conuter\",\"$fax_false_message\")'></td><td width='80px'><a href='javascript:void(0)' class='hrf_remove_fax' id='$fax_conuter'>". lang('remove_lnk')." </a>
			</td><td><div class='div_error' id='fax_message_$fax_conuter'></div></td></tr></table>
		</div>
		";  	
	}
			
	echo"</div>";
	if($mode!='view')
	{
		echo"<a href='javascript:void(0)' class='hrf_add_fax' >". lang('add_new_fax_lnk')." </a>";
	}
	echo"</div>	";
	
?>
</div>
</div>




<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('emails'); ?></label>
<div class="controls">
  
<?php 
    $email_conuter=0;
    
	echo "<br/><div class='inner_form_div'><div id='div_email_group'>";
	foreach($emails as $email)
	{
		$email_conuter=$email_conuter+1;
	   	echo "
	   	<div id='div_email$email_conuter'><table><tr><td width='100px'>
			<label>". lang('email')." ".$email_conuter." </label></td><td width='150px'><input $readonly type='text' value='$email'  name ='email_$email_conuter' id='email_$email_conuter' onchange='validate_email(this.value,\"email_$email_conuter\",\"email_message_$email_conuter\",\"$email_false_message\")'></td><td width='80px'><a href='javascript:void(0)' class='hrf_remove_email' id='$email_conuter'>". lang('remove_lnk')." </a>
			</td><td><div class='div_error' id='email_message_$email_conuter'></div></td></tr></table>
		</div>
		";  	
	}
			
	echo"</div>";
	if($mode!='view')
	{
		echo"<a href='javascript:void(0)' class='hrf_add_email' >". lang('add_new_email_lnk')." </a>";
	}
	echo"</div>	";
	
?>
</div>
</div>


<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('website'); ?></label>
<div class="controls">
  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="website" id="website" value="<?php echo $website; ?>">
<div class="dv_error" id="dv_website_false" style="display:none; "><?php echo lang('website_false'); ?></div>
</div>
</div>

 
<div class="tabber">

<div class="tabbertab">
<h2>English</h2>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('location'); ?></label>
<div class="controls">
  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="location" id="location" value="<?php echo $location; ?>">
<div class="dv_error" id="dv_location_false" style="display:none; "><?php echo lang('location_false'); ?></div>
</div>
</div>


<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('address'); ?></label>
<div class="controls">
  <textarea name="address" id="address" rows="" cols="" style="width: 400px" <?php echo $are_disabled; ?>> <?php echo $address; ?></textarea>
</div>
</div>


</div>


<div class="tabbertab">
<h2>عربى</h2>  
  
<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('location_ar'); ?></label>
<div class="controls">
  <input class="input-xlarge focused" type="text" <?php echo $readonly; ?> name="location_ar" id="location_ar" value="<?php echo $location_ar; ?>">
  <div class="dv_error" id="dv_location_ar_false" style="display:none; "><?php echo lang('location_ar_false'); ?></div>
</div>
</div>

<div class="control-group">
<label class="control-label" for="focusedInput"><?php echo lang('address_ar'); ?></label>
<div class="controls">
  <textarea name="address_ar" id="address_ar" rows="" cols="" style="width: 400px" <?php echo $are_disabled; ?>> <?php echo $address_ar; ?></textarea>
</div>
</div>


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
    