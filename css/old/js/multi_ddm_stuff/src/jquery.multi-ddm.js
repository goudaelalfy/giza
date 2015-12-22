/*
 * Multi-level Drop Down Menu 3.0
 * April 17, 2010
 * Corey Hart @ http://www.codenothing.com
 */ 
(function( $jQueryMultiDMM, window, undefined ){
	// Needed for IE Compatibility (Closing menus must be done backwards in IE)
	// Ensure that no complications arise from other libraries modifying the 
	// array functionality (and hope that they store the old reverse function into _reverse)
	var el, a = Array.prototype, Reverse = a._reverse || a.reverse;

	// bgiframe is needed to fix z-index problem for IE6 users.
	// For applications that don't have bgiframe plugin installed, create a useless 
	// function that doesn't break the chain
	function emptyfn(){
		return this;
	}

	// Cache common event functions so they aren't instantiated with each event
	function clearSiblings(){
		$jQueryMultiDMM( el = this ).children('a').removeClass( $jQueryMultiDMM.data( el.parentNode , 'multi-ddm-classname' ) );
	}
	function oldMenus(){
		$jQueryMultiDMM( el = this ).hide().siblings('a').removeClass( $jQueryMultiDMM.data( el.parentNode.parentNode , 'multi-ddm-classname' ) );
	}

	
	// Expose the drop down menu
	$jQueryMultiDMM.fn.dropDownMenu = function( options ) {
		return this.each(function(){
			// Defaults with metadata support
			var $jQueryMultiDMMmain = $jQueryMultiDMM(this), i = 0, $jQueryMultiDMMmenu, timeout,
				settings = $jQueryMultiDMM.extend({
					timer: 500,
					parentMO: undefined,
					childMO: undefined,
					bgiframe: undefined,
					levels: []
				}, options || {}, $jQueryMultiDMM.metadata ? $jQueryMultiDMMmain.metadata() : {}),

				// Check on every initiation, so bgiframe can be loaded after this plugin
				bgiframe = $jQueryMultiDMM.fn.bgiframe || $jQueryMultiDMM.fn.bgIframe || emptyfn;

			// Loop through each level, attach the bgiframe and store it's classname
			$jQueryMultiDMMmenu = $jQueryMultiDMMmain.data( 'multi-ddm-classname', settings.levels[ 0 ] || settings.parentMO || settings.childMO || '' );
			while ( $jQueryMultiDMMmenu.length > 0 ) {
				$jQueryMultiDMMmenu = bgiframe.call(
					$jQueryMultiDMMmenu.find('> li > ul').data( 'multi-ddm-classname', settings.levels[ ++i ] || settings.childMO || '' ),
					settings.bgiframe
				);
			}

			// Use event delegation to track mouse movement across the menu
			$jQueryMultiDMMmain.delegate( 'li', 'mouseenter.multi-ddm', function(){
				var self = $jQueryMultiDMM( el = this );

				if ( timeout ) {
					clearTimeout( timeout );
				}

				// Close old menus and remove hover of non-menus
				Reverse.call( self.siblings('li').find('ul:visible') ).each( oldMenus ).end().each( clearSiblings );

				// Open new menu and remove any lingering hover elements
				self.children('a').addClass( $jQueryMultiDMM.data( el.parentNode, 'multi-ddm-classname' ) ).siblings('ul').show()
					.children('li').each( clearSiblings );
			})
			.bind( 'mouseleave.multi-ddm', function(){
				timeout = setTimeout( closemenu, settings.timer );
			});
	
			// Closes all open menus
			function closemenu(){
				// Clear mouseovers
				$jQueryMultiDMMmain.find('li').each( clearSiblings );

				// Close Menus backwards for IE Compatibility
				Reverse.call( $jQueryMultiDMMmain.find('ul:visible') ).hide();

				if ( timeout ) {
					clearTimeout( timeout );
				}
			}
			
			// Allows user option to close menus by clicking outside the menu on the body
			$jQueryMultiDMM( window.document ).bind( 'click.multi-ddm', closemenu );
		});
	};
})( jQuery, window || this );
