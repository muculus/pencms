<h2><?php  __('Reader');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Reader');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="readers view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $reader['Reader']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Url'); ?></td>
					<td><?php echo $reader['Reader']['url']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Number'); ?></td>
					<td><?php echo $reader['Reader']['number']; ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Reader', true), array('action'=>'edit', $reader['Reader']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Reader', true), array('action'=>'delete', $reader['Reader']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $reader['Reader']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Readers', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Reader', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>