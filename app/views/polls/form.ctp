<div class="polls form">
<?php echo $form->create('Poll', array('url' => $form_url));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Poll.id');
		echo $extendedForm->input('Poll.title');
		echo $extendedForm->input('Poll.hits');
		echo $extendedForm->input('Poll.publish');
		echo $extendedForm->input('Poll.date');
	?>
<?php echo $form->end('Submit');?>
</div>