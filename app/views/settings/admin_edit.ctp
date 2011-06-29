<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Edit Setting');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#settingForm').load('<?php echo $html->url(array('controller'=>'settings','action'=>'form', 'edit', $id));?>','#settingForm');
			});
		</script>
		<div id="settingForm"></div>
		<div class="actions">
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>
