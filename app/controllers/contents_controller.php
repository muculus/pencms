<?php
class ContentsController extends AppController {

	var $name = 'Contents';

	function admin_paging() {
		$this->Content->recursive = 2;
		$filters = $this->Content->getFilters($this->passedArgs);
		//$filters[1]= array('deleted' => '0');
		$this->set('contents', $this->paginate('Category', $filters));
		if (!empty($this->passedArgs)){			
 			$this->set('filters' , $this->passedArgs);
		}else{
			$this->set('filters' , array('content_category_id' => null));
		}
	}


	function admin_form($form_action = 'add', $id = null, $cat_id = null) {
		if(!empty($id)){
			$content = $this->Content->read(null, $id);
			$this->set('content', $content);
		}
		if (!empty($this->data)) {
			$this->data['Category']['Category']=$this->data['Content']['category'];			
			$this->Content->create();
			if ($this->Content->save($this->data)) {
				$this->Session->setFlash(__('The Content has been saved', true), 'default', array(), 'info');
				$this->redirect($this->referer(array('action' => 'index', $this->passedArgs)));
			} else {
				$this->Session->setFlash(__('The Content could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		} else {
			$this->data = array();
			$this->data['Content'] = array();
			if(!empty($content)){
				$this->data = $content;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Content'][$fieldName] = $value;
			}
		}
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
 		$this->set('cat_id', $this->passedArgs );
		$this->set('form_action', $form_action);
		$categories = $this->Content->Category->find('list', array('conditions' => array('Category.cat_type' => '2' ,"AND" => array('Category.widgetset' => 'contents'))));
		$this->set(compact('categories'));
		if(isset($this->data['Category'])){
			$selectedCategories = $this->getSelectedItems($this->data['Category']);
			$this->set('selectedCategories', $selectedCategories);
		}

	}
}
?>