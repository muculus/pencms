<?php
class LinkerHelper extends AppHelper {
	function  makeUrl($link){
  		if (strncmp($link,"http://",7) == 0){
  			return $this->output($link);
  		} else {
  			return 'http://'.$link;
  		}
	}
}
?>