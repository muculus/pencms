<?php foreach($rows as $row): ?>
	<div class="widgetContentDownload">
		<?php echo $html->link($row['Library']['title'], array('controller' => 'libraries', 'action' => 'view', $row['Library']['id'])); ?>
    </div>
<?php endforeach; ?>