<h2><?php  __('Menu');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Menu');?></span></a></li>
		<li><a href="#tab2"><span><?php  __('Child Menus');?></span></a></li>
	</ul>
	<div id="tab1">
		<div class="menus view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $menu['Menu']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Parent Menu'); ?></td>
					<td><?php echo $html->link($menu['Menu']['parent_id'], array('controller' => 'menus', 'action' => 'view', $menu['Menu']['parent_id'])); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Lft'); ?></td>
					<td><?php echo $menu['Menu']['lft']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Rght'); ?></td>
					<td><?php echo $menu['Menu']['rght']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Title'); ?></td>
					<td><?php echo $menu['Menu']['title']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Publish'); ?></td>
					<td><?php echo ($menu['Menu']['publish'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Deleted'); ?></td>
					<td><?php echo ($menu['Menu']['deleted'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Description'); ?></td>
					<td><?php echo $menu['Menu']['description']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Alias'); ?></td>
					<td><?php echo $menu['Menu']['alias']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Category'); ?></td>
					<td><?php echo $html->link($menu['Category']['title'], array('controller'=> 'categories', 'action'=>'view', $menu['Category']['id'])); ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Menu', true), array('action'=>'edit', $menu['Menu']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Menu', true), array('action'=>'delete', $menu['Menu']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $menu['Menu']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Menus', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Menu', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	
	<div id="tab2">
		<div class="related">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'menus', 'filters' => array('parent_id'=>$menu['Menu']['id'])));?>			
			<script type="text/javascript">
				$(document).ready(function() {
					$('#menuForm').load('<?php echo $html->url(array('controller'=>'menus','action'=>'form','add','parent_id'=>$menu['Menu']['id']));?>');
				});
			</script>
			
			<div id="menuForm"></div>
		</div>
	</div>
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>