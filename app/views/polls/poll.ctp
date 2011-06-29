<p>لطفاً  بخش مورد نظر برای نظرسنجی انتخاب نمایید</p>
<?php
    echo $form->create('Poll', array('action' => 'form3')); 
    $attributes=array('separator'=> '<br>','legend'=>false);
    echo $form->radio('option',$option,$attributes);
   ?>

    
        <?php echo $form->end('ارسال');?>
       
