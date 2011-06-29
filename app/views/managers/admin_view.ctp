<h2><?php  __('Manager');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Manager');?></span></a></li>
		<li><a href="#tab2"><span><?php  __('Related Manager Massages');?></span></a></li>
	</ul>
	<div id="tab1">
		<div class="managers view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $manager['Manager']['id']; ?>&nbsp;</td>
				</tr>
				
				<tr>
					<td><?php __('Grade'); ?></td>
					<td><?php echo $manager['Manager']['grade']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Position'); ?></td>
					<td><?php echo $manager['Manager']['position']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Description'); ?></td>
					<td><?php echo $manager['Manager']['description']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Career'); ?></td>
					<td><?php echo $manager['Manager']['career']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Picture'); ?></td>
					<td><?php echo $manager['Manager']['picture']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Tel'); ?></td>
					<td><?php echo $manager['Manager']['tel']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Email'); ?></td>
					<td><?php echo $manager['Manager']['email']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Publish'); ?></td>
					<td><?php echo ($manager['Manager']['publish'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created'); ?></td>
					<td><?php echo $manager['Manager']['created']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Modified'); ?></td>
					<td><?php echo $manager['Manager']['modified']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created By'); ?></td>
					<td><?php echo $manager['Manager']['created_by']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Modified By'); ?></td>
					<td><?php echo $manager['Manager']['modified_by']; ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Manager', true), array('action'=>'edit', $manager['Manager']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Manager', true), array('action'=>'delete', $manager['Manager']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $manager['Manager']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Managers', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Manager', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
			<div id="tab2">
			<div class="related">
			
				<?php if (!empty($manager['ManagerMassage'])):?>
				<?php echo $this->element('datatable', array('controllerPath' => 'manager_massages', 'filters' => array('manager_id'=>$manager['Manager']['id'])));?>
				<?php endif; ?>
				<script type="text/javascript">
					$(document).ready(function() {
						$('#managerMassageForm').load('<?php echo $html->url(array('controller'=>'manager_massages','action'=>'form','add','manager_id'=>$manager['Manager']['id']));?>');
					});
				</script>
				
				<h3><?php __('Add Manager Massage');?></h3>
				
				<div id="managerMassageForm"></div>
			</div>
		</div>
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>