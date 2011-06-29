<p style="text-align: justify">

<div align="right">
<?php
	echo $form->create('Page', array('action' => 'sending'));
	echo 'نام و نام خانوادگی '.$extendedForm->input('name',array('label' => ''));
	echo 'آدرس  پست الکترونیکی '.$extendedForm->input('email',array('label' => ''));
	echo 'رشته '.$extendedForm->input('field',array('label' => ''));
	$options=array( 'دیپلم' =>'دیپلم', 'کاردانی' =>'کاردانی', 'کارشناسی '=>'کارشناسی', 'کارشناسی ارشد'=>'کارشناسی ارشد',' دکترا'=>'دکترا');                                     
	echo 'میزان تحصیلات '.$extendedForm->input('grade', array('type' => 'select', 'label' => '','options' => $options, 'empty' => true));
	$reciptions=array( 'دبیر علمی' =>'دبیر علمی', 'مدیر اجرایی' =>'مدیر اجرایی', 'مدیر بازرگانی'=>'مدیر بازرگانی', 'پشتیبانی فنی'=>'پشتیبانی فنی','امور کاربران'=>'امور کاربران');                                     
	echo 'واحد دریافت کننده پیام'.$extendedForm->input('reciptions', array('type' => 'select', 'label' => '','options' => $reciptions, 'empty' => true));
	echo 'متن پیام'.$extendedForm->input('description' ,array('type' => 'textarea', 'label' => '')); 
	
	echo $form->end('ارسال');
?>
</div>