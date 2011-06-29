<?php foreach($rows as $row): ?>
	<div class="widgetList">
      <?php echo $html->link($row['Widget']['name']."123", '/'.$row['Widget']['type'].'/view/wgt_id:'.$row['Widget']['id']); ?>
    </div>
<?php endforeach ?> 
