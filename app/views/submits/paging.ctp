<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0">
<tr id="submitsSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="user_id"><?php echo $paginator->sort('user_id');?></th><th class="widget_id"><?php echo $paginator->sort('widget_id');?></th><th class="subject"><?php echo $paginator->sort('subject');?></th><th class="title"><?php echo $paginator->sort('title');?></th><th class="source"><?php echo $paginator->sort('source');?></th><th class="file"><?php echo $paginator->sort('file');?></th><th class="file_dir"><?php echo $paginator->sort('file_dir');?></th><th class="file_filesize"><?php echo $paginator->sort('file_filesize');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($submits as $submit):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $submit['Submit']['id']; ?>
		</td>
		<td class="user_id">
			<?php echo $html->link($submit['User']['id'], array('controller'=> 'users', 'action'=>'view', $submit['User']['id'])); ?>
		</td>
		<td class="widget_id">
			<?php echo $html->link($submit['Widget']['name'], array('controller'=> 'widgets', 'action'=>'view', $submit['Widget']['id'])); ?>
		</td>
		<td class="subject">
			<?php echo $submit['Submit']['subject']; ?>
		</td>
		<td class="title">
			<?php echo $submit['Submit']['title']; ?>
		</td>
		<td class="source">
			<?php echo $submit['Submit']['source']; ?>
		</td>
		<td class="file">
			<?php echo $submit['Submit']['file']; ?>
		</td>
		<td class="file_dir">
			<?php echo $submit['Submit']['file_dir']; ?>
		</td>
		<td class="file_filesize">
			<?php echo $submit['Submit']['file_filesize']; ?>
		</td>
		<td class="actions">
			<?php
				if($submit['Submit']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $submit['Submit']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $submit['Submit']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $submit['Submit']['id']), false) . "\n";
				}else{
					echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $submit['Submit']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $submit['Submit']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $submit['Submit']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $submit['Submit']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="submitsPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>