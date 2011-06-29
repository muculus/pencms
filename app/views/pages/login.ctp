<?php
	if(empty($isAuthed) ){
		$session->flash();
		echo $form->create('User', array('action' => 'login', 'class' => 'cssform'));
?>
		<h3><span class="green">ورود اعضا</span></h3>
<?php
		echo $form->input('email', array('class' => 'field', 'label' => array('class' => 'green', 'text' => 'پست الکترونیک:<br>'))); 
		echo $form->input('password', array('class' => 'field', 'label' => array('class' => 'green', 'text' => 'رمز عبور:<br>'), 'value' => ''));
		echo $form->button('ورود', array('type' => 'submit', 'class' => 'bt_login'));
		echo "<br />";
		echo "<a href='/users/forget'><span style='font-size: 12px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;رمز عبور خود را فراموش کرده اید؟</span></a>";
		echo $form->end();
	} else {
		echo "<br /><br /><br /><h3 style='text-align: center'>".$auth['User']['email']."<br />خوش آمدید.</h3>";
		echo "<p style='text-align: center'>".$html->link("تغییر مشخصات کاربری", array('controller' => 'users', 'action' => 'edit', $auth['User']['id']));
		echo "</p>";
		echo "<p style='text-align: center'>".$html->link("خروج از سیستم", array('controller' => 'users', 'action' => 'logout'));
		echo "</p>";
	}
?>
