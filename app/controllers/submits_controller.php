<?php
class SubmitsController extends AppController {
	var $name = 'Submits';
		
 	function form($form_action = 'add', $id = null) {
		if(!empty($id)){
			$submit = $this->Submit->read(null, $id);
			$this->set('submit', $submit);
		}
		if (!empty($this->data)) {
			$this->Submit->create();
			if ($this->Submit->save($this->data)) {
				$this->Session->setFlash(__('The Submit has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The Submit could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Submit'] = array();
			if(!empty($submit)){
				$this->data = $submit;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Submit'][$fieldName] = $value;
			}
		}
		$users = $this->Submit->User->find('list');
		$widgets = $this->Submit->Widget->find('list');
		$this->set(compact('users', 'widgets'));
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('form_action', $form_action);
	}

	function admin_paging() {
		$this->Submit->recursive = 0;
		$filters = $this->Submit->getFilters($this->passedArgs);
		$this->set('submits', $this->paginate('Submit', $filters));
		if (!empty($this->passedArgs)){			
			$this->set('filters' , $this->passedArgs);
		}else{
			$this->set('filters' , array('submit_category_id' => null));
		}
	}

	function admin_form($form_action = 'add', $id = null) {
		if(!empty($id)){
			$submit = $this->Submit->read(null, $id);
			$this->set('submit', $submit);
			$users = $this->Submit->User->find('list');
			//$users = $this->data['Submit']['user_id'];
			$widgets = $this->Submit->Widget->find('list');
			$this->set(compact('users', 'widgets'));
			$form_url = '/' . $this->params['url']['url'];
			$this->set('form_url', $form_url);
			$this->set('form_action', $form_action);
		}
		if (!empty($this->data)) {
			$this->Submit->create();
			if ($this->Submit->save($this->data)) {
				$this->Session->setFlash(__('The Submit has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The Submit could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
			$users = $this->Submit->User->find('list');
			$widgets = $this->Submit->Widget->find('list');
			$this->set(compact('users', 'widgets'));
			$form_url = '/' . $this->params['url']['url'];
			$this->set('form_url', $form_url);
			$this->set('form_action', $form_action);
		}else{
			$this->data = array();
			$this->data['Submit'] = array();
			if(!empty($submit)){
				$this->data = $submit;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Submit'][$fieldName] = $value;
			}
			$widgets = $this->Submit->Widget->find('list');
			$form_url = '/' . $this->params['url']['url'];
			$this->set('form_url', $form_url);
			$this->set('form_action', $form_action);
		}
		
	}

    function submit() {
		$this->pageTitle = "انتشار مطالب شما در مرجع الکترونیکی علوم مدیریت ایران";
   		if(!$this->isAuthed) {
			$this->Session->setFlash("<div class='error'>کاربر گرامی برای انتشار مطلب در مرجع الکترونیکی علوم مدیریت ایران لازم است در سایت عضو شوید. برای این منظور می توانید از بخش <b>ورود/عضویت</b> در بالای سایت استفاده کنید.</div>", 'default', array(), 'error');
			$this->viewPath = '';
			$this->render('errors');
		}
		else{
			if(!empty($this->data)) {
				$this->Submit->create();
				if ($this->Submit->save($this->data)) {
					$this->Session->setFlash("<div class='success'>اطلاعات شما با موفقیت ارسال شد.<br /><br /><a href='http://emodir.com/submits/emodir'>ارسال مطلب جدید</a></div>", 'default', array(), 'info');
					$this->viewPath = '';
					$this->render('errors');
				}
				else {
					$this->Session->setFlash("<div class='error'>در ارسال اطلاعات شما مشکلی پیش آمده است.<br /><a href='http://emodir.com/submits/emodir'>ارسال مجدد مطلب</a></div>", 'default', array(), 'error');
					$this->viewPath = '';
					$this->render('errors');
				}
		   }
	   }
    }
   
    function admin_file_delete($id=null){
		$this->Submit->query("UPDATE submits set file_filesize='',file_mimetype='', file_dir='' , file=''  WHERE id=".$id);
		$this->Session->setFlash(__('The file delete', true), 'default', array(), 'info');
		$this->redirect('/admin/submits/edit/'.$id);
	}

}
?>