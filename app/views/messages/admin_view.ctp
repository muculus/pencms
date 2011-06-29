<h2><?php  __('Message');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Message');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="messages view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $message['Message']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Title'); ?></td>
					<td><?php echo $message['Message']['title']; ?>&nbsp;</td>
				</tr>
				
				<tr>
					<td><?php __('Publish'); ?></td>
					<td><?php echo ($message['Message']['publish'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created'); ?></td>
					<td><?php echo $message['Message']['created']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Modified'); ?></td>
					<td><?php echo $message['Message']['modified']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('End Date'); ?></td>
					<td><?php echo $message['Message']['end_date']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Archive'); ?></td>
					<td><?php echo ($message['Message']['archive'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Message', true), array('action'=>'edit', $message['Message']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Message', true), array('action'=>'delete', $message['Message']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $message['Message']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Messages', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Message', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>