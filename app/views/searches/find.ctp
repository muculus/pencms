<?php $i=0; ?>
<?php  foreach ($search as $find): 
	$i=0; 
	    foreach ($find[$model] as $content):
	      if ($i==0) {
		$id=$content;
	      }
	      else {
		      if ($i==1) {
		      echo  $html->link($content,'/'.Inflector::pluralize($model).'/view/'.$id);
		      }
		      else{
		      echo substr($content, 0 ,500);//to do 
		      echo "<br>";
		      }
	      }
	    
	     $i++;
	      endforeach;
		echo "<br>";
	endforeach;
?>