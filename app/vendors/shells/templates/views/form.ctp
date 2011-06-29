<div class="<?php echo $pluralVar;?> form">
<?php echo "<?php echo \$form->create('{$modelClass}', array('url' => \$form_url));?>\n";?>
<?php
		echo "\t<?php\n";
		foreach ($schema as $field => $properties) {
			if (!in_array($field, array('created', 'modified', 'updated', 'lft', 'rght'))) {
				switch($field){
					case 'deleted_date':
					case 'deleted':
					case 'order':
						break;
					case $primaryKey:
						echo "\t\tif(empty(\$form_action) || \$form_action != 'add') echo \$extendedForm->input('{$modelClass}.{$field}');\n";
						break;
					case 'parent_id':
						echo "\t\techo \$extendedForm->input('{$modelClass}.{$field}', array('type' => 'select', 'options' => \${$controllerPath}, 'empty' => true));\n";
						break;
					case 'password':
						echo "\t\techo \$extendedForm->input('{$modelClass}.new_{$field}', array('class' => 'form-item', 'value' => ''));\n";
						break;
					default:
						echo "\t\techo \$extendedForm->input('{$modelClass}.{$field}');\n";
						break;
				}
				//TODO: js validation
				if(!empty($modelObj->validate[$field])){
					if(!empty($modelObj->validate[$field]['rule'])){
						switch($modelObj->validate[$field]['rule']){
							case 'numeric':
								break;
							default:
								break;
						}
					}
				}
			}
		}
		if(!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				echo "\t\techo \$form->input('{$assocName}');\n";
			}
		}
		echo "\t?>\n";
	echo "<?php echo \$form->end('Submit');?>\n";
?>
</div>