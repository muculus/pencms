<h2><?php  __('Publication');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Publication');?></span></a></li>
		
	</ul>
	<div id="tab1">
		<div class="publications view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $publication['Publication']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Category'); ?></td>
					<td><?php echo $html->link($publication['Category']['title'], array('controller'=> 'categories', 'action'=>'view', $publication['Category']['id'])); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Title'); ?></td>
					<td><?php echo $publication['Publication']['title']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Alias'); ?></td>
					<td><?php echo $publication['Publication']['alias']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Purpose'); ?></td>
					<td><?php echo $publication['Publication']['purpose']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Licenseholder'); ?></td>
					<td><?php echo $publication['Publication']['licenseholder']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Managingdirector'); ?></td>
					<td><?php echo $publication['Publication']['managingdirector']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Senioreditor'); ?></td>
					<td><?php echo $publication['Publication']['senioreditor']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Publisher'); ?></td>
					<td><?php echo $publication['Publication']['publisher']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('ISSN'); ?></td>
					<td><?php echo $publication['Publication']['ISSN']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Issue'); ?></td>
					<td><?php echo $publication['Publication']['issue']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Vol'); ?></td>
					<td><?php echo $publication['Publication']['vol']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Year'); ?></td>
					<td><?php echo $publication['Publication']['year']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Month'); ?></td>
					<td><?php echo $publication['Publication']['month']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Price'); ?></td>
					<td><?php echo $publication['Publication']['price']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Pages'); ?></td>
					<td><?php echo $publication['Publication']['pages']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Period'); ?></td>
					<td><?php echo $publication['Publication']['period']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Web'); ?></td>
					<td><?php echo $publication['Publication']['web']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Email'); ?></td>
					<td><?php echo $publication['Publication']['email']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Address'); ?></td>
					<td><?php echo $publication['Publication']['address']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Tel'); ?></td>
					<td><?php echo $publication['Publication']['tel']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Published'); ?></td>
					<td><?php echo ($publication['Publication']['published'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created'); ?></td>
					<td><?php echo $publication['Publication']['created']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Modified'); ?></td>
					<td><?php echo $publication['Publication']['modified']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created By'); ?></td>
					<td><?php echo $publication['Publication']['created_by']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Modified By'); ?></td>
					<td><?php echo $publication['Publication']['modified_by']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Deleted'); ?></td>
					<td><?php echo ($publication['Publication']['deleted'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Publication', true), array('action'=>'edit', $publication['Publication']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Publication', true), array('action'=>'delete', $publication['Publication']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $publication['Publication']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Publications', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Publication', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>