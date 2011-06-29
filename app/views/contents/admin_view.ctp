<h2><?php  __('Content');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Content');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="Contents view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $Content['Content']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Title'); ?></td>
					<td><?php echo $Content['Content']['title']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Content'); ?></td>
					<td><?php echo $Content['Content']['content']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Author'); ?></td>
					<td><?php echo $Content['Content']['author']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Publish'); ?></td>
					<td><?php echo ($Content['Content']['publish'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Modified'); ?></td>
					<td><?php echo $Content['Content']['modified']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created'); ?></td>
					<td><?php echo $Content['Content']['created']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Deleted'); ?></td>
					<td><?php echo ($Content['Content']['deleted'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Image'); ?></td>
					<td><?php echo $Content['Content']['image']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Publishdate'); ?></td>
					<td><?php echo $Content['Content']['publishdate']; ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Content', true), array('action'=>'edit', $Content['Content']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Content', true), array('action'=>'delete', $Content['Content']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $Content['Content']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Contents', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Content', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>