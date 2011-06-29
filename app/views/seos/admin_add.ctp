<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add Seo');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#seoForm').load('<?php echo $html->url(array('controller'=>'seos','action'=>'form'));?>','#seoForm');
			});
		</script>
		<div id="seoForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List Seos', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>