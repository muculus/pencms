<div class="products form">
<?php echo $form->create('Product', array('url' => $form_url, 'type' => 'file'));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Product.id');
		
		echo $extendedForm->input('Product.title');
		echo $extendedForm->input('Product.price');
		echo $extendedForm->input('Product.description');
		echo $extendedForm->input('Product.specification');
		echo $extendedForm->input('Product.main description');
		echo $extendedForm->input('Product.publish');
		echo $form->input('Product.picture', array('type' => 'file'));
	
	?>
<?php echo $form->end('Submit');?>
</div>