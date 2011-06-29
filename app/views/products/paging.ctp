<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0">
<tr id="productsSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="widget_id"><?php echo $paginator->sort('widget_id');?></th><th class="title"><?php echo $paginator->sort('title');?></th><th class="price"><?php echo $paginator->sort('price');?></th><th class="description"><?php echo $paginator->sort('description');?></th><th class="pictur"><?php echo $paginator->sort('pictur');?></th><th class="picture_dir"><?php echo $paginator->sort('picture_dir');?></th><th class="picture_mimetype"><?php echo $paginator->sort('picture_mimetype');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($products as $product):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $product['Product']['id']; ?>
		</td>
		<td class="widget_id">
			<?php echo $html->link($product['Widget']['name'], array('controller'=> 'widgets', 'action'=>'view', $product['Widget']['id'])); ?>
		</td>
		<td class="title">
			<?php echo $product['Product']['title']; ?>
		</td>
		<td class="price">
			<?php echo $product['Product']['price']; ?>
		</td>
		<td class="description">
			<?php echo $product['Product']['description']; ?>
		</td>
		<td class="pictur">
			<?php echo $product['Product']['pictur']; ?>
		</td>
		<td class="picture_dir">
			<?php echo $product['Product']['picture_dir']; ?>
		</td>
		<td class="picture_mimetype">
			<?php echo $product['Product']['picture_mimetype']; ?>
		</td>
		<td class="actions">
			<?php
				if($product['Product']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $product['Product']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $product['Product']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $product['Product']['id']), false) . "\n";
				}else{
					echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $product['Product']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $product['Product']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $product['Product']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $product['Product']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="productsPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>