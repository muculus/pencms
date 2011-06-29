<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0">
<tr id="newsSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="title"><?php echo $paginator->sort('title');?></th><th class="summary"><?php echo $paginator->sort('summary');?></th><th class="date"><?php echo $paginator->sort('date');?></th><th class="source"><?php echo $paginator->sort('source');?></th><th class="publish"><?php echo $paginator->sort('publish');?></th><th class="category_id"><?php echo $paginator->sort('category_id');?></th><th class="breaking"><?php echo $paginator->sort('breaking');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($news as $news):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $news['News']['id']; ?>
		</td>
		<td class="title">
			<?php echo $news['News']['title']; ?>
		</td>
		<td class="summary">
			<?php echo $news['News']['summary']; ?>
		</td>
		<td class="date">
			<?php echo $news['News']['date']; ?>
		</td>
		<td class="source">
			<?php echo $news['News']['source']; ?>
		</td>
		<td class="publish">
			<?php echo ($news['News']['publish'] == 1) ? __('yes', true) : __('no', true); ?>
		</td>
		<td class="category_id">
			<?php echo $html->link($news['Category']['title'], array('controller'=> 'categories', 'action'=>'view', $news['Category']['id'])); ?>
		</td>
		<td class="breaking">
			<?php echo ($news['News']['breaking'] == 1) ? __('yes', true) : __('no', true); ?>
		</td>
		<td class="actions">
			<?php
				if($news['News']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $news['News']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $news['News']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $news['News']['id']), false) . "\n";
				}else{
					echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $news['News']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $news['News']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $news['News']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $news['News']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="newsPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>