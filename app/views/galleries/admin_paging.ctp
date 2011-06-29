<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr id="galleriesSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="title"><?php echo $paginator->sort('title');?></th><th class="picture"><?php echo $paginator->sort('picture');?></th><th class="picture_dir"><?php echo $paginator->sort('picture_dir');?></th><th class="score"><?php echo $paginator->sort('score');?></th><th class="hits"><?php echo $paginator->sort('hits');?></th><th class="created"><?php echo $paginator->sort('created');?></th><th class="modifed"><?php echo $paginator->sort('modifed');?></th><th class="published"><?php echo $paginator->sort('published');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($galleries as $gallery):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $gallery['Gallery']['id']; ?>
		</td>
		<td class="title">
			<?php echo $gallery['Gallery']['title']; ?>
		</td>
		<td class="picture">
			<?php echo $gallery['Gallery']['picture']; ?>
		</td>
		<td class="picture_dir">
			<?php echo $gallery['Gallery']['picture_dir']; ?>
		</td>
		<td class="score">
			<?php echo $gallery['Gallery']['score']; ?>
		</td>
		<td class="hits">
			<?php echo $gallery['Gallery']['hits']; ?>
		</td>
		<td class="created">
			<?php echo $gallery['Gallery']['created']; ?>
		</td>
		<td class="modifed">
			<?php echo $gallery['Gallery']['modifed']; ?>
		</td>
		<td class="published">
			<?php echo ($gallery['Gallery']['publish'] == 1) ? __('yes', true) : __('no', true); ?>
		</td>
		<td class="actions">
			<?php
				if($gallery['Gallery']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $gallery['Gallery']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $gallery['Gallery']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $gallery['Gallery']['id']), false) . "\n";
				}else{
					echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $gallery['Gallery']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $gallery['Gallery']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $gallery['Gallery']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $gallery['Gallery']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="galleriesPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>