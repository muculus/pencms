<?php
$elementContent = $this->requestAction(array('controller' =>  $controllerName,
									         'action' => 'child'
											 ),array('named' => array('catId' => $catId, 'limit' => $limit )));
                                             ?>
                                             
<div class="<?php echo $className ?>">
    <ul>
    	<?php for($i = 0; $i < $totalChildren; $i++){
				  $random[$i] = $i;
			  }
			  srand((float)microtime() * 10000);
			  shuffle($random);
			  for($i = 0; $i < $totalChildren; $i++){ ?>
        	  <li><a href="<?php echo $html->url(array('controller' => $controllerName, 'action' => 'view', $elementContent[$random[$i]]['Category']['id'])) ?>"><?php echo $elementContent[$random[$i]]['Category']['title'] ?></a>&nbsp;<span class="small">&acute;      <?php echo $elementContent[$random[$i]]['Category']['hits'] ?>&nbsp;بازدید&acute;</span></li>
        <?php } ?>
    </ul>
</div>
