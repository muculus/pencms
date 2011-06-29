<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add Gallery');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#galleryForm').load('<?php echo $html->url(array('controller'=>'galleries','action'=>'form','cat_id' => $cat_id));?>','#galleryForm');
			});
		</script>
		<div id="galleryForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List Galleries', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>