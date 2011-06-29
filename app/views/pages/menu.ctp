<?php 
$elementContent = $this->requestAction(array('controller' => 'menus',
									         'action' => 'children'),
									   array('named' => array('id' => $menu_id)));

//pr($elementContent);                           
	?>
<ul id="menu" class="menu">
<?php 
	foreach($elementContent as $menuItem){
		$submenus = $this->requestAction(array('controller' => 'menus',
											   'action' => 'children'),  
										 array('named' => array('id' =>  $menuItem['Menu']['id'])));
		//pr($submenus);  
		if(empty($submenus)){
		?>
        <li><?php echo $html->link($menuItem['Menu']['title'], $menuItem['Menu']['link'], array('title' => $menuItem['Menu']['title'], 'class' => 'single')); ?></li> 
		<?php 
		}
		else { ?>
        <li ><a href="javascript:void(0);"><?php echo $menuItem['Menu']['title']; ?></a>
<?php 
		}
?>

<?php
	if (!empty($submenus)){
		echo "<ul>";
		foreach ($submenus as $submenu):  ?> 
        	<li><?php
			if(!isset($_SESSION['myUser']) && $submenu['Menu']['access']==1 ){?>
			 <li class="nonActive"><?php echo  $submenu['Menu']['title'] ; }
			
			 else{
			 echo "<li>".$html->link($submenu['Menu']['title'], $submenu['Menu']['link'], array('title' => $submenu['Menu']['title']));} ?></li>                         
	   <?php  endforeach; 	 
        echo "</ul>";
     } 
	 echo "</li>";
	}
?> 
</ul>
