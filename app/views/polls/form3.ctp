<h2>
<?php

echo $form->create('Polls', array('action' => 'form4'));?>
</h2>
<?php
echo "</br>".$widgets['Widget']['name'];
foreach ($polls as $poll){
	$a=$poll['Poll']['id'];
 echo "<br><input type=\"radio\" name=\"data[b]\" value=\"$a\">".$poll['Poll']['title'];
}
?>

<br />
 <?php echo $form->end('ارسال');?>
