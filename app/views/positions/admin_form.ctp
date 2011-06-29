<div class="positions form">
<?php echo $form->create('Position', array('url' => $form_url));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Position.id');
		echo $extendedForm->input('Position.name');
		echo $extendedForm->input('Position.template_id');
		echo $extendedForm->input('Position.site_layout_id');
		echo $extendedForm->input('Position.widgets');
		echo $extendedForm->input('Position.access', array('type' => 'select', 'options' => $options, 'default' => 'Public'));
		 
	?>
<?php echo $form->end('Submit');?>
</div>