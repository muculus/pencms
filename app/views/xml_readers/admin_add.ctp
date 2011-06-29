<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Add XmlReader');?></span></a></li>
	</ul>
	
	<div id="tab1">
		<script type="text/javascript">
			$(document).ready(function() {
				$('#xmlReaderForm').load('<?php echo $html->url(array('controller'=>'xml_readers','action'=>'form'));?>','#xmlReaderForm');
			});
		</script>
		<div id="xmlReaderForm"></div>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List XmlReaders', true), array('action'=>'index'), array('class' => 'index'));?></li>
					</ul>
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>