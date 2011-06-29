<h2><?php  __('Templates');?></h2>
<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Overview');?></span></a></li>
		<li><a href="#tab2"><span><?php __('Deleted Templates');?></span></a></li>
	</ul>
	
	<div id="tab1">
		
		<div class="templates index">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'templates'));?>		
			<div class="actions">
				<ul>
					<li><?php echo $html->link(__('New Template', true), array('action'=>'add'), array('class' => 'add bottom')); ?></li>
				</ul>
			</div>
		</div>
	</div>
	
	<div id="tab2">
		
		<div class="templates deleted">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'templates', 'idName' => 'templatesDeleted', 'filters' => array('deleted' => '1')));?>		
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>