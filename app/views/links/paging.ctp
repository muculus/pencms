<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0">
<tr id="linksSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="widget_id"><?php echo $paginator->sort('widget_id');?></th><th class="title"><?php echo $paginator->sort('title');?></th><th class="picture"><?php echo $paginator->sort('picture');?></th><th class="url"><?php echo $paginator->sort('url');?></th><th class="created"><?php echo $paginator->sort('created');?></th><th class="modified"><?php echo $paginator->sort('modified');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach($links as $link):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $link['Link']['id']; ?>
		</td>
		<td class="widget_id">
			<?php echo $html->link($link['Widget']['name'], array('controller'=> 'widget', 'action'=>'view', $link['widget']['id'])); ?>
		</td>
		<td class="title">
			<?php echo $link['Link']['title']; ?>
		</td>
		<td class="picture">
			<?php echo $link['Link']['picture']; ?>
		</td>
		<td class="url">
			<?php echo $link['Link']['url']; ?>
		</td>
		<td class="created">
			<?php echo $link['Link']['created']; ?>
		</td>
		<td class="modified">
			<?php echo $link['Link']['modified']; ?>
		</td>
		<td class="actions">
			<?php
				if($link['Link']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $link['Link']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $link['Link']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $link['Link']['id']), false) . "\n";
				}else{
					echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $link['Link']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $link['Link']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $link['Link']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $link['Link']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="linksPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>