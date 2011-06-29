<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add Message');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#messageForm').load('<?php echo $html->url(array('controller'=>'messages','action'=>'form','cat_id' => $cat_id));?>','#messageForm');
			});
		</script>
		<div id="messageForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List Messages', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>