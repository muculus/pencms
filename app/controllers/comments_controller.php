<?php
class CommentsController extends AppController {

	var $name = 'Comments';
	//var $components = array('Session'); 
	
	function captcha() {
        $this->Captcha->render();
    } 

	function securimage($random_number){
        $this->autoLayout = false; //a blank layout

        //override variables set in the component - look in component for full list
        $this->captcha->image_height = 75;
        $this->captcha->image_width = 350;
        $this->captcha->image_bg_color = '#ffffff';
        $this->captcha->line_color = '#cccccc';
        $this->captcha->arc_line_colors = '#999999,#cccccc';
        $this->captcha->code_length = 5;
        $this->captcha->font_size = 45;
        $this->captcha->text_color = '#000000';
        $this->set('captcha_data', $this->captcha->show()); //dynamically creates an image
    } 	
	
	function comment()
	{
	//ob_start();
		//session_start();
		//include_once $_SERVER['DOCUMENT_ROOT'] . 'app/webroot/securimage/securimage.php';
		//$securimage = new Securimage();
		//pr($this->params);
//pr($_SESSION);
	/*	if ($securimage->check($_POST['captcha_code']) == false) {
		  // the code was incorrect
		  // you should handle the error so that the form processor doesn't continue

		  // or you can use the following code if there is no validation or you do not know how
		  echo "The security code entered was incorrect.<br /><br />";
		  echo "Please go <a href='javascript:history.go(-1)'>back</a> and try again.";
		  exit;
		}
*/
		
	//	pr($_SESSION);
			if($_SESSION['securimage_code_value'] == strtolower($this->params['form']['captcha_code'])){
					$this->data['Comment']=$this->params['form'];
					$this->data['Comment']['foreignid'] = intval($this->data['Comment']['foreignid']);
					if (!empty($this->data)) {
						$this->Comment->create();
						if($this->Comment->save($this->data)) {
						}else{
							pr('error');
						}
					}
				
		//			pr($this->params['form']);
					$this->set('item' , $this->params['form'] );
					$this->render('/elements/comment',"");
			}else{
					echo '<p class="error" id="typo-27">
						<span class="icon"></span>کد امنیتی را اشتباه وارد کرده اید
					</p>';
					//$this->render('',"");
			}
	}
	function admin_index( $widget_type = null,$foreignid = null) {
	$this->set('widget_type', $widget_type );
	$this->set('foreignid', $foreignid );
	}

	function admin_paging() {
		$this->Comment->recursive = 0;
		$filters = $this->Comment->getFilters($this->passedArgs);
		$this->set('comments', $this->paginate('Comment', $filters));
	}

	function admin_form($form_action = 'add', $id = null) {
		if(!empty($id)){
			$comment = $this->Comment->read(null, $id);
			$this->set('comment', $comment);
		}
		
		if (!empty($this->data)) {
			$this->Comment->create();
			if ($this->Comment->save($this->data)) {
				$this->Session->setFlash(__('The Comment has been saved', true), 'default', array(), 'info');
				
			} else {
				$this->Session->setFlash(__('The Comment could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Comment'] = array();
			if(!empty($comment)){
				$this->data = $comment;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Comment'][$fieldName] = $value;
			}
		}
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('form_action', $form_action);
	}

	function _numberOfComment() {
		$number = $this->Comment->find('count',array('conditions' => array('foreignid' => $this->passedArgs['id'] , 'widget_type' =>$this->passedArgs['widget'] )));
		return $number;
	}
}
?>