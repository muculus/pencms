<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Edit Menu');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#menuForm').load('<?php echo $html->url(array('controller'=>'menus','action'=>'form', 'edit', $id));?>','#menuForm');
			});
		</script>
		<div id="menuForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Menu.id')), array('class' => 'delete bottom'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Menu.id'))); ?></li>
				<li><?php echo $html->link(__('List Menus', true), array('action'=>'index'), array('class' => 'index bottom'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>