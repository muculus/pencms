<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0">
<tr id="settingsSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="title"><?php echo $paginator->sort('title');?></th><th class="slogan"><?php echo $paginator->sort('slogan');?></th><th class="email"><?php echo $paginator->sort('email');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($settings as $setting):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $setting['Setting']['id']; ?>
		</td>
		<td class="title">
			<?php echo $setting['Setting']['title']; ?>
		</td>
		<td class="slogan">
			<?php echo $setting['Setting']['slogan']; ?>
		</td>
		<td class="email">
			<?php echo $setting['Setting']['email']; ?>
		</td>
		<td class="actions">
			<?php
				if($setting['Setting']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $setting['Setting']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $setting['Setting']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $setting['Setting']['id']), false) . "\n";
				}else{
					//echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $setting['Setting']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $setting['Setting']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $setting['Setting']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $setting['Setting']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="settingsPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>