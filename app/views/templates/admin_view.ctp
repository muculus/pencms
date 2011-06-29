<h2><?php  __('Template');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Template');?></span></a></li>
		<li><a href="#tab2"><span><?php  __('Related Site Layouts');?></span></a></li>
	</ul>
	<div id="tab1">
		<div class="templates view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $template['Template']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Name'); ?></td>
					<td><?php echo $template['Template']['name']; ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Template', true), array('action'=>'edit', $template['Template']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Template', true), array('action'=>'delete', $template['Template']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $template['Template']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Templates', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Template', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
			<div id="tab2">
			<div class="related">
			
				<?php if (!empty($template['SiteLayout'])):?>
				<?php echo $this->element('datatable', array('controllerPath' => 'site_layouts', 'filters' => array('template_id'=>$template['Template']['id'])));?>
				<?php endif; ?>
				<script type="text/javascript">
					$(document).ready(function() {
						$('#siteLayoutForm').load('<?php echo $html->url(array('controller'=>'site_layouts','action'=>'form','add','template_id'=>$template['Template']['id']));?>');
					});
				</script>
				
				<h3><?php __('Add Site Layout');?></h3>
				
				<div id="siteLayoutForm"></div>
			</div>
		</div>
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>