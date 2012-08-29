/**
 * Top Hats & Monocles
 *
 * @rel         javascript
 * @desc        This file controls the flow of some of the elements of the page.
 *              Some elements can't have CSS auto widths && || heights.
 *
 */

$(document).ready(function() {

    if(!Modernizr.input.placeholder){
        $("input").each( function(){
            if($(this).val()=="" && $(this).attr("placeholder")!="")
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
                    if($(this).val()=="")
                    {
                        $(this).val($(this).attr("placeholder"));
                        $(this).css('color','#aaa');
                    }
                });
            }
        });
    }

});
