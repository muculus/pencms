<script type="text/javascript">

Ext.BLANK_IMAGE_URL = '<?php echo $html->url('/js/ext-2.0.1/resources/images/default/s.gif') ?>';

Ext.onReady(function(){
	<?php 
	if(!isset($filteredNode)){
		$filteredNode = '';
	}
	?>
	var getnodesUrl = '<?php echo $html->url('/categories/getnodes/'.$filteredNode.'') ?>';
	var reorderUrl = '<?php echo $html->url('/categories/reorder/') ?>';
	var reparentUrl = '<?php echo $html->url('/categories/reparent/') ?>';
	var addUrl = '<?php echo $html->url('/admin/categories/add/') ?>';
	var editUrl = '<?php echo $html->url('/admin/categories/edit/') ?>';
	var deleteUrl = '<?php echo $html->url('/admin/categories/delete/') ?>';
	
	var Tree = Ext.tree;
	
	var tree = new Tree.TreePanel({
		el:'tree-div',
		autoScroll:true,
		animate:true,
		enableDD:true,
		containerScroll: true,
		rootVisible: true,
		loader: new Ext.tree.TreeLoader({
			dataUrl:getnodesUrl
		})
	});
	
	var root = new Tree.AsyncTreeNode({
		text:'categories',
		draggable:true,
		id:'root'
	});
	tree.setRootNode(root);
	
	
	// track what nodes are moved and send to server to save
	
	var oldPosition = null;
	var oldNextSibling = null;
	
	tree.on('startdrag', function(tree, node, event){
		oldPosition = node.parentNode.indexOf(node);
		oldNextSibling = node.nextSibling;
	});
	tree.on('click', function(node, event){
							  
		//Generate url for add or delete specific tree node
		//TODO: IE fix
		if(node.id == 'root'){
			node.id = '';
		}
		document.getElementById('add').href= addUrl+node.id;
		document.getElementById('edit').href= editUrl+node.id;
		document.getElementById('delete').href= deleteUrl+node.id;
	});
	
	tree.on('movenode', function(tree, node, oldParent, newParent, position){
		if (oldParent == newParent){
			var url = reorderUrl;
			var params = {'node':node.id, 'delta':(position-oldPosition)};
		} else {
			var url = reparentUrl;
			var params = {'node':node.id, 'parent':newParent.id, 'position':position};
		}
		
		// we disable tree interaction until we've heard a response from the server
		// this prevents concurrent requests which could yield unusual results
		
		tree.disable();
		
		Ext.Ajax.request({
			url:url,
			params:params,
			success:function(response, request) {
			
				// if the first char of our response is not 1, then we fail the operation,
				// otherwise we re-enable the tree
				
				if (response.responseText.charAt(0) != 1){
					request.failure();
				} else {
					tree.enable();
				}
			},
			failure:function() {
			
				// we move the node back to where it was beforehand and
				// we suspendEvents() so that we don't get stuck in a possible infinite loop
				
				tree.suspendEvents();
				oldParent.appendChild(node);
				if (oldNextSibling){
					oldParent.insertBefore(node, oldNextSibling);
				}
				
				tree.resumeEvents();
				tree.enable();
				
				alert("Oh no! Your changes could not be saved!");
			}
		
		});
	
	});
	
	// render the tree
	tree.render();
	root.expand();
});
</script>

<div id="tree-div" style="height:600px;width: 60%;float: right"></div>
<div id="filterCategory">
<?php 
	//in this section we create a form for filter category tree.
	//this select box contain all category row that has no parent.
	echo $form->create('Category',array('action' => 'index'));
	echo $form->select('Category.parent_id',$categoryList);
	echo $form->end('Submit');
?>
<div class="actions" style="float: left; height: 600px">
				<ul>
					<li><?php echo $html->link(__('Add Category', true), array('action'=>''), array('class' => 'add bottom', 'id' => 'add'));?></li>
					<li><?php echo $html->link(__('Edit Category', true), array('action'=>''), array('class' => 'edit bottom', 'id' => 'edit'));?></li>
                    <li><?php echo $html->link(__('Delete Category', true), array('action'=>''), array('class' => 'add bottom', 'id' => 'delete'),"Are you sure you wish to delete this Category?");?></li>
				</ul>
			</div>
</div>


