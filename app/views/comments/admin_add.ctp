<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add Comment');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#commentForm').load('<?php echo $html->url(array('controller'=>'comments','action'=>'form'));?>','#commentForm');
			});
		</script>
		<div id="commentForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List Comments', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>