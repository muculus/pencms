<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add ManagerMassage');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#managerMassageForm').load('<?php echo $html->url(array('controller'=>'manager_massages','action'=>'form'));?>','#managerMassageForm');
			});
		</script>
		<div id="managerMassageForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List ManagerMassages', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>