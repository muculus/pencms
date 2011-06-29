<?php
foreach($rows as $row): 
	if (!empty($row['Gallery']['picture_dir'])){
		echo '<div class="galleryAlbum">';
		echo $html->link($html->image ('/'.$row['Gallery']['picture_dir'].'/thumb.medium.'.$row['Gallery']['picture']),'/'.$row['Gallery']['picture_dir'].'/thumb.large.'.$row['Gallery']['picture'], array('escape'=>false));
	}
	echo '</div>';
endforeach;?>

