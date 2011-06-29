<h2><?php  __('Group');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Group');?></span></a></li>
		<li><a href="#tab2"><span><?php  __('Child Groups');?></span></a></li><li><a href="#tab3"><span><?php  __('Related Users');?></span></a></li>
	</ul>
	<div id="tab1">
		<div class="groups view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $group['Group']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created'); ?></td>
					<td><?php echo $group['Group']['created']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Modified'); ?></td>
					<td><?php echo $group['Group']['modified']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Deleted Date'); ?></td>
					<td><?php echo $group['Group']['deleted_date']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Deleted'); ?></td>
					<td><?php echo ($group['Group']['deleted'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Name'); ?></td>
					<td><?php echo $group['Group']['name']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Description'); ?></td>
					<td><?php echo $group['Group']['description']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Parent Group'); ?></td>
					<td><?php echo $html->link($group['Group']['parent_id'], array('controller' => 'groups', 'action' => 'view', $group['Group']['parent_id'])); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Lft'); ?></td>
					<td><?php echo $group['Group']['lft']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Rght'); ?></td>
					<td><?php echo $group['Group']['rght']; ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Group', true), array('action'=>'edit', $group['Group']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Group', true), array('action'=>'delete', $group['Group']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $group['Group']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Groups', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Group', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	
	<div id="tab2">
		<div class="related">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'groups', 'filters' => array('parent_id'=>$group['Group']['id'])));?>			
			<script type="text/javascript">
				$(document).ready(function() {
					$('#groupForm').load('<?php echo $html->url(array('controller'=>'groups','action'=>'form','add','parent_id'=>$group['Group']['id']));?>');
				});
			</script>
			
			<div id="groupForm"></div>
		</div>
	</div>
			<div id="tab3">
			<div class="related">
			
				<?php if (!empty($group['User'])):?>
				<?php echo $this->element('datatable', array('controllerPath' => 'users', 'filters' => array('group_id'=>$group['Group']['id'])));?>
				<?php endif; ?>
				<script type="text/javascript">
					$(document).ready(function() {
						$('#userForm').load('<?php echo $html->url(array('controller'=>'users','action'=>'form','add','group_id'=>$group['Group']['id']));?>');
					});
				</script>
				
				<h3><?php __('Add User');?></h3>
				
				<div id="userForm"></div>
			</div>
		</div>
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>