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
<div id="lastArticles">
	<ul>
    <?php foreach($elementContent as $content): ?>	
        <li><a href="<?php echo $html->url(array('controller' => $controllerName, 'action' => 'view', $content['Article']['id']))."/t:".$content['Article']['title']; ?>"><?php echo $content['Article']['title'] ?></a>
		<span class="style01">نویسنده:<?php echo $content['Article']['author'] ?></span><br /><span class="style02"><?php $val = explode(" ",$content['Article']['publish_date']);
		$date = explode("-",$val[0]);
		echo $date[0].'/'.$date[2].'/'.$date[1]; ?></span></li>
    <?php endforeach ?> 
    </ul>
</div>