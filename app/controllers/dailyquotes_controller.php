<?php
class DailyquotesController extends AppController {

	var $name = 'Dailyquotes';

	function admin_paging() {
		$this->Dailyquote->recursive = 0;
		$filters = $this->Dailyquote->getFilters($this->passedArgs );
		$this->set('dailyquotes', $this->paginate('Dailyquote', $filters));
		if (!empty($this->passedArgs)){			
 			$this->set('filters' , $this->passedArgs);
		}else{
			$this->set('filters' , array('dailyquote_category_id' => null));
		}
	}
  
	function admin_form($form_action = 'add', $id = null, $cat_id = null) {
		if(!empty($id)){
			$dailyquote = $this->Dailyquote->read(null, $id);
			$this->set('dailyquote', $dailyquote);
		}
		if (!empty($this->data)) {

			$this->Dailyquote->create();
			if ($this->Dailyquote->save($this->data)) {
				$this->Session->setFlash(__('The dailyquote has been saved', true), 'default', array(), 'info');
				$this->redirect($this->referer(array('action' => 'index', $this->passedArgs)));
			} else {
				$this->Session->setFlash(__('The dailyquote could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['dailyquote'] = array();
			if(!empty($dailyquote)){
				$this->data = $dailyquote;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['dailyquote'][$fieldName] = $value;
			}
		}
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
 		$this->set('cat_id', $this->passedArgs );
		$this->set('form_action', $form_action);
	}
}
?>
