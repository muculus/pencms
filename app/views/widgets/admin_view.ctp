<h2><?php  __('Widget');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Widget');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="widgets view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $widget['Widget']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Name'); ?></td>
					<td><?php echo $widget['Widget']['name']; ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Widget', true), array('action'=>'edit', $widget['Widget']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Widget', true), array('action'=>'delete', $widget['Widget']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $widget['Widget']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Widgets', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Widget', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>