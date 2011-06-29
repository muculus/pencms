<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Edit StarOwner');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#starOwnerForm').load('<?php echo $html->url(array('controller'=>'star_owners','action'=>'form', 'edit', $id));?>','#starOwnerForm');
			});
		</script>
		<div id="starOwnerForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('StarOwner.id')), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('StarOwner.id'))); ?></li>
				<li><?php echo $html->link(__('List StarOwners', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>