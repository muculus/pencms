<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add Manager');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#managerForm').load('<?php echo $html->url(array('controller'=>'managers','action'=>'form'));?>','#managerForm');
			});
		</script>
		<div id="managerForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List Managers', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>