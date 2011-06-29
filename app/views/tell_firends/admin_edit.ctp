<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Edit TellFirend');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#tellFirendForm').load('<?php echo $html->url(array('controller'=>'tell_firends','action'=>'form', 'edit', $id));?>','#tellFirendForm');
			});
		</script>
		<div id="tellFirendForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('TellFirend.id')), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('TellFirend.id'))); ?></li>
				<li><?php echo $html->link(__('List TellFirends', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>