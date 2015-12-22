<?php $this->load->view('admin/includes/header'); ?>

<script type='text/javascript'  src='<?php echo base_url();?>js/includes/jquery.js' > </script>
<script type='text/javascript'  src='<?php echo base_url();?>js/screen/ajax_paging.js' > </script>



<form id="frm_display_data" name="frm_display_data" action="<?php echo base_url().$this->lang->lang();?>/admin/screen/submit_display" method="post">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="top_title"><?php echo lang('title')?></td>
  </tr>
  <tr>
    <td class="bot_tab">
	
	
	<span class="delete_btn"><a href="javascript: submitform()" onclick="return delete_all_confirm('<?php echo $this->lang->lang(); ?>');"><?php  echo $this->lang->line('btn_delete_all'); ?></a></span>
	<span class="add_btn"><a href="<?php echo base_url().$this->lang->lang();?>/admin/screen/form/0/add"><?php  echo lang('btn_add'); ?></a></span>
	
	<table width="100%" border="0" cellpadding="0" cellspacing="1" style="table-layout: inherit">
	<tr>
	<td bgcolor="#e1e1e1">
	
	
	
	
<!-- 	
<div class='search-background1' style="position: absolute; text-align: center">
<img src='<?php echo base_url();?>images/icons/loading.gif' alt='' />
</div> 
 -->

<div id='news' class='tabcon'>
<div id='resn'></div>

<?php 

echo"<div id='div_table_display_records'>";

echo "<div id='pagesn'>";

		 
	$page=1;
	$ipp=$paging_no_of_pages;//items per page
	$totalpages=ceil($rows_count/$ipp);
	echo"<span class='peg'><ul class='pages'>";
	for($i=1;$i<=$totalpages; $i++)
	{
		echo"<li class='$i'><a href='#'>$i</a></li>";
	}
	echo"</ul></span>";

	
echo "</div>";

echo"</div>";

?>
</div>
	
	
	
	
	</td>
	</tr>
	</table>
	
	
	</td>
  </tr>
</table>


</form>

<?php $this->load->view('admin/includes/footer'); ?>