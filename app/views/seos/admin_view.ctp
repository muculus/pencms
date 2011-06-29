<h2><?php  __('Seo');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Seo');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="seos view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $seo['Seo']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Word'); ?></td>
					<td><?php echo $seo['Seo']['word']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Link'); ?></td>
					<td><?php echo $seo['Seo']['link']; ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Seo', true), array('action'=>'edit', $seo['Seo']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Seo', true), array('action'=>'delete', $seo['Seo']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $seo['Seo']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Seos', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Seo', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>