<?php
class GalleriesController extends AppController {

	var $name = 'Galleries';

	function admin_paging() {
		$this->Gallery->recursive = 0;
		$filters = $this->Gallery->getFilters($this->passedArgs);
		$this->set('galleries', $this->paginate('Gallery', $filters));
		if (!empty($this->passedArgs)){			
			$this->set('filters' , $this->passedArgs);
		}else{
			$this->set('filters' , array('gallery_category_id' => null));
		}
	}

	function admin_form($form_action = 'add', $id = null, $cat_id = null) {
		if(!empty($id)){
			$gallery = $this->Gallery->read(null, $id);
			$this->set('gallery', $gallery);
		}
		if (!empty($this->data)) {
			$this->Gallery->create();
			
			$this->data['Gallery']['widget_id']=193;
			if ($this->Gallery->save($this->data)) {
				$this->Session->setFlash(__($cat_id, true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The Gallery could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Gallery'] = array();
			if(!empty($gallery)){
				$this->data = $gallery;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Gallery'][$fieldName] = $value;
			}
		}
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('cat_id', $this->passedArgs);
		$this->set('form_action', $form_action);
	}

	function gallary() {
		$this->paginate = array ('fields' => array('Gallery.id','Gallery.title', 'Gallery.picture','Gallery.picture_dir'),'limit' =>10);
		$galleries =  $this->paginate('Gallery');
		$this->set('galleries', $galleries );  
	}
}
?>