<div class="readers form">
<?php echo $form->create('Reader', array('url' => $form_url));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Reader.id');
		if(isset($selectedCategories)){
			echo $extendedForm->input('category',array('multiple' => 'multiple','type' => 'select' ,'selected' => $selectedCategories));
		}else{
			echo $extendedForm->input('category',array('multiple' => 'multiple','type' => 'select' ));
		}
		echo $extendedForm->input('Reader.url');
		echo $extendedForm->input('Reader.number');
	?>
<?php echo $form->end('Submit');?>
</div>