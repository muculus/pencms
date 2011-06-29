<div  class="library">
<?php $paginator->options(array('url' => $this->passedArgs)); ?>


<?php App::import('Vendor', 'persiandate');
$i=0;
if(isset($this->passedArgs['page'])){
$page=$this->passedArgs['page'];
}else{
$page=1;
}
 foreach($libraries as $row):
	   $i=$i+1; //counter
       $val = explode(" ",$row['Library']['date']);
       $date = explode("-",$val[0]);
       $time = explode(":",$val[1]);
       $persian_timestamp = persian_mktime($time[0],$time[1],$time[2],$date[1],$date[2],$date[0]);
       $persian_date = persian_date_utf('l',$persian_timestamp)."&nbsp;,&nbsp;".persian_date_utf('d',$persian_timestamp).'&nbsp;,&nbsp;'.persian_date_utf('M',$persian_timestamp).'&nbsp;,&nbsp;'.persian_date_utf('Y',$persian_timestamp);

 ?>      
<div  class="midtut_lib">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tbody><tr>

                    <td class="midtut_right" valign="top">
            <div class="midtut_dropid midtut_dropgreen" style="float:right;" title="78342"><?php  echo $i+ 8 * ($page - 1) ?></div>
            <div class="midtut_title"><?php echo $html->link($row['Library']['title'], array('controller' => 'libraries', 'action' => 'view', $row['Library']['id'] ,'t:'.$row['Library']['title']));?></div>
            <div class="midtut_submit">
               <?php echo "<span class=\"green\">". $row['Library']['author']. "</span>"; ?>
            </div>
            <div class="midtut_site">
			<?php echo $html->image( '/img/library/picture/thumb.medium.'.$row['Library']['picture'] ,array(  'class' => 'item','alt' => $row['Library']['title'], 'align' => 'right' ));
								?>
            	<?php echo $shorten->shortenText($row['Library']['description'], 600) ?>

            </div>

        </td>
      </tr>
    </tbody></table>

    <div  class="midtut_bar">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tbody><tr>
            <td class="in_views">بازدیدها: <em><?php echo $row['Library']['hits'] ?></em></td>
            <td class="in_comments">نظرات: <em>0</em></td>
            <td class="in_icons">
			<img src="http://cdn1.andishesara.com/images/images/fav_off.gif" alt="Set as Favorite" title="Set as Favorite" name="foff" onclick="javascript:bookmarksite('<?php echo $row['Library']['title']; ?>', '<?php echo 'http://www.andishesara.com/libraries/view/'.$row['Library']['id']; ?>');" />
			<img src="http://cdn1.andishesara.com/images/images/report_off.gif"  alt="Report this Tutorial" title="Report this Tutorial" name="roff" class="in_sleft" onmouseover="return tutorialReportHover(this);" onmouseout="return tutorialReportHover(this);" onclick="return tutorialReport(78342);" />
			<img src="http://cdn1.andishesara.com/images/images/share_off.gif" alt="Share!" title="Share!" class="in_sleft" name="soff" onmouseover="return tutorialShareHover(this);" onmouseout="return tutorialShareHover(this);" onclick="return tutorialShare(78342, this);" /></td>

          </tr>
        </tbody></table>
    </div>
</div>
<?php endforeach; ?>

 <?php if ($paginator->hasNext() or $paginator->hasPrev()) {
		   echo ' <div class="paginator">';
           echo $paginator->prev(__('صفحه قبل', true), array(), null, array('class'=>'disabled'));
  	 echo $paginator->numbers();
	echo $paginator->next(__('صفحه بعد', true), array(), null, array('class'=>'disabled'));
    
   echo ' </div>';
   }
   ?>
   		
</div>

