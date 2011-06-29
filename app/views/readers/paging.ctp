<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0">
<tr id="readersSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="url"><?php echo $paginator->sort('url');?></th><th class="number"><?php echo $paginator->sort('number');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($readers as $reader):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $reader['Reader']['id']; ?>
		</td>
		<td class="url">
			<?php echo $reader['Reader']['url']; ?>
		</td>
		<td class="number">
			<?php echo $reader['Reader']['number']; ?>
		</td>
		<td class="actions">
			<?php
				if($reader['Reader']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $reader['Reader']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $reader['Reader']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $reader['Reader']['id']), false) . "\n";
				}else{
					echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $reader['Reader']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $reader['Reader']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $reader['Reader']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $reader['Reader']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="readersPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>