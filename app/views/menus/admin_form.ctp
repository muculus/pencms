<div class="menus form">
<?php echo $form->create('Menu', array('url' => $form_url));?>
	<?php

		$script = "<script type='text/javascript'>var x=document.getElementById('MenuMenuType');var y=document.getElementById('MenuLink');if(x.value == 0){y.readonly='readonly';}if(x.value == 1){var val=y.value;y.readonly='';y.disabled=''}if(x.value == 2){y.disabled='disabled';y.value='';};</script>";
/*		$javascript->codeBlock($script, $options = array('allowCache'=>true,'safe'=>true,'inline'=>true), true);*/
 		echo $script;

		if($form_action != 'add') echo $extendedForm->input('Menu.id');
		if($form_action != 'edit') echo $extendedForm->input('Menu.parent_id', array('type' => 'select', 'options' => $menus, 'empty' => true ,'selected' => $form_action ));
		echo $extendedForm->input('Menu.title');
		echo $extendedForm->input('Menu.description');
		echo $extendedForm->input('Menu.alias');
		echo $extendedForm->input('Menu.sef');
		echo $extendedForm->input('Menu.publish');

		//if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Menu.category_id', array('empty' => true));
		echo $form->input('Menu.menu_type', array('options' => array('Default','Link','Separator'),'onChange'=>"var x=document.getElementById('MenuMenuType');var y=document.getElementById('MenuLink');if(x.value == 0){y.readonly='readonly';y.disabled='';y.value = val}if(x.value == 1){y.readonly='';y.disabled=''}if(x.value == 2){y.disabled='disabled';y.value='';};"));
		echo $extendedForm->input('Menu.menu', array('type' => 'select', 'options' => $menus, 'empty' => true));
		echo $extendedForm->input('Menu.link');
		echo $extendedForm->input('Menu.access', array('type' => 'select', 'options' => $options, 'default' => 'Public'));
		 
	?>
<?php echo $form->end('Submit');?>
</div>