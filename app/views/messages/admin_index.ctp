<h2><?php  __('Messages');?></h2>
<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Overview');?></span></a></li>
		<li><a href="#tab2"><span><?php __('Deleted Messages');?></span></a></li>
	</ul>
	
	<div id="tab1">
		
		<div class="messages index">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'messages', 'filters' => array('widget_id'=> $cat_id )));?>		
			<div class="actions">
				<ul>
					<li><?php if($this->params['pass']){ echo $html->link(__('New message', true), array('action'=>'add',$cat_id), array('class' => 'add bottom')); }?></li>
				</ul>
			</div>
		</div>
	</div>
	
	<div id="tab2">
		
		<div class="messages deleted">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'messages', 'idName' => 'messagesDeleted', 'filters' => array('deleted' => '1')));?>		
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>