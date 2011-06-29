<?php
class StarsController extends AppController {

	var $name = 'Stars';
  	var $paginate = array(
			'limit' => 5,        
			'order' => array(
			'Star.star' => 'desc'
               )
    );

	function admin_paging() {
		$this->Star->recursive = 0;
		$filters = $this->Star->getFilters($this->passedArgs);
		$this->set('stars', $this->paginate('Star', $filters));
	}

	function admin_form($form_action = 'add', $id = null, $cat_id = null) {
		if(!empty($id)){
			$star = $this->Star->read(null, $id);
			$this->set('star', $star);
		}
		if (!empty($this->data)) {
			$this->Star->create();
			if ($this->Star->save($this->data)) {
				$this->Session->setFlash(__('The Star has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The Star could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Star'] = array();
			if(!empty($star)){
				$this->data = $star;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Star'][$fieldName] = $value;
			}
		}
		$categories = $this->Star->Category->find('list');
		$starOwners = $this->Star->User->find('list');
		$this->set(compact('categories', 'starOwners'));
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('cat_id', $this->passedArgs );
		$this->set('form_action', $form_action);
	}

	function index2() {
		
	}
	
	/* this code for register star advertismebt */
	function form1() {
		if (!empty($this->data)) {
			$this->Star->create();
			if ($this->Star->save($this->data)) {
				$this->Session->setFlash(__('The Star has been saved', true), 'default', array(), 'info');
			}
	   }
   }
   
   /* this code for show advertisment in pages */
	function  all() {
		$stars = $this->paginate('Star');
		$this->set('stars', $stars);
	}
}
?>