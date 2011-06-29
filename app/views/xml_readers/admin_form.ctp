<div class="xmlReaders form">
<?php echo $form->create('XmlReader', array('url' => $form_url));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('XmlReader.id');
		echo $extendedForm->input('XmlReader.url');
		echo $extendedForm->input('XmlReader.number');
		echo $extendedForm->input('XmlReader.widget_id');
	?>
<?php echo $form->end('Submit');?>
</div>