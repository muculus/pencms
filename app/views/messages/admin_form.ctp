<div class="messages form">
<?php echo $form->create('Message', array('url' => $form_url));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Message.id');
		if(!isset($cat_id[0])) echo $extendedForm->hidden('Message.widget_id',array('value' => $cat_id['cat_id'] ));
		echo $extendedForm->input('Message.title');
		echo $form->input('Message.end_date');
		echo $extendedForm->input('Message.description');
		echo $extendedForm->input('Message.archive');
		echo $extendedForm->input('Message.publish');
	?>
<?php echo $form->end('Submit');?>
</div>