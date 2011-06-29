<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr id="advertisementsSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="title"><?php echo $paginator->sort('title');?></th><th class="owner"><?php echo $paginator->sort('owner');?></th><th class="size"><?php echo $paginator->sort('size');?></th><th class="start"><?php echo $paginator->sort('start');?></th><th class="end"><?php echo $paginator->sort('end');?></th><th class="hits"><?php echo $paginator->sort('hits');?></th><th class="show_type"><?php echo $paginator->sort('show_type');?></th><th class="publish"><?php echo $paginator->sort('publish');?></th><th class="show_count"><?php echo $paginator->sort('show_count');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($advertisements as $advertisement):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $advertisement['Advertisement']['id']; ?>
		</td>
		<td class="title">
			<?php echo $advertisement['Advertisement']['title']; ?>
		</td>
		<td class="owner">
			<?php echo $advertisement['Advertisement']['owner']; ?>
		</td>
		<td class="size">
			<?php echo $advertisement['Advertisement']['size']; ?>
		</td>
		<td class="start">
			<?php echo $advertisement['Advertisement']['start_date']; ?>
		</td>
		<td class="end">
			<?php echo $advertisement['Advertisement']['end_date']; ?>
		</td>
		<td class="hits">
			<?php echo $advertisement['Advertisement']['hits']; ?>
		</td>
		<td class="show_type">
			<?php echo $advertisement['Advertisement']['show_type']; ?>
		</td>
		<td class="publish">
			<?php 	if($advertisement['Advertisement']['publish']==1){
					echo 'yes';}else{ echo 'no';} ?>
		</td>
		<td class="show_count">
			<?php echo $advertisement['Advertisement']['show_count']; ?>
		</td>
		<td class="actions">
			<?php
				if($advertisement['Advertisement']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $advertisement['Advertisement']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $advertisement['Advertisement']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $advertisement['Advertisement']['id']), false) . "\n";
				}else{
					//echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $advertisement['Advertisement']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $advertisement['Advertisement']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $advertisement['Advertisement']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $advertisement['Advertisement']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="advertisementsPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>