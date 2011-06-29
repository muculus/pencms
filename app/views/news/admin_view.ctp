<h2><?php  __('News');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('News');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="news view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $news['News']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Title'); ?></td>
					<td><?php echo $news['News']['title']; ?>&nbsp;</td>
				</tr>
				
				<tr>
					<td><?php __('Text'); ?></td>
					<td><?php echo $news['News']['text']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Date'); ?></td>
					<td><?php echo $news['News']['date']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Source'); ?></td>
					<td><?php echo $news['News']['source']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Publish'); ?></td>
					<td><?php echo ($news['News']['publish'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Category'); ?></td>
					<td><?php echo $html->link($news['Category']['title'], array('controller'=> 'categories', 'action'=>'view', $news['Category']['id'])); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Breaking'); ?></td>
					<td><?php echo ($news['News']['breaking'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit News', true), array('action'=>'edit', $news['News']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete News', true), array('action'=>'delete', $news['News']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $news['News']['id'])); ?> </li>
				<li><?php echo $html->link(__('List News', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New News', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>