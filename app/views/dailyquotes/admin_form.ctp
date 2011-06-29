<div class="dailyquotes form">
<?php echo $form->create('Dailyquote', array('url' => $form_url, 'type' => 'file'));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Dailyquote.id');
	//	if(!isset($cat_id[0])) echo $extendedForm->hidden('Dailyquote.widget_id',array('value' => $cat_id['cat_id'] ));
		echo $extendedForm->input('Dailyquote.title');
		echo $extendedForm->input('Dailyquote.content');
		echo $extendedForm->input('Dailyquote.publish');
	?>
<?php echo $form->end('Save');?>
</div>

