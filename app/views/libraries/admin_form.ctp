		<script type="text/javascript">
			
			$(document).ready( function() {
				
				$('#fileTrees').fileTree({ root: '/home/admin/daneshfa/app/webroot/' , script: 'http://www.daneshfa.com/php/jqueryFileTree.php' }, function(file) { 
					//alert(file);
					//$("#DownloadFilepath").val()=file;
					$("#DownloadFilepath").val(file);

				});
				
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
		
<div class="libraries form">
<?php echo $form->create('Library', array('url' => $form_url, 'type' => 'file'));?>
	<?php
		if(empty($form_action) || $form_action != 'add'){
		 echo $extendedForm->input('Library.id');
         echo $extendedForm->hidden('Library.file1',array('value' => $library['Library']['file'] ));
		 echo $extendedForm->hidden('Library.file_dir1',array('value' => $library['Library']['file_dir'] ));
		 echo $extendedForm->hidden('Library.file_mimetype1',array('value' => $library['Library']['file_mimetype'] ));
		 echo $extendedForm->hidden('Library.file_filesize1',array('value' => $library['Library']['file_filesize'] ));

		}
		if(!isset($cat_id[0])) echo $extendedForm->hidden('Library.widget_id',array('value' => $cat_id['cat_id'] ));
		echo $extendedForm->input('Library.title');
		echo $extendedForm->input('Library.author');
		echo $extendedForm->input('Library.description');
		echo $extendedForm->input('Library.table_of_content');
		echo $form->input('Library.metakey');
		echo $extendedForm->input('Library.publisher');
		echo $extendedForm->input('Library.ISBN');
		echo $extendedForm->input('Library.paperback');
		echo $extendedForm->input('Library.language');
		//echo $form->input('Library.date');
		echo $extendedForm->input('Library.price');
		echo $extendedForm->input('Library.publish');?>
		<div class="filebrowser">
			<div id="fileTrees" class="filetrees"></div>
		</div>		
		<?php
		echo $form->input('Publication.filepath',array('style' => 'direction:ltr'));
		echo $form->input('picture', array('type' => 'file'));
		echo $form->input('file', array('type' => 'file'));
		echo $extendedForm->input('library.access', array('type' => 'select', 'options' => $options, 'default' => 'Public'));
		 
	?>
<?php echo $form->end('Submit');?>
</div>