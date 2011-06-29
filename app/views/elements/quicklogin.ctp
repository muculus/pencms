<div style="display: none;" id="login_form">
<div align="left" style="margin-top: 20px; width: 310px;" id="status">
<div id="login_response"><!-- spanner --></div>
﻿<?php

	if(empty($isAuthed) ){
		$session->flash();
		echo $form->create('User', array('action' => 'login', 'class' => 'cssform'));
		echo $form->input('email', array('class' => 'form-login-username', 'value'=> 'Email' ,'onfocus' => "if(this.value=='Email')this.value='';" ,'label' => array('class' => '', 'text' => 'پست الکترونیک:<br />'))); 
		echo $form->input('password', array('class' => 'form-login-username' ,'onfocus' => "if(this.value=='Password')this.value='';" , 'value' => 'Password', 'label' => array('class' => '', 'text' => 'رمز عبور:<br />')));
		echo $form->button('ورود', array('type' => 'submit', 'id'=>"submit" ,'name'=>'Login', 'value'=>'Login' ,'class' => 'form-login-button button big'));
		echo '<div id="ajax_loading"><img src="/images/spinner.gif" align="absmiddle">&nbsp;Processing...</div>';
		echo "<br /><ul>";
		echo "<li><a href='/users/forget'><span style='font-size: 12px'>رمز عبور خود را فراموش کرده اید؟</span></a></li>";
		echo '</ul>';
		echo $form->end();
	} else {
		echo "<br /><br /><br /><h3 style='text-align: center'>".$auth['User']['email']."<br />خوش آمدید.</h3>";
		echo '<p ><center><a href="/users/form/edit/'. $auth['User']['id'].'"> تغییر مشخصات کاربری </a>';
		echo "</center></p>";
		echo "<p style='text-align: center'>".$html->link("خروج از سیستم", array('controller' => 'users', 'action' => 'logout'));
		echo "</p>";
	}
?>
</div>
</div>
