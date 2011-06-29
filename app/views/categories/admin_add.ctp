<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add Category');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#categoryForm').load('<?php echo $html->url(array('controller'=>'categories','action'=>'form' , '' ,$id));?>','#categoryForm');
			});
		</script>
		<div id="categoryForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Category.id')), array('class' => 'delete bottom'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Category.id'))); ?></li>
				<li><?php echo $html->link(__('List Categories', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>