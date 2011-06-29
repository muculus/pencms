<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0">
<tr id="starOwnersSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="firstname"><?php echo $paginator->sort('firstname');?></th><th class="lastname"><?php echo $paginator->sort('lastname');?></th><th class="tel"><?php echo $paginator->sort('tel');?></th><th class="address"><?php echo $paginator->sort('address');?></th><th class="datepayment"><?php echo $paginator->sort('datepayment');?></th><th class="star"><?php echo $paginator->sort('star');?></th><th class="show_contact"><?php echo $paginator->sort('show_contact');?></th><th class="price"><?php echo $paginator->sort('price');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($starOwners as $starOwner):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $starOwner['StarOwner']['id']; ?>
		</td>
		<td class="firstname">
			<?php echo $starOwner['StarOwner']['firstname']; ?>
		</td>
		<td class="lastname">
			<?php echo $starOwner['StarOwner']['lastname']; ?>
		</td>
		<td class="tel">
			<?php echo $starOwner['StarOwner']['tel']; ?>
		</td>
		<td class="address">
			<?php echo $starOwner['StarOwner']['address']; ?>
		</td>
		<td class="datepayment">
			<?php echo $starOwner['StarOwner']['datepayment']; ?>
		</td>
		<td class="star">
			<?php echo $starOwner['StarOwner']['star']; ?>
		</td>
		<td class="show_contact">
			<?php echo ($starOwner['StarOwner']['show_contact'] == 1) ? __('yes', true) : __('no', true); ?>
		</td>
		<td class="price">
			<?php echo $starOwner['StarOwner']['price']; ?>
		</td>
		<td class="actions">
			<?php
				if($starOwner['StarOwner']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $starOwner['StarOwner']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $starOwner['StarOwner']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $starOwner['StarOwner']['id']), false) . "\n";
				}else{
					echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $starOwner['StarOwner']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $starOwner['StarOwner']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $starOwner['StarOwner']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $starOwner['StarOwner']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="starOwnersPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>