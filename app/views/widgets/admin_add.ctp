<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add Widget');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#widgetForm').load('<?php echo $html->url(array('controller'=>'widgets','action'=>'form'));?>','#widgetForm');
			});
		</script>
		<div id="widgetForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List Widgets', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>