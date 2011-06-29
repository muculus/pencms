<?php
$data = array();
$widgetName = "articles";
$widgetTitle = "مقالات";

foreach ($articles[0]['Article'] as $itemColumn){
    if($itemColumn['deleted'] == 0){
		$data[] = array(
			"id" => $itemColumn['id'], 
			"widget_id" => $itemColumn['widget_id'],
			"title" => $itemColumn['title'],
			"author" => $itemColumn['author'],
			"file" => $itemColumn['file'],
			"publish" => $itemColumn['publish'], 
			"created" => $itemColumn['created'],
			"source" => $itemColumn['source'],
			"pages" => $itemColumn['pages']
		);
    }
}
?>

<script language="javascript">
var widget = "<?php echo $widgetName; ?>";
$(document).ready(function() {
	jQuery("#gridTable").jqGrid({
		datatype: 'local',
		colNames:['id','widget_id', 'title', 'author','file','publish','created', 'source', 'pages'],
		colModel:[
			{name:'id',index:'id', width:'30'},
			{name:'widget_id',index:'widget_id', width:'50'},
			{name:'title',index:'title'},
			{name:'author',index:'author'},		
			{name:'file',index:'file', width:'40'},
			{name:'publish',index:'publish', width:'30',align:'center', formatter:'checkbox'},
			{name:'created',index:'created', formatter:'date', width:'60'},
			{name:'source',index:'source'},
			{name:'pages',index:'pages', width:'30'}			
		],
		data: <?php echo $this->Js->object($data); ?>,
		rowNum:15,
		rowList:[15,30,45],
		pager: '#gridPager',
		sortname: 'id',
		autowidth: true,
		height: 'auto',
		viewrecords: true,
		sortorder: "desc",
		multiselect: true,
		gridview : true,
		rownumbers: true,
		direction: "rtl",
		recordpos : "left",
		caption: "<?php echo $widgetTitle; ?>"
	});
	jQuery("#gridTable").jqGrid('navGrid','#gridPager',{position:"right"});
	//edit button
	$("#edit_gridTable").unbind('click');
	$('#edit_gridTable').click(function() {
				var gr = $("#gridTable").jqGrid('getGridParam','selrow');        
				if(gr){
					var dialog = $('<div></div>')
					.load('/admin/' + widget + '/edit/' + gr)
					.dialog({
						autoOpen: false,
						title: 'ویرایش',
						width: '90%',
						modal: true,
						position: 'top'
					});		
					dialog.dialog('open');
				} else {
					var dialog = $('<div>لطفا یک سطر را برای ویرایش انتخاب کنید.</div>')
					.dialog({
						autoOpen: false,
						title: 'ویرایش',
						width: '30%',
						modal: true,
						position: 'top',
						buttons: {
							"تایید": function() {
								$( this ).dialog( "close" );
							}
						}
					});	
					dialog.dialog('open');
				}
			});
			
	//Add button
	$("#add_gridTable").unbind('click');
	$('#add_gridTable').click(function() {
					var dialog = $('<div></div>')
					.load('/admin/' + widget + '/add/')
					.dialog({
						autoOpen: false,
						title: 'اضافه کردن',
						width: '90%',
						modal: true,
						position: 'top'
					});		
					dialog.dialog('open');
		});
		
	//Delete button
	$("#del_gridTable").unbind('click');
	$('#del_gridTable').click(function() {
				var gr = $("#gridTable").jqGrid('getGridParam','selarrrow');    
				
				if(gr.length > 0){
					var resp = "";
					queryParam = "";
					if(gr.length > 1) {
						queryParam += "?";
						for(var i = 0; i < gr.length; i++) {
							queryParam +=  "delId[]=" + gr[i] + "&";
						}
						queryParam = queryParam.substring(0, queryParam.length-1);
					} else {
						queryParam = gr[0];
					}
					
					var dialog = $('<div>آیا برای حذف تمامی مواردانتخابی اطمینان دارید؟</div>')
					.dialog({
						autoOpen: false,
						title: 'حذف',
						width: '30%',
						modal: true,
						position: 'top',
						buttons: {
							"تایید برای حذف": function() {
								$.ajax({url: '/admin/' + widget + '/delete/' + queryParam});
								$( this ).dialog( "close" );
							},
							"لغو": function() {
								$( this ).dialog( "close" );
							}
						},
						close: function(event, ui) { 
							$.ajax({url: '/admin/' + widget + '/index/' + <?php echo $this->passedArgs['Category.id']; ?>});
							jQuery("#gridTable").jqGrid('setGridParam',{data: <?php echo $this->Js->object($data); ?>}).trigger("reloadGrid");
						}
					});	
					
					dialog.dialog('open');
				} else {
					var dialog = $('<div>لطفا یک سطر را برای حذف کردن انتخاب کنید.</div>')
					.dialog({
						autoOpen: false,
						title: 'حذف',
						width: '30%',
						modal: true,
						position: 'top',
						buttons: {
							"تایید": function() {
								$( this ).dialog( "close" );
							}
						}
					});	
					dialog.dialog('open');
				}
			});
});
</script>
<table id="gridTable"></table>
<div id="gridPager"></div>
