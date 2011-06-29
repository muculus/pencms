<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add Advertisement');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#advertisementForm').load('<?php echo $html->url(array('controller'=>'advertisements','action'=>'form','cat_id' => $cat_id));?>','#advertisementForm');
			});
		</script>
		<div id="advertisementForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List Advertisements', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>