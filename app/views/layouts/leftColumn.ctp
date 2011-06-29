<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $metakey; ?>" />
<meta name="description" content="<?php echo $metadesc; ?>" />
<title>
		<?php echo $this->pageTitle; ?>
</title>

<link rel="stylesheet" href="/css/style.css" type="text/css" media="screen">
<?php if($this->name == 'Articles' && $this->action == 'paging'){
echo '<link rel="stylesheet" href="/css/articleList.css" type="text/css" media="screen">';}?>

<link rel="stylesheet" href="/css/jquery.lightbox-0.5.css" type="text/css" media="screen">
<script  type="text/javascript" src="/js/jquery-1.3.2.min.js"></script>

<?php if($this->name == 'Articles' && $this->action == 'view'){
echo '<script type="text/javascript" src="/js/jquery-ui.custom.min.js?v=1.8"></script>';
echo '<script type="text/javascript" src="/js/jquery.ui.stars.js?v=3.0.0b38"></script>';} ?>

<?php if($this->name == 'Submits'){
echo '<script type="text/javascript" src="/js/ckeditor/ckeditor.js"></script>';} ?>


<link rel="shortcut icon" href="/images/favicon.png">

	<!--[if IE]>

	  <script type="text/javascript" src="/js/ie_png.js"></script>

	   <script type="text/javascript">

		   ie_png.fix('.png, .logo h1');

	   </script>

	<![endif]-->
<script>
 $(document).ready(function(){
    $('.rss').click(function () {
      $('#login').slideToggle("slow");
    });})
</script>

