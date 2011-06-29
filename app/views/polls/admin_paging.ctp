<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr id="pollsSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="title"><?php echo $paginator->sort('title');?></th><th class="vote"><?php echo $paginator->sort('vote');?></th><th class="publish"><?php echo $paginator->sort('publish');?></th><th class="date"><?php echo $paginator->sort('date');?></th><th class="ip"><?php echo $paginator->sort('ip');?></th><th class="created"><?php echo $paginator->sort('created');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
//pr($polls);
foreach ($polls[0]['Poll'] as $poll):
	//pr($poll);
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $poll['id']; ?>
		</td>
		<td class="title">
			<?php echo $poll['title']; ?>
		</td>
		
		<td class="vote">
			<?php echo $poll['vote']; ?>
		</td>
		<td class="publish">
			<?php echo ($poll['publish'] == 1) ? __('yes', true) : __('no', true); ?>
		</td>
		<td class="date">
			<?php echo $poll['date']; ?>
		</td>
		<td class="ip">
			<?php echo $poll['ip']; ?>
		</td>
		<td class="created">
			<?php echo $poll['created'];?>
		</td>
		
		<td class="actions">
			<?php
			
				if($poll['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $poll['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $poll['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $poll['id']), false) . "\n";
				}else{
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $poll['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $poll['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $poll['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="pollsPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>