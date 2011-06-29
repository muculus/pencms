<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Edit XmlReader');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#xmlReaderForm').load('<?php echo $html->url(array('controller'=>'xml_readers','action'=>'form', 'edit', $id));?>','#xmlReaderForm');
			});
		</script>
		<div id="xmlReaderForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('XmlReader.id')), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $form->value('XmlReader.id'))); ?></li>
				<li><?php echo $html->link(__('List XmlReaders', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>