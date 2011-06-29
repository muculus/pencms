<div class="managerMassages form">
<?php echo $form->create('ManagerMassage', array('url' => $form_url));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('ManagerMassage.id');
		echo $extendedForm->input('ManagerMassage.manager_id');
		echo $extendedForm->input('ManagerMassage.question');
		echo $extendedForm->input('ManagerMassage.answer');
		echo $extendedForm->input('ManagerMassage.publish');
		echo $extendedForm->input('ManagerMassage.code');
		echo $extendedForm->input('ManagerMassage.created_by');
		echo $extendedForm->input('ManagerMassage.modified_by');
	?>
<?php echo $form->end('Submit');?>
</div>