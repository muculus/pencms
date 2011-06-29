<?php
$elementContent = $this->requestAction(array('controller' => $controllerName,
									         'action' => 'child'),
											 array('named' => array('catId' => $catId,
																	'limit' => $limit)));	
$modelName = Inflector::classify($controllerName);//pr($elementContent[0]);
?>
<div class="<?php echo $className ?>">
    <ul>
    <?php foreach($elementContent as $content): ?>
        <li><a href="<?php echo $html->url(array('controller' => $controllerName, 'action' => 'view', $content[$modelName]['id'])) ?>"><?php echo $content[$modelName]['title'] ?><span class="small">&nbsp;بازید: <?php echo $content[$modelName]['hits'] ?></span></a></li>
	<?php endforeach ?> 
    </ul>
</div> 
