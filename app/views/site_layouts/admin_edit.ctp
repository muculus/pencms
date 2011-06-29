<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Edit SiteLayout');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#siteLayoutForm').load('<?php echo $html->url(array('controller'=>'site_layouts','action'=>'form', 'edit', $id));?>','#siteLayoutForm');
			});
		</script>
		<div id="siteLayoutForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('SiteLayout.id')), array('class' => 'delete bottom'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('SiteLayout.id'))); ?></li>
				<li><?php echo $html->link(__('List SiteLayouts', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>