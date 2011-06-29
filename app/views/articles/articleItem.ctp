<?php foreach($rows as $row): ?>
	<div id="widgetContent">
    	
		<h3>چکیده:</h3>
        <div class="content">
        	
           
            <?php echo $row['Article']['intro']; ?>
             
		</div>
		<h3>متن مقاله:</h3>
        <div class="content">
        	
            <?php echo $html->image( '/'.$row['Article']['image_dir'].'/thumb.medium.'.$row['Article']['image'] ,array(  'class' => 'item')); ?>
            <?php echo $row['Article']['content']; ?>
             
		</div>
      
         <div class="author">
        	<?php if(!empty($row['Article']['author']))
			echo "نویسنده : ". $row['Article']['author']; ?>
		</div>
         <div class="source">
        	<?php if(!empty($row['Article']['source']))
			
			 echo "منبع : ". $row['Article']['source']; ?>
		</div>
		<span class="pages">
        	<?php if(!empty($row['Article']['pages']))
			echo "تعداد صفحات : ". $row['Article']['pages']; ?>
		</span>
		 <br>
		
      	<?php if ($row['Article']['file_filesize'] > 0){
					  echo $html->link('دانلود فایل ', '/'.$row['Article']['file_dir'].'/'.$row['Article']['file']); 
					  echo "<br />";
					  echo '<span class="file_filesize">';
					  if ($row['Article']['file_filesize'] < (1024*1024)){
					  	echo "حجم فایل : " . number_format($row['Article']['file_filesize']/1024, 2, '.', '') . "<span class=\"lgrey\"> کیلوبایت</span>"; 
					  }
					  else  {
					  	echo "حجم فایل : " . number_format($row['Article']['file_filesize']/(1024*1024), 2, '.', '') . "<span class=\"lgrey\"> مگابایت</span>";	
					  }
					  echo "</span>";
			  	  }
			?>
		</span>
		
		
		<div class="copyright">
        	<?php  if(!empty($row['Article']['copyright']))
			echo $row['Article']['copyright']; ?>
		</div>
<?php endforeach; ?>
</div>
		
      