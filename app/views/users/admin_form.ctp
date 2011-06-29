<div class="users form">
<?php echo $form->create('User',array('url' => $form_url, 'type' => 'file'))?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('User.id');
		echo $extendedForm->input('User.access', array('type' => 'select', 'options' => $options, 'default' => 'Public'));
		echo $extendedForm->input('User.name');
		echo $extendedForm->input('User.email');
		echo $extendedForm->input('User.field');
		echo $extendedForm->input('User.new_password', array('class' => 'form-item', 'value' => ''));
		echo $extendedForm->input('User.grade');
		echo $form->input('User.picture', array( 'type' => 'file'));
		echo $extendedForm->input('User.active');
	?>
<?php echo $form->end('Submit');?>
</div>