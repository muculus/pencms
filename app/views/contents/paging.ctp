<?php App::import('Vendor', 'persiandate');
$i=0;
if(isset($this->passedArgs['page'])){
$page=$this->passedArgs['page'];
}else{
$page=1;
}
 foreach($articles as $row):
	   $val = explode(" ",$row['Content']['publish_date']);
       $date = explode("-",$val[0]);
       $time = explode(":",$val[1]);
       $persian_timestamp = persian_mktime($time[0],$time[1],$time[2],$date[1],$date[2],$date[0]);
       $persian_date = persian_date_utf('l',$persian_timestamp)."&nbsp;,&nbsp;".persian_date_utf('d',$persian_timestamp).'&nbsp;,&nbsp;'.persian_date_utf('M',$persian_timestamp).'&nbsp;,&nbsp;'.persian_date_utf('Y',$persian_timestamp);

 ?>      
 <div class="article_row cols1 clearfix">
<div class="article_column column1" >

 <div class="contentpaneopen">
 <h2 class="contentheading"> 
 <?php echo  $row['Content']['title'] ?>
 </h2>

<div class="article-tools clearfix">
<div class="article-meta" >
	<span class="createby"><?php echo "نوشته شده توسط ". $row['Content']['author']. " در تاریخ <em>".$persian_date."</em>"; ?></span>
</div>
<div class="buttonheading">
		<span><a onclick="window.open(this.href,'win2','width=400,height=350,menubar=yes,resizable=yes'); return false;" title="E-mail" href=""><img alt="E-mail" src="/img/emailButton.png"/></a></span>
		<span><a rel="nofollow" onclick="window.open(this.href,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no'); return false;" title="Print" href=""><img alt="Print" src="/img/printButton.png"/></a></span>
		<span><a rel="nofollow" onclick="window.open(this.href,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no'); return false;" title="PDF" href=""><img alt="PDF" src="/img/pdf_button.png"/></a></span>
	</div>
</div>

 <div class="article-content">
<p><?php 
echo $html->image( '/imagephp/phpThumb.php?src=/app/webroot/img/widget/picture'."/".$row['Widget']['picture'].'&amp;w=100&amp;h=84&amp;far=B&amp;bg=FF0000&amp;f=png&amp;sia='.$row['Widget']['picture'] ,array( 'width'=> 100 ,'height'=> 84 ,'class' => 'caption','alt' => $row['Content']['title'],'align'=>'right'));
//echo $html->image( '/'.$row['Content']['image_dir'].'/thumb.small.'.$row['Content']['image'] ,array(  'class' => 'caption','alt' => $row['Content']['title'],'align'=>'left'));?></p><?php echo $shorten->shortenText($row['Content']['intro'], 600) ?>
    
</div>

   
								<a class="readon" href="/articles/view/<?php echo $row['Content']['id']; ?>"><span>بیشتر...</span></a>
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
   		


