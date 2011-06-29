<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Edit Advertisement');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#advertisementForm').load('<?php echo $html->url(array('controller'=>'advertisements','action'=>'form', 'edit', $id));?>','#advertisementForm');
			});
		</script>
		<div id="advertisementForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Advertisement.id')), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Advertisement.id'))); ?></li>
				<li><?php echo $html->link(__('List Advertisements', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>