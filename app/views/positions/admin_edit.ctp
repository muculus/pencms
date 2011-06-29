<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Edit Position');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#positionForm').load('<?php echo $html->url(array('controller'=>'positions','action'=>'form', 'edit', $id));?>','#positionForm');
			});
		</script>
		<div id="positionForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Position.id')), array('class' => 'delete bottom'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Position.id'))); ?></li>
				<li><?php echo $html->link(__('List Positions', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>