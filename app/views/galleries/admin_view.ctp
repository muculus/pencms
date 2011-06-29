<h2><?php  __('Gallery');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Gallery');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="galleries view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $gallery['Gallery']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Title'); ?></td>
					<td><?php echo $gallery['Gallery']['title']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Description'); ?></td>
					<td><?php echo $gallery['Gallery']['description']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Picture'); ?></td>
					<td><?php echo $gallery['Gallery']['picture']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Picture Dir'); ?></td>
					<td><?php echo $gallery['Gallery']['picture_dir']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Score'); ?></td>
					<td><?php echo $gallery['Gallery']['score']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Hits'); ?></td>
					<td><?php echo $gallery['Gallery']['hits']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created'); ?></td>
					<td><?php echo $gallery['Gallery']['created']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Modifed'); ?></td>
					<td><?php echo $gallery['Gallery']['modifed']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Published'); ?></td>
					<td><?php echo ($gallery['Gallery']['publish'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Access'); ?></td>
					<td><?php echo $gallery['Gallery']['access']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Comment P'); ?></td>
					<td><?php echo ($gallery['Gallery']['comment_p'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Gallery', true), array('action'=>'edit', $gallery['Gallery']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Gallery', true), array('action'=>'delete', $gallery['Gallery']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $gallery['Gallery']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Galleries', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Gallery', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>