<h2><?php  __('Comment');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Comment');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="comments view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $comment['Comment']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Name'); ?></td>
					<td><?php echo $comment['Comment']['name']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Comment'); ?></td>
					<td><?php echo $comment['Comment']['comment']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Reply'); ?></td>
					<td><?php echo $comment['Comment']['reply']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Widget Type'); ?></td>
					<td><?php echo $comment['Comment']['widget_type']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Foreignid'); ?></td>
					<td><?php echo $comment['Comment']['foreignid']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Publish'); ?></td>
					<td><?php echo ($comment['Comment']['publish'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Comment', true), array('action'=>'edit', $comment['Comment']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Comment', true), array('action'=>'delete', $comment['Comment']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $comment['Comment']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Comments', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Comment', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>