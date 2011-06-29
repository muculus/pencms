<?php
class MenuHelper extends HtmlHelper{
	var $tab = "  ";
	function list_items($items = array(), $level = 0){
		global $menuCurrentURL;
		$output = "";
		if(is_array($items)){
			$tabs = "\n" . str_repeat($this->tab, $level * 2);
			$li_tabs = $tabs . $this->tab;
			foreach($items as $label => $item){
				$target = (isset($item['target'])) ? $item['target'] : '#';
				$icon = (isset($item['icon'])) ? $item['icon'] : '';
				$label = (isset($item['label'])) ? $item['label'] : $label;
				$output .= $li_tabs.'<li';
				if(!empty($item['active'])){
					$output .= ' class="active"';
				}
				$output .= '>';
				
				$label = __($label, true);
				$labelTag = "$label";
				$output .= $this->link($labelTag, $target, null, null, false);
				if(isset($item['items']) && sizeof($item['items']) > 0){
					$output .= $li_tabs.$this->tab.'<ul class="subnav">';
					$output .= $this->list_items($item['items'], $level+1);
					$output .= $li_tabs.$this->tab.'</ul>'.$li_tabs;
				}
				$output .= '</li>';
			}
		}
		return $output;
	}
}
?>
