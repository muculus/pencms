<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add Poll');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#pollForm').load('<?php echo $html->url(array('controller'=>'polls','action'=>'form'));?>','#pollForm');
			});
		</script>
		<div id="pollForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List Polls', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>