<?php 
class AdvertisementPlacesController extends AppController {

	var $name = 'AdvertisementPlaces';

	function admin_paging() {
		$this->AdvertisementPlace->recursive = 0;
		$filters = $this->AdvertisementPlace->getFilters($this->passedArgs);
		$this->set('advertisementPlaces', $this->paginate('AdvertisementPlace', $filters));
	}

	function admin_form($form_action = 'add', $id = null, $cat_id = null) {
		if(!empty($id)){
			$advertisementPlace = $this->AdvertisementPlace->read(null, $id);
			$this->set('advertisementPlace', $advertisementPlace);
		}
		if (!empty($this->data)) {
			$this->AdvertisementPlace->create();
			if ($this->AdvertisementPlace->save($this->data)) {
				$this->Session->setFlash(__('The AdvertisementPlace has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The AdvertisementPlace could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['AdvertisementPlace'] = array();
			if(!empty($advertisementPlace)){
				$this->data = $advertisementPlace;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['AdvertisementPlace'][$fieldName] = $value;
			}
		}
		$positions = $this->AdvertisementPlace->Position->find('list');
		$advertisements = $this->AdvertisementPlace->Advertisement->find('list');
		$this->set(compact('positions', 'advertisements'));
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('cat_id', $this->passedArgs );
		$this->set('form_action', $form_action);
	}

}
?>