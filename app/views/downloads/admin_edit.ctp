<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Edit Download');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#downloadForm').load('<?php echo $html->url(array('controller'=>'downloads','action'=>'form', 'edit', $id));?>','#downloadForm');
			});
		</script>
		<div id="downloadForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Download.id')), array('class' => 'delete bottom'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Download.id'))); ?></li>
				<li><?php echo $html->link(__('List Downloads', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>