<div class="widgets index">

	<?php echo $this->element('datatable', array('controllerPath' => 'widgets'));?>		
	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Widget', true), array('action'=>'add'), array('class' => 'add bottom')); ?></li>
		</ul>
	</div>
</div>
