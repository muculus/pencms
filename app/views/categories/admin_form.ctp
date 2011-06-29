<div class="categories form">
<?php echo $form->create('Category', array('url' => $form_url, 'type' => 'file'));?>
	<?php
		$script = "<script type='text/javascript'>var x=document.getElementById('CategoryCatType');var y=document.getElementById('CategoryWidgetset');var z=document.getElementById('CategoryWidgetId');if(x.value == 0){y.style.display='none';z.style.display='none';}if(x.value == 1){y.style.display='inline';z.style.display='none';}if(x.value == 2){y.style.display='inline';z.style.display='inline';};</script>";
		echo $script;
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Category.id');

		if ($form_action !== 'edit'){//baraie halate add karadan
		    
		  $form_action == 'add' ? $parentval = NULL : $parentval = $form_action ; //bara inke vaghti id null hast parent id ham null shavad
		    echo $extendedForm->hidden('Category.parent_id', array('value' => $parentval));
		}
		//echo $extendedForm->input('Category.widget_id', array('type' => 'select', 'options' => $widget, 'empty' => true));
		echo $extendedForm->input('Category.title');
		echo $extendedForm->input('Category.content');
		echo $form->input('Category.file' ,array('type' => 'file'));
		echo $form->input('Category.picture' ,array('type' => 'file'));
		echo $extendedForm->input('Category.site_layout_id');
		

		echo $form->input('Category.cat_type', array('options' => array('Container','Widget Set','Widget','Content'), 'onChange' => "var x=document.getElementById('CategoryCatType');var y=document.getElementById('CategoryWidgetset');var z=document.getElementById('CategoryWidgetId');if(x.value == 0){y.style.display='none';z.style.display='none';}if(x.value == 1){y.style.display='inline';z.style.display='none';}if(x.value == 2){y.style.display='inline';z.style.display='inline';} ;" ));//code javascript baraye hide kardane

		echo $extendedForm->input('Category.widgetset',array('type' => 'select' ,'options' => $widgetList));
		echo $extendedForm->input('Category.widget_id', array('empty' => true    ));

		echo $form->input('Category.metakey');
		echo $form->input('Category.metadesc');
		echo $form->input('Category.description');
		echo $extendedForm->input('Category.publish');
		echo $extendedForm->input('Category.access', array('type' => 'select', 'options' => $options, 'default' => 'Public'));
		 
	?>
<?php echo $form->end('Submit');?>
</div>