<!-- content Information -->
<?php
//echo $this->element('quicklogin');
App::import('Vendor', 'filteroutput');	
$ratingStar = $this->requestAction('articles/rating/'.$row['Article']['id']);?>

<div id="Mod190" class="j-moduletable moduletabl  clearfix">
  <h1><?php echo $row['Article']['title']; ?></h1>
  <div class="ja-box-c clearfix">
    <div class="ja-quickinfo">
      <ul class="clearfix">
        <li> <span style="float:right;">امتیاز کاربران: </span>
          <form id="ratings" action="" method="post" style="float: right;">
            <input type="radio" name="rate" value="1" title="Poor" id="rate1" <?php if($ratingStar == 1){echo 'checked="checked"';}?> />
            <label for="rate1">Poor</label>
            <input type="radio" name="rate" value="2" title="Fair" id="rate2" <?php if($ratingStar == 2){echo 'checked="checked"';}?> />
            <label for="rate2">Fair</label>
            <input type="radio" name="rate" value="3" title="Average" id="rate3" <?php if($ratingStar == 3){echo 'checked="checked"';}?>/>
            <label for="rate3">Average</label>
            <input type="radio" name="rate" value="4" title="Good" id="rate4" <?php if($ratingStar == 4){echo 'checked="checked"';}?>/>
            <label for="rate4">Good</label>
            <input type="radio" name="rate" value="5" title="Excellent" id="rate5" <?php if($ratingStar == 5){echo 'checked="checked"';}?>/>
            <label for="rate5">Excellent</label>
            <input name="ArticleId" id="ArticleId" type="hidden" value="<?php echo $row['Article']['id']; ?>" />
          </form>
          <div id="ajax_response"></div>
        </li>
        <li class="even"><span>بازدید : </span> <?php echo $row['Article']['hits']; ?> </li>
        <li><span>
          <?php if(!empty($row['Article']['source']))	 echo "منبع : </sapn>". $row['Article']['source']; ?>
          </span></li>
        <li><span>
          <?php if(!empty($row['Article']['author']))	echo "نویسنده : </span>". $row['Article']['author']; ?>
          </span></li>
        <li><span class="tags">برچسب ها : </span>
          <div class="tags">
            <?php 
/**************************** Tags *************************************/
$count=count($row['Articletag']);
//pr($row);
if($count !== 0){
	sort($row['Articletag']);
	foreach($row['Articletag']	as $tag){
	$count--;
		if($count !== 0){
			echo '<a href="http://www.daneshfa.com/articles/paging/tag_id:'.$tag['ArticlesArticletag']['articletag_id'].'/t:'.filteroutput::stringURLSafe($tag['articletag']).'" rel="tag">'.$tag['articletag'].'</a> , ';
		}else{
			echo '<a href="http://www.daneshfa.com/articles/paging/tag_id:'.$tag['ArticlesArticletag']['articletag_id'].'/t:'.filteroutput::stringURLSafe($tag['articletag']).'" rel="tag">'.$tag['articletag'].'</a>  ';
			
		}	
			//pr($tag);

	}
}
/******************************end tag*******************************************/
?>
          </div>
        </li>
          <li class="even"><span style="display:block;float:right;width: 23%;"  >به اشتراک گزاری مقاله : </span>
          <!-- AddThis Button BEGIN -->
          <div class="addthis_toolbox addthis_default_style" style="text-align:right;float:right;padding-right:5px;"> <a class="addthis_button_facebook_like" onerror="alert();"></a> <a class="addthis_button_email"></a> <a class="addthis_button_print"></a> <a class="addthis_button_twitter"></a> <a class="addthis_button_googlereader"></a> <a class="addthis_button_facebook"></a>
            <script type="text/javascript">
			//	$('.liketext').ready(function() {
			//		alert($('.liketext').length);});	
			</script>
          </div>
          <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=xa-4cc4853621cee0f1"></script>
          <!-- AddThis Button END -->
        </li>
        <li> <span> قسمتی از مطلب : </span>
          <div> <?php echo $row['Article']['intro']; ?> </div>
        </li>
        <li class="even"><span>
          <?php  
				if ($row['Article']['file_filesize'] > 0) {
					  echo $html->link('دانلود فایل ', 'http://www.daneshfa.com/articles/downloadMedia/'.$row['Article']['id']."/useTitle:".$row['Article']['title']); 
					  echo "<br />";
					  echo '<span class="file_filesize">';
					  if ($row['Article']['file_filesize'] < (1024*1024)){
						echo "حجم فایل : " . number_format($row['Article']['file_filesize']/1024, 2, '.', '') . "<span class=\"lgrey\"> کیلوبایت</span>"; 	
					  }else{
						echo "حجم فایل : " . number_format($row['Article']['file_filesize']/(1024*1024), 2, '.', '') . "<span class=\"lgrey\"> مگابایت</span>";	
					  }
				}
					  echo "</span>";
		?>
          </span></li>
      </ul>
    </div>
  </div>
</div>
<!-- end content Information -->
<div class="content scontent">
  <?php 
	echo $row['Article']['content']; 
	?>
