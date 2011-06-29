<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add Setting');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#settingForm').load('<?php echo $html->url(array('controller'=>'settings','action'=>'form'));?>','#settingForm');
			});
		</script>
		<div id="settingForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List Settings', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>