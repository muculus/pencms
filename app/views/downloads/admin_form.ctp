		<script type="text/javascript">
			
			$(document).ready( function() {
				
				$('#fileTrees').fileTree({ root: '/home/admin/daneshfa/app/' , script: 'http://www.daneshfa.com/php/jqueryFileTree.php' }, function(file) { 
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
		
<div class="downloads form">
<?php echo $form->create('Download', array('url' => $form_url, 'type' => 'file'));?>
	<?php
		if(empty($form_action) || $form_action != 'add'){
			echo $extendedForm->input('Download.id');
			echo $extendedForm->hidden('Download.file1',array('value' => $download['Download']['file'] ));
            echo $extendedForm->hidden('Download.file_dir1',array('value' => $download['Download']['file_dir'] ));
            echo $extendedForm->hidden('Download.file_mimetype1',array('value' => $download['Download']['file_mimetype'] ));
            echo $extendedForm->hidden('Download.file_filesize1',array('value' => $download['Download']['file_filesize'] ));
		}
		if(isset($selectedCategories)){
			echo $extendedForm->input('category',array('multiple' => 'multiple','type' => 'select' ,'selected' => $selectedCategories));
		}else{
			echo $extendedForm->input('category',array('multiple' => 'multiple','type' => 'select' ));
		}
		//pr($download);
		echo $extendedForm->input('Download.title');
		echo $extendedForm->input('Download.description');
		echo $form->input('Download.metakey');?>
		<div class="filebrowser">
			<div id="fileTrees" class="filetrees"></div>
		</div>
		<?php
		echo $form->input('picture', array('type' => 'file'));
		echo $form->input('Download.filepath',array('style' => 'direction:ltr'));
		echo $form->input('file', array('type' => 'file'));
       if(empty($form_action) || $form_action != 'add'){
       echo $html->link('Delete', array('controller'=>'downloads', 'action'=>'file_delete',  $download['Download']['id']));
       }
	   echo $extendedForm->input('Download.hits');
		echo $extendedForm->input('Download.price');
		echo $extendedForm->input('Download.publish');
		echo $extendedForm->input('Download.access', array('type' => 'select', 'options' => $options, 'default' => 'Public'));
		 
	?>
<?php echo $form->end('Submit');?>
</div>