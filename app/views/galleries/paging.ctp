<?php $paginator->options(array('url' => $this->passedArgs)); ?>
<?php foreach ($galleries as $gallery):?>
		<div class = "galleryAlbum">
			<a href = "/galleries/view/wgt_id:<?php echo $gallery['Gallery']['widget_id']; ?>" ><?php echo $html->image( '/'.$gallery['Gallery']['picture_dir'].'/thumb.medium.'.$gallery['Gallery']['picture'] ,array(  'class' => 'captify','alt' => $gallery['Gallery']['title']));?></a>
		</div>
<?php endforeach; ?>
