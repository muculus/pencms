<?php foreach($rows as $row): ?>
	<div id="widgetContentMessage">
		<h4><?php echo $html->link($row['Message']['title'],array('controller' => 'Messages', 'action' => 'view', $row['Message']['id'])); ?></h4>
		<div>
			<?php  
				if (!empty($row['Message']['description'])){
					echo "<h4>شرح  پیام:</h4> ". $row['Message']['description']; 
				}
			?>
		</div> 
		<span class="end_date">
			<?php echo "تاریخ درج خبر : ". $row['Message']['end_date']; ?>
		</span>
	</div> 
<?php endforeach; ?>
   