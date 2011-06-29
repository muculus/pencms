<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0">
<tr id="categoriesSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="parent_id"><?php echo $paginator->sort('parent_id');?></th><th class="content_id"><?php echo $paginator->sort('content_id');?></th><th class="site_layout_id"><?php echo $paginator->sort('site_layout_id');?></th><th class="title"><?php echo $paginator->sort('title');?></th><th class="access"><?php echo $paginator->sort('access');?></th><th class="publish"><?php echo $paginator->sort('publish');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($categories as $category):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $category['Category']['id']; ?>
		</td>
		<td class="parent_id">
			<?php echo $category['Category']['parent_id']; ?>
		</td>
		<td class="content_id">
			<?php echo $html->link($category['Content']['title'], array('controller'=> 'contents', 'action'=>'view', $category['Content']['id'])); ?>
		</td>
		<td class="site_layout_id">
			<?php echo $html->link($category['SiteLayout']['name'], array('controller'=> 'site_layouts', 'action'=>'view', $category['SiteLayout']['id'])); ?>
		</td>
		<td class="title">
			<?php echo $category['Category']['title']; ?>
		</td>
		<td class="access">
			<?php echo $category['Category']['access']; ?>
		</td>
		<td class="publish">
			<?php echo ($category['Category']['publish'] == 1) ? __('yes', true) : __('no', true); ?>
		</td>
		<td class="actions">
			<?php
				if($category['Category']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $category['Category']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $category['Category']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $category['Category']['id']), false) . "\n";
				}else{
					//echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $category['Category']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $category['Category']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $category['Category']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $category['Category']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="categoriesPaging">
	<?php /echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>