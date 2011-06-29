
<?php 
$elementContent = $this->requestAction(array('controller' => $controllerName,
									         'action' => 'setElement'),
									          array('named' => array('limit' => $limit,
																	 'fields' => $fields,
																	 'order' => $order,
																	 'conditions' => $conditions)));
                                                                     ?>
				
					
                    <?php foreach($elementContent as $content): ?>
						<div class="ja-innerdiv clearfix">
						<h5 style="margin: 0pt 0pt 10px;">
                        <?php echo $html->link( $content['Article']['title'], '/articles/view/'.$content['Article']['id']);?></center>
                        </h5>
						<?php  echo $shorten->shortenText($content['Article']['intro'], 300)?></div>
                         <?php endforeach ?> 