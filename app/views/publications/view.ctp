<?php echo $javascript->link('publication'); ?>

<?php foreach($rows as $row): ?>
	<div id="widgetContent">
    	
         <div>
		 	<ul>
		     <?php 
			  $i=0;
                       foreach ($allChildren[$i] as $child){
							echo '<h2 class="publication">'.$child['Category']['title'].'</h2>';
                            echo "<div>".$child['Category']['content']."<br>";
                     if ($child['Category']['file_filesize'] > 0){
					  echo $html->link('دانلود فایل ', '/'.$child['Category']['file_dir'].'/'.$child['Category']['file']); 
					  echo "<br />";
					  echo '<span class="file_filesize">';
					  if ($child['Category']['file_filesize'] < (1024*1024)){
					  	echo "حجم فایل : " . number_format($child['Category']['file_filesize']/1024, 2, '.', '') . "<span class=\"lgrey\"> کیلوبایت</span>"; 
					  }
					  else  {
					  	echo "حجم فایل : " . number_format($child['Category']['file_filesize']/(1024*1024), 2, '.', '') . "<span class=\"lgrey\"> مگابایت</span>";	
					
					  echo "</span>";
			  	  }
		}
                   echo "</div>";         
                           
							
	                   }
			?>
			</ul>
		</div>
         <div class="vol">
        	<?php echo " سال انتشار" .$row['Publication']['vol']; ?>
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