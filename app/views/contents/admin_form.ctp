<div class="contents form">
<?php echo $form->create('Content', array('url' => $form_url, 'type' => 'file'));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Content.id');
		if(isset($selectedCategories)){
			echo $extendedForm->input('category',array('multiple' => 'multiple','type' => 'select' ,'selected' => $selectedCategories));
		}else{
			echo $extendedForm->input('category',array('multiple' => 'multiple','type' => 'select' ));
		}
		//		if(!isset($cat_id[0])) echo $extendedForm->hidden('Content.widget_id',array('value' => $cat_id['cat_id'] ));
		echo $extendedForm->input('Content.title');
		echo $extendedForm->input('Content.intro');
		echo $extendedForm->input('Content.content');
		echo $extendedForm->input('Content.author');
		echo $form->input('Content.metakey');
		echo $form->input('Content.metadesc');
		echo $form->input('Content.image', array('type' => 'file'));
		if(empty($form_action) || $form_action != 'add')
		echo $html->link($content['Content']['image'],"/".$content['Content']['image_dir']."/".$content['Content']['image'] , array('before' => '--before--'),false);
		echo $form->input('Content.file', array('type' => 'file','after'=>''));
		if(empty($form_action) || $form_action != 'add')
		echo  '<span  class="infoMessage" >'.$content['Content']['file'] .'</span>';
		echo $extendedForm->input('Content.publish');
		if(empty($form_action) || $form_action != 'add') echo $form->input('Content.url', array('readonly' => 'readonly'));
		echo $form->input('Content.publish_date');
 		echo $extendedForm->input('Content.access', array('type' => 'select', 'options' => $options, 'default' => 'Public'));

	?>
<?php echo $form->end('Save');?>
</div>

