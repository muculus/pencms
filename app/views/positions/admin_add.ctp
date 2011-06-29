<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add Position');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#positionForm').load('<?php echo $html->url(array('controller'=>'positions','action'=>'form'));?>','#positionForm');
			});
		</script>
		<div id="positionForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List Positions', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>