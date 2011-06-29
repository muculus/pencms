<?php
class SiteLayoutsController extends AppController {

	var $name = 'SiteLayouts';

	function admin_paging() {
		$this->SiteLayout->recursive = 0;
		$filters = $this->SiteLayout->getFilters($this->passedArgs);
		$this->set('siteLayouts', $this->paginate('SiteLayout', $filters));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid SiteLayout.', true), 'default', array(), 'error');
			$this->redirect(array('action'=>'index'));
		}
		$siteLayout = $this->SiteLayout->read(null, $id);
		$this->set('siteLayout', $siteLayout);
		$this->set('categoriesFormAction', '/admin/category/add/site_layout/'.$id);
		$this->set('formContents', $this->SiteLayout->Category->find('list'));
		$this->set('positionsFormAction', '/admin/position/add/site_layout/'.$id);
	}

	function admin_form($form_action = 'add', $id = null, $cat_id = null) {
		if(!empty($id)){
			$siteLayout = $this->SiteLayout->read(null, $id);
			$this->set('siteLayout', $siteLayout);
		}
		if (!empty($this->data)) {
			$this->SiteLayout->create();
			if ($this->SiteLayout->save($this->data)) {
				$this->Session->setFlash(__('The SiteLayout has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'add'));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The SiteLayout could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['SiteLayout'] = array();
			if(!empty($siteLayout)){
				$this->data = $siteLayout;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['SiteLayout'][$fieldName] = $value;
			}
		}
		$templates = $this->SiteLayout->Template->find('list');
		foreach($this->layoutList as $key) {
				$layoutList[$key] = $key;//in this foreach we convert a flat array to $key=>$value array for generate list
		}
		$this->set(compact('templates', 'layoutList'));
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('cat_id', $this->passedArgs );
		$this->set('form_action', $form_action);
	}
}
?>