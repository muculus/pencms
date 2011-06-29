<h2><?php  __('XmlReaders');?></h2>
<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Overview');?></span></a></li>
		<li><a href="#tab2"><span><?php __('Deleted XmlReaders');?></span></a></li>
	</ul>
	
	<div id="tab1">
		
		<div class="xmlReaders index">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'xml_readers'));?>		
			<div class="actions">
				<ul>
					<li><?php echo $html->link(__('New XmlReader', true), array('action'=>'add'), array('class' => 'add')); ?></li>
				</ul>
			</div>
		</div>
	</div>
	
	<div id="tab2">
		
		<div class="xmlReaders deleted">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'xml_readers', 'idName' => 'xmlReadersDeleted', 'filters' => array('deleted' => '1')));?>		
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>