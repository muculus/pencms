<div class="groups form">
<?php echo $form->create('Group', array('url' => $form_url));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Group.id');
		echo $extendedForm->input('Group.name');
		echo $extendedForm->input('Group.description');
		echo $extendedForm->input('Group.parent_id', array('type' => 'select', 'options' => $options, 'default' => 'Public'));
	?>
<?php echo $form->end('Submit');?>
</div>