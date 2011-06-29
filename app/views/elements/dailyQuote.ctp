<?php 
$elementContent = $this->requestAction(array('controller' => $controllerName,
											 'action' => 'setElement'),
									   		 array('named' => array('limit' => $limit,
																	'fields' => $fields,
																	'order' => $order,
																	'conditions' => $conditions,
																	 'className' =>$className
																	)));
?>


    <?php foreach($elementContent as $content): ?>	
        <div><?php echo $content['Dailyquote']['content'];	?></div>
    <?php endforeach ?> 
