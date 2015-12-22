<?php $this->load->view('website/includes/header'); ?>

<script type='text/javascript'  src='<?php echo base_url();?>js/website/contact/form.js' > </script>

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
					$menu_homebox_content_fullurl=base_url().$this->lang->lang().'/'.$menu_controller_name.'/content/'.$menu_alias;
				}
				
				$menu_title=substr($menu_title, 0, 25);
				
				
					if($menu_controller_name=='contact') {
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
						
						
						
						<div class="form">
							<form id="frm_contact" name="frm_contact" action="<?php echo base_url().$this->lang->lang();?>/contact/submit" method="post">
								<!--group-->
								<div class="group">
									
									<div class="row" style="color: #4a4a4a;">
										Telephone : +202 261 46000
										<br/><br/>
										Fax : +202 261 46001
										<br/><br/>
										Email : marketing@gizasystems.com
										<br/><br/>
										Or  Send Us
										<br/>
										<br/><br/>
									</div>
									
									
									<div class="row">
										<span class="name"><?php echo lang('name'); ?> *</span>
										<span class="field"><input type="text" name="name" id="name"   value="" class="text" /></span>
										<div class="dv_error" id="dv_name_false" style="display:none"><?php echo lang('name_false'); ?></div>
								
										<div class="clear"></div>
									</div>
									<div class="row">
										<span class="name"><?php echo lang('email'); ?> *</span>
										<span class="field"><input type="text" name="email" id="email"   value="" class="text" /></span>
										<div class="dv_error" id="dv_email_false" style="display:none"><?php echo lang('email_false'); ?></div>
								
										<div class="clear"></div>
									</div>
									
									<div class="row">
										<span class="name"><?php echo lang('subject'); ?> *</span>
										<span class="field"><input type="text" name="subject" id="subject"   value="" class="text" /></span>
										<div class="dv_error" id="dv_subject_false" style="display:none"><?php echo lang('subject_false'); ?></div>
								
										<div class="clear"></div>
									</div>
									
									<div class="row">
										<span class="name"><?php echo lang('message'); ?> *</span>
										<span class="field"><textarea name="message" id="message" rows="3" cols="30"></textarea></span>
										<div class="dv_error" id="dv_message_false" style="display:none"><?php echo lang('message_false'); ?></div>
								
										<div class="clear"></div>
									</div>
									
									<div class="buttons">
									<a href="javascript: submitform()"  class="submit" onclick="return validate_form('<?php echo $this->lang->lang(); ?>'); "></a>
									</div>
									
							</div>
							</form>
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
	