<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr id="positionsSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="template_id"><?php echo $paginator->sort('template_id');?></th><th class="site_layout_id"><?php echo $paginator->sort('site_layout_id');?></th><th class="name"><?php echo $paginator->sort('name');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($positions as $position):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $position['Position']['id']; ?>
		</td>
		<td class="template_id">
			<?php echo $position['Position']['template_id']; ?>
		</td>
		<td class="site_layout_id">
			<?php echo $html->link($position['SiteLayout']['name'], array('controller'=> 'site_layouts', 'action'=>'view', $position['SiteLayout']['id'])); ?>
		</td>
		<td class="name">
			<?php echo $position['Position']['name']; ?>
		</td>
		<td class="actions">
			<?php
				if($position['Position']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $position['Position']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $position['Position']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $position['Position']['id']), false) . "\n";
				}else{
					//echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $position['Position']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $position['Position']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $position['Position']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $position['Position']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="positionsPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>