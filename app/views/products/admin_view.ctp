<h2><?php  __('Product');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Product');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="products view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $product['Product']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Widget'); ?></td>
					<td><?php echo $html->link($product['Widget']['name'], array('controller'=> 'widgets', 'action'=>'view', $product['Widget']['id'])); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Title'); ?></td>
					<td><?php echo $product['Product']['title']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Price'); ?></td>
					<td><?php echo $product['Product']['price']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Description'); ?></td>
					<td><?php echo $product['Product']['description']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Specification'); ?></td>
					<td><?php echo $product['Product']['specification']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Main Description'); ?></td>
					<td><?php echo $product['Product']['main description']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Pictur'); ?></td>
					<td><?php echo $product['Product']['pictur']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Picture Dir'); ?></td>
					<td><?php echo $product['Product']['picture_dir']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Picture Mimetype'); ?></td>
					<td><?php echo $product['Product']['picture_mimetype']; ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Product', true), array('action'=>'edit', $product['Product']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Product', true), array('action'=>'delete', $product['Product']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $product['Product']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Products', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Product', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>