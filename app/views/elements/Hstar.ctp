<?php 
$elementContent = $this->requestAction(array('controller' => $controllerName,
									         'action' => 'setElement'),
									          array('named' => array('limit' => $limit,
																	 'fields' => $fields,
																	 'order' => $order,
																	 'conditions' => $conditions)));
$modelName = Inflector::classify($controllerName);
?>
<div class="modContent">
                    <table cellpadding="0" cellspacing="0" width="100%" class="maintbl">
                        <tr>
						 <?php foreach($elementContent as $content): ?>
                            <td>
							
                                <table cellpadding="0" cellspacing="0" class="advertbl">
                                    <tr class="picsRow">
									
                                    	<td class="picCell"><img src="images/satar_adver.png" width="90" height="90" /></td>
                                        <td class="starCell">
										<?php echo $html->image('stars/'.$content['Star']['star'].'.png')?>
										</td>
                                    </tr>
                                    <tr class="descRow">
                                    	<td colspan="2" class="descCell"><span> 
										<?php echo $html->link( $content['Star']['title'], '/stars/view/'.$content['Star']['id']);?>
										                                </span></td>                        </tr>
                                </table>     
                            </td>
                            
   					    <?php endforeach ?>
					</tr></table>
</div>                            