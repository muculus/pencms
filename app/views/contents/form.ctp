<div class="articles form">
<?php echo $form->create('Content', array('url' => $form_url));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Content.id');
		echo $extendedForm->input('Content.title');
		echo $extendedForm->input('Content.content');
		echo $extendedForm->input('Content.author');
		echo $extendedForm->input('Content.publish');
		echo $extendedForm->input('Content.image');
		echo $extendedForm->input('Content.publishdate');
		echo $extendedForm->input('Content.widget_id');
	?>
<?php echo $form->end('Submit');?>
</div>