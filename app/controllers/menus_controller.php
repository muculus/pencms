<?php
class MenusController extends AppController {

	var $name = 'Menus';
	var $uses = array('Category', 'Menu');
	
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Menu', true), 'default', array(), 'error');
		} else {
			$this->Menu->hardDelete($id);
			$this->Session->setFlash(__('Menu deleted', true), 'default', array(), 'info');
		}
		$this->redirect($this->referer(array('action'=>'index')));
	}
	function admin_add($id = null) {
		$this->set('id', $id);
	}

	function admin_form($form_action = 'add', $id = null) {
		if(!empty($id)){
			$menu = $this->Menu->read(null, $id);
			$this->set('menu', $menu);
		}
		if (!empty($this->data)) {
			/*in2 khat baraie in ast ke agar menu az noe link nabud va karbar inputbox ro edit kard link hamun meghdare avalie bemanad */
			$currentMenuData = $this->Menu->find('first', array('conditions' => array('Menu.id' => $id)));
			$link = $this->Category->find('first', array('conditions' => array('Category.id' => $currentMenuData['Menu']['category_id'])));
			if($this->data['Menu']['menu_type'] == 0){
			      $this->data['Menu']['link'] = $link['Category']['link'];
			}elseif($this->data['Menu']['menu_type'] == 2){
			      $this->data['Menu']['link'] = null;
			}

			if(($this->data['Menu']['link'] != 1) && ($this->data['Menu']['menu'] != '')){
				$this->data['Menu']['link']	= $link['Category']['link'].DS.'menu_id:'.$this->data['Menu']['menu'];
			}
			
			if(($this->data['Menu']['menu_type'] != 1) && ($this->data['Menu']['menu'] == '')){
				$this->data['Menu']['link']	= $link['Category']['link'];
			}

			$this->Menu->create();
			if ($this->Menu->save($this->data)) {
				$this->Session->setFlash(__('The Menu has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'index'));
				}else{
					$this->redirect($this->referer());
				}
			} else {
				$this->Session->setFlash(__('The Menu could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Menu'] = array();
			if(!empty($menu)){
				$this->data = $menu;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Menu'][$fieldName] = $value;
			}
		}
		$categories = $this->Menu->Category->find('list');
		$menus = $this->Menu->generateTreeList(null, "{n}.Menu.id", "{n}.Menu.title", '--', 0);
		$this->set(compact('categories', 'menus'));
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('form_action', $form_action);
	}

	function makeMenu() {
	      $eMenuInformaton = $this->Menu->find('all', array('conditions' => array('Menu.parent_id' => $this->passedArgs['menu_id'])));
	      return $eMenuInformaton;
	}
	
	function getnodes() {
	    // retrieve the node id that Ext JS posts via ajax
	    $parent = intval($this->params['form']['node']);
	    		if(isset($filterNode)){
			$parent = $filterNode;
		}
	    // find all the nodes underneath the parent node defined above
	    // the second parameter (true) means we only want direct children
	    $nodes = $this->Menu->children($parent, true);
	    
	    // send the nodes to our view
	    $this->set(compact('nodes'));    
	}
	
	function reorder(){
	    
	    // retrieve the node instructions from javascript
	    // delta is the difference in position (1 = next node, -1 = previous node)
	    $node = intval($this->params['form']['node']);
	    $delta = intval($this->params['form']['delta']);
	    
	    if ($delta > 0) {
		$this->Menu->movedown($node, abs($delta));
	    } elseif ($delta < 0) {
		$this->Menu->moveup($node, abs($delta));
	    }
	    
	    // send success response
	    exit('1');
	}

	function reparent(){
	    $node = intval($this->params['form']['node']);
	    $parent = intval($this->params['form']['parent']);
	    $position = intval($this->params['form']['position']);
	    $title = $this->params['form']['titlem'];
	    $newnode = $this->params['form']['newnode'];
	    // save the employee node with the new parent id
	    // this will move the employee node to the bottom of the parent list
        if ($parent==0){
			$parent=null;
		}
	    if ($newnode == 'false'){
			$this->Menu->id = $node;
			$this->Menu->saveField('parent_id', $parent);
		   //checks if is it not new node
		   // If position == 0, then we move it straight to the top
		   // otherwise we calculate the distance to move ($delta).
		   // We have to check if $delta > 0 before moving due to a bug
		   // in the tree behavior (https://trac.cakephp.org/ticket/4037)
		  
		   if ($position == 0){
		      $this->Menu->moveup($node, true);
		   } else {
		      $count = $this->Menu->childcount($parent, true);
		      $delta = $count-$position-1;
		      if ($delta > 0){
				$this->Menu->moveup($node, $delta);
		      }
		   }
        } else { 
			$menu_child=$this->Category->children($node);
			$max_id = $this->Menu->query("select max(id) as max_id from menus");
			$delta = $node - $this->Menu->getNextAutoIncrement();
			$this->Menu->create();
			$this->data['Menu']['parent_id'] = $parent ;
			$this->data['Menu']['category_id'] = $node;
			$this->data['Menu']['title'] = $title;
			$link = $this->Category->find('first', array('conditions' => array('Category.id' => $node)));
			$this->data['Menu']['link'] = $link['Category']['link'];
			$this->Menu->save($this->data);
			$results = $this->Category->find('all', array('conditions' => array('Category.parent_id' => $node),'order' => array('Category.lft asc')));
			$stack = array();

			foreach ($results as $i => $result) {
				while ($stack && ($stack[count($stack) - 1] < $result['Category']['rght'])) {
					array_pop($stack);
				}
				$results[$i]['tree_prefix'] = str_repeat($spacer,count($stack));
				$stack[] = $result['Category']['rght'];
			}
			foreach($menu_child as $child){

					$this->Menu->create();
				$this->data['Menu']['parent_id'] = $child['Category']['parent_id'] - $delta;
				$this->data['Menu']['category_id'] = $child['Category']['id'];
				$link = $this->Category->find('first', array('conditions' => array('Category.id' => $child['Category']['id'])));
				$this->data['Menu']['link'] = $link['Category']['link'];
				$this->data['Menu']['title'] = $child['Category']['title'];
				$this->Menu->save($this->data);

			}
	    }	
	    // send success response
	    exit("1");  

	} 
	
	function children(){
		$allChildren = $this->Menu->children($this->passedArgs['id'], true);
		return $allChildren;
    }
}
?>
