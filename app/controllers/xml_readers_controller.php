<?php
class XmlReadersController extends AppController {

	var $name = 'XmlReaders';

	function admin_index() {
	}

	function admin_paging() {
		$this->XmlReader->recursive = 0;
		$filters = $this->XmlReader->getFilters($this->passedArgs);
		$this->set('xmlReaders', $this->paginate('XmlReader', $filters));
	}

	function admin_form($form_action = 'add', $id = null) {
		if(!empty($id)){
			$xmlReader = $this->XmlReader->read(null, $id);
			$this->set('xmlReader', $xmlReader);
		}
		if (!empty($this->data)) {
			$this->XmlReader->create();
			if ($this->XmlReader->save($this->data)) {
				$this->Session->setFlash(__('The XmlReader has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The XmlReader could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['XmlReader'] = array();
			if(!empty($xmlReader)){
				$this->data = $xmlReader;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['XmlReader'][$fieldName] = $value;
			}
		}
		$widgets = $this->XmlReader->Widget->find('list');
		$this->set(compact('widgets'));
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('form_action', $form_action);
	}

	function finda(){
		$this->XmlReader->find('list');
	}
}
?>