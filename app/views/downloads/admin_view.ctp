<h2><?php  __('Download');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Download');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="downloads view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $download['Download']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Download Category'); ?></td>
					<td><?php echo $html->link($download['DownloadCategory']['title'], array('controller'=> 'download_categories', 'action'=>'view', $download['DownloadCategory']['id'])); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Name'); ?></td>
					<td><?php echo $download['Download']['name']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Description'); ?></td>
					<td><?php echo $download['Download']['description']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Price'); ?></td>
					<td><?php echo $download['Download']['price']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Picture'); ?></td>
					<td><?php echo $download['Download']['picture']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Dir'); ?></td>
					<td><?php echo $download['Download']['dir']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Mimetype'); ?></td>
					<td><?php echo $download['Download']['mimetype']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Filesize'); ?></td>
					<td><?php echo $download['Download']['filesize']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created'); ?></td>
					<td><?php echo $download['Download']['created']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Modified'); ?></td>
					<td><?php echo $download['Download']['modified']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Deleted'); ?></td>
					<td><?php echo ($download['Download']['deleted'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Download', true), array('action'=>'edit', $download['Download']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Download', true), array('action'=>'delete', $download['Download']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $download['Download']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Downloads', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Download', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>