<h2><?php  __('Positions');?></h2>
<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Overview');?></span></a></li>
		<li><a href="#tab2"><span><?php __('Deleted Positions');?></span></a></li>
	</ul>
	
	<div id="tab1">
		
		<div class="positions index">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'positions'));?>		
			<div class="actions">
				<ul>
					<li><?php echo $html->link(__('New Position', true), array('action'=>'add'), array('class' => 'add bottom')); ?></li>
				</ul>
			</div>
		</div>
	</div>
	
	<div id="tab2">
		
		<div class="positions deleted">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'positions', 'idName' => 'positionsDeleted', 'filters' => array('deleted' => '1')));?>		
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>