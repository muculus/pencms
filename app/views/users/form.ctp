<?php
$this->pageTitle = "تغییر مشخصات کاربری";
if($isAuthed && ($userID == $auth['User']['id'])){
?>
<div class="users form">
<?php echo $form->create('User',array('url' => $form_url, 'type' => 'file'))?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('User.id');
		echo "نام و نام خانوادگی".$extendedForm->input('User.name',array('label' => '' ));
		echo "رشته تحصیلی".$extendedForm->input('User.field',array('label' => '' ));
		echo "مدرک تحصیلی".$extendedForm->input('User.grade',array('label' => '' ));
		echo "پست الکترونیک".$extendedForm->input('User.email',array('label' => '' ));
		echo "رمز عبور جدبد".$extendedForm->input('User.new_password', array('class' => 'form-item', 'value' => '','label' => ''));
		echo "تصویر".$form->input('User.picture', array( 'type' => 'file','label' => '' ));

	?>
    <br />
<?php echo $form->end('تغییر مشخصات');?>
</div>

<?php 
}
?>