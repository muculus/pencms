
<?php 
$elementContent = $this->requestAction(array('controller' => $controllerName,
											 'action' => 'setElement'),
									   		 array('named' => array('limit' => $limit,
																	'fields' => $fields,
																	'order' => $order,
																	'conditions' => $conditions,
																	 'className' =>$className
																	)
												   ));
$modelName = Inflector::classify($controllerName);
if($modelName=='Article'){$default_image='Widget';$image='picture';}else{$default_image=$modelName;$image='image';$image2='picture';}
?>

<?php foreach($elementContent[0]['Content'] as $content): ?>
<div class="ja-innerdiv clearfix">
<h4 style='margin:o;'><a href="<?php echo $html->url(array('controller' => $controllerName, 'action' => 'view', $content['id']))."/t:".$content['title']; ?>"><?php echo $content['title'] ?></a></h4>
								<?php //pr($content);
	//							echo $html->image( '/'.$content['Article']['image_dir'].'thumb.small.'.$content['Article']['image'] ,array( 'class' => 'mostread-image', 'alt' => $content['Article']['title'] ,'align'=>'right'));
     							echo $html->image( '/imagephp/phpThumb.php?src=/app/webroot/img/'.strtolower($default_image).'/'.$image."/".$content[$image].'&amp;w=90&amp;h=90&amp;far=T&amp;bg=FF0000&amp;f=png&amp;sia='.$content['image'] ,array( 'width'=> 90 ,'height'=> 90 ,'align' => 'right','alt' => $content['title']));
								
								?>
							<p align="justify">
								<?php echo $shorten->shortenText($content['intro'], 220)  ?>
                                </p>
</div>								
						 <?php endforeach ?> 
