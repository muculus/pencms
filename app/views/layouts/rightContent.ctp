<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="rtl" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="robots" content="index, follow"/>
<meta name="keywords" content="دانلود رایگان , مقالات  , مقاله , کتاب الکترونیکی , نشریه , نرم افزار های مهندسی , جزوات دانشگاه های معتبر , اخبار دنیای تکنولوژی , مهندسی برق  , کنترل , الکترونیک , قدرت , مهندسی پزشکی , بیو الکترونیک , رباتیک , نانوالکترونیک  ,مهندسی فناوری اطلاعات , سخت افزار ,نرم افزار"/>
<meta name="description" content="دانش‌فا مرجع مهندسی برق و کامپیوتر ارائه دهنده ی مقالات علمی در همه‌ی گرایش‌های برق و کامپیوتر و تمام زمینه های مربوط به آنها می باشد"/>
<meta name="generator" content="Pendar kavir IT co"/>
<title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="/css/style_006.css" type="text/css"/>
    <link rel="stylesheet" href="/css/style_003.css" type="text/css"/>
    <link rel="stylesheet" href="/css/style.css" type="text/css"/>
    
    
	<link rel="stylesheet" href="/css/tabs/jquery.ui.core.css" type="text/css"/>    
	<link rel="stylesheet" href="/css/tabs/jquery.ui.tabs.css" type="text/css"/>
    <link rel="stylesheet" href="/css/tabs/jquery.ui.theme.css" type="text/css"/> 
	
    <link rel="stylesheet" href="/css/addons.css" type="text/css"/>    
	<link rel="stylesheet" href="/css/typo.css" type="text/css"/>
    <link rel="stylesheet" href="/css/layout.css" type="text/css"/>
	<link rel="stylesheet" href="/css/validationEngine.jquery.css" type="text/css"/>
    <link rel="stylesheet" href="/css/template.css" type="text/css"/>

<script type="text/javascript" src="/js/ckeditor/ckeditor.js"></script>



<script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/js/jquery.jcarousel.min.js"></script>	
<script language="javascript" type="text/javascript" src="/js/jquery.innerfade.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery.easing.js"></script>
<script type="text/javascript" src="/js/script1.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery.ui.core.min.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery.ui.widget.min.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery.ui.tabs.min.js"></script>
<script type="text/javascript" src="/js/jquery.validationEngine-fa.js"></script>
<script type="text/javascript" src="/js/jquery.validationEngine.js"></script>
<script>
    $(document).ready(function(){
        $("#CommentFormForm").validationEngine('attach');
       });
</script>

<?php if($this->name='Articles' && $this->action='view'){ ?>
<script type="text/javascript" src="/js/jquery.simplemodal.js"></script>
<script type="text/javascript" src="/js/init.js"></script>
<link type='text/css' href='/css/stylesheet.css' rel='stylesheet' media='screen' />
<link type='text/css' href='/css/basic.css' rel='stylesheet' media='screen' />
<?php } ?>

<?php if($this->action=='paging'){ ?>
<script type="text/javascript">
$(document).ready(function() {
        $('.share_button_share').mouseenter(function(e) {
        }).mouseleave(function(e) {
			$('.share_this_share').fadeOut(200);
			$('.tooltip_share').hide();
        });
 
		$('.share_button_share').click(function(e){
		//alert($(this).attr('id'));
		$('.load_buttons_box_share').fadeOut();
		shareID = $('#'+$(this).attr('id'));
		cssObj = {left: shareID.position().left+90,top: shareID.position().top+10};
		$('#'+$(this).attr('id')+'Box').css(cssObj);
		$('#'+$(this).attr('id')+'Box').fadeIn();
		});	
		$('.close_share').click(function(){
			$('.load_buttons_box_share').fadeOut();
		});
	});
	

</script>
<?php } ?>
<?php if($this->action="view"){ ?>
<script language="javascript" type="text/javascript" src="/js/view_script.js"></script>
<script type="text/javascript">
//<![CDATA[
	$(document).ready(function(){
		$("#ratings").children().not(":radio").hide();
		$("#ratings").stars({
			captionEl: $("#stars-cap"),
			cancelShow: false,
			callback: function(ui, type, value)
			{
				$.post("/articles/rating/" + $("input[id|=ArticleId]").val()+"/"+"1"  , {rate: value}, function(data1)
				{

				    $("#ratings").stars("select", parseInt(data1));

					//alert(data1);
				});

				$.post("/articles/rate/" + $("input[id|=ArticleId]").val() + "/"+ value , {rate: value}, function(data)
				{
					$("#ajax_response").html(data);
					$("#ajax_response").fadeOut(6000, function(){$("#ajax_response").html("");$("#ajax_response").fadeIn(10);  });

				});
			}
		});
	});
//]]>
</script>
<?php } ?>

<script type="text/javascript">
$(function() {
	$("#myTab-1727955188").tabs({
		collapsible: true,
		fx: { opacity: 'toggle' }
	});
});
</script>
    <script type="text/javascript">  
	$(document).ready( function(){ 
				$('#jahl-wapper-items-jalh-modid58').innerfade({  speed: 1200, timeout: 6000 }); } ); 
  
	</script> 
	<style type="text/css">.ja-movable-container{visibility: hidden;}</style>
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

