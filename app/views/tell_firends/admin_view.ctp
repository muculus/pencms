<h2><?php  __('TellFirend');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('TellFirend');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="tellFirends view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $tellFirend['TellFirend']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Title'); ?></td>
					<td><?php echo $tellFirend['TellFirend']['title']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Picture'); ?></td>
					<td><?php echo $tellFirend['TellFirend']['picture']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Picture Dir'); ?></td>
					<td><?php echo $tellFirend['TellFirend']['picture_dir']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Picture Mimetype'); ?></td>
					<td><?php echo $tellFirend['TellFirend']['picture_mimetype']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Url'); ?></td>
					<td><?php echo $tellFirend['TellFirend']['url']; ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit TellFirend', true), array('action'=>'edit', $tellFirend['TellFirend']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete TellFirend', true), array('action'=>'delete', $tellFirend['TellFirend']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $tellFirend['TellFirend']['id'])); ?> </li>
				<li><?php echo $html->link(__('List TellFirends', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New TellFirend', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>