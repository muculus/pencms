<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add User');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#userForm').load('<?php echo $html->url(array('controller'=>'users','action'=>'form'));?>','#userForm');
			});
		</script>
		<div id="userForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List Users', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>