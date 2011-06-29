<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add Menu');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#menuForm').load('<?php echo $html->url(array('controller'=>'menus','action'=>'form' , $id));?>','#menuForm');
			});
		</script>
		<div id="menuForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List Menus', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>