<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Edit Library');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#libraryForm').load('<?php echo $html->url(array('controller'=>'libraries','action'=>'form', 'edit', $id));?>','#libraryForm');
			});
		</script>
		<div id="libraryForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Library.id')), array('class' => 'delete bottom'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Library.id'))); ?></li>
				<li><?php echo $html->link(__('List Libraries', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>