<?php
class OnlinesController extends AppController {
		
	var $name = 'Onlines';
	
	function online() {
			$timestamp = time();
			$timeout = $timestamp-300;
			$online['Online']['timestamp']=$timestamp;
			$online['Online']['ip']=$_SERVER['REMOTE_ADDR'];
			$online['Online']['file']="";
			$this->Online->create();
				if ($this->Online->save($online)) {
				}
				$this->Online->query("DELETE FROM onlines WHERE timestamp < $timeout ;");
				$online = $this->Online->find('count' , array( 'fields' => 'COUNT(DISTINCT Online.ip) as count'));
	return $online;
	}
}
?>