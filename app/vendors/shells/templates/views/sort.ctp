<div id="<?php echo $pluralVar; ?>List">
	<div id="<?php echo $pluralVar; ?>ListLoading" class="loading" style="display: none;"><?php echo "<?php echo \$html->image('ajax-loader.gif'); ?>";?></div>
	<ul id="<?php echo $pluralVar; ?>ListOrder" class="sortlist">
	<?php echo "<?php foreach (\${$pluralVar} as \${$singularVar}):?>\n";
		echo "\t\t<li id=\"{$pluralVar}ListOrder_<?php echo \${$singularVar}['{$modelClass}']['id'];?>\">\n";
		foreach ($schema as $field => $properties) {
			$isKey = false;
			if(!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $alias => $details) {
					if($field === $details['foreignKey']) {
						$isKey = true;
						echo "\t\t\t<div>\n";
						echo "\t\t\t\t<?php __('".Inflector::humanize(Inflector::underscore($alias))."'); ?>:\n";
						echo "\t\t\t\t<?php echo \$html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller'=> '{$details['controller']}', 'action'=>'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n";
						echo "\t\t\t</div>\n";
						break;
					}
				}
			}
			if($isKey !== true) {
				echo "\t\t\t<div>\n";
				if($field == 'parent_id'){
					echo "\t\t\t\t<?php __('Parent ".$singularHumanName."'); ?>:\n";
					echo "\t\t\t\t<?php echo \$html->link(\${$singularVar}['{$modelClass}']['{$field}'], array('controller' => '{$controllerPath}', 'action' => 'view', \${$singularVar}['{$modelClass}']['{$field}'])); ?>\n";
				}else{
					echo "\t\t\t\t<?php __('".Inflector::humanize($field)."'); ?>:\n";
					switch($properties['type']){
						case 'boolean':
							echo "\t\t\t\t<?php echo (\${$singularVar}['{$modelClass}']['{$field}'] == 1) ? __('yes', true) : __('no', true); ?>\n";
							break;
						default:
							echo "\t\t\t\t<?php echo \${$singularVar}['{$modelClass}']['{$field}']; ?>\n";
							break;
					}
				}
				echo "\t\t\t</div>\n";
			}
		}
		echo "\t\t\t<div class=\"actions\">\n";
		echo "\t\t\t\t<?php \n";
		echo "\t\t\t\t\t\tif(\${$singularVar}['{$modelClass}']['deleted'] == 1)\n";
		echo "\t\t\t\t\t\t{\n";
		echo "\t\t\t\t\t\t\techo \$html->link(__('Restore {$singularHumanName}', true), array('action'=>'undelete', \${$singularVar}['{$modelClass}']['id']), array('class' => 'undelete')) . \"\\n\";\n";
		echo "\t\t\t\t\t\t\techo \$html->link(__('Delete {$singularHumanName}', true), array('action'=>'hard_delete', \${$singularVar}['{$modelClass}']['id']), array('class' => 'hard_delete'), sprintf(__('Are you sure you want to delete # %s?', true), \${$singularVar}['{$modelClass}']['id'])) . \"\\n\";\n";			
		echo "\t\t\t\t\t\t}\n";
		echo "\t\t\t\t\t\telse\n";
		echo "\t\t\t\t\t\t{\n";
		echo "\t\t\t\t\t\t\techo \$html->link(__('View {$singularHumanName}', true), array('action'=>'view', \${$singularVar}['{$modelClass}']['id']), array('class' => 'view')) . \"\\n\";\n";
		echo "\t\t\t\t\t\t\techo \$html->link(__('Edit {$singularHumanName}', true), array('action'=>'edit', \${$singularVar}['{$modelClass}']['id']), array('class' => 'edit')) . \"\\n\";\n";
		echo "\t\t\t\t\t\t\techo \$html->link(__('Delete {$singularHumanName}', true), array('action'=>'delete', \${$singularVar}['{$modelClass}']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), \${$singularVar}['{$modelClass}']['id'])) . \"\\n\";\n";
		echo "\t\t\t\t\t\t}\n";
		echo "\t\t\t\t?>\n";
		echo "\t\t\t</div>\n";
		echo "\t\t</li>\n";
		echo "\t<?php endforeach;?>\n";
	?>
	</ul>
	<script type="text/javascript">
		  $(document).ready(function(){
		    $("#<?php echo $pluralVar; ?>ListOrder").sortable({update: function(event, ui){
		    	$.ajax({
		    		url: '<?php echo "<?php echo \$html->url('/admin/{$controllerPath}/sort');?>";?>',
		    		type: 'POST',
		    		data: $("#<?php echo $pluralVar; ?>ListOrder").sortable("serialize")
		    	});
		    }});
		  });
	</script>
</div>