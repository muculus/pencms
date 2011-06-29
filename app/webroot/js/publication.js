// JavaScript 
$(document).ready(function(){
		  $(".publication").next().hide();		   
	$(".publication").click(function () {
      if ( $(this).next().is(":hidden")) {
       $(this).next().slideDown("slow");
      } else {
        $(this).next().slideUp();
      }
    });
								   });
 