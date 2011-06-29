<h2><?php  __('Star');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Star');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="stars view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $star['Star']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Category'); ?></td>
					<td><?php echo $html->link($star['Category']['title'], array('controller'=> 'categories', 'action'=>'view', $star['Category']['id'])); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Star Owner'); ?></td>
					<td><?php echo $html->link($star['StarOwner']['id'], array('controller'=> 'star_owners', 'action'=>'view', $star['StarOwner']['id'])); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Category'); ?></td>
					<td><?php echo $star['Star']['category']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Title'); ?></td>
					<td><?php echo $star['Star']['title']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Alias'); ?></td>
					<td><?php echo $star['Star']['alias']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Picture'); ?></td>
					<td><?php echo $star['Star']['picture']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Dir'); ?></td>
					<td><?php echo $star['Star']['dir']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created'); ?></td>
					<td><?php echo $star['Star']['created']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Modified'); ?></td>
					<td><?php echo $star['Star']['modified']; ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Star', true), array('action'=>'edit', $star['Star']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Star', true), array('action'=>'delete', $star['Star']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $star['Star']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Stars', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Star', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>