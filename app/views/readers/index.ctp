<h2><?php  __('Readers');?></h2>
<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Overview');?></span></a></li>
		<li><a href="#tab2"><span><?php __('Deleted Readers');?></span></a></li>
	</ul>
	
	<div id="tab1">
		
		<div class="readers index">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'readers'));?>		
			<div class="actions">
				<ul>
					<li><?php echo $html->link(__('New Reader', true), array('action'=>'add'), array('class' => 'add')); ?></li>
				</ul>
			</div>
		</div>
	</div>
	
	<div id="tab2">
		
		<div class="readers deleted">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'readers', 'idName' => 'readersDeleted', 'filters' => array('deleted' => '1')));?>		
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>