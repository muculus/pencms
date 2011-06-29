<div class="seos form">
<?php echo $form->create('Seo', array('url' => $form_url));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Seo.id');
		echo $extendedForm->input('Seo.word');
		echo $extendedForm->input('Seo.link');
	?>
<?php echo $form->end('Submit');?>
</div>