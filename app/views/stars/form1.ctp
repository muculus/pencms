

<div class="Stars form">
<?php echo $form->create('Star',array('action' => 'form1', 'type' =>'file'));?>
	<?php
		
	 echo $extendedForm->hidden('Star.user_id',array('value' => $auth['User']['id'] ));
	 echo $extendedForm->input('Star.title');
	 echo $extendedForm->input('Star.description');
	echo $extendedForm->input('Star.star');
	echo $extendedForm->input('Star.url');
	
	echo $form->input('picture' ,array( 'type' => 'file'));
	echo $extendedForm->input('Star.show_contact');
		
	echo $form->input('Star.start_date');
	
	
	
	?>
<?php echo $form->end('Submit');?>
</div>