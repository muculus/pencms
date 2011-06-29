<?php
class CategoriesController extends AppController {

	var $name = 'Categories';
	//var $helpers = array('Html', 'Form','Javascript');
	//var $components = array('RequestHandler');
	//var $uses = array('Widget', 'Category', 'Menu');
	 var $paginate = array ('fields' => array('Category.id','Category.title', 'Category.content'),'limit' =>10);

	//function beforeFilter() {
	//	parent::beforeFilter();
	//	$this->Security->validatePost = false;
	//}
	
	function index() {
		$this->Session->setFlash("<div class='error'>صفحه مورد نظر شما موجود نیست. برای دسترسی به سایر بخشهای سایت می توانید از منوی اصلی استفاده نمایید.</div>", 'default', array(), 'info');
	}
	
	function getnodes($filterNode = null){
	    	  //  echo ':::'.$filterNode;
			//	pr($this->params);
	    // retrieve the node id that Ext JS posts via ajax
	    if(isset($this->params['form']['node'])){$parent = intval($this->params['form']['node']);}
		if(isset($filterNode)){
			$parent = $filterNode;
		}
		if(isset($this->params['named']['filterNode'])){
			$parent =$this->params['named']['filterNode'];
		}
	    // find all the nodes underneath the parent node defined above
	    // the second parameter (true) means we only want direct children
	    $nodes = $this->Category->children($parent, true);
	    
	    // send the nodes to our view
	    $this->set(compact('nodes'));  
		return $nodes;
	}

	function paging() {
		$this->Category->recursive = 0;
		$filters = $this->Category->getFilters($this->passedArgs);
		$this->set('categories', $this->paginate('Category', $filters));
	}


	function form($form_action = 'add', $id = null) {
		if(!empty($id)){
			$category = $this->Category->read(null, $id);
			$this->set('category', $category);
		}
		if (!empty($this->data)) {
			$this->Category->create();
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('The Category has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->redirect(array('action' => 'view', $id));
				}else{
					$this->redirect($this->referer());
				}
			} else {
/*			print_r($this->data);*/
			
			//$this->Session->setFlash(__('The Category could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Category'] = array();
			if(!empty($category)){
				$this->data = $category;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Category'][$fieldName] = $value;
			}
		}
		$contents = $this->Category->Content->find('list');
		$siteLayouts = $this->Category->SiteLayout->find('list');
		$categories = $this->Category->generateTreeList(null, "{n}.Category.id", "{n}.Category.title", '--', 0);
		$this->set(compact('contents', 'siteLayouts', 'categories'));
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('form_action', $form_action);
	}

	function add() {
	}

	function edit($id = null) {
		$this->set('id', $id);
	}

	function admin_index() {
		//set side select box for filter tree base on main tree node
		$this->Category->recursive = 0;
		$categoryList = $this->Category->find('list', array('conditions' => array('Category.parent_id' => null)));
		$this->set(compact('categoryList'));
		if(!empty($this->data)){
			$this->set('filteredNode',$this->data['Category']['parent_id']);
		}
	}

	function admin_paging() {
		$this->Category->recursive = 0;
		$filters = $this->Category->getFilters($this->passedArgs);
		$this->set('categories', $this->paginate('Category', $filters));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Category.', true), 'default', array(), 'error');
			$this->redirect(array('action'=>'index'));
		}
		$category = $this->Category->read(null, $id);
		$this->set('category', $category);
	}

	function admin_form($form_action = 'add', $id = null) {
		App::import('Model', 'Menu');
		$this->Menu = new Menu();
		App::import('Model', 'Widget');
		$this->Widget = new Widget();
 		$this->set('id', $id);
        foreach($this->widgetList as $key) {
			$widgetList[$key] = $key;//in this foreach we convert a flat array to $key=>$value array for generate list
		}
		$this->set(compact('widgetList'));
	    if(!empty($id)){
			$category = $this->Category->read(null, $id);
			$this->set('category', $category);
		}

		if (!empty($this->data)) {
		
			    /* Generating Link */	
			if($id == null){
				$cat_id = $this->Category->getNextAutoIncrement();
			} else {
			    $cat_id = $id;
			    $menusOfThisCategory = $this->Menu->find('all', array('conditions' => array('Menu.Category_id =' => $id)));		
			  //pr($menusOfThisCategory);
			}
			switch($this->data['Category']['cat_type']){
				case 0:
					$this->data['Category']['link'] = "http://".$_SERVER['SERVER_NAME']."/categories/view/"."cat_id:".$cat_id;
					break;
					
				case 1:
					$this->data['Category']['link'] = "http://".$_SERVER['SERVER_NAME']."/".$this->data['Category']['widgetset']."/paging/"."cat_id:".$cat_id;
					break;
					
				case 2:
					$this->data['Category']['link'] = "http://".$_SERVER['SERVER_NAME']."/".$this->data['Category']['widgetset']."/paging/"."cat_id:".$cat_id;
					break;
			}
			
            $this->Menu->updateAll( array('Menu.link' => "'".$this->data['Category']['link']."'" ),  array('Menu.category_id' => $cat_id));
			
			if($this->data['Category']['file']['name']=="") $this->data['Category']['file']="";
			
			$this->Category->create();
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('The Category has been saved', true), 'default', array(), 'info');
				if(!empty($id)){
					$this->Session->setFlash(__('مجموعه با موفقیت ویرایش شد.', true), 'default', array(), 'info');
					$this->redirect(array('action' => 'index'));
				}else{
					$this->Session->setFlash(__('مجموعه با موفقیت ذخیره شد.', true), 'default', array(), 'info');
					$this->redirect($this->referer(array('action' => 'index')));
				}
			} else {
			    $this->Session->setFlash(__('امکان ذخیره مجموعه وجود ندارد.لطفا مجددا سعی نمایید.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Category'] = array();
			if(!empty($category)){
				$this->data = $category;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Category'][$fieldName] = $value;
			}
		}
//		$contents = $this->Category->Content->find('list');
		$siteLayouts = $this->Category->SiteLayout->find('list');
		$widgets = $this->Category->Widget->find('list');
		$categories = $this->Category->generateTreeList(null, "{n}.Category.id", "{n}.Category.title", '--', 0);
		$this->set(compact('widgets', 'siteLayouts', 'categories'));
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$this->set('form_action', $form_action);
	}

	function admin_add($id = null) {
		$this->set('id', $id);
	}

	function admin_edit($id = null) {
		$this->set('id', $id);
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Category', true), 'default', array(), 'error');
		} else {
			$this->Category->del($id);
			$this->Session->setFlash(__('Category deleted', true), 'default', array(), 'info');
		}
		$this->redirect($this->referer(array('action'=>'index')));
	}

	function admin_undelete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Category', true), 'default', array(), 'error');
		} else {
			$this->Category->undelete($id);
			$this->Session->setFlash(__('Category restored', true), 'default', array(), 'info');
		}
		$this->redirect($this->referer(array('action'=>'index')));
	}

	function admin_hard_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Category', true), 'default', array(), 'error');
		} else {
			$this->Category->hardDelete($id);
			$this->Session->setFlash(__('Category deleted', true), 'default', array(), 'info');
		}
		$this->redirect($this->referer(array('action'=>'index')));
	}
