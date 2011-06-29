<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0">
<tr id="commentsSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="name"><?php echo $paginator->sort('name');?></th><th class="widget_type"><?php echo $paginator->sort('widget_type');?></th><th class="foreignid"><?php echo $paginator->sort('foreignid');?></th><th class="publish"><?php echo $paginator->sort('publish');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($comments as $comment):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $comment['Comment']['id']; ?>
		</td>
		<td class="name">
			<?php echo $comment['Comment']['name']; ?>
		</td>
		<td class="widget_type">
			<?php echo $comment['Comment']['widget_type']; ?>
		</td>
		<td class="foreignid">
			<?php echo $comment['Comment']['foreignid']; ?>
		</td>
		<td class="publish">
			<?php echo ($comment['Comment']['publish'] == 1) ? __('yes', true) : __('no', true); ?>
		</td>
		<td class="actions">
			<?php
				if($comment['Comment']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $comment['Comment']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $comment['Comment']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $comment['Comment']['id']), false) . "\n";
				}else{
					echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $comment['Comment']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $comment['Comment']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $comment['Comment']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $comment['Comment']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="commentsPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>