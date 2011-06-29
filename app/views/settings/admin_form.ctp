<div class="settings form">
<?php echo $form->create('Setting', array('url' => $form_url));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Setting.id');
		echo $extendedForm->input('Setting.title');
		echo $extendedForm->input('Setting.slogan');
		echo $extendedForm->input('Setting.email');
		echo $form->input('Setting.metakey');
		echo $form->input('Setting.metadesc');
		echo $extendedForm->input('Setting.access', array('type' => 'select', 'options' => $options, 'default' => 'Public'));
		 
	?>
<?php echo $form->end('Save');?>
</div>