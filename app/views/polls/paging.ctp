<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0">
<tr id="pollsSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="widget_id"><?php echo $paginator->sort('widget_id');?></th><th class="title"><?php echo $paginator->sort('title');?></th><th class="alias"><?php echo $paginator->sort('alias');?></th><th class="hits"><?php echo $paginator->sort('hits');?></th><th class="publish"><?php echo $paginator->sort('publish');?></th><th class="date"><?php echo $paginator->sort('date');?></th><th class="ip"><?php echo $paginator->sort('ip');?></th><th class="created"><?php echo $paginator->sort('created');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($polls as $poll):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $poll['Poll']['id']; ?>
		</td>
		<td class="widget_id">
			<?php echo $html->link($poll['Widget']['name'], array('controller'=> 'widgets', 'action'=>'view', $poll['Widget']['id'])); ?>
		</td>
		<td class="title">
			<?php echo $poll['Poll']['title']; ?>
		</td>
		<td class="alias">
			<?php echo $poll['Poll']['alias']; ?>
		</td>
		<td class="hits">
			<?php echo $poll['Poll']['hits']; ?>
		</td>
		<td class="publish">
			<?php echo ($poll['Poll']['publish'] == 1) ? __('yes', true) : __('no', true); ?>
		</td>
		<td class="date">
			<?php echo $poll['Poll']['date']; ?>
		</td>
		<td class="ip">
			<?php echo $poll['Poll']['ip']; ?>
		</td>
		<td class="created">
			<?php echo $poll['Poll']['created']; ?>
		</td>
		<td class="actions">
			<?php
				if($poll['Poll']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $poll['Poll']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $poll['Poll']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $poll['Poll']['id']), false) . "\n";
				}else{
					echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $poll['Poll']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $poll['Poll']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $poll['Poll']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $poll['Poll']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="pollsPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>