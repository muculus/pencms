<h2><?php  __('Managers');?></h2>
<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Overview');?></span></a></li>
		<li><a href="#tab2"><span><?php __('Deleted Managers');?></span></a></li>
	</ul>
	
	<div id="tab1">
		
		<div class="managers index">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'managers', 'filters' => array('widget_id'=> $cat_id )));?>		
			<div class="actions">
				<ul>
					<li><?php if($this->params['pass']){ echo $html->link(__('New Manager', true), array('action'=>'add',$cat_id), array('class' => 'add')); }?></li>
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