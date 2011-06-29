<?php
class LinksController extends AppController {

	var $name = 'Links';
	
	function admin_paging() {
		$this->Link->recursive = 2;
		$filters = $this->Link->getFilters($this->passedArgs);
		$this->set('links', $this->paginate('Category', $filters));
		if (!empty($this->passedArgs)){			
			$this->set('filters' , $this->passedArgs);
		}else{
			$this->set('filters' , array('link_category_id' => null));
		}
	}

	function admin_form($form_action = 'add', $id = null, $cat_id = null) {
		if(!empty($id)){
			$link = $this->Link->read(null, $id);
			$this->set('link', $link);
		}
		if (!empty($this->data)) {
			$this->Link->create();
			$this->data['Category']['Category']=$this->data['Link']['category'];
			if ($this->Link->save($this->data)) {
				$this->Session->setFlash(__('The Link has been saved', true), 'default', array(), 'info');
				$this->redirect($this->referer(array('action' => 'index', $this->passedArgs)));
			} else {
				$this->Session->setFlash(__('The Link could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Link'] = array();
			if(!empty($link)){
				$this->data = $link;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Link'][$fieldName] = $value;
			}
		}
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('cat_id', $this->passedArgs );
		$this->set('form_action', $form_action);
		$categories = $this->Link->Category->find('list', array('conditions' => array('Category.cat_type' => '2' ,"AND" => array('Category.widgetset' => 'links'))));
		$this->set(compact('categories'));
		if(isset($this->data['Category'])){
			$selectedCategories = $this->getSelectedItems($this->data['Category']);
			$this->set('selectedCategories', $selectedCategories);
		}

	}
}
?>