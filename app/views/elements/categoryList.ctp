<?php
$elementContent = $this->requestAction(array('controller' => $controllerName,
									         'action' => 'child'),
											 array('named' => array('catId' => $catId,
																	'limit' => $limit)));					
$modelName = Inflector::classify($controllerName);
?>
<div class="modContent">
    <ul>
    <?php foreach($elementContent as $content): ?>
        <li>
        <?php echo $html->link( $content[$modelName]['title'], array('controller' => $controllerName, 'action' => 'view', $content[$modelName]['id']));?>
        </li>
    <?php endforeach ?>
    </ul>
</div>