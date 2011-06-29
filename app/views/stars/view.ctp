<h2><?php __($star['Star']['title']); ?></h2>
<div id="tabpanel">
	
	
	<div id="tab1">
		<div class="stars view">
		<?php __('مشخصات آگهی'); ?><br>
		<center><?php echo $html->image('/'.$star['Star']['picture_dir'].'/'.$star['Star']['picture'] ,array( 'width' =>'150'))?></center>
		
			<table class="properties">
				
				
				
				<tr>
					<td><?php __('عنوان'); ?></td>
					<td><?php echo $star['Star']['title']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Alias'); ?></td>
					<td><?php echo $star['Star']['alias']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('توضیحات'); ?></td>
					<td><?php echo $star['Star']['description']; ?>&nbsp;</td>
				</tr>
				
				
				<tr>
					<td><?php __('تاریخ درج آگهی '); ?></td>
					<td><?php echo $star['Star']['created']; ?>&nbsp;</td>
				</tr>
			</table>
			<?php __('مشخصات آگهی دهنده'); ?>
			<table class="properties">
				<tr>
					<td><?php __('نام '); ?></td>
					<td><?php echo $users['User']['firstname']; ?>&nbsp;</td>
				</tr>
				
				
				<tr>
					<td><?php __('نام خانوادگی'); ?></td>
					<td><?php echo $users['User']['lastname']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('آدرس میل'); ?></td>
					<td><?php echo $users['User']['email']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('تلفن'); ?></td>
					<td><?php echo $users['User']['tel']; ?>&nbsp;</td>
				</tr>
				
				<tr>
					<td><?php __('آدرس'); ?></td>
					<td><?php echo $users['User']['address']; ?>&nbsp;</td>
				</tr>
				
			</table>
		</div>
		

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>