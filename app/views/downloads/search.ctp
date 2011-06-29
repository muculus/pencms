<?php 
	$paginator->options(array('url' => $this->passedArgs));
    $i=0; 
	if ($number==0){
		echo "<p>هیچ موردی یافت نشد</p>";
	}
	else{
		echo " <p> تعداد موارد یافت شده:  ". $number."</p>";
	}
	
	foreach($search as $find){
		$i=0; 
		$model = key($find);
		foreach($find[$model] as $content){
			if ($i == 0) {
				$id = $content;
		  	} else {
			  	if ($i == 1) {
					echo  $html->link($content,'/'.Inflector::pluralize($model).'/view/'.$id);
					echo "<br>";
			  	} else{
					echo $shorten->shortenText($content, 400);//TO DO: must highlight found word
					//echo substr($content, 0, 100);
					echo "<br>";
			  	}
		  	}
		  	$i++;
		}
		echo "<br>";
	}
?>
<div class="paging" id="linksPaging">
  <?php 
  if ( $paginator->hasNext()) { 
	 echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));  
	 echo "|";
	 }
	 ?>
 	<?php echo $paginator->numbers();?>
  <?php if ( $paginator->hasPrev()) { 
	 echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));
	}
	?>
</div>