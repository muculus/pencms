<div id="gallery">
<?php 
	foreach($galleries as $gallery){
    
					echo $html->link($html->image('/'.$gallery['Gallery']['picture_dir'].'/thumb.small.'.$gallery['Gallery']['picture']),'/'.$gallery['Gallery']['picture_dir'].'/thumb.large.'.$gallery['Gallery']['picture'], array('escape'=>false));
					
                  
                 
                       
                    
   
    }
    ?>
    </div>