var Browser = {
	Version: function() {
		var version = 999;
		if (navigator.appVersion.indexOf("MSIE") != -1){
			version = parseFloat(navigator.appVersion.split("MSIE")[1]);
		}
		return version;
	}
}
function isValidEmail(email) {
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}
function is_int(value) {
	for (i = 0; i < value.length; i++) {
		if ((value.charAt(i) < '0') || (value.charAt(i) > '9')) return false
	}
	return true;
}
function bookmark_site(title,url){
	if (window.sidebar){ // firefox
		window.sidebar.addPanel(title, url, "");
	}else if(window.opera && window.print){ // opera
		var elem = document.createElement('a');
		elem.setAttribute('href',url);
		elem.setAttribute('title',title);
		elem.setAttribute('rel','sidebar');
		elem.click();
	}else if(document.all){// ie
		window.external.AddFavorite(url, title);
	}
}
/*\INTERNET_EXPLORER_6_ERROR*/
$(document).ready(function() {
	if (Browser.Version() <= 6) {
		$('#ie6-error').show();
		$(window).scroll(function() {
			$("#ie6-error").css("top", $(window).scrollTop() + "px");
		});
		$(window).resize(function() {
			$("#ie6-error").css("top", $(window).scrollTop() + "px");
		});
	}
	$('#ie6-error .close').click(function(){
		$('#ie6-error').fadeOut(300);
	});
});
/*\INTERNET_EXPLORER_6_ERROR*/
/*##############################################################*/
$(document).ready(function() {
	/*news*/
	if($('#js-news').length > 0){
		$('#js-news').ticker({
			titleText: 'Latest News',
			'controls': false
		});
	}
	/*\news*/
	/*search*/
	if($('#header .content .search form input').length > 0){
		$('#header .content .search form input[placeholder]').placeholder();
	}
	/*\search*/
	/*main_block*/
	var CategoryItem = '#container .content #side-bar .main-block a.parent';
	$(CategoryItem).click(function(){
		if($(this).next('.sub:first').length > 0){
			if($(this).next('.sub:first').is(':visible')){
				$(CategoryItem).removeClass('open');
				$(this).next('.sub:first').slideUp();
			}else{
				$(CategoryItem).each(function(){
					if($(this).next('.sub:first').length > 0){
						if($(this).next('.sub:first').is(':visible')){
							$(this).next('.sub:first').slideUp();
						}
					}
				});
				$(CategoryItem).removeClass('open');
				$(this).addClass('open');
				$(this).next('.sub:first').slideDown();
			}
			return false;
		}
	});
	if($(CategoryItem).length > 0){
		$(CategoryItem).first().css('border-top-color', 'transparent');
		$(CategoryItem).last().css('border-bottom-color', 'transparent');
	}
	if($('#container .content #side-bar .main-block .sub a').length > 0){
		$('#container .content #side-bar .main-block .sub a').each(function(){
			if($(this).hasClass('current')){
				if($(this).parents('.sub').prev('a.parent').length > 0){
					var CurrentParent = $(this).parents('.sub').prev('a.parent');
					CurrentParent.trigger('click');
				}
			}
		});
	}
	/*\main_block*/
	/*login*/
	if($('#container .content #main .main-body #login-block .block form').length > 0){
		$('#container .content #main .main-body #login-block .block form').submit(function(){
			if($(this).find('input[type="text"]').val() == ''){
				$(this).find('input[type="text"]').focus();
				var InputName = 'Username';
				if($(this).find('input[type="text"]').attr('placeholder')){
					InputName = $(this).find('input[type="text"]').attr('placeholder');
				}
				alert('Please type your ' + InputName);
				return false;
			}else if($(this).find('input[type="password"]').val() == ''){
				$(this).find('input[type="password"]').focus();
				var InputName = 'Password';
				if($(this).find('input[type="password"]').attr('placeholder')){
					InputName = $(this).find('input[type="password"]').attr('placeholder');
				}
				alert('Please type your ' + InputName);
				return false;
			}
		});
		$('#container .content #main .main-body #login-block .block form a.submit').click(function(){
			$(this).parents('form').submit();
			return false;
		});
		$('#container .content #main .main-body #login-block .block form input').keyup(function(e){
			if(e.keyCode == 13){
				$(this).parents('form').submit();
				return false;
			}
		});
	}
	/*\login*/

	/*media-kit-page*/
	var DownloadLink = '#container .content #main .main-body #media-kit-block .list .item .download';
	$(DownloadLink).click(function(){
		if($(this).next('.files:first').length > 0){
			if($(this).next('.files:first').is(':visible')){
				$(DownloadLink).removeClass('open');
				$(this).next('.files:first').slideUp();
			}else{
				$(DownloadLink).each(function(){
					if($(this).next('.files:first').length > 0){
						if($(this).next('.files:first').is(':visible')){
							$(this).next('.files:first').slideUp();
						}
					}
				});
				$(DownloadLink).removeClass('open');
				$(this).addClass('open');
				$(this).next('.files:first').slideDown();
			}
			return false;
		}
	});
	/*\media-kit-page*/

	/*hr-application-page*/
	if($('#hr-application-block').length > 0){
		var HrForm = '#container .content #main .main-body #hr-application-block .form form';
		var BackButton = '#container .content #main .main-body #hr-application-block .form form .buttons a.back';
		var NextButton = '#container .content #main .main-body #hr-application-block .form form .buttons a.next';
		var SubmitButton = '#container .content #main .main-body #hr-application-block .form form .buttons a.submit';
		var TabsLength = $('#container .content #main .main-body #hr-application-block .tabs .list .tab').length;
		var HrTabButton = '#container .content #main .main-body #hr-application-block .tabs .list .tab';
		var CurrentTab = '#container .content #main .main-body #hr-application-block .tabs .list .tab.current';
		var ii = TabsLength;
		$('#container .content #main .main-body #hr-application-block .tabs .list .tab').each(function(){
			$(this).css('z-index', ii);
			if(ii == 1){
				$('#container .content #main .main-body #hr-application-block .tabs .list').show();
			}
			ii--;
		});
		var HrValidator = $(HrForm).validate({
			'errorElement': 'span',
			'errorClass': 'validator-error',
			'validClass' : 'valid-field'
		});
		function HR_Validate(){
			//alert(HrValidator.numberOfInvalids())
			return $(HrForm).valid();
		}

		var CurrentGroupIndex = $(CurrentTab).index();
		$('#container .content #main .main-body #hr-application-block .form form .group:eq('+CurrentGroupIndex+')').show();

		var HrRunTab = true;
		function hrTabClick(element){
			if(HrRunTab){
				$('#container .content #main .main-body #hr-application-block .form form .group').hide();
				$('#container .content #main .main-body #hr-application-block .form form .group:eq('+$(element).index()+')').show();
				$('#container .content #main .main-body #hr-application-block .tabs .list .tab').each(function(){
					if($(this).hasClass('current')){
						$(this).removeClass('current');
					}
				});
				$(element).addClass('current');
				hrApplicationButtons();
			}
		}
		$('#container .content #main .main-body #hr-application-block .tabs .list .tab').click(function(){
			HrRunTab = true;
			var sThis = this;
			var CurrentVisibleGroup = $('#container .content #main .main-body #hr-application-block .form form .group:visible');
			if(!HR_Validate()){
				if($('#container .content #main .main-body #hr-application-block .form form .group:eq(' + CurrentVisibleGroup.index() + ')').find('.validator-error').length > 0){
					$('#container .content #main .main-body #hr-application-block .form form .group:eq(' + CurrentVisibleGroup.index() + ')').find('.validator-error').each(function (index) {
						if($(this).prop("tagName").toLowerCase() != 'span'){
							HrRunTab = false;
						}

						if(index == ($('#container .content #main .main-body #hr-application-block .form form .group:eq(' + CurrentVisibleGroup.index() + ')').find('.validator-error').length - 1)){
							hrTabClick(sThis);
						}
					});
				}else{
					hrTabClick(sThis);
				}
			}else{
				hrTabClick(sThis);
			}
		});

		$(BackButton).click(function(){
			$('#container .content #main .main-body #hr-application-block .tabs .list .tab:eq('+($(CurrentTab).index()-1)+')').trigger('click');
			return false;
		});
		$(NextButton).click(function(){
			$('#container .content #main .main-body #hr-application-block .tabs .list .tab:eq('+($(CurrentTab).index()+1)+')').trigger('click');
			return false;
		});
		$(SubmitButton).click(function(){
			$(this).parents('form').submit();
			if($('#container .content #main .main-body #hr-application-block .form form').find('.validator-error').length > 0){
				var HrInvalidElements = HrValidator.invalidElements();
				var HrFirstErrorTab = $(HrInvalidElements[0]).parents('.group').index();
				if(HrFirstErrorTab != TabsLength-1){
					$('#container .content #main .main-body #hr-application-block .tabs .list .tab:eq('+HrFirstErrorTab+')').trigger('click');
				}
			}
			return false;
		});

		function hrApplicationButtons(){
			if($(CurrentTab).index() == 0){
				$(BackButton).hide();
				$(NextButton).show();

				if($(CurrentTab).index() == TabsLength-1){
					$(SubmitButton).show();
					$(NextButton).hide();
				}else{
					$(SubmitButton).hide();
					$(NextButton).show();
				}
			}
			if($(CurrentTab).index() > 0){
				$(BackButton).show();

				if($(CurrentTab).index() == TabsLength-1){
					$(SubmitButton).show();
					$(NextButton).hide();
				}else{
					$(SubmitButton).hide();
					$(NextButton).show();
				}
			}
		}
		hrApplicationButtons();
	}
	/*\hr-application-page*/

	/*home-boxes*/
	var HB_Left_arrow = '#container .content .boxes-left-arrow';
	var HB_Right_arrow = '#container .content .boxes-right-arrow';
	var HB_Container = '#container .content .home-boxes';
	var HB_List = '#container .content .home-boxes .list';
	var HB_Box = '#container .content .home-boxes .list .box';
	if($(HB_Box).length > 3){
		var HB_Current_box_index = 0;
		var HB_Max_box_index = ($(HB_Box).length - 1)-2;
		var HB_Min_box_index = HB_Current_box_index;
		var HB_Container_height = $(HB_Container).height();
		var HB_List_height = $(HB_List).height();

		$(HB_Container).css('height', HB_Container_height);
		$(HB_List).css({
			'height': HB_List_height,
			'left': 0,
			'top': 0,
			'position': 'absolute'
		});
		$(HB_Left_arrow).css({
			'top': (HB_Container_height.toFixed()/2)-10
		}).show();
		$(HB_Right_arrow).css({
			'top': (HB_Container_height.toFixed()/2)-10
		}).show();

		function HBf_run(){
			$(HB_List).animate({
				'left' : '-'+$(HB_Box + ':eq('+HB_Current_box_index+')').position().left
			}, 600, 'easeOutExpo');
		}
		function HBf_to_right(){
			if(HB_Current_box_index == HB_Max_box_index){
				HB_Current_box_index = 0;
			}else{
				HB_Current_box_index++;
			}
			HBf_run();
		}

		function HBf_to_left(){
			if(HB_Current_box_index == HB_Min_box_index){
				HB_Current_box_index = HB_Max_box_index;
			}else{
				HB_Current_box_index--;
			}
			HBf_run();
		}

		$(HB_Right_arrow).click(function(){
			if(!$(HB_List).is(':animated')){
				HBf_to_right();
			}
		});

		$(HB_Left_arrow).click(function(){
			if(!$(HB_List).is(':animated')){
				HBf_to_left();
			}
		});

	}
	/*\home-boxes*/

	if($('#header .content .sg a.favorites').length > 0){
		$('#header .content .sg a.favorites').click(function(){
			bookmark_site('Giza Systems', 'http://www.gizasystems.com');
			return false;
		});
	}
});