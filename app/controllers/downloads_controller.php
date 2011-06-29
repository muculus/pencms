<?php
class DownloadsController extends AppController {

	var $name = 'Downloads';
	
	function admin_paging() {
		$this->Download->recursive = 2;
		$filters = $this->Download->getFilters($this->passedArgs);
		$this->set('downloads', $this->paginate('Category', $filters));
		if (!empty($this->passedArgs)){			
			$this->set('filters' , $this->passedArgs);
		}else{
			$this->set('filters' , array('download_category_id' => null));
		}
			
	}

	function admin_form($form_action = 'add', $id = null, $cat_id = null) {
		if(!empty($id)){
			$download = $this->Download->read(null, $id);
			$this->set('download', $download);
		}
		if (!empty($this->data)) {
			 if (!empty($this->data['Download']['file'])) {
			 if (!empty($this->data['Download']['file_filesize'])) {
			          if ($this->data['Download']['file_filesize']==0){
					  $this->data['Download']['file_filesize']=$this->data['Download']['file_filesize1'] ;
					  }
					  }
			 }
			
			$this->Download->create();
			$this->data['Category']['Category']=$this->data['Download']['category'];
			if ($this->Download->save($this->data)) {
			$this->Session->setFlash(__('The Download has been saved', true), 'default', array(), 'info');
				$this->redirect($this->referer(array('action' => 'index', $this->passedArgs)));
			} else {
				$this->Session->setFlash(__('The Download could not be saved. Please, try again.', true), 'default', array(), 'error');
			}
		}else{
			$this->data = array();
			$this->data['Download'] = array();
			if(!empty($download)){
				$this->data = $download;
			}
			foreach($this->passedArgs as $fieldName => $value){
				$this->data['Download'][$fieldName] = $value;
			}
		}
		$form_url = '/' . $this->params['url']['url'];
		$this->set('form_url', $form_url);
		$categories = $this->Download->Category->find('list', array('conditions' => array('Category.cat_type' => '2' ,"AND" => array('Category.widgetset' => 'downloads'))));
		$this->set(compact('categories'));
		$this->set('cat_id', $this->passedArgs );
		$this->set('form_action', $form_action);
		if(isset($this->data['Category'])){
			$selectedCategories = $this->getSelectedItems($this->data['Category']);
			$this->set('selectedCategories', $selectedCategories);
		}
	}
		
	function admin_file_delete($id=null){
		$this->Download->query("UPDATE downloads set file_filesize='',file_mimetype='', file_dir='' , file=''  WHERE id=".$id);
		$this->Session->setFlash(__('The file delete', true), 'default', array(), 'info');
		$this->redirect('/admin/downloads/edit/'.$id);
	}
}
?>
