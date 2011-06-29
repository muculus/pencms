<div class="starOwners form">
<?php echo $form->create('StarOwner', array('url' => $form_url));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('StarOwner.id');
		echo $extendedForm->input('StarOwner.firstname');
		echo $extendedForm->input('StarOwner.lastname');
		echo $extendedForm->input('StarOwner.tel');
		echo $extendedForm->input('StarOwner.address');
		echo $extendedForm->input('StarOwner.datepayment');
		echo $extendedForm->input('StarOwner.star');
		echo $extendedForm->input('StarOwner.show_contact');
		echo $extendedForm->input('StarOwner.price');
		echo $extendedForm->input('StarOwner.url');
		echo $extendedForm->input('StarOwner.option');
	?>
<?php echo $form->end('Submit');?>
</div>