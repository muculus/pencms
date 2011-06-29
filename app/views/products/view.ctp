<div id="product">
	<?php
		foreach($rows as $row): 	
			if (!empty($row['Product']['title'])){
				echo "<h2>".$row['Product']['title']."</h2>";
			}
			if (!empty ($row['Product']['picture_dir'])){
				echo $html->image('/'.$row['Product']['picture_dir'].'/thumb.medium.'.$row['Product']['picture']);
			}
			echo '<span id="main_description">'.$row['Product']['main_description']."</span>" ;
		endforeach;
	?>
</div>

					
                  
					