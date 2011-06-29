
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
?>

<?php foreach($elementContent as $content): ?>
<h4><a href="<?php echo $html->url(array('controller' => $controllerName, 'action' => 'view', $content['Download']['id']))."/t:".$content['Download']['title']; ?>"><?php echo $content['Download']['title'] ?></a></h4>
								<li><?php
								echo $html->image( '/'.$content['Download']['picture_dir'].'/thumb.small.'.$content['Download']['picture'] ,array( 'class' => '', 'alt' => $content['Download']['title'] ,'align'=>'right'));
								?>
							<p align="justify">
								<?php echo $shorten->shortenText($content['Download']['description'], 300)  ?>
                                </p>
								<br>
						 <?php endforeach ?> 
