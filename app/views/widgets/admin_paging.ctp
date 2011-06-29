<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr id="widgetsSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="name"><?php echo $paginator->sort('name');?></th><th class="type"><?php echo $paginator->sort('type');?></th><th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($widgets as $widget):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $widget['Widget']['id']; ?>
		</td>
		<td class="name">
			<?php 
			 $elementContent = $this->requestAction(array('controller' => $widget['Widget']['type'],
									         'action' => 'numberOfWidget'),  array('named' => array('widget_id' => $widget['Widget']['id'] )));
			echo $html->link( $widget['Widget']['name'].'('. $elementContent.')' , array('controller' => $widget['Widget']['type'],'action'=>'index',$widget['Widget']['id']), array('class' => 'add')); 
			?>
		</td>
		<td class="id">
			<?php echo $widget['Widget']['type']; ?>
		</td>		
		<td class="actions">
			<?php
				if($widget['Widget']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $widget['Widget']['id']), array('escape' => false),array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $widget['Widget']['id']), array('escape' => false),array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $widget['Widget']['id']), false) . "\n";
				}else{
					//echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $widget['Widget']['id']), array('escape' => false) ,array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $widget['Widget']['id']), array('escape' => false),array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $widget['Widget']['id']), array('escape' => false),array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $widget['Widget']['id']), false) . "\n";
					echo $html->link($html->image('admin/editcopy.png'), array('action'=>'copy', $widget['Widget']['id']), array('escape' => false),array('title' => __('Copy', true)), null, false) . "\n";
					
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="widgetsPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>