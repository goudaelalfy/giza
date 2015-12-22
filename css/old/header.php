	<link href="<?php echo base_url();?>css/old/css/bsoft.css" rel="stylesheet" type="text/css" />

		<link href="<?php echo base_url();?>css/old/css/tabs.css" rel="stylesheet" type="text/css" />

		
		<script src="<?php echo base_url();?>css/old/js/jquery-1.7.2.min.js" language="JavaScript"></script>

      
      
		<script type="text/javascript">var $jQueryBSoft = jQuery.noConflict();</script>

		<script type="text/javascript">var $jQuery = jQuery.noConflict();</script>
        
        <!-- tabs ######################################################################### -->
        
        <script type="text/javascript">var $jQueryTabs = jQuery.noConflict();</script>
        <script type="text/javascript">
        	$jQueryTabs(function() {
				$jQueryTabs(".tab_button").click(function() {
					this_id = $jQueryTabs(this).attr("id");
					$jQueryTabs('[id^=tabcontent_]').hide();
					$jQueryTabs('[id^=tabcontent_'+this_id+']').show();
					$jQueryTabs('.tab_button').attr("style", "background:url('<?php echo base_url();?>css/old/images/tab-inactive_wide.png') bottom left no-repeat; color:#585858;");
					$jQueryTabs(this).attr("style", "background:url('<?php echo base_url();?>css/old/images/tab-active_wide.png') bottom left no-repeat; color:#00a4e4;");
				});
			});
		</script>

        

        <!-- tabs end ######################################################################### -->

        

        <!-- sub tabs alpha ######################################################################### -->

        

        <script type="text/javascript">

        	$jQueryTabs(function() {

				$jQueryTabs(".subtab_button").click(function() {

					this_id = $jQueryTabs(this).attr("id");

					$jQueryTabs('[id^=subtabcontent_]').hide();

					$jQueryTabs('[id^=subtabcontent_'+this_id+']').show();

					$jQueryTabs('.subtab_button').attr("style", "color:#00355f;");

					$jQueryTabs(this).attr("style", "color:#ffffff;");

				});

			});

		</script>

        

        <!-- sub tabs alpha end ######################################################################### -->

        

         <!-- sub tabs industry ######################################################################### -->

        

        <script type="text/javascript">

        	$jQueryTabs(function() {

				$jQueryTabs(".subtabindustry_button").click(function() {

					this_id = $jQueryTabs(this).attr("id");

					$jQueryTabs('[id^=subtabindustrycontent_]').hide();

					$jQueryTabs('[id^=subtabindustrycontent_'+this_id+']').show();

					$jQueryTabs('.subtabindustry_button').attr("style", "color:#00355f;");

					$jQueryTabs(this).attr("style", "color:#ffffff;");

				});

			});

		</script>

        

        <!-- sub tabs end ######################################################################### -->

        

        <!-- sub tabs solution ######################################################################### -->

        

        <script type="text/javascript">

        	$jQueryTabs(function() {

				$jQueryTabs(".subtabsolution_button").click(function() {

					this_id = $jQueryTabs(this).attr("id");

					$jQueryTabs('[id^=subtabsolutioncontent_]').hide();

					$jQueryTabs('[id^=subtabsolutioncontent_'+this_id+']').show();

					$jQueryTabs('.subtabsolution_button').attr("style", "color:#00355f;");

					$jQueryTabs(this).attr("style", "color:#ffffff;");

				});

			});

		</script>

        

        <!-- sub tabs end ######################################################################### -->
        <!-- drop down menu ########################################################## -->

        <link rel='stylesheet' type='text/css' href='<?php echo base_url();?>css/old/js/multi_ddm_stuff/src/jquery.multi-ddm.css' />

		<!--<script type='text/javascript' src='multi_ddm_stuff/jquery/jquery-1.4.2.js'></script>-->

        <script type="text/javascript">var $jQueryMultiDMM = jQuery.noConflict();</script>

		<script type='text/javascript' src='<?php echo base_url();?>css/old/js/multi_ddm_stuff/src/jquery.multi-ddm.js'></script>

    	<!-- drop down menu end ########################################################## -->

		

        <!-- fading slider ########################################################## -->

		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/old/js/contentslider_stuff/contentslider.css" />

    	<script type="text/javascript" src="<?php echo base_url();?>css/old/js/contentslider_stuff/contentslider.js">

        /***********************************************

        * Featured Content Slider- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)

        * This notice MUST stay intact for legal use

        * Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more

        ***********************************************/

        </script>

		<!-- fading slider ########################################################## -->

		

		<!-- Flash in IE  fixing ############################################################# -->

		<script language="javascript">AC_FL_RunContent = 0;</script>

		<script src="<?php echo base_url();?>css/old/js/AC_RunActiveContent.js" type="text/javascript"></script>

		<!-- Flash in IE  fixing end ############################################################# -->

		

		<LINK REL="SHORTCUT ICON" HREF="favicon.ico">

		

		<!--jCarousel library-->

		<script type="text/javascript" src="<?php echo base_url();?>css/old/js/jcarousel_stuff/lib/jquery.jcarousel.min.js"></script>

		<!-- jCarousel skin stylesheet-->

		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/old/js/jcarousel_stuff/skins/tango/skin.css" />

		

		<script type="text/javascript">

		

		jQuery(document).ready(function() {

			jQuery('.mycarousel').jcarousel({

				scroll: 1,

				

			});

		});

		

		</script>

		



		<script language="javascript">

            $jQueryBSoft(document).ready(function (){

												   	/*

                window.document.getElementById('content_table').style.display = 'none';

                //$jQueryBSoft(document).find('img').hide();

                

                $jQueryBSoft('img').load(function() {

                    //if($jQueryBSoft(this).css("display") != "none")

                        $jQueryBSoft('img').fadeIn("fast");

                });

                

                arr_img = $jQueryBSoft(document).find('img');

                for(i=0; i<arr_img.length; i++)

                {

                    if(arr_img[i].style.display != "none")

                    {

                        $jQueryBSoft('img').hide();

                    }

                }

				*/

            });

            

            function load_completed ()
            {
                //alert('hi');
                window.document.getElementById('loading_progress_table').style.display = 'none';
                $jQueryBSoft('#content_table').fadeIn();
                //window.document.getElementById('content_table').style.display = '';
            }
            //);					
        </script>