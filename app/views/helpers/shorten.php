<?php
class ShortenHelper extends AppHelper {
	function shortenText($text, $chars) {
		if(strlen($text) < $chars + 20) {
			return $text;
		} else {
			while ($text{$chars} != " ") {
				$chars--;
    		}
			return strip_tags(substr($text, 0, $chars)."...");
		}
	}
}
?>