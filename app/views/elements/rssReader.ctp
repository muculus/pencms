<?php 
$elementContent = $this->requestAction(array('controller' => 'readers',
											 'action' => 'setElement'),
									   		 array('named' => array('limit' => '',
																	'fields' =>  array('Reader.id', 'Reader.url', 'Reader.number'),
																	'order' => '',
																	'conditions' => '',
																	 'className' =>''
																	)
												   ));
	
   
 		echo "<ul>";									   
//pr($elementContent);											   
 foreach ($elementContent[68]['Reader'] as $xmlFile){
 
  $xmlread= $this->requestAction(array('controller' => 'readers',
											 'action' => 'reader'),
									   		 array('named' => array('file' =>$xmlFile['url'] ,'f'=>'')));
											 for ($i=0; $i<$xmlFile['number']; $i++){
											 echo '<li><a href="'.$xmlread['Rss']['Channel']['Item'][$i]['link'].'" >'.$xmlread['Rss']['Channel']['Item'][$i]['title']."</a></li>";
											 }
											 //pr($xmlread);
 
 }
 
 ?>
 </ul>