<?php
class TellFirendsController extends AppController {

	var $name = 'TellFirends';

	function admin_paging() {
		$this->TellFirend->recursive = 0;
		$filters = $this->TellFirend->getFilters($this->passedArgs);
		$this->set('tellFirends', $this->paginate('TellFirend', $filters));
	}

	function admin_form($form_action = 'add', $id = null) {
		if(!empty($id)){
			$tellFirend = $this->TellFirend->read(null, $id);
			$this->set('tellFirend', $tellFirend);
		}
		if (!empty($this->data)) {
			$this->TellFirend->create();
			if ($this->TellFirend->save($this->data)) {
				$this->Session->setFlash(__('The TellFirend has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The TellFirend could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['TellFirend'] = array();
			if(!empty($tellFirend)){
				$this->data = $tellFirend;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['TellFirend'][$fieldName] = $value;
			}
		}
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('form_action', $form_action);
	}
}
?>