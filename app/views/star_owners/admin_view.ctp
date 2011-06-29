<h2><?php  __('StarOwner');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('StarOwner');?></span></a></li>
		<li><a href="#tab2"><span><?php  __('Related Stars');?></span></a></li>
	</ul>
	<div id="tab1">
		<div class="starOwners view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $starOwner['StarOwner']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Firstname'); ?></td>
					<td><?php echo $starOwner['StarOwner']['firstname']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Lastname'); ?></td>
					<td><?php echo $starOwner['StarOwner']['lastname']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Tel'); ?></td>
					<td><?php echo $starOwner['StarOwner']['tel']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Address'); ?></td>
					<td><?php echo $starOwner['StarOwner']['address']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Datepayment'); ?></td>
					<td><?php echo $starOwner['StarOwner']['datepayment']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Star'); ?></td>
					<td><?php echo $starOwner['StarOwner']['star']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Show Contact'); ?></td>
					<td><?php echo ($starOwner['StarOwner']['show_contact'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Price'); ?></td>
					<td><?php echo $starOwner['StarOwner']['price']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Url'); ?></td>
					<td><?php echo $starOwner['StarOwner']['url']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created'); ?></td>
					<td><?php echo $starOwner['StarOwner']['created']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Modified'); ?></td>
					<td><?php echo $starOwner['StarOwner']['modified']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Option'); ?></td>
					<td><?php echo $starOwner['StarOwner']['option']; ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit StarOwner', true), array('action'=>'edit', $starOwner['StarOwner']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete StarOwner', true), array('action'=>'delete', $starOwner['StarOwner']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $starOwner['StarOwner']['id'])); ?> </li>
				<li><?php echo $html->link(__('List StarOwners', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New StarOwner', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
			<div id="tab2">
			<div class="related">
			
				<?php if (!empty($starOwner['Star'])):?>
				<?php echo $this->element('datatable', array('controllerPath' => 'stars', 'filters' => array('star_owner_id'=>$starOwner['StarOwner']['id'])));?>
				<?php endif; ?>
				<script type="text/javascript">
					$(document).ready(function() {
						$('#starForm').load('<?php echo $html->url(array('controller'=>'stars','action'=>'form','add','star_owner_id'=>$starOwner['StarOwner']['id']));?>');
					});
				</script>
				
				<h3><?php __('Add Star');?></h3>
				
				<div id="starForm"></div>
			</div>
		</div>
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>