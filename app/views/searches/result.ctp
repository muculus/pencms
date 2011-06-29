
<?php 
	$paginator->options(array('url' => $this->passedArgs));
    $i=0; 
	//echo " <p>  ". $number."</p>";
//	pr($search);
foreach($search as $find){

			$model = key($find);
			//pr($model);
		    foreach($find as $content => $val){

						if($model!=='Search'){
							echo  $html->link($val['title'],'/'.Inflector::pluralize($model).'/view/'.$val['id']);
							echo "<br>";

						}else{
							echo  $html->link($val['title'],'/'.Inflector::pluralize($val['model']).'/view/'.$val['id']);
						//	pr($val);
							echo "<br>";
						}
					if(!empty($val['description'])){
						echo $shorten->shortenText($val['description'], 400);/// TODO: must highlight found word
						//echo substr($content, 0, 100);
						echo "<br>";
					}
				
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
</div