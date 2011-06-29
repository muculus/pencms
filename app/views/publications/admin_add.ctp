<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add Publication');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#publicationForm').load('<?php echo $html->url(array('controller'=>'publications','action'=>'form','cat_id' => $cat_id));?>','#publicationForm');
			});
		</script>
		<div id="publicationForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List Publications', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>