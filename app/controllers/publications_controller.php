<?php
class PublicationsController extends AppController {

	var $name = 'Publications';
	
	function admin_paging() {
		$this->Publication->recursive = 0;
		$filters = $this->Publication->getFilters($this->passedArgs);
		$this->set('publications', $this->paginate('Publication', $filters));
	}

	function admin_form($form_action = 'add', $id = null, $cat_id = null) {
		if(!empty($id)){
			$publication = $this->Publication->read(null, $id);
			$this->set('publication', $publication);
		}
		if (!empty($this->data)) {
			$this->data['Publication']['month'] = $this->data['Publication']['month']['month'];
			$this->data['Publication']['year'] = $this->data['Publication']['year']['year'];
			$this->Publication->create();
			if ($this->Publication->save($this->data)) {
				$this->Session->setFlash(__('The Publication has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The Publication could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Publication'] = array();
			if(!empty($publication)){
				$this->data = $publication;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Publication'][$fieldName] = $value;
			}
		}

		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('cat_id', $this->passedArgs );
		$this->set('form_action', $form_action);
	}

	/*this place we add find action for find publications*/
	function find() {
		if (empty($this->passedArgs) ){
			App::import('Model', 'Widget');
			$this->Widget = new Widget();
			$widgets = $this->Widget->find('all', array('conditions' => array('Widget.type' => 'publications')));
			$this->set('widgets',$widgets);
	    }
		else{
			$publications = $this->Publication->find('all', array('conditions' => array('Publication.widget_id' => $this->passedArgs)));
			$this->set('publications',$publications);
			App::import('Model', 'Category');
				$this->Category = new Category();
				$categories = $this->Category->find('all', array('conditions' => array('Category.widget_id' => $this->passedArgs)));
			$i=0;	
			foreach ($categories as $category){
				$allChildren[$i]=$this->Category->children($category['Category']['id']);
				$i++;
		    }
		$this->set('allChildren',$allChildren);
	  }
   }
}
?>
