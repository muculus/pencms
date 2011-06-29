
<div class="starOwners form">
<?php echo $form->create('StarOwner', array('url' => $form_url));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('StarOwner.id');
		if(!isset($cat_id[0])) echo $extendedForm->hidden('StarOwner.widget_id',array('value' => $cat_id['cat_id'] ));
		echo $extendedForm->input('StarOwner.firstname');
		echo $extendedForm->input('StarOwner.lastname');
		echo $extendedForm->input('StarOwner.tel');
		echo $extendedForm->input('StarOwner.address');
		echo $extendedForm->input('StarOwner.datepayment');
		echo $extendedForm->input('StarOwner.star');
		echo $extendedForm->input('StarOwner.show_contact');
		echo $extendedForm->input('StarOwner.price');
		echo $extendedForm->input('StarOwner.url');
			echo $extendedForm->input('StarOwner.Star.star_owner_id');
		echo $extendedForm->input('StarOwner.Star.category');
		echo $extendedForm->input('StarOwner.Star.title');
		/*echo $form->input('picture', array('type' => 'file'));
		echo $extendedForm->input('Star.dir');*/
		
	?>
<?php echo $form->end('Submit');?>
</div>