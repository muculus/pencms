<ul>
	<?php
		foreach($menuItems as $menuItem){
			//image ophalen
			$imgPath = WWW_ROOT . DS . 'img' . DS . 'menu' . DS . $language_code . DS;
			if($menuItem['active']){
				$backgroundImage = $menuItem['name'] . '_active.png';
			}else{
				$backgroundImage = $menuItem['name'] . '_normal.png';
			}
			if(is_file($imgPath . $backgroundImage)){
				//info afbeelding
				list($w, $h) = getimagesize($imgPath . $backgroundImage);
				$background_image_url = $html->url('/img/menu/' . $language_code . '/' . $backgroundImage);
				$hover_image_url = $html->url('/img/menu/' . $language_code . '/' . $menuItem['name'] . '_active.png');
				$style = "width: {$w}px; background-image: url({$background_image_url});";//' :hover{background-image: url(' . $menuItem['name'] . '_active.png)}';
				$mouseover = "this.style.backgroundImage = 'url({$hover_image_url})'";
				$mouseout = "this.style.backgroundImage = 'url({$background_image_url})'";
				//link opbouwen
				echo '<li>';
				echo '<a href="' . $html->url('/'.$menuItem['name']) . '" style="'.$style.'" onmouseover="'.$mouseover.'" onmouseout="'.$mouseout.'"><span>'.$menuItem['name'].'</span></a>';
				echo "</li>";
				//preload hover
				echo '<script type="text/javascript">';
				echo "var {$menuItem['name']}Image = new Image();";
				echo "{$menuItem['name']}Image.src = '{$hover_image_url}';";
				echo '</script>';
				echo "\n";
			}
		}
	?>
</ul>