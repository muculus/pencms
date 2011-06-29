<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add Product');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#productForm').load('<?php echo $html->url(array('controller'=>'products','action'=>'form'));?>','#productForm');
			});
		</script>
		<div id="productForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List Products', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>