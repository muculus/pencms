<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="rtl" xml:lang="en-gb" xmlns="http://www.w3.org/1999/xhtml" lang="en-gb"> 
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content="دانلود رایگان , مقالات  , مقاله , کتاب الکترونیکی , نشریه , نرم افزار های مهندسی , جزوات دانشگاه های معتبر , اخبار دنیای تکنولوژی , مهندسی برق  , کنترل , الکترونیک , قدرت , مهندسی پزشکی , بیو الکترونیک , رباتیک , نانوالکترونیک  ,مهندسی فناوری اطلاعات , سخت افزار ,نرم افزار "/>
    <meta name="description" content="دانش‌فا مرجع مهندسی برق و کامپیوتر ارائه دهنده ی مقالات علمی در همه‌ی گرایش‌های برق و کامپیوتر و تمام زمینه های مربوط به آنها می باشد"/>
    <meta name="generator" content="Pendar kavir IT co"/>
    <title>دانش&zwnj;فا مرجع اینترنتی مهندسی برق و کامپیوتر | مقالات | جزوات | کتاب | اخبار</title>
    <link rel="stylesheet" href="/css/style_006.css" type="text/css"/>
    <link rel="stylesheet" href="/css/style_003.css" type="text/css"/>
    <link rel="stylesheet" href="/css/ja.css" type="text/css"/>
    <link rel="stylesheet" href="/css/style_002.css" type="text/css"/>
    <link rel="stylesheet" href="/css/ja_contentslide.css" type="text/css"/>
    <link rel="stylesheet" href="/css/style.css" type="text/css"/>
	<link rel="stylesheet" href="/css/jquery.easywidgets.css" type="text/css"/>

	<link rel="stylesheet" href="/css/tabs/jquery.ui.core.css" type="text/css"/>    
	<link rel="stylesheet" href="/css/tabs/jquery.ui.tabs.css" type="text/css"/>
    <link rel="stylesheet" href="/css/tabs/jquery.ui.theme.css" type="text/css"/> 
	
    <link rel="stylesheet" href="/css/system.css" type="text/css"/>
    <link rel="stylesheet" href="/css/general.css" type="text/css"/>
    <link rel="stylesheet" href="/css/addons.css" type="text/css"/>
    <link rel="stylesheet" href="/css/layout.css" type="text/css"/>
    <link rel="stylesheet" href="/css/template.css" type="text/css"/>
    <link rel="stylesheet" href="/css/style6.css" type="text/css"/>
    <link rel="stylesheet" href="/css/typo.css" type="text/css"/>
    <!--[if IE]>
    <link rel="stylesheet" href="/css/ie.css" type="text/css" />
    <![endif]-->
    <!--[if lt IE 7.0]>
    <link rel="stylesheet" href="/css/ie7minus.css" type="text/css" />
    <style>
    .main {
        width: expression(document.body.clientWidth < 770? "770px" : document.body.clientWidth > 1200? "1200px" : "auto");
        }
    </style>
    <![endif]-->
    <!--[if IE 7.0]>
    <style>
    .clearfix { display: inline-block; } /* IE7xhtml*/
    </style>
    <![endif]-->
	<script src="/js/flashfile/swfobject_modified.js" type="text/javascript"></script>
    <script type="text/javascript" src="/js/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="/js/jquery.jcarousel.min.js"></script>	
    <script language="javascript" type="text/javascript" src="/js/jquery.innerfade.js"></script>
    <script language="javascript" type="text/javascript" src="/js/jquery.easing.js"></script>
	<script language="javascript" type="text/javascript" src="/js/jquery-ui-1.8.7.custom.min.js"></script>
    <script language="javascript" type="text/javascript" src="/js/jquery.easywidgets.js"></script>
    <script type="text/javascript" src="/js/script1.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">google.load("visualization", "1", {packages:["corechart"]});</script>
	 
	<script type="text/javascript">
$(document).ready(function() {
		$('#poll_button').click(function() {
var poll_option = $('input[name=poll_option]:checked').val();
//alert(poll_option);
//var ajax_load = "<img class='loading' src='/img/load.gif' alt='loading...' />";
//$('.poll-box').html(ajax_load).load('/polls/form4/id:'+poll_option+'/item:799');

bodyContent = $.ajax({
      url: '/polls/form4/id:'+poll_option+'/item:799',
      global: false,
      async:false,
      success: function(msg){
	 // alert(msg);
	  
             //  google.load("visualization", "1", {packages:["corechart"]});
		//		google.setOnLoadCallback(drawChart);
			//	function drawChart() {
					
					 jQuery.globalEval(msg);
					var chart = new google.visualization.PieChart(document.getElementById('poll-box'));
                    chart.draw(data, {width: 220, height: 170, title: title});

				//	var chart = new google.visualization.PieChart(document.getElementById('poll-chart'));
					//chart.draw(data, {width: 200, height: 300, title: 'My Daily Activities'});
				//}
	  
      }
   }
).responseText;
   });
   });
	</script>
	<script type="text/javascript">
		$(function easywidget(){
				//<![CDATA[
			  // Very basic usage
				$.fn.EasyWidgets({
				behaviour : {
						  dragDelay : 100,
						  dragRevert : 400, 
						  dragOpacity : 0.8,
						  useCookies : true
						  }, 
				i18n : {
				  editText : '<img src="http://www.daneshfa.com/images/icon-setting.gif" alt="Edit" width="16" height="16" />',
				  closeText : '<img src="http://www.daneshfa.com/images/close.gif" alt="Close" width="16" height="16" />',
				  collapseText : '<img src="http://www.daneshfa.com/images/icon-min.gif" alt="Close" width="16" height="16" />',
				  cancelEditText : '<img src="http://www.daneshfa.com/images/icon-setting.gif" alt="Edit" width="16" height="16" />',
				  extendText : '<img src="http://www.daneshfa.com/images/icon-max.gif" alt="Close" width="16" height="16" />'
				},
			    effects : {
				  effectDuration : 700,
				  widgetShow : 'fade',
				  widgetHide : 'fade',
				  widgetClose : 'fade',
				  widgetExtend : 'fade',
				  widgetCollapse : 'fade',
				  widgetOpenEdit : 'fade',
				  widgetCloseEdit : 'fade',
				  widgetCancelEdit : 'fade'
				}

						  
						  
			  });
			});//]]>
	</script>
	<script type="text/javascript">
	$(function() {
		$("#myTab-1727955188").tabs({
			collapsible: true,
			fx: { opacity: 'toggle' }
		});
	});
	</script>
	<script type="text/javascript">
		function mycarousel_initCallback(carousel) {

			jQuery('.ja-contentslider-right').bind('click', function() {
				carousel.next();
				return false;
			});

			jQuery('.ja-contentslider-left').bind('click', function() {
				carousel.prev();
				return false;
			});
		};

    	jQuery(document).ready(function() {
			jQuery('.ja-contentslider-center').jcarousel({
				wrap: 'circular',
				scroll: 1,
				initCallback: mycarousel_initCallback,
				// This tells jCarousel NOT to autobuild prev/next buttons
				buttonNextHTML: null,
				buttonPrevHTML: null
			});
		});



	</script>

	
	
    <script type="text/javascript">  
	$(document).ready( function(){ 
				$('#jahl-wapper-items-jalh-modid58').innerfade({  speed: 1200, timeout: 6000 }); } ); 
  
	</script> 
	<script type="text/javascript">

		$(document).ready( function(){	
            var buttons = { previous:$('#lofslidecontent45 .lof-previous') ,
                            next:$('#lofslidecontent45 .lof-next') };
                            $obj = $('#lofslidecontent45').lofJSidernews( { interval : 10000,
                                                    direction		: 'opacity',	
                                                    easing			: 'easeOutBounce',
                                                    duration		: 1200,
                                                    auto		 	: true,
                                                    mainWidth       :10,
                                                    buttons			: buttons} );	
        });
    </script>
	
    <style type="text/css">.ja-movable-container{visibility: hidden;}</style>
    <link href="/css/moo.css" rel="stylesheet" type="text/css"/>
    <script src="/js/moo.js" language="javascript" type="text/javascript"></script>
    <link href="/css/default.css" rel="stylesheet" type="text/css"/>
    <!--Width of template -->
    <style type="text/css">
    .main {width: 950px;margin: 0 auto;}
    #ja-wrapper {min-width: 951px;}
    </style>

	<style type="text/css">
