<?php 
$elementContent = $this->requestAction(array('controller' => $controllerName,
											 'action' => 'setElement'),
									   		 array('named' => array('limit' => $limit,
																	'fields' => $fields,
																	'order' => $order,
																	'conditions' => $conditions,
																	'categoryFields' => $categoryFields,
																	 'className' =>$className
																	)
												   ));
?>
	
	<ul class="ja-bullettin clearfix">
						<?php foreach($elementContent as $element){
								foreach($element['Article'] as $content){ ?>
								<li>
								<?php //pr($content); ?>
							<div style="padding-right: 70px;"><a href="<?php echo $html->url(array('controller' => $controllerName, 'action' => 'view', $content['id']))."/t:".$content['title']; ?>"><?php echo $content['title'] ?></a><br /><span>بازدید: <?php echo $content['hits'] ?></span></div>
							<?php
								echo $html->image( '/imagephp/phpThumb.php?src=/app/webroot/img/category/picture'."/".$element['Category']['picture'].'&amp;w=60&amp;h=50&amp;far=B&amp;bg=FF0000&amp;f=png&amp;sia='.$element['Category']['picture'] ,array( 'width'=> 60 ,'height'=> 50 ,'class' => 'item','alt' => $content['title']));
								?>
								</li>
						 <?php }} ?> 
							</ul>