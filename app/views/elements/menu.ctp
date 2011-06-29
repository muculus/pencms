<?php 
$elementContent = $this->requestAction(array('controller' => 'menus',									         'action' => 'children'),
									   array('named' => array('id' => 1129)));

//pr($elementContent);                           
	?>
	<div id="ja-mainnav" class="wrap" >
<div class="main">
	<div class="inner clearfix">
<ul id="ja-cssmenu" class="clearfix" dir="ltr">
<?php 
	foreach($elementContent as $menuItem){
		$submenus = $this->requestAction(array('controller' => 'menus','action' => 'children'), array('named' => array('id' =>        $menuItem['Menu']['id'])));
		if(empty($submenus)){
			?>
			<li class="roundbox"><span class="menu-title">
			<?php 
			echo $html->link($menuItem['Menu']['title'], $menuItem['Menu']['link'],array('title' => $menuItem['Menu']['title'],   'class' => 'single')); ?>
			</span></li> 
			<?php 
		}
		else { ?>
            <li  class="havechildmenu-item0"><a href="<?php echo $menuItem['Menu']['link']; ?>"><?php echo $menuItem['Menu']['title']; ?></a><?php
            echo "<ul>";
            foreach ($submenus as $submenu){ 
				$subSubmenus = $this->requestAction(array('controller' => 'menus', 'action' => 'children'),  
												 array('named' => array('id' =>  $submenu['Menu']['id'])));
				 
            if(empty($subSubmenus)){
            ?>
            <li><span class="menu-title"><?php echo $html->link($submenu['Menu']['title'], $submenu['Menu']['link'], array('title' => $submenu['Menu']['title'], 'class' => 'single')); ?></span></li> 
            <?php 
            }
            else { ?>
            <li class="havechildmenu-item2" ><a href="javascript:void(0);"><?php echo $submenu['Menu']['title']; ?></a>
               <ul>
                <?php foreach ($subSubmenus as $subSubmenu){ ?>
                <li  ><span class="menu-title"><?php echo $html->link($subSubmenu['Menu']['title'], $subSubmenu['Menu']['link'], array('title' => $subSubmenu['Menu']['title'])); ?></span></li>
                
           <?php }
            echo "</ul>";
            echo "</li>";
         }}
		  echo "</ul>";
		  echo "</li>";
           
			
		 }
        
         
           
			

	 
	}
?> 
</ul>
</div>
</div>
