<?php echo "<?php \$paginator->options(array('url' => \$this->passedArgs)); ?>\n"; ?>
<table cellpadding="0" cellspacing="0">
<tr id="<?php echo $pluralVar; ?>Sorting">
<?php
	$i = 0;
	foreach ($schema as $field => $properties){
		switch($field){
			case 'password':
			case 'deleted_date':
			case 'deleted':
				break;
			default:
				if($properties['type'] != 'text'){
					$i++;
					echo "<th class=\"{$field}\"><?php echo \$paginator->sort('{$field}');?></th>";
				}
				break;
		}
		if($i > 8){
			break;
		}
	}
?>
	<th class="actions"><?php echo "<?php __('Actions');?>";?></th>
</tr>
<?php
echo "<?php
\$i = 0;
foreach (\${$pluralVar} as \${$singularVar}):
	\$class = null;
	if (\$i++ % 2 == 0) {
		\$class = ' class=\"altrow\"';
	}
?>\n";
	echo "\t<tr<?php echo \$class;?>>\n";
		$i = 0;
		foreach ($schema as $field => $properties) {
			switch($field){
				case 'password':
				case 'deleted_date':
				case 'deleted':
					break;
				default:
					switch($properties['type']){
						case "text":
							break;
						case "boolean":
							$i++;
							echo "\t\t<td class=\"{$field}\">\n\t\t\t<?php echo (\${$singularVar}['{$modelClass}']['{$field}'] == 1) ? __('yes', true) : __('no', true); ?>\n\t\t</td>\n";
							break;
						default:
							$i++;
							$isKey = false;
							if(!empty($associations['belongsTo'])) {
								foreach ($associations['belongsTo'] as $alias => $details) {
									if($field === $details['foreignKey']) {
										$isKey = true;
										echo "\t\t<td class=\"{$field}\">\n\t\t\t<?php echo \$html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller'=> '{$details['controller']}', 'action'=>'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
										break;
									}
								}
							}
							if($isKey !== true) {
								echo "\t\t<td class=\"{$field}\">\n\t\t\t<?php echo \${$singularVar}['{$modelClass}']['{$field}']; ?>\n\t\t</td>\n";
							}
							break;
					}
				break;
			}
			if($i > 8){
				break;
			}
		}

		echo "\t\t<td class=\"actions\">\n";
		echo "\t\t\t<?php\n";
		echo "\t\t\t\tif(\${$singularVar}['{$modelClass}']['deleted'] == 1){\n";
	 	echo "\t\t\t\t\techo \$html->link(\$html->image('admin/undo.gif'), array('action'=>'undelete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('title' => __('Restore', true)), null, false) . \"\\n\";\n";
	 	echo "\t\t\t\t\techo \$html->link(\$html->image('admin/delete.gif'), array('action'=>'hard_delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), \${$singularVar}['{$modelClass}']['{$primaryKey}']), false) . \"\\n\";\n";		
		echo "\t\t\t\t}else{\n";
		echo "\t\t\t\t\techo \$html->link(\$html->image('admin/view.gif'), array('action'=>'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('title' => __('View', true)), null, false) . \"\\n\";\n";
	 	echo "\t\t\t\t\techo \$html->link(\$html->image('admin/edit.gif'), array('action'=>'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('title' => __('Edit', true)), null, false) . \"\\n\";\n";
	 	echo "\t\t\t\t\techo \$html->link(\$html->image('admin/trash.gif'), array('action'=>'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), \${$singularVar}['{$modelClass}']['{$primaryKey}']), false) . \"\\n\";\n";
		echo "\t\t\t\t}\n";
		echo "\t\t\t?>\n";
		echo "\t\t</td>\n";
	echo "\t</tr>\n";

echo "<?php endforeach; ?>\n";
?>
</table>
<div class="paging" id="<?php echo $pluralVar; ?>Paging">
<?php echo "\t<?php echo \$paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>\n";?>
 | <?php echo "\t<?php echo \$paginator->numbers();?>\n"?>
<?php echo "\t<?php echo \$paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>\n";?>
</div>