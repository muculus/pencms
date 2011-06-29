<div class="stars form">
<?php echo $form->create('Star', array('url' => $form_url));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Star.id');
		echo $extendedForm->input('Star.category_id');
		echo $extendedForm->input('Star.star_owner_id');
		echo $extendedForm->input('Star.category');
		echo $extendedForm->input('Star.title');
		echo $extendedForm->input('Star.alias');
		echo $extendedForm->input('Star.picture');
		echo $extendedForm->input('Star.dir');
	?>
<?php echo $form->end('Submit');?>
</div>