<link href="/css/moo.css" rel="stylesheet" type="text/css"/>
<script src="/js/moo.js" language="javascript" type="text/javascript"></script>

<!--Width of template -->
<style type="text/css">
.main {width: 950px;margin: 0 auto;}
#ja-wrapper {min-width: 951px;}
</style>

<link href="/css/template_rtl.css" rel="stylesheet" type="text/css"/>
<!--[if IE 8.0]>
<link rel="stylesheet" href="/css/ie8-rtl.css" type="text/css" />
<![endif]-->
<!--[if lt IE 8.0]>
<link rel="stylesheet" href="/css/ie-rtl.css" type="text/css" />
<![endif]-->
</head>
<body id="bd" class="fs3 FF">
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
						<form action="" method="post" class="search">
							<label for="mod_search_searchword"> Search	</label>
							<input name="searchword" id="mod_search_searchword" class="inputbox" size="20" type="text"/>	
							<input name="option" value="com_search" type="hidden"/>
							<input name="task" value="search" type="hidden"/>
						</form>
					</div>
				</div>
				</div>
				<?php
				App::import('Vendor', 'persiandate');
				?>

	<div id="ja-topbar" class="wrap">
		<div class="main clearfix">
			<p class="ja-day">
	  			<span class="day"><?php echo persian_date_utf('l'); ?>&nbsp; &nbsp;</span>
				<span class="date"><?php echo persian_date_utf('d').'&nbsp; &nbsp;'. persian_date_utf('M'); ?> </span>	
			</p>

		
			<div class="ja-healineswrap">

				<em>عناوین مهم :</em>
				<div style="width: 393px;" id="jalh-modid58" class="ja-headlines ">
						<div style="white-space: nowrap;" id="jahl-wapper-items-jalh-modid58">
						<!-- HEADLINE CONTENT -->
                        <?php
					
						 echo $this->element('headline', array('controllerName' => 'articles',
																		   'conditions' =>  '', 
																		   'className' => '',
																		   'limit' => 6,
																		   'order' => array('Article.id DESC'),
																		   'fields' => array('Article.id', 'Article.title', )
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

		<?php
		 echo $this->element('menu', array('menu_id' =>1129));
		?>


</div>

<ul class="no-display">
    <li><a 
href="http://templates.joomlart.com/ja_seleni/?direction=rtl#ja-content"
 title="Skip to content">Skip to content</a></li>

</ul>
	<!-- //MAIN NAVIGATION -->
	
	<!-- BREADCRUMBS -->
<div id="ja-breadcrumbs" class="wrap">
<div class="main">
	<div class="inner clearfix">
		<strong>اینجا : </strong><span class="breadcrumbs pathway">
<?php echo $this->element('crumb'); ?></span>	</div>
</div>
</div>
<!-- //BREADCRUMBS -->


	<!-- MAIN CONTAINER -->
	<div id="ja-container" class="wrap ja-r1">
	<div class="main clearfix">

		<div id="ja-mainbody" >
		<!-- RIGHT COLUMN--> 
<div id="ja-right" class="column ja-cols sidebar" >

	
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
	
				
	<!--	<div class="ja-moduletable moduletable_blank  clearfix" id="Mod53">
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
		</div> 
	</div>
</div>
<!-- RIGHT COLUMN--> 

		<!-- CONTENT -->

			<div id="ja-main" >
<div class="inner clearfix">
<div id="ja-contentwrap" class="">
<div id="ja-content" class="column" style="width:100%">
<div id="ja-current-content" class="column" style="width:100%">
<div class="ja-content-main clearfix">
<?php echo $this->element('pagingtitle'); ?>
<div class="blog clearfix">
<?php
							if($session->check('Message.error')){
								$session->flash('error');
							}
							if($session->check('Message.info')){
								$session->flash('info');
							}
							if ($session->check('Message.flash')){
								$session->flash();
							}
							if ($session->check('Message.auth')){
								$session->flash('auth');
							}
							echo $content_for_layout;
?>
<!-- //CONTENT -->
</div>
</div>
</div>
</div>
</div></div>
</div>
	</div>
  </div>
<!-- //MAIN CONTAINER -->

	<!-- BOTTOM SPOTLIGHT -->


<div id="ja-botsl2" class="wrap">
<div class="main clearfix">

		<div class="ja-box column ja-box-left" style="width: 24.75%;">
			<div class="ja-moduletable moduletable  clearfix" id="Mod20">
				<h3 class="ja-tools"><span>Statistics</span></h3>
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
				<li class="layout-switcher ja-firstitem"><a class="ja-tool-switchlayout" href="#" title="نسخه موبایل"><span>نسخه موبایل</span></a></li>

				<li class="top"><a href="#Top" title="رفتن به بالای صفحه">بالا</a></li>
			</ul>
			<?php
			 echo $this->element('footer', array('menu_id' =>1129));
			 ?>
		</div>
				
		<div id="ja-poweredby">
			<a id="t3-logo" href="http://www.daneshfa.com/" title="DaneshFa" target="_blank">DaneshFa</a>
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

</div>


</div>

</body></html>
