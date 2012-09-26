/**
 * Top Hats & Monocles
 *
 * @rel         javascript
 * @desc        This file controls the flow of some of the elements of the page.
 *              Some elements can't have CSS auto widths && || heights.
 *
 */

$(document).ready(function() {

	/** Placeholder Fixes: */
	if(!Modernizr.input.placeholder){
		$("input").each( function(){
			if($(this).val()==="" && $(this).attr("placeholder")!=="")
			{
				$(this).val($(this).attr("placeholder"));
				$(this).css('color','#aaa');
				$(this).focus(function(){
					if($(this).val()==$(this).attr("placeholder"))
					{
						$(this).val("");
						$(this).css('color','#000');
					}
				});
				$(this).blur(function(){
					if($(this).val()==="")
					{
						$(this).val($(this).attr("placeholder"));
						$(this).css('color','#aaa');
					}
				});
			}
		});
	}

	EWP.common.containerFixed();
	EWP.common.containerLong();
	$(window).resize(function(){
		EWP.common.containerFixed();
		EWP.common.containerLong();
	});

});

/* Modules:
=========*/
var EWP = (function($) {

	var common = (function() {
		return {

			containerFixed: function() {
				if($(window).height() < 546) {
					$('.container-fixed').css({'top':'270px'});
				} else {
					$('.container-fixed').css({'top':''});
				}
			},

			containerLong: function() {
				if($(window).height() < 546) {
					$('.navigation-fixed').css({'top':'270px'});
				} else {
					$('.navigation-fixed').css({'top':''});
				}
			}

		};
	}());

	return {
		'common': common
	};

}(jQuery));