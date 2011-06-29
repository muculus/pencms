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
	<ul class="xoxo blogroll">
    <?php foreach($elementContent[0]['Link'] as $content): ?>
	
	
								
        <li><a class="" href="<?php echo $content['link_url'] ?>"><?php echo $content['title'] ?></a></li>
		
    <?php endforeach ?> 
    </ul>
	