<?php
class SettingsController extends AppController {

	var $name = 'Settings';

	function admin_paging() {
		$this->Setting->recursive = 0;
		$filters = $this->Setting->getFilters($this->passedArgs);
		$this->set('settings', $this->paginate('Setting', $filters));
	}

	function admin_form($form_action = 'add', $id = null) {
		if(!empty($id)){
			$setting = $this->Setting->read(null, $id);
			$this->set('setting', $setting);
		}
		if (!empty($this->data)) {
			$this->Setting->create();
			if ($this->Setting->save($this->data)) {
				$this->Session->setFlash(__('The Setting has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The Setting could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Setting'] = array();
			if(!empty($setting)){
				$this->data = $setting;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Setting'][$fieldName] = $value;
			}
		}
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('form_action', $form_action);
	}
}
?>