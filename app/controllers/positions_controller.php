<?php
class PositionsController extends AppController {

	var $name = 'Positions';

	function admin_paging() {
		$this->Position->recursive = 0;
		$filters = $this->Position->getFilters($this->passedArgs);
		$this->set('positions', $this->paginate('Position', $filters));
	}

	function admin_form($form_action = 'add', $id = null) {
		if(!empty($id)){
			$position = $this->Position->read(null, $id);
			$this->set('position', $position);
		}
		if (!empty($this->data)) {
			$this->Position->create();
			if ($this->Position->save($this->data)) {
				$this->Session->setFlash(__('The Position has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The Position could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Position'] = array();
			if(!empty($position)){
				$this->data = $position;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Position'][$fieldName] = $value;
			}
		}
		$siteLayouts = $this->Position->SiteLayout->find('list');
		$this->set(compact('siteLayouts'));
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('form_action', $form_action);
	}
}
?>