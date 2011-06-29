<div class="news form">
<?php echo $form->create('News',array('url' => $form_url, 'type' => 'file'));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('News.id');
		//if(!isset($cat_id[0])) echo $extendedForm->hidden('News.widget_id',array('value' => $cat_id['cat_id'] )); 
		///TODO:fix above line
		echo $extendedForm->input('News.title');
		echo $extendedForm->input('News.intro');
		echo $extendedForm->input('News.text');
		echo $form->input('News.date');
		echo $form->input('News.image', array('type' => 'file'));
		echo $extendedForm->input('News.source');
		echo $extendedForm->input('News.publish');
		
if(empty($form_action) || $form_action != 'add') echo $form->input('News.url', array('readonly' => 'readonly'));
	?>
<?php echo $form->end('Submit');?>
</div>