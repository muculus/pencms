<?php
class TemplatesController extends AppController {

	var $name = 'Templates';
	

	function admin_paging() {
		$this->Template->recursive = 0;
		$filters = $this->Template->getFilters($this->passedArgs);
		$this->set('templates', $this->paginate('Template', $filters));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Template.', true), 'default', array(), 'error');
			$this->redirect(array('action'=>'index'));
		}
		$template = $this->Template->read(null, $id);
		$this->set('template', $template);
		$this->set('siteLayoutsFormAction', '/admin/site_layout/add/template/'.$id);
	}

	function admin_form($form_action = 'add', $id = null) {
		if(!empty($id)){
			$template = $this->Template->read(null, $id);
			$this->set('template', $template);
		}
		if (!empty($this->data)) {
			$this->Template->create();
			if ($this->Template->save($this->data)) {
				$this->Session->setFlash(__('The Template has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'add'));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The Template could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Template'] = array();
			if(!empty($template)){
				$this->data = $template;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Template'][$fieldName] = $value;
			}
		}
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('form_action', $form_action);
	}
}
?>