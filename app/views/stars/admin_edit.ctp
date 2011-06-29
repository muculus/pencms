<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Edit Star');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#starForm').load('<?php echo $html->url(array('controller'=>'stars','action'=>'form', 'edit', $id));?>','#starForm');
			});
		</script>
		<div id="starForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Star.id')), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Star.id'))); ?></li>
				<li><?php echo $html->link(__('List Stars', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>