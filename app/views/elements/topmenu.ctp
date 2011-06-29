<?php 
$elementContent = $this->requestAction(array('controller' => 'menus',									        
                                 'action' => 'children'),   array('named' => array('id' => 187)));
                            

	?>
<div id="topmenu">
	<!-- Start First Row Menu--> 
<?php 
App::import('Vendor', 'filteroutput');
for ( $i=0 ;$i<3;$i++){ 
	echo '<ul class="mainlevel">';
	for ( $j=0 ;$j<=5;$j++){
		$k=$j+1;
		$l=$i+1;
		$submenus = $this->requestAction(array('controller' => 'menus',
											'action' => 'children'),  
											 array('named' => array('id' =>  $elementContent[$i*6+$j]['Menu']['id'],'t' => filteroutput::stringURLSafe($elementContent[$i*6+$j]['Menu']['title']))));
		if (empty($submenus)){
		?> 
		<?php if($elementContent[$i*6+$j]['Menu']['sef']==1){
			if($elementContent[$i*6+$j]['Menu']['alias']==''){ ?>
			<li><?php echo $html->link( $elementContent[$i*6+$j]['Menu']['title'],$elementContent[$i*6+$j]['Menu']['link']."/t:".filteroutput::stringURLSafe($elementContent[$i*6+$j]['Menu']['title']), array('rel' =>  'submenu_'.$l.'_'.$k.'','class' => 'mainlink')); ?></li>
		<?php }else{?>
			<li><?php echo $html->link( $elementContent[$i*6+$j]['Menu']['title'],$elementContent[$i*6+$j]['Menu']['link']."/t:".filteroutput::stringURLSafe($elementContent[$i*6+$j]['Menu']['alias']), array('rel' =>  'submenu_'.$l.'_'.$k.'','class' => 'mainlink')); ?></li>
		<?php }}else{ ?>
			<li><?php echo $html->link( $elementContent[$i*6+$j]['Menu']['title'],$elementContent[$i*6+$j]['Menu']['link'], array('rel' =>  'submenu_'.$l.'_'.$k.'','class' => 'mainlink')); ?></li>
		<?php }
		}
		else { ?>
		<li><?php echo $html->link( $elementContent[$i*6+$j]['Menu']['title'],'javascript:void(0);', array('rel' =>  'submenu_'.$l.'_'.$k.'',  'class' => 'mainlink')); ?></li>
		<?php 
		}
	}
   	echo '</ul>';
   	for ( $j=0 ;$j<=5;$j++){  
	  	$submenus = $this->requestAction(array('controller' => 'menus',
											'action' => 'children'),  
											 array('named' => array('id' =>  $elementContent[$i*6+$j]['Menu']['id'],'t' => filteroutput::stringURLSafe($elementContent[$i*6+$j]['Menu']['title']))));
		if (!empty($submenus)){
		   	$k=$j+1;
		   	$l=$i+1;
		   	echo '<div class="submenu" id="submenu_'.$l.'_'.$k.'"> <ul class="sublevel">';
		   	$counter = 1;
		   	foreach ($submenus as $submenu):  ?>                          
		<?php if($submenu['Menu']['sef']==1){
			if($submenu['Menu']['alias']==''){ ?>
			  <li><span class="seprator"> | </span><?php echo $html->link( $submenu['Menu']['title'], $submenu['Menu']['link']."/t:".filteroutput::stringURLSafe($submenu['Menu']['title']), array('rel' => 'submenu_'. $counter.'_'.$l.'_'.$k.'',  'class' => 'mainlink')); ?></li>
		<?php }else{?>
			  <li><span class="seprator"> | </span><?php echo $html->link( $submenu['Menu']['title'], $submenu['Menu']['link']."/t:".filteroutput::stringURLSafe($submenu['Menu']['alias']), array('rel' => 'submenu_'. $counter.'_'.$l.'_'.$k.'',  'class' => 'mainlink')); ?></li>
		<?php }}else{ ?>
			  <li><span class="seprator"> | </span><?php echo $html->link( $submenu['Menu']['title'], $submenu['Menu']['link'], array('rel' => 'submenu_'. $counter.'_'.$l.'_'.$k.'',  'class' => 'mainlink')); ?></li>

		<?php }
	   		endforeach; 
		?> 
	   <?php
	   echo  '</ul> </div>';
	   ?>
	   <?php
	   }
	   ?>
	   <?php
   }

}?>   
 
</div>