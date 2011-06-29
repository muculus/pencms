<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add Content');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#contentForm').load('<?php echo $html->url(array('controller'=>'contents','action'=>'form','cat_id' => $cat_id));?>','#contentForm');
			});
		</script>
		<div id="contentForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List contents', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>