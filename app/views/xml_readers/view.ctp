<h2><?php  __('XmlReader');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('XmlReader');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="xmlReaders view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $xmlReader['XmlReader']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Url'); ?></td>
					<td><?php echo $xmlReader['XmlReader']['url']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Number'); ?></td>
					<td><?php echo $xmlReader['XmlReader']['number']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Widget'); ?></td>
					<td><?php echo $html->link($xmlReader['Widget']['name'], array('controller'=> 'widgets', 'action'=>'view', $xmlReader['Widget']['id'])); ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit XmlReader', true), array('action'=>'edit', $xmlReader['XmlReader']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete XmlReader', true), array('action'=>'delete', $xmlReader['XmlReader']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $xmlReader['XmlReader']['id'])); ?> </li>
				<li><?php echo $html->link(__('List XmlReaders', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New XmlReader', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>