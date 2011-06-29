<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0">
<tr id="publicationsSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="category_id"><?php echo $paginator->sort('category_id');?></th><th class="title"><?php echo $paginator->sort('title');?></th><th class="alias"><?php echo $paginator->sort('alias');?></th><th class="purpose"><?php echo $paginator->sort('purpose');?></th><th class="licenseholder"><?php echo $paginator->sort('licenseholder');?></th><th class="managingdirector"><?php echo $paginator->sort('managingdirector');?></th><th class="senioreditor"><?php echo $paginator->sort('senioreditor');?></th><th class="publisher"><?php echo $paginator->sort('publisher');?></th>	<th class="actions"><?php __('Actions');?></th>
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
			<?php echo $html->link($publication['Category']['title'], array('controller'=> 'categories', 'action'=>'view', $publication['Category']['id'])); ?>
		</td>
		<td class="title">
			<?php echo $publication['Publication']['title']; ?>
		</td>
		<td class="alias">
			<?php echo $publication['Publication']['alias']; ?>
		</td>
		<td class="purpose">
			<?php echo $publication['Publication']['purpose']; ?>
		</td>
		<td class="licenseholder">
			<?php echo $publication['Publication']['licenseholder']; ?>
		</td>
		<td class="managingdirector">
			<?php echo $publication['Publication']['managingdirector']; ?>
		</td>
		<td class="senioreditor">
			<?php echo $publication['Publication']['senioreditor']; ?>
		</td>
		<td class="publisher">
			<?php echo $publication['Publication']['publisher']; ?>
		</td>
		<td class="actions">
			<?php
				if($publication['Publication']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $publication['Publication']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $publication['Publication']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $publication['Publication']['id']), false) . "\n";
				}else{
					echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $publication['Publication']['id']), array('title' => __('View', true)), null, false) . "\n";
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