<?php
/* SVN FILE: $Id:pages_controller.php 7062 2008-05-30 11:29:53Z nate $ */
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2008, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2008, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.cake.libs.controller
 * @since			CakePHP(tm) v 0.2.9
 * @version			$Revision:7062 $
 * @modifiedby		$LastChangedBy:nate $
 * @lastmodified	$Date:2008-05-30 13:29:53 +0200 (vr, 30 mei 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package		cake
 * @subpackage	cake.cake.libs.controller
 */
class PagesController extends AppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	var $name = 'Pages';
/**
 * Default helper
 *
 * @var array
 * @access public
 */
	var $helpers = array('Html', 'Ajax','Form');
/**
 * This controller does not use a model
 *
 * @var array
 * @access public
 */
	var $uses = array();
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @access public
 */
 var $cacheAction = true;
	function display() {
		$path = func_get_args(); //calculate number of function argument

		if (!count($path)) {
			$this->redirect('/');
		}
		$count = count($path);
		$page = $subpage = $title = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title = Inflector::humanize($path[$count - 1]);
		} 
		
		$this->layout = "home";
		$this->set(compact('page', 'subpage', 'title'));
		$this->render(join('/', $path));
	}
	

	
	function admin_display() {
		if (!func_num_args()) {
			$this->redirect('/');
		}
		$path = func_get_args();

		if (!count($path)) {
			$this->redirect('/');
		}
		
		$count = count($path);
		//admin_ adden
		$path[$count - 1] = 'admin_' . $path[$count - 1];
		$page = null;
		$subpage = null;
		$title = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title = Inflector::humanize($path[$count - 1]);
		}
		$this->set('page', $page);
		$this->set('subpage', $subpage);
		$this->set('title', $title);
		$this->render(join('/', $path));
	}
	
	//TODO: customize for cms
	function sending(){
		$this->pageTitle = "تماس با مرجع الکترونیکی علوم مدیریت ایران";
		if (!empty($this ->data)){
			$to = "emodir.ir@gmail.com";
			//$to="pendarekavir@gmail.com";
			$subject = "contact us";
			$headers  = "From:". $this->data['Page']['email']."\r\n";
            $headers .= "Content-type: text/html\r\n"; 
			$body ='<div dir="rtl">نام  و نام خانوادگی : '. $this->data['Page']['name']."<br> آدرس پست الکترونیکی:".$this->data['Page']['email']." <br>رشته :".$this->data['Page']['field']." <br>مدرک تحصیلی:".$this->data['Page']['grade']."<br>پیام :".$this->data['Page']['description']."<br></div>";
			if (mail($to, $subject, $body, $headers)) {
			  	$this->Session->setFlash("<div class='success'>اطلاعات شما با موفقیت ارسال شد.<br /><br /><a href='http://emodir.com/pages/sending'>بازگشت به بخش تماس با ما</a><br /><br /><a href='http://emodir.com'>بازگشت به صفحه اصلی مرجع الکترونیکی علوم مدیریت ایران</a></div>", 'default', array(), 'info');
				$this->viewPath = '';
				$this->render('errors');
			} else {
				$this->Session->setFlash("<div class='error'>متأسفانه در ارسال اطلاعات شما مشکلی پیش آمده است.<br /><a href='http://emodir.com/pages/sending'>ارسال مجدد مطلب</a></div>", 'default', array(), 'error');
				$this->viewPath = '';
				$this->render('errors');
			}
		}
	}

} 
?>