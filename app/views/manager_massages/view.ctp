<h2><?php  __('ManagerMassage');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('ManagerMassage');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="managerMassages view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $managerMassage['ManagerMassage']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Manager'); ?></td>
					<td><?php echo $html->link($managerMassage['Manager']['id'], array('controller'=> 'managers', 'action'=>'view', $managerMassage['Manager']['id'])); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Question'); ?></td>
					<td><?php echo $managerMassage['ManagerMassage']['question']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Answer'); ?></td>
					<td><?php echo $managerMassage['ManagerMassage']['answer']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created'); ?></td>
					<td><?php echo $managerMassage['ManagerMassage']['created']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Publish'); ?></td>
					<td><?php echo ($managerMassage['ManagerMassage']['publish'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Code'); ?></td>
					<td><?php echo $managerMassage['ManagerMassage']['code']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Modified'); ?></td>
					<td><?php echo $managerMassage['ManagerMassage']['modified']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created By'); ?></td>
					<td><?php echo $managerMassage['ManagerMassage']['created_by']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Modified By'); ?></td>
					<td><?php echo $managerMassage['ManagerMassage']['modified_by']; ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit ManagerMassage', true), array('action'=>'edit', $managerMassage['ManagerMassage']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete ManagerMassage', true), array('action'=>'delete', $managerMassage['ManagerMassage']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $managerMassage['ManagerMassage']['id'])); ?> </li>
				<li><?php echo $html->link(__('List ManagerMassages', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New ManagerMassage', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>