<div class="submits form">
<?php echo $form->create('Submit', array('url' => $form_url));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Submit.id');
		echo $extendedForm->input('Submit.user_id');
		echo $extendedForm->input('Submit.widget_id');
		echo $extendedForm->input('Submit.subject');
		echo $extendedForm->input('Submit.title');
		echo $extendedForm->input('Submit.source');
		echo $extendedForm->input('Submit.description');
		echo $extendedForm->input('Submit.file');
		echo $extendedForm->input('Submit.file_dir');
		echo $extendedForm->input('Submit.file_filesize');
	?>
<?php echo $form->end('Submit');?>
</div>