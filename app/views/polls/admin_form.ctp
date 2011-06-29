<div class="polls form">
<?php echo $form->create('Poll', array('url' => $form_url));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Poll.id');
		if(isset($cat_id['cat_id'])) echo $extendedForm->hidden('Poll.widget_id',array('value' => $cat_id['cat_id'] ));
		if(isset($selectedCategories)){
			echo $extendedForm->input('category',array('multiple' => 'multiple','type' => 'select' ,'selected' => $selectedCategories));
		}else{
			echo $extendedForm->input('category',array('multiple' => 'multiple','type' => 'select' ));
		}
		echo $extendedForm->input('Poll.title');
		echo $extendedForm->input('Poll.hits');
		echo $extendedForm->input('Poll.publish');
		echo $form->input('Poll.date');
	?>
<?php echo $form->end('Submit');?>
</div>