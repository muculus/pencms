<h2><?php  __('Link');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Link');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="links view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $link['Link']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Link Category'); ?></td>
					<td><?php echo $html->link($link['LinkCategory']['title'], array('controller'=> 'link_categories', 'action'=>'view', $link['LinkCategory']['id'])); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Title'); ?></td>
					<td><?php echo $link['Link']['title']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Picture'); ?></td>
					<td><?php echo $link['Link']['picture']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Description'); ?></td>
					<td><?php echo $link['Link']['description']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Url'); ?></td>
					<td><?php echo $link['Link']['url']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created'); ?></td>
					<td><?php echo $link['Link']['created']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Modified'); ?></td>
					<td><?php echo $link['Link']['modified']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Deleted'); ?></td>
					<td><?php echo ($link['Link']['deleted'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Link', true), array('action'=>'edit', $link['Link']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Link', true), array('action'=>'delete', $link['Link']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $link['Link']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Links', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Link', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>