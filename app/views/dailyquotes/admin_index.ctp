<h2><?php  __('dailyquotes');?></h2>
<div id="tabpanel"> 
	<ul> 
		<li><a href="#tab1"><span><?php __('Overview');?></span></a></li>
		<li><a href="#tab2"><span><?php __('Deleted dailyquotes');?></span></a></li>
	</ul>
	
	<div id="tab1">
		
		<div class="dailyquotes index">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'dailyquotes')); ?>		
			<div class="actions">
				<ul>
					<li><?php echo $html->link(__('ADD New dailyquote', true), array('action'=>'add',$cat_id), array('class' => 'add bottom')); ?></li>
				</ul>
			</div>
		</div>
	</div>
	
	<div id="tab2">
		
		<div class="dailyquotes deleted">
		
			<?php echo $this->element('datatable', array('controllerPath' => 'dailyquotes', 'idName' => 'dailyquotesDeleted', 'filters' => array('deleted' => '1')));?>		
		</div>
	</div>
</div>

<script type="text/javascript"> 
  $("#tabpanel > ul").tabs();
</script>