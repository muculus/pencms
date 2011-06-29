<?php

	$elements = $this->requestAction(array('controller' => 'seos',
									         'action' => 'setElement'),
									          array('named' => array('limit' => '',
																	 'fields' => '',
																	 'order' => '',
																	 'conditions' => '')));
																	 ?>

<?php foreach($rows as $row): ?>
<div id="articleHeader">
	<h1><?php echo $row['Library']['title']; ?></h1>
	<ul id="articleTools">
		<li><a href="#" id="mailTools" onclick="javascript:location.href='mailto:?subject=<?php echo $row['Library']['title'];?>&amp; body='+location.href;">ایمیل</a></li>
		<li><a href="#" id="socialTools">اشتراک</a></li>
	</ul>
</div>
<div class="content scontent">
	 <?php 
			$content=$row['Library']['description']; 
			foreach ($elements as $element){
						$replace='<a href="'. $element['Seo']['link'].'" target="_blank">'.$element['Seo']['word'].'</a>';
							$counter=0;
						$main="";
						$j=strlen($content)-1;
					    $i=0;
						while ($i<$j ){
							$string='';
						
							while ( $i<=$j &&!($content[$i]=='<' && $content[($i+1)]=='a' )){
							$string=$string .$content[$i];
							$i++;
							}
							if (!empty($element['Seo']['word'])){
							$find=substr_count($string , $element['Seo']['word']);
							}
							if ((!empty($find) and $counter+$find)<=5){
				
							$string=str_replace($element['Seo']['word'],$replace,$string,$find);
							$counter=$counter+$find;
							}
							else{
							if ($counter<=5){
							$find=5-$counter;
						
							$string=str_replace($element['Seo']['word'],$replace,$string,$find);
							$counter=5;
							}
							}
							$main=$main.$string;
						while ( $i<=$j &&!($content[$i]=='<' && $content[$i+1]=='/'&& $content[$i+2]=='a' ) ){
							$main=$main.$content[$i];
							$i++;
							}
							
						}
																
				$content=$main;
			}
			echo $content;
			?>
	
</div>
<?php if($row['Library']['author'] != ''){ ?>
	<div class="author">
		<?php echo  $row['Library']['author']; ?>
		<br />
	</div>
<?php } ?>

<?php if($row['Library']['publisher'] != ''){ ?>
	 <div class="publisher">
		<?php echo ' ناشر :' . $row['Library']['publisher']; ?>
		<br />
	 </div>
<?php } ?>

<?php if($row['Library']['ISBN'] != ''){ ?>
	<div class="ISBN">
		<?php echo 'ISBN:' . $row['Library']['ISBN']; ?>
		<br />
	</div>
<?php } ?>

<?php if($row['Library']['paperback'] != ''){ ?>
	<div class="paperback">
		<?php echo 'تعداد صفحات: ' . $row['Library']['paperback']; ?>
		<br />
	</div>
<?php } ?>

<?php if($row['Library']['hits'] != ''){ ?>
	<div class="hits">
		<?php echo 'تعداد بازدیدها :' . $row['Library']['hits']; ?>
		<br />
	</div>
<?php } ?>

        
<?php if($row['Library']['price'] != ''){ ?> 
	<div class="price">
		<?php echo"<span> قیمت:</span>" . $row['Library']['price']; ?>
		<br />
	</div>
<?php } ?>

<div class="library">
	<h2 class="effect" >فهرست مطالب کتاب</h2>
	<div>
	<?php echo $row['Library']['table_of_content']; ?>
	</div>
 </div>

<?php  if ($row['Library']['file_filesize'] > 0){
				  echo $html->link('دانلود فایل ', '/'.$row['Library']['file_dir'].'/'.$row['Library']['file']); 
				  echo "<br />";
				  echo '<span class="file_filesize">';
				  if ($row['Library']['file_filesize'] < (1024*1024)){
					echo "حجم فایل : " . number_format($row['Library']['file_filesize']/1024, 2, '.', '') . "<span class=\"lgrey\"> کیلوبایت</span>"; 
				  }
				  else  {
					echo "حجم فایل : " . number_format($row['Library']['file_filesize']/(1024*1024), 2, '.', '') . "<span class=\"lgrey\"> مگابایت</span>";	
				  }
				  echo "</span>";
			  }
		?>
<?php endforeach;?>