</style>	
    
	<link href="/css/template_rtl.css" rel="stylesheet" type="text/css"/>
    <!--[if IE 8.0]>
    <link rel="stylesheet" href="/css/ie8-rtl.css" type="text/css" />
    <![endif]-->
    <!--[if lt IE 8.0]>
    <link rel="stylesheet" href="/css/ie-rtl.css" type="text/css" />
    <![endif]-->
	<script type="text/javascript">
	//<![CDATA[
	//$(".advancedSearchButton").click(function(speed , easing , callback) { $("#advancedSearch").animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);};
	jQuery.fn.slideFadeToggle = function(speed, easing, callback) {
	  return $("#advancedSearch").animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);  
	};
	$(document).ready(function() {
 		 	$('.advancedSearchButton').click(function() {
    		$("#advancedSearch").next().slideFadeToggle(700);
 		});
	});

	jQuery.fn.slideHide = function(speed, easing, callback) {
	  return this.animate({height: 'hide'}, speed, easing, callback);  
	};	
	jQuery.fn.slideShow = function(speed, easing, callback) {
	  return this.animate({height: 'show'}, speed, easing, callback);  
	};	
	jQuery.fn.slidexyToggle = function(speed, easing, callback) {
	  return this.animate({height: 'toggle' , width:'toggle'}, speed, easing, callback);  
	};	

	$(document).ready(function() {
 		 	$("input[name='ContentType']").change(function() {
			//$("#geraiesh").next().slideToggle(400);
			if ($("input[name='ContentType']:checked").val() == '0')
				$("#geraiesh").slideShow(400);
			else 
				$("#geraiesh").slideHide(400);
    		
 		});
	});
	
	$(document).ready(function() {
			$('.ja-cancel').click(function() {
				$(".ja-usersetting-options").slidexyToggle(700);
			});	
 		 	$('.widget-editlink').click(function() {
			//shareID = $('#'+$(this).attr('id'));
			widgetAjax = $(this).parent().parent().parent();
			//widgetAdd= $(this);
			//alert(aaa.attr('id'));
			cssObj = {left: $(this).position().left+270,top: $(this).position().top+310};
			$('.ja-usersetting-options').css(cssObj);
    		$(".ja-usersetting-options").slidexyToggle(700);
 		});
	});

	
	var ajax_load = "<img class='loading' src='/img/load.gif' alt='loading...' />";
	// load() functions
	 var loadUrl = "http://www.daneshfa.com/articles/resetwidget";
	 $(document).ready(function() {
		$(".resetWidget").click(function(){
				$("#widgetplace1").html(ajax_load).load(loadUrl);
					document.cookie='ew-close'+'=; expires=Thu, 01-Jan-70 00:00:01 GMT;';				
					document.cookie='ew-position'+'=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
					document.cookie='ew-collapse'+'=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
	 }); });



	$(document).ready(function() {
 		 	$("input[name='reshte']").change(function() {
			//$("#geraiesh").next().slideToggle(400);
			$("ul[class='catselect']").slideHide(200);
			$("#"+$("input[name='reshte']:checked").val()).slideShow(400);
			//alert("#"+$("input[name='reshte']:checked").val());  		
 		});
	});
	 
	//]]>

	</script>
	<script type="text/javascript">
	$(document).ready( function resetWidget(){ 
			document.cookie='ew-close'+'=; expires=Thu, 01-Jan-70 00:00:01 GMT;';			
				} ); 

	</script>
	<script type="text/javascript">
	$(document).ready(function() {
		$(".ja-submit").click(function() {
		// validate and process form
		// first hide any error messages
		
	  var reshte = $("input[name=reshte]").val();
	  var contentType = $("input[name=ContentType]").val();
	  var show = $("input[name=show]:checked").val();
	 
		var geraiesh = new Array()
		jQuery("input:checkbox[name=geraiesh]:checked").each(function(){
         geraiesh.push(this.value)
		});
		//alert(geraiesh);
		var title = new Array()
		jQuery("input:checkbox[name=geraiesh]:checked").each(function(){
         title.push($(this).attr('tag'));
		 //alert($(this).attr('tag'));
		});		
	/*	jQuery(".jazin-box").each(function(){
         geraiesh.push(this.value)
		});*/
		//var aaa=$(this).parent().parent().parent().parent().parent().parent();
		//alert(aaa.attr('id'));
		//alert(show);
				
		var dataString = 'reshte:'+ reshte + '/contentType:' + contentType + '/show:' + show + '/geraiesh:' + geraiesh+'/title:'+title;
		//alert (dataString);//return false;
		var ajax_load = "<img class='loading' src='/img/load.gif' alt='loading...' />";
	// load() functions
	 var loadUrl = "http://www.daneshfa.com/articles/resetwidget/"+dataString;
	 //alert(widgetAjax.attr('id'));
	 if(widgetAjax.attr('id') == "widget-add" ){
	// alert("aa");
		AddWidget('http://www.daneshfa.com/articles/resetwidget/'+dataString, 'widgetplace1'); return false
	 }else{
		widgetAjax.html(ajax_load).load(loadUrl);
	 }
	/*$.ajax({
      type: "POST",
      url: "/articles/resetwidget.php",
      data: dataString,
      success: function() {
       // $('#contact_form').html("<div id='message'></div>");
        $('#ja-wrapper').html("<h2>Contact Form Submitted!</h2>")
        .append("<p>We will be in touch soon.</p>")
        .hide()}
     });
    });*/});});

 $(document).ready(function() {
$('#checkall-142-sec11').click(function() {
var checked_status = this.checked;
$("INPUT[name=geraiesh]").each(function()
{
this.checked = checked_status;
});
});});
</script>
<script>
//ADDING new widget
// In case that you need, initialize here and
// use every where your own EasyWidgets settings
var EASettings = {};
// DOM ready!
$(function(){
$.fn.EasyWidgets(EASettings);
});
function AddWidget(url, placeId){
$.get(url, function(html){
$.fn.AddEasyWidget(html, placeId, EASettings);
});
}
$(document).ready(function() {
 		 	$('.widget-add').click(function() {
			cssObj = {left: $(this).position().left-50,top: $(this).position().top+40};
			$('.ja-usersetting-options').css(cssObj);
    		$(".ja-usersetting-options").slidexyToggle(700);
			widgetAjax = $(this);
 		});
});
</script>
</head>
<body id="bd" class="fs3 FF">
<?php  
if(!isset($this->params['url']['ie'])){
 echo '<!--[if lt IE 8]>
<style type="text/css" id="ie6inline">
    .shadow { background: #fff; width: auto; height: 100%; position: absolute; z-index: 65000; filter: alpha(opacity=80); alpha: .8; }
    .ie6warn { position: absolute;; top: 0; left: 0; z-index: 65010; width: 100%; height: 100%; overflow: hidden; }
    .ie6warn .frame { background: #fff; position: absolute; z-index: 2; left: 50%; top: 50%; margin: -230px 0 0 -325px; width: 650px; border: 1px solid #ccc; -moz-border-radius: 15px; border-radius: 15px; padding: 20px; }
    .ie6warn h1 { color: #333; font-size: 2em; font-weight: bold; margin-bottom: 1em; }
    .ie6warn p { margin-bottom: 1em; font-size: 1.5em; }
    .ie6warn a { font-weight: bold; text-decoration: none; }
    .ie6warn ul { overflow: hidden; list-style:none; margin: 0 0 20px 0; padding: 0; }
    .ie6warn li { width: 120px; height: 130px; float: left; background: url(http://www.avira.com/images/front/browsers.gif); margin: 0 5px; }
    .ie6warn ul a, .ie6warn ul a:hover, .ie6warn ul a:visited { font-weight: normal; width: 100%; height: 120px; display: block; text-align: center; background: url(http://www.avira.com/images/front/browsers.gif) no-repeat 0 -155px; text-decoration: none; color: #333; }
    .ie6warn .ff, .ie6warn .ff:hover, .ie6warn .ff:visited { background-position: 0 -289px; }
    .ie6warn .chrome, .ie6warn .chrome:hover, .ie6warn .chrome:visited { background-position: 0 -423px; }
    .ie6warn .safari, .ie6warn .safari:hover, .ie6warn .safari:visited{ background-position: 0 -557px; }
    .ie6warn .opera, .ie6warn .opera:hover, .ie6warn .opera:visited { background-position: 0 -675px; }
    .ie6warn li a span { display: block; padding-top: 104px; }
    .ie6warn a:hover { text-decoration: underline; }
</style>
<div class="ie6warn">
        <div class="frame">
    	<h1>آیا می دانید که مرورگر شما بسیار قدیمی می باشد؟</h1>
    	<p>برای مرور بهتر در اینترنت بهتر است از یکی از مرور گر های زیر استفاده کنید. در زیر تعدادی از معروف ترین مرورگرهای وب معرفی شده است.</p>
    	<p>برای دریافت هر کدام از مرورگر های زیر تنها باید روی آیکون آن کلیک کنید</p>
    	<ul>
    		<li><a href="http://www.mozilla.com/" target="_blank" class="ff"><span>Firefox</span></a></li>
    		<li><a href="http://www.microsoft.com/windows/Internet-explorer/" target="_blank"><span>Internet Explorer</span></a></li>
    		<li><a href="http://www.apple.com/safari/download/" target="_blank" class="safari"><span>Safari</span></a></li>
    		<li><a href="http://www.opera.com/download/" target="_blank" class="opera"><span>Opera</span></a></li>
    		<li><a href="http://www.google.com/chrome/" target="_blank" class="chrome"><span>Chrome</span></a></li>
    	</ul>
    	<p>اگر می خواهید به همین وضعیت ادامه بدهید روی لینک ادامه کلیک کنید.</p>
		<a href="www.daneshfa.com/?ie=1">ادامه</a>
    	</div>
</div>
<![endif]-->';}?>
	<div id="ja-wrapper">
		<a name="Top" id="Top"></a>
		<!-- HEADER -->
		<div id="ja-header" class="wrap">
			<div class="main">
				<div class="inner clearfix">
					<h1 class="logo">
						<a href="http://www.daneshfa.com" title="DaneshFa"><img src="/images/logo.jpg" width="295" height="97" alt="دانش فا" /></a>					
					</h1>
					<div id="ja-search">
						<form action="http://www.daneshfa.com/searches/simple" method="post" class="search">
							<label > Search	</label>
							<input name="data[Search][query]" id="SearchQuery" class="inputbox" size="20" type="text"/>	
							<input name="option" value="com_search" type="hidden"/>
							<input name="task" value="search" type="hidden"/>
							<a class="advancedSearchButton" >جستجوی پیشرفته</a>
						</form>
						<div id="advancedSearch" style="display: none; position: absolute; background-color: #231f20; left: -120px; top: 60px; width: 600px;">
							<table cellpadding="3" width="100%" border="0">
								<tbody><tr>
									<td align="left">عنوان مقاله:</td>
									<td>
										<input onkeypress="return farsikey(this,event)" onkeydown="changelang(this);" size="30" name="queryTi" value="" />
										 <input type="checkbox" name="ExactPhraseTi" value="Yes" />عين عبارت
									</td>
									<td rowspan="4"><select name="ScienceFields[]" multiple="multiple" style="width:90%" size="8">
											<option value="ALL">همه</option><option value="HS" style="font-weight:bold">علوم سلامت (پزشكي)</option><option value="HS01">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;پرستاري</option><option value="HS02">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;پزشكي</option><option value="HS03">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;حرفه هاي پزشكي</option><option value="HS04">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;داروسازي / داروشناسي</option><option value="HS05">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;دامپزشكي</option><option value="HS06">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;دندانپزشكي</option><option value="LS" style="font-weight:bold">علوم زيستي و كشاورزي</option><option value="LS01">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ايمني شناسي</option><option value="LS02">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;سم شناسي</option><option value="LS03">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;علوم زيستي</option><option value="LS04">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;علوم عصبي</option><option value="LS05">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;علوم كشاورزي و بيولوژي</option><option value="LS06">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ميكروب شناسي و ويروس شناسي</option><option value="PS" style="font-weight:bold">علوم فيزيكي و مهندسي</option><option value="PS01">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;انرژي و قدرت</option><option value="PS02">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;رياضيات</option><option value="PS03">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;شيمي</option><option value="PS04">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;علم مواد</option><option value="PS05">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;علوم زمين</option><option value="PS06">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;علوم كامپيوتر</option><option value="PS07">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;علوم محيط زيست</option><option value="PS08">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;فيزيك</option><option value="PS09">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;مسكن و معماري</option><option value="PS10">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;مهندسي شيمي</option><option value="PS11">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;مهندسي عمران و سازه</option><option value="PS12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;مهندسي و فناوري</option><option value="PS13">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;نجوم، اخترفيزيك، علوم فضايي</option><option value="SS" style="font-weight:bold">علوم اجتماعي</option><option value="SS01">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;اقتصاد و دارائي</option><option value="SS02">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تجارت، مديريت و حسابداري</option><option value="SS03">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;روانشناسي</option><option value="SS04">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;علوم رفتاري و اجتماعي</option><option value="SS05">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;هنر و علوم انساني</option></select></td>
								</tr>
								<tr>
									<td align="left">نويسنده:</td>
									<td>
										 <input onkeypress="return farsikey(this,event)" onkeydown="changelang(this);" size="30" name="queryWf" value="" />
									</td>
								</tr>
								<tr>
									<td align="left">كلمه كليدي:</td>
									<td>
										<input onkeypress="return farsikey(this,event)" onkeydown="changelang(this);" size="30" name="queryKe" value="" />
										<input type="checkbox" name="ExactPhraseKe" value="Yes" />عين عبارت
									</td>
								</tr>
								<tr>
									<td bgcolor="#445588" colspan="4">
									<p align="center">
									<input type="hidden" name="simoradv" value="ADV" />
									<input type="hidden" name="SearchCountUp" value="Yes" />
									<input type="submit" name="submit" value="جستجو" /></p>
									</td>
								</tr>
							</tbody></table>
						</div>
						
					</div>
				</div>
			</div>
			<?php App::import('Vendor', 'persiandate');?>
			<div id="ja-topbar" class="wrap">
				<div class="main clearfix">
					<p class="ja-day">
	  					<span class="day"><?php echo persian_date_utf('l'); ?>&nbsp; &nbsp;</span>
						<span class="date"><?php echo persian_date_utf('d').'&nbsp; &nbsp;'. persian_date_utf('M'); ?> </span>	
					</p>
					<div class="ja-healineswrap">
						<em>عناوین مهم :</em>
							<div style="width: 393px;" id="jalh-modid58" class="ja-headlines ">
								<div style="white-space: nowrap;" id="jahl-wapper-items-jalh-modid58" dir="ltr">
									<!-- HEADLINE CONTENT -->
									<?php
                                    echo $this->element('headline', array('controllerName' => 'articles',
                                                                                       'conditions' =>  '', 
                                                                                       'className' => '',
                                                                                       'limit' => 6,
                                                                                       'order' => array('Article.id DESC'),
                                                                                       'fields' => array('Article.id', 'Article.title' ),
																					   'categoryFields' => array('Category.id')
                                                                                       ));?>
						
						        <!-- //HEADLINE CONTENT -->
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- //HEADER -->
			<!-- MAIN NAVIGATION -->
			<?php  echo $this->element('menu', array('menu_id' =>1129)); ?>
		</div>
	</div>
	<ul class="no-display">
    <li><a href="#" title="Skip to content">Skip to content</a></li>
	</ul>
	<!-- //MAIN NAVIGATION -->
	<!-- BREADCRUMBS -->
	<div id="ja-breadcrumbs" class="wrap">
		<div class="main">
			<div class="inner clearfix">
				<strong>اینجا :</strong>
                <span class="breadcrumbs pathway">خانه</span>
            </div>
		</div>
	</div>
	<!-- MAIN CONTAINER -->
	<div id="ja-container" class="wrap ja-r1">
		<div class="main clearfix">
			<div id="ja-mainbody" style="width: 100%;">
			<!-- CONTENT -->
				<div id="ja-main" style="width: 70%;">  
					<div class="inner clearfix">
						<div id="ja-contentwrap" class="">
								<div id="ja-content" class="column" style="width: 100%;">
										<div id="ja-current-content" class="column" style="width: 100%;">
												<div class="ja-content-top clearfix">
													<div class="ja-moduletable moduletable  clearfix" id="Mod75">
														<div class="ja-box-ct clearfix">
																<div id="ja-zinfpwrap">
																	<div id="ja-zinfp" class="clearfix">
																				
<!-- ******************************* THE CONTENT ************************************** -->
<div id="lofslidecontent45" class="lof-slidecontent" style="width:640px; height:252px;">  
<div class="preload"><div></div></div>
 <!-- MAIN CONTENT --> 
  <div class="lof-main-outer" style="width:640px; height:252px;">
    <div onclick="return false"  class="lof-previous">Previous</div>
  	<ul class="lof-main-wapper">
  		<li>
        		<img src="/img/001.jpg" title="Newsflash 2" alt="Newsflash 2" />           
                 <div class="lof-main-item-desc">

                <h4><a target="_parent" title="Newsflash 1" href="#Category-1"> بخش اخبار </a></h4>
				<p>اخبار دنیای فناوری و خبرهای مربوط به دانشجویان برق و کامپیوتر را در این بخش می توانید دنبال کنید...
                </p>
             </div>

        </li> 
       <li>
       	  <img src="/img/002.jpg" title="Newsflash 1" alt="Newsflash 2" />           
          	 <div class="lof-main-item-desc">
                <h4><a target="_parent" title="Newsflash 2" href="#Category-2"> بخش جزوات و کتاب های الکترونیکی </a></h4>
                <p>در این بخش جزوات و کتاب های درس های ختلف از اساتید و دانشگاه های معتبر قرار می گیرد
                </p>
             </div>
        </li> 
       <li>
       	  <img src="/img/003.jpg" title="Newsflash 3" alt="Newsflash 2" />            
          	<div class="lof-main-item-desc">
                <h4><a target="_parent" title="Newsflash 3" href="#Category-3"> بخش مقالات </a></h4>
                <p>در این بخش مقالات در زمینه های مختلف برای استفاده ی دانشجویان و اساتید محترم قرار می گیرد
                </p>
             </div>
        </li> 
       <li>
       	  <img src="/img/004.jpg" title="Newsflash 3" alt="Newsflash 2" />            
          	<div class="lof-main-item-desc">
                <h4><a target="_parent" title="Newsflash 3" href="#Category-3"> بخش مقالات </a></h4>
                <p>در این بخش مقالات در زمینه های مختلف برای استفاده ی دانشجویان و اساتید محترم قرار می گیرد
                </p>
             </div>
        </li> 
       <li>
       	  <img src="/img/005.jpg" title="Newsflash 3" alt="Newsflash 2" />            
          	<div class="lof-main-item-desc">
                <h4><a target="_parent" title="Newsflash 3" href="#Category-3"> بخش مقالات </a></h4>
                <p>در این بخش مقالات در زمینه های مختلف برای استفاده ی دانشجویان و اساتید محترم قرار می گیرد
                </p>
             </div>
        </li> 
       <li>
       	  <img src="/img/010.jpg" title="Newsflash 3" alt="Newsflash 2" />            
          	<div class="lof-main-item-desc">
                <h4><a target="_parent" title="Newsflash 3" href="#Category-3"> بخش مقالات </a></h4>
                <p>در این بخش مقالات در زمینه های مختلف برای استفاده ی دانشجویان و اساتید محترم قرار می گیرد
                </p>
             </div>
        </li> 

		</ul>  	
         <div onclick="return false"  class="lof-next">Next</div>
  </div>

  <!-- END MAIN CONTENT --> 
    <!-- NAVIGATOR -->

      
  <!--************************************************-->
																				
																				
																			 <div class="ja-zinfp-link">
     																		 </div>
																		</div>
																	</div>
																</div>
    														</div>
														<!--	<div class="ja-moduletable moduletable_feature  clearfix" id="Mod78">
																<h3 class="ja-tools"><span>اخبار</span></h3>
																	<div class="ja-box-ct clearfix">

																	<div id="ja-contentslider-78" class="ja-contentslider clearfix">
									<div id="ja-contentslide-buttonwrap">
										<div class="ja-contentslider-left">
							  				 <img class="ja-contentslide-left-img" src="/img/re-left.gif" alt="left direction" />
                               			</div>
										<div class="ja-contentslider-right">
										<img class="ja-contentslide-right-img" src="/img/re-right.gif" alt="right direction"  />
                                        </div>
						          </div>
                                 <div class="ja-contentslider-center-wrap clearfix">
         		 					<ul  class="ja-contentslider-center">
                 	<?php
							 echo $this->element('lastNews', array('controllerName' => 'news',
																		   'conditions' => array('News.widget_id'=>200, 'News.publish' =>1), 
																		   'className' => '',
																		   'limit' => 6,
																		   'order' => array('News.id DESC'),
																		   'fields' => array('News.id', 'News.title', 'News.intro','News.image','News.image_dir')
																		   ));?>							
							  </ul>
				         </div>
					</div>		
    			</div> 
   			 </div> -->
			 
		</div>
<!-- Setting -->
<?php echo $this->element('widgetsetting');?>
<!-- End Setting -->		
<div class="widget-buttons">
<a href="#" class="ja-typo-btn btn-grey ja-typo-btn-sm btn-sm-grey widget-add" id="widget-add"><span>اضافه کردن افزونه ی جدید</span></a>
<a href="#" class="ja-typo-btn btn-grey ja-typo-btn-sm btn-sm-grey resetWidget" id="resetWidget"><span>بازگشت به حالت پیش فرض</span></a>
</div>
		<div class="ja-content-bottom clearfix">
				<div class="ja-moduletable moduletable  clearfix" id="Mod76">
					<div class="ja-box-ct clearfix">
                        <div id="jazin-wrap">
                        	<div id="jazin" class="clearfix">
                        		<div class="jazin-full widget-place" id="widgetplace1" style="width: 99.9%;">
                                     <div class="jazin-boxwrap jazin-theme">
                                		<div class="jazin-box clearfix widget movable collapsable removable editable extend" id="maghale">
											<div class="jazin-section clearfix widget-header">
												<a href="#" style="float: right"><span  >مفالات</span>	</a>
											</div>
											<div class="widget-content">
												<div class="jazin-content clearfix">
												<?php
												 echo $this->element('last', array('controllerName' => 'articles',
																			   'conditions' => array('Category.id'=> 775), 
																			   'className' => '',
																			   'limit' => 1,
																			   'order' => array('Article.id DESC'),
																			   'fields' => array('Article.id', 'Article.title', 'Article.author','Article.hits','Article.intro','Article.image','Article.image_dir','Article.publish_date'),
																			   'categoryFields' => array('Category.id','Category.picture')
																			   ));?>
												</div>
												<?php
												echo $this->element('latestVScroller', array('controllerName' => 'articles',
																		   'className' => '',
																		   'limit' => 5,
																		   'order' => array('RAND()'),
																		   'fields' => array('Article.id, Article.title, Article.hits'),
																		   'categoryFields' => array('Category.id','Category.picture'),
																		   'conditions' => array('Category.id'=> 775)));
																		   ?>
									</div>
									</div>
								</div>

                                     <div class="jazin-boxwrap jazin-theme">
                                		<div class="jazin-box clearfix widget movable collapsable removable editable extend" id="ebook">
											<div class="jazin-section clearfix widget-header">
												<a href="#" style="float: right"><span  >کتاب های الکترونیکی</span>	</a>
											</div>
											<div class="widget-content">
											<div class="jazin-content clearfix">
											<?php
											 echo $this->element('last', array('controllerName' => 'articles',
																		   'conditions' => array('Category.id'=> 775),
																		   'className' => '',
																		   'limit' => 1,
																		   'order' => array('Article.id DESC'),
																		   'fields' => array('Article.id', 'Article.title', 'Article.author','Article.hits','Article.intro','Article.image','Article.image_dir','Article.publish_date'),
																		   'categoryFields' => array('Category.id','Category.picture')
																		   ));?>
											</div>
											<?php
											echo $this->element('latestVScroller', array('controllerName' => 'articles',
											  						   'className' => '',
											 						   'limit' => 5,
																	   'order' => array('RAND()'),
											 						   'fields' => array('Article.id, Article.title, Article.hits'),
																	   'categoryFields' => array('Category.id'),
																	   'conditions' => array('Category.id'=> 775)));
																	   ?>
										</div>
									</div>
								</div>
                                     <div class="jazin-boxwrap jazin-theme">
                                		<div class="jazin-box clearfix widget movable collapsable removable editable extend" id="jozve">
											<div class="jazin-section clearfix widget-header">
												<a href="#" style="float: right"><span  >جزوات</span>	</a>
											</div>
											<div class="widget-content">
											<div class="jazin-content clearfix">
											<?php
											 echo $this->element('last', array('controllerName' => 'articles',
																		   'conditions' => array('Category.id'=> 775), 
																		   'className' => '',
																		   'limit' => 1,
																		   'order' => array('Article.id DESC'),
																		   'fields' => array('Article.id', 'Article.title', 'Article.author','Article.hits','Article.intro','Article.image','Article.image_dir','Article.publish_date'),
																		   'categoryFields' => array('Category.id','Category.picture')
																		   ));?>
											</div>
											<?php
											echo $this->element('latestVScroller', array('controllerName' => 'articles',
											  						   'className' => '',
											 						   'limit' => 5,
																	   'order' => array('RAND()'),
											 						   'fields' => array('Article.id, Article.title, Article.hits'),
																	   'categoryFields' => array('Category.id'),
																	   'conditions' => array('Category.id'=> 775)));
																	   ?>
									</div>
									</div>
								</div>

							<!--	<div class="jazin-boxwrap jazin-theme">
									<div class="jazin-box clearfix">
										<div class="jazin-section clearfix widget-header">
											<a href="" title=""><span>جزوات</span></a>
                                        </div>
										<div class="jazin-content widget-content clearfix">
										<?php
							 			echo $this->element('lastDownload', array('controllerName' => 'downloads',
																		   'conditions' => array('Download.widget_id'=>205, 'Download.publish' =>1), 
																		   'className' => '',
																		   'limit' => 1,
																		   'order' => array('Download.id DESC'),
																		   'fields' => array('Download.id', 'Download.title', 'Download.hits','Download.description','Download.picture','Download.picture_dir')
																		   ));?>
										</div>
										<?php
										echo $this->element('latestVScroller', array('controllerName' => 'downloads',
											  						   'className' => '',
											 						   'limit' => 5,
																	   'order' => array('RAND()'),
											 						   'fields' => array('Download.id, Download.title, Download.hits'),
																	   'conditions' => array('Download.widget_id' => 205  ,"Download.publish" =>1)));
																	   ?>
								</div>
							</div>
							<div class="jazin-boxwrap jazin-theme">
								<div class="jazin-box clearfix widget movable collapsable removable editable extend">
									<div class="jazin-section clearfix widget-header">
										<a href="" title=""><span>کتاب ها</span></a>
                                     </div>
									 <div class="widget-content">
									<div class="jazin-content clearfix">
									<?php
											 echo $this->element('lastDownload', array('controllerName' => 'downloads',
																		   'conditions' => array('Download.widget_id'=>205, 'Download.publish' =>1), 
																		   'className' => '',
																		   'limit' => 1,
																		   'order' => array('Download.id DESC'),
																		   'fields' => array('Download.id', 'Download.title', 'Download.hits','Download.description','Download.picture','Download.picture_dir')
																		   ));?>
								</div>
								<?php
								echo $this->element('latestVScroller', array('controllerName' => 'downloads',
											  						   'className' => '',
											 						   'limit' => 5,
																	   'order' => array('RAND()'),
											 						   'fields' => array('Download.id, Download.title, Download.hits'),
																	   'conditions' => array('Download.widget_id' => 205  ,"Download.publish" =>1)));
																	   ?>
						</div>
						</div>
					</div> -->
					<div class="jazin-boxwrap jazin-theme">
						<div class="jazin-box clearfix widget movable collapsable removable editable extend" id="nashrie">
							<div class="jazin-section clearfix widget-header">
								<a href=""> <span>نشریات</span></a>
                             </div>
							<div class="widget-content">
							<div class="jazin-content clearfix">
							<?php
							 echo $this->element('last', array('controllerName' => 'articles',
																		   'conditions' => array('Category.id'=> 775), 
																		   'className' => '',
																		   'limit' => 1,
																		   'order' => array('Article.id DESC'),
																		   'fields' => array('Article.id', 'Article.title', 'Article.author','Article.hits','Article.intro','Article.image','Article.image_dir','Article.publish_date'),
																		   'categoryFields' => array('Category.id','Category.picture')
																		   ));?>
							</div>
							<?php
                            echo $this->element('latestVScroller', array('controllerName' => 'articles',
											  						   'className' => '',
											 						   'limit' => 5,
																	   'order' => array('RAND()'),
											 						   'fields' => array('Article.id, Article.title, Article.hits'),
																	   'categoryFields' => array('Category.id'),
																	   'conditions' => array('Category.id'=> 775)));
																	   ?>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
    </div>
	</div>
	</div>
	</div>
	</div>
</div>
</div>
<!-- //CONTENT -->					
</div>
<!-- RIGHT COLUMN--> 
<div id="ja-right" class="column ja-cols sidebar" style="width: 30%;">
	<div class="ja-colswrap clearfix ja-r1">
			<div class="ja-col  column">
				<div class="ja-moduletable moduletable_tabs  clearfix" id="Mod61">
						<div class="ja-box-ct clearfix">
							<div class="ja-tabswrap seleni" style="width: 100%;">	
                            	<div id="myTab-1727955188" class="container">
										<ul class="ja-tabs-title ja-tabs-title-top">
                                            <li class="first active" title="پر بازدیدترین مقالات">
                                               <h4><a href="#tabs-1">پر بازدیدترین مقالات</a></h4>
                                            </li>
                                            <li class="last" title="آخرین مقالات">
                                                <h4><a href="#tabs-2">آخرین مقالات</a></h4>
                                             </li>
                                         </ul>
									<div  class="ja-tab-panels-top" >
                                    	<div  class="ja-tab-content" id="tabs-1">
											<div class="ja-tab-subcontent">
											<?php
											 echo $this->element('mostVisit', array('controllerName' => 'articles',
																		   'conditions' => '', 
																		   'className' => '',
																		   'limit' => 5,
																		   'order' => array('Article.hits DESC'),
																		   'fields' => array('Article.id', 'Article.title', 'Article.author','Article.hits','Article.intro','Article.publish_date'),
																		   'categoryFields' => array('Category.id','Category.picture')
																		   ));?>
											 </div>
										</div>
                                   <div  class="ja-tab-content" id="tabs-2">
										<div class="ja-tab-subcontent">
											<?php
											echo $this->element('mostVisit', array('controllerName' => 'articles',
																		   'conditions' => '', 
																		   'className' => '',
																		   'limit' => 5,
																		   'order' => array('Article.created DESC'),
																		   'fields' => array('Article.id', 'Article.title', 'Article.author','Article.hits','Article.intro','Article.image','Article.image_dir','Article.publish_date'),
																			'categoryFields' => array('Category.id','Category.picture')

																		   ));?>
											</div>
										</div>
                    </div>	
				</div>
			</div>
           </div>
    </div>
		<div class="ja-moduletable moduletable_hilite  clearfix" id="Mod69">
			<h3 class="ja-tools"><span>همکاری با دانش‌فا</span></h3>
				<div class="ja-box-ct clearfix">
					<div class="ja-sidenews-list clearfix">
						<div class="ja-slidenews-item clearfix">
                            <a class="ja-title" href="#">اساتید و دانشجویان محترم</a>
									اساتید و دانشجویانی که علاقه مند به همکاری با دانش‌فا باشند، می توانند به عنوان عضو افتخاری کمیته اجرایی سایت فعالیت نمایند
							<a>اطلاعات بیشتر...</a>
							</div>
   					<div class="ja-slidenews-item clearfix">
						<a class="ja-title" href="#">سایت ها و وبلاگ ها</a>
                                   پایگاه ها و وبلاگ های اینترنتی که به همکاری با سایت دانش‌فا علاقه مند باشند میتوانند پیشنهادات خود را در زمینه های مختلف تبادل اطلاعات تبلیغات ، اجرای طرح های مشترک و تبادل لینک به نشانی info@daneshfa.com ارسال نمایند.
							<a>اطلاعات بیشتر...</a>
					</div>
 					<div class="ja-slidenews-item clearfix">
						<a class="ja-title" href="#">گروه ها و انجمن های علمی</a>
								دانش‌فا از همکاری با گروه ها و انجمن های علمی سراسر کشور در زمینه های مختلف استقبال می کند
					</div>
				</div>
             </div>
   		 </div>
		<div class="ja-moduletable moduletable_blank  clearfix" id="Mod53">
			<div class="ja-box-ct clearfix">
				<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="263" height="395" id="FlashID" title="Signal4you.com">
				  <param name="movie" value="http://www.daneshfa.com/swf/signal4you.swf" />
				  <param name="quality" value="high" />
				  <param name="wmode" value="opaque" />
				  <param name="swfversion" value="8.0.35.0" />
				  <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
				  <param name="expressinstall" value="/js/flashfile/expressInstall.swf" />
				  <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
				  <!--[if !IE]>-->
				  <object type="application/x-shockwave-flash" data="http://www.daneshfa.com/swf/signal4you.swf" width="263" height="395">
					<!--<![endif]-->
					<param name="quality" value="high" />
					<param name="wmode" value="opaque" />
					<param name="swfversion" value="8.0.35.0" />
					<param name="expressinstall" value="/js/flashfile/expressInstall.swf" />
					<!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
					<div>
					  <h4>شما برای دیدن محتوای کامل این صفحه باید نسخه ی جدید Flash Player  را نصب کنید</h4>
					  <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
					</div>
					<!--[if !IE]>-->
				  </object>
				  <!--<![endif]-->
				</object>
				<script type="text/javascript">
				<!--
					swfobject.registerObject("FlashID");
				//-->
				</script>			
				
             </div>
   		 </div>
	<!--	<div class="ja-moduletable moduletable  clearfix" id="Mod74">
			<h3 class="ja-tools"><span>دانلود نرم افزار</span></h3>
				<div class="ja-box-ct clearfix">
					<div class="ja-sidenews-list clearfix">
						<?php
						echo $this->element('downloads', array('controllerName' => 'downloads',
											  						   'className' => '',
											 						   'limit' => 2,
																	   'order' => array('RAND()'),
											 						   'fields' => array('Download.id', 'Download.title',  'Download.picture', 'Download.picture_dir', 'Download.description', 'Download.hits'),
																	   'conditions' => array('Download.widget_id' => 201  ,"Download.publish" =>1)));
																	   ?>
  					</div>
  				</div>
    		</div> -->
			<div class="ja-moduletable moduletable clearfix" id="Mod16">
				<span class="badge">&nbsp;</span>
				<h3 class="ja-tools"><span>نظرسنجی</span></h3>
				<div id="poll-box" class="ja-box-ct poll-box clearfix">
				<h4 class="poll-title">نظر شما در مورد سایت جیست ؟</h4>
			   <?php //echo $this->element('poll');
       				 echo $this->element('poll', array('controllerName' => 'polls',
											   'className' => '',
											   'limit' => '',
											   'order' => '',
											   'fields' => array('Poll.id', 'Poll.title', 'Poll.vote'),
											   'conditions' => array('Category.id' => 799 )));
																	   
			   ?>
						
			</div>
    	</div>
	</div>
 </div>
</div>
<!-- RIGHT COLUMN--> 
</div>
 </div>
<!-- //MAIN CONTAINER -->
<!-- BOTTOM SPOTLIGHT -->
<div id="ja-botsl" class="wrap">
<div class="main clearfix">
<div class="ja-box column ja-box-left" style="width: 33.3%;">
			<div style="height: 546px;" class="ja-moduletable moduletable  clearfix" id="Mod72">
				<h3 class="ja-tools"><span>اخبار از سایت های دیگر</span></h3>
				<?php
			/*	 echo $this->element('gallery', array('controllerName' => 'galleries',
																		   'conditions' => array('Gallery.primary'=>1, 'Gallery.publish' =>1), 
																		   'className' => '',
																		   'limit' => 2,
																		   'order' => array('Gallery.id DESC'),
																		   'fields' => array('Gallery.id', 'Gallery.title', 'Gallery.picture','Gallery.picture_dir','Gallery.widget_id','Gallery.description')
																		   
																		   ));*/
																		   ?>
																					   
			</div>
<?php echo  $this->element('rssReader',array('controllerName' => 'readers',
																		   'conditions' => array('Category.id' => 815), 
																		   'className' => '',
																		   'limit' => '',
																		   'order' => '',
																		   'fields' => array('Reader.id', 'Reader.url', 'Reader.number'),
																			'categoryFields' => array('Category.id')

																		   )); ?>	
			</div>
	
	<!--	<div class="ja-box column ja-box-center" style="width: 33.3%;">
			<div style="height: 546px;" class="ja-moduletable moduletable  
clearfix" id="Mod43">
						<h3 class="ja-tools"><span>بازار کار </span></h3>
						
						<?php
						 echo $this->element('work', array('controllerName' => 'articles',
																		   'conditions' => array('Article.widget_id'=>185, 'Article.publish' =>1), 
																		   'className' => '',
																		   'limit' => 2,
																		   'order' => array('Article.id DESC'),
																		   'fields' => array('Article.id', 'Article.title', 'Article.author','Article.hits','Article.intro','Article.image','Article.image_dir','Article.publish_date')
																		   ));?>

    </div>
	</div> -->
	<div class="ja-box column ja-box-center" style="width: 33.3%;">
			<div style="height: 546px;" class="ja-moduletable moduletable  
clearfix" id="Mod52">
						<h3 class="ja-tools"><span>پیوندها</span></h3>

		
		</div>
<?php echo  $this->element('links',array('controllerName' => 'links',
																		   'conditions' => array('Category.id' => 816), 
																		   'className' => '',
																		   'limit' => 12,
																		   'order' => array('Link.id DESC'),
																		   'fields' => array('Link.id', 'Link.title', 'Link.link_url'),
																			'categoryFields' => array('Category.id')

																		   )); ?>	
		
	</div> 
	<div class="ja-box column ja-box-left" style="width: 33.3%;">
			<div style="height: 546px;" class="ja-moduletable moduletable  clearfix" id="Mod77">
				<h3 class="ja-tools"><span>معرفی دانشگاه ها </span></h3></div>
				<div id='unintro'>
			<?php 
							 echo $this->element('lastContent', array('controllerName' => 'contents',
																		   'conditions' => array('Category.id'=> 817), 
																		   'className' => '',
																		   'limit' => 2,
																		   'order' => array('Content.id DESC'),
																		   'fields' => array('Content.id', 'Content.title', 'Content.author','Content.hits','Content.intro','Content.image','Content.image_dir','Content.publish_date')
																		   ));  ?>
																		   </div>
    </div>
	</div>
</div>
</div>
<!-- //BOTTOM SPOTLIGHT -->
<!-- BOTTOM SPOTLIGHT 2 -->
<div id="ja-botsl2" class="wrap">
	<div class="main clearfix">
		<div class="ja-box column ja-box-left" style="width: 24.75%;">
			<div class="ja-moduletable moduletable  clearfix" id="Mod20">
				<h3 class="ja-tools"><span>آمار سایت</span></h3>
				<div class="ja-box-ct clearfix">

					<?php
														$visit = $this->requestAction(array('controller' => 'visits','action' => 'visit'));
                                                        echo "<ul>";
                                                        echo "<li><span>بازدید امروز : </span>".$visit['Visit']['day']."</li>";
                                                        echo "<li><span>بازدید روز گذشته : </span>".$visit['Visit']['yesterday']."</li>";
                                                        echo "<li><span>بازدید این ماه  :</span>".$visit['Visit']['mon']."</li>";
                                                        echo "<li><span>بازدید امسال : </span>".$visit['Visit']['year']."</li>";
                                                        echo "<li><span>بازدید کل : </span>".$visit['Visit']['visit']."</li>";
														$ip=$_SERVER['REMOTE_ADDR'];
														echo "<li> تعداد افراد آنلاین  :".$this->requestAction('/onlines/online').'</li>';
														echo "<li>آدرس شما: $ip</li></ul>"; 
?>
														
                                                        
                        
		       </div>
           </div>
	   </div>
	  <div class="ja-box column ja-box-center" style="width: 24.75%;">
		 <div class="ja-moduletable moduletable_menu  clearfix" id="Mod31">
				<h3 class="ja-tools"><span>عضویت در خبرنامه</span></h3>
						<div class="ja-box-ct clearfix">
							<ul><li style="background: none repeat scroll 0 0 transparent !important" class="subcrib">
							﻿<form class="cssform" id="UserLetterForm" method="post" action="/users/login">
							<label for="UserEmail" class="">پست الکترونیک:<br /></label>
							<input name="data[User][email]" class="form-login-username" id="UserEmailLetter" type="text" />
							<input value="ثبت نام" class="form-login-button button" type="submit" />
							</form></li></ul>
						</div>
                </div>
	         </div> 
	        <div class="ja-box column ja-box-center" style="width: 24.75%;">
				<div class="ja-moduletable moduletable  clearfix" id="Mod65">
						<h3 class="ja-tools"><span>همراه ما باشید</span></h3>
								<div class="ja-box-ct clearfix">
<!-- ****************************************************************** -->

<script type="text/javascript">

$(document).ready(function() {
	
	$("ul.followus li").hover(function() { //On hover...
		
		var thumbOver = $(this).find("img").attr("src"); //Get image url and assign it to 'thumbOver'
		
		//Set a background image(thumbOver) on the &lt;a&gt; tag 
		$(this).find("a.thumb").css({'background' : 'url(' + thumbOver + ') no-repeat center bottom'});
		//Fade the image to 0 
		$(this).find("span").stop().fadeTo('normal', 0 , function() {
			$(this).hide() //Hide the image after fade
		}); 
	} , function() { //on hover out...
		//Fade the image to 1 
		$(this).find("span").stop().fadeTo('normal', 1).show();
	});

});

</script>

<ul class="followus" >
	<li id="facebook" style="margin-left:25px;">
		<a href="#" class="thumb"><span><img src="/images/followus/facebook.gif" alt="" /></span></a>
	</li>
	<li id="twitter" style="float:right;">
		<a href="#" class="thumb"><span><img src="/images/followus/twitter.gif" alt="" /></span></a>
	</li>
	<li id="rss" style="margin-left:25px;">
		<a href="#" class="thumb"><span><img src="/images/followus/rss.gif" alt="" /></span></a>
	</li>
	<li id="google-reader" style="float:right;">
		<a href="http://www.google.com/ig/addtoreader?et=gEs490VY&amp;source=ign_pLt&amp;
feedurl=http://www.andishesara.com/articles/index.rss&amp;feedtitle=andishesara" class="thumb"><span><img src="/images/followus/google-reader.gif" alt="" /></span></a>
</li>
</ul>

<!-- ****************************************************************** -->									
                                </div>
   							 </div>
						</div>
						<div class="ja-box column ja-box-right" style="width: 24.75%;">
							<div class="ja-moduletable moduletable  clearfix" id="Mod18">
								<h3 class="ja-tools"><span>فرم ورود</span></h3>
								<?php
                                echo $this->element('login');
                                ?>
							<div class="ja-box-ct clearfix">
							</div>
    					</div>
					</div>
				</div>
			</div>
<!-- //BOTTOM SPOTLIGHT 2 -->
<!-- FOOTER -->
            <div id="ja-footer" class="wrap">
           		 <div class="main">
					<div class="ja-footnav clearfix">
						<ul class="ja-links">
							<li class="layout-switcher ja-firstitem">
								<a class="ja-tool-switchlayout" href="#" title="نسخه موبایل"><span>نسخه موبایل</span></a>
                            </li>
							<li class="top">
                            	<a href="#Top" title="رفتن به بالای صفحه">بالا</a>
                            </li>
						</ul>
						<?php
                         echo $this->element('footer', array('menu_id' =>1129));
                         ?>
					</div>
				
				<div id="ja-poweredby">
					<a id="t3-logo" href="#" title="DaneshFa" target="_blank">DaneshFa</a>
                 </div>
				<div class="inner">
					<div class="ja-copyright">
							<small>
                                 تمام حقوق برای <a href="http://www.daneshfa.com/" title="Visit DaneshFa.com!"> دانش‌فا </a>  محفوظ است. استفاده از مطالب این سایت فقط با ذکر منیع و درج لینک مطلب مربوطه مجاز است                          
						    </small>
                            <small>
                                   این سایت توسط<a href="http://www.pendarnet.com"> شرکت فناوری اطلاعات پندار کویر</a> طراحی شده است
                            </small>			
                         </div>
		         </div>
	     </div>
   </div>
	<!-- //FOOTER -->


</body>

</html>