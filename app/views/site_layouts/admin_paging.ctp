<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr id="siteLayoutsSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="name"><?php echo $paginator->sort('name');?></th><th class="publish"><?php echo $paginator->sort('publish');?></th><th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($siteLayouts as $siteLayout):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $siteLayout['SiteLayout']['id']; ?>
		</td>
		<td class="template_id">
			<?php echo $html->link($siteLayout['SiteLayout']['name'], array('controller'=> 'site_layouts', 'action'=>'edit', $siteLayout['SiteLayout']['id'])); ?>
		</td>
		<td class="publish">
			<?php echo ($siteLayout['SiteLayout']['publish'] == 1) ? __('yes', true) : __('no', true); ?>
		</td>
		<td class="actions">
			<?php
				if($siteLayout['SiteLayout']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $siteLayout['SiteLayout']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $siteLayout['SiteLayout']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $siteLayout['SiteLayout']['id']), false) . "\n";
				}else{
					//echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $siteLayout['SiteLayout']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $siteLayout['SiteLayout']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $siteLayout['SiteLayout']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $siteLayout['SiteLayout']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="siteLayoutsPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>