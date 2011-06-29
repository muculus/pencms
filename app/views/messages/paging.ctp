<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0">
<tr id="messagesSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="title"><?php echo $paginator->sort('title');?></th><th class="category_id"><?php echo $paginator->sort('category_id');?></th><th class="publish"><?php echo $paginator->sort('publish');?></th><th class="created"><?php echo $paginator->sort('created');?></th><th class="modified"><?php echo $paginator->sort('modified');?></th><th class="end_date"><?php echo $paginator->sort('end_date');?></th><th class="archive"><?php echo $paginator->sort('archive');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($messages as $message):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $message['Message']['id']; ?>
		</td>
		<td class="title">
			<?php echo $message['Message']['title']; ?>
		</td>
		<td class="category_id">
			<?php echo $html->link($message['Category']['title'], array('controller'=> 'categories', 'action'=>'view', $message['Category']['id'])); ?>
		</td>
		<td class="publish">
			<?php echo ($message['Message']['publish'] == 1) ? __('yes', true) : __('no', true); ?>
		</td>
		<td class="created">
			<?php echo $message['Message']['created']; ?>
		</td>
		<td class="modified">
			<?php echo $message['Message']['modified']; ?>
		</td>
		<td class="end_date">
			<?php echo $message['Message']['end_date']; ?>
		</td>
		<td class="archive">
			<?php echo ($message['Message']['archive'] == 1) ? __('yes', true) : __('no', true); ?>
		</td>
		<td class="actions">
			<?php
				if($message['Message']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $message['Message']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $message['Message']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $message['Message']['id']), false) . "\n";
				}else{
					echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $message['Message']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $message['Message']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $message['Message']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $message['Message']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="messagesPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>