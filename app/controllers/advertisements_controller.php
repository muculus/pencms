<?php 
class AdvertisementsController extends AppController {

	var $name = 'Advertisements';

	function admin_paging() {
		$this->Advertisement->recursive = 0;
		$filters = $this->Advertisement->getFilters($this->passedArgs);
		$this->set('advertisements', $this->paginate('Advertisement', $filters));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Advertisement.', true), 'default', array(), 'error');
			$this->redirect(array('action'=>'index'));
		}
		$advertisement = $this->Advertisement->read(null, $id);
		$this->set('advertisement', $advertisement);
		$this->set('advertisementPlacesFormAction', '/admin/advertisement_place/add/advertisement/'.$id);
	}

	function admin_form($form_action = 'add', $id = null, $cat_id = null) {
		if(!empty($id)){
			$advertisement = $this->Advertisement->read(null, $id);
			$this->set('advertisement', $advertisement);
		}
		if (!empty($this->data)) {
			$this->Advertisement->create();
			if ($this->Advertisement->save($this->data)) {
				$this->Session->setFlash(__('The Advertisement has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The Advertisement could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Advertisement'] = array();
			if(!empty($advertisement)){
				$this->data = $advertisement;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Advertisement'][$fieldName] = $value;
			}
		}
		$form_url = '/' . $this->params['url']['url'];
		$advertisementPlace = $this->Advertisement->AdvertisementPlace->find('list');
		$this->set(compact('advertisementPlace'));
		$this->set('form_url', $form_url);
		$this->set('cat_id', $this->passedArgs );
		$this->set('form_action', $form_action);
	}

	
}
?>