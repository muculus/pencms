// JavaScript Document
$(document).ready(function(){
		  $(".effect").next().hide();		   
	$(".effect").click(function () {
      if ( $(this).next().is(":hidden")) {
       $(this).next().slideDown("slow");
      } else {
        $(this).next().slideUp();
      }
    });
								   });
 