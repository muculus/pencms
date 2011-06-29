<h2><?php echo "<?php  __('{$pluralHumanName}');?>";?></h2>
<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php echo "<?php __('Overview');?>";?></span></a></li>
		<li><a href="#tab2"><span><?php echo "<?php __('Deleted {$pluralHumanName}');?>";?></span></a></li>
	</ul>
	
	<div id="tab1">
		
		<div class="<?php echo $pluralVar;?> index">
		
			<?php echo "<?php echo \$this->element('datatable', array('controllerPath' => '{$controllerPath}'));?>";?>
		
			<div class="actions">
				<ul>
					<li><?php echo "<?php echo \$html->link(__('New {$singularHumanName}', true), array('action'=>'add'), array('class' => 'add')); ?>";?></li>
				</ul>
			</div>
		</div>
	</div>
	
	<div id="tab2">
		
		<div class="<?php echo $pluralVar;?> deleted">
		
			<?php echo "<?php echo \$this->element('datatable', array('controllerPath' => '{$controllerPath}', 'idName' => '{$pluralVar}Deleted', 'filters' => array('deleted' => '1')));?>";?>
		
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>