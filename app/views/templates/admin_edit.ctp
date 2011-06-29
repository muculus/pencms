<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Edit Template');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#templateForm').load('<?php echo $html->url(array('controller'=>'templates','action'=>'form', 'edit', $id));?>','#templateForm');
			});
		</script>
		<div id="templateForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Template.id')), array('class' => 'delete bottom'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Template.id'))); ?></li>
				<li><?php echo $html->link(__('List Templates', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>