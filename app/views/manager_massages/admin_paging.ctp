<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr id="managerMassagesSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="manager_id"><?php echo $paginator->sort('manager_id');?></th><th class="created"><?php echo $paginator->sort('created');?></th><th class="code"><?php echo $paginator->sort('code');?></th><th class="publish"><?php echo $paginator->sort('publish');?></th>	<th class="status"><?php echo $paginator->sort('status');?></th><th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($managerMassages as $managerMassage):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $managerMassage['ManagerMassage']['id']; ?>
		</td>
		<td class="manager_id">
			<?php echo $html->link($managerMassage['Manager']['name'], array('controller'=> 'managers', 'action'=>'view', $managerMassage['Manager']['id'])); ?>
		</td>
		<td class="created">
			<?php echo $managerMassage['ManagerMassage']['created']; ?>
		</td>
		<td class="code">
			<?php echo $managerMassage['ManagerMassage']['code']; ?>
		</td>
		<td class="publish">
			<?php echo ($managerMassage['ManagerMassage']['publish'] == 1) ? __('yes', true) : __('no', true); ?>
		</td>
		<td class="status">
			<?php echo ($managerMassage['ManagerMassage']['status'] == 1) ? __('yes', true) : __('no', true); ?>
		</td>
		<td class="actions">
			<?php
				if($managerMassage['ManagerMassage']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $managerMassage['ManagerMassage']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $managerMassage['ManagerMassage']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $managerMassage['ManagerMassage']['id']), false) . "\n";
				}else{
					//echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $managerMassage['ManagerMassage']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $managerMassage['ManagerMassage']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $managerMassage['ManagerMassage']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $managerMassage['ManagerMassage']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="managerMassagesPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>