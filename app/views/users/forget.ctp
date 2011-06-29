<p>کاربر گرامی در صورتی که رمز عبور خود را فراموش کرده اید، آدرس پست الکترونیک خود را وارد نمایید تا رمز عبور جدید برای شما ارسال شود</p>
<?php echo $form->create('User',array('controller'=>'users', 'action'=>'forget'));
	  echo $extendedForm->input('User.email',array('class' => 'field', 'label' => array('text' => 'پست الکترونیک: ')));
	  echo "<br />";
	  echo $form->end('ارسال');
		
?>