
<p>
<?php 
$massage = $this->requestAction(array('controller' => 'messages',
											 'action' => 'last'));
	echo $html->link($shorten->shortenText($massage['Message']['title'] ,100), array('controller' => 'messages', 'action' => 'view', $massage['Message']['id'])); ?>

									 

</p>