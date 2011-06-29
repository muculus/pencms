<?php
class LibrariesController extends AppController {

	var $name = 'Libraries';
   	
	function admin_paging() {
		$this->Library->recursive = 0;
		$filters = $this->Library->getFilters($this->passedArgs);
		$this->set('libraries', $this->paginate('Library', $filters));
		if (!empty($this->passedArgs)){			
			$this->set('filters' , $this->passedArgs);
		}else{
			$this->set('filters' , array('library_category_id' => null));
		}
	}

	function admin_form($form_action = 'add', $id = null, $cat_id = null) {
		if(!empty($id)){
			$library = $this->Library->read(null, $id);
			$this->set('library', $library);
		}
		if (!empty($this->data)) {
			$this->Library->create();
			if ($this->Library->save($this->data)) {
				$this->Session->setFlash(__('The Library has been saved', true), 'default', array(), 'info');
				$this->redirect($this->referer(array('action' => 'index', $this->passedArgs)));
			} else {
				$this->Session->setFlash(__('The Library could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Library'] = array();
			if(!empty($library)){
				$this->data = $library;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Library'][$fieldName] = $value;
			}
		}
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('cat_id', $this->passedArgs );
		$this->set('form_action', $form_action);
	}
}
?>