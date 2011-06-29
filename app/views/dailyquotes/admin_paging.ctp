<?php 
$paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr id="dailyquotesSorting">
<th class="id"><?php echo $paginator->sort('id');?></th>
<th class="title"><?php echo $paginator->sort('title');?></th>
<th class="publish"><?php echo $paginator->sort('publish');?></th>
<th class="created"><?php echo $paginator->sort('created');?></th>
<th class="actions"><?php __('Actions');?></th>
</tr>

<?php
$i = 0;
foreach ($dailyquotes as $dailyquote):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $dailyquote['Dailyquote']['id']; ?>
		</td>
                <td class="title">
			<?php echo $dailyquote['Dailyquote']['title']; ?>
		</td>
		<td class="publish">
			<?php echo ($dailyquote['Dailyquote']['publish'] == 1) ? __('yes', true) : __('no', true); ?>
		</td>
		<td class="created">
			<?php echo $dailyquote['Dailyquote']['created']; ?>
		</td>
		<td class="actions">
			<?php
				if($dailyquote['Dailyquote']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $dailyquote['Dailyquote']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $dailyquote['Dailyquote']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $dailyquote['Dailyquote']['id']), false) . "\n";
				}else{
					//echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $dailyquote['Dailyquote']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $dailyquote['Dailyquote']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $dailyquote['Dailyquote']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $dailyquote['Dailyquote']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="dailyquotesPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>