<h2><?php  __('Position');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Position');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="positions view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $position['Position']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Template Id'); ?></td>
					<td><?php echo $position['Position']['template_id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Site Layout'); ?></td>
					<td><?php echo $html->link($position['SiteLayout']['name'], array('controller'=> 'site_layouts', 'action'=>'view', $position['SiteLayout']['id'])); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Name'); ?></td>
					<td><?php echo $position['Position']['name']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Widgets'); ?></td>
					<td><?php echo $position['Position']['widgets']; ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Position', true), array('action'=>'edit', $position['Position']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Position', true), array('action'=>'delete', $position['Position']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $position['Position']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Positions', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Position', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>