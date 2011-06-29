<?php 
class P28nComponent extends Object {
	var $components = array('Session', 'Cookie');
	
	var $controller;
	var $languageModel;

	function startup(&$controller) {
		App::import('Model', 'Language');
		$this->languageModel = new Language();
		$this->controller =& $controller;
		if (!$this->Session->check('Config.language')) {
			$this->change(($this->Cookie->read('lang') ? $this->Cookie->read('lang') : DEFAULT_LANGUAGE));
		}else{
			$this->_dispatchLang();
		}
	}

	function change($lang = null) {
		if (!empty($lang)) {
			$this->Session->write('Config.language', $lang);
			$this->Cookie->write('lang', $lang, null, '+350 day');
			$this->_dispatchLang();
		}
	}
	
	function _dispatchLang(){
		$language_code = $this->Session->read('Config.language');
		$this->controller->language_code = $language_code;
		$this->controller->set('language_code', $language_code);
		//get the language id
		$language = $this->languageModel->find(array('Language.code' => $language_code));
		$this->controller->language_id = $language['Language']['id'];
		$this->controller->set('language_id', $language['Language']['id']);
		//notify the models
		if(!empty($this->controller->uses)){
			foreach($this->controller->uses as $modelName){
				$this->controller->$modelName->language_id = $this->controller->language_id;
			}
		}
	}
}
?>