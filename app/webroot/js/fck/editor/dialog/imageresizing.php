<?php
  include('SimpleImage.php');
   $image = new SimpleImage();
	$location = '/home/admin/andishesara' . $_POST['location'];
	$image->load($location);
   $orginalpic = "/home/admin/andishesara/app/webroot/files/images/" . str_replace( "/home/admin/andishesara/app/webroot/files/images/" , "orginal_", $location);
     $image->save($orginalpic);
     $image->resize($_POST['width'],$_POST['height']);
     $image->save($location);
?>

