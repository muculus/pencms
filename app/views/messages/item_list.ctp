<?php 
	echo $content;
?>		
<?php foreach($rows as $row): ?>
	<div id="widgetContentMessage">
		<h4><?php echo $html->link($row['Message']['title'],array('controller' => 'Messages', 'action' => 'view', $row['Message']['id'])); ?></h4>
		<span class="end_date">
			<?php echo "<br>تاریخ درج خبر : ". $row['Message']['end_date']; ?>
		</span>
     </div> 
<?php endforeach; ?>
   