<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Edit Product');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#productForm').load('<?php echo $html->url(array('controller'=>'products','action'=>'form', 'edit', $id));?>','#productForm');
			});
		</script>
		<div id="productForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Product.id')), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Product.id'))); ?></li>
				<li><?php echo $html->link(__('List Products', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>