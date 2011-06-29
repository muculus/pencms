<div class="templates form">
<?php echo $form->create('Template', array('url' => $form_url));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Template.id');
		echo $extendedForm->input('Template.name');
		echo $extendedForm->input('Template.access', array('type' => 'select', 'options' => $options, 'default' => 'Public'));
		 
	?>
<?php echo $form->end('Submit');?>
</div>