<h2><?php  __('Products');?></h2>
<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Overview');?></span></a></li>
		<li><a href="#tab2"><span><?php __('Deleted Products');?></span></a></li>
	</ul>
	
	<div id="tab1">
		
		<div class="products index">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'products','filters' => array('widget_id'=> $cat_id )));?>		
			<div class="actions">
				<ul>
					<li><?php echo $html->link(__('New Product', true), array('action'=>'add',$cat_id), array('class' => 'add bottom')); ?></li>
				</ul>
			</div>
		</div>
	</div>
	
	<div id="tab2">
		
		<div class="products deleted">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'products', 'idName' => 'productsDeleted', 'filters' => array('deleted' => '1')));?>		
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>