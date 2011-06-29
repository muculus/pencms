<div class="managerMassages form">
<?php echo $form->create('ManagerMassage', array('url' => $form_url));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('ManagerMassage.id');
		if(!isset($cat_id[0])) echo $extendedForm->hidden('ManagerMassage.widget_id',array('value' => $cat_id['cat_id'] ));
		echo $extendedForm->input('ManagerMassage.question');
		echo $extendedForm->input('ManagerMassage.answer');
		echo $extendedForm->input('ManagerMassage.publish');
		echo $extendedForm->input('ManagerMassage.status');
			?>
<?php echo $form->end('Submit');?>
</div>