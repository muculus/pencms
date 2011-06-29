<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('پنل مدیریت سیستم مدیریت محتوای پندار'); ?>
		<?php echo $title_for_layout;?>
	</title>
	<!-- //TODO:These two line must add to specific view -->
	<?php echo $html->css('/js/ext-2.0.1/resources/css/ext-custom.css'); ?>
	<?php echo $javascript->link('/js/ext-2.0.1/ext-custom.js'); ?>	
	
	<?php
		echo $html->meta('icon');

		echo $html->css('admin');
		echo $html->css('jqueryFileTree.css');
		echo $html->css('smoothness/jquery-ui-1.8.13.custom.css');
		echo $html->css('ui.jqgrid.css');

		echo $javascript->link('ckfinder/ckfinder.js');
		echo $javascript->link('fck/fckeditor.js');
		echo $javascript->link('jquery-1.5.1.min.js');
		echo $javascript->link('jquery.easing.js');
		echo $javascript->link('jqueryFileTree.js');
		echo $javascript->link('jquery-ui-1.8.13.custom.min.js');
		echo $javascript->link('jqgrid/i18n/grid.locale-fa.js');
		echo $javascript->link('jqgrid/jquery.jqGrid.min.js');

		echo $scripts_for_layout;
	?>
<script type="text/javascript">
function loadmetakey()
{  
$("#ArticleMetakey").load("http://<?php echo $_SERVER['HTTP_HOST']; ?>/php/metakey.php", {content: $('textarea[id|=ArticleContent]').val()}, function(){
//alert("meta keys will be loaded");
});
}
</script>
<script type="text/javascript"> 
$(document).ready(function(){

	$("ul.subnav").parent().append("<span></span>"); //Only shows drop down trigger when js is enabled - Adds empty span tag after ul.subnav
	
	$("ul.topnavx li span").click(function() { //When trigger is clicked...
		
		//Following events are applied to the subnav itself (moving subnav up and down)
		$(this).parent().find("ul.subnav").slideDown('fast').show(); //Drop down the subnav on click

		$(this).parent().hover(function() {
		}, function(){	
			$(this).parent().find("ul.subnav").slideUp('slow'); //When the mouse hovers out of the subnav, move it back up
		});

		//Following events are applied to the trigger (Hover events for the trigger)
		}).hover(function() { 
			$(this).addClass("subhover"); //On hover over, add class "subhover"
		}, function(){	//On Hover Out
			$(this).removeClass("subhover"); //On hover out, remove class "subhover"
	});

});
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
	<div id="container">
		<div id="header">
			<?php echo $this->element("menu/jsmenu"); ?>
		</div>
		<div id="content">
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
				$session->flash();
				
				
				echo $content_for_layout;
			?>
            <?php
            
			if($this->Session->read('Auth.User.group_id') == 6) {
				$elementContent = $this->requestAction(array('controller' => 'users',
									         'action' => 'number'));
			} else {
				$elementContent = "دسترسی برای شما محدود است.";
			}
			
			?>

			

		</div>
		<div id="footer">

		</div>
	</div>
    
    <p id="backtoblog"><a href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>" title="Are you lost?">&laquo; بازگشت به صفحه اصلی وب سایت</a> <span><?php echo  "تعداد اعضای سایت:".$elementContent; ?></span></p>
	<?php //echo $cakeDebug; //arash.m: cake1.3 fix
		//echo $this->element('sql_dump');
	?>
</body>
</html>