<h2><?php echo "<?php  __('{$singularHumanName}');?>";?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php echo "<?php  __('{$singularHumanName}');?>";?></span></a></li>
		<?php
			$tabcounter = 1;
			//children
			if($modelObj->hasField('parent_id')){
				$tabcounter++;
				echo '<li><a href="#tab'.$tabcounter.'"><span>';
				echo "<?php  __('Child ".$pluralHumanName."');?>";
				echo '</span></a></li>';
			}
			//associations
			if(!empty($associations['hasOne'])){
				foreach ($associations['hasOne'] as $alias => $details){
					$tabcounter++;
					echo '<li><a href="#tab'.$tabcounter.'"><span>';
					echo "<?php  __('Related ".Inflector::humanize($details['controller'])."');?>";
					echo '</span></a></li>';
				}
			}
			if(empty($associations['hasMany'])) {
				$associations['hasMany'] = array();
			}
			if(empty($associations['hasAndBelongsToMany'])) {
				$associations['hasAndBelongsToMany'] = array();
			}
			$relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']);
			foreach ($relations as $alias => $details){
				$tabcounter++;
				echo '<li><a href="#tab'.$tabcounter.'"><span>';
				echo "<?php  __('Related ".Inflector::humanize($details['controller'])."');?>";
				echo '</span></a></li>';
			}
			echo "\n";
		?>
	</ul>
	<div id="tab1">
		<div class="<?php echo $pluralVar;?> view">
			<table class="properties"><?php
		echo "\n";
		foreach ($schema as $field => $properties) {
			$isKey = false;
			if(!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $alias => $details) {
					if($field === $details['foreignKey']) {
						$isKey = true;
						echo "\t\t\t\t<tr>\n";
						echo "\t\t\t\t\t<td><?php __('".Inflector::humanize(Inflector::underscore($alias))."'); ?></td>\n";
						echo "\t\t\t\t\t<td><?php echo \$html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller'=> '{$details['controller']}', 'action'=>'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>&nbsp;</td>\n";
						echo "\t\t\t\t</tr>\n";
						break;
					}
				}
			}
			if($isKey !== true) {
				echo "\t\t\t\t<tr>\n";
				if($field == 'parent_id'){
					echo "\t\t\t\t\t<td><?php __('Parent ".$singularHumanName."'); ?></td>\n";
					echo "\t\t\t\t\t<td><?php echo \$html->link(\${$singularVar}['{$modelClass}']['{$field}'], array('controller' => '{$controllerPath}', 'action' => 'view', \${$singularVar}['{$modelClass}']['{$field}'])); ?>&nbsp;</td>\n";
				}else{
					echo "\t\t\t\t\t<td><?php __('".Inflector::humanize($field)."'); ?></td>\n";
					switch($properties['type']){
						case 'boolean':
							echo "\t\t\t\t\t<td><?php echo (\${$singularVar}['{$modelClass}']['{$field}'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>\n";
							break;
						default:
							echo "\t\t\t\t\t<td><?php echo \${$singularVar}['{$modelClass}']['{$field}']; ?>&nbsp;</td>\n";
							break;
					}
				}
				echo "\t\t\t\t</tr>\n";
			}
		}
		?>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul><?php
				echo "\n";
				echo "\t\t\t\t<li><?php echo \$html->link(__('Edit {$singularHumanName}', true), array('action'=>'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'edit')); ?> </li>\n";
				echo "\t\t\t\t<li><?php echo \$html->link(__('Delete {$singularHumanName}', true), array('action'=>'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?> </li>\n";
				echo "\t\t\t\t<li><?php echo \$html->link(__('List {$pluralHumanName}', true), array('action'=>'index'), array('class' => 'index')); ?> </li>\n";
				echo "\t\t\t\t<li><?php echo \$html->link(__('New {$singularHumanName}', true), array('action'=>'add'), array('class' => 'add')); ?> </li>\n";
			?>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		<?php echo "\n";?>
	</div>
	
	<?php
	$tabcounter = 1;
	//children
	if($modelObj->hasField('parent_id')){
		echo "\n";
	?>
	<div id="tab<?php echo ++$tabcounter;?>">
		<div class="related">
		
			<?php echo "<?php echo \$this->element('datatable', array('controllerPath' => '{$controllerPath}', 'filters' => array('parent_id'=>\${$singularVar}['{$modelClass}']['{$primaryKey}'])));?>";?>
			
			<script type="text/javascript">
				$(document).ready(function() {
					$('#<?php echo $singularVar; ?>Form').load('<?php echo "<?php echo \$html->url(array('controller'=>'{$controllerPath}','action'=>'form','add','parent_id'=>\${$singularVar}['{$modelClass}']['{$primaryKey}']));?>');\n"; ?>
				});
			</script>
			
			<div id="<?php echo $singularVar; ?>Form"></div>
		</div>
	</div>
	<?php
	}
	if(!empty($associations['hasOne'])) :
		foreach ($associations['hasOne'] as $alias => $details): ?>
		<div id="tab<?php echo ++$tabcounter;?>">
			<div class="related">
			<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])):?>\n";?>
				<dl><?php echo "\t<?php \$i = 0; \$class = ' class=\"altrow\"';?>\n";?>
			<?php
					foreach ($details['fields'] as $field) {
						echo "\t\t<dt<?php if (\$i % 2 == 0) echo \$class;?>><?php __('".Inflector::humanize($field)."');?></dt>\n";
						echo "\t\t<dd<?php if (\$i++ % 2 == 0) echo \$class;?>>\n\t<?php echo \${$singularVar}['{$alias}']['{$field}'];?>\n&nbsp;</dd>\n";
					}
			?>
				</dl>
			<?php echo "<?php endif; ?>\n";?>
				<div class="actions">
					<ul>
						<li><?php echo "<?php echo \$html->link(__('Edit ".Inflector::humanize(Inflector::underscore($alias))."', true), array('controller'=> '{$details['controller']}', 'action'=>'edit', \${$singularVar}['{$alias}']['{$details['primaryKey']}']), array('class' => 'edit'); ?></li>\n";?>
					</ul>
				</div>
			</div>
		</div>
		<?php
		endforeach;
	endif;
	$i = 0;
	foreach ($relations as $alias => $details):
		$foreignKeyName = Inflector::underscore($modelClass) . '_id';
		$otherSingularVar = Inflector::variable($alias);
		$otherPluralVar = Inflector::variable($details['controller']);
		$otherSingularHumanName = Inflector::humanize(Inflector::underscore($otherSingularVar));
		$otherPluralHumanName = Inflector::humanize($details['controller']);
		?>
		<div id="tab<?php echo ++$tabcounter;?>">
			<div class="related">
			
				<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])):?>\n";?>
				<?php echo "<?php echo \$this->element('datatable', array('controllerPath' => '{$details['controller']}', 'filters' => array('{$foreignKeyName}'=>\${$singularVar}['{$modelClass}']['{$primaryKey}'])));?>\n";?>
				<?php echo "<?php endif; ?>\n";?>
				<script type="text/javascript">
					$(document).ready(function() {
						$('#<?php echo $otherSingularVar; ?>Form').load('<?php echo "<?php echo \$html->url(array('controller'=>'{$details['controller']}','action'=>'form','add','{$foreignKeyName}'=>\${$singularVar}['{$modelClass}']['{$primaryKey}']));?>');\n"; ?>
					});
				</script>
				
				<h3><?php echo "<?php __('Add {$otherSingularHumanName}');?>"; ?></h3>
				
				<div id="<?php echo $otherSingularVar; ?>Form"></div>
			</div>
		</div>
	<?php endforeach;?>
</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>