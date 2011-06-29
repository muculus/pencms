<h2><?php  __('User');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('User');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="users view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $user['User']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created'); ?></td>
					<td><?php echo $user['User']['created']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Modified'); ?></td>
					<td><?php echo $user['User']['modified']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Deleted Date'); ?></td>
					<td><?php echo $user['User']['deleted_date']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Deleted'); ?></td>
					<td><?php echo ($user['User']['deleted'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Group'); ?></td>
					<td><?php echo $html->link($user['Group']['name'], array('controller'=> 'groups', 'action'=>'view', $user['Group']['id'])); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Firstname'); ?></td>
					<td><?php echo $user['User']['firstname']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Lastname'); ?></td>
					<td><?php echo $user['User']['lastname']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Email'); ?></td>
					<td><?php echo $user['User']['email']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Password'); ?></td>
					<td><?php echo $user['User']['password']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Active'); ?></td>
					<td><?php echo ($user['User']['active'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit User', true), array('action'=>'edit', $user['User']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete User', true), array('action'=>'delete', $user['User']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Users', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New User', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>