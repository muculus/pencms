<?php 
foreach($rows as $row): ?>
	<div id="widgetContent">
		<div class="subject">        
		<br />
		<?php 
			echo '<b>موضوع</b>: '.$row['Submit']['subject']; 
		?>
		</div>
		<div id="author">
			<?php 
				echo '<b>ارسال کننده مطلب</b>: '.$row['User']['name']; 
			?>
			<br />
		</div>	
		<div class="description">        
			<br />
			<?php 
				echo $row['Submit']['description']; 
			?>
		</div>
		<div class="url">
			<?php
				if ($row['Submit']['file_filesize'] > 0){
					echo $html->link('دانلود فایل ', '/'.$row['Submit']['file_dir'].'/'.$row['Submit']['file']); 
					echo "<br />";
					echo '<span class="file_filesize">';
					if ($row['Submit']['file_filesize'] < (1024*1024)){
					echo "حجم فایل : " . number_format($row['Submit']['file_filesize']/1024, 2, '.', '') . "<span class=\"lgrey\"> کیلوبایت</span>"; 
					}
					else  {
					echo "حجم فایل : " . number_format($row['Submit']['file_filesize']/(1024*1024), 2, '.', '') . "<span class=\"lgrey\"> مگابایت</span>";	
					}
					echo "</span>";
				}
			?>			  
		</div>
		<br />
		<span class="hits">
			<?php
				echo "تعداد بازدیدها : " . $row['Submit']['hits'];
			?>
		</span>
		<br />
	</div>
<?php endforeach; ?>