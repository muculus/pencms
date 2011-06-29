<?php 
$paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr id="ContentsSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="widget_id"><?php echo $paginator->sort('widget_id');?></th><th class="title"><?php echo $paginator->sort('title');?></th><th class="author"><?php echo $paginator->sort('author');?></th></th><th class="file"><?php echo $paginator->sort('file');?></th><th class="publish"><?php echo $paginator->sort('publish');?></th><th class="created"><?php echo $paginator->sort('created');?></th><th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($contents[0]['Content'] as $content):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $content['id']; ?>
		</td>
		<td class="widget_id">
			<?php echo $content['widget_id']; ?>
		</td>
        <td class="title">
			<?php echo $content['title']; ?>
		</td>
		<td class="author">
			<?php echo $content['author']; ?>
		</td>
		<td class="file">
			<?php echo $content['file']; ?>
		</td>

		<td class="publish">
			<?php echo ($content['publish'] == 1) ? __('yes', true) : __('no', true); ?>
		</td>
		
		<td class="created">
			<?php echo $content['created']; ?>
		</td>
	
		<td class="actions">
			<?php
				if($content['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $content['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $content['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $content['id']), false) . "\n";
				}else{
					//echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $content['Content']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $content['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $content['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $content['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="ContentsPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>