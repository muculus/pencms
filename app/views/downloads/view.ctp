
		<div id="widgetContent">	
		<div class="description">
        <h4><?php echo $html->link($row['Download']['title'], array('controller' => 'downloads', 'action' => 'view', $row['Download']['id'])); ?></h4>
	  	<?php 
        	if($row['Download']['picture_dir'] != ''){
            	echo $html->image( '/'.$row['Download']['picture_dir'].'/thumb.medium.'.$row['Download']['picture'] ,array(  'class' => 'item'));
        	}
		?>
        <?php 
			echo $row['Download']['description']; 
		?>
		</div>
        <div class="url">
        	<?php if ($row['Download']['file_filesize'] > 0){
					  echo $html->link('دانلود فایل ', '/'.$row['Download']['file_dir'].'/'.$row['Download']['file']); 
					  echo "<br />";
					  echo '<span class="file_filesize">';
					  if ($row['Download']['file_filesize'] < (1024*1024)){
					  	echo "حجم فایل : " . number_format($row['Download']['file_filesize']/1024, 2, '.', '') . "<span class=\"lgrey\"> کیلوبایت</span>"; 
					  }
					  else  {
					  	echo "حجم فایل : " . number_format($row['Download']['file_filesize']/(1024*1024), 2, '.', '') . "<span class=\"lgrey\"> مگابایت</span>";	
					  }
					  echo "</span>";
			  	  }
			?>
			  
		</div>
         <br />
		 <span class="hits">
		<?php echo "تعداد بازدیدها : " . $row['Download']['hits']; ?>
		</span>
        <br />
        <?php if ($row['Download']['price'] > 0) {
				  echo '<span class="price">';
				  echo "قیمت : " . $row['Download']['price'] . " تومان"; 
				  echo '</span>';
			  }
		?>

    </div>
	
<!-- Comment Section -->
<div id="comments">
  <?php 
$elementContent = $this->requestAction(array('controller' => 'comments',
									         'action' => 'setElement'),
									          array('named' => array('limit' => '',
																	 'fields' => '',
																	 'order' => '',
																	 'contain' => '0',
																	 'conditions' => array('Comment.widget_type' => 'Download','Comment.foreignid' => $row['Download']['id']))));

//get total of comments
$numberOfComments = sizeof($elementContent);

//print a header for comments ,contain a number of comments
echo '<div id="commentHeader"><h4 style=" padding: 10px; color: #717171; border-bottom: 1px solid #ccc" >'.$numberOfComments." نظر برای این مطلب</h4></div>";

//print users comments
foreach($elementContent as $content){
	echo '<div class="commentBox" style="border: 1px solid orange; padding: 10px; margin-bottom: 10px">';
	//echo "<span class=\"author\">".$content['Comment']['name']."</span><span class=\"date\">".$content['Comment']['created']."</span>";
	echo '<font color="#0088CC"><span class="author" style="border-right: 1px solid gray"><b>'.$content['Comment']['name']." </span></b></font>&nbsp;&nbsp;&nbsp;<span class=\"date\"> May 6th, 2010 5:35 am</span>";
	echo "<hr>";
	echo "<p>".$content['Comment']['comment']."</p>";
	echo "</div>";
}	
?>
</div>
<div id="commentForm">
  <?php 
	echo $form->create('Comment', array('action' => 'form'));
	echo $extendedForm->hidden('Comment.widget_type',array('value' => 'Download' ));
	echo $extendedForm->input('Comment.comment',array('label' => ''   ));
	echo $fck->load('Comment.comment');
	echo '<table ><tr>';
	echo $extendedForm->hidden('Comment.foreignid',array('value' => $row['Download']['id'] ));
	echo '<td>'.$extendedForm->input('Comment.name',array('label' => array('text' => 'نام و نام خانوادگی'),'size'=>40)).'</td>';
	echo '<td>'.$extendedForm->input('Comment.mail',array('label' => array('text' => 'ایمیل<br>'),'size'=>30)).'</td>';
	echo '<td>'.$extendedForm->input('Comment.website',array('label' => array('text' => 'وب سایت'),'size'=>26)).'</td></tr></table>';
	
	echo "<table><tr><td><img src='".$html->url('/comments/captcha')."' alt='captcha' /></td>";
	echo '<td>'.$extendedForm->input('Comment.captcha',array('label' => array('text' => 'لطفاً عبارت بالا را وارد نمایید<br>'))).'</td><td>&nbsp;</td></tr></table>';
	echo $form->button('ارسال نظر', array('type' => 'submit', 'class' => 'submitButton'));
	echo $form->end();
?>
</div>
<?php //echo "<div>".$this->element('addtoany')."</div>"; ?>