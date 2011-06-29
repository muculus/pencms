<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add Reader');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#readerForm').load('<?php echo $html->url(array('controller'=>'readers','action'=>'form'));?>','#readerForm');
			});
		</script>
		<div id="readerForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List Readers', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>