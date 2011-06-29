<div class="stars form">
<?php echo $form->create('Star', array('url' => $form_url, 'type' => 'file'));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Star.id');
		if(!isset($cat_id[0])) echo $extendedForm->hidden('Star.widget_id',array('value' => $cat_id['cat_id'] ));
		 echo $extendedForm->hidden('Star.user_id',array('value' => $auth['User']['id'] ));
		echo $extendedForm->input('Star.star');
		echo $extendedForm->input('Star.category');
		echo $extendedForm->input('Star.title');
		echo $form->input('picture', array('type' => 'file'));
		echo $extendedForm->input('Star.dir');
		echo $extendedForm->input('Star.access', array('type' => 'select', 'options' => $options, 'default' => 'Public'));
		 
	?>
<?php echo $form->end('Submit');?>
</div>