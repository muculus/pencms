<h2><?php  __('SiteLayouts');?></h2>
<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Overview');?></span></a></li>
		<li><a href="#tab2"><span><?php __('Deleted SiteLayouts');?></span></a></li>
	</ul>
	
	<div id="tab1">
		
		<div class="siteLayouts index">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'site_layouts'));?>		
			<div class="actions">
				<ul>
					<li><?php echo $html->link(__('New SiteLayout', true), array('action'=>'add'), array('class' => 'add bottom')); ?></li>
				</ul>
			</div>
		</div>
	</div>
	
	<div id="tab2">
		
		<div class="siteLayouts deleted">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'site_layouts', 'idName' => 'siteLayoutsDeleted', 'filters' => array('deleted' => '1')));?>		
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>