<?php foreach($rows as $row): ?>
	<div id="widgetContent">
		<?php
			if (!empty ($row['Publication']['dir'])){
				echo $html->image('/'.$row['Publication']['dir'].'/thumb.small.'.$row['Publication']['picture']);
			}
			else{
				echo $html->image('default.jpg');
			}
		?>
		<h4><?php echo $html->link($row['Publication']['title'], array('controller' => 'publications', 'action' => 'view', $row['Publication']['id'])) ?></h4>
		<div class="vol">
			<?php echo " سال انتشار:" .$row['Publication']['vol']; ?>
		</div>
		<div class="issue">
			<?php echo "نویسنده : ". $row['Publication']['issue']; ?>
		</div>
		<span class="pages">
			<?php echo " تعداد صفحات: ". $row['Publication']['pages']; ?>
		</span>
		<span class="price">
			<?php echo "قیمت : ". $row['Publication']['price']; ?>
		</span>
		<span class="period">
			<?php echo "ترتیب انتشار : ". $row['Publication']['period']; ?>
		</span>
    </div>
<?php endforeach; ?>