/*	function beforeFilter(){
			  ///ToDO : Security problem
	    
	    // ensure our ajax methods are posted
	    //$this->Security->requirePost('getnodes', 'reorder', 'reparent');
	    
	}*/

	function reorder(){
	    
	    // retrieve the node instructions from javascript
	    // delta is the difference in position (1 = next node, -1 = previous node)
	    
	    $node = intval($this->params['form']['node']);
	    $delta = intval($this->params['form']['delta']);
	    
	    if ($delta > 0) {
		$this->Category->movedown($node, abs($delta));
	    } elseif ($delta < 0) {
		$this->Category->moveup($node, abs($delta));
	    }
	    
	    // send success response
	    exit('1');
	    
	}

	function reparent(){
	    
	    $node = intval($this->params['form']['node']);
	    $parent = intval($this->params['form']['parent']);
	    $position = intval($this->params['form']['position']);
	    
	    // save the employee node with the new parent id
	    // this will move the employee node to the bottom of the parent list
	    
	    $this->Category->id = $node;
		if($parent==0){$parent=null;}	
	    $this->Category->saveField('parent_id', $parent);
	    
	    // If position == 0, then we move it straight to the top
	    // otherwise we calculate the distance to move ($delta).
	    // We have to check if $delta > 0 before moving due to a bug
	    // in the tree behavior (https://trac.cakephp.org/ticket/4037)
	    
	    if ($position == 0){
		$this->Category->moveup($node, true);
	    } else {
		$count = $this->Category->childcount($parent, true);
		$delta = $count-$position-1;
		if ($delta > 0){
		    $this->Category->moveup($node, $delta);
		}
	    }
	    
	    // send success response
	    exit('1');
	    
	}
	
	function child(){
		$categories = $this->Category->children($this->passedArgs['catId']);
		//for($i = 0; $i < $this->passedArgs['limit']; $i++){
			//$categories = $allCategories[$i];
		//}
	    return $categories;
    }
	
	function numberChild(){
		$totalChildren = $this->Category->childCount($this->passedArgs['catId']);
		return $totalChildren;
	}
	 function search() {
		 $number = $this->Category->find('count' , array ('conditions' => array( "or" => array ("Category.title LIKE " =>"%".$this->data['searchBox']."%" ,"Category.content LIKE" => "%".$this->data['searchBox']."%"))));
		 if (!empty($this->data['searchBox'])){
		$condition=array( "or" => array ("Category.title LIKE " =>"%".$this->data['searchBox']."%" ,"Category.content LIKE" => "%".$this->data['searchBox']."%" )); 
	$search = $this->paginate('Category' ,   array( "or" => array ("Category.title LIKE " =>"%".$this->data['searchBox']."%" ,"Category.content LIKE" => "%".$this->data['searchBox']."%" )) );
	$this->set('search',  $search); 
	$this->set('number',  $number);
 $this->Session->write('condition', $condition);
 $this->Session->write('number', $number);

  	}
	else{
		$search =  $this->paginate('Category' ,$this->Session->read('condition'));
		
	$this->set('search',  $search);
	$this->set('number',  $this->Session->read('number'));
	
	}
	}

}
?>
