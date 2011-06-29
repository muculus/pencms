<?php
class ReadersController extends AppController {

	var $name = 'Readers';

	function admin_paging() {
		$this->Reader->recursive = 2;
		$filters = $this->Reader->getFilters($this->passedArgs);
		$this->set('readers', $this->paginate('Category', $filters));
	}

	function admin_form($form_action = 'add', $id = null) {
		if(!empty($id)){
			$reader = $this->Reader->read(null, $id);
			$this->set('reader', $reader);
		}
		if (!empty($this->data)) {
			$this->data['Category']['Category']=$this->data['Reader']['category'];
			$this->Reader->create();
			if ($this->Reader->save($this->data)) {
				$this->Session->setFlash(__('The Reader has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The Reader could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Reader'] = array();
			if(!empty($reader)){
				$this->data = $reader;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Reader'][$fieldName] = $value;
			}
		}
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('form_action', $form_action);
		$categories = $this->Reader->Category->find('list', array('conditions' => array('Category.cat_type' => '2' ,"AND" => array('Category.widgetset' => 'readers'))));
		$this->set(compact('categories'));		
		if(isset($this->data['Category'])){
			$selectedCategories = $this->getSelectedItems($this->data['Category']);
			$this->set('selectedCategories', $selectedCategories);
		}
	}

	function reader() {
		// import XML class
		App::import('Xml');
		// your XML file's location	   
		// now parse it
		$parsed_xml =& new XML($this->passedArgs['file']);
		$parsed_xml = Set::reverse($parsed_xml);
		 // this is what i call magic
		$m= $parsed_xml;
	  	return $m;
  	}
}
?>