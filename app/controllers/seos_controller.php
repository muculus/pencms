<?php
class SeosController extends AppController {

	var $name = 'Seos';

	function admin_paging() {
		$this->Seo->recursive = 0;
		$filters = $this->Seo->getFilters($this->passedArgs);
		$this->set('seos', $this->paginate('Seo', $filters));
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
}
?>