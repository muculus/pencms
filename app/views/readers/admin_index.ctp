<div class="readers index">

	<?php echo $this->element('datatable', array('controllerPath' => 'readers','filters' => $this->passedArgs));?>		
	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Reader', true), array('action'=>'add'), array('class' => 'add')); ?></li>
		</ul>
	</div>
</div>
