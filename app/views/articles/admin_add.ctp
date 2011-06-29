		<script type="text/javascript">
			$(document).ready(function() {
				$('#articleForm').load('<?php echo $html->url(array('controller'=>'articles','action'=>'form','cat_id' => $cat_id));?>','#articleForm');
			});
		</script>
		<div id="articleForm"></div>

