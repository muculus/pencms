<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Edit dailyquote');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#dailyquoteForm').load('<?php echo $html->url(array('controller'=>'dailyquotes','action'=>'form', 'edit', $id));?>','#dailyquoteForm');
			});
		</script>
		<div id="dailyquoteForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('dailyquote.id')), array('class' => 'delete bottom'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('dailyquote.id'))); ?></li>
				<li><?php echo $html->link(__('List dailyquotes', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>