<div class="messages form">
<?php echo $form->create('Message', array('url' => $form_url));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Message.id');
		echo $extendedForm->input('Message.title');
		echo $extendedForm->input('Message.category_id');
		echo $extendedForm->input('Message.publish');
		echo $extendedForm->input('Message.end_date');
		echo $extendedForm->input('Message.archive');
	?>
<?php echo $form->end('Submit');?>
</div>