<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Edit News');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#newsForm').load('<?php echo $html->url(array('controller'=>'news','action'=>'form', 'edit', $id));?>','#newsForm');
			});
		</script>
		<div id="newsForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('News.id')), array('class' => 'delete bottom'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('News.id'))); ?></li>
				<li><?php echo $html->link(__('List News', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>