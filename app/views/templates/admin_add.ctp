<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add Template');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#templateForm').load('<?php echo $html->url(array('controller'=>'templates','action'=>'form'));?>','#templateForm');
			});
		</script>
		<div id="templateForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List Templates', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>