<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Edit Article');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#articleForm').load('<?php echo $html->url(array('controller'=>'articles','action'=>'form', 'edit', $id));?>','#articleForm');
			});
		</script>
		<div id="articleForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Article.id')), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Article.id'))); ?></li>
				<li><?php echo $html->link(__('List Articles', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>