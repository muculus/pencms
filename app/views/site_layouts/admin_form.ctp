<div class="siteLayouts form">
<?php echo $form->create('SiteLayout', array('url' => $form_url));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('SiteLayout.id');
		echo $extendedForm->input('SiteLayout.template_id');
		echo $extendedForm->input('SiteLayout.name', array('type' => 'select', 'options' => $layoutList, 'empty' => true));
	?>
<?php echo $form->end('Submit');?>
</div>