<h2><?php  __('ManagerMassages');?></h2>
<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Overview');?></span></a></li>
		<li><a href="#tab2"><span><?php __('Deleted ManagerMassages');?></span></a></li>
	</ul>
	
	<div id="tab1">
		
		<div class="managerMassages index">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'manager_massages', 'filters' => array('widget_id'=> $cat_id )));?>		
			<div class="actions">
				<ul>
					<li><?php if($this->params['pass']){ echo $html->link(__('New ManagerMassage', true), array('action'=>'add',$cat_id), array('class' => 'add')); }?></li>
				</ul>
			</div>
		</div>
	</div>
	
	<div id="tab2">
		
		<div class="managerMassages deleted">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'manager_massages', 'idName' => 'managerMassagesDeleted', 'filters' => array('deleted' => '1')));?>		
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>