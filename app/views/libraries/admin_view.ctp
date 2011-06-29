<h2><?php  __('Library');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Library');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="libraries view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $library['Library']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Library Category'); ?></td>
					<td><?php echo $html->link($library['LibraryCategory']['title'], array('controller'=> 'library_categories', 'action'=>'view', $library['LibraryCategory']['id'])); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Title'); ?></td>
					<td><?php echo $library['Library']['title']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Description'); ?></td>
					<td><?php echo $library['Library']['description']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Price'); ?></td>
					<td><?php echo $library['Library']['price']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Picture'); ?></td>
					<td><?php echo $library['Library']['picture']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Dir'); ?></td>
					<td><?php echo $library['Library']['dir']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Mimetype'); ?></td>
					<td><?php echo $library['Library']['mimetype']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Filesize'); ?></td>
					<td><?php echo $library['Library']['filesize']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created'); ?></td>
					<td><?php echo $library['Library']['created']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Modified'); ?></td>
					<td><?php echo $library['Library']['modified']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Deleted'); ?></td>
					<td><?php echo ($library['Library']['deleted'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Library', true), array('action'=>'edit', $library['Library']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Library', true), array('action'=>'delete', $library['Library']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $library['Library']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Libraries', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Library', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>