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
<li style="width: 210px; height: 180px;" class="content_element">
                    	<div class="inner">
							<div class="ja_slideimages clearfix">
								
							 <a href="" title="">
                                   <?php
							//	echo $html->image( '/'.$content['News']['image_dir'].'/thumb.small.'.$content['News']['image'] ,array(  'alt' => $content['News']['title'] ));
								echo $html->image( '/imagephp/phpThumb.php?src=/app/webroot/'.$content['News']['image_dir'].'/'.$content['News']['image'].'&amp;w=190&amp;h=100&amp;far=B&amp;bg=FF0000&amp;f=png&amp;sia='.$content['News']['image'] ,array( 'width'=> 190 ,'height'=> 100 ,'class' => 'item','alt' => $content['News']['title']));
								?>
                                 </a>									
                              </div>
							 <div class="ja_slidetitle">
								<a href="<?php echo $html->url(array('controller' => $controllerName, 'action' => 'view', $content['News']['id']))."/t:".$content['News']['title']; ?>"><?php echo $content['News']['title'] ?></a>	 
							 </div>  
                             <div class="ja_slideintro">
							 <?php echo $shorten->shortenText($content['News']['intro'], 80)   ?>	
																	
                               </div>
						</div>
</li>
<?php endforeach ?> 
