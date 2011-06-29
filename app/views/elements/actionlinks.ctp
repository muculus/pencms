<?php
	if(!empty($actionlinks)){
		echo '<div class="actions">';
		echo '<ul>';
		foreach($actionlinks as $actionlink){
			echo '<li>' . $html->link($actionlink['label'], $actionlink['target']) . '</li>';
		}
		echo '</ul>';
		echo '</div>';
	}
?>