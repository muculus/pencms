<?php
if ($this->params['action']=='paging'){
$myURL = $this->params['url']['url'] ;
if(isset($this->passedArgs['widget_id'])){  
$elementContent = $this->requestAction(array('controller' => 'widgets',
									         'action' => 'setElement'),
									          array('named' => array('limit' => 1,
																	 'fields' => ('name'),
																	 'order' => '',
																	 'conditions' => array('id'=>$this->passedArgs['widget_id']))));
																	 
echo '<a href="http://daneshfa.com">خانه</a> | <a href="'.$myURL.'" >'.$elementContent[0]['Widget']['name'].'</a>';}

 

if ($this->params['action']=='view'){
$myURL = $this->params['url']['url'] ;
if ($this->params['controller']=='articles'){
$elementContent = $this->requestAction(array('controller' => 'widgets',
									         'action' => 'setElement'),
									          array('named' => array('limit' => 1,
																	 'fields' => ('name'),
																	 'order' => '',
																	 'conditions' => array('id'=>$rows[0]['Article']['widget_id']))));$myURL2 = "http://daneshfa.com/".$this->params['controller']."/paging/widget_id:".$rows[0]['Article']['widget_id'];																

if(isset($elementContent[0]['Widget']['name'])){echo '<a href="http://daneshfa.com">خانه</a> | <a href="'.$myURL2.'">'.$elementContent[0]['Widget']['name'].'</a> |<a href="'.$myURL.'" >'.$this->pageTitle.'</a>';}
																	 }
																	 if ($this->params['controller']=='news'){
$elementContent = $this->requestAction(array('controller' => 'widgets',
									         'action' => 'setElement'),
									          array('named' => array('limit' => 1,
																	 'fields' => ('name'),
																	 'order' => '',
																	 'conditions' => array('id'=>$rows[0]['News']['widget_id']))));
																$myURL2 = "http://daneshfa.com/".$this->params['controller']."/paging/widget_id:".$rows[0]['News']['widget_id'];																
if(isset($elementContent[0]['Widget']['name'])){echo '<a href="http://daneshfa.com">خانه</a> | <a href="'.$myURL2.'">'.$elementContent[0]['Widget']['name'].'</a> |<a href="'.$myURL.'" >'.$this->pageTitle.'</a>';	 }
																	 }
																	 


}}
?>