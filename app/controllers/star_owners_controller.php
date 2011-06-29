<?php
class StarOwnersController extends AppController {

	var $name = 'StarOwners';

	function admin_paging() {
		$this->StarOwner->recursive = 0;
		$filters = $this->StarOwner->getFilters($this->passedArgs);
		$this->set('starOwners', $this->paginate('StarOwner', $filters));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid StarOwner.', true), 'default', array(), 'error');
			$this->redirect(array('action'=>'index'));
		}
		$starOwner = $this->StarOwner->read(null, $id);
		$this->set('starOwner', $starOwner);
		$this->set('starsFormAction', '/admin/star/add/star_owner/'.$id);
	}

	function admin_form($form_action = 'add', $id = null, $cat_id = null) {
		if(!empty($id)){
			$starOwner = $this->StarOwner->read(null, $id);
			$this->set('starOwner', $starOwner);
		}
		if (!empty($this->data)) {
			$this->StarOwner->create();
			if ($this->StarOwner->save($this->data)) {
				$this->Session->setFlash(__('The StarOwner has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The StarOwner could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['StarOwner'] = array();
			if(!empty($starOwner)){
				$this->data = $starOwner;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['StarOwner'][$fieldName] = $value;
			}
		}
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('cat_id', $this->passedArgs );
		$this->set('form_action', $form_action);
	}

	function form1() {	
		if (!empty($this->data)) {
			$this->StarOwner->create();
			$this->StarOwner->recursive=2;
			if ($this->StarOwner->save($this->data)) {
				$this->Session->setFlash(__('The StarOwner has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The StarOwner could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['StarOwner'] = array();
			if(!empty($starOwner)){
				$this->data = $starOwner;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['StarOwner'][$fieldName] = $value;
			}
		}
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('cat_id', $this->passedArgs );
		$this->set('form_action', $form_action);
	}
}
?>