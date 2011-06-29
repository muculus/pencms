<script type="text/javascript">

Ext.BLANK_IMAGE_URL = '<?php echo $html->url('/js/ext-2.0.1/resources/images/default/s.gif') ?>';

Ext.onReady(function(){

	var getnodesUrl = '<?php echo $html->url('/categories/getnodes/') ?>';
	var reorderUrl = '<?php echo $html->url('/categories/reorder/') ?>';
	var reparentUrl = '<?php echo $html->url('/categories/reparent/') ?>';
	var addUrl = '<?php echo $html->url('/admin/categories/add/') ?>';
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
	<?php if($type=="categories"){
	echo "tree.on('startdrag', function(tree, node, event){
		oldPosition = node.parentNode.indexOf(node);
		oldNextSibling = node.nextSibling;
	});" }?>
	
	tree.on('click', function(node, event){
		
		//TODO: IE fix
		<?php if($type=="categories"){
		echo "document.getElementById('add').href= addUrl+node.id;
		      document.getElementById('delete').href= deleteUrl+node.id;" } ?>
	});
	<?php if($type=="categories"){
	  echo "tree.on('movenode', function(tree, node, oldParent, newParent, position){
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
				
				alert('Oh no! Your changes could not be saved!');
			}
		
		});";?>
	
	});
	
	// render the tree
	tree.render();
	root.expand();
});
</script>

<div id="tree-div" style="height:400px;"></div>
<?php if($type=="categories"){
echo "<a id="add" href=""><span>Add</span></a>
      <a id="delete" href=""><span>Delete</span></a>";}?>

