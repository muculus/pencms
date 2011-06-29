<?php
$polls = $this->requestAction(array('controller' => 'polld',
									         'action' => 'form3'));


echo $form->create('Polls', array('action' => 'form4'));?>
</h2>
<?php
foreach ($polls as $poll){
	$a=$poll['Poll']['id'];
 echo "<br><input type=\"radio\" name=\"data[b]\" value=\"$a\">".$poll['Poll']['title'];
}
?>

<br />
 <?php echo $form->end('ارسال');?>
