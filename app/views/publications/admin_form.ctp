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
		
<div class="publications form">
<?php echo $form->create('Publication', array('url' => $form_url, 'type' => 'file'));?>
	<?php
		if(empty($form_action) || $form_action != 'add') echo $extendedForm->input('Publication.id');
		if(!isset($cat_id[0])) echo $extendedForm->hidden('Publication.widget_id',array('value' => $cat_id['cat_id'] ));
		echo $extendedForm->input('Publication.title');
		echo $extendedForm->input('Publication.description');
		echo $form->input('Publication.metakey');
		echo $extendedForm->input('Publication.publisher');
		echo $form->input('Publication.picture' , array( 'type' => 'file'));?>
		<div class="filebrowser">
			<div id="fileTrees" class="filetrees"></div>
		</div>		
		<?php
		echo $form->input('Publication.filepath',array('style' => 'direction:ltr'));
		echo $extendedForm->input('Publication.issue');
		echo $extendedForm->input('Publication.vol');
		echo $form->label('Publication.year' ,'سال انتشار');
		echo $form->year('Publication.year' );
		echo $form->label('Publication.month' ,' ماه انتشار');
		echo $form->month('Publication.month');
		echo $extendedForm->select('Publication.period',array('سال نامه','ماه نامه','هفته نامه','فصل نامه'));
		echo $extendedForm->input('Publication.web');
		echo $extendedForm->input('Publication.email');
		echo $extendedForm->input('Publication.publish');
		echo $extendedForm->input('Publication.access', array('type' => 'select', 'options' => $options, 'default' => 'Public'));
		 
		
	?>
<?php echo $form->end('Submit');?>
</div>