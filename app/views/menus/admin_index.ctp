<script language="javascript">

Ext.BLANK_IMAGE_URL = '<?php echo $html->url('/js/ext-2.0.1/resources/images/default/s.gif') ?>';

Ext.onReady(function(){

	var getmnodesUrl = '<?php echo $html->url('/menus/getnodes/') ?>';
	var getnodesUrl = '<?php echo $html->url('/categories/getnodes/') ?>';
	var reorderUrl = '<?php echo $html->url('/menus/reorder/') ?>';
	var reparentUrl = '<?php echo $html->url('/menus/reparent/') ?>';
	var addUrl = '<?php echo $html->url('/admin/menus/add/') ?>';
	var deleteUrl = '<?php echo $html->url('/admin/menus/delete/') ?>';
	
	var Tree = Ext.tree;

	var Treem = Ext.tree;

	
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

	var treem = new Treem.TreePanel({
		el:'treem-div',
		autoScroll:true,
		animate:true,
		enableDD:true,
		containerScroll: true,
		rootVisible: true,
		loader: new Ext.tree.TreeLoader({
			dataUrl:getmnodesUrl
		})
	});
	
	var root = new Tree.AsyncTreeNode({
		text:'categories',
		draggable:false,
		id:'root'
	});
	
	var rootm = new Treem.AsyncTreeNode({
		text:'menus',
		draggable:false,
		id:'root'
	});

	tree.setRootNode(root);
	treem.setRootNode(rootm);
	
	
	// track what nodes are moved and send to server to save
	
	var oldPosition = null;
	var oldNextSibling = null;
	var newnode=false;
	tree.on('startdrag', function(tree, node, event){
		oldPosition = node.parentNode.indexOf(node);
		oldNextSibling = node.nextSibling;
		newnode=true;
	});	
	treem.on('startdrag', function(tree, node, event){
		oldPosition = node.parentNode.indexOf(node);
		oldNextSibling = node.nextSibling;
		newnode=false;
	});
	treem.on('click', function(node, event){
		
		//TODO: IE fix
		document.getElementById('delete').href= deleteUrl+node.id;
		document.getElementById('add').href= addUrl+node.id;
	});
	
	treem.on('movenode', function(tree, node, oldParent, newParent, position , titlem){
		if (oldParent == newParent){
			var url = reorderUrl;
			var params = {'node':node.id, 'delta':(position-oldPosition)};
		} else {
			var url = reparentUrl;
			var titlem = node.text;
			var params = {'node':node.id, 'parent':newParent.id, 'position':position,'titlem':titlem ,'newnode':newnode };
		}
		
		// we disable tree interaction until we've heard a response from the server
		// this prevents concurrent requests which could yield unusual results
		
		treem.disable();
		
		Ext.Ajax.request({
			url:url,
			params:params,
			success:function(response, request) {
			
				// if the first char of our response is not 1, then we fail the operation,
				// otherwise we re-enable the tree
				alert(response.responseText);
				/////////////////////////////////////////////////////////////////////////////
/*				var fh = open("MyFile.txt", 3); // Open the file for writing
				
				if(fh!=-1) // If the file has been successfully opened
				{
				    write(fh, response.responseText); // Write the string to a file
				    close(fh); // Close the file
				} */
// 				var fso, s;
// 				fso = new ActiveXObject("Scripting.FileSystemObject");
// 				s = fso.CreateFolder("test.txt", true);
// 				s.write(response.responseText);
// 				s.Close();
				//document.forms['arash'].elements['text'].value=response.responseText;
				///////////////////////////////////////////////////////////////////////////////
				if (response.responseText.charAt(0) != 1){
					request.failure();
				} else {
					treem.enable();
					tree.render();
					root.expand();
				}
			},
			failure:function() {
			
				// we move the node back to where it was beforehand and
				// we suspendEvents() so that we don't get stuck in a possible infinite loop
				
				treem.suspendEvents();
				oldParent.appendChild(node);
				if (oldNextSibling){
					oldParent.insertBefore(node, oldNextSibling);
				}
				
				treem.resumeEvents();
				treem.enable();
				
				alert('Oh no! Your changes could not be saved!');
			}
		
		});
	
	});
	
	// render the tree
	tree.render();
	treem.render();
	root.expand();
	rootm.expand();
});

</script>
<div style="width: 100%;height: 600px;">
    <div id="tree-div" style="height:600px;width:50%;float:left"></div>
    <div id="treem-div" style="height:600px;width:50%;float:left"></div>
</div>
<div class="actions">
				<ul>
					<li><?php echo $html->link(__('Add Menu', true), array('action'=>'add'), array('class' => 'add bottom', 'id' => 'add'));?></li>
                    <li><?php echo $html->link(__('Delete Menu', true), array('action'=>''), array('class' => 'add bottom', 'id' => 'delete'));?></li>
				</ul>
</div>
<!--<form name="arash">
<textarea name="text" id="text"></textarea> 
</form>-->
