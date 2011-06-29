<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add StarOwner');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#starOwnerForm').load('<?php echo $html->url(array('controller'=>'star_owners','action'=>'form','cat_id' => $cat_id));?>','#starOwnerForm');
			});
		</script>
		<div id="starOwnerForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List StarOwners', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>