<?php 
$elementContent = $this->requestAction(array('controller' => 'categories','action' => 'getnodes'),array('named' => array('filterNode' => 766)));
$elementNoemohtava = $this->requestAction(array('controller' => 'categories','action' => 'getnodes'),array('named' => array('filterNode' => 784)));
?>
<div class="ja-usersetting-options clearfix" style="display: none; position: absolute; z-index:999;">
		<form class="ja-usersetting-form" method="get" action="index.php">
				<div class="ja-usersetting-row options-img clearfix">
				<ul>
					<li>
						<label class="jahasTip">رشته:</label>
					</li>
					<?php $i=0;foreach($elementContent as $reshte){ 
						  $elementReshte[$reshte['Category']['title']] = $this->requestAction(array('controller' => 'categories','action' => 'getnodes'),array('named' => array('filterNode' => $reshte['Category']['id'])));
					?>
					<li>
							<input type="radio" name="reshte" <?php if($i==0){echo 'checked="checked"';$i++;}?> value="reshte<?php echo $reshte['Category']['id']; ?>"  class="radio" />
							<label><?php echo $reshte['Category']['title']; ?></label>
						</li>
					<?php } ?>
				</ul>
			</div>
			<div class="ja-usersetting-row options-img clearfix">
				<ul>
					<li>
						<label class="jahasTip">نوع محتوا:</label>
					</li>
					<?php $i=0;foreach($elementNoemohtava as $NoeMohtava){ ?>
						<li>
							<input type="radio" <?php if($i==0){echo 'checked="checked"';}?> name="ContentType" id="reshte<?php echo $NoeMohtava['Category']['id']; ?>" value="<?php echo $i;?>" class="radio" />
							<label ><?php echo $NoeMohtava['Category']['title'];$i++; ?></label>
						</li>
					<?php } ?>
				</ul>
			</div>
			<div  class="ja-usersetting-form-inner clearfix">
			<div id="geraiesh" class="ja-usersetting-row options-cat clearfix">
			<ul class="checkall">
				<li><input class="checkall" type="checkbox" id="checkall-142-sec11" name="checkall" />
				<label for="checkall-142-sec11">انتخاب همه</label></li>
			</ul>
				<?php $i=0;foreach($elementReshte as $reshte1){ ?>
					<ul class="catselect" id="<?php echo "reshte".$elementContent[$i]['Category']['id'];?>" style="<?php if($i != 0){echo "display:none;";}$i++;?>"  >
						
						<?php foreach($reshte1 as $geraiesh){ ?>
						<li>  
							<input type="checkbox" name="geraiesh" <?php //echo 'checked="checked"';?> class="checkbox" value="<?php echo $geraiesh['Category']['id']; ?>" tag="<?php echo $geraiesh['Category']['title']; ?>" id="geraiesh<?php echo $geraiesh['Category']['id']; ?>"  />
							<label ><?php echo $geraiesh['Category']['title']; ?></label>
						</li>
						<?php } ?>
					</ul>
				<?php } ?> 
			</div>
			
			<div class="ja-usersetting-row options-content clearfix">			
				<ul>
						<li>
							<input type="radio" name="show" id="showRandom" value="0" class="radio" />
							<label >تصادفی(Random)</label>
						</li>
						<li>
							<input checked="checked" type="radio" name="show" id="showLast" value="1" class="radio" />
							<label >آخرین مطالب</label>
						</li>
						<li>
							<input type="radio" name="show" id="showMost" value="2" class="radio" />
							<label >پر بازدیدترین مطالب</label>
						</li>
				</ul>		
			</div>
			
			<div class="ja-usersetting-actions clearfix">
				<input type="button" class="button ja-submit" name="ja-submit" value="ذخیره و اعمال تغییرات" />
				<input type="button" class="button ja-cancel" name="ja-cancel" value="انصراف" />
			</div>
		</div>
		</form>
	</div>		
		