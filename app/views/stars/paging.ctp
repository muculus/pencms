<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0">
<tr id="starsSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="category_id"><?php echo $paginator->sort('category_id');?></th><th class="star_owner_id"><?php echo $paginator->sort('star_owner_id');?></th><th class="category"><?php echo $paginator->sort('category');?></th><th class="title"><?php echo $paginator->sort('title');?></th><th class="alias"><?php echo $paginator->sort('alias');?></th><th class="picture"><?php echo $paginator->sort('picture');?></th><th class="dir"><?php echo $paginator->sort('dir');?></th><th class="created"><?php echo $paginator->sort('created');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($stars as $star):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $star['Star']['id']; ?>
		</td>
		<td class="category_id">
			<?php echo $html->link($star['Category']['title'], array('controller'=> 'categories', 'action'=>'view', $star['Category']['id'])); ?>
		</td>
		<td class="star_owner_id">
			<?php echo $html->link($star['StarOwner']['id'], array('controller'=> 'star_owners', 'action'=>'view', $star['StarOwner']['id'])); ?>
		</td>
		<td class="category">
			<?php echo $star['Star']['category']; ?>
		</td>
		<td class="title">
			<?php echo $star['Star']['title']; ?>
		</td>
		<td class="alias">
			<?php echo $star['Star']['alias']; ?>
		</td>
		<td class="picture">
			<?php echo $star['Star']['picture']; ?>
		</td>
		<td class="dir">
			<?php echo $star['Star']['dir']; ?>
		</td>
		<td class="created">
			<?php echo $star['Star']['created']; ?>
		</td>
		<td class="actions">
			<?php
				if($star['Star']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $star['Star']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $star['Star']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $star['Star']['id']), false) . "\n";
				}else{
					echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $star['Star']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $star['Star']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $star['Star']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $star['Star']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="starsPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>