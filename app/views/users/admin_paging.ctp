<?php
$data = array();
$widgetName = "�������";
$widgetName = 'users';
foreach ($users['User'] as $itemColumn){
    if($itemColumn['deleted'] == 0){
		$data[] = array(
			"id" => $itemColumn['id'], 
			"name" => $itemColumn['name'],
			"field" => $itemColumn['field'],
			"grade" => $itemColumn['grade'],
			"email" => $itemColumn['file'],
			"active" => $itemColumn['publish'],
			"created" => $itemColumn['created']
		);
    }
}
?>

<script language="javascript">
var widget = "<?php echo $widgetName; ?>";
$(document).ready(function() {
	jQuery("#gridTable").jqGrid({
		datatype: 'local',
		colNames:['id','name', 'field', 'grade','email','active','created'],
		colModel:[
			{name:'id',index:'id', width:'30'},
			{name:'name',index:'name', width:'50'},
			{name:'field',index:'field'},
			{name:'grade',index:'grade'},		
			{name:'email',index:'email', width:'40'},
			{name:'active',index:'active', width:'30',align:'center', formatter:'checkbox'},
			{name:'created',index:'created', formatter:'date', width:'60'}			
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
						title: '������',
						width: '90%',
						modal: true,
						position: 'top'
					});		
					dialog.dialog('open');
				} else {
					var dialog = $('<div>���� � ��� �� ���� ������ ������ ����.</div>')
					.dialog({
						autoOpen: false,
						title: '������',
						width: '30%',
						modal: true,
						position: 'top',
						buttons: {
							"�����": function() {
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
						title: '����� ����',
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
					
					var dialog = $('<div>��� ���� ��� ����� ������������ ������� ����Ͽ</div>')
					.dialog({
						autoOpen: false,
						title: '���',
						width: '30%',
						modal: true,
						position: 'top',
						buttons: {
							"����� ���� ���": function() {
								$.ajax({url: '/admin/' + widget + '/delete/' + queryParam});
								$( this ).dialog( "close" );
							},
							"���": function() {
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
					var dialog = $('<div>���� � ��� �� ���� ��� ���� ������ ����.</div>')
					.dialog({
						autoOpen: false,
						title: '���',
						width: '30%',
						modal: true,
						position: 'top',
						buttons: {
							"�����": function() {
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
