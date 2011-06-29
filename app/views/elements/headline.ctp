<?php 
/*$elementContent = $this->requestAction(array('controller' => $controllerName,
											 'action' => 'setElement'),
									   		 array('named' => array('limit' => $limit,
																	'fields' => $fields,
																	'categoryFields' => $categoryFields,
																	'order' =>$order,
																	'conditions' => $conditions,
																	 'className' =>$className
																	)
												   ));*/
$elementContent = $this->requestAction(array('controller' => $controllerName, 'action' => 'setElement'), 
array('named' => array('limit' => $limit,
		  'fields' => $fields,
		  'categoryFields' => $categoryFields,
		  'order' =>$order,
		  'conditions' => $conditions)));

												$modelName = Inflector::classify($controllerName);

										   
?>

	
    <?php   foreach($elementContent as $element){ 
	foreach($element[$modelName] as $content){ ?>
	
    <div class="ja-headlines-item jahl-horizontal" style="visibility:visible;  margin-top: -18px; *margin-top: -5px;	">
      <a href="http://daneshfa.com/<?php echo $html->url(array('controller' => $controllerName, 'action' => 'view', $content['id']))."/t:".$content['title']; ?>"><?php echo $content['title'] ?></a>
      </div>
	  
      
    <?php }} ?> 
    