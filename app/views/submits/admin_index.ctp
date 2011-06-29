<div class="submits index">

	<?php echo $this->element('datatable', array('controllerPath' => 'submits'));?>		
	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Submit', true), array('action'=>'add'), array('class' => 'add')); ?></li>
		</ul>
	</div>
</div>
