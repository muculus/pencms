<h2><?php  __('Managers');?></h2>
<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Overview');?></span></a></li>
		<li><a href="#tab2"><span><?php __('Deleted Managers');?></span></a></li>
	</ul>
	
	<div id="tab1">
		
		<div class="managers index">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'managers'));?>		
			<div class="actions">
				<ul>
					<li><?php echo $html->link(__('New Manager', true), array('action'=>'add'), array('class' => 'add')); ?></li>
				</ul>
			</div>
		</div>
	</div>
	
	<div id="tab2">
		
		<div class="managers deleted">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'managers', 'idName' => 'managersDeleted', 'filters' => array('deleted' => '1')));?>		
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>