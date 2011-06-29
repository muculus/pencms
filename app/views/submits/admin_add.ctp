<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add Submit');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#submitForm').load('<?php echo $html->url(array('controller'=>'submits','action'=>'form'));?>','#submitForm');
			});
		</script>
		<div id="submitForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List Submits', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>