<div class="advertisements form">
<?php echo $form->create('Advertisement', array('url' => $form_url, 'type' => 'file'));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Advertisement.id');
		if(!isset($cat_id[0])) echo $extendedForm->hidden('Advertisement.widget_id',array('value' => $cat_id['cat_id'] ));
		echo $extendedForm->input('Advertisement.title');
		echo $extendedForm->input('Advertisement.owner');
		echo $extendedForm->input('Advertisement.size');
		echo $form->input('Advertisement.start_date');
		echo $form->input('Advertisement.end_date');
		echo $extendedForm->input('Advertisement.click_count');
		echo $extendedForm->input('Advertisement.show_count');
		echo $extendedForm->input('Advertisement.link_url');
		echo $form->input('file', array('type' => 'file'));
		$options=array( 'A' => 'A','B' => 'B','C' => 'C','D' => 'D','F1' => 'F1','G1' => 'G1','A2' => 'A2','D2' =>'D2','E2' =>'E2');
		echo $extendedForm->input('Advertisement.position', array('type' => 'select', 'options' => $options));
		echo $extendedForm->input('Advertisement.publish');
		$options=array( '1' => 'by date','2' => 'by show','3' => 'by hits');
		echo $extendedForm->input('Advertisement.type', array('type' => 'select', 'options' => $options, 'default' => 'Public'));
		echo $form->input('Advertisement.width');
		echo $form->input('Advertisement.height');
			?>
<?php echo $form->end('Submit');?>
</div>