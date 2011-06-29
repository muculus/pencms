<?php
class WidgetsController extends AppController {

	var $name = 'Widgets';

	function admin_paging() {
		$this->Widget->recursive = 0;
		$filters = $this->Widget->getFilters($this->passedArgs);
		$this->set('widgets', $this->paginate('Widget', $filters));
	}

	function admin_form($form_action = 'add', $id = null) {
		//set type select box for add new widget
    	foreach($this->widgetList as $key) {
				$widgetList[$key] = $key;//in this foreach we convert a flat array to $key=>$value array for generate list
		}
		$this->set(compact('widgetList'));
		
		if(!empty($id)){
			$widget = $this->Widget->read(null, $id);
			$this->set('widget', $widget);
		}
		if (!empty($this->data)) {
			$this->Widget->create();
			if ($this->Widget->save($this->data)) {
				$this->Session->setFlash(__('The Widget has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'add'));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The Widget could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Widget'] = array();
			if(!empty($widget)){
				$this->data = $widget;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Widget'][$fieldName] = $value;
			}
		}
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('form_action', $form_action);
	}

	function admin_copy($id = null) {
		$this->set('id', $id);
		$this->Widget->id = $id;
		$widget = $this->Widget->find('all', array('conditions' => array('Widget.id' => $id)));
		$this->data['Widget']['name'] = $widget['0']['Widget']['name'];
		$this->data['Widget']['type'] = $widget['0']['Widget']['type'];
		if (!empty($this->data)) {
			$this->Widget->create();
			if ($this->Widget->save($this->data)) {
				$this->Session->setFlash(__('The Widget has been copied', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The Widget could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Widget', true), 'default', array(), 'error');
		} else {
			$result = $this->Widget->findById($id);//find this wiget id for detect type

			$thisModel = inflector::classify($result['Widget']['type']);//get widget type and convert its to Model convention
			App::import('Model', $thisModel);//import model to use
			$this->{$thisModel} = new $thisModel;//create an instance of model
			
			$count = $this->{$thisModel}->find('count', array('conditions' => array($thisModel.'.widget_id' => $id)));//get numer of sub item
			if($count > 0) {
				$this->Session->setFlash(__('This widget contain some item.Delete theme before this', true), 'default', array(), 'error');
			} else {
				$this->Widget->del($id);
				$this->Session->setFlash(__('Widget deleted', true), 'default', array(), 'info');
			}
		}
		$this->redirect($this->referer(array('action'=>'index')));
	}

	function admin_undelete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Widget', true), 'default', array(), 'error');
		} else {
			$this->Widget->undelete($id);
			$this->Session->setFlash(__('Widget restored', true), 'default', array(), 'info');
		}
		$this->redirect($this->referer(array('action'=>'index')));
	}

	function admin_hard_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Widget', true), 'default', array(), 'error');
		} else {
			$this->Widget->hardDelete($id);
			$this->Session->setFlash(__('Widget deleted', true), 'default', array(), 'info');
		}
		$this->redirect($this->referer(array('action'=>'index')));
	}
}
	
?>