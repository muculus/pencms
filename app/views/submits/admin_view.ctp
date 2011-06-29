<h2><?php  __('Submit');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Submit');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="submits view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $submit['Submit']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('User'); ?></td>
					<td><?php echo $html->link($submit['User']['id'], array('controller'=> 'users', 'action'=>'view', $submit['User']['id'])); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Widget'); ?></td>
					<td><?php echo $html->link($submit['Widget']['name'], array('controller'=> 'widgets', 'action'=>'view', $submit['Widget']['id'])); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Subject'); ?></td>
					<td><?php echo $submit['Submit']['subject']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Title'); ?></td>
					<td><?php echo $submit['Submit']['title']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Source'); ?></td>
					<td><?php echo $submit['Submit']['source']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Description'); ?></td>
					<td><?php echo $submit['Submit']['description']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('File'); ?></td>
					<td><?php echo $submit['Submit']['file']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('File Dir'); ?></td>
					<td><?php echo $submit['Submit']['file_dir']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('File Filesize'); ?></td>
					<td><?php echo $submit['Submit']['file_filesize']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created'); ?></td>
					<td><?php echo $submit['Submit']['created']; ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Submit', true), array('action'=>'edit', $submit['Submit']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Submit', true), array('action'=>'delete', $submit['Submit']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $submit['Submit']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Submits', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Submit', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>