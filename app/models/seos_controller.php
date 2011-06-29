<?php
class SeosController extends AppController {

	var $name = 'Seos';
	var $helpers = array('Html', 'Form');

	function index() {
	}

	function paging() {
		$this->Seo->recursive = 0;
		$filters = $this->Seo->getFilters($this->passedArgs);
		$this->set('seos', $this->paginate('Seo', $filters));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Seo.', true), 'default', array(), 'error');
			$this->redirect(array('action'=>'index'));
		}
		$seo = $this->Seo->read(null, $id);
		$this->set('seo', $seo);
	}

	function form($form_action = 'add', $id = null) {
		if(!empty($id)){
			$seo = $this->Seo->read(null, $id);
			$this->set('seo', $seo);
		}
		if (!empty($this->data)) {
			$this->Seo->create();
			if ($this->Seo->save($this->data)) {
				$this->Session->setFlash(__('The Seo has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The Seo could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Seo'] = array();
			if(!empty($seo)){
				$this->data = $seo;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Seo'][$fieldName] = $value;
			}
		}
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('form_action', $form_action);
	}

	function add() {
	}

	function edit($id = null) {
		$this->set('id', $id);
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Seo', true), 'default', array(), 'error');
		} else {
			$this->Seo->del($id);
			$this->Session->setFlash(__('Seo deleted', true), 'default', array(), 'info');
		}
		$this->redirect($this->referer(array('action'=>'index')));
	}

	function undelete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Seo', true), 'default', array(), 'error');
		} else {
			$this->Seo->undelete($id);
			$this->Session->setFlash(__('Seo restored', true), 'default', array(), 'info');
		}
		$this->redirect($this->referer(array('action'=>'index')));
	}

	function hard_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Seo', true), 'default', array(), 'error');
		} else {
			$this->Seo->hardDelete($id);
			$this->Session->setFlash(__('Seo deleted', true), 'default', array(), 'info');
		}
		$this->redirect($this->referer(array('action'=>'index')));
	}


	function admin_index() {
	}

	function admin_paging() {
		$this->Seo->recursive = 0;
		$filters = $this->Seo->getFilters($this->passedArgs);
		$this->set('seos', $this->paginate('Seo', $filters));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Seo.', true), 'default', array(), 'error');
			$this->redirect(array('action'=>'index'));
		}
		$seo = $this->Seo->read(null, $id);
		$this->set('seo', $seo);
	}

	function admin_form($form_action = 'add', $id = null) {
		if(!empty($id)){
			$seo = $this->Seo->read(null, $id);
			$this->set('seo', $seo);
		}
		if (!empty($this->data)) {
			$this->Seo->create();
			if ($this->Seo->save($this->data)) {
				$this->Session->setFlash(__('The Seo has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The Seo could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Seo'] = array();
			if(!empty($seo)){
				$this->data = $seo;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Seo'][$fieldName] = $value;
			}
		}
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('form_action', $form_action);
	}

	function admin_add() {
	}

	function admin_edit($id = null) {
		$this->set('id', $id);
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Seo', true), 'default', array(), 'error');
		} else {
			$this->Seo->del($id);
			$this->Session->setFlash(__('Seo deleted', true), 'default', array(), 'info');
		}
		$this->redirect($this->referer(array('action'=>'index')));
	}

	function admin_undelete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Seo', true), 'default', array(), 'error');
		} else {
			$this->Seo->undelete($id);
			$this->Session->setFlash(__('Seo restored', true), 'default', array(), 'info');
		}
		$this->redirect($this->referer(array('action'=>'index')));
	}

	function admin_hard_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Seo', true), 'default', array(), 'error');
		} else {
			$this->Seo->hardDelete($id);
			$this->Session->setFlash(__('Seo deleted', true), 'default', array(), 'info');
		}
		$this->redirect($this->referer(array('action'=>'index')));
	}

}
?>