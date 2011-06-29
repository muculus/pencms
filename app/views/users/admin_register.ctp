
<p>Please fill out the form below to register an account.</p>
<?php echo $form->create('User', array('action' => 'register'));?>
<?php
echo $form->hidden('User.group_id', array('value' => '5'));
echo $form->input('User.name');
echo $form->input('User.field');
echo $form->input('User.grade');
echo $form->input('User.email');
echo $form->input('User.password');
?>
<?php echo $form->end('Register');?>