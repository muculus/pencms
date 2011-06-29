<div class="submits form">
<?php echo $form->create('Submit', array('url' => $form_url ,' type' => 'file'));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Submit.id');
		if(!empty($form_action) && $form_action == 'add') echo $extendedForm->hidden('Submit.user_id' ,array('value' => $auth['User']['id'] ));
		//if(!isset($cat_id[0])) echo $extendedForm->hidden('Submit.widget_id',array('value' => $cat_id['cat_id'] ));
		echo $extendedForm->input('Submit.subject');
		echo $extendedForm->input('Submit.title');
		echo $extendedForm->input('Submit.source');
		echo $extendedForm->input('Submit.description');
		echo $extendedForm->input('Submit.publish');
		echo $form->input('Submit.file', array('type' => 'file'));
		 echo $html->link('Delete', array('controller'=>'submits', 'action'=>'file_delete',     $submit['Submit']['id']));
		echo $extendedForm->input('Submit.access', array('type' => 'select', 'options' => $options, 'default' => 'Public'));
	?>
<?php echo $form->end('Submit');?>
</div>