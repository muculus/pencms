<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0">
<tr id="menusSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="parent_id"><?php echo $paginator->sort('parent_id');?></th><th class="lft"><?php echo $paginator->sort('lft');?></th><th class="rght"><?php echo $paginator->sort('rght');?></th><th class="title"><?php echo $paginator->sort('title');?></th><th class="publish"><?php echo $paginator->sort('publish');?></th><th class="description"><?php echo $paginator->sort('description');?></th><th class="alias"><?php echo $paginator->sort('alias');?></th><th class="category_id"><?php echo $paginator->sort('category_id');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($menus as $menu):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $menu['Menu']['id']; ?>
		</td>
		<td class="parent_id">
			<?php echo $menu['Menu']['parent_id']; ?>
		</td>
		<td class="lft">
			<?php echo $menu['Menu']['lft']; ?>
		</td>
		<td class="rght">
			<?php echo $menu['Menu']['rght']; ?>
		</td>
		<td class="title">
			<?php echo $menu['Menu']['title']; ?>
		</td>
		<td class="publish">
			<?php echo ($menu['Menu']['publish'] == 1) ? __('yes', true) : __('no', true); ?>
		</td>
		<td class="description">
			<?php echo $menu['Menu']['description']; ?>
		</td>
		<td class="alias">
			<?php echo $menu['Menu']['alias']; ?>
		</td>
		<td class="category_id">
			<?php echo $html->link($menu['Category']['title'], array('controller'=> 'categories', 'action'=>'view', $menu['Category']['id'])); ?>
		</td>
		<td class="actions">
			<?php
				if($menu['Menu']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $menu['Menu']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $menu['Menu']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $menu['Menu']['id']), false) . "\n";
				}else{
					//echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $menu['Menu']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $menu['Menu']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $menu['Menu']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $menu['Menu']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="menusPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>