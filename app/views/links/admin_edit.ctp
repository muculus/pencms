<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Edit Link');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#linkForm').load('<?php echo $html->url(array('controller'=>'links','action'=>'form', 'edit', $id));?>','#linkForm');
			});
		</script>
		<div id="linkForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Link.id')), array('class' => 'delete bottom'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Link.id'))); ?></li>
				<li><?php echo $html->link(__('List Links', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>