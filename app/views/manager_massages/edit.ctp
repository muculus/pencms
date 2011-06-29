<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Edit ManagerMassage');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#managerMassageForm').load('<?php echo $html->url(array('controller'=>'manager_massages','action'=>'form', 'edit', $id));?>','#managerMassageForm');
			});
		</script>
		<div id="managerMassageForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('ManagerMassage.id')), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('ManagerMassage.id'))); ?></li>
				<li><?php echo $html->link(__('List ManagerMassages', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>