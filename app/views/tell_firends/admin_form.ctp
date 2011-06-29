<div class="tellFirends form">
<?php echo $form->create('TellFirend', array('url' => $form_url, 'type' => 'file'));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('TellFirend.id');
		echo $extendedForm->input('TellFirend.title');
		echo $form->input('TellFirend.picture' ,array('type' => 'file'));		
		
		echo $extendedForm->input('TellFirend.url');
	?>
<?php echo $form->end('Submit');?>
</div>