	<?php $session->flash(); ?>
    <h1><span class="green">ورود اعضا</span></h1>
<?php
	echo $form->create('User', array('action' => 'login', 'class' => 'cssform'));
	echo $form->input('email', array('class' => 'field', 'label' => array('class' => 'green', 'text' => 'پست الکترونیک:'))); 
	echo $form->input('password', array('class' => 'field', 'label' => array('class' => 'green', 'text' => 'رمز عبور:'), 'value' => ''));
	echo $form->button('ورود', array('type' => 'submit', 'class' => 'bt_login'));
	echo $form->end();
?>
                   

