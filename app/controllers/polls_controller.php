<?php
class PollsController extends AppController {

	var $name = 'Polls';

	function admin_paging() {
		$this->Poll->recursive = 2;
		$filters = $this->Poll->getFilters($this->passedArgs);
		$this->set('polls', $this->paginate('Category', $filters));
		if (!empty($this->passedArgs)){			
 			$this->set('filters' , $this->passedArgs);
		}else{
			$this->set('filters' , array('poll_category_id' => null));
		}
	}

	function admin_form($form_action = 'add', $id = null, $cat_id = null) {
		if(!empty($id)){
			$poll = $this->Poll->read(null, $id);
			$this->set('poll', $poll);
		}
		if (!empty($this->data)) {
			$this->data['Category']['Category']=$this->data['Poll']['category'];
			$this->Poll->create();
			if ($this->Poll->save($this->data)) {
				$this->Session->setFlash(__('The Poll has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The Poll could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Poll'] = array();
			if(!empty($poll)){
				$this->data = $poll;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Poll'][$fieldName] = $value;
			}
		}
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('cat_id', $this->passedArgs );
		$this->set('form_action', $form_action);
		$categories = $this->Poll->Category->find('list', array('conditions' => array('Category.cat_type' => '2' ,"AND" => array('Category.widgetset' => 'polls'))));
		$this->set(compact('categories'));
		if(isset($this->data['Category'])){
			$selectedCategories = $this->getSelectedItems($this->data['Category']);
			$this->set('selectedCategories', $selectedCategories);
		}

	}

/*	function poll() {
		if (empty($this->data)) {
			App::import('Model', 'Widget');
			$this->Widget = new Widget();
			$widgets = $this->Widget->find('all', array('conditions' => array('Widget.type' => 'polls')));	
			foreach ($widgets as $widget){
				$temp=$widget['Widget']['id'];
				$option[$temp]=$widget['Widget']['name'];
			}
			$this->set('option',$option);
		}
	}
	*/
	function form3(){

	$polls = $this->Poll->Category->find('all', array(
				'contain' => array('Poll' => array(
				'fields' => array('vote','id', 'title'))),
				'fields' =>array('title','id'),
				'conditions' => $this->passedArgs['conditions']
			));	
		//$polls = $this->Poll->find('all', array('conditions' => array('Poll.widget_id' => 199)));
		return $polls;
	}	
	
	function form4(){
		$id=$this->passedArgs['id'];
		$item=$this->passedArgs['item'];
		if((isset($id))&&(isset($item))){
			$this->Poll->query("UPDATE polls SET vote = vote+1 where  id='".$id."';");
			//$polls = $this->Poll->find('all', array('conditions' => array('Poll.id' => $item)));
			$Polls = $this->Poll->Category->find('first', array(
				'contain' => array('Poll' => array(
				'fields' => array('vote', 'title'))),
				'fields' =>array('title','id'),
				'conditions' => array('id' => $item)
			));	
			$this->set('polls' , $Polls);
		}
		if (!empty($this->data)) {
   		/*	$polls = $this->Poll->find('all', array('conditions' => array('Poll.id' => $this->data['b'])));
			$this->set('polls',$polls);
			$polls[0]['Poll']['vote']++;
		   $this->Poll->query("UPDATE polls SET vote = ".$polls[0]['Poll']['vote']."  where  id='".$polls[0]['Poll']['id']."';");*/
  		}
		$this->layout = "";
	}	
}
?>