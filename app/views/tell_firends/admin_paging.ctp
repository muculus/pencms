<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0">
<tr id="tellFirendsSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="title"><?php echo $paginator->sort('title');?></th><th class="picture"><?php echo $paginator->sort('picture');?></th><th class="picture_dir"><?php echo $paginator->sort('picture_dir');?></th><th class="picture_mimetype"><?php echo $paginator->sort('picture_mimetype');?></th><th class="url"><?php echo $paginator->sort('url');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($tellFirends as $tellFirend):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $tellFirend['TellFirend']['id']; ?>
		</td>
		<td class="title">
			<?php echo $tellFirend['TellFirend']['title']; ?>
		</td>
		<td class="picture">
			<?php echo $tellFirend['TellFirend']['picture']; ?>
		</td>
		<td class="picture_dir">
			<?php echo $tellFirend['TellFirend']['picture_dir']; ?>
		</td>
		<td class="picture_mimetype">
			<?php echo $tellFirend['TellFirend']['picture_mimetype']; ?>
		</td>
		<td class="url">
			<?php echo $tellFirend['TellFirend']['url']; ?>
		</td>
		<td class="actions">
			<?php
				if($tellFirend['TellFirend']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $tellFirend['TellFirend']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $tellFirend['TellFirend']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $tellFirend['TellFirend']['id']), false) . "\n";
				}else{
					echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $tellFirend['TellFirend']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $tellFirend['TellFirend']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $tellFirend['TellFirend']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $tellFirend['TellFirend']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="tellFirendsPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>