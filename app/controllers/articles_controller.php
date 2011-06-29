<?php
class ArticlesController extends AppController {

    var $name = 'Articles';
	var $helpers = array('Html', 'Form', 'Javascript', 'Cksource', 'Js'); 
	function admin_paging() {
		$this->Article->recursive = 2;
		$filters = $this->Article->getFilters($this->passedArgs );
		$this->set('articles', $this->paginate('Category', $filters));
		if (!empty($this->passedArgs)){			
 			$this->set('filters' , $this->passedArgs);
		}else{
			$this->set('filters' , array('article_category_id' => null));
		}
	}
	
	function admin_form($form_action = 'add', $id = null, $cat_id = null) {

		if(!empty($id)){
			$article = $this->Article->read(null, $id);
			$this->set('article', $article);
		}
		
		if (!empty($this->data)) {
			$this->data['Category']['Category']=$this->data['Article']['category'];
			$this->Article->create();
			if ($this->Article->save($this->data)) {	
				$this->Session->setFlash(__('The Article has been saved', true), 'default', array(), 'info');
				$this->redirect($this->referer(array('action' => 'index', $this->passedArgs)));
			} else {
				$this->Session->setFlash(__('The Article could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Article'] = array();
			if(!empty($article)){
				$this->data = $article;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Article'][$fieldName] = $value;
			}
		}
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
 		$this->set('cat_id', $this->passedArgs );
		$categories = $this->Article->Category->find('list', array('conditions' => array('Category.cat_type' => '2' ,"AND" => array('Category.widgetset' => 'articles'))));
		$this->set(compact('categories'));
		$this->set('form_action', $form_action);
		if(isset($this->data['Category'])){
			$selectedCategories = $this->getSelectedItems($this->data['Category']);
			$this->set('selectedCategories', $selectedCategories);
		}
		
	}
	
	/*
	/**
	 * Change old cms database to new version
	function change(){
		$article = $this->Article->find('all', array('conditions' => array('Article.widget_id' => 205)));
		$i=0;
		foreach($article as $data) {
			$this->data['Article']['id'] = $data['Article']['id'];
			$this->data['Article']['metakey'] = $data['Article']['metakey'];
			$this->data['Category']['id'] = 775;
			if($this->Article->save($this->data)) {
				pr($this->data);
				echo "SuccessFully";
			}
		
		}
	}*/
}
?>
