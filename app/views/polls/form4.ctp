
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Task');
        data.addColumn('number', 'Hours per Day');
        data.addRows(<?php echo count($polls['Poll']);?>); 
<?php $i=0;foreach($polls['Poll'] as $poll){ ?>
        data.setValue(<?php echo $i;?>, 0, '<?php echo $poll['title']; ?>');
		data.setValue(<?php echo $i;?>, 1, <?php echo $poll['vote'];$i++; ?>);
<?php } ?>
var title = '<?php echo $polls['Category']['title']; ?>';