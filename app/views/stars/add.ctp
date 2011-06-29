<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add Star');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#starForm').load('<?php echo $html->url(array('controller'=>'stars','action'=>'form'));?>','#starForm');
			});
		</script>
		<div id="starForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List Stars', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>