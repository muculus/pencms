<?php 
$elementContent = $this->requestAction(array('controller' => 'menus','action' => 'children'),
									   array('named' => array('id' => 1189)));
                          
	?>
<ul id="mainlevel-nav" class="clearfix">
<?php 
	foreach($elementContent as $menuItem){
		
		?>
        <li ><?php echo $html->link($menuItem['Menu']['title'], $menuItem['Menu']['link'], array('title' => $menuItem['Menu']['title'], 'class' => 'single')); ?></li> 
		<?php 
		} 
	 
	
?> 
</ul>
