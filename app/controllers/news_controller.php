<?php
class NewsController extends AppController {

	var $name = 'News';

	function admin_paging() {
		$this->News->recursive = 0;
		$filters = $this->News->getFilters($this->passedArgs);
		$this->set('news', $this->paginate('News', $filters));
	}

	function admin_form($form_action = 'add', $id = null, $cat_id = null) {
		if(!empty($id)){
			$news = $this->News->read(null, $id);
			$this->set('news', $news);
		}
		if (!empty($this->data)) {
		$this->data['News']['widget_id']=200;
			$this->News->create();
			if ($this->News->save($this->data)) {
				$this->Session->setFlash(__('The News has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The News could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['News'] = array();
			if(!empty($news)){
				$this->data = $news;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['News'][$fieldName] = $value;
			}
		}
		
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('cat_id', $this->passedArgs );
		$this->set('form_action', $form_action);
	}
}
?>