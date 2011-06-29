<?php 
	echo $content;
?>	
<?php foreach($rows as $row): ?>
	<div id="widgetContentLink">
		<?php
			if (!empty ($row['Link']['dir'])){
				echo $html->image('/'.$row['Link']['dir'].'/thumb.small.'.$row['Link']['picture'],array(  'class' => 'item'));
			}
			else {
				echo $html->image('default.jpg');
			}
		?>
		<h4><?php echo $html->link($row['Link']['title'],array('controller' => 'Links', 'action' => 'view', $row['Link']['id'])); ?></h4>
		<div class="link_url">
			<?php echo $html->link($row['Link']['link_url'], $linker->makeUrl($row['Link']['link_url'])); ?>
		</div>
		<div class="description">
			<?php echo substr(0,500,$row['Link']['description']); ?>
		</div>
		<span class="hits">
			<?php echo "تعداد بازدیدها : ". $row['Link']['hits']; ?>
		</span>
	 </div> 
<?php endforeach; ?>
   