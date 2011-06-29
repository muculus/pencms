<h2><?php  __('Advertisement');?></h2>
<div id="tabpanel">
	<ul> 
		<li><a href="#tab1"><span><?php  __('Advertisement');?></span></a></li>
		<li><a href="#tab2"><span><?php  __('Related Advertisement Places');?></span></a></li>
	</ul>
	<div id="tab1">
		<div class="advertisements view">
			<table class="properties">
				<tr>
					<td><?php __('Id'); ?></td>
					<td><?php echo $advertisement['Advertisement']['id']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Title'); ?></td>
					<td><?php echo $advertisement['Advertisement']['title']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Owner'); ?></td>
					<td><?php echo $advertisement['Advertisement']['owner']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Size'); ?></td>
					<td><?php echo $advertisement['Advertisement']['size']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Start'); ?></td>
					<td><?php echo $advertisement['Advertisement']['start']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('End'); ?></td>
					<td><?php echo $advertisement['Advertisement']['end']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Hits'); ?></td>
					<td><?php echo $advertisement['Advertisement']['hits']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Show Type'); ?></td>
					<td><?php echo $advertisement['Advertisement']['show_type']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Show Count'); ?></td>
					<td><?php echo $advertisement['Advertisement']['show_count']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Publish'); ?></td>
					<td><?php echo ($advertisement['Advertisement']['publish'] == 1) ? __('yes', true) : __('no', true); ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Type'); ?></td>
					<td><?php echo $advertisement['Advertisement']['type']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Click Count'); ?></td>
					<td><?php echo $advertisement['Advertisement']['click_count']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Created'); ?></td>
					<td><?php echo $advertisement['Advertisement']['created']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Modified'); ?></td>
					<td><?php echo $advertisement['Advertisement']['modified']; ?>&nbsp;</td>
				</tr>
				<tr>
					<td><?php __('Option'); ?></td>
					<td><?php echo $advertisement['Advertisement']['option']; ?>&nbsp;</td>
				</tr>
			</table>
		</div>
		<div class="primary-actions actions">
			<ul>
				<li><?php echo $html->link(__('Edit Advertisement', true), array('action'=>'edit', $advertisement['Advertisement']['id']), array('class' => 'edit')); ?> </li>
				<li><?php echo $html->link(__('Delete Advertisement', true), array('action'=>'delete', $advertisement['Advertisement']['id']), array('class' => 'delete'), sprintf(__('Are you sure you want to delete # %s?', true), $advertisement['Advertisement']['id'])); ?> </li>
				<li><?php echo $html->link(__('List Advertisements', true), array('action'=>'index'), array('class' => 'index')); ?> </li>
				<li><?php echo $html->link(__('New Advertisement', true), array('action'=>'add'), array('class' => 'add')); ?> </li>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
		
	</div>
	
			<div id="tab2">
			<div class="related">
			
				<?php if (!empty($advertisement['AdvertisementPlace'])):?>
				<?php echo $this->element('datatable', array('controllerPath' => 'advertisement_places', 'filters' => array('advertisement_id'=>$advertisement['Advertisement']['id'])));?>
				<?php endif; ?>
				<script type="text/javascript">
					$(document).ready(function() {
						$('#advertisementPlaceForm').load('<?php echo $html->url(array('controller'=>'advertisement_places','action'=>'form','add','advertisement_id'=>$advertisement['Advertisement']['id']));?>');
					});
				</script>
				
				<h3><?php __('Add Advertisement Place');?></h3>
				
				<div id="advertisementPlaceForm"></div>
			</div>
		</div>
	</div> 
 
<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>