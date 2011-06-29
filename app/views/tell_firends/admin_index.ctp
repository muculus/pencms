<h2><?php  __('TellFirends');?></h2>
<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Overview');?></span></a></li>
		<li><a href="#tab2"><span><?php __('Deleted TellFirends');?></span></a></li>
	</ul>
	
	<div id="tab1">
		
		<div class="tellFirends index">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'tell_firends'));?>		
			<div class="actions">
				<ul>
					<li><?php echo $html->link(__('New TellFirend', true), array('action'=>'add'), array('class' => 'add')); ?></li>
				</ul>
			</div>
		</div>
	</div>
	
	<div id="tab2">
		
		<div class="tellFirends deleted">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'tell_firends', 'idName' => 'tellFirendsDeleted', 'filters' => array('deleted' => '1')));?>		
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>