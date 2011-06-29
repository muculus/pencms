<h2><?php  __('Setting');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Setting');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="settings view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $setting['Setting']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Title'); ?></td>
					<td><?php echo $setting['Setting']['title']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Slogan'); ?></td>
					<td><?php echo $setting['Setting']['slogan']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Email'); ?></td>
					<td><?php echo $setting['Setting']['email']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Metakey'); ?></td>
					<td><?php echo $setting['Setting']['metakey']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Metadesc'); ?></td>
					<td><?php echo $setting['Setting']['metadesc']; ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Setting', true), array('action'=>'edit', $setting['Setting']['id']), array('class' => 'edit')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>