<?php if($this->name == 'Articles' && $this->action == 'view'){
echo '<script type="text/javascript">
	$(function(){
		$("#ratings").children().not(":radio").hide();
		$("#ratings").stars({
			captionEl: $("#stars-cap"),
			cancelShow: false,
			callback: function(ui, type, value)
			{
				$.post("/articles/rating/" + $("input[id|=ArticleId]").val()+"/"+"1"  , {rate: value}, function(data1)
				{
				    $("#ratings").stars("select", parseInt(data1));
					alert(data1);
				});

				$.post("/articles/rate/" + $("input[id|=ArticleId]").val() + "/"+ value , {rate: value}, function(data)
				{
					$("#ajax_response").html(data);
					$("#ajax_response").fadeOut(5000);
				});
			}
		});
	});
</script>';}?>

  
<script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
</script>
</head><body>
			
	<div class="main">
		<div class="main-width">
		
			<div class="header">
			
				<div class="sub-menu">
					<a class="revier" href="#">become a reviewer</a>
					<a class="rss" href="#" title="ورود به سایت">ورود به سایت</a>
					<div id="login" style="background: #F0F0F0; width: 400px;  position: absolute; left: 50px; top: 80px; display: none;  padding:5px; z-index: 999"  >
					<?php
					          echo $this->element('login');
                                                                       
						?>		
					</div>
				</div>
				
				<div class="logo">
					<div class="indent">
						<h1 onclick="location.href='/'">اندیشه سرا</h1>
					</div>
				</div>
				
				<div class="main-menu png"><div class="corner-left png"><div class="corner-right png">
					<div class="search">
						<div class="indent">
							<form method="get" id="searchform" action="http://osc.template-help.com/wordpress_24621">
	<input class="text" name="s" id="s" type="text"><input class="but" src="/images/search.gif" value="submit" type="image">
</form>
						</div>
					</div>
								
					<div class="menu">
						<ul>
							<li>
								<a class="menu01" href="/galleries/view/cat_id:740">
									گالری عکس
								</a>
							</li>
							
							<li>
								<a class="menu02" href="/libraries/view/cat_id:739">
									کتابخانه
								</a>
							</li>
							
							<li>
								<a class="menu03" href="/articles/view/cat_id:738">
									مقالات
								</a>
							</li>
							
							<li>
								<a class="menu04" href="/">
									خانه
								</a>
							</li>
							
						</ul>
					</div>
							
				</div></div></div>
						
			</div>
			
			<div class="content">
				<div class="bg-left"><div class="bg-right"><div class="bg-top"><div class="bg-bot">
					<div class="corner-left-top"><div class="corner-right-top"><div class="corner-left-bot"><div class="corner-right-bot">
					<div class="column-left">
		
						
					
							
							
				<div class="widget widget_recent_reviews">
					<div class="widget-corner-top png"><div class="widget-corner-bot png">
						<div class="widget-bg">
						
							<div class="title">
								<h2>آخرین مطالب</h2>
							</div>
							<?php
					          echo $this->element('lastArthicle', array('controllerName' => 'articles',
																		   'conditions' => '', 
																		   'className' => '',
																		   'limit' => 10,
																		   'order' => array('Article.id DESC'),
																		   'fields' => array('Article.id', 'Article.title', 'Article.author','Article.publish_date')
																		   ));
                                                                       
						?>					
							
						</div>
						
					</div></div>
					
				</div>
							
					<div class="widget widget_links linkcat" id="linkcat-2 blogroll"><div class="widget-corner-top png">
											<div class="widget-corner-bot png"><div class="widget-bg">
						
								<div class="title"><h2>
											
						پیوندها		</h2></div>
												
						<?php
	  echo $this->element('links', array('controllerName' => 'links',
																		   'conditions' => '', 
																		   'className' => '',
																		   'limit' => 10,
																		   'order' => array('Link.id DESC'),
																		   'fields' => array('Link.id', 'Link.title', 'Link.link_url')
																		   
																		   ));
																		   ?>
	</div></div></div></div>
						
	
					
				
</div><div class="column-right">

	
				<div class="widget widget_recent_reviewers_top">
					<div class="widget-corner-top png"><div class="widget-corner-bot png">
						<div class="widget-bg">
							<div class="title">
								<h2>پربازدیدترین مقالات</h2>
							</div>
							<?php
							 echo $this->element('mostVisit', array('controllerName' => 'articles',
																		   'conditions' => '', 
																		   'className' => '',
																		   'limit' => 5,
																		   'order' => array('Article.hits DESC'),
																		   'fields' => array('Article.id', 'Article.title', 'Article.author','Article.hits','Article.intro','Article.image','Article.image_dir','Article.publish_date')
																		   ));?>
							
							
						</div>
					</div></div>
				</div>
				
				
				<div class="widget widget_categories">
					<div class="widget-corner-top png"><div class="widget-corner-bot png">
						<div class="widget-bg">
							<div class="title">
								<h2>مجموعه ها</h2>
							</div>
<?php					
echo $this->element('menu', array('menu_id' => 1129 , 'menu_type' => 'kmenu'));
?>                                                      
							
						</div>
					</div>
				</div></div>
				
					
			
</div>
								
	<div class="column-center">
	
		<div class="slogan">
			<div class="slogan-indent" dir="ltr">
				
			</div>
		</div>
		
							
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
			
        ?>						</div>
									
					
			<div class="navigation">
				<div class="alignleft"><a href="#"> موارد بیشتر  </a></div>
				<div class="alignright"></div>
			</div>
			
				

							<div class="clear"></div>
						</div>
						
					</div></div></div></div>
				</div></div></div></div>
				
			</div>
		</div>
	</div>
	
	<div class="footer">
		<div class="indent">
		تمام حقوق مربوط به وب‌سایت و محتوای آن بر اساس پروانه‌ی کریتیو کامنز متعلق به سایت اندیشه سرا است<br />
حق ویرایش مقالات رسیده برای سایت اندیشه سرا محفوظ است<br />. نقل مطالب از این سایت با ذکر ماخذ و دادن لینک آزاد است<br />.
licensed under a Creative Commons Attribution 3.0 License | 

<a href="/">andishesara.com</a> ® 2010
			<!-- 14 queries. 0.171 seconds. -->

			
		</div>
	</div>
	
	<!--andishesara.com -->

