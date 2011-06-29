<fieldset><legend>پیگیری پرسش از مدیران </legend>
<?php
		echo $form->create('ManagerMassage', array('action' => 'form2'));
		 echo 'کد رهگیری '.$extendedForm->input('ManagerMassage.code',array('label' => '')); 
		echo $form->end('ارسال');
?>
</fieldset>

<fieldset><legend> ارتباط با مدیران</legend>
<?php echo $form->create('ManagerMassage', array('action' => 'form1'));?>
	<?php
		
		
		echo 'نام  مدیر '.$extendedForm->input('ManagerMassage.manager_id',array('label' => ''));
		echo 'آدرس پست الکترونیکی '.$extendedForm->input('ManagerMassage.email',array('label' => ''));
		echo 'پرسش '.$extendedForm->input('ManagerMassage.question',array('label' => ''));
		
			?>
<?php echo $form->end('Submit');?>
</fieldset>

