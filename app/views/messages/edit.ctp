<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Edit Message');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#messageForm').load('<?php echo $html->url(array('controller'=>'messages','action'=>'form', 'edit', $id));?>','#messageForm');
			});
		</script>
		<div id="messageForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Message.id')), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Message.id'))); ?></li>
				<li><?php echo $html->link(__('List Messages', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>