<div class="managers form">
<?php echo $form->create('Download', array('url' => $form_url, 'type' => 'file'));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Manager.id');
		if(isset($cat_id['cat_id'])) echo $extendedForm->hidden('Manager.widget_id',array('value' => $cat_id['cat_id'] ));
		echo $extendedForm->input('Manager.name');
		echo $extendedForm->input('Manager.lastname');
		echo $extendedForm->input('Manager.grade');
		echo $extendedForm->input('Manager.position');
		echo $extendedForm->input('Manager.description');
		echo $extendedForm->input('Manager.career');
		echo $form->input('Manager.picture',  array('type' => 'file'));
		echo $extendedForm->input('Manager.tel');
		echo $extendedForm->input('Manager.email');
		echo $extendedForm->input('Manager.publish');
		
	?>
<?php echo $form->end('Submit');?>
</div>