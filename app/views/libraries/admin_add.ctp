<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add Library');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#libraryForm').load('<?php echo $html->url(array('controller'=>'libraries','action'=>'form','cat_id' => $cat_id));?>','#libraryForm');
			});
		</script>
		<div id="libraryForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List Libraries', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>