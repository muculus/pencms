<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add SiteLayout');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#siteLayoutForm').load('<?php echo $html->url(array('controller'=>'site_layouts','action'=>'form'));?>','#siteLayoutForm');
			});
		</script>
		<div id="siteLayoutForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List SiteLayouts', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>