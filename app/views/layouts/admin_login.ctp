<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('Admin Site:'); ?>
		<?php echo $title_for_layout;?>
	</title>
	<?php
		echo $html->meta('icon');

		echo $html->css(array('login'));

		echo $scripts_for_layout;
	?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body class="login">
<div id="login">

		<?php
            if ($session->check('Message.flash')):
                    $session->flash();
            endif;
            $session->flash('auth');
        ?>

        <?php echo $content_for_layout;?>
      


</div>

<p id="backtoblog"><a href="http://localhost/emodir/" title="Are you lost?">&laquo; مرجع الکترونیکی علوم مدیریت ایران</a></p>


</body>
</html>