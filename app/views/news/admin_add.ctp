<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add News');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#newsForm').load('<?php echo $html->url(array('controller'=>'news','action'=>'form','cat_id' => $cat_id));?>','#newsForm');
			});
		</script>
		<div id="newsForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List News', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>