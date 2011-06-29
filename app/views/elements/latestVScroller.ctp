<?php 
$elementContent = $this->requestAction(array('controller' => $controllerName,
											 'action' => 'setElement'),
									   array('named' => array('limit' => $limit,
															  'fields' => $fields,
															  'categoryFields' => $categoryFields,
															  'order' =>$order,
															  'conditions' => $conditions)));
$modelName = Inflector::classify($controllerName);
//pr($conditions);
//pr($elementContent);

?>

    <ul class="jazin-links">
    <?php foreach($elementContent as $element){
			foreach($element[$modelName] as $content){ 
				//pr($element);	?>
        <li><a href="<?php echo $html->url(array('controller' => $controllerName, 'action' => 'view', $content['id'])) ?>"><?php echo $content['title'] ?><span class="small"> بازید: <?php echo $content['hits'] ?></span></a></li>
    <?php }} ?> 
    </ul>


