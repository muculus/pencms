<?php
/*	$elements = $this->requestAction(array('controller' => 'seos',
									         'action' => 'setElement'),
									          array('named' => array('limit' => '',
																	 'fields' => '',
																	 'order' => '',
																	 'conditions' => '')));*/
																	 ?>
<?php foreach($rows as $row): ?>
<div id="articleHeader">
	<h1><?php echo $row['Content']['title']; ?></h1>
	<ul id="articleTools">
		<li><a href="#" onclick="javascript:window.open('http://www.andishesara.com/pdf/pdfarticle.php?id='+<?php echo$row['Content']['id'];  ?>,'mywindow','width=800,height=600');" id="pdfTools">PDF</a></li>
		<li><a href="#" id="mailTools" onclick="javascript:location.href='mailto:?subject=<?php echo $row['Content']['title'];?>&amp;body='+location.href;">ایمیل</a></li>
		<li><a href="#" class="socializer" id="socialTools">اشتراک</a></li>
		<li><a href="#" id="printTools" onclick="javascript:window.print();">پرینت</a></li>
	</ul>
	<span id="ajax_response"></span>
</div>
<div class="content scontent">
	 <?php 
			$content=$row['Content']['content']; 
/*			foreach ($elements as $element){
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
																}*/
																echo $content;
																?>
	
</div>
<div class="author">
	<?php if(!empty($row['Content']['author']))
		echo "نویسنده : ". $row['Content']['author']; ?>
</div>
<?php  if ($row['Content']['file_filesize'] > 0){
				  echo $html->link('دانلود فایل ', '/'.$row['Content']['file_dir'].'/'.$row['Content']['file']); 
				  echo "<br />";
				  echo '<span class="file_filesize">';
				  if ($row['Content']['file_filesize'] < (1024*1024)){
					echo "حجم فایل : " . number_format($row['Content']['file_filesize']/1024, 2, '.', '') . "<span class=\"lgrey\"> کیلوبایت</span>"; 
				  }
				  else  {
					echo "حجم فایل : " . number_format($row['Content']['file_filesize']/(1024*1024), 2, '.', '') . "<span class=\"lgrey\"> مگابایت</span>";	
				  }
				  echo "</span>";
	    }
endforeach;		
?>