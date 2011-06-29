<?php

$data = array();

foreach ($nodes as $node){
      if($node['Menu']['deleted'] == 0){
	$data[] = array(
		"text" => $node['Menu']['title'], 
		"id" => $node['Menu']['id'],
		"cls" => "folder",
		"leaf" => ($node['Menu']['lft'] + 1 == $node['Menu']['rght']),
		//"leaf" => (true)
		"href" => "/admin/menus/edit/".$node['Menu']['id']
	);
      }
}
echo $javascript->object($data);

?>