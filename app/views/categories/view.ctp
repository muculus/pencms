<?php foreach($rows as $row): ?>
	<div id="widgetContent">   
        <div class="description">
            <div>
                <?php echo $row['Category']['content']; ?>
            </div>
            <span class="hits">
            	<?php echo "تعداد بازدیدها : ".$row['Category']['hits']; ?>
            </span>
        </div>
    </div> 
<?php endforeach; ?>
   