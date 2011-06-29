<?php
class SearchesController extends AppController {

	var $name = 'Searches';
	var $uses = array('Article');
        /*var $paginate = array(
                          'Article' => array ('fields' => array('Article.id','Article.title', 'Article.intro','Article.content'											),'limit' =>10),
						  'Link' => array ('fields' => array('Link.id','Link.title', 'Link.description'),'limit' =>10),
						  'Category' => array ('fields' => array('Category.id','Category.title', 'Category.content'),'limit' =>10),
						  'Download' => array ('fields' => array('Download.id','Download.title', 'Download.description'),'limit' =>10),
				 		  'Library' => array ('fields' => array('Library.id','Library.title', 'Library.publisher','Library.ISBN','Library.description'),'limit' =>10)
		 );*/

	var $search;
	
	function simple($word = null) {
		if(!empty($this->data['Search']['query'])){
			$SearchQuery = $this->data['Search']['query'];
			$this->Session->write('SearchQuery', $this->data['Search']['query']);
		}else{
			$SearchQuery = $this->Session->read('SearchQuery');
		}
		echo strlen($SearchQuery).$SearchQuery;
		if(strlen($SearchQuery)>4){ 
		    set_include_path(get_include_path() . PATH_SEPARATOR . realpath('/home/admin/andishesara/vendors/search/lib'));
			require_once '/home/admin/andishesara/vendors/search/config.php';
			require_once '/home/admin/andishesara/vendors/search/lib/Pendar/Search.php';	
			// set file path
			define('FILES_PATH', realpath($config['folder']));
			
			// search index
			$searchIndex = new Pendar_Search($config['folder'], '/home/admin/andishesara/vendors/search/temp');
			
			$hits = $searchIndex->find($SearchQuery);
			$IN_var="";
			foreach($hits as $h) {
				$IN_var .= $h->documentId.",";	
			}
			$IN_var = substr( $IN_var , 0, -1);
			if($IN_var != ""){	
				$this->paginate = array('limit' => 8,'conditions' =>array('Article.publish' => 1 ,'Article.id IN ('.$IN_var.')'));
				$filters = $this->Article->getFilters($this->passedArgs);
				$this->set('articles', $this->paginate('Article', $filters));
			}else{
				$this->Session->setFlash(__('??? ????? ???? ???', true), 'default', array(), 'error');
			}
		}else{
			$this->Session->setFlash(__('????? ???? ????? ????? ???? ???? ???? ????', true), 'default', array(), 'error');
		}
	}	
}
?>
