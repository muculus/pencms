<?php 
$elementContent = $this->requestAction(array('controller' => $controllerName,
									         'action' => 'setElement'),
									          array('named' => array('limit' => $limit,
																	 'fields' => $fields,
																	 'order' => $order,
																	 'conditions' => $conditions)));
$modelName = Inflector::classify($controllerName);
?>
<div class="<?php echo $className ?>">
    <ul>
    <?php foreach($elementContent as $content): ?>
        <li>
            <table cellpadding="0" cellspacing="0" class="thumb_desc_tbl">
                <tr class="thImage">
                    <td class="tdImage"><?php
					if (!empty ($content[$modelName]['dir'])){
					echo $html->image('/'.$content[$modelName]['dir'].'/thumb.small.'.$content[$modelName]['picture']);
					}
					else{
						echo $html->image('default.jpg');
					}
					
					?> </td>
                </tr>
                <tr class="description">
                    <td><a href="<?php echo $html->url(array('controller' => $controllerName, 'action' => 'view', $content[$modelName]['id'])) ?>" title="<?php echo $content[$modelName]['title'] ?>"><?php echo $content[$modelName]['title'] ?></a></td>
                </tr>
            </table>
        </li>
    <?php endforeach ?> 
    </ul>
</div> 