<?php foreach($rows as $row): ?>
	<div id="widgetContent">      
        <div class="description">
            <div>
                <?php if (!empty ($row['Link']['dir'])){
					echo $html->image('/'.$row['Link']['dir'].'/thumb.small.'.$row['Link']['picture'],array(  'class' => 'item'));
					}
					else{
						echo $html->image('default.jpg');
					} ?>
                    <div class="link_url">
         				<?php echo $html->link($row['Link']['link_url'], $linker->makeUrl($row['Link']['link_url'])); ?>
					</div>
                <?php echo $row['Link']['description']; ?>
            </div>
        </div>
		<span class="hits">
			<br />
			<?php echo "تعداد بازدیدها: ".$row['Link']['hits']; ?>
		</span>
    </div> 
<?php endforeach; ?>
   