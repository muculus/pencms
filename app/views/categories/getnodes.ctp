<?php

$data = array();

foreach ($nodes as $node){
      if($node['Category']['deleted'] == 0){
	$data[] = array(
		"text" => $node['Category']['title'], 
		"id" => $node['Category']['id'],
		"cls" => "folder",
		"leaf" => ($node['Category']['lft'] + 1 == $node['Category']['rght']),
		//"leaf" => (true)
		"href" => "/admin/".$node['Category']['widgetset']."/index/Category.id:".$node['Category']['id']
	);
      }
}

echo $javascript->object($data);

?>