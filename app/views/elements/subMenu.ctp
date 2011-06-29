 <ul id="subMenu" class="menu">
<?php
$elementContent = $this->requestAction(array('controller' => 'menus',
									         'action' => 'parents'),
									   array('named' => array('id' => $menu_id)));
									   ?>
					<li class="menueHeader"><a href="javascript:void(0);"><?php echo $elementContent['Menu']['title']; ?></a>	<ul>			 
<?php								  
$elementContent = $this->requestAction(array('controller' => 'menus','action' => 'children'),  
										 array('named' => array('id' =>   				 $menu_id)));
									   ?>
									   
									  
<?php 
	foreach($elementContent as $menuItem){
		
			if(!isset($_SESSION['myUser']) && $menuItem['Menu']['access']==1 ){?>
			 <li class="nonActive"><?php echo  $menuItem['Menu']['title'] ; }
			
			 else{
			 echo "<li>".$html->link($menuItem['Menu']['title'], $menuItem['Menu']['link'], array('title' => $menuItem['Menu']['title']));} ?></li> 
     
		<?php 
		}
		
?> 
</ul>
</li>
</ul>