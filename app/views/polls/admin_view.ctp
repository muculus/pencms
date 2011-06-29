<h2><?php  __('Poll');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Poll');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="polls view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $poll['Poll']['id']; ?>&nbsp;</td>
				</tr>
				
				<tr>
					<td><?php __('Title'); ?></td>
					<td><?php echo $poll['Poll']['title']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Alias'); ?></td>
					<td><?php echo $poll['Poll']['alias']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Hits'); ?></td>
					<td><?php echo $poll['Poll']['hits']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Publish'); ?></td>
					<td><?php echo ($poll['Poll']['publish'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Date'); ?></td>
					<td><?php echo $poll['Poll']['date']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Ip'); ?></td>
					<td><?php echo $poll['Poll']['ip']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created'); ?></td>
					<td><?php echo $poll['Poll']['created']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Modified'); ?></td>
					<td><?php echo $poll['Poll']['modified']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created By'); ?></td>
					<td><?php echo $poll['Poll']['created_by']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Modified By'); ?></td>
					<td><?php echo $poll['Poll']['modified_by']; ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Poll', true), array('action'=>'edit', $poll['Poll']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Poll', true), array('action'=>'delete', $poll['Poll']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $poll['Poll']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Polls', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Poll', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>