<?php $this->load->view('admin/includes/header'); ?>

<?php 

$id=0;
$menu_id=0;

$last_modify_date='';

$are_disabled="";
$readonly="";


if($mode=='view')
{
	$are_disabled="disabled='disabled'";
}
	
	
	
/**
 * Dropdowns object.
 * 
 * Intialize object from Dropdowns class which contains methods fill all dropdowns of website.
 * @var object.
 */

$dropdowns= new Dropdowns();
	
/**
 * Menu object.
 * 
 * Intialize object from Menu controller class.
 * @var object.
 */
$this->load->controller(ADMIN.'/Menu');
$menu_object= new Menu();
	
?>



<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> <?php echo lang('menu_map')?></h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" id='frm_menumap_row' name='frm_menumap_row'  method='post' >

						<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
						<input type="hidden" name="last_modify_date" id="last_modify_date" value="<?php echo $last_modify_date; ?>"> 

							<fieldset>
							
							<div class="form-actions">
							
							
							<?php if($mode=='view') { 
	$readonly="readonly='readonly'";
	
		?>
	
    <a class='btn btn-info' href="<?php echo base_url().$this->lang->lang().'/'.ADMIN;?>/menumap/form/<?php echo $id;?>/edit">
    <i class='icon-edit icon-white'></i>  
	<?php  echo $this->lang->line('btn_edit'); ?>
	</a>
	
	
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

	<?php foreach($menu_map_rows as $menu_map_row) {
		$menu_code=$menu_map_row->code;
		$menu_id=$menu_map_row->menu_id;
	if($this->lang->lang()=='ar') {
		$menu_title=$menu_map_row->title_ar;
	} else {
		$menu_title=$menu_map_row->title;
	}
	?>			
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput"><?php echo $menu_title; ?></label>
								<div class="controls">
									<?php $dropdowns->drpdwn_menu($menu_object, $menu_id, $menu_code,$are_disabled); ?>
								
								</div>
							  </div>
							  
<?php }?>
 <div class="form-actions">
							  
							  
						    <?php if($mode!='view') { ?>
						    <input type="submit" class="btn btn-primary" name="smt_save" id="smt_save" value="<?php echo lang('btn_save'); ?>" onclick="return validate_form('<?php echo $this->lang->lang(); ?>'); " />
							<a class='btn btn-warning' href="javascript: history.go(-1)"><?php echo lang('btn_cancel'); ?></a>
							<?php }?>
							  </div>
							</fieldset>
						  </form>
					
					</div>
				</div><!--/span-->
			
			</div>




<?php $this->load->view('admin/includes/footer'); ?>