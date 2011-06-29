<?php foreach($rows as $row): ?>
	<div id="widgetContentNews">
		<h4><?php echo $html->link($row['News']['title'],array('controller' => 'Newss', 'action' => 'view', $row['News']['id'])); ?></h4>
		<div>
			<?php
				echo $html->image( '/'.$row['News']['image_dir'].'/thumb.small.'.$row['News']['image'] ,array(  'alt' => $row['News']['title'] ));
			?>
			<?php  
				if (!empty($row['News']['text'])){
					echo "<h4>شرح  پیام:</h4> ". $row['News']['text']; 
				}
			?>
		</div>
		<span >
			<?php echo "منبع  خبر: ". $row['News']['source']; ?>
		</span>
	</div> 
<?php endforeach; ?>
   