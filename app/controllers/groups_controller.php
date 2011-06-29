<?php
class GroupsController extends AppController {

	var $name = 'Groups';

	function admin_paging() {
		$this->Group->recursive = 0;
		$filters = $this->Group->getFilters($this->passedArgs);
		$this->set('groups', $this->paginate('Group', $filters));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Group.', true), 'default', array(), 'error');
			$this->redirect(array('action'=>'index'));
		}
		$group = $this->Group->read(null, $id);
		$this->set('group', $group);
		$this->set('usersFormAction', '/admin/user/add/group/'.$id);
	}

	function admin_form($form_action = 'add', $id = null) {
		if(!empty($id)){
			$group = $this->Group->read(null, $id);
			$this->set('group', $group);
		}
		if (!empty($this->data)) {
			$this->Group->create();
			if ($this->Group->save($this->data)) {
				$this->Session->setFlash(__('The Group has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The Group could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Group'] = array();
			if(!empty($group)){
				$this->data = $group;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Group'][$fieldName] = $value;
			}
		}
		$groups = $this->Group->generateTreeList(null, "{n}.Group.id", "{n}.Group.name", '--', 0);
		$this->set(compact('groups'));
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('form_action', $form_action);
	}
}
?>