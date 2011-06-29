<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Edit Category');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#categoryForm').load('<?php echo $html->url(array('controller'=>'categories','action'=>'form', 'edit', $id));?>','#categoryForm');
			});
		</script>
		<div id="categoryForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Lists Categories', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
			</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>