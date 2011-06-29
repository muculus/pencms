<?php

$polls = $this->requestAction(array('controller' => 'polls', 'action' => 'form3'), array('named' => array('conditions' => $conditions)));
//$polls = $this->requestAction(array('controller' => 'polls', 'action' => 'form3'), array('named' => array('condition' => $condition)));
?>

<?php
//pr($polls);
foreach ($polls[0]['Poll'] as $poll){
//echo ":::::";
//pr($poll);
//echo ":::::";

	echo "<br /><input type='radio' name='poll_option' value='".$poll['id']."'/>".$poll['title'];
}
?>
<br />
<div style="padding-top:10px;">
<input type="submit" value="ارسال" class="button" id="poll_button" name="poll_button" />
</div>

