<div class="galleries form">
<?php echo $form->create('Gallery', array('url' => $form_url ,'type' => 'file'));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Gallery.id');
		if(isset($cat_id[0]))  echo $extendedForm->hidden('Gallery.widget_id',array('value' => $cat_id['cat_id'] ));
		
		echo $extendedForm->input('Gallery.title');
		echo $extendedForm->input('Gallery.description');
		echo  $form->input('picture' ,array('type' => 'file'));
		
		//echo $extendedForm->input('Gallery.score');
		//echo $extendedForm->input('Gallery.hits');
		
		echo $extendedForm->input('Gallery.publish');
		echo $extendedForm->input('Gallery.primary');
		echo $extendedForm->input('Gallery.access', array('type' => 'select', 'options' => $options, 'default' => 'Public'));
		//echo $extendedForm->input('Gallery.comment_p');
	?>
<?php echo $form->end('Submit');?>
</div>