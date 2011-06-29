<?php
if ($this->params['action']=='paging'){
if(isset($this->passedArgs['widget_id'])){
$myURL = $this->params['url']['url'] ;
$elementContent = $this->requestAction(array('controller' => 'widgets',
									         'action' => 'setElement'),
									          array('named' => array('limit' => 1,
																	 'fields' => ('name'),
																	 'order' => '',
																	 'conditions' => array('id'=> $this->passedArgs['widget_id']))));
echo '<h1 class="componentheading">'.$elementContent[0]['Widget']['name'].'</h1>';}
}
?>