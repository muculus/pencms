		<script type="text/javascript">
			$(document).ready(function() {
				$('#articleForm').load('<?php echo $html->url(array('controller'=>'articles','action'=>'form', 'edit', $id));?>','#articleForm');
			});
		</script>
		<div id="articleForm"></div>
