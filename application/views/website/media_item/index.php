<?php $this->load->view('website/includes/header'); ?>


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
				
				//----------- Sub section menus --------------------------------
				if($menu_controller_name=='mediasectioncategory') {
				//echo "<div class='sub' style='display: block;'>";
				$media_section_by_category_rows=$this->Media_section_model->get_by_media_section_category_alias($menu_alias);
				foreach($media_section_by_category_rows as $media_section_row) {
				$media_section_id=$media_section_row->id;
				$media_section_alias=$media_section_row->alias;
				$media_section_icon= base_url().$media_section_row->icon;
				
				if($this->lang->lang()=='ar') {
							$media_section_title=$media_section_row->title_ar;
							
						} else {
							$media_section_title=$media_section_row->title;
							
							
						}
						//echo "<a href='".base_url().$this->lang->lang()."/mediasection/content/$media_section_alias'>$media_section_title</a>";
				}
				
				//echo "</div>";
				}
				//-----------------------------------------------------------------
				
				
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
					<div class="hint"><?php echo lang('media_center'); ?></div>
					<h1><?php if(isset($title)) {echo $title;} ?></h1>
					<div class="main-body empty">
						 
<table width="100%" align="center" cellspacing="0" style="text-align:left; padding:0px;">

						
							<tr valign="top">

								<td height="350" style="padding:20px; padding-top:3px;margin:0px;">
							
								<br />


                                <table width="100%" align="center" cellspacing="0" style="text-align:left; padding:0px; padding-top:20px;">

                                    <tr>

                                        <td valign="top" style="padding:0px; margin:0px; padding-top:0px; text-align:justify; width:390px;">

											<table width="100%" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; padding:0px;">

												<tr>
<!-- 
                                                    <td align="left" valign="top" style="padding-top:0px; margin:0px; text-align:justify">

														{if $arr_infomediasection_items[0].image neq ""}

                                                        <img src="{$arr_infomediasection_items[0].image}" align="left" style="margin-right:20px; margin-bottom:10px;" />
                                                    	{/if}
                                                    
                                                        {if $arr_infomediasection_items[0].url neq ""}

                                                        <a href="{$arr_infomediasection_items[0].url}" style="color:#00a4e4; text-decoration:none; padding:0px; margin:0px;">

                                                        {/if}

                                                        	<font style="color:#00a4e4; font-size:12pt;">{$arr_infomediasection_items[0].title}</font>

                                                    	{if $arr_infomediasection_items[0].url neq ""}

                                                        </a>

                                                        {/if}
 -->
                                                        

                                                        

														<script language="javascript">

                                                        function show_more(record_id)

                                                        {

                                                            window.document.getElementById('infomediasection_item_'+record_id).style.display='';

                                                            window.document.getElementById('readmore_'+record_id).style.display='none';

                                                        }

                                                        

                                                        function show_less(record_id)

                                                        {

                                                            window.document.getElementById('infomediasection_item_'+record_id).style.display='none';

                                                            window.document.getElementById('readmore_'+record_id).style.display='';

                                                        }

                                                        </script>

                                                       

                                                    <div align="left" style="border:0px; margin:0px; padding:0px; border-collapse:collapse;">

                                                    <?php echo $brief; ?>
													<a href="javascript: history.go(-1)" style="color:#00a4e4; text-decoration:none;">Back to List</a>
													<br/><br/>
                                                    <?php if($pdf_file!='') {?>

                                                    	<a href="<?php echo base_url().$pdf_file;?>" style="color:#00a4e4; text-decoration:none;">

                                                            <img src="<?php echo base_url();?>css/old/images/pdf-icon.png" border="0" align="left" style="padding-top:5px;" />

                                                        </a>
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;				
                                                    <?php }?>
                                                    
                                                    <?php if($video_file!='') {?>


                                                    	<a href="<?php echo base_url().$video_file;?>" style="color:#00a4e4; text-decoration:none;">

                                                            <img src="<?php echo base_url();?>css/old/images/gs_ws_9_top_icons_15.png" border="0" align="left" style="padding-top:5px;" width="20px" height="20px" />

                                                        </a>

                                                    <?php }?>
                                                                                                        
                                                    

                                                    </div>

                                                    <div id="infomediasection_item_{$arr_infomediasection_items[0].giza_infomediasection_item_id}" align="left" 

                                                        style="border:0px; margin:0px; padding:0px; display:none">

                                                    <?php echo $body;?>
                                                    

                                                    <a href="javascript:show_less('{$arr_infomediasection_items[0].giza_infomediasection_item_id}');" style="color:#00a4e4; text-decoration:none;">... less</a>

                                                    </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                	<td height="5"></td>
                                                </tr>
                                                <?php if($video_file!='') {?>
                                                <script src="<?php echo base_url();?>css/old/js/swfobject_modified.js" type="text/javascript"></script>
												<tr>
                                                	<td align="center" valign="top" colspan="2">
	
<!--
<object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="750" height="600">
  <param name="movie" value="flvplayback_programming9.swf" />
  <param name="quality" value="high" />
  <param name="wmode" value="opaque" />
  <param name="swfversion" value="9.0.45.0" />
  <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don't want users to see the prompt. -->
<!-- 
<param name="expressinstall" value="js/expressInstall.swf" />
  <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
  <!--[if !IE]>-->
  <!--
  <object type="application/x-shockwave-flash" data="flvplayback_programming9.swf" width="750" height="600">
    <!--<![endif]-->
    <!--
    <param name="quality" value="high" />
    <param name="wmode" value="opaque" />
    <param name="wmode" value="transparent" />
    <param name="swfversion" value="9.0.45.0" />
    <param name="expressinstall" value="js/expressInstall.swf" />
    <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
    <!--
    <div>
      <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
      <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
    </div>
    <!--[if !IE]>-->
  <!--
  </object>
  <!--<![endif]-->
<!--
</object>
 -->
 
 <br/><br/>                  
 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://www.stephenbelanger.com/wp-content/uploads/2010/01/jquery.flash.min_.js"></script>

<div id="myplayer">
<script type="text/javascript">
    $(document).ready(function(){
        $('#myplayer').flash({
            'src':'http://www.gdd.ro/gdd/flvplayer/gddflvplayer.swf',
            'width':'620',
            'height':'380',
            'allowfullscreen':'true',
            'allowscriptaccess':'always',
            'wmode':'transparent',
            'flashvars': {
                'vdo':'<?php echo base_url().$video_file; ?>',
                'sound':'50',
                'splashscreen':'',
                'autoplay':'false',
				'clickTAG':'',
                'endclipaction':'javascript:endclip();'
            }
        });
    });
</script>
</div>
          
<script>
// endclip function called when clip ends
function endclip(){
			$('#myplayer').flash({
            'src':'http://www.gdd.ro/gdd/flvplayer/gddflvplayer.swf',
            'width':'640',
            'height':'480',
            'wmode':'transparent',
            'flashvars': {
                'vdo':'videos/{$arr_infomediasection_items[0].file}',
                'autoplay':'true',
            }
			});	
	}
</script>        
                   
                                                    </td>
                                                </tr>
                                                <?php }?>
                                            </table>

                                        </td>


                                    </tr>

                                    </table>


								</td>

							</tr>

							<tr>

								<td valign="top" height="14" 

									style="padding:0px;margin:0px;">

								</td>

							</tr>

						</table>

						
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
	