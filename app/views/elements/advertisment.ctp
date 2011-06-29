<?php
$elementContent = $this->requestAction(array('controller' => 'advertisements',
											 'action' => 'setElement'),
									   array('named' => array('limit' => 5,
															  'fields' =>  array('Advertisement.id', 'Advertisement.dir', 'Advertisement.picture', 'Advertisement.link_url','Advertisement.position'),
															  'order' =>array('Advertisement.position '),
															  'conditions' => '')));
															 
															  
								$j=0;
						for ($i=1;$i<=5;$i++){
						if ($elementContent[$j]['Advertisement']['position']==$i){
														  
															  
	 echo $html->link($html->image('/'.$elementContent[$j]['Advertisement']['dir'].'/'.$elementContent[$j]['Advertisement']['picture'], array('width' => '192', 'height' => '75', 'border' => '0')),$elementContent[$j]['Advertisement']['link_url'],null, null, false);
	 $j++; 
	 }else{
	 echo $html->link($html->image("advertisment.png", array('width' => '192', 'height' => '75', 'border' => '0')),
					"javascript:void(0)",
					null, null, false);
					}
					}
					?>