		<script type="text/javascript">
			$(document).ready( function() {
				$('#fileTrees').fileTree({ root: '/home/admin/daneshfa/app/' , script: 'http://www.daneshfa.com/php/jqueryFileTree.php' }, function(file) { 
					//alert(file);
					//$("#DownloadFilepath").val()=file;
					$("#ArticleFilepath").val(file);

				});
				$( "#tab" ).tabs();
			});
		</script>
		<style type="text/css">
			.filebrowser {
				float: right;
				direction:ltr;
				margin: 15px;
			}
			
			.filetrees {
				width: 550px;
				height: 400px;
				border-top: solid 1px #BBB;
				border-left: solid 1px #BBB;
				border-bottom: solid 1px #FFF;
				border-right: solid 1px #FFF;
				background: #FFF;
				overflow: scroll;
				padding: 5px;
			}
			
			P.note {
				color: #999;
				clear: both;
			}
		</style>
<div class="articles form">
<?php echo $form->create('Article', array('url' => $form_url, 'type' => 'file'));?>
<div id="tab">
<ul>
		<li><a href="#tab1">مجموعه</a></li>
		<li><a href="#tab2">محتوا</a></li>
		<li><a href="#tab3">SEO</a></li>
		<li><a href="#tab4">اطلاعات تکميلي</a></li>
		<li><a href="#tab5">فايل ها</a></li>
		<li><a href="#tab6">انتشار و دسترسي</a></li>
	</ul>
		<div id="tab1">
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Article.id');
		if(isset($selectedCategories)){
			echo $extendedForm->input('category',array('multiple' => 'multiple','type' => 'select' ,'selected' => $selectedCategories));
		}else{
			echo $extendedForm->input('category',array('multiple' => 'multiple','type' => 'select' ));
		}
	?>
		</div>
		<div id="tab2">
	<?php
	//	if(!isset($cat_id[0])) echo $extendedForm->hidden('Article.widget_id',array('value' => $cat_id['cat_id'] ));
		echo $extendedForm->input('Article.title');
		echo $extendedForm->input('Article.intro');
		echo $extendedForm->input('Article.content');
	?>
		</div>
		<div id="tab3">
	<?php
		echo $form->input('Article.metakey');
		echo $form->input('Article.metadesc');
		echo $extendedForm->input('Article.word_for_link_to_this_page');
	?>
		</div>
		<div id="tab4">
	<?php
		echo $extendedForm->input('Article.author');
		echo $extendedForm->input('Article.copyright');
		echo $extendedForm->input('Article.source');
		echo $extendedForm->input('Article.pages');
	?>
		</div>
		<div id="tab5"> 
		<div class="filebrowser">
			<div id="fileTrees" class="filetrees"></div>
		</div>		
	<?php 
		echo $form->input('Article.filepath',array('style' => 'direction:ltr'));
		//echo $form->input('Article.image', array('type' => 'file'));
		//if(empty($form_action) || $form_action != 'add')
	//	echo $html->link($article['Article']['image'],"/".$article['Article']['image_dir']."/".$article['Article']['image'] , array('before' => '--before--'),false);
		echo $form->input('Article.file', array('type' => 'file','after'=>''));
		if(empty($form_action) || $form_action != 'add')
		echo  '<span  class="infoMessage" >'.$article['Article']['file'] .'</span>'; 
	?>
		</div>
		<div id="tab6">
	<?php
		echo $extendedForm->input('Article.publish');
		if(empty($form_action) || $form_action != 'add') echo $form->input('Article.url', array('readonly' => 'readonly'));
		echo $form->input('Article.publish_date');
    	echo $extendedForm->input('Article.access', array('type' => 'select', 'options' => $options, 'default' => 'Public'));
	?>
		</div>

</div>
<?php echo $form->end('Finish');?>
</div>