</div>
<!-- Comment Section -->
<div id="comments">
<script type="text/javascript">
	var ajax_load = "<img class='loading' src='/img/load.gif' alt='loading...' />";
	// load() functions
	var widget = 'Article';
	//alert(email);
	 
	 var i=0;
	 $(document).ready(function() {
		$("#captchaRefresh").click(function(){
	 i=i+1;
		var reloadUrl = '<img src="http://www.daneshfa.com/securimage/captcha.php?a='+ i +'" />';
			$("#captchaImage").html(reloadUrl);	 
			}); });	
	 $(document).ready(function() {
		$(".submitButton").click(function(){
		//alert($("#CommentFormForm").validationEngine('validate'));
			if($("#CommentFormForm").validationEngine('validate')== true ){
				var loadUrl = "http://www.daneshfa.com/comments/comment";
				var foreignid = $("input[id=CommentForeignid]").val();
				var comment = CKEDITOR.instances.commentcomment.getData();
				var captcha_code = $("input[name=captcha_code]").val();
				var name = $("input[id=CommentName]").val();
				var website = $("input[id=CommentWebsite]").val();
				var email = $("input[id=CommentMail]").val();
				$("#comments").html(ajax_load).load(loadUrl ,  { email: email, foreignid: foreignid ,comment: comment , widget_type: widget ,website: website , name: name , captcha_code: captcha_code } );	 
			}else{
				alert("لطفا فرم را درست و کامل پر کنید.");
			}
			}); });	

</script>

  <?php
		echo $this->element('comment', array('controllerName' => 'articles',
														   'conditions' =>  array('Comment.widget_type' => 'Article','Comment.foreignid' => $row['Article']['id'] ), 
														   'className' => '',
														   'limit' => 6,
														   'order' => array('Comment.id DESC'),
														   'fields' => array('Comment.id', 'Comment.comment' ,'Comment.name' )
														   ));

  /* 
$elementContent = $this->requestAction(array('controller' => 'comments',
									         'action' => 'setElement'),
									          array('named' => array('limit' => '',
																	 'fields' => '',
																	 'order' => '',
																	 'contain' => '0',
																	 'conditions' => array('Comment.widget_type' => 'Article','Comment.foreignid' => $row['Article']['id']))));

`//get total of comments
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
 */ ?>
</div>
<div id="commentForm">
  <?php 
	echo $form->create('Comment', array('action' => 'form'));
	echo $extendedForm->hidden('Comment.widget_type',array('value' => 'Article' ));
	//echo $extendedForm->input('Comment.comment',array('label' => ''   ));
	$config['toolbar'] = array(
	array(  'Cut', 'Copy', 'Paste', '-' ,'Undo' , 'Redo' ),
    array(  'Bold', 'Italic', 'Underline', 'Strike' ),
    array( 'TextColor', 'BGColor' ));
	echo '<textarea cols="80" id="commentcomment" name="commentcomment" rows="10"></textarea>';
	//echo $cksource->ckeditor('Comment',array('config'=>$config , 'id' => 'CommentComment'));
	//echo $cksource->load('Comment.comment');
	echo '<table ><tr>';
	echo $extendedForm->hidden('Comment.foreignid',array('value' => $row['Article']['id'] ));
	echo '<td>'.$extendedForm->input('Comment.name',array('label' => array('text' => 'نام و نام خانوادگی'),'size'=>40 ,'class' => 'validate[required]')).'</td>';
	echo '<td>'.$extendedForm->input('Comment.mail',array('label' => array('text' => 'ایمیل<br>'),'size'=>30 ,'class' => 'validate[custom[email]]')).'</td>';
	echo '<td>'.$extendedForm->input('Comment.website',array('label' => array('text' => 'وب سایت'),'size'=>26 ,'class' => 'validate[custom[url]]')).'</td></tr></table>';
	echo '<td><div id="captchaImage"><img src="http://www.daneshfa.com/securimage/securimage_show.php?a=1" id="captcha" alt="CAPTCHA Image" /></div></td>';
	echo '<td><input id="captcha" type="text" name="captcha_code" size="10" maxlength="6" class="validate[required]"/></td><td>';
	echo '</td></tr></table>'; 
	echo '<a  class="ja-typo-btn btn-grey ja-typo-btn-sm btn-sm-grey submitButton" id="resetWidget"><span>ارسال</span></a>';
	echo $form->end();
?>
		
		<script type="text/javascript">
		//<![CDATA[

			// Replace the <textarea id="editor"> with an CKEditor
			// instance, using default configurations.
			CKEDITOR.replace( 'commentcomment',
				{
					extraPlugins : 'uicolor',
					toolbar :
					[
						[ 'Cut', 'Copy', 'Paste', '-' ,'Undo' , 'Redo' ],
						[ 'Bold', 'Italic', 'Underline', 'Strike' ],
						[ 'TextColor', 'BGColor' ]
					]
				});

		//]]>
		</script>


</div>
<?php //echo "<div>".$this->element('addtoany')."</div>"; ?>
