<div id="comments">
  <?php 
//pr($item);
  if(isset($item)){
		$elementContent = $this->requestAction(array('controller' => 'comments',
									         'action' => 'setElement'),
									          array('named' => array('limit' => '',
																	 'fields' => '',
																	 'order' => '',
																	 'contain' => '0',
																	 'conditions' => array('Comment.widget_type' => $item['widget_type'],'Comment.foreignid' => $item['foreignid']))));
	}else{
		$elementContent = $this->requestAction(array('controller' => 'comments',
									         'action' => 'setElement'),
									          array('named' => array('limit' => '',
																	 'fields' => '',
																	 'order' => '',
																	 'contain' => '0',
																	 'conditions' => $conditions )));
	}	
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
//echo $this->element('sql_dump');
?>
</div>