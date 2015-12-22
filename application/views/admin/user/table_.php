<?php $this->load->view('admin/includes/header'); ?>

<h2><?php echo lang('title')?> 
   
<!--                     
<a href="#" class="bt_blue"><span class="bt_blue_lft"></span><strong>View all items from category</strong><span class="bt_blue_r"></span></a>
 -->
<a href="javascript: submitform()" class="bt_red" onclick="return delete_all_confirm('<?php echo $this->lang->lang(); ?>');"><span class="bt_red_lft"></span><strong><?php  echo $this->lang->line('btn_delete_all'); ?></strong><span class="bt_red_r"></span></a>                          
<a href="<?php echo base_url().$this->lang->lang();?>/admin/user/form/0/add" class="bt_green"><span class="bt_green_lft"></span><strong><?php  echo lang('btn_add'); ?></strong><span class="bt_green_r"></span></a>

</h2> 
<form id="frm_display_data" name="frm_display_data" action="<?php echo base_url().$this->lang->lang();?>/submit_display" method="post">

<br/><br/>      

<?php 
$functions = new Functions();
$link_to_screen=base_url().$this->lang->lang().'/admin/user';
$functions->display_data_table($users,$link_to_screen,$this); 
?>
              


<a href="javascript: submitform()" class="bt_red" onclick="return delete_all_confirm('<?php echo $this->lang->lang(); ?>');"><span class="bt_red_lft"></span><strong><?php  echo $this->lang->line('btn_delete_all'); ?></strong><span class="bt_red_r"></span></a>                          
<a href="<?php echo base_url().$this->lang->lang();?>/admin/user/form/0/add" class="bt_green"><span class="bt_green_lft"></span><strong><?php  echo lang('btn_add'); ?></strong><span class="bt_green_r"></span></a>
  
     
        <div class="pagination">
        <span class="disabled"><< prev</span><span class="current">1</span><a href="">2</a><a href="">3</a><a href="">4</a><a href="">5</a>…<a href="">10</a><a href="">11</a><a href="">12</a>...<a href="">100</a><a href="">101</a><a href="">next >></a>
        </div> 
     
</form>



<?php $this->load->view('admin/includes/footer'); ?>
