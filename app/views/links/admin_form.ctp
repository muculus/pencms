<div class="links form">
<?php echo $form->create('Link', array('url' => $form_url, 'type' => 'file'));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Link.id');
		if(isset($selectedCategories)){
			echo $extendedForm->input('category',array('multiple' => 'multiple','type' => 'select' ,'selected' => $selectedCategories));
		}else{
			echo $extendedForm->input('category',array('multiple' => 'multiple','type' => 'select' ));
		}
		//if(!isset($cat_id[0]))  echo $extendedForm->hidden('Link.widget_id',array('value' => $cat_id['cat_id'] ));
		echo $extendedForm->input('Link.title');
		echo $extendedForm->input('Link.description');
		echo $extendedForm->input('Link.link_url');
		echo $extendedForm->input('Link.publish');
		echo $form->input('picture', array('type' => 'file'));
		echo $extendedForm->input('Link.access', array('type' => 'select', 'options' => $options, 'default' => 'Public'));
		 
	?>
<?php echo $form->end('Submit');?>
</div>