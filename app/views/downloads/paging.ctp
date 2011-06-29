<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0">
<tr id="downloadsSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="widget_id"><?php echo $paginator->sort('widget_id');?></th><th class="name"><?php echo $paginator->sort('name');?></th><th class="price"><?php echo $paginator->sort('price');?></th><th class="picture"><?php echo $paginator->sort('picture');?></th><th class="dir"><?php echo $paginator->sort('dir');?></th><th class="mimetype"><?php echo $paginator->sort('mimetype');?></th><th class="filesize"><?php echo $paginator->sort('filesize');?></th><th class="created"><?php echo $paginator->sort('created');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($downloads as $download):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $download['Download']['id']; ?>
		</td>
		<td class="widget_id">
			<?php echo $html->link($download['DownloadCategory']['title'], array('controller'=> 'download_categories', 'action'=>'view', $download['DownloadCategory']['id'])); ?>
		</td>
		<td class="name">
			<?php echo $download['Download']['name']; ?>
		</td>
		<td class="price">
			<?php echo $download['Download']['price']; ?>
		</td>
		<td class="picture">
			<?php echo $download['Download']['picture']; ?>
		</td>
		<td class="dir">
			<?php echo $download['Download']['dir']; ?>
		</td>
		<td class="mimetype">
			<?php echo $download['Download']['mimetype']; ?>
		</td>
		<td class="filesize">
			<?php echo $download['Download']['filesize']; ?>
		</td>
		<td class="created">
			<?php echo $download['Download']['created']; ?>
		</td>
		<td class="actions">
			<?php
				if($download['Download']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $download['Download']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $download['Download']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $download['Download']['id']), false) . "\n";
				}else{
					echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $download['Download']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $download['Download']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $download['Download']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $download['Download']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="downloadsPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>