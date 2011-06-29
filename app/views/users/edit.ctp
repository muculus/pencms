<script type="text/javascript">
	$(document).ready(function() {
		$('#userForm').load('<?php echo $html->url(array('controller'=>'users','action'=>'form', 'edit', $id));?>','#userForm');
	});
</script>
<div id="userForm"></div>
