<div class="widgets form">
<?php echo $form->create('Widget', array('url' => $form_url, 'type' => 'file'));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Widget.id');
		echo $extendedForm->input('Widget.name');
		echo $form->input('picture', array('type' => 'file'));
		echo $extendedForm->select('Widget.type', $widgetList, array('value' => 'data[Widget][type]','selected' =>  '1'));
		echo $extendedForm->input('Widget.access', array('type' => 'select', 'options' => $options, 'default' => 'Public'));
		 
	?>
<?php echo $form->end('Submit');?>
</div>