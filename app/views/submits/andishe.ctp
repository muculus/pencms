<?php 	
echo $javascript->link('/js/fck/fckeditor.js',  false);
?>
<p style="text-align: justify">از اهل قلم که لطف می کنند و برای سایت اندیشه سرا مطلبی می فرستند خواهش می کنیم چند نکته را در نظر داشته باشند :<ul style="color: #000; font-size: 12px; text-align: justify">
<li>1) اندیشه سرا در کوتاه کردن مقالات آزاد است</li>
<li>2) این بخش به منظور انتشار مقالات  در نظر گرفته شده است. لذا برای ارسال نظرات و پیشنهادات از ایمیل «info@andishesara.com» استفاده شود.</li>
<li>3) همراه مقالات ترجمه شده لطفا اصل مقاله را نیز بفرستید</li>
<li>4) مقالات ارسالی کاربران، پس از تأیید  منتشر خواهند شد. زمان بررسی و انتشار مقالات بر اساس  حجم مطلب ارسال شده، متغییر خواهد بود.</li>
<li>5) مقاله های طولانی را در دو یا چند قسمت تنظیم کنید</li>
<li>6) لطفا در حد امکان منابع مورد استفاده برای نوشتن مقاله ی خود را ذکر فرمایید</li>
</ul>
<br /><br />
</p>
<div class="submits form">
<?php echo $form->create('Submit', array('action' => 'andishe' , 'type' => 'file'));?>
	<?php
		echo $extendedForm->input('Submit.id');
		echo $extendedForm->hidden('Submit.user_id' ,array('value' => $auth['User']['id'] ));
	    echo $extendedForm->hidden('Submit.widget_id',array('value' => 98 ));
		echo "موضوع:".$extendedForm->input('Submit.subject',array('class' => 'text','label' => '' ));
		echo "عنوان:".$extendedForm->input('Submit.title',array('class' => 'text','label' => '' ));
		echo "منبع :".$extendedForm->input('Submit.source_paper',array('class' => 'text','label' => '' ));
		echo "متن مطلب:".$form->input('Submit.description',array('class' => 'text','label' => '' ));
		echo $fck->load('Submit.description');
		echo "اضافه کردن فایل:".$form->input('Submit.file', array('class' => 'text','type' => 'file','label' => ''));
		
	?>
<?php echo $form->end('ارسال');?>
</div>