<div class="managers form">
<?php echo $form->create('Manager', array('url' => $form_url));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Manager.id');
		echo $extendedForm->input('Manager.firstname');
		echo $extendedForm->input('Manager.lastname');
		echo $extendedForm->input('Manager.grade');
		echo $extendedForm->input('Manager.position');
		echo $extendedForm->input('Manager.description');
		echo $extendedForm->input('Manager.career');
		echo $extendedForm->input('Manager.picture');
		echo $extendedForm->input('Manager.tel');
		echo $extendedForm->input('Manager.email');
		echo $extendedForm->input('Manager.publish');
		echo $extendedForm->input('Manager.created_by');
		echo $extendedForm->input('Manager.modified_by');
	?>
<?php echo $form->end('Submit');?>
</div>