<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr id="managersSorting">
<th class="id"><?php echo $paginator->sort('id');?></th><th class="firstname"><?php echo $paginator->sort('firstname');?></th><th class="lastname"><?php echo $paginator->sort('lastname');?></th><th class="grade"><?php echo $paginator->sort('grade');?></th><th class="position"><?php echo $paginator->sort('position');?></th><th class="career"><?php echo $paginator->sort('career');?></th><th class="picture"><?php echo $paginator->sort('picture');?></th><th class="tel"><?php echo $paginator->sort('tel');?></th><th class="email"><?php echo $paginator->sort('email');?></th>	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($managers as $manager):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="id">
			<?php echo $manager['Manager']['id']; ?>
		</td>
		<td class="firstname">
			<?php echo $manager['Manager']['name']; ?>
		</td>
		<td class="lastname">
			<?php echo $manager['Manager']['lastname']; ?>
		</td>
		<td class="grade">
			<?php echo $manager['Manager']['grade']; ?>
		</td>
		<td class="position">
			<?php echo $manager['Manager']['position']; ?>
		</td>
		<td class="career">
			<?php echo $manager['Manager']['career']; ?>
		</td>
		<td class="picture">
			<?php echo $manager['Manager']['picture']; ?>
		</td>
		<td class="tel">
			<?php echo $manager['Manager']['tel']; ?>
		</td>
		<td class="email">
			<?php echo $manager['Manager']['email']; ?>
		</td>
		<td class="actions">
			<?php
				if($manager['Manager']['deleted'] == 1){
					echo $html->link($html->image('admin/undo.gif'), array('action'=>'undelete', $manager['Manager']['id']), array('title' => __('Restore', true)), null, false) . "\n";
					echo $html->link($html->image('admin/delete.gif'), array('action'=>'hard_delete', $manager['Manager']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $manager['Manager']['id']), false) . "\n";
				}else{
					//echo $html->link($html->image('admin/view.gif'), array('action'=>'view', $manager['Manager']['id']), array('title' => __('View', true)), null, false) . "\n";
					echo $html->link($html->image('admin/edit.gif'), array('action'=>'edit', $manager['Manager']['id']), array('title' => __('Edit', true)), null, false) . "\n";
					echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $manager['Manager']['id']), array('title' => __('Delete', true)), sprintf(__('Are you sure you want to delete # %s?', true), $manager['Manager']['id']), false) . "\n";
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging" id="managersPaging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>