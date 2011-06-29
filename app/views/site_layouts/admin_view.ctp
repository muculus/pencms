<h2><?php  __('SiteLayout');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('SiteLayout');?></span></a></li>
		<li><a href="#tab2"><span><?php  __('Related Categories');?></span></a></li><li><a href="#tab3"><span><?php  __('Related Positions');?></span></a></li>
	</ul>
	<div id="tab1">
		<div class="siteLayouts view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $siteLayout['SiteLayout']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Template'); ?></td>
					<td><?php echo $html->link($siteLayout['Template']['name'], array('controller'=> 'templates', 'action'=>'view', $siteLayout['Template']['id'])); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Name'); ?></td>
					<td><?php echo $siteLayout['SiteLayout']['name']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Publish'); ?></td>
					<td><?php echo ($siteLayout['SiteLayout']['publish'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit SiteLayout', true), array('action'=>'edit', $siteLayout['SiteLayout']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete SiteLayout', true), array('action'=>'delete', $siteLayout['SiteLayout']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $siteLayout['SiteLayout']['id'])); ?> </li>
				<li><?php echo $html->link(__('List SiteLayouts', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New SiteLayout', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
			<div id="tab2">
			<div class="related">
			
				<?php if (!empty($siteLayout['Category'])):?>
				<?php echo $this->element('datatable', array('controllerPath' => 'categories', 'filters' => array('site_layout_id'=>$siteLayout['SiteLayout']['id'])));?>
				<?php endif; ?>
				<script type="text/javascript">
					$(document).ready(function() {
						$('#categoryForm').load('<?php echo $html->url(array('controller'=>'categories','action'=>'form','add','site_layout_id'=>$siteLayout['SiteLayout']['id']));?>');
					});
				</script>
				
				<h3><?php __('Add Category');?></h3>
				
				<div id="categoryForm"></div>
			</div>
		</div>
			<div id="tab3">
			<div class="related">
			
				<?php if (!empty($siteLayout['Position'])):?>
				<?php echo $this->element('datatable', array('controllerPath' => 'positions', 'filters' => array('site_layout_id'=>$siteLayout['SiteLayout']['id'])));?>
				<?php endif; ?>
				<script type="text/javascript">
					$(document).ready(function() {
						$('#positionForm').load('<?php echo $html->url(array('controller'=>'positions','action'=>'form','add','site_layout_id'=>$siteLayout['SiteLayout']['id']));?>');
					});
				</script>
				
				<h3><?php __('Add Position');?></h3>
				
				<div id="positionForm"></div>
			</div>
		</div>
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>