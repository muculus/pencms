<?php
class VisitsController extends AppController {
		
	var $name = 'Visits';
	
	function visit() {
		$visit = $this->Visit->find('first', array('order' => array('Visit.id DESC')));
		$date_array = getdate();
		if (!isset($_SESSION['visit'])){
			$date_array = getdate(); 
			if ($visit['Visit']['last_day']==$date_array['mday']){
				$visit['Visit']['day']++;
			} else {
				$visit['Visit']['yesterday']=$visit['Visit']['day'];
				$visit['Visit']['day']=1;
			}
			if ($visit['Visit']['last_month']==$date_array['mon']){
				$visit['Visit']['mon']++;
			} else {
				$visit['Visit']['mon']=1;
			}
			if ($visit['Visit']['last_year']==$date_array['year']){
				$visit['Visit']['year']++;
			} else {
				$visit['Visit']['year']=1;
			}
			$visit['Visit']['visit']++;
			$visit['Visit']['last_day']=$date_array['mday'];
			$visit['Visit']['last_month']=$date_array['mon'];
			$visit['Visit']['last_year']=$date_array['year'];
			$this->Visit->create();
			if ($this->Visit->save($visit)) {
			}
			$_SESSION['visit']='ok';						
	}
			
	return $visit;}
}
?>