<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Edit Seo');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#seoForm').load('<?php echo $html->url(array('controller'=>'seos','action'=>'form', 'edit', $id));?>','#seoForm');
			});
		</script>
		<div id="seoForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Seo.id')), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Seo.id'))); ?></li>
				<li><?php echo $html->link(__('List Seos', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>