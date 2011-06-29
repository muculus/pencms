<?php foreach($rows as $row): ?>
	<div class="widgetContentDownload">
    	<?php echo $html->link($row['Submit']['title'].'('.$row['User']['name'].')', array('controller' => 'submits', 'action' => 'view', $row['Submit']['id'])); ?>       	
    </div>
<?php endforeach; ?>