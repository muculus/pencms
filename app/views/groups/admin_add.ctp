<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add Group');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#groupForm').load('<?php echo $html->url(array('controller'=>'groups','action'=>'form'));?>','#groupForm');
			});
		</script>
		<div id="groupForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List Groups', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>