<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=xa-4cc4853621cee0f1"></script>
<?php App::import('Vendor', 'persiandate');
$i=0;
if(isset($this->passedArgs['page'])){
$page=$this->passedArgs['page'];
}else{
$page=1;
}
foreach($rows as $row):
	   $val = explode(" ",$row['created']);
       $date = explode("-",$val[0]);
       $time = explode(":",$val[1]);
       $persian_timestamp = persian_mktime($time[0],$time[1],$time[2],$date[1],$date[2],$date[0]);
       $persian_date = persian_date_utf('l',$persian_timestamp)."&nbsp;&nbsp;".persian_date_utf('d',$persian_timestamp).'&nbsp;,&nbsp;'.persian_date_utf('M',$persian_timestamp).'&nbsp;,&nbsp;'.persian_date_utf('Y',$persian_timestamp);

 ?>      
 <div class="article_row cols1 clearfix">
<div class="article_column column1" >

 <div class="contentpaneopen">
 <a  href="/downloads/view/<?php echo $row['id']; ?>"><h2 class="contentheading"> 
 <?php echo  $row['title'] ?>
 </h2></a>

<div class="article-tools clearfix">
<div class="article-meta" >
	<span class="createby"><?php echo " حجم فایل : <b >".$row['file_filesize']. "</b></span><br />   <span class='createdate'><em>".$persian_date."</em>"; ?></span>
<div class="buttonheading">
		<span><a rel="nofollow" class="addthis_button_email" ><img alt="E-mail" src="/img/emailButton.png"/></a></span>
		<span><a rel="nofollow" href="http://www.daneshfa.com/downloads/printv/<?php echo $row['id']; ?>" target="_blank" title="Print" href=""><img alt="Print" src="/img/printButton.png"/></a></span>
		
	</div>
	</div>

</div>

 <div class="article-content">
<p><?php 
//echo $html->image( '/imagephp/phpThumb.php?src=/app/webroot/img/widget/picture'."/".$row['Widget']['picture'].'&amp;w=100&amp;h=84&amp;far=B&amp;bg=FF0000&amp;f=png&amp;sia='.$row['Widget']['picture'] ,array( 'width'=> 100 ,'height'=> 84 ,'class' => 'caption','alt' => $row['title'],'align'=>'right'));
//echo $html->image( '/'.$row['picture_dir'].'/thumb.small.'.$row['picture'] ,array(  'class' => 'caption','alt' => $row['title'],'align'=>'left'));?></p><?php echo $shorten->shortenText($row['description'], 600) ?>
    
</div>

   
								<a class="readon" href="/downloads/view/<?php echo $row['id']; ?>"><span>بيشتر...</span></a>
<!-- share button -->
<div align="left" class="pagingShareButton" >
 
 
	<button type="button" class="share_button_share" onclick=";return false;" id="<?php echo "shareID".$row['id']; ?>">
	<span>Share</span></button>
 
	<br clear="all" />
 
	<div class="load_buttons_box_share"  id="<?php echo "shareID".$row['id']."Box"; ?>">
 
		<div class="close_share">X</div>
		<br clear="all" />
 			<!-- AddThis Button BEGIN -->
			<div class="addthis_toolbox addthis_default_style" style="text-align:right;float:right;padding-right:5px;">
			<a class="addthis_button_twitter"><img src="http://www.daneshfa.com/images/twitter.png"  alt="Twitter" /></a>
			<a class="addthis_button_googlereader"><img src="http://www.daneshfa.com/images/google-reader.png"  alt="google-reader" /></a>
			<a class="addthis_button_facebook"><img src="http://www.daneshfa.com/images/facebook.png"  alt="Facebook" /></a>

			</div>
			
			<!-- AddThis Button END -->
	</div>
</div>
<!-- end share button -->


                                </div>
								</div>
								</div>

<?php endforeach; ?>
 <?php if ($paginator->hasNext() or $paginator->hasPrev()) {
 
		   echo ' <ul class="pagination">';
		   echo $paginator->first();
           echo $paginator->prev(__('صفحه قبل', true), array(), null, array('class'=>'disabled'));
  	 echo $paginator->numbers();
	echo '<li>'.$paginator->next(__('صفحه بعد', true), array(), null, array('class'=>'disabled')).'</li>';
    echo $paginator->last();
   echo ' </ul>';
   }
   ?>
   		


