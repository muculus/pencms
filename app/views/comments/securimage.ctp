<div class="comments form">
<?php echo $form->create('Comment', array('url' => $form_url));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Comment.id');
		echo $extendedForm->input('Comment.name');
		echo $extendedForm->input('Comment.comment');
		echo $extendedForm->input('Comment.reply');
		echo $extendedForm->input('Comment.widget_type');
		echo $extendedForm->input('Comment.foreignid');
		echo $extendedForm->input('Comment.publish');
	?>
<?php echo $form->end('Submit');?>
</div>