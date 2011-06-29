	<h3><span class="green">ثبت نام در سایت</span></h3>
<?php
echo $form->create('User', array('action' => 'register', 'class' => 'cssform'));
		echo $form->input('name', array('class' => 'field', 'label' => array('class' => 'green', 'text' => 'نام و نام خانوادگی:<br>'))); 
		echo $form->input('field', array('class' => 'field', 'label' => array('class' => 'green', 'text' => 'رشته تحصیلی:<br />')));
		$options=array ('دیپلم' => 'دیپلم', 'کاردانی' => 'کاردانی', 'کارشناسی' => 'کارشناسی', 'کارشناسی ارشد' => 'کارشناسی ارشد', 'دکترا' => 'دکترا');
		echo $form->input('grade', array('class' => 'field','type' => 'select', 'options' => $options, 'empty' => true, 'label' => array('class' => 'green', 'text' => 'میزان تحصیلات:<br />')));
		echo $form->input('email', array('class' => 'field', 'label' => array('class' => 'green', 'text' => 'پست الکترونیک:<br />')));
		echo $form->input('password', array('class' => 'field', 'label' => array('class' => 'green', 'text' => 'رمز عبور:<br />')));
		echo $form->button('ثبت نام', array('type' => 'submit', 'class' => 'bt_login'));
		echo $form->end();
?>