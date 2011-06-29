

					
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
<div class="ja-slidenews-item clearfix">
<h4><a href="<?php echo $html->url(array('controller' => $controllerName, 'action' => 'view', $content['Download']['id']))."/t:".$content['Download']['title']; ?>"><?php echo $content['Download']['title'] ?></a></h4>
                                   <?php
								echo $html->image( '/'.$content['Download']['picture_dir'].'/thumb.small.'.$content['Download']['picture'] ,array(  'alt' => $content['Download']['title'], 'align'=>'right' ));
								?>
                               									
                             
							 <?php echo $shorten->shortenText($content['Download']['description'], 250)   ?>	
																	
                             </div>
						 <?php endforeach ?>