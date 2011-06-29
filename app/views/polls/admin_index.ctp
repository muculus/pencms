<h2><?php  __('Polls');?></h2>
<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Overview');?></span></a></li>
		<li><a href="#tab2"><span><?php __('Deleted Polls');?></span></a></li>
	</ul>
	
	<div id="tab1">
		
		<div class="polls index">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'polls', 'filters' => $this->passedArgs));?>		
			<div class="actions">
				<ul>
					<li><?php  echo $html->link(__('New poll', true), array('action'=>'add',$cat_id), array('class' => 'add bottom')); ?></li>
				</ul>
			</div>
		</div>
	</div>
	
	<div id="tab2">
		
		<div class="polls deleted">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'polls', 'idName' => 'pollsDeleted', 'filters' => array('deleted' => '1')));?>		
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>