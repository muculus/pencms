<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr id="seosSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="word"><?php echo $paginator->sort('word');?></th><th class="link"><?php echo $paginator->sort('link');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($seos as $seo):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $seo['Seo']['id']; ?>
		</td>
		<td class="word">
			<?php echo $seo['Seo']['word']; ?>
		</td>
		<td class="link">
			<?php echo $seo['Seo']['link']; ?>
		</td>
		<td class="actions">
			<?php
				if($seo['Seo']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $seo['Seo']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $seo['Seo']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $seo['Seo']['id']), false) . "\n";
				}else{
					echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $seo['Seo']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $seo['Seo']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $seo['Seo']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $seo['Seo']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="seosPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>