<?php
class UsersController extends AppController {

	var $name = 'Users';
	
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allowedActions = array('*');
    }

	
	function admin_login(){

	}

	function admin_logout(){
		$this->redirect($this->Auth->logout());
	}

	function admin_index() {

	}

	function admin_paging() {
		$this->User->recursive = 0;
		$filters = $this->User->getFilters($this->passedArgs);
		$this->set('users', $this->paginate('User', $filters));
	}

	function admin_form($form_action = 'add', $id = null) {
		if(!empty($id)){
			$user = $this->User->read(null, $id);
			$this->set('user', $user);
		}
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The User has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['User'] = array();
			if(!empty($user)){
				$this->data = $user;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['User'][$fieldName] = $value;
			}
		}
		    $groups = $this->User->Group->find('all');
		    foreach ($groups as $group){  
		    	$option[$group['Group']['access']] = $group['Group']['name'];	
			}
		$this->set(compact('option'));
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('form_action', $form_action);
	}

	function admin_register() {
		if (!empty($this->data)) {
			$this->data['User']['password'] = Security::hash($this->data['User']['password'], null, true);
			//die(Security::hash($this->data['User']['password'], null, true));
			//$hashed = $this->Auth->hashPasswords($this->data);
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('Your registration information was accepted');
				$this->Session->write('user', $this->data['User']['email']);
			} else {
				$this->data['User']['password'] = '';
				$this->Session->setFlash('There was a problem saving this information');
			}
		}
	}
	
	function edit($id = null) {
		$this->set('id', $id);
	}
	
	function form($form_action = 'add', $id = null) {
		if(!empty($id)){
			$user = $this->User->read(null, $id);
			$this->set('user', $user);
		}
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash("<div class='success'>مشخصات کاربری شما با موفقیت تغییر یافت.</div>", 'default', array(), 'info');
					$this->viewPath = '';
					$this->render('errors');
			} else {
				$this->Session->setFlash("در حال حاضر امکان تغییر مشخصات کاربری موجود نمی باشد.لطفا بعدا سعی کنید.", 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['User'] = array();
			if(!empty($user)){
				$this->data = $user;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['User'][$fieldName] = $value;
			}
		}
		$this->set('userID', $this->params['pass'][1]);
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('form_action', $form_action);
	}
	
	function register()	{
		//Security::setHash('sha1'); 
		if (!empty($this->data)) {
			$this->data['User']['group_id'] = 5;
			//$this->data['User']['password'] = $this->Auth->hashPasswords($this->data['User']['password']);
			if ($this->User->find('count', array('conditions' => array('User.email' => $this->data['User']['email'])))<1){
				if ($this->User->save($this->data))	{
					$this->Session->setFlash('<p class="box-hilite">کاربر گرامی، ثبت نام شما با موفقیت انجام شد. شما هم اکنون عضو رسمی <strong>مرجع الکترونیکی علوم مدیریت ایران</strong> هستید. از این پس می توانید با وارد کردن مشخصات خود در بخش ورود اعضا، به سایت وارد شده و از همه امکانات سایت استفاده نمایید.</p>');
					$this->Session->write('user', $this->data['User']['email']);
					$this->set('welcome', true);
				}
				else {
				$this->data['User']['password'] = '';
				$this->Session->setFlash('<p class="error"><span class="icon">در مراحل ثبت نام شما مشکلی پیش آمده است.لطفا مجددا سعی کنید و یا با مدیریت فنی سایت تماس بگیرید.</span></p>');
			    }
			}
			else{
			$this->Session->setFlash('<div class="error">کاربر گرامی آدرس پست الکترونیکی شما تکراری است. ثبت نام با این پست الکترونیک مقدور نمی باشد. لطفا از یک پست الکترونیک دیگر برای ثبت نام استفاده نمایید و یا با استفاده از رمز عبور خود به سایت وارد شوید.</div>');
			}
      }
	}
	
	function login() {
		//$this->Session->setFlash('برای ورود به سایت باید نام کاربری و رمز عبور معتبر وارد کنید.', 'default', array('class' => 'error'));
		//$this->redirect($this->referer());	
}
	
	function logout() {
		//$this->referer(NULL);
		$this->redirect($this->Auth->logout());
		//$this->Auth->user() = NULL;
		
		//$this->redirect($this->referer());
	}
	
	function number() {
 		$number = $this->User->find('count');
		return $number;
	}
	
	function _currentPageURL() {
		$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
			$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}
	
	function forget() {
			if (!empty($this->data)){
			//Security::setHash('md5');
			
			$code = md5(uniqid(rand(), true));
			$code ="tbl". substr($code, 0, 6);
			$this->data['User']['password'] =$this->Auth->password($code); 
			$this->User->updateAll(array('password' =>"'". $this->data['User']['password']."'" ), array('User.email' => $this->data['User']['email']));
			$subject = "eModir.com: New Password";
			$to =$this->data['User']['email'] ;
			 $headers  = "From:info@emodir.com \r\n";
             $headers .= "Content-type: text/html\r\n"; 
			$body ='<div dir="rtl"><br />کاربر گرامی<br />این ایمیل بنا به درخواست شما به منظور تعیین رمز عبور جدید برای شما ارسال شده است.<br />رمز عبور جدید: '.$code ."<br /><br />مرجع الکترونیکی علوم مدیریت ایران<br />http://eModir.com</div>";
			if (mail($to, $subject, $body, $headers)) {
			  	$this->Session->setFlash("<div class='success'> رمز عبور جدید به آدرس پست الکترونیک شما ارسال شد. </div>", 'default', array(), 'info');
					$this->viewPath = '';
					$this->render('errors');
				}
				else {
					$this->Session->setFlash("<div class='error'>متأسفانه در ارسال اطلاعات شما مشکلی پیش آمده است.<br /><a href='http://emodir.com/pages/sending'>ارسال مجدد مطلب</a></div>", 'default', array(), 'error');
					$this->viewPath = '';
					$this->render('errors');
				}
		}
		
	}	
}
?>