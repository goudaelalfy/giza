<?php $this->load->view('website/includes/header'); ?>
<?php require_once getcwd().'/css/old/header.php';?>
<link href="<?php echo base_url();?>css/old/tables-css/style.css" rel="stylesheet" type="text/css">

<?php 
$dropdowns= new Dropdowns();
$this_object= new JOB();
?>
	
<!-- Date Picker By Gouda -->
<script type='text/javascript' src='<?php echo base_url();?>css/old/js/bsoft_calendar_g/bsoft.js'></script>
<script type="text/javascript" src="<?php echo base_url();?>css/old/js/bsoft_calendar_g/calendar.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>css/old/js/bsoft_calendar_g/calendar-en.js"></script>
<link href="<?php echo base_url();?>css/old/js/bsoft_calendar_g/bscal.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>css/old/js/bsoft_calendar_g/fancyblue.css" rel="stylesheet" type="text/css">
	
	
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
					
					<form action="<?php echo base_url().$this->lang->lang();?>/job/search" method="get" name="frm_job_Search" id="frm_job_Search" >
        
			<table align="center" cellspacing="0" style="width:100%; border-collapse:collapse; border:0px; padding:0px;">
	
			<tr>
	
			<td style="padding-bottom:5px;">
			<table width="100%" cellpadding="0" cellspacing="0">
            	
                <!--
                <tr><td width="50%" align="left"><font color="#34abdd">All Results:</font> ( {$count} results)</td></tr>
               	-->
               	
            	</table>
			
            

		</td>

	</tr>

	<tr><td height="0" style="padding:0px;">
	
	
	
	<div style="float:left;  height:65px; width:50%; margin-left:10px; background-color:#EEE; border:solid 1px; border-color:#CCC;" align="left">
	<div style="margin-left:20px; margin-top:-20px; border:solid 1px; border-color:#DDD; width:150px; height:25px; background-color:#BBB; color:#FFFFFF; font-weight:bold"  align="center"> Search By Keyword </div>                                                 
	<div style="margin-left:20px; margin-top:10px;">
	<input type="text" name="keyword" id="keyword" size="30" />	
	<button value="Search" class="btnsubmit" name="smt_serach" id="smt_serach">Search</button>											
	</div>
	</div>
	
	
	<div style="float:left;  height:65px; width:42%; margin-left:14px; border:solid 0px; border-color:#CCC;" align="center">
	<div style=" float:right; margin-right:-24px; width:130px; margin-top:40px;
													height:26px;
													
													" 
													>                                                    
													<a style="text-decoration:none;color:#FFF;" href="<?php echo base_url().$this->lang->lang();?>/job/searchadvanced"><img src="<?php echo base_url();?>css/old/images/advanced_search.png" border="0" /></a>
													</div>
	</div>
	</td></tr>

    

	<tr height="300">

		<td style="border:0px; text-align:left; padding:0px;" valign="top">

        	<!-- pages search -->
		                        
			<table align="center" id="hor-zebra" summary="Employee Pay Sheet" style="width: 100%;">
			<thead style="background: #EEE">
			    	<tr>
			        	<th style="background: #EEE" colspan="4" height="20px">Results:</font> </th>
			        </tr>
			</thead>
			<thead style="background: #EEE">
			    	<tr>
			        	<th style="height:30px;background: #EEE" scope="col">Title</th>
			            <th style="height:30px;background: #EEE" scope="col">Location</th>
			            <th style="height:30px;background: #EEE" scope="col">Date</th>
			            <th style="height:30px;background: #EEE" scope="col"></th>
			        </tr>
			</thead>

			<thead>
			    	<tr>
			        	<th style="height:20px; background: #EEE" scope="col"><input type="text" name="job_title" id="job_title" size="40" /></th>
			            <th style="height:20px; background: #EEE" scope="col">
						<?php $dropdowns->drpdwn_hrmaindata($this_object, 'hr_city_preferred_to_work', '','city',''); ?>						
						</th>
			            <th  style="height:20px; background: #EEE" scope="col">

						<input type="text"  name="the_date" id="the_date" size="10"/>
                        <input type="reset" value="..." id='button_the_date' title='Click to pop up calendar' class="control">
                          
						<script type="text/javascript">
						var cal = new BSoft.Calendar.setup({
						inputField     :    "the_date",     // id of the input field
						ifFormat       :    "%d-%m-%Y",     //%I:%M %p format of the input field
						button         :    "button_the_date", // What will trigger popup of the calendar
						timeInterval   :     15,
						showsTime      :     false//true
						});
						</script>
							              
					</th>
					 <th style="height:20px; background: #EEE" scope="col">
					 <button value="Search" class="btnsubmit" name="smt_serach" id="smt_serach">Search</button>
					 </th>
			        </tr>
			</thead>
			
			
			
                <?php 
		              foreach($rows as $row) {
		              	$alias=$row->alias;
		              	$date_from=$row->date_from;
		              	$date_to=$row->date_to;
		              	
		            $date_from = date("d-m-Y",strtotime($date_from));
					$date_to = date("d-m-Y",strtotime($date_to));
					
		              	
		              	if($this->lang->lang()=='ar') {
							$title=$row->title_ar;
							$seo_words=$row->seo_words_ar;
							$description=$row->description;
							$location=$row->city_ar;
						} else {
							$title=$row->title;
							$seo_words=$row->seo_words;
							$description=$row->description;
							$location=$row->city;
						}
					
						$full_link_job=base_url().$this->lang->lang().'/job/content/'.$alias;
		              	
		              	echo "
		              	
						 <tr >
               
                	
                             <td align='left' style='text-align:left' width='300px' height='40px'>
                             <a href='$full_link_job' class='link' style='font-size:14px; color:#34abdd; text-decoration:none'>$title</a>
                             </td>
                             <td align='center' style='text-align:justify' valign='top'>
                             $location
                             </td>
                             <td align='center' style='text-align:justify' valign='top'>
                             $date_from - $date_to
                             </td> 
                             <td></td>                    
						</tr>
				
		              	";
		              }
					?>
               
			</table>

		</td>

	</tr>
    <tr>
    	<td> <!-- {$pagination}  --></td>
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
	