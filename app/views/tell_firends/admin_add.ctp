<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add TellFirend');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#tellFirendForm').load('<?php echo $html->url(array('controller'=>'tell_firends','action'=>'form'));?>','#tellFirendForm');
			});
		</script>
		<div id="tellFirendForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List TellFirends', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>