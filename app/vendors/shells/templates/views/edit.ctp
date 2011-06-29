<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php echo "<?php __('Edit {$singularHumanName}');?>";?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#<?php echo $singularVar; ?>Form').load(<?php echo "'<?php echo \$html->url(array('controller'=>'{$controllerPath}','action'=>'form', 'edit', \$id));?>','#{$singularVar}Form'"; ?>);
			});
		</script>
		<div id="<?php echo $singularVar; ?>Form"></div>
		<div class="actions">
			<ul>
				<li><?php echo "<?php echo \$html->link(__('Delete', true), array('action'=>'delete', \$form->value('{$modelClass}.{$primaryKey}')), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), \$form->value('{$modelClass}.{$primaryKey}'))); ?>";?></li>
				<li><?php echo "<?php echo \$html->link(__('List {$pluralHumanName}', true), array('action'=>'index'), array('class' => 'index'));?>";?></li>
		<?php
			/*
				$done = array();
				foreach ($associations as $type => $data) {
					foreach($data as $alias => $details) {
						if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
							echo "\t\t<li><?php echo \$html->link(__('List ".Inflector::humanize($details['controller'])."', true), array('controller'=> '{$details['controller']}', 'action'=>'index')); ?> </li>\n";
							echo "\t\t<li><?php echo \$html->link(__('New ".Inflector::humanize(Inflector::underscore($alias))."', true), array('controller'=> '{$details['controller']}', 'action'=>'add')); ?> </li>\n";
							$done[] = $details['controller'];
						}
					}
				}
			*/
		?>
			</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>