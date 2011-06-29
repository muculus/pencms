<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0"  width="100%>
<tr id="publicationsSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="widget_id"><?php echo $paginator->sort('widget_id');?></th><th class="title"><?php echo $paginator->sort('title');?></th><th class="vol"><?php echo $paginator->sort('vol');?></th><th class="year"><?php echo $paginator->sort('year');?></th><th class="created"><?php echo $paginator->sort('created');?></th>	<th class="publish"><?php echo $paginator->sort('publish');?></th><th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($publications as $publication):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $publication['Publication']['id']; ?>
		</td>
		<td class="category_id">
				<?php echo $publication['Publication']['widget_id']; ?>
		</td>
		<td class="title">
			<?php echo $publication['Publication']['title']; ?>
		</td>
		<td class="vol">
			<?php echo $publication['Publication']['vol']; ?>
		</td>
		<td class="year">
			<?php echo $publication['Publication']['year']; ?>
		</td>
		
		<td class="created">
			<?php echo $publication['Publication']['created']; ?>
		</td>
		<td class="publish">
			<?php echo $publication['Publication']['publish']; ?>
		</td>
		<td class="actions">
			<?php
				if($publication['Publication']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $publication['Publication']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $publication['Publication']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $publication['Publication']['id']), false) . "\n";
				}else{
					//echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $publication['Publication']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $publication['Publication']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $publication['Publication']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $publication['Publication']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="publicationsPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>