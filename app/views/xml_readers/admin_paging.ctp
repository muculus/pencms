<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0">
<tr id="xmlReadersSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="url"><?php echo $paginator->sort('url');?></th><th class="number"><?php echo $paginator->sort('number');?></th><th class="widget_id"><?php echo $paginator->sort('widget_id');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($xmlReaders as $xmlReader):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $xmlReader['XmlReader']['id']; ?>
		</td>
		<td class="url">
			<?php echo $xmlReader['XmlReader']['url']; ?>
		</td>
		<td class="number">
			<?php echo $xmlReader['XmlReader']['number']; ?>
		</td>
		<td class="widget_id">
			<?php echo $html->link($xmlReader['Widget']['name'], array('controller'=> 'widgets', 'action'=>'view', $xmlReader['Widget']['id'])); ?>
		</td>
		<td class="actions">
			<?php
				if($xmlReader['XmlReader']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $xmlReader['XmlReader']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $xmlReader['XmlReader']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $xmlReader['XmlReader']['id']), false) . "\n";
				}else{
					echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $xmlReader['XmlReader']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $xmlReader['XmlReader']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $xmlReader['XmlReader']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $xmlReader['XmlReader']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="xmlReadersPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>