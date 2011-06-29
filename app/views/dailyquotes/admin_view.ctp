<h2><?php  __('Dailyquote');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Dailyquote');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="dailyquotes view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $dailyquote['Dailyquote']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Title'); ?></td>
					<td><?php echo $dailyquote['Dailyquote']['title']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Content'); ?></td>
					<td><?php echo $dailyquote['Dailyquote']['content']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Publish'); ?></td>
					<td><?php echo ($dailyquote['Dailyquote']['publish'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created'); ?></td>
					<td><?php echo $dailyquote['Dailyquote']['created']; ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Dailyquote', true), array('action'=>'edit', $dailyquote['Dailyquote']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Dailyquote', true), array('action'=>'delete', $dailyquote['Dailyquote']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $dailyquote['Dailyquote']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Dailyquotes', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Dailyquote', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>