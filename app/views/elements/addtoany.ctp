<?php 
$elementContent = $this->requestAction(array('controller' => 'tell_firends',
									         'action' => 'setElement'),
									          array('named' => array('limit' => 6,
																	 'fields' => ('id,title ,picture, picture_dir, url'),
																	 'order' => '',
																	 'conditions' => '')));
	$addToAnyURL = "http://andishesara.com/".$this->params['controller']."/".$this->params['action']."/".$this->params['pass'][0];
																	 ?>
  <?php foreach($elementContent as $row): 
   $row['TellFirend']['url']=str_replace('(url)',$addToAnyURL , $row['TellFirend']['url']);
   $row['TellFirend']['url']= str_replace('(title)',$this->pageTitle , $row['TellFirend']['url']);
   echo  '<a href="'.$row['TellFirend']['url'] .'" >
<img src="'. '/'.$row['TellFirend']['picture_dir'].'/'.$row['TellFirend']['picture'] .'"  /></a>' ;
  
  endforeach